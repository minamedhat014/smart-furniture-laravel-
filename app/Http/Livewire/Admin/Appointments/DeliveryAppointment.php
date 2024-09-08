<?php

namespace App\Http\Livewire\Admin\Appointments;

use Livewire\Component;
use App\Traits\HasTable;
use App\Models\Appointment;
use Illuminate\Support\Facades\DB;

class DeliveryAppointment extends Component
{

    use HasTable;



public $events= [];
public $start_date;
public $end_date;
public $title;
public $zone;
public $done;
public $importance;
public $company_id;
public $remarks;


public function mount(){

    $this->events = Appointment::all()->map(function ($event) {
        return [
            'title' => $event->title." - ".$event->zone,
            'start' => $event->start_date, // Ensure proper date format
            'end' => $event->end_date,     // Optional
        ];
    })->toArray();

}


protected function rules()
   {
        return [ 
        'start_date' => 'required|date',
        'end_date'=>'nullable|date',
        'title' => 'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
        'zone'=>'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
        'remarks'=>'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
        'company_id'=>'required|numeric',
        'importance'=>'required|numeric',
        'done'=>'required|numeric',
                    ];
}


    public function closeModal()
    {
      $this->reset([
     
      'start_date' ,'end_date' ,'title','zone',
      'remarks', 'company_id', 'importance', 'done' 
    ]); 
    }


  


public function store(){
    try{
   

      }catch (\Exception $e) {
        DB::rollBack();
        errorMessage($e);
     };   
}


    public function render()
    {

        return view('livewire.admin.appointments.delivery-appointment');
    }
}
