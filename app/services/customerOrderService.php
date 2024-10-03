<?php

namespace App\services;



use App\Models\OrderDetail;
use App\Models\customerOrder;
use App\Models\orderStatus;
use Illuminate\Support\Facades\DB;
use App\Notifications\orderNotification;
use Illuminate\Support\Facades\Notification;



class customerOrderService {





public function confirmOrder ($validatedData){

  $order = customerOrder::FindOrFail($validatedData['edit_id']);
  $status = orderStatus::where('name', 'confirmed')->firstOrFail();
  $order->update([
    'status_id' =>$status->id, //  3 is confirmed status
]);
$order->updates()->create([
   'transaction_name' =>'order confirmed',
   'remarks' =>$validatedData['remarks'],
   'created_by'=>authName(),
]);
  if(count($validatedData['files']) > 0 ){
    $order->clearMediaCollection('orders');
  foreach($validatedData['files'] as $file){
    $order->addMedia($file)->toMediaCollection('orders'); 
  }};
  
  }


  
public function sendOrder ($validatedData){

  if(OrderDetail::where('order_id',$validatedData['edit_id'])->exists()){
    $order= customerOrder::findOrfail($validatedData['edit_id']);
    $status = orderStatus::where('name', 'sent to fcatory')->firstOrFail();
    $order->update([
         'status_id' =>$status->id, //sent to factory
     ]);
     $order->updates()->create([
        'transaction_name' =>'sent to factory',
         'remarks' =>$validatedData['remarks'],
        'created_by'=>authName(),
     ]);
     Notification::send(FactorySalesRecipients(), new orderNotification($order));
   }else{
        errorMessage('the order you are attempting to send is empty please add items firstly ');
     }      
  
  }

  

public function storeOrder($validatedData){
      try{
         DB::beginTransaction();
         $order=customerOrder::create([
        'customer_id'=>$validatedData['customer_id'],
        'branch_id'=>$validatedData['branch_id'],
        'status_id'=>$validatedData['status_id'],
        'sales_name'=>$validatedData['sales_name'],
        'delivery_address_id'=>$validatedData['delivery_address_id'],
        'remarks'=>$validatedData['remarks'],
        'created_by' => authName(),
         ]);
     DB::commit(); 
        }catch (\Exception $e) {
            DB::rollBack();
            errorMessage($e);
       };   

}





public function setAppointment($validatedData,$order){
  try{
     DB::beginTransaction();
    $order->appointments()->create([
    'start_date'=>$validatedData['appointment_start'],
    'end_date'=>$validatedData['appointment_end'],
    'type'=>'delivery',
    'title'=> 'customer '.$order->customer?->name  . ' order no. '.$order->id . ' related to '.$order->store?->name . ' store ' , 
    'zone'=>$order->address?->city,
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
    DB::commit(); 
    }catch (\Exception $e) {
        DB::rollBack();
        errorMessage($e);
   };   

}


 public function update($edit_id,$validatedData){
   try{

    DB::beginTransaction();
    $order = customerOrder::findOrFail($edit_id);
      $order->update([
        'branch_id'=>$validatedData['branch_id'],
        'status_id'=>$validatedData['status_id'],
        'sales_name'=>$validatedData['sales_name'],
        'delivery_address_id'=>$validatedData['delivery_address_id'],
        'remarks'=>$validatedData['remarks'],
        'updated_by' => authName(),
       ]);
      DB::commit(); 
      successMessage(); 
     }catch(\Exception $e){
         DB::rollBack();
         errorMessage($e);
     }  

    }


    public function index($customer_id)
    {  
    return
         customerOrder::with('customer','orderDetails','store','address','updates','status')
            ->where('customer_id',$customer_id)
            ->get();

  }

}

