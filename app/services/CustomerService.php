<?php

namespace App\services;


use App\Models\Customer;
use App\Models\CustomerPhone;
use App\Models\customerAddress;
use Illuminate\Support\Facades\DB;

class customerService {

   private $customer_id;
   private $search;
   private $sortfilter;
   private $perpage;

public function store($validatedData,$stores,$phones){

   try{
     DB::beginTransaction();
    
     $customer = Customer::create([
      'name'=>$validatedData['name'],
      'title'=>$validatedData['title'],
      'type'=>$validatedData['type'],
      'date_of_marriage'=>$validatedData['date_of_marriage'],
      'date_of_birth'=>$validatedData['date_of_birth'],
      'remarks'=>$validatedData['remarks'],
      'created_by' => authName(),
             ]);
        $this->customer_id = $customer->id;
        $client = Customer::findOrFail($this->customer_id);
        $client->stores()->sync($stores);
        foreach ($phones as $row){
          if(!is_null($row)){
            CustomerPhone::create(['number'=>$row,'customer_id'=>$this->customer_id]);      
        }};
        customerAddress::create([
          'customer_id'=>$this->customer_id,
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


 public function update($id,$validatedData,$stores,$phones){
   try{
    DB::beginTransaction();
    $customer = Customer::findOrFail($id);
$customer->update([
'name'=>$validatedData['name'],
'title'=>$validatedData['title'],
'date_of_marriage'=>$validatedData['date_of_marriage'],
'date_of_birth'=>$validatedData['date_of_birth'],
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


    public function index($search,$sort,$pages)
    {
       
      $this->search = $search;
      $this->sortfilter = $sort; 
      $this->perpage = $pages;

      if(userFactory()){
        return  
        Customer::with('stores','phone','address')
        ->where('name', 'like', '%'.$search.'%')
       ->orWhereHas('phone', function ($query) {
         $query->where('number', 'like', '%' . $this->search . '%');})
        ->orderBy('id',$sort)->paginate($pages);
       }
       
       elseif(CustomerPhone::where('number',$this->search)->exists()){
        return Customer::with('stores','phone','address')
        ->orwhereRelation('phone', 'number',$this->search)
        ->orderBy('id',$this->sortfilter)->paginate($this->perpage); 
      } 
        else{
        return Customer::with('stores','phone','address')
         ->whereRelation('stores', 'Company_id', authedCompany())
         ->when($this->search,function($query){
       $query->where('name', 'like', '%'.$this->search.'%')
       ->orwhereRelation('phone','number', 'like', '%' . $this->search . '%');
         })
         ->orderBy('id',$this->sortfilter)->paginate($this->perpage); 
    
          
       };

  }

}

