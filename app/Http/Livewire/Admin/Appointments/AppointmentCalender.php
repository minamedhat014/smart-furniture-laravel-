<?php

namespace App\Http\Livewire\Admin\Appointments;

use Livewire\Component;
use App\Traits\HasTable;
use App\services\AppointmentService;


class AppointmentCalender extends Component
{

    use HasTable;



public $events=[];
public $selected_type;
public $selected_zone;
protected $AppointmentService;
  

     public function __construct()
     {
         $this->AppointmentService = app(AppointmentService::class);
     }
     
     public function mount($selected_type, $selected_zone)
     {
         $this->selected_type = $selected_type;
         $this->selected_zone = $selected_zone;
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
        $this->events= $this->AppointmentService->index($this->selected_type,$this->selected_zone);
        return view('livewire.admin.appointments.appointment-calender');
    }
}
