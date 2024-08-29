<?php

namespace App\http\Livewire\Admin\Customers;

use App\Models\City;
use Livewire\Component;
use App\Models\Customer;
use App\Models\showRoom;
use App\Traits\HasTable;
use App\Models\CustomerType;


use App\Traits\HasMultiSelect;
use App\Models\customerAddress;
use App\services\customerService;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class CustomerIndex extends Component
{
  
  use HasTable;
  use HasMultiSelect;

public $branches=[]; 

#[Locked]
public $customer_id;
public $name;
public $mail;
public $national_id;
public $store_ids =[];
public $type;
public $phone1;
public $phone2;
public $remarks;
public $showList = true;
public $city;
public $address;
public $cities;

#[Locked]
public $edit_id;
public $selected_id;
public $editAddress;
protected $customerService;
protected $write_permission ="write customer";


public function __construct()
{
    $this->customerService = app(CustomerService::class);
}



public function mount(){
  $this->check_permission("view customers");
  
 if($this->showList == false){
  $this->perpage = 1;
 }
  $this-> cities = City::all('id','name');
  if(userFactory()){
   $this->branches = showRoom::all('id','name');
  }else{
    $this->branches = showRoom::select('id','name','company_id')->where('company_id', authedCompany())->get();

  }

}


protected function rules()
   {
        return [ 
        'name' => 'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
        'mail' => 'nullable|email',
        'national_id' => 'required|numeric|regex:/^\d{14}$/|unique:customers,national_id,'. $this ->edit_id,
        'type' => 'required',
        'phone1' => [
          'required',
          'regex:/^01[0-9]{9}$/',
          Rule::unique('customer_phones', 'number')->ignore($this->edit_id, 'customer_id'),
        ],
          'phone2' => [
            'nullable',
            'regex:/^01[0-9]{9}$/',
            Rule::unique('customer_phones', 'number')->ignore($this->edit_id, 'customer_id'),
          ],
        'city' =>    'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
        'address' => 'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
        'remarks' => 'nullable|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',

                    ];
}


    public function closeModal()
    {
      $this->reset(['name','national_id','remarks','type','store_ids','phone1','mail',
      'phone2' ,'city' ,'address']); 
    }


  
public function store(){
    try{
   $this->check_permission($this->write_permission);
  $validatedData = $this->validate();
  $this->customerService ->store($validatedData,$this->store_ids,[$this->phone1,$this->phone2]);
 $this->success();

      }catch (\Exception $e) {
        DB::rollBack();
        errorMessage($e);
     };   
}




public function edit(int $id){
  $edit= customer::findOrFail($id);
  if($edit){
   $this->edit_id = $id;
   $this->name =$edit->name;
   $this->mail =$edit->mail;
   $this->national_id =$edit->national_id;
   $this->type =$edit->type;
   $this->store_ids= $edit->stores->pluck('id')->toArray();
   $this->phone1=$edit->phone->pluck('number')->first();
   $this->phone2=$edit->phone->pluck('number')->last();
   $this->city=$edit->address->pluck('city')->first();
   $this->address=$edit->address->pluck('address')->first();
   $this->remarks =$edit->remarks;
  }else{
   return redirect()->back();
  }
 
 
  }
 
 public function editAddresses(int $id){
  $edit= customerAddress::findOrFail($id);
  if($edit){
    $this->edit_id = $id;
    $this->city =$edit->city;
    $this->address =$edit->address;
   }

  }



  public function updateAddress(){
    try {
      $this->check_permission($this->write_permission);
      $validatedData = $this->validate([
        'city' =>    'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
        'address' => 'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
      ]);
     $address=customerAddress::findOrFail($this->edit_id);
    $address-> update([
        'city'=>$validatedData['city'],
        'address'=>$validatedData['address'],
               ]);
      $this->dispatch('closeModal');
      $this->reset(['city' ,'address']);
       successMessage();
     }catch (\Exception $e){
      errorMessage($e);
     }
  }


  public function deleteAddress(int $id){
    try {
      $this->check_permission($this->write_permission);
      customerAddress::FindOrFail($id)->delete();
    successMessage();
     }catch (\Exception $e){
      errorMessage($e);
     }
 } 


  public function update(){
    try{
      $this->check_permission($this->write_permission);
  $validatedData = $this->validate();
  $this->customerService->update($this->edit_id, $validatedData,$this->store_ids,[$this->phone2,$this->phone2]);
  $this->success();
      }catch (\Exception $e) {
        DB::rollBack();
        errorMessage($e);
     };     
  }
 

  public function gettingId(int $selected_id){
    $this->selected_id= $selected_id;
    }



    public function addAddress(){ 
      try {
        $this->check_permission($this->write_permission);
        $validatedData = $this->validate([
          'city' =>    'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
          'address' => 'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
        ]);
        customerAddress::create([
          'customer_id'=>$this->selected_id,
          'city'=>$validatedData['city'],
          'address'=>$validatedData['address'],
                 ]);
        $this->dispatch('closeModal');
        $this->reset(['city' ,'address']);
      successMessage();
       }catch (\Exception $e){
        errorMessage($e);
       }
    }

 public function delete(){
    try {
      $this->check_permission($this->write_permission);
      Customer::FindOrFail($this->selected_id)->delete();
    successMessage();
     }catch (\Exception $e){
      errorMessage($e);
     }
 } 

 public function select(int $id){
  try {
    $this->dispatch('customer-selected', $id);
   }catch (\Exception $e){
    errorMessage($e);
   }
} 





 #[Computed]
 public function customers(){

  return 
  $this->customerService->index($this->search,$this->sortfilter,$this->perpage);
 }

    public function render()
    {
        $types=CustomerType::all('name');
        return view('livewire.admin.customers.customer-index',compact('types'));
    }
}
