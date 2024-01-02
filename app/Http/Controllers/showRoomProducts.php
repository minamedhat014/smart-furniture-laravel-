<?php

namespace App\Http\Controllers;

use App\Models\showroomProduct;
use App\Models\showRoomTeam;
use Illuminate\Http\Request;

class showRoomProducts extends Controller
{
    public function index($id){
      $id=$id;
        return view('admin.showrooms.showroom-products',compact('id'));
    }
    public function show(){
   
          return view('admin.showrooms.branch-products');
      }
  

}
