<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class SystemActivityLog extends Controller
{
    public function index(){
    
        return view('admin.settings.activityLog');
    }
}
