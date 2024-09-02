<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Models\Appointment;
use Livewire\Component;

class DeliveryAppointment extends Component
{


public $events= [];
    

public function mount(){
    $this->events = Appointment::all()->map(function ($event) {
        return [
            'title' => $event->title." - ".$event->zone,
            'start' => $event->start_date, // Ensure proper date format
            'end' => $event->end_date,     // Optional
        ];
    })->toArray();

}
    public function render()
    {

        return view('livewire.admin.appointments.delivery-appointment');
    }
}
