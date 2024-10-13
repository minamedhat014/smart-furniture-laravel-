<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\City;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    public function select(){

         $types = [
            ['name' => 'delivery'],
            ['name' => 'complaint'],
            ['name' => 'complete installation'],
            ['name' => 'complaint assay'],
            ['name' => 'measuring assay']
        ];

        $zones = City::all('name');
        return view('admin.appointments.select-appointments',compact('types','zones'));
    }

    public function index(Request  $request){
        $validated = $request->validate([
            'selected_type' => 'required|string',
            'selected_zone' => 'nullable|string', // Make sure it exists in the zones table
        ]);

        $type =   $validated['selected_type'];
        $zone =   $validated['selected_zone'];
        return view('admin.appointments.index',compact('type','zone'));
    }


    public function viewAppointment($id){
        $appointment = Appointment::findOrFail($id);
        if($appointment->type == "delivery"){
            return 
            redirect()->route('customerOrders.show',$id);
        }
      
    }

  
}
