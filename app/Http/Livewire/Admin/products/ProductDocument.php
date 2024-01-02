<?php

namespace App\http\Livewire\Admin\products;

use App\Models\Product;
use Livewire\Component;
use App\Models\productDetail;
use Barryvdh\DomPDF\Facade\Pdf;

class productDocument extends Component
{
  
public $productID;
public $selected =[];

    protected $listeners =[
        'getProductId',
     
     ];
      
     public function getProductId($id){
      $this->productID = $id;
    
     
     }
 
     

    public function render()
    {
        $products =Product::where('id',$this->productID)->get();
        $this->selected= productDetail::where('product_id',$this->productID)->where('set',1)->get();
        $data= productDetail::where('product_id',$this->productID)->get();
        return view('livewire.Admin.products.product-document',compact('data','products'));
    }
}
