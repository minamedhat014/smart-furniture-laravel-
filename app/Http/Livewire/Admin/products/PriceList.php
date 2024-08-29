<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Price;
use App\Models\Product;
use Livewire\Component;
use App\Traits\withTable;
use Livewire\WithPagination;
use App\Models\productDetail;
use App\View\Components\product as ComponentsProduct;

class PriceList extends Component
{
    



   public $search;
   public $product_id =null ;
   public $products;
   public $total_price;
  

 
   public function updatingSearch()
       {
        session()->flash('error','please select product ... search is not supported in this page');
       }
       
    public function mount(){
    $this->products=Product::
    where('status',2)
     ->get();

}



    public function render()
    {
       
         $selected=Product::with('media','type')->where('id',$this->product_id)->where('name', 'like', '%'.$this->search.'%')->get();
        $data =productDetail::with('product','price')
        ->where('product_id', $this->product_id)->get();

        $sets =productDetail::with('price')
        ->where('product_id', $this->product_id)
        ->where('set', 1)
        ->get();

        return view('livewire.admin.products.price-list', compact('data','selected','sets'));
    }
}
