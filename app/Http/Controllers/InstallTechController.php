<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstallTechController extends Controller
{
    public function index(){
        return view ('admin.showrooms.install-staff');
    }
}
