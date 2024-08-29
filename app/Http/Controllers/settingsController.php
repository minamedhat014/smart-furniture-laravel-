<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class settingsController extends Controller
{
    public function index(){
    return view('admin.settings.dropdownLists');
    }

    public function notify(){
        return view('admin.settings.notification');
           }

           public function importCenter(){
            return view('admin.settings.importDataCenter');
            }


}
