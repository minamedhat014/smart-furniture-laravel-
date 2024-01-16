<?php

namespace App\http\Livewire\Admin\Products;

use Exception;
use App\Models\Admin;
use App\Models\Product;
use Livewire\Component;
use App\Models\Material;
use App\Models\productType;
use Livewire\WithPagination;
use App\Models\productDetail;
use App\Models\productSource;
use Livewire\WithFileUploads;
use Jorenvh\Share\ShareFacade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Notifications\productCancel;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductDetailsExport;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use App\Notifications\productCancelNotification;
use App\Notifications\productEmailNotification;
use App\Notifications\productLaunchNotification;
use App\Traits\withTable;
use Illuminate\Support\Collection;

class Products extends Component
{
  
   
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
 
     public $search;
     public $perpage =5;
     public $sortfilter ='desc';
   
   
    public $user;
    public $sourceFilter =null;
    public $statusFilter= null ;
    public $sourceExcel =null;
    public $statusExcel = null ;
    public $name
    ,$type_id
    ,$source_id,
    $descripation,
    $divisablity ,
    $edit_id ,$delete_id,
    $product_id;
    public $Standard_ability;
    public $item_material=[''];
    public $fabric;
    public $sponge ;
    public $sponge_thickness;
    public $photos =[];
    public $types ;
    public $sources ;
    public $Materials;
    public $startDate;
    public $endDate;   
    public $chair_added;   
    public $coshin_number;      
    public $coshin_color;  
  
  

   public function updated($feilds)
   {
       $this->validateOnly($feilds);
   }
   
   protected $queryString = ['search'];
       
   

public function updatingSearch()
{
    $this->resetPage();
}
       public function closeModal()
       {
          $this->reset();
       
       }
   
       public function hydrate(){
         $this->dispatchBrowserEvent('pharaonic.select2.init');
         $this->dispatchBrowserEvent('pharaonic.select2.load', [
             'component' => $this->id,
             'target'    => '#multiSelect'
         ]);
      }
     
   



   public function mount(){
    $this->user=Auth::user()->name;
   }


protected function rules()
   {
        return [ 'name' => 'required|min:3|regex:/^[a-zA-Z0-9\s\-]+$/u|unique:products,name,'. $this ->edit_id,
        'type_id' => 'required',
        'source_id' => 'required',
        'descripation'=>'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
        'divisablity'=>'required',
        'item_material'=>'required:max:250',
        'fabric'=>'nullable|max:250|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
        'Standard_ability'=>'required',
        'sponge'=>'max:250',
        'chair_added'=>'',
        'coshin_number'=>'nullable|numeric|max:20',
        'coshin_color'=>'nullable|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
        'sponge_thickness'=>'nullable|numeric|max:100',
        'photos.*' => 'required|image|mimes:jpeg,png,pdf|max:1024', // 1MB Max
                    ];

                   
}

 
public function save()
{
try {
    foreach ($this->photos as $photo) {
        $photo->store('products');
}} catch (\Exception $e) {
    session()->flash('error',$e);
      };
}

public function removePhoto($index)
{
    // Remove the photo at the specified index
    unset($this->photos[$index]);

    // Optionally, you might want to re-index the array
    $this->photos = array_values($this->photos);
}



    // protected $queryString = ['search'];

