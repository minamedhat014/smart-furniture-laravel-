<?php

namespace App\http\Livewire\admin\products;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\productDetail;
use App\Models\ProductComponent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class productDetailsModal extends Component
{

    
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

public $search;
public $productID;
public $type;
public $user;
public $item_code;
public $descripation;
public $item_color;
public $item_material;
public $item_hieght;
public $item_width;
public $item_depth;
public $component_name;
public $remarks;
public $quantity;
public $product_detail_id;
public $name;



protected $listeners =[
    'gettingitemID','gettingProductID'
 
 ];
  
 public function mount(){
    $this->user= Auth::user()->name.Auth::user()->id; 
 }
 public function gettingProductID($id,$type){
     $this->productID= $id;
     $this->type= $type;

 }



 public function closeModal()
 {
    $this->reset('item_code','descripation','component_name','item_color','quantity','item_hieght','item_width','item_depth','remarks');
 }

 public function gettingitemID($id){

    $edit= productDetail::findOrFail($id);
   
    if($edit){
     $this->product_detail_id= $id;
     $this->item_code =$edit->item_code;
     $this->descripation=$edit->descripation;
     $this->component_name =$edit->component_name;
     $this->quantity =$edit->quantity;
     $this->item_color =$edit->item_color;
     $this->item_hieght =$edit->item_hieght;
     $this->item_width =$edit->item_width;
     $this->item_depth =$edit->item_depth;
     $this->remarks =$edit->remarks;
    }else{
     return redirect()->back();
 }
}
 

protected function rules()
{
        return [ 
            'item_code' => 'required|min:3|regex:/^[a-zA-Z0-9\s\-]+$/u|unique:product_details,item_code,'.$this->product_detail_id ,
            'descripation' => 'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
            'component_name' => 'required',
            'quantity'=>'required|int|max:6',
            'item_color' => 'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
            'item_hieght'=>'required|numeric|max:350',
            'item_width'=>'required|numeric|max:400',
            'item_depth'=>'required|numeric|max:250',
            'remarks'=>'',
            
                    ];
}

 
public function updated($feilds)
{
    $this->validateOnly($feilds);
}
protected $queryString = ['search'];

public function edit(int $id){

    $edit= productDetail::findOrFail($id);
   
    if($edit){
     $this->product_detail_id= $id;
     $this->item_code =$edit->item_code;
     $this->descripation=$edit->descripation;
     $this->component_name =$edit->component_name;
     $this->quantity =$edit->quantity;
     $this->item_color =$edit->item_color;
     $this->item_hieght =$edit->item_hieght;
     $this->item_width =$edit->item_width;
     $this->item_depth =$edit->item_depth;
     $this->remarks =$edit->remarks;
    }else{
     return redirect()->back();
    }
}


public function store(){
   try{
        $validatedData = $this->validate();
        productDetail::create([
    'product_id'=>$this->productID,
     'item_code'=>$validatedData['item_code'],
     'descripation'=>$validatedData['descripation'],
     'component_name'=>$validatedData['component_name'],
     'item_color'=>$validatedData['item_color'],
     'quantity'=>$validatedData['quantity'],
     'item_hieght'=>$validatedData['item_hieght'],
     'item_width'=>$validatedData['item_width'],
     'item_depth'=>$validatedData['item_depth'],
     'remarks'=>$validatedData['remarks'],
     'created_by'=> $this->user,
        ]);
    
        $this->reset('item_code','descripation','component_name','item_color','quantity','item_hieght','item_width','item_depth','remarks');
        session()->flash('success','done successfully');
        $this->emit('closeModal');
   
    }catch(\Exception $e){
        DB::rollBack();
        session()->flash('error',$e);
    }
 }


 public function update(){
   try{
     $validatedData = $this->validate();
   $details= productDetail::FindOrFail($this-> product_detail_id);
   $details->update([
        'product_id'=>$this->productID,
        'item_code'=>$validatedData['item_code'],
        'descripation'=>$validatedData['descripation'],
        'component_name'=>$validatedData['component_name'],
        'item_color'=>$validatedData['item_color'],
        'quantity'=>$validatedData['quantity'],
        'item_hieght'=>$validatedData['item_hieght'],
        'item_width'=>$validatedData['item_width'],
        'item_depth'=>$validatedData['item_depth'],
        'remarks'=>$validatedData['remarks'],
        'updated_by'=> $this->user,
     ]);
     $this->reset('item_code','descripation','component_name','item_color','quantity','item_hieght','item_width','item_depth','remarks');
     session()->flash('success','done successfully');
     $this->emit('closeModal');
    }catch(\Exception $e){
        DB::rollBack();
        session()->flash('error',$e);
    }  
    }

 
    public function deleteID(int $id){
        $this->product_detail_id= $id;
        }

        public function delete(){
    
            try{
             productDetail::FindOrFail($this->product_detail_id)->delete();
             session()->flash('success','done successfully');
            }catch(\Exception $e){
                session()->flash('error',$e);
            }
        }

  
    public function render()
    {
        $id=$this->productID; 
        $componentNames=ProductComponent::where('type_id',$this->type)->get();
        return view('livewire.admin.products.product-details-modal',compact('id','componentNames'));
    }
}
