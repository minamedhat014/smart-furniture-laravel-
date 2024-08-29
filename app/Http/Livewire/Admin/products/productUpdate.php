<?php

namespace App\http\Livewire\Admin\Products;

use App\Models\Product;
use App\Models\productDetail;
use App\Models\ProductUpdate as ModelsProductUpdate;
use App\Models\versionReason;
use App\Traits\HasMultiSelect;
use App\Traits\HasPhotosUpload;
use App\Traits\HasTable;
use Livewire\Component;


class productUpdate extends Component
{


  use HasTable;
  Use HasPhotosUpload;
  use HasMultiSelect;
   
    public $version_summary;
    public $product_id;
    public $reason_id;
    public $photos =[];
    public $delete_id;
    public $edit_id;
    public $ReasonFilter;
    public $productFilter;
    public $products;
    public $reasons;
    protected $write_permission ="write product version";
  
    

   public function mount(){
    $this->check_permission('view products versions');
    $this->products= Product::all('id','name');
    $this->reasons = versionReason::all('id','name'); 
   }


 public function closeModal(){
    $this->reset(['version_summary','items_code','product_id','reason_id','photos']);
 }

protected function rules()
   {
        return [ 
        'version_summary' => 'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
        'product_id'=>'required|numeric',
        'reason_id'=>'required|numeric',
        'photos.*' => 'image|mimes:jpeg,png,pdf|max:1024', // 1MB Max
                    ];
}

 
    // protected $queryString = ['search'];

 public function store(){
      try{
        $this->check_permission($this->write_permission);
        $validatedData = $this->validate();
  $versions=ModelsProductUpdate::create([
  'version_summary'=>$validatedData['version_summary'],
  'product_id'=>$validatedData['product_id'],
  'reason_id'=>$validatedData['reason_id'],
  'created_by'=> authName(),
         ]);
        foreach($this->photos as $photo){
            $versions->addMedia($photo)->toMediaCollection('versions'); 
     }
     $this->success();
        }catch (\Exception $e) {

          errorMessage($e);
       };   
}

 public function edit(int $id){
 $edit= ModelsProductUpdate::findOrFail($id);
 if($edit){
  $this->edit_id = $id;
  $this->version_summary =$edit->version_summary;
  $this->product_id =$edit->product_id;
  $this->reason_id =$edit->reason_id;
 }else{
  return redirect()->back();
 }


 }

 public function update(){

    try{
      $this->check_permission($this->write_permission);
     $validatedData = $this->validate();
     $versions= ModelsProductUpdate::FindOrFail($this->edit_id);
     $versions->update([
        'version_summary'=>$validatedData['version_summary'],
        'product_id'=>$validatedData['product_id'],
        'reason_id'=>$validatedData['reason_id'],
        'updated_by'=>authName(),
     ]);
     if(count($this->photos)>0){
        $versions->clearMediaCollection('versions');
        foreach($this->photos as $photo){
            $versions->addMedia($photo)->toMediaCollection('versions'); 
        };}
     $this->success();
    }catch(\Exception $e){
        errorMessage($e);
    }

 }

 


 public function deleteID(int $delete_id){
    $this->delete_id= $delete_id;
    }



 public function delete(){
   try {
      $this->check_permission($this->write_permission);
    ModelsProductUpdate::FindOrFail($this->delete_id)->delete();
      successMessage();
    }catch (\Exception $e){
    errorMessage($e);
    }
}


    public function render()
    {
      
      $data = ModelsProductUpdate::with('products','reasons')->when( $this->ReasonFilter,function($query){
        $query->where('reason_id',$this->ReasonFilter);
    })->when($this->productFilter,function($query){
        $query->where('product_id',$this->productFilter);
    })
      ->where('version_summary', 'like', '%'.$this->search.'%')->orderBy('id',$this->sortfilter)->paginate($this->perpage);

        return view('livewire.admin.products.product-update',compact('data',));
    }
}
