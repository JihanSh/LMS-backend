<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\attendance;
use App\Models\admin;
use App\Models\student;
use App\Models\section;

class attendances extends Controller
{
public function addAttendance(Request $request){
    $attendance = new attendance;
    $description = $request->input('description');
    $admin_id = $request->input('admin_id');
    $admin = admin::find($admin_id);
    $student_id = $request->input('student_id');
    $student = student::find($student_id);
    $section_id = $request->input('section_id');
    $section = section::find($section_id);
    $attendance->description = $description; 
    $attendance->admin()->associate($admin);
    $attendance->student()->associate($student);
    $attendance->section()->associate($section);
    $attendance->save();
    return response()->json([
        'message' => $request->all()
    ]);     
}
/////////////////////
public function getAllAttendances()
    {
        $attendances = new attendances;
        $allAttendancess = $attendances->all();
        return response()->json([
        'message' => $allAttendancess,
    ]); 
    }

public function getAttendance(Request $request, $id){
    $attendanceInfo=attendance::where('id','=', $id)->get();
    return response()->json([
        'message' => $attendanceInfo,
    ]);
}
public function editAttendance(Request $request, $id){
    $attendance= attendance::find($id);
    $inputs=$request;
    $attendance->update($inputs);
        return response()->json([
        'message' => 'Attendance updated successfully',
        'attendance'=>$attendance,
    ]); 
}

public function deleteAttendance(Request $request, $id){
    $attendance= attendance::find($id);
    $attendance->delete();
        return response()->json([
        'message' => 'Attendance deleted successfully',
    ]); 

}
}
