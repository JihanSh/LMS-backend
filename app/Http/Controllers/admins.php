<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;

class admins extends Controller
{
public function addAdmin(Request $request){
    $admin = new admin;
    $fname = $request->input('fname');
    $lname = $request->input('lname');
    $username = $request->input('username');
    $password = $request->input('password');
    $admin->fname = $fname; 
    $admin->lname = $lname;
    $admin->username = $username;
    $admin->password = $password;
    $admin->save();
    return response()->json([
        'message' => $request->all()
    ]);     
}
}
