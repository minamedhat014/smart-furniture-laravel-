<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowRoomController extends Controller
{
    public function index(){
        return view('admin.showrooms.showroom');
    }
}
