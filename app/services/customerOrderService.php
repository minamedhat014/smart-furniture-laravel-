<?php

namespace App\services;

use App\Models\Price;
use App\Models\Product;
use App\Models\Customer;
use App\Models\customerOrder;
use App\Models\CustomerPhone;
use App\Models\productDetail;
use App\Models\customerAddress;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ProductPriceNotification;

class customerOrderService {

   private $customer_id;


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
          successMessage();
        }catch (\Exception $e) {
            DB::rollBack();
            errorMessage($e);
       };   

}


 public function update($id,$validatedData,$stores,$phones){
   try{
    DB::beginTransaction();
    $customer = Customer::findOrFail($id);
$customer->update([
'name'=>$validatedData['name'],
'mail'=>$validatedData['mail'],
'national_id'=>$validatedData['national_id'],
'type'=>$validatedData['type'],
'remarks'=>$validatedData['remarks'],
'updated_by' => authName(),
       ]);
  $customer->stores()->syncWithoutDetaching($stores);

  CustomerPhone::where('customer_id',$id)->delete();
  foreach ($phones as $row){
    if(!is_null($row)){
      CustomerPhone::create(['number'=>$row,'customer_id'=>$id]);      
  }};
  customerAddress::where('customer_id',$id)->delete();
  customerAddress::create([
    'customer_id'=>$id,
    'city'=>$validatedData['city'],
    'address'=>$validatedData['address'],
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
         customerOrder::with('customer','orderDetails','store','address','updates')
            ->where('customer_id',$customer_id)
            ->get();

  }

}

