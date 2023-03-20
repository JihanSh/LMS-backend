<?php

use App\Http\Controllers\grades;
use App\Http\Controllers\admins;
use App\Http\Controllers\students;
use App\Http\Controllers\sections;
use App\Http\Controllers\attendances;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/admin',[admins::class,"addAdmin"]);

/////////////////////////////////////////////////////////////////////

Route::post('/student',[students::class,"addStudent"]);
Route::get('/student',[students::class,"getAllStudents"]);
Route::get('/student/{id}',[students::class,"getStudent"]);
Route::patch('/student/{id}',[students::class,"editStudent"]);
Route::delete('/student/{id}',[students::class,"deleteStudent"]);

////////////////////////////////////////////////////////////////////

Route::post('/grade',[grades::class,"addGrade"]);
Route::get('/grade',[grades::class,"getAllGrades"]);
Route::get('/grade/{id}',[grades::class,"getGrade"]);
Route::patch('/grade/{id}',[grades::class,"editGrade"]);
Route::delete('/grade/{id}',[grades::class,"deleteGrade"]);

////////////////////////////////////////////////////////////////////

Route::post('/section',[sections::class,"addSection"]);
Route::get('/section',[sections::class,"getAllSections"]);
Route::get('/section/{id}',[sections::class,"getSection"]);
Route::patch('/section/{id}',[sections::class,"editSection"]);
Route::delete('/section/{id}',[sections::class,"deleteSection"]);

////////////////////////////////////////////////////////////////////

Route::post('/attendance',[attendances::class,"addAttendance"]);
Route::get('/attendance',[attendances::class,"getAllAttendances"]);
Route::get('/attendance/{id}',[attendances::class,"getAttendance"]);
Route::patch('/attendance/{id}',[attendances::class,"editAttendance"]);
Route::delete('/attendance/{id}',[attendances::class,"deleteAttendance"]);