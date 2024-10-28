<?php

namespace App\Http\Livewire\Admin\Orders;

use Livewire\Component;
use App\Models\Customer;
use App\Models\showRoom;
use App\Models\showRoomTeam;
use App\Models\customerOrder;
use App\Models\customerAddress;
use App\services\AppointmentService;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;
use App\services\customerOrderService;
use App\Traits\HasFilesUpload;
use App\Traits\HasSubTable;



class customerOrders extends Component
{
    
use HasSubTable;
use HasFilesUpload;


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
     public $appointment_start;
     public $appointment_end;
     public $appointment_importence;
     public $trackedOrder;
     protected $customerOrderService;
     protected $AppointmentService;
  

     public function __construct()
     {
         $this->customerOrderService = app(CustomerOrderService::class);
         $this->AppointmentService = app(AppointmentService::class);
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
        'trackedOrder','appointment_start','appointment_end','appointment_importence'
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

public function confirmOrder(){
    try{
    $validatedData = $this->validate([
       'files.*' => 'nullable|file|mimes:pdf|max:5048',
       'remarks'=>'nullable|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
        'edit_id'=>'required',

    ]);
    $this->customerOrderService->confirmOrder($validatedData);
   $this->closeModal();
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

    
 public function orderTrack(int $id){
    $this->trackedOrder= customerOrder::FindOrFail($id);
  
    }


 public function delete(){
   try {
     customerOrder::FindOrFail($this->edit_id)->delete();
     $this->success();
    }catch (\Exception $e){
        DB::rollBack();
       errorMessage($e);
    }
}

public function sendOrder(){
    try {
        $validatedData = $this->validate([
            'remarks'=>'nullable|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
             'edit_id'=>'required',
     
         ]);

        $this->customerOrderService->sendOrder($validatedData);
        $this->closeModal();
        }
     catch (\Exception $e){
         DB::rollBack();
         errorMessage($e);
     }
 }

 
public function sendBack(){
    try {
        $validatedData = $this->validate([
            'remarks'=>'nullable|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
             'edit_id'=>'required',
         ]);

        $this->customerOrderService->sendBack($validatedData);
        $this->closeModal();
        }
     catch (\Exception $e){
         DB::rollBack();
         errorMessage($e);
     }
 }


 public function addDeliveryAppointment(){
    try{
    $order = customerOrder::findOrFail($this->edit_id);
    $validatedData = $this->validate([
        'appointment_start'=>'required|date_format:Y-m-d\TH:i|after:'.$order->created_at,
        'appointment_end'=>'required|date_format:Y-m-d\TH:i|after:appointment_start',
        'appointment_importence'=>'required|numeric',
        'remarks'=>'nullable|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',

     ]);
    $this->AppointmentService->store($validatedData,$order);
    $this->success();
    }catch (\Exception $e){
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
