<?php

namespace App\http\Livewire\Admin\Customers;

use App\Models\City;
use Livewire\Component;
use App\Models\Customer;
use App\Models\showRoom;
use App\Models\CustomerType;
use Livewire\WithPagination;

use App\Models\CustomerPhone;
use App\Models\customerAddress;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class CustomerIndex extends Component
{
  use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $perpage =5;
    public $sortfilter ='desc';
public $user;
public $branches=['']; 
public $company_id;
public $customer_id;
public $name;
public $national_id;
public $store_ids =[];
public $type;
public $phone1;
public $phone2;
public $remarks;
public $city;
public $address;
public $cities;
public $edit_id;
public $selected_id;
public $editAddress;


public function mount(){
  $this->user= Auth::user()->name.Auth::user()->id;
  $this-> cities = City::all('id','name');
  $this->company_id= Auth::user()->company_id;
  if(userFactory()){
   $this->branches = showRoom::all('id','name');
  }else{
    $this->branches = showRoom::where('company_id',$this->company_id)->get('id','name');
  }

}


protected function rules()
   {
        return [ 
        'name' => 'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
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



public function updated($feilds)
{
    $this->validateOnly($feilds);
   
}



public function updatingSearch()
    {
        $this->resetPage();
    }

protected $queryString = ['search'];
    

    public function closeModal()
    {
      $this->reset(['name','national_id','remarks','type','store_ids','phone1',
      'phone2' ,'city' ,'address']); 
    }

    public function hydrate(){
      $this->dispatchBrowserEvent('pharaonic.select2.init');
      $this->dispatchBrowserEvent('pharaonic.select2.load', [
          'component' => $this->id,
          'target'    => '#multiSelect'
      ]);
   }
  
public function store(){
  DB::beginTransaction();
    try{
  $validatedData = $this->validate();
  $customer = Customer::create([
'name'=>$validatedData['name'],
'national_id'=>$validatedData['national_id'],
'type'=>$validatedData['type'],
'remarks'=>$validatedData['remarks'],
'created_by' => $this->user,
       ]);
  $this->customer_id = $customer->id;
  $client = Customer::findOrFail($this->customer_id);
  $client->stores()->sync($this->store_ids);
  $data=[$this->phone1,$this->phone2];
  foreach ($data as $row){
    if(!is_null($row)){
      CustomerPhone::create(['number'=>$row,'customer_id'=>$this->customer_id]);      
  }};
  customerAddress::create([
    'customer_id'=>$this->customer_id,
    'city'=>$validatedData['city'],
    'address'=>$validatedData['address'],
           ]);
  $this->emit('closeModal');
  session()->flash('success','done successfully customer code is '.$this->customer_id );
  $this->reset(['name','national_id','remarks','type','store_ids','phone1',
  'phone2' ,'city' ,'address']);
     DB::commit();
      }catch (\Exception $e) {
        DB::rollBack();
          session()->flash('error', $e); 
     };   
}


public function edit(int $id){
  $edit= customer::findOrFail($id);
  if($edit){
   $this->edit_id = $id;
   $this->name =$edit->name;
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
      $validatedData = $this->validate([
        'city' =>    'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
        'address' => 'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
      ]);
     $address=customerAddress::findOrFail($this->edit_id);
    $address-> update([
        'city'=>$validatedData['city'],
        'address'=>$validatedData['address'],
               ]);
      $this->emit('closeModal');
      $this->reset(['city' ,'address']);
      session()->flash('success','done successfully');
     }catch (\Exception $e){
         session()->flash('error',$e);
     }
  }


  public function deleteAddress(int $id){
    try {
      customerAddress::FindOrFail($id)->delete();
      session()->flash('success','done successfully');
     }catch (\Exception $e){
         session()->flash('error',$e);
     }
 } 


  public function update(){
    DB::beginTransaction();
    try{
  $validatedData = $this->validate();
  $customer = Customer::findOrFail($this->edit_id);
  $customer->update([
'name'=>$validatedData['name'],
'national_id'=>$validatedData['national_id'],
'type'=>$validatedData['type'],
'remarks'=>$validatedData['remarks'],
'updated_by' => $this->user,
       ]);
  $customer->stores()->syncWithoutDetaching($this->store_ids);

  $data=[$this->phone1,$this->phone2];
  CustomerPhone::where('customer_id',$this->edit_id)->delete();
  foreach ($data as $row){
    if(!is_null($row)){
      CustomerPhone::create(['number'=>$row,'customer_id'=>$this->edit_id]);      
  }};
  customerAddress::where('customer_id',$this->edit_id)->delete();
  customerAddress::create([
    'customer_id'=>$this->edit_id,
    'city'=>$validatedData['city'],
    'address'=>$validatedData['address'],
           ]);
  $this->emit('closeModal');
  session()->flash('success','done successfully');
  $this->reset(['name','national_id','remarks','type','store_ids','phone1',
  'phone2' ,'city' ,'address']);
     DB::commit();
      }catch (\Exception $e) {
        DB::rollBack();
          session()->flash('error', $e); 
     };     
  }
 

  public function getId(int $selected_id){
    $this->selected_id= $selected_id;
    }

    public function addAddress(){ 
      try {
        $validatedData = $this->validate([
          'city' =>    'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
          'address' => 'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
        ]);
        customerAddress::create([
          'customer_id'=>$this->selected_id,
          'city'=>$validatedData['city'],
          'address'=>$validatedData['address'],
                 ]);
        $this->emit('closeModal');
        $this->reset(['city' ,'address']);
        session()->flash('success','done successfully');
       }catch (\Exception $e){
           session()->flash('error',$e);
       }
    }

 public function delete(){
    try {
      Customer::FindOrFail($this->selected_id)->delete();
      session()->flash('success','done successfully');
     }catch (\Exception $e){
         session()->flash('error',$e);
     }
 } 

    
    public function render()
    {
  
      if(userFactory()){
       $data= Customer::with('stores','phone','address')
       ->where('name', 'like', '%'.$this->search.'%')
      ->orWhereHas('phone', function ($query) {
        $query->where('number', 'like', '%' . $this->search . '%');})
        ->orwhere('national_id','like','%' . $this->search . '%')
       ->orderBy('id',$this->sortfilter)->paginate($this->perpage);
      }
         else{
        $data= Customer::with('stores','phone','address')
        ->whereRelation('stores', 'Company_id', $this->company_id)
        ->when($this->search,function($query){
      $query->where('name', 'like', '%'.$this->search.'%')
      ->orwhereRelation('phone','number', 'like', '%' . $this->search . '%');
        })
        ->orderBy('id',$this->sortfilter)->paginate($this->perpage); 

          if(CustomerPhone::where('number',$this->search)->exists() or Customer::where('national_id',$this->search)->exists()){
            $data= Customer::with('stores','phone','address')
            ->orwhereRelation('phone', 'number',$this->search)
             ->orwhere('national_id',$this->search)
            ->orderBy('id',$this->sortfilter)->paginate($this->perpage); 
          } 
      };
      $types=CustomerType::all('name');
        return view('livewire.admin.customers.customer-index',compact('data','types'));
    }
}
