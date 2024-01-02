<?php

namespace App\Http\Livewire\Admin\Orders;

use Livewire\Component;
use App\Models\Customer;
use App\Models\showRoom;
use App\Models\OrderDetail;
use App\Models\showRoomTeam;
use Livewire\WithPagination;
use App\Models\customerOrder;
use App\Models\CustomerPhone;
use Livewire\WithFileUploads;
use App\Models\customerAddress;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Notifications\orderNotification;
use Illuminate\Support\Facades\Notification;

class OrderIndex extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    use WithFileUploads;

 
     public $search;
     public $perpage =5;
     public $sortfilter ='desc';
     public $user;
     public $sourceFilter =null;
     public $statusFilter= null ;
     public $branches=[];
     public $sales=[];
     public $customer_id= null;
     public $branch_id;
     public $status_id =1;
     public $sales_name;
     public $delivery_address_id;
     public $delivery_date;
     public $edit_id;
     public $delete_id;
     public $address=[];
     public $company_id;
     public $customer=[];
     public $photos;
     public $getId;
   
  


    public function mount(){
        $this->user=Auth::user()->name;  
        $this->company_id=Auth::user()->company_id;
        if($this->company_id === 1){
            $this->customer_id= Customer::first()->id;
        }else{
        $this->customer_id= Customer::whereRelation('stores','company_id',$this->company_id)->first()->id;
        }
            }

    protected $listeners =[
        'gettingCustomerID'     
     ];

  public function gettingCustomerID(int $id){
   $this->customer_id= $id;
  }

   public function updated($feilds)
   {
       $this->validateOnly($feilds);
   }
   
   protected $queryString = ['search'];

       public function closeModal()
       {
        $this->reset(['branch_id','status_id','sales_name','delivery_address_id','photos'
    ]);
       }
   
      
 
protected function rules()
   {
        return [ 
        'customer_id' => 'required|numeric',
        'branch_id' => 'required|numeric',
        'status_id' => 'required',
        'sales_name'=>'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
        'delivery_address_id'=>'required|numeric',
        'delivery_date'=>'date',
        'photos.*' => 'required|image|mimes:jpeg,png,pdf|max:1024', // 1MB Max
       
                    ];                   
}



public function save()
{
try {
    foreach ($this->photos as $photo) {
        $photo->store('products');
}} catch (\Exception $e) {
    session()->flash('error',$e);
      };
}

public function removePhoto($index)
{
    // Remove the photo at the specified index
    unset($this->photos[$index]);

    // Optionally, you might want to re-index the array
    $this->photos = array_values($this->photos);
}



 public function store(){
    $validatedData = $this->validate();
      try{
   DB::beginTransaction();
    $order=customerOrder::create([
        'customer_id'=>$validatedData['customer_id'],
        'branch_id'=>$validatedData['branch_id'],
        'status_id'=>$validatedData['status_id'],
        'sales_name'=>$validatedData['sales_name'],
        'delivery_address_id'=>$validatedData['delivery_address_id'],
        'delivery_date'=>$validatedData['delivery_date'],
        'created_by' => $this->user,
         ]);
         foreach($this->photos as $photo){
            $order->addMedia($photo)->toMediaCollection('orders'); 
     }
     DB::commit();
    $this->reset(['branch_id','status_id','sales_name','delivery_address_id','photos'
  ]);

  $this->emit('closeModal');
    session()->flash('success', 'Done sucessfully'); 
        }catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', $e); 
       };   
}




 public function edit(int $id){
 $edit= customerOrder::findOrFail($id);
 if($edit){
  
 }else{
  return redirect()->back();
 }
 $this->edit_id=$id;
$this->branch_id=$edit->branch_id;
$this->status_id=$edit->status_id;
$this->sales_name=$edit->sales_name;
$this->delivery_address_id=$edit->delivery_address_id;
$this->delivery_date=$edit->delivery_date;
 }

 public function update(){
    $validatedData = $this->validate();
    try{
    $order= customerOrder::FindOrFail($this->edit_id)
     ->update([
        'customer_id'=>$validatedData['customer_id'],
        'branch_id'=>$validatedData['branch_id'],
        'status_id'=>$validatedData['status_id'],
        'sales_name'=>$validatedData['sales_name'],
        'delivery_address_id'=>$validatedData['delivery_address_id'],
        'delivery_date'=>$validatedData['delivery_date'],
         'updated_by'=>$this->user,
     ]); 
     if(count($this->photos) > 0){
        $order->clearMediaCollection('products');
        foreach($this->photos as $photo){
            $order->addMedia($photo)->toMediaCollection('orders'); 
        };}
     $this->reset(['branch_id','status_id','sales_name','delivery_address_id','photos'
    ]);
  $this->emit('closeModal');
  session()->flash('success', 'Done sucessfully'); 
}catch (\Exception $e) {
    DB::rollBack();
    session()->flash('error', $e ); 
} 
 }

 public function getId(int $id){
    $this->delete_id= $id;
    $this->getId=$id;
    }

 public function delete(){
   try {
     customerOrder::FindOrFail($this->delete_id)->delete();
     session()->flash('success', 'Done sucessfully'); 
    }catch (\Exception $e){
        DB::rollBack();
        session()->flash('error', $e );
    }
}

public function sendOrder(){
    try {
        if(OrderDetail::where('order_id',$this->getId)->exists()){
           $order= customerOrder::findOrfail($this->getId);
           $order->update([
                'status_id' =>5, //sent to factory
            ]);
            $order->updates()->create([
               'transaction_name' =>'order_status_5',
               'remarks' =>'sent order to factory ',
               'created_by'=>$this->user
            ]);

            Notification::send(FactorySalesRecipients(), new orderNotification($order));
            session()->flash('success', 'sent to factory sucessfully'); 
          }else{
                session()->flash('error', 'the order you attempting to send is empty'); 
            }      
        }
     catch (\Exception $e){
         DB::rollBack();
         session()->flash('error', $e );
     }
 }


    public function render()
    {
        if($this->company_id ===1){
         $this->branches =showRoom::all('id','name');
        }else{
       $this->branches =showRoom::where('company_id',$this->company_id)->get('id','name');
        }
             $this->sales= showRoomTeam::where('showRoom_id',$this->branch_id)->get();
             $this->customer=customer::with('stores','phone','address', )->where('id',$this->customer_id)->get()->first();
             $this->address=customerAddress::where('customer_id',$this->customer_id)->get();
             $data = customerOrder::with('customer','orderDetails','store','address','updates')
             ->where('customer_id',$this->customer_id)
             ->get();
            return view('livewire.admin.orders.order-index',compact('data')); 
    }
}
