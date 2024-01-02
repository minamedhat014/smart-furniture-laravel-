<?php

namespace App\http\Livewire\Admin\Products;

use App\Models\installment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Installments extends Component
{


    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $search;
    public $perpage =5;
    public $sortfilter ='desc';
    public $statusFilter= null ;
    public $user;
    public $name;
    public $ends_at;
    public $status=1;
    public $remarks;
    public $start_from;
    public $edit_id;
    public $delete_id;

  


public function mount(){
$this->user=Auth::user()->name;

}
protected function rules()
   {
        return [ 
        'name' => 'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
        'start_from' => 'required|date',
        'ends_at'=>'required|date',
        'status'=>'numeric',
        'remarks'=>'max:250|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
                    ];
}

public function updated($feilds)
{
    $this->validateOnly($feilds);
}

public function updatingSearch()
    {
        $this->resetPage();
    }

public function store(){
      try{
        $validatedData = $this->validate();
 installment::create([
  'name'=>$validatedData['name'],
  'start_from'=>$validatedData['start_from'],
  'ends_at'=>$validatedData['ends_at'],
  'status'=>$validatedData['status'],
  'remarks'=>$validatedData['remarks'],
  'created_by'=> $this->user,
         ]);
         $this->reset(['name','start_from','ends_at','remarks']);
         session()->flash('success','done successfully');
         $this->emit('closeModal');
     }catch (\Exception $e) {

            session()->flash('error',$e);
       };   
}

 public function edit(int $id){
 $edit= installment::findOrFail($id);
 if($edit){
  $this->edit_id = $id;
  $this->name =$edit->name;
  $this->start_from =$edit->start_from;
  $this->ends_at =$edit->ends_at;
  $this->status =$edit->status;
  $this->remarks =$edit->remarks;
 }else{
  return redirect()->back();
 }


 }


 public function update(){

    try{
     $validatedData = $this->validate();
     $update= installment::FindOrFail($this->edit_id);
     $update->update([
  'name'=>$validatedData['name'],
  'start_from'=>$validatedData['start_from'],
  'ends_at'=>$validatedData['ends_at'],
  'status'=>$validatedData['status'],
  'remarks'=>$validatedData['remarks'],
  'updated_by'=> $this->user,
         ]);
         $this->reset(['name','start_from','ends_at','remarks']);
         session()->flash('success','done successfully');   
         $this->emit('closeModal');
    }catch(\Exception $e){
        session()->flash('error',$e);
    }

 }

 
public function launch(int $id){

    try{
 $inst=installment::where('id',$id)->update([
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
 installment::where('id',$id)->update([
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
     installment::FindOrFail($this->delete_id)->delete();
     session()->flash('success','done successfully');
    }catch (\Exception $e){
        session()->flash('error',$e);
    }
}

    
public function closeModal()
{
    $this->reset(['name','start_from','ends_at','remarks']); 
}

    public function render()
    {
        $data =installment::when($this->statusFilter,function($query){
            $query->where('status',$this->statusFilter);
        })
        ->where('name', 'like', '%'.$this->search.'%')->orderBy('id',$this->sortfilter)->paginate($this->perpage);
        return view('livewire.admin.products.installments',compact('data'));
    }
}
