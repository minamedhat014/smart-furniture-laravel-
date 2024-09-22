<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\customerOrder;
use Livewire\Component;
use App\Models\Warehouse;
use App\Models\OrderDetail;
use App\Models\Price;
use App\Models\productDetail;
use App\Traits\HasTable;
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
    public $status;
    public $order_id;
    

 
    public function mount(){
      
        $this->items=productDetail::all('id','item_code');
        $this->wharehouses= Warehouse::all();
        $this->status=customerOrder::where('id',$this->order_id)->first()->status_id;
       
            }



      
 
protected function rules()
   {
        return [ 
        'order_id'=>'required|numeric',
        'item_id' => 'required|numeric',
        'quantity' => 'required|numeric',
        'unit_price' => 'required|numeric',
        'wharehouse' => 'required',
        'branch_extra_discount'=>'required|numeric|between:0,100',
        'remarks'=>'nullable|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',

                    ];                   
}


public function closeModal()
{
 $this->reset(['item_id','quantity','wharehouse','remarks' ,'branch_extra_discount']);
}


 public function storeOrderDetails(){
    $validatedData = $this->validate();
      try{
        DB::beginTransaction();
        OrderDetail::create([
        'order_id'=>$validatedData['order_id'],
        'item_id'=>$validatedData['item_id'],
        'quantity'=>$validatedData['quantity'],
        'unit_price'=>$validatedData['unit_price'],
        'wharehouse'=>$validatedData['wharehouse'],
        'branch_extra_discount'=>$validatedData['branch_extra_discount'],
        'remarks'=>$validatedData['remarks'],
        'created_by' => authName(),
         ]);

     DB::commit();
     $this->dispatch('closeModal');
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
$this->item_id=$edit->item_id;
$this->quantity=$edit->quantity;
$this->wharehouse=$edit->wharehouse;
$this->unit_price=$edit->unit_price;
$this->remarks=$edit->remarks;
 }

//  public function update(){
//     $validatedData = $this->validate();
//     try{
//      OrderDetail::FindOrFail($this->edit_id)
//      ->update([
//         'order_id'=>$validatedData['order_id'],
//         'item_id'=>$validatedData['item_id'],
//         'quantity'=>$validatedData['quantity'],
//         'unit_price'=>$validatedData['unit_price'],
//         'branch_extra_discount'=>$validatedData['branch_extra_discount'],
//         'unit_price_after_branch_discount'=>$validatedData['unit_price_after_branch_discount'],
//         'final_price'=>$validatedData['final_price'],
//         'cost_unit_price'=>$validatedData['cost_unit_price'],
//         'wharehouse'=>$validatedData['wharehouse'],
//         'remarks'=>$validatedData['remarks'],
//          'updated_by'=>$this->user,
//      ]); 
     
//      $this->reset(['item_id','quantity','wharehouse','remarks' ,'unit_price','unit_price_after_branch_discount','branch_extra_discount','final_price','cost_unit_price']);
//      $this->dispatch('closeModal');
//      session()->flash('success', 'Done sucessfully'); 
//      }catch (\Exception $e) {
//      DB::rollBack();
//      session()->flash('error', $e ); 
//     } 
//  }

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
        $data= OrderDetail::with('order','productDetails')
        ->where('order_id' ,$this->order_id)
        ->orderBy('id',$this->sortfilter)->paginate($this->perpage);
       
        if($this->item_id){
        $this->unit_price = ProductDetail::with(['price' => function ($query) {
            $query->where('pricable_id', $this->item_id);
        }])->first()->price->final_price;
    }

        return view('livewire.admin.orders.customer-order-details' ,compact('data'));
    }
}
