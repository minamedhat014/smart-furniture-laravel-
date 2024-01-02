<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowRoomTeamController extends Controller
{

 public function index ($id){
    $id=$id;  
 return view('admin.showrooms.staff',compact('id'));
 }

 public function show(){

   return view('admin.showrooms.branch-staff');
 }

}
