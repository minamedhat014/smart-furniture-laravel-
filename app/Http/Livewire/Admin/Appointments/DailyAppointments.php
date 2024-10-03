<?php

namespace App\Http\Livewire\Admin\Appointments;

use Livewire\Component;
use App\Traits\HasTable;
use App\Models\Appointment;

class DailyAppointments extends Component
{

    use HasTable;



    public $events= [];
    public $selected_date;
    public $selected_type;
    
    
    public function mount(){
     dd($this->selected_date,$this->selected_type);
        $this->events = Appointment::where('done',1)->get()->map(function ($event) {
            return [
                'id'=>  $event->id,
                'title' => $event->title." - ".$event->zone ." - ".$event->remarks,
                'start' => $event->start_date, // Ensure proper date format
                'end' => $event->end_date,     // Optional
            ];
        })->toArray();
    
    }






    public function render()
    {
        return view('livewire.admin.appointments.daily-appointments');
    }
}
