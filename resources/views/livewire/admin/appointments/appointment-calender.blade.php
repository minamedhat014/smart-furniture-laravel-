<div>
    
    <x-app-sub-table name="appointments">

        <x-slot name="head">

        </x-slot>

        <x-slot name="body">

            <x-calender :events="$events"/>

        </x-slot>
        
        <x-slot name="footer">
        @include('livewire.admin.appointments.appointmentModal')
        </x-slot> 
  </x-app-sub-table>
    

</div>
