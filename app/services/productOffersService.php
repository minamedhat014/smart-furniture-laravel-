<?php

namespace App\services;

use App\Models\offer;
use App\Models\Discount;
use App\Models\productDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\productOfferLaunchNotification;
use App\Notifications\productOfferCancelNotification;

class productOffersService {



public function store($validatedData){

   try{
   DB::beginTransaction();
   $offer= offer::create([
      'name'=>$validatedData['name'],
      'start_date'=>$validatedData['start_date'],
      'end_date'=>$validatedData['end_date'],
      'type_id'=>$validatedData['type_id'],
      'requirments'=>$validatedData['requirments'],
      'status'=>$validatedData['status'],
      'remarks'=>$validatedData['remarks'],
      'created_by'=>authName(),
             ]); 
   DB::commit();
   successMessage();
}catch(\Exception $e){
   DB::rollBack();
   session()->flash('error', $e->getMessage());
}

}


 public function update($edit_id,$validatedData){
   try{
      DB::beginTransaction();
     $offer= offer::findOrfail($edit_id)
     ->update([
      'name'=>$validatedData['name'],
      'start_date'=>$validatedData['start_date'],
      'end_date'=>$validatedData['end_date'],
      'type_id'=>$validatedData['type_id'],
      'requirments'=>$validatedData['requirments'],
      'status'=>$validatedData['status'],
      'remarks'=>$validatedData['remarks'],
      'updated_by'=>authName(),
     ]);
     DB::commit();
     successMessage();
     }catch(\Exception $e){
         DB::rollBack();
         errorMessage($e);
     }  

    }


    
    public function AssignProducts($id,$checked_ids){   
      try{
   $offer = offer::findOrFail($id);
   $offer->products()->sync($checked_ids);
   successMessage(); 
      }catch(\Exception $e){
        errorMessage($e);
  }
  }
  
  

  
  public function launch($id){   
   try{
    $offer = offer::findOrFail($id);
    if($offer->products()->exists()){
     $offer->update([
      'status'=>2,
      'updated_by'=>authName(),
         ]); 
         Notification::send(FactorySalesRecipients(), new productOfferLaunchNotification($offer)); 
         successMessage();    
      }else{
       errorMessage('please assign product and try again');
      }
     }catch(\Exception $e){
      errorMessage($e);
      }
     }


  
  
  public function suspend(int $id){
      try{
   $offer=offer::FindOrFail($id);
   $offer->products()->detach();
   Discount::where('offer_id',$id)->delete();
   $offer->update([
   'status'=>3,
   'updated_by'=>authName(),
      ]); 
      Notification::send(FactorySalesRecipients(), new productOffercancelNotification($offer));
      successMessage();  
      }catch(\Exception $e){
        errorMessage($e);
  }
  }
  
  
  public function delete(int $id){
   try {
     offer::FindOrFail($id)->delete();
     successMessage();
    }catch (\Exception $e){
        errorMessage($e);
    }
}




public function runDiscount($id,$validatedData){
   try {
      $offer= offer::findOrFail($id);
      if($offer->status ==2){
         DB::beginTransaction();
         Discount::where('offer_id',$id)->delete();
         foreach($offer->products()->get() as $product){
             foreach($product->items as $item){
                  $item->price->discounts()->create([
                     'discount_percentage'=>$validatedData['discount_precent'],
                     'offer_id'=>$id,
                  ]);
             }  
             }
             DB::commit();  
             successMessage();
      }else{
         errorMessage('your offer is not active .... please activate it firstly');
      }  
    }catch (\Exception $e){
      DB::rollBack();
       errorMessage($e);
    }
}



    public function index($status,$search,$sort,$pages){
   return

      offer::with('typeOffer','products','discount')
        ->when($status, function($query) use ($status) {
         $query->where('status', $status);
     })->where('name', 'like', '%'.$search.'%')->orderBy('id',$sort)->paginate($pages);
  
  
    }

    
}