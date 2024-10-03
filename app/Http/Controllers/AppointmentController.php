<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(){
        return view('admin.appointments.index');
    }

    public function viewDay($date,){
        return view('admin.appointments.daily-appointments',compact('date'));
    }
}
