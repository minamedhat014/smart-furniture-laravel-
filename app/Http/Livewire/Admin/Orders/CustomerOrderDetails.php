<?php

namespace App\Http\Livewire\Admin\Orders;

use Livewire\Component;
use App\Traits\HasTable;
use App\Models\Warehouse;
use App\Models\OrderDetail;
use Livewire\Attributes\On;
use App\Models\customerOrder;
use App\Models\Price;
use App\Models\productDetail;
use App\services\CustomerOrderDetailsService;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;

class CustomerOrderDetails extends Component
{
    use HasTable;
    
    public $item_id =0;
    public $quantity =1;
    public $wharehouse= "WFG";
    public $remarks;
    public $items =[];
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
    public $order_type;
    public $specifications;
    public $area = 0;
    protected $customerOrderDetailsService;
    protected $write_permission ="write order details";



    public function __construct()
    {
        $this->customerOrderDetailsService = app(CustomerOrderDetailsService::class);
    }
    

 
    public function mount(){
        $this->check_permission('view orders');   
        $this->order_type = customerOrder::findOrFail($this->order_id)->order_type;
        $this->items= $this->customerOrderDetailsService->getItems($this->order_type); 
        $this->wharehouses= Warehouse::all(); 
            }
            protected function rules()
            {
                $rules = [ 
                    'order_id' => 'required|numeric',
                    'item_id' => 'required|numeric',
                    'quantity' => 'required|numeric',
                    'unit_price' => 'required|numeric',
                    'wharehouse' => 'required',
                    'branch_extra_discount' => 'numeric|required|between:0,0.85',
                    'unit_price_after_discount' => 'required|numeric',
                    'final_price' => 'required|numeric',
                    'specifications'=>'nullable',
                    'area'=>'nullable',
                    'order_type' => 'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
                    'remarks' => 'nullable|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
                ];
            
                // Conditionally add rules for specifications and area based on order_type
                if ($this->order_type === "kitchen non-standard" || $this->order_type === "living non-standard") {
                    $rules['specifications'] = 'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-\,\.]+$/u';
                    $rules['area'] = 'nullable|numeric';
                }          
                return $rules;                   
            }
            


public function closeModal()
{
 $this->reset(['item_id','quantity','wharehouse','remarks','unit_price' ,'branch_extra_discount',
 'unit_price_after_discount','final_price','specifications','area']);
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
$this->specifications=$edit->specifications;
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

   #[Computed]
   public function data(){
    return
    $this->customerOrderDetailsService->index($this->order_id,$this->search,$this->sortfilter,$this->perpage);
   }
    public function render()
    {
        $this->status = customerOrder::FindOrFail($this->order_id)->status->name; 

      
         
        
        if($this->item_id && $this->order_type !=="kitchen non-standard"){
        $this->unit_price = Price::where('pricable_id', $this->item_id)->first()->final_price;
        $this->unit_price_after_discount = $this->unit_price  - ($this->unit_price * $this->branch_extra_discount );
        $this->final_price = $this->unit_price_after_discount * $this->quantity;
    }

    if($this->item_id && $this->order_type == "kitchen non-standard"){
        preg_match('/(\d+)\s*-\s*(\d+)/',$this->specifications, $matches);
        if (count($matches) === 3) {
            $num1 = intval($matches[1]);  
            $num2 = intval($matches[2]); 
            $this->area =  ($num1 * $num2/100);
    }
    }

    if($this->item_id && $this->order_type == "kitchen non-standard" && $this->area > 0){
        $this->unit_price =  ceil(Price::where('pricable_id', $this->item_id)->first()->final_price / $this->area);
        $this->unit_price_after_discount = $this->unit_price  - ($this->unit_price * $this->branch_extra_discount );
        $this->final_price = $this->unit_price_after_discount * $this->quantity;
    }

        return view('livewire.admin.orders.customer-order-details');
    }
}
