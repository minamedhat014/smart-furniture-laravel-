<?php

namespace App\services;


use App\Traits\HasTrace;
use App\Models\customerOrder;
use App\Models\OrderTrace;
use App\Models\showRoom;
use Illuminate\Support\Facades\DB;



class customerOrderService {


protected function trace($id,$branch,$status){
OrderTrace::create([
'order_id'=>$id,
'branch'=>$branch,
'status'=>$status,
'created_by'=>authName(),
]);       
  }



public function orderConfirmation (){
  foreach($validatedData['photos'] as $photo){
    $order->addMedia($photo)->toMediaCollection('orders'); 


    if(count($validatedData['photos']) > 0 ){
      $order->clearMediaCollection('orders');
      foreach($validatedData['photos'] as $photo){
          $order->addMedia($photo)->toMediaCollection('orders'); 
      };}


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
     $branch= showRoom::findOrFail($validatedData['branch_id'])->name;
     $this->trace($order->id,$branch,'open');
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

        $branch= showRoom::findOrFail($validatedData['branch_id'])->name;
        $this->trace($order->id,$branch,'open');

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
         customerOrder::with('customer','orderDetails','store','address','updates')
            ->where('customer_id',$customer_id)
            ->get();

  }

}

