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

    

public $productID;
public $type;
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
  

 public function gettingProductID($id,$type){
     $this->productID= $id;
     $this->type= $type;

 }



 public function closeModal()
 {
    $this->reset('item_code','descripation','component_name','item_color','quantity','item_hieght','item_width','item_depth','remarks');
 }

    public function render()
    {
        $id=$this->productID; 
        $componentNames=ProductComponent::where('type_id',$this->type)->get();
        return view('livewire.admin.products.product-details-modal',compact('id','componentNames'));
    }
}
