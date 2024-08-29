<?php

namespace App\http\Livewire\Admin\Products;


use Livewire\Component;
use App\Models\ProductRate;
use App\Traits\HasTable;
use Livewire\WithPagination;
use Illuminate\Queue\Listener;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ProductReview extends Component
{

 use HasTable;
    public $products;
    public $selected_product;
    public $product_id;
    public $price_scale;
    public $price_recomendation;
    public $material_scale;
    public $material_recomendation;
    public $colors_scale;
    public $colors_recomendation;
    public $design_scale;
    public $design_recomendation;
    public $general_scale;
    public $delete_id;
    public $edit_id;
    public $data;

 

 


    protected function rules()
    {
         return [ 
        'product_id' => 'int',
        'price_scale' => 'required|int',
        'price_recomendation' => 'regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',  
        'material_scale' => 'required|int',
        'material_recomendation' => 'regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',  
        'colors_scale' => 'required|int',
        'colors_recomendation' => 'regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',  
        'design_scale' => 'required|int',
        'design_recomendation' => 'regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',  
        'general_scale' => 'required|int',  

                     ];
 }

 public function store(){
    try{
  $validatedData = $this->validate();
  ProductRate::create([
'product_id'=>$validatedData['product_id'],
'price_scale'=>$validatedData['price_scale'],
'price_recomendation'=>$validatedData['price_recomendation'],
'material_scale'=>$validatedData['material_scale'],
'material_recomendation'=>$validatedData['material_recomendation'],
'colors_scale'=>$validatedData['colors_scale'],
'colors_recomendation'=>$validatedData['colors_recomendation'],
'design_scale'=>$validatedData['design_scale'],
'design_recomendation'=>$validatedData['design_recomendation'],
'general_scale'=>$validatedData['general_scale'],
'created_by'=> authName(),
       ]);

       $this->success('thank your for your feedback');
      }catch (\Exception $e) {
         errorMessage($e);
     };   
}


protected function closeModal()
    {
        $this->reset(['price_scale','price_recomendation','material_scale','material_recomendation','design_scale','design_recomendation','general_scale'
  ,'colors_scale','colors_recomendation'
]);
    }
    
public function edit(int $id){
$this->edit_id =$id;
}



public function update(){
    try{
  $validatedData = $this->validate();
 $updateRate= ProductRate::findOrFail($this->edit_id);
 $updateRate->update([
'product_id'=>$validatedData['product_id'],
'price_scale'=>$validatedData['price_scale'],
'price_recomendation'=>$validatedData['price_recomendation'],
'material_scale'=>$validatedData['material_scale'],
'material_recomendation'=>$validatedData['material_recomendation'],
'colors_scale'=>$validatedData['colors_scale'],
'colors_recomendation'=>$validatedData['colors_recomendation'],
'design_scale'=>$validatedData['design_scale'],
'design_recomendation'=>$validatedData['design_recomendation'],
'general_scale'=>$validatedData['general_scale'],
'created_by'=> authName(),
       ]);
$this->success('thank your for your feedback');
      }catch (\Exception $e) {
          errorMessage($e);
     };   
}

public function deleteID(int $delete_id){
    $this->delete_id= $delete_id;
    }


 public function delete(){
   try {
    ProductRate::FindOrFail($this->delete_id)->delete();
   successMessage();
    }catch (\Exception $e){
        DB::rollBack();
        errorMessage($e);
    }
}





    public function render()
    {
        $this->data=ProductRate::where('product_id',$this->product_id)->where('created_by',authName())->get();
        $id = $this->product_id;
        return view('livewire.admin.products.product-review');
    }
}
