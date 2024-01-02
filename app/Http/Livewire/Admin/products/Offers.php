<?php

namespace App\http\Livewire\Admin\Products;

use App\Models\offer;
use App\Models\offersType;
use App\Models\productType;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Offers extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $search;
    public $perpage =5;
    public $sortfilter ='desc';
    public $statusFilter= null ;
    public $user;
    public $name;
    public $start_date;
    public $end_date;
    public $type_id;
    public $requirments;
    public $product_types=[];
    public $remarks;
    public $status =1 ;
    public $applied_on;
    public $not_applied_on;
    public $delete_id;
    public $edit_id;
    public $offers;
    public $productsType;
    public $success= false;

  
    

     public function mount()
     {
        $this->user= Auth::user()->name.Auth::user()->id; 
     }
      
    


protected function rules()
   {
        return [ 
        'name' => 'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
        'start_date' => 'required|date',
        'end_date'=>'required|date',
        'type_id'=>'required',
        'status'=>'numeric',
        'product_types'=>'required',
        'requirments'=>'max:250|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
        'remarks'=>'max:250|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
        'applied_on'=>'max:250|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
        'not_applied_on'=>'max:250|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
                    ];
}

public function hydrate(){
    $this->dispatchBrowserEvent('pharaonic.select2.init');
    $this->dispatchBrowserEvent('pharaonic.select2.load', [
        'component' => $this->id,
        'target'    => '#multiSelect'
    ]);
  }

public function updated($feilds)
{
    $this->validateOnly($feilds);
}
protected $queryString = ['search'];
public function updatingSearch()
    {
        $this->resetPage();
    }
    
    protected $listeners = ['produtTypeSelected'];

    public function produtTypeSelected($value)
    {
    
        $this->product_types =$value;
    } 
    // protected $queryString = ['search'];

 public function store(){
      try{
        $validatedData = $this->validate();
  offer::create([
  'name'=>$validatedData['name'],
  'start_date'=>$validatedData['start_date'],
  'end_date'=>$validatedData['end_date'],
  'type_id'=>$validatedData['type_id'],
  'product_types'=>$validatedData['product_types'],
  'requirments'=>$validatedData['requirments'],
  'status'=>$validatedData['status'],
  'remarks'=>$validatedData['remarks'],
  'applied_on'=>$validatedData['applied_on'],
  'not_applied_on'=>$validatedData['not_applied_on'],
  'created_by'=> $this->user,
         ]); 
         $this->emit('closeModal');
         session()->flash('success','done successfully');
     }catch (\Exception $e) {

            session()->flash('error',$e);
       };   
}

 public function edit(int $id){
 $edit= offer::findOrFail($id);
 if($edit){
  $this->edit_id = $id;
  $this->name =$edit->name;
  $this->start_date =$edit->start_date;
  $this->end_date =$edit->end_date;
  $this->type_id =$edit->type_id;
  $this->product_types = $edit->product_types;
  $this->requirments =$edit->requirments;
  $this->status =$edit->status;
  $this->remarks =$edit->remarks;
  $this->applied_on =$edit->applied_on;
  $this->not_applied_on =$edit->not_applied_on;
 }else{
  return redirect()->back();
 }


 }

 public function update(){

    try{
     $validatedData = $this->validate();
     $offers= offer::FindOrFail($this->edit_id);
     $offers->update([
  'name'=>$validatedData['name'],
  'start_date'=>$validatedData['start_date'],
  'end_date'=>$validatedData['end_date'],
  'type_id'=>$validatedData['type_id'],
  'product_types'=>$validatedData['product_types'],
  'requirments'=>$validatedData['requirments'],
  'status'=>$validatedData['status'],
  'remarks'=>$validatedData['remarks'],
  'applied_on'=>$validatedData['applied_on'],
  'not_applied_on'=>$validatedData['not_applied_on'],
  'updated_by'=> $this->user,
         ]);
         $this->reset(['name','start_date','end_date','type_id','product_types','requirments','applied_on','not_applied_on']);
         $this->emit('closeModal');
         session()->flash('success','done successfully');   
    }catch(\Exception $e){
        session()->flash('error',$e);
    }

 }

 
public function launch(int $id){

    try{
 offer::where('id',$id)->update([
 'status'=>2,
 'updated_by'=>$this->user,
    ]); 
   session()->flash('success','done successfully');    

    }catch(\Exception $e){
    session()->flash('error',$e);
}
}


public function suspend(int $id){
    try{
 offer::where('id',$id)->update([
 'status'=>3,
 'updated_by'=>$this->user,
    ]); 
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
     offer::FindOrFail($this->delete_id)->delete();
     session()->flash('success','done successfully');
    }catch (\Exception $e){
        session()->flash('error',$e);
    }
}


public function closeModal()
{
   $this->reset(['name','start_date','end_date','type_id','product_types','requirments','applied_on','not_applied_on']);
}

    public function render()
    {
        $this->offers = offersType::all() ;
      $this->productsType = productType::all('name');

        $data =offer::with('typeOffer')->when($this->statusFilter,function($query){
            $query->where('status',$this->statusFilter);
        })
        ->where('name', 'like', '%'.$this->search.'%')->orderBy('id',$this->sortfilter)->paginate($this->perpage);
        return view('livewire.admin.products.offers',compact('data'));
    }
}
