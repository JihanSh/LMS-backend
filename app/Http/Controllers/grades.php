<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\grade;

class grades extends Controller
{
    //

    public function addGrade(Request $request){
    $grade = new grade;
    $name = $request->input('name');
    $grade->name = $name; 
    $grade->save();
    return response()->json([
        'message' => $request->all()
    ]);     
}

 public function getAllGrades()
    {
        $grades = new grade;
        $allGrades = $grades->all();
        return response()->json([
        'message' => $allGrades,
    ]); 
    }

public function getGrade(Request $request, $id){
    $grade=grade::where('id','=', $id)->get();
    return response()->json([
        'message' => $grade,
    ]);
}
public function editGrade(Request $request, $id){
    $grade= grade::find($id);
    $inputs=$request;
    $grade->update($inputs);
        return response()->json([
        'message' => 'Grade updated successfully',
        'grade'=>$grade,
    ]); 
}

public function deleteGrade(Request $request, $id){
    $grade= grade::find($id);
    $grade->delete();
        return response()->json([
        'message' => 'Grade deleted successfully',
    ]); 

}
}
