<?php

namespace App\services;


use App\Models\Availableitem;
use App\Models\productDetail;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AvailableItemdImport;
use App\Notifications\AvailableItemsNotification;
use Illuminate\Support\Facades\Notification;



class AvailableItemService{


public function updateList($file){
    try{
    Availableitem::truncate();
    Excel::import(new AvailableItemdImport, $file);
    successMessage();
}catch(\Exception $e){
    session()->flash('error', $e->getMessage());
}  
}



   

 public function update($validatedData ,$item_id){
    try{
        $item= productDetail::findOrFail($item_id);
        $item_code = $item->item_code;    
    $available=  Availableitem::where('item_code',$item_code)->first();
     $available->update([
    'balance'=>$validatedData['balance'],
      'consumption_rate_per_week'=>$validatedData['consumption_rate_per_week'],
      'available_date'=>$validatedData['available_date'],
     'updated_by'=>authName(),
     ]); 
     Notification::send(FactorySalesRecipients(), new AvailableItemsNotification($available));
    }catch(\Exception $e){
        DB::rollBack();
        session()->flash('error', $e->getMessage());
    }  
    }




       public function delete($id){
        try {
            $item= productDetail::findOrFail($id);
            $item_code = $item->item_code;      
           Availableitem::where('item_code',$item_code)->delete();
          session()->flash('success', 'Done sucessfully'); 
         }catch (\Exception $e){
             DB::rollBack();
             session()->flash('error', $e );
         }
     }

    
     



     public function index ($search,$sortfilter,$perpage){

        return 
        
             productDetail::with('product','price','balance')
             ->WhereHas('product', function ($query)  use ($search) {
                $query->where('name', 'like', '%' . $search . '%');})
                ->whereHas('balance', function ($query) {
                    $query->where('balance', '>', 0); 
                })
                 ->orderBy('id',$sortfilter)->paginate($perpage);
         }
     
     


}