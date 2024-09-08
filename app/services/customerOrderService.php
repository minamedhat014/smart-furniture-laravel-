<?php

namespace App\services;


use App\Models\customerOrder;
use Illuminate\Support\Facades\DB;



class customerOrderService {


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

         foreach($validatedData['photos'] as $photo){
            $order->addMedia($photo)->toMediaCollection('orders'); 
     }
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

       if(count($validatedData['photos']) > 0){
        $order->clearMediaCollection('orders');
        foreach($validatedData['photos'] as $photo){
            $order->addMedia($photo)->toMediaCollection('orders'); 
        };}
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

