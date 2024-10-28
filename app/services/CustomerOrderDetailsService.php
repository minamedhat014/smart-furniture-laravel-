<?php

namespace App\services;

use App\Models\OrderDetail;
use Illuminate\Support\Str;
use App\Models\customerOrder;
use App\Models\productDetail;
use Illuminate\Support\Facades\DB;

class CustomerOrderDetailsService {


 
private $order_type; 

     public function store($validatedData){
      try{
         DB::beginTransaction();
         OrderDetail::create([
         'order_id'=>$validatedData['order_id'],
         'item_id'=>$validatedData['item_id'],
         'quantity'=>$validatedData['quantity'],
         'unit_price'=>$validatedData['unit_price'],
         'specifications'=>$validatedData['specifications'],
         'area'=>$validatedData['area'],
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
         'specifications'=>$validatedData['specifications'],
         'area'=>$validatedData['area'],
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
     
   public function getItems($order_type){
    try{
        $this->order_type = $order_type;

        if($this->order_type == "standard"){
            return 
            productDetail::with('product')
            ->whereRelation('product','status',2)
            ->whereRelation('product','Standard_ability',1)->get(['id','item_code']);
        }
        elseif ($this->order_type == "c&c non-standard"){
            return productDetail::with('product')->whereRelation('product','Standard_ability',0)
            ->whereRelation('product','type_id',4)
            ->whereRelation('product','status',2)
            ->get(['id','item_code']);
        }
        elseif($this->order_type == "living non-standard"){
           return productDetail::with('product')->whereRelation('product','Standard_ability',0)
            ->whereRelation('product','type_id',1)
            ->whereRelation('product','status',2)
            ->get(['id','item_code']);
        }
        elseif($this->order_type == "kitchen non-standard"){
           return 
             productDetail::with('product')->whereRelation('product','Standard_ability',0)
            ->whereRelation('product','type_id',7)
            ->whereRelation('product','status',2)
            ->get(['id','item_code']);
        }   
      }catch(\Exception $e){
          errorMessage($e);
      }  
    }

public function index($order_id,$search,$sortfilter,$perpage){
   return OrderDetail::with('order','productDetails')
    ->where('order_id' ,$order_id)
    ->whereRelation('productDetails','item_code', 'like', '%'.$search.'%')
    ->orderBy('id',$sortfilter)->paginate($perpage);
   
}
 
}

