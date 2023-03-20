<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use App\Models\section;
use Illuminate\Support\Facades\Storage;

class students extends Controller
{
public function addStudent(Request $request){
    $student = new student;
    $fname = $request->input('fname');
    $lname = $request->input('lname');
    $email = $request->input('email');
    $dateofbirth = $request->input('dateofbirth');
    $section_id = $request->input('section_id');
    $section = section::find($section_id);
    $image_path = $request->file('image')->store('images','public');
    $student->fname = $fname; 
    $student->lname = $lname;
    $student->dateofbirth = $dateofbirth;
    $student->email = $email;
    $student->image = $image_path;
    $student->section()->associate($section);
    $student->save();
    return response()->json([
        'message' => $request->all()
    ]);     
}
/////////////////////
public function getAllStudents()
    {
        $students = new student;
        $allStudents = $students->all();
        return response()->json([
        'message' => $allStudents,
    ]); 
    }

public function getStudent(Request $request, $id){
    $studentInfo=student::where('id','=', $id)->get();
    return response()->json([
        'message' => $studentInfo,
    ]);
}
public function editStudent(Request $request, $id){
    $student= student::find($id);

    $inputs=$request->except('image');
    // $section_id = $request->input('section_id');
    $student->update($inputs);
    if($request->hasFile('image')){
        Storage::delete('public/',$student->image);
        $image_path = $request->file('image')->store('images','public');
        $student->update(['image' => $image_path]);}
        return response()->json([
        'message' => 'Student updated successfully',
        'student'=>$student,
    ]); 
}

public function deleteStudent(Request $request, $id){
    $student= student::find($id);
    $student->delete();
        return response()->json([
        'message' => 'Student deleted successfully',
    ]); 

}
}