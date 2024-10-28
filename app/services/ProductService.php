<?php

namespace App\services;

use App\Models\Product;
use App\Models\productDetail;
use Illuminate\Support\Facades\DB;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Notification;
use App\serviceContract\productServiceContract;

use App\Notifications\productCancelNotification;
use App\Notifications\productLaunchNotification;

class ProductService  implements productServiceContract{


public function store($validatedData){
    try{
 DB::beginTransaction();
  $product=Product::create([
'name'=>$validatedData['name'],
'sku'=>$validatedData['sku'],
'type_id'=>$validatedData['type_id'],
'source_id'=>$validatedData['source_id'],
'descripation'=>$validatedData['descripation'],
'chair_added'=>$validatedData['chair_added'],
'divisablity'=>$validatedData['divisablity'],
'warranty_years'=>$validatedData['warranty_years'],
'Standard_ability'=>$validatedData['Standard_ability'],
'fabric'=>$validatedData['fabric'],
'sponge'=>$validatedData['sponge'],
'sponge_thickness'=>$validatedData['sponge_thickness'],
'coshin_number'=>$validatedData['coshin_number'],
'created_by' => authName(),
       ]);
       $product->materials()->sync($validatedData['item_material']);
      foreach($validatedData['photos']as $photo){
          $product->addMedia($photo)->toMediaCollection('products'); 
   }
   DB::commit();
}catch(\Exception $e){
    DB::rollBack();
   errorMessage($e);
}  
}



   

 public function update($validatedData ,$edit_id){
    try{
DB::beginTransaction();
  $product=Product::findOrFail($edit_id);
  $product->update([
     'name'=>$validatedData['name'],
     'sku'=>$validatedData['sku'],
     'type_id'=>$validatedData['type_id'],
     'source_id'=>$validatedData['source_id'],
     'descripation'=>$validatedData['descripation'],
     'divisablity'=>$validatedData['divisablity'],
     'warranty_years'=>$validatedData['warranty_years'],
     'Standard_ability'=>$validatedData['Standard_ability'],
     'chair_added'=>$validatedData['chair_added'],
     'fabric'=>$validatedData['fabric'],
     'sponge'=>$validatedData['sponge'],
     'sponge_thickness'=>$validatedData['sponge_thickness'],
     'coshin_number'=>$validatedData['coshin_number'],
     'updated_by'=>authName(),
     ]); 
     $product->materials()->sync($validatedData['item_material']);

     if(count($validatedData['photos']) > 0){
        $product->clearMediaCollection('products');
        foreach($validatedData['photos'] as $photo){
            $product->addMedia($photo)->toMediaCollection('products'); 
        };}     
        DB::commit();     
    }catch(\Exception $e){
        DB::rollBack();
      errorMessage($e);
    }  
    }



    
 public function cancel(int $id){
        try{
           $product= Product::FindOrFail($id);
           $product->update([
            'status'=> 3,
            'updated_by'=>authName(),
            ]);
            Notification::send(FactorySalesRecipients(), new productCancelNotification($product));
           }catch(\Exception $e){
               DB::rollBack();
             errorMessage($e);
           }  
    
    }  
    




    public function launch(int $id){ 
        try{
            $items = productDetail::where('product_id',$id)->get('id')->toArray();
        if($items){  
               $product= Product::FindOrFail($id);
               $product->update([
                'status'=> 2,
                'updated_by'=>authName(),
                ]);
                Notification::send(FactorySalesRecipients(), new productLaunchNotification($product));
            }else{
                session()->flash('error','there is no items for this product , please add item details firstly');
            };
            }catch (\Exception $e) {
            DB::rollBack();
           errorMessage($e);
            } 

       
       
       }



       public function delete(int $id){
        try {
          Product::FindOrFail($id)->delete();
         successMessage();
         }catch (\Exception $e){
             DB::rollBack();
            errorMessage($e);
         }
     }

    
     


public function index ($sourceFilter ,$statusFilter,$search,$sortfilter,$perpage){

   return 
   
  Product::with('type','source','media','materials','offers')
        ->when($sourceFilter,function($query) use ($sourceFilter){
            $query->where('source_id',$sourceFilter);
        })->when($statusFilter,function($query) use  ($statusFilter){
            $query->where('status',$statusFilter);
        })
        ->where('name', 'like', '%'.$search.'%')->orderBy('id',$sortfilter)->paginate($perpage);
    }



}