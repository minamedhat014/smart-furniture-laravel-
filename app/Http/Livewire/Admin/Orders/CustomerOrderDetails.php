<?php

namespace App\Http\Livewire\Admin\Orders;

use Livewire\Component;
use App\Traits\HasTable;
use App\Models\Warehouse;
use App\Models\OrderDetail;
use Livewire\Attributes\On;
use App\Models\customerOrder;
use App\Models\productDetail;
use App\services\CustomerOrderDetailsService;
use Illuminate\Support\Facades\DB;


class CustomerOrderDetails extends Component
{
    use HasTable;
    
    public $item_id =0;
    public $quantity =1;
    public $wharehouse= "WFG";
    public $remarks;
    public $items;
    public $customer_id;
    public $edit_id;
    public $delete_id;
    public $wharehouses;
    public $branch_extra_discount =0;
    public $unit_price;
    public $unit_price_after_discount;
    public $final_price;
    public $status;
    public $order_id;
    protected $customerOrderDetailsService;
    protected $write_permission ="write order details";



    public function __construct()
    {
        $this->customerOrderDetailsService = app(CustomerOrderDetailsService::class);
    }
    

 
    public function mount(){
        $this->check_permission('view orders');
        $this->items=productDetail::all('id','item_code');
        $this->wharehouses= Warehouse::all(); 
            }



      
 
protected function rules()
   {
        return [ 
        'order_id'=>'required|numeric',
        'item_id' => 'required|numeric',
        'quantity' => 'required|numeric',
        'unit_price' => 'required|numeric',
        'wharehouse' => 'required',
        'branch_extra_discount'=> 'numeric|required|between:0,0.85',
        'unit_price_after_discount' =>'required|numeric',
        'final_price'=>'required|numeric',
        'remarks'=>'nullable|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',

                    ];                   
}


public function closeModal()
{
 $this->reset(['item_id','quantity','wharehouse','remarks' ,'branch_extra_discount','unit_price_after_discount','final_price']);
}




 public function storeOrderDetails(){

    if($this ->status =='open'){
      try{
        $validatedData = $this->validate();
       $this->customerOrderDetailsService->store($validatedData);
       $this->success();
        }catch (\Exception $e) {
            DB::rollBack();
            errorMessage($e);
       };
      } else{
        session()->flash('error', 'order status is not open'); 
      }
}




 public function edit(int $id){
 $edit= OrderDetail::findOrFail($id);
 if($edit){
  
 }else{
  return redirect()->back();
 }
 $this->edit_id=$id;
$this->item_id=$edit->item_id;
$this->quantity=$edit->quantity;
$this->wharehouse=$edit->wharehouse;
$this->branch_extra_discount=$edit->branch_extra_discount;
$this->unit_price=$edit->unit_price;
$this->remarks=$edit->remarks;
 }



 public function update(){
    if($this ->status =='open'){
    try{
    $validatedData = $this->validate();
     $this->customerOrderDetailsService->update($this->edit_id,$validatedData);
     $this->success();
     }catch (\Exception $e) {
     DB::rollBack();
    errorMessage($e); 
    } 
     }else{
        session()->flash('error', 'order status is not open');
    }
 }

 public function deleteID(int $delete_id){
    $this->delete_id= $delete_id;
    }

 public function delete(){
    if($this ->status =='open'){
       try {
     OrderDetail::FindOrFail($this->delete_id)->delete();
     successMessage() ;
    }catch (\Exception $e){
        DB::rollBack();
       errorMessage($e);
}
}else{
    session()->flash('error', 'order status is not open');
 }
}


    public function render()
    {
        $data= OrderDetail::with('order','productDetails')
        ->where('order_id' ,$this->order_id)
        ->orderBy('id',$this->sortfilter)->paginate($this->perpage);
         $this->status = customerOrder::FindOrFail($this->order_id)->status->name;
        if($this->item_id){
        $this->unit_price = ProductDetail::with(['price' => function ($query) {
            $query->where('pricable_id', $this->item_id);
        }])->first()->price->final_price;
        $this->unit_price_after_discount = $this->unit_price  - ($this->unit_price * $this->branch_extra_discount );
        $this->final_price = $this->unit_price_after_discount * $this->quantity;
    }
        return view('livewire.admin.orders.customer-order-details' ,compact('data'));
    }
}
