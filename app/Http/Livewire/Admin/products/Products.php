<?php

namespace App\http\Livewire\Admin\Products;


use Exception;
use App\Models\Product;
use Livewire\Component;
use App\Models\Material;
use App\Traits\HasTable;
use App\Models\productType;
use App\Models\productSource;
use App\Traits\HasMultiSelect;
use App\Traits\HasPhotosUpload;
use Livewire\Attributes\Locked;
use App\services\ProductService;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductDetailsExport;
use Ghanem\LaravelSmsmisr\Facades\Smsmisr;



class products extends Component
{
    use HasMultiSelect;
    use HasPhotosUpload;
    use HasTable;
    
  


    public $sourceFilter = null;
    public $statusFilter = null ;
    public $startDate ;
    public $endDate;  

    public $name
    ,$type_id
    ,$source_id,
    $descripation,
    $divisablity ;
    
    #[Locked]
    public $edit_id;
    #[Locked]
    public $delete_id;
    #[Locked]
    public $product_id;
    public $Standard_ability;

    public $sku;
    public $item_material=[];
    public $fabric;
    public $sponge ;
    public $sponge_thickness;

    public $types;
    public $warranty_years;
    public $sources ;
    public $Materials;  
    public $chair_added;   
    public $coshin_number;      
    public $coshin_color;
    public $product;
    protected $ProductService;
    protected $write_permission ='write product';



public function __construct()
{
    $this->ProductService = app(ProductService::class);
}
   
  
  



       public function closeModal()
       {
        $this->reset(['name','type_id','source_id','descripation','item_material','warranty_years',
        'sku','divisablity','fabric','sponge','sponge_thickness','photos','Standard_ability','chair_added','coshin_color','coshin_number',
        
     ]);
       
       }
   

   public function mount(){
    $this->check_permission('view products');
    $this->types =productType ::all(['id','name']);
    $this->sources =productSource::all(['id','name']);
    $this->Materials =Material::all();  
   }


protected function rules()
   {
        return [ 'name' => 'required|min:3|regex:/^[a-zA-Z0-9\s\-]+$/u|unique:products,name,'.$this ->edit_id,
        'type_id' => 'required',
        'source_id' => 'required',
        'sku'=>'required|min:3|regex:/^[a-zA-Z0-9\s\-]+$/u|unique:products,sku'.$this ->edit_id,
        'descripation'=>'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
        'divisablity'=>'required',
        'warranty_years'=>'nullable|numeric|max:10',
        'item_material'=>'required:max:250',
        'fabric'=>'nullable|max:250|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
        'Standard_ability'=>'required',
        'sponge'=>'max:250',
        'chair_added'=>'',
        'coshin_number'=>'nullable|numeric|max:20',
        'sponge_thickness'=>'nullable|numeric|max:100',
        'photos.*' => 'required|image|mimes:jpeg,png,pdf|max:1024', // 1MB Max
                    ];

                   
}




    // protected $queryString = ['search'];

 public function store(){
    try{ 
        $this->check_permission($this->write_permission);
        $validatedData = $this->validate();
        $this->ProductService->store($validatedData);
        $this->success();
              }catch (\Exception $e) {
                  DB::rollBack();
                  errorMessage($e);
             };   
}



 public function edit(int $id){
 $edit= Product::findOrFail($id);
 if($edit){
  $this-> edit_id= $id;
  $this->name =$edit->name;
  $this->sku =$edit->sku;
  $this->type_id =$edit->type_id;
  $this->source_id =$edit->source_id;
  $this->Standard_ability =$edit->Standard_ability ;
  $this->descripation =$edit->descripation ;
  $this->item_material =$edit->materials->pluck('id')->toArray();
  $this->chair_added = $edit->chair_added;
  $this->divisablity =$edit->divisablity;
  $this->fabric =$edit->fabric;
  $this->sponge =$edit->sponge;
  $this->sponge_thickness =$edit->sponge_thickness;
  $this->coshin_number =$edit->coshin_number;
  $this->coshin_color =$edit->coshin_color;
 
 }else{
  return redirect()->back();
 }


 }




 public function update(){
    try{   
        $this->check_permission($this->write_permission);
     $validatedData = $this->validate();
     $this->ProductService->update($validatedData,$this->edit_id);
    $this->success();
  }catch (\Exception $e) {
    DB::rollBack();
    errorMessage($e);
 } 
 }



 public function cancel(){ 
    try{
        $this->check_permission($this->write_permission);
     $this->ProductService->cancel($this->product_id);
    }catch(\Exception $e){
        DB::rollBack();
        errorMessage($e);
    }  
    }



    public function launch(){ 
    try{
        $this->check_permission($this->write_permission);
        $this->ProductService->launch($this->product_id);
    }catch (\Exception $e) {
    DB::rollBack();
    errorMessage($e);
    } 
       }

       
    public function productImage(int $id){ 
        try{
            $this->product =Product::findOrFail($id);
        }catch (\Exception $e) {  
        errorMessage($e);
        } 
           }
    


 public function deleteID(int $delete_id){
    $this->delete_id= $delete_id;
    }


public function productID(int $product_id){
        $this->product_id= $product_id;
    }
   

 public function delete(){
   try {
    $this->check_permission($this->write_permission);
    $this->ProductService->delete($this->delete_id);
    }catch (\Exception $e){
        DB::rollBack();
        errorMessage($e);
    }
}


public function export() 
{
    try{   
        $this->check_permission('export products');
        return Excel::download(new ProductDetailsExport($this->startDate,$this->endDate), 'products.xlsx');
        $this->startDate ='';
        $this->endDate = '' ;
       successMessage();
    }catch (\Exception $e){
        errorMessage($e);
    }
}



#[Computed]
public function data(){

    return $this->ProductService->index($this->sourceFilter , $this->statusFilter,$this->search,$this->sortfilter,$this->perpage);
}
 

public function render()
    {
   
        return view('livewire.Admin.products.Products');
     
    }
}