 public function store(){
      try{
   DB::beginTransaction();
    $validatedData = $this->validate();
    $product=Product::create([
  'name'=>$validatedData['name'],
  'type_id'=>$validatedData['type_id'],
  'source_id'=>$validatedData['source_id'],
  'descripation'=>$validatedData['descripation'],
  'item_material'=>$validatedData['item_material'],
  'chair_added'=>$validatedData['chair_added'],
  'divisablity'=>$validatedData['divisablity'],
  'Standard_ability'=>$validatedData['Standard_ability'],
  'fabric'=>$validatedData['fabric'],
  'sponge'=>$validatedData['sponge'],
  'sponge_thickness'=>$validatedData['sponge_thickness'],
  'coshin_number'=>$validatedData['coshin_number'],
  'coshin_color'=>$validatedData['coshin_color'],
  'created_by' => $this->user,
         ]);
        foreach($this->photos as $photo){
            $product->addMedia($photo)->toMediaCollection('products'); 
     }
     DB::commit();
    $this->reset(['name','type_id','source_id','descripation','item_material',
     'divisablity','fabric','sponge','sponge_thickness','photos','Standard_ability','chair_added','coshin_color','coshin_number',
  ]);
  $this->emit('closeModal');
    session()->flash('success', 'Done sucessfully'); 
        }catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', $e); 
       };   
}

 public function edit(int $id){
 $edit= Product::findOrFail($id);
 if($edit){
  $this-> edit_id= $id;
  $this->name =$edit->name;
  $this->type_id =$edit->type_id;
  $this->source_id =$edit->source_id;
  $this->Standard_ability =$edit->Standard_ability ;
  $this->descripation =$edit->descripation ;
  $this->item_material = $edit->item_material;
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
        
     $validatedData = $this->validate();
     $product=Product::FindOrFail($this->edit_id);
     $product->update([
     'name'=>$validatedData['name'],
     'type_id'=>$validatedData['type_id'],
     'source_id'=>$validatedData['source_id'],
     'descripation'=>$validatedData['descripation'],
     'item_material'=>$validatedData['item_material'],
     'divisablity'=>$validatedData['divisablity'],
     'Standard_ability'=>$validatedData['Standard_ability'],
     'chair_added'=>$validatedData['chair_added'],
     'fabric'=>$validatedData['fabric'],
     'sponge'=>$validatedData['sponge'],
     'sponge_thickness'=>$validatedData['sponge_thickness'],
     'coshin_number'=>$validatedData['coshin_number'],
     'coshin_color'=>$validatedData['coshin_color'],
     'updated_by'=>$this->user,
     ]); 
     if(count($this->photos) > 0){
        $product->clearMediaCollection('products');
        foreach($this->photos as $photo){
            $product->addMedia($photo)->toMediaCollection('products'); 
        };}
     $this->reset(['name','type_id','source_id','descripation','item_material',
     'divisablity','fabric','sponge','sponge_thickness','photos','Standard_ability','chair_added','coshin_number','coshin_color',
  ]);
  $this->emit('closeModal');
  session()->flash('success', 'Done sucessfully'); 
}catch (\Exception $e) {
    DB::rollBack();
    session()->flash('error', $e ); 
} 
 }

 public function cancel(){ 
    try{
     Product::where('id',$this->product_id)->update([
     'status'=> 3,
     'updated_by'=>$this->user,
     ]);
     session()->flash('success', 'Done sucessfully'); 
     $product=Product::findOrFail($this->product_id);
     $product->updates()->create([
        'transaction_name'=>'product_status_3',
        'remarks'=> 'product cancelled',
        'created_by'=>$this->user,
     ]);
     $user= Admin::all(['id','name']);
     Notification::send($user, new productCancelNotification($product));
    }catch(\Exception $e){
        DB::rollBack();
    session()->flash('error', $e ); 
    }  
    }

    public function launch(){ 
        try{
        Product::where('id',$this->product_id)->update([
        'status'=> 2,
        'updated_by'=>$this->user,
        ]);
        session()->flash('success', 'Done sucessfully'); 
        $product=Product::findOrFail($this->product_id);

        $product->updates()->create([
           'transaction_name'=>'product_status_2',
           'remarks'=> 'product launched',
           'created_by'=>$this->user,
        ]);
        $user= Admin::all();
        Notification::send($user, new productLaunchNotification($product));
    }catch (\Exception $e) {
    DB::rollBack();
    session()->flash('error', $e ); 
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
     Product::FindOrFail($this->delete_id)->delete();
     session()->flash('success', 'Done sucessfully'); 
    }catch (\Exception $e){
        DB::rollBack();
        session()->flash('error', $e );
    }
}



public function export() 
{
    try{
    return Excel::download(new ProductDetailsExport($this->sourceExcel,$this->statusExcel,$this->startDate,$this->endDate), 'products.xlsx');
    session()->flash('success', 'Done sucessfully'); 
    $this->sourceExcel= '';
    $this->statusExcel= '';
    $this->startDate ='';
    $this->endDate='';  
    }catch (\Exception $e){
        session()->flash('error', $e );
    }
}




    public function render()
    {
        $this->types =productType ::all(['id','name']);
        $this->sources =productSource::all(['id','name']);
        $this->Materials =Material::all(['name']);      

        $data =Product::with('type','source','media','updates')
        ->when( $this->sourceFilter,function($query){
            $query->where('source_id',$this->sourceFilter);
        })->when($this->statusFilter,function($query){
            $query->where('status',$this->statusFilter);
        })
        ->where('name', 'like', '%'.$this->search.'%')->orderBy('id',$this->sortfilter)->paginate($this->perpage);
        $id =$this->product_id;
        return view('livewire.Admin.products.Products',compact('data','id',));
        
    }
}








