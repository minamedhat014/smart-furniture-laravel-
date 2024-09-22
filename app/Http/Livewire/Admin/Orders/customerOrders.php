<?php

namespace App\Http\Livewire\Admin\Orders;

use Livewire\Component;
use App\Models\Customer;
use App\Models\showRoom;
use App\Models\OrderDetail;
use App\Models\showRoomTeam;
use App\Models\customerOrder;
use App\Models\customerAddress;
use App\Traits\HasPhotosUpload;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;
use App\services\customerOrderService;
use App\Notifications\orderNotification;
use App\Traits\HasSubTable;
use Illuminate\Support\Facades\Notification;


class customerOrders extends Component
{
    
use HasSubTable;
use HasPhotosUpload;

     public $sourceFilter =null;
     public $statusFilter= null ;
     public $branches=[];
     public $sales=[];
     public $branch_id = null;
     public $status_id =1;
     public $sales_name;
     public $delivery_address_id;
     public $edit_id;
     public $address=[];
     public $customer=[];
     public $customer_id;
     public $remarks;
     public $order;
     protected $customerOrderService;
  

     public function __construct()
     {
         $this->customerOrderService = app(customerOrderService::class);
     }
     
       
  public function mount(){
    if(userFactory()){
        $this->branches =showRoom::all();
       }else{
      $this->branches =showRoom::where('company_id',authedCompany())->get();
       }
  }

       public function closeModal()
       {
        $this->reset(['status_id','sales_name','delivery_address_id','photos','remarks',
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
        'remarks'=>'nullable|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
        'photos.*' => 'required|image|mimes:jpeg,png,pdf|max:1024', // 1MB Max
                    ];                   
}



public function select(int $id){
    try {
      $this->dispatch('order-selected', $id);
     }catch (\Exception $e){
      errorMessage($e);
     }
  } 
  

 public function storeOrder(){
    try{
    $validatedData = $this->validate();
    $this->customerOrderService->storeOrder($validatedData);
    $this->success();
   }catch (\Exception $e){
    errorMessage($e);
   }
}

public function orderDocument($id){
$this->order= customerOrder::findOrFail($id);
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
$this->remarks=$edit->remarks;
 }


 public function updateOrder(){
    try{
        $validatedData = $this->validate();
     $this->customerOrderService->update($this->edit_id, $validatedData);
      $this->success();
}catch (\Exception $e) {
    DB::rollBack();
    errorMessage($e);
} 
 }

 public function gettingId(int $id){
    $this->edit_id= $id;
  
    }

 public function delete(){
   try {
     customerOrder::FindOrFail($this->edit_id)->delete();
      successMessage();
    }catch (\Exception $e){
        DB::rollBack();
       errorMessage($e);
    }
}

public function sendOrder(){
    try {
        if(OrderDetail::where('order_id',$this->edit_id)->exists()){
           $order= customerOrder::findOrfail($this->edit_id);
           $order->update([
                'status_id' =>5, //sent to factory
            ]);
            $order->updates()->create([
               'transaction_name' =>'order_status_5',
               'remarks' =>'sent order to factory ',
               'created_by'=>$this->user
            ]);

            Notification::send(FactorySalesRecipients(), new orderNotification($order));
          successMessage('sent to factory sucessfully');
          }else{
               errorMessage('the order you are attempting to send is empty please add items firstly ');
            }      
        }
     catch (\Exception $e){
         DB::rollBack();
         errorMessage($e);
     }
 }

#[Computed]
 public function orders(){

    return 
  $this->customerOrderService->index($this->customer_id);
 }



    public function render()
    {
           $this->sales= showRoomTeam::where('showRoom_id',$this->branch_id)->get();     
            $this->customer=customer::with('stores','phone','address')->where('id',$this->customer_id)->first();
            $this->address=customerAddress::where('customer_id',$this->customer_id)->get();     
        return view('livewire.admin.orders.customer-orders'); 
    }
}
