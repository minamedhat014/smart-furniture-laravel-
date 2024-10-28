<?php

namespace App\services;


use App\Models\Appointment;
use Illuminate\Support\Facades\DB;

class AppointmentService {

  
   public function store($validatedData,$order){
    try{
       DB::beginTransaction();
       $order->appointments()->delete();
      $order->appointments()->create([
      'start_date'=>$validatedData['appointment_start'],
      'end_date'=>$validatedData['appointment_end'],
      'type'=>'delivery',
      'title'=> 'customer '.$order->customer?->name  . ' order no. '.$order->id . ' related to '.$order->store?->name . ' store ' , 
      'zone'=>$order->address?->zone,
      'importance'=>$validatedData['appointment_importence'],
      'company_id'=>authedCompany(),
      'remarks'=>$validatedData['remarks'],
     'created_by'=>authName(),
      ]);
      $order->updates()->create([
        'transaction_name' =>'set delivery appointment on ' . $validatedData['appointment_start'],
         'remarks' =>$validatedData['remarks'] ,
        'created_by'=>authName(),
     ]);
     foreach($order->customer?->phone as $phone){
      $number = '+2'. $phone->number;
      $message = 'dear '.$order->customer?->name.' please note we have set delivery appointment '. $validatedData['appointment_start'].'  regarding order # '.$order->id . ' from smart funiture '; // Replace with your desired message
      sendSms($message,$number);
     }
      DB::commit(); 
      }catch (\Exception $e) {
          DB::rollBack();
          errorMessage($e);
     };   
  
  }


 public function update(){
   try{
    DB::beginTransaction();
   

      DB::commit(); 
      successMessage(); 
     }catch(\Exception $e){
         DB::rollBack();
         errorMessage($e);
     }  

    }


    public function index($type,$zone)
    {
      if(userFactory()){
        return  
        Appointment::
        where([
          ['done',1],
          ['type' ,$type],
        ])
        ->when($zone, function($query) use ($zone) {
          return $query->where('zone', $zone);
      }) 
        ->get()->map(function ($event) {
          return [
              'id'=>  $event->id,
              'title' => $event->type. " " .$event->title." - ".$event->zone ." - ".$event->remarks,
              'start' => $event->start_date, // Ensure proper date format
              'end' => $event->end_date,     // Optional
          ];
      })->toArray();

  
         }else{
          Appointment::where([
            ['done' ,1],
            ['type' ,$type],
            ['zone' ,$zone],
            ['company_id' ,authedCompany()],
          ])->get()->map(function ($event) {
            return [
                'id'=>  $event->id,
                'title' => $event->type. " " .$event->title." - ".$event->zone ." - ".$event->remarks,
                'start' => $event->start_date, // Ensure proper date format
                'end' => $event->end_date,     // Optional
            ];
        })->toArray();
          
       };

  }

}

