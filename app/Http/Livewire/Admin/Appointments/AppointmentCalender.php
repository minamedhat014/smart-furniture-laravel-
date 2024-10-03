<?php

namespace App\Http\Livewire\Admin\Appointments;

use Livewire\Component;
use App\Traits\HasTable;
use App\Models\Appointment;
use Livewire\Attributes\On;


class AppointmentCalender extends Component
{

    use HasTable;



public $events= [];
public $appointment_type;
public $selected_type;
public $zones=[];
public $selected_zone;


public function mount(){

    $this->events = Appointment::where('done',1)->get()->map(function ($event) {
        return [
            'id'=>  $event->id,
            'title' => $event->title." - ".$event->zone ." - ".$event->remarks,
            'start' => $event->start_date, // Ensure proper date format
            'end' => $event->end_date,     // Optional
        ];
    })->toArray();

}

#[On('eventView')]
public function appointmentView(int $id)
{
    dd($id);
  
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
        'importance'=>'required',
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


  


    public function render()
    {

        return view('livewire.admin.appointments.appointment-calender');
    }
}
