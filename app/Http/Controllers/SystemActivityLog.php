<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class SystemActivityLog extends Controller
{
    public function index(){
     $activity = Activity::all();
        return view('admin.settings.activityLog',compact('activity'));
    }
}
