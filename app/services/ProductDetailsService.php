<?php

namespace App\services;

use App\Models\Price;
use App\Models\Product;
use App\Models\productDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ProductPriceNotification;
use App\serviceContract\productDetailsServiceContract;

class ProductDetailsService  implements productDetailsServiceContract {





public function store($product_id,$validatedData){

   try{
     DB::beginTransaction();
     $item= productDetail::create([
     'product_id'=>$product_id,
     'item_code'=>$validatedData['item_code'],
     'descripation'=>$validatedData['descripation'],
     'component_name'=>$validatedData['component_name'],
     'item_color'=>$validatedData['item_color'],
     'quantity'=>$validatedData['quantity'],
     'item_hieght'=>$validatedData['item_hieght'],
     'item_width'=>$validatedData['item_width'],
     'item_out_depth'=>$validatedData['item_out_depth'],
     'item_inner_depth'=>$validatedData['item_inner_depth'],
     'remarks'=>$validatedData['remarks'],
     'created_by'=> authName(),
        ]);
    
        if($validatedData['photo'] !== null){
            $item->addMedia($validatedData['photo'] )->toMediaCollection('productItems'); 
            }    
          $item->price()->create([
               'product_detail_id'=>$item->id,
               'original_price'=>$validatedData['original_price'],
               'final_price'=>$validatedData['final_price'],
               'created_by'=> authName(),
                  ]);
                
   DB::commit();
   successMessage();
}catch(\Exception $e){
   DB::rollBack();
errorMessage($e);
}
}

 public function update($item_id,$validatedData){
   try{
    DB::beginTransaction();
    $item= productDetail::FindOrFail($item_id);
    $item->update([
         'item_code'=>$validatedData['item_code'],
         'descripation'=>$validatedData['descripation'],
         'component_name'=>$validatedData['component_name'],
         'item_color'=>$validatedData['item_color'],
         'quantity'=>$validatedData['quantity'],
         'item_hieght'=>$validatedData['item_hieght'],
         'item_width'=>$validatedData['item_width'],
         'item_out_depth'=>$validatedData['item_out_depth'],
         'item_inner_depth'=>$validatedData['item_inner_depth'],
         'remarks'=>$validatedData['remarks'],
         'updated_by'=>authName(),
      ]);

      if($validatedData['photo'] !== null){
        $item->clearMediaCollection('productItems');
            $item->addMedia($validatedData['photo'] )->toMediaCollection('productItems'); 
        }
      $item->price->update([     
        'original_price'=>$validatedData['original_price'],
        'final_price'=>$validatedData['final_price'],
        'updated_by' => authName(),
           ]);
           $product_id =productDetail::where('id',$item_id)->value('product_id');
           $product=Product::findOrFail($product_id);        
           if($product->status==2){
           Notification::send(FactorySalesRecipients(), new ProductPriceNotification($product));
           }

      DB::commit();  
      successMessage();
     }catch(\Exception $e){
         DB::rollBack();
         errorMessage($e);
     }  

    }



    
   public function removeSet(int $id){
      try{
          productDetail::FindOrFail($id)->update([
              'set'=>0,
          ]);
          successMessage();
         }catch(\Exception $e){
            errorMessage($e);
         }
          }
      
  
       public function AddToSet(int $id){
      try{
          productDetail::FindOrFail($id)->update([
              'set'=>1,
          ]);
         successMessage();
         }catch(\Exception $e){
            errorMessage($e);
         }
              }
          
  
  
      public function delete(int $id){
          try{
           productDetail::FindOrFail($id)->delete();
          successMessage();
          }catch(\Exception $e){
            errorMessage($e);
          }
      }

}