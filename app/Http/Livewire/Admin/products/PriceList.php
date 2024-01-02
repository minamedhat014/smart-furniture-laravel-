<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Price;
use App\Models\Product;
use App\Models\productDetail;
use App\Traits\withTable;
use App\View\Components\product as ComponentsProduct;
use Livewire\Component;

class PriceList extends Component
{
  


   public $user;
   public $product_id =null ;
   public $products;
   public $total_price;
  


    public function render()
    {
        $this->products=Product::
       where('status',2)
        ->get();

         $selected=Product::with('media','type')->where('id',$this->product_id)->get();

        $data =productDetail::with('product','price')
        ->where('product_id', $this->product_id)->get();

        $sets =productDetail::with('price')
        ->where('product_id', $this->product_id)
        ->where('set', 1)
        ->get();

        return view('livewire.admin.products.price-list', compact('data','selected','sets'));
    }
}
