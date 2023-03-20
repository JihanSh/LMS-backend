<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\section;
use App\Models\grade;

class sections extends Controller
{
public function addSection(Request $request){
    $section = new section;
    $sectionname = $request->input('sectionname');
    $grade_id = $request->input('grade_id');
    $grade = grade::find($grade_id);
    $section->sectionname = $sectionname; 
    $section->grade()->associate($grade);
    $section->save();
    return response()->json([
        'message' => $request->all()
    ]);     
}
/////////////////////
public function getAllSections()
    {
        $section = new section;
        $allSections = $section->all();
        return response()->json([
        'message' => $allSections,
    ]); 
    }

public function getSection(Request $request, $id){
    $sectionInfo=section::where('id','=', $id)->get();
    return response()->json([
        'message' => $sectionInfo,
    ]);
}
public function editSection(Request $request, $id){
    $section= section::find($id);
    $inputs=$request;
    $section->update($inputs);
        return response()->json([
        'message' => 'Section updated successfully',
        'section'=>$section,
    ]); 
}

public function deleteSection(Request $request, $id){
    $section= section::find($id);
    $section->delete();
        return response()->json([
        'message' => 'Section deleted successfully',
    ]); 

}
}
