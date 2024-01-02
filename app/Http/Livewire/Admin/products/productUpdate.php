<?php

namespace App\http\Livewire\Admin\Products;

use App\Models\Product;
use App\Models\product_update;
use App\Models\productDetail;
use App\Models\versionReason;
use App\Traits\withTable;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class productUpdate extends Component
{


    use WithPagination;
    protected $paginationTheme = 'bootstrap';

     public $search;
     public $perpage =5;
     public $sortfilter ='desc';
     use WithFileUploads;
   
    public $user;
    public $version_summary;
    public $items_code=[];
    public $product_id;
    public $selected = null;
    public $reason_id;
    public $photos =[];
    public $items=[];
    public $delete_id;
    public $edit_id;
    public $ReasonFilter;
    public $productFilter;
    public $products;
    public $reasons;
  
    

    public function updated($feilds)
    {
        $this->validateOnly($feilds);
    }
    
    protected $queryString = ['search'];
        
    
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




    public function save()
    {
    try {
        foreach ($this->photos as $photo) {
            $photo->store('products');
    }} catch (\Exception $e) {

        session()->flash('error',$e);
          };
  }

     public function mount()
     {
     $this->user= Auth::user()->name;        
     }
      
    public function updatedSelected($product_id){
    $this->product_id = $product_id;
    $this->items= productDetail::where('product_id',$product_id)->get();
    }



 

protected function rules()
   {
        return [ 
        'version_summary' => 'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
        'items_code' => 'required',
        'product_id'=>'required|numeric',
        'reason_id'=>'required|numeric',
        'photos.*' => 'image|mimes:jpeg,png,pdf|max:1024', // 1MB Max
                    ];
}

 
    // protected $queryString = ['search'];

 public function store(){
  
             $validatedData = $this->validate();

      try{
  $versions=product_update::create([
  'version_summary'=>$validatedData['version_summary'],
  'items_code'=>$validatedData['items_code'],
  'product_id'=>$validatedData['product_id'],
  'reason_id'=>$validatedData['reason_id'],
  'created_by'=> $this->user,
         ]);
        foreach($this->photos as $photo){
            $versions->addMedia($photo)->toMediaCollection('versions'); 
     }
       $this->reset(['version_summary','items_code','product_id','reason_id','photos']);
       session()->flash('success','done successfully');
       $this->emit('closeModal');
        }catch (\Exception $e) {

            session()->flash('error',$e);
       };   
}

 public function edit(int $id){
 $edit= product_update::findOrFail($id);
 if($edit){
  $this->edit_id = $id;
  $this->version_summary =$edit->version_summary;
  $this->items_code =$edit->items_code;
  $this->product_id =$edit->product_id;
  $this->reason_id =$edit->reason_id;
 }else{
  return redirect()->back();
 }


 }

 public function update(){

    try{
     $validatedData = $this->validate();
     $versions= product_update::FindOrFail($this->edit_id);
     $versions->update([
        'version_summary'=>$validatedData['version_summary'],
        'items_code'=>$validatedData['items_code'],
        'product_id'=>$validatedData['product_id'],
        'reason_id'=>$validatedData['reason_id'],
        'updated_by'=>$this->user,
     ]);
     if(count($this->photos)>0){
        $versions->clearMediaCollection('versions');
        foreach($this->photos as $photo){
            $versions->addMedia($photo)->toMediaCollection('versions'); 
        };}
     $this->reset(['version_summary','items_code','product_id','reason_id','photos']);
     $this->emit('closeModal');
     session()->flash('success','done successfully');   
    }catch(\Exception $e){
        session()->flash('error',$e);
    }

 }

 


 public function deleteID(int $delete_id){
    $this->delete_id= $delete_id;
    }



 public function delete(){
   try {
    product_update::FindOrFail($this->delete_id)->delete();
     session()->flash('success','done successfully');
    }catch (\Exception $e){
        session()->flash('error',$e);
    }
}


    public function render()
    {
        $this->products= Product::all('id','name');
        $this->reasons = versionReason::all('id','name'); 
        
      $data = product_update::with('products','reasons')->when( $this->ReasonFilter,function($query){
        $query->where('reason_id',$this->ReasonFilter);
    })->when($this->productFilter,function($query){
        $query->where('product_id',$this->productFilter);
    })
      ->where('version_summary', 'like', '%'.$this->search.'%')->orderBy('id',$this->sortfilter)->paginate($this->perpage);
      $items= productDetail::where('product_id',$this->product_id)->get('id','item_code');
        return view('livewire.admin.products.product-update',compact('data',));
    }
}
