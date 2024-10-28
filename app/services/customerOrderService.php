<?php

namespace App\services;



use App\Traits\HasTable;
use App\Models\OrderDetail;
use App\Models\orderStatus;
use App\Models\customerOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Notifications\orderNotification;
use Illuminate\Support\Facades\Notification;
use AshAllenDesign\ShortURL\Classes\Builder;


class CustomerOrderService {

public function confirmOrder ($validatedData){
  try{
    if(OrderDetail::where('order_id',$validatedData['edit_id'])->exists()){
  $order = customerOrder::FindOrFail($validatedData['edit_id']);
  $status = orderStatus::where('name', 'confirmed')->firstOrFail();
  $order->update([
    'status_id' =>$status->id, //  3 is confirmed status
]);
$url = URL::signedRoute('guestOrderQoutation.print',['id' => $order->id]);
$shortURL = app(Builder::class)->destinationUrl($url)->make()->default_short_url;
$order->updates()->create([
   'transaction_name' =>'order confirmed',
   'remarks' =>$validatedData['remarks'],
   'url' =>$url,
   'created_by'=>authName(),
]);

foreach($order->customer?->phone as $phone){
  $number = '+2'. $phone->number;
  $message = 'dear '.$order->customer?->name.' the following is your confirmation link  ' . $shortURL; // Replace with your desired message
  sendSms($message,$number);
 }

  if(count($validatedData['files']) > 0 ){
    $order->clearMediaCollection('orders');
  foreach($validatedData['files'] as $file){
    $order->addMedia($file)->toMediaCollection('orders'); 
  }};
  successMessage();
}else{
  session()->flash('error','the order you are attempting to send is empty please add items firstly ');
}

}catch (\Exception $e) {
  errorMessage($e);
};   
  }


  
public function sendOrder ($validatedData){
  try{ 
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
     successMessage();
   }else{
      session()->flash('error','the order you are attempting to send is empty please add items firstly ');
     }      
    }catch (\Exception $e) {
      errorMessage($e);
    }; 
  }

  
public function sendBack ($validatedData){
try{
  if(OrderDetail::where('order_id',$validatedData['edit_id'])->exists()){
    $order= customerOrder::findOrfail($validatedData['edit_id']);
    $status = orderStatus::where('name', 'sent back to branch')->firstOrFail();
    $order->update([
         'status_id' =>$status->id, //sent to factory
     ]);
     $order->updates()->create([
        'transaction_name' =>'sent back to branch',
         'remarks' =>$validatedData['remarks'],
        'created_by'=>authName(),
     ]);
     successMessage();
   }else{
        session()->flash('error','the order you are attempting to send is empty please add items firstly ');
     }      
    }catch (\Exception $e) {
      errorMessage($e);
    }; 
  }


  

public function storeOrder($validatedData){
      try{
         DB::beginTransaction();
         $order=customerOrder::create([
        'customer_id'=>$validatedData['customer_id'],
        'branch_id'=>$validatedData['branch_id'],
        'status_id'=>$validatedData['status_id'],
        'sales_name'=>$validatedData['sales_name'],
        'order_type'=>$validatedData['order_type'],
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




 public function update($edit_id,$validatedData){
   try{

    DB::beginTransaction();
    $order = customerOrder::findOrFail($edit_id);
      $order->update([
        'branch_id'=>$validatedData['branch_id'],
        'status_id'=>$validatedData['status_id'],
        'sales_name'=>$validatedData['sales_name'],
        'order_type'=>$validatedData['order_type'],
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

