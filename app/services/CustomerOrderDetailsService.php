<?php

namespace App\services;


use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;

class CustomerOrderDetailsService {


 

     public function store($validatedData){
      try{
         DB::beginTransaction();
         OrderDetail::create([
         'order_id'=>$validatedData['order_id'],
         'item_id'=>$validatedData['item_id'],
         'quantity'=>$validatedData['quantity'],
         'unit_price'=>$validatedData['unit_price'],
         'wharehouse'=>$validatedData['wharehouse'],
         'branch_extra_discount'=>$validatedData['branch_extra_discount'],
         'unit_price_after_discount'=>$validatedData['unit_price_after_discount'],
         'final_price'=>$validatedData['final_price'],
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
    OrderDetail::findOrFail($edit_id)
    ->update([
        'order_id'=>$validatedData['order_id'],
         'item_id'=>$validatedData['item_id'],
         'quantity'=>$validatedData['quantity'],
         'unit_price'=>$validatedData['unit_price'],
         'wharehouse'=>$validatedData['wharehouse'],
         'branch_extra_discount'=>$validatedData['branch_extra_discount'],
         'unit_price_after_discount'=>$validatedData['unit_price_after_discount'],
         'final_price'=>$validatedData['final_price'],
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


 
}

