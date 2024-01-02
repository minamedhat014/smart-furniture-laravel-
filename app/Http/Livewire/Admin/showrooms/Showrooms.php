<?php

namespace App\http\Livewire\Admin\Showrooms;

use toastr;
use App\Models\Company;
use Livewire\Component;
use App\Models\showroom;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Showrooms extends Component
{


    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $search;
    public $perpage =5;
    public $sortfilter ='desc';
    public $name;
    public $working_from;
    public $working_to;
    public $location;
    public $phone;
    public $company_id;
    public $status;
    public $created_by;
    public $updated_by;
    public $user;
    public $edit_id;
    public $delete_id;
    public $showroom_id;
    public $user_company_id;
  
  
   
  

     public function mount()
     {
         $this->user= Auth::user()->name;  
         $this->user_company_id= Auth::user()->company_id;    
     }
      

     public function closeModal()
     {
         $this->reset(['name','working_from','working_to','location','phone','company_id']);
     }
     
protected function rules()
   {
        return [ 'name' => 'required|min:3|unique:show_rooms,name,'. $this ->edit_id,
        'working_from' => 'required',
        'working_to' => 'required',
        'location' => 'required|max:400',
        'phone'=>'required|regex:/^01[0-9]{9}$/',
        'company_id'=>'required|integer',
        'created_by'=>'',
        'updated_by'=>'',
                    ];
}

 
public function updated($feilds)
{
     $this->validateOnly($feilds); }

public function updatingSearch()
    {
        $this->resetPage();
    }
    

     protected $queryString = ['search'];

 public function store(){
  
             $validatedData = $this->validate();
      try{
        showroom::create([
  'name'=>$validatedData['name'],
  'working_from'=>$validatedData['working_from'],
  'working_to'=>$validatedData['working_to'],
  'location'=>$validatedData['location'],
  'phone'=>$validatedData['phone'],
  'company_id'=>$validatedData['company_id'],
  'created_by'=> $this->user,
         ]);

         $this->reset(['name','working_from','working_to','location','phone','company_id']);
       session()->flash('success', 'Done sucessfully'); 
       $this->emit('closeModal');
        }catch (\Exception $e) {

            session()->flash('error', $e); 
       };   
}

 public function edit(int $id){
 $edit= showroom::findOrFail($id);
 if($edit){
  $this->edit_id = $id;
  $this->name =$edit->name;
  $this->working_from =$edit-> working_from;
  $this->working_to =$edit-> working_to;
  $this->location =$edit->location;
  $this->phone =$edit->phone;
  $this->status =$edit->status ;
  $this->company_id =$edit->company_id ;
 }else{
  return redirect()->back();
 }


 }

 public function update(){

    try{
     $validatedData = $this->validate();
     $showrooms=showroom::FindOrFail($this->edit_id);
     $showrooms->update([
     'name'=>$validatedData['name'],
     'working_from'=>$validatedData['working_from'],
     'working_to'=>$validatedData['working_to'],
     'location'=>$validatedData['location'],
     'phone'=>$validatedData['phone'],
     'company_id'=>$validatedData['company_id'],
     'updated_by'=>$this->user,
     ]);
     $this->reset(['name','working_from','working_to','location','phone','company_id']);
     $this->emit('closeModal');
     session()->flash('success', 'Done sucessfully');  
    }catch(\Exception $e){
        session()->flash('error', $e); 
    }

 }

public function getshow_id(int $id){
 $this->showroom_id =$id;
}



  public function close(){ 
     try{
      showroom::where('id', $this->showroom_id)->update([
      'status'=> 0,
      'updated_by'=>$this->user,
      ]);
      session()->flash('success', 'Done sucessfully'); 
     }catch(\Exception $e){
        session()->flash('error', $e); 
     }  
     }

    


 public function deleteID(int $delete_id){
    $this->delete_id= $delete_id;
    }



  public function delete(){
    try {
    showroom::FindOrFail($this->delete_id)->delete();
    session()->flash('success', 'Done sucessfully'); 
    }catch (\Exception $e){
        session()->flash('error', $e); 
   }
}




    public function render()
    {
        if($this->user_company_id ===1){
            $dists = Company::all();
        }else{
            $dists = Company::where('id','=',$this->user_company_id)->get();
        }


    if($this->user_company_id ===1){
    $data =showroom::with('company')->where('name', 'like', '%'.$this->search.'%')->orderBy('id', $this->sortfilter)->paginate($this->perpage);
    }else{
        $data =showroom::with('company')
        ->where('company_id',$this->user_company_id)
        ->where('name', 'like', '%'.$this->search.'%')->orderBy('id', $this->sortfilter)->paginate($this->perpage);  
    }
        return view('livewire.admin.showrooms.showrooms',compact('data','dists'));
    }
}
