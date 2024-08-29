<?php

namespace App\http\Livewire\Admin\products;

use App\Models\offer;
use Livewire\Component;
use App\Models\productDetail;
use App\Models\ProductComponent;
use Illuminate\Support\Facades\DB;
use App\services\ProductDetailsService;
use App\Traits\HasPhotoUpload;
use App\Traits\HasTable;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;

class productDetails extends Component
{

use HasTable;
Use HasPhotoUpload;

#[Locked]
public $product_id;
public $type_id;
public $item_code;
public $descripation;
public $item_color;
public $item_material;
public $item_hieght;
public $item_width;
public $item_out_depth;
public $item_inner_depth;
public $component_name;
public $remarks;
public $quantity =1;
public $product_detail_id;
public $name;
public $status;
public $selected =[];
public $photo;
public $original_price;
public $final_price;
public $offers;
public $componentNames;
protected $productDetailsService;
protected $write_permission="write product";


public function __construct()
{
    $this->productDetailsService = app(ProductDetailsService::class);
}
 

protected function rules()
{
        return [ 
            'item_code' =>'required|min:3|regex:/^[a-zA-Z0-9\s\-]+$/u|unique:product_details,item_code,'.$this-> product_detail_id,
            'descripation' => 'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
            'component_name' => 'required',
            'quantity'=>'required|int|max:6',
            'item_color' => 'required',
            'item_hieght'=>'required|numeric|max:350',
            'item_width'=>'required|numeric|max:400',
            'item_out_depth'=>'required|numeric|max:250',
            'item_inner_depth'=>'required|numeric|max:250',
            'remarks'=>'nullable|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
            'original_price' => 'required|numeric|between:0,100000.99',
            'final_price' => 'required|numeric|between:0,100000.99',
            'photo' => 'nullable|image|mimes:jpeg,png,pdf|max:1024', // 1MB Max
                    ];
}

 
public function mount(){
    $this->componentNames=ProductComponent::where('type_id',$this->type_id)->get();
}



public function closeModal()
    {
        $this->reset(
        'item_code','descripation','component_name','item_color','quantity',
        'item_hieght','item_width','item_out_depth','item_inner_depth','remarks'
        ,'photo','status','original_price','final_price',
    );
    }

     

public function store(){
    try{
        $this->check_permission($this->write_permission);
        $validatedData = $this->validate();
        $this->productDetailsService->store($this->product_id,$validatedData);
       $this->success();
    }catch(\Exception $e){
        DB::rollBack();
        errorMessage($e);
    }

 }

 public function edit($id){

    $edit= productDetail::with('price')->where('id',$id)->first();

    if($edit){
     $this->product_detail_id= $id;
     $this->item_code =$edit->item_code;
     $this->descripation=$edit->descripation;
     $this->component_name =$edit->component_name;
     $this->quantity =$edit->quantity;
     $this->item_color =$edit->item_color;
     $this->item_hieght =$edit->item_hieght;
     $this->item_width =$edit->item_width;
     $this->item_out_depth =$edit->item_out_depth;
     $this->item_inner_depth =$edit->item_inner_depth;
     $this->remarks =$edit->remarks;
     $this->original_price= $edit->price->original_price;
     $this->final_price =$edit->price->final_price;
    }else{
     return redirect()->back();
 }
}


public function update(){
   try{
    $this->check_permission($this->write_permission);
    $validatedData = $this->validate();
    $this->productDetailsService->update($this->product_detail_id,$validatedData);
      $this->success();
     }catch(\Exception $e){
         DB::rollBack();
         errorMessage($e);
     }  
     }


 
 public function deleteID(int $id){
    $this->product_detail_id= $id;
    }


   public function removeSet(int $id){
    try{
        $this->check_permission($this->write_permission);
     $this->productDetailsService->removeSet($id);
       }catch(\Exception $e){
        errorMessage($e);
       }
        }
    

     public function AddToSet(int $id){
    try{
        $this->check_permission($this->write_permission);
       $this->productDetailsService->AddToSet($id);
       }catch(\Exception $e){
        errorMessage($e);
       }
            }
        


    public function delete(){
        try{
            $this->check_permission($this->write_permission);
         $this->productDetailsService->delete($this->product_detail_id);
        }catch(\Exception $e){
            errorMessage($e);
        }
    }

 
    #[Computed]
    public function data(){
        return productDetail::with('product','price')->where('product_id',$this->product_id)->get();
    }
  
    public function render()
    {
     
        $id=$this->product_id;
        $this->selected= productDetail::where('product_id',$this->product_id)->where('set',1)->get();
        return view('livewire.Admin.products.product-details',compact('id'));
    }
}
