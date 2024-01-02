<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\customerOrder;
use Livewire\Component;
use App\Models\Warehouse;
use App\Models\OrderDetail;
use App\Models\Price;
use Livewire\WithPagination;
use App\Models\productDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CustomerOrderDetails extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
 
     public $search;
     public $perpage =5;
     public $sortfilter ='desc';
   
   
    public $user;
    public $sourceFilter =null;
    public $statusFilter= null ;
    public $order_id;
    public $item_id;
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
    public $unit_price_after_branch_discount ;
    public $final_price;
    public $cost_unit_price;
    public $status;

 
    public function mount(){
        $this->user=Auth::user()->name;  
        $this->items=productDetail::all('id','item_code');
        $this->wharehouses= Warehouse::all();
        $this->status=customerOrder::where('id',$this->order_id)->first()->status_id;
            }

 public function updatingSearch()
{
    session()->flash('error', 'search is not active in this page'); 
}

   public function updated($feilds)
   {
       $this->validateOnly($feilds);
   }
   

       public function closeModal()
       {
        $this->reset(['item_id','quantity','wharehouse','remarks' ,'unit_price','unit_price_after_branch_discount','branch_extra_discount','final_price','cost_unit_price']);
       }
   
      
 
protected function rules()
   {
        return [ 
        'order_id'=>'required|numeric',
        'item_id' => 'required|numeric',
        'quantity' => 'required|numeric',
        'wharehouse' => 'required',
        'unit_price'=>'required|required|regex:/^\d+(\.\d{1,2})?$/',
        'cost_unit_price'=>'required|required|regex:/^\d+(\.\d{1,2})?$/',
        'final_price'=>'required|required|regex:/^\d+(\.\d{1,2})?$/',
        'unit_price_after_branch_discount'=>'required|required|regex:/^\d+(\.\d{1,2})?$/',
        'branch_extra_discount'=>'required|numeric|between:0,100',
        'remarks'=>'nullable|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',

                    ];                   
}


 public function store(){
    $validatedData = $this->validate();
      try{
        DB::beginTransaction();
        OrderDetail::create([
        'order_id'=>$validatedData['order_id'],
        'item_id'=>$validatedData['item_id'],
        'quantity'=>$validatedData['quantity'],
        'wharehouse'=>$validatedData['wharehouse'],
        'unit_price'=>$validatedData['unit_price'],
        'branch_extra_discount'=>$validatedData['branch_extra_discount'],
        'cost_unit_price'=>$validatedData['cost_unit_price'],
        'unit_price_after_branch_discount'=>$validatedData['unit_price_after_branch_discount'],
        'final_price'=>$validatedData['final_price'],
        'remarks'=>$validatedData['remarks'],
        'created_by' => $this->user,
         ]);

     DB::commit();
     $this->emit('closeModal');
     $this->reset(['item_id','quantity','wharehouse','remarks' ,'unit_price','unit_price_after_branch_discount','branch_extra_discount','final_price','cost_unit_price']);
    session()->flash('success', 'Done sucessfully'); 
        }catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', $e); 
       };   
}




 public function edit(int $id){
 $edit= OrderDetail::findOrFail($id);
 if($edit){
  
 }else{
  return redirect()->back();
 }
 $this->edit_id=$id;
$this->order_id=$edit->order_id;
$this->item_id=$edit->item_id;
$this->quantity=$edit->quantity;
$this->wharehouse=$edit->wharehouse;
$this->unit_price=$edit->unit_price;
$this->unit_price_after_branch_discount=$edit->unit_price_after_branch_discount;
$this->final_price=$edit->final_price;
$this->remarks=$edit->remarks;
 }

 public function update(){
    $validatedData = $this->validate();
    try{
     OrderDetail::FindOrFail($this->edit_id)
     ->update([
        'order_id'=>$validatedData['order_id'],
        'item_id'=>$validatedData['item_id'],
        'quantity'=>$validatedData['quantity'],
        'unit_price'=>$validatedData['unit_price'],
        'branch_extra_discount'=>$validatedData['branch_extra_discount'],
        'unit_price_after_branch_discount'=>$validatedData['unit_price_after_branch_discount'],
        'final_price'=>$validatedData['final_price'],
        'cost_unit_price'=>$validatedData['cost_unit_price'],
        'wharehouse'=>$validatedData['wharehouse'],
        'remarks'=>$validatedData['remarks'],
         'updated_by'=>$this->user,
     ]); 
     
     $this->reset(['item_id','quantity','wharehouse','remarks' ,'unit_price','unit_price_after_branch_discount','branch_extra_discount','final_price','cost_unit_price']);
     $this->emit('closeModal');
     session()->flash('success', 'Done sucessfully'); 
     }catch (\Exception $e) {
     DB::rollBack();
     session()->flash('error', $e ); 
    } 
 }

 public function deleteID(int $delete_id){
    $this->delete_id= $delete_id;
    }

 public function delete(){
       try {
     OrderDetail::FindOrFail($this->delete_id)->delete();
     session()->flash('success', 'Done sucessfully'); 
    }catch (\Exception $e){
        DB::rollBack();
        session()->flash('error', $e );
    }
}



    public function render()
    {
        if($this->item_id){
        $this->unit_price = Price::where('product_detail_id',$this->item_id)->first()->end_after_discount;

        $this->unit_price_after_branch_discount = round($this->unit_price - $this->unit_price * $this->branch_extra_discount/100 ,2) ;
        $this->final_price = round($this->unit_price_after_branch_discount * $this->quantity,2);
        $this->cost_unit_price= Price::where('product_detail_id',$this->item_id)->first()->	dealler_price;
        }
        $data= OrderDetail::with('order','productDetails')
        ->where('order_id' ,$this->order_id)
        ->orderBy('id',$this->sortfilter)->paginate($this->perpage);
        return view('livewire.admin.orders.customer-order-details' ,compact('data'));
    }
}
