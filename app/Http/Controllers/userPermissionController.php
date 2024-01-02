<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class userPermissionController extends Controller
{
    public function index(){
    //   $admin= Admin::findOrFail(9);
    //   $admin->getFirstMediaUrl('profile');
    //   dd($admin);

        return view('admin.general settings.users');
    }
}
