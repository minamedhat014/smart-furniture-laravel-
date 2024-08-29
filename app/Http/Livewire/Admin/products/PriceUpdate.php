<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;
use App\Models\productType;
use Livewire\WithPagination;
use App\Models\productSource;
use App\Traits\HasTable;

class PriceUpdate extends Component
{
 
use HasTable;
     
    public $sourceFilter =null;
    public $statusFilter= null ;
    public $selectPage = false;
    public $checked=[];
    public $types ;
    public $sources ;


    
protected function rules()
{
     return [
        

     
   
                 ];

                
}

    public function updatedSelectPage($value)
    {
      if($value){


        
      }else{
        $this->checked=[];
      }
    }
    
   
        
    
 
 
    




    public function mount(){

        $this->types =productType ::all(['id','name']);
        $this->sources =productSource::all(['id','name']);
            
    
       }
    

    public function render()
    {

       
        $data =Product::with('type','source','media','updates')
        ->when( $this->sourceFilter,function($query){
            $query->where('source_id',$this->sourceFilter);
        })->when($this->statusFilter,function($query){
            $query->where('status',$this->statusFilter);
        })
        ->where('name', 'like', '%'.$this->search.'%')->orderBy('id',$this->sortfilter)->paginate($this->perpage);
        return view('livewire.admin.products.price-update',compact('data'));
    }
}
