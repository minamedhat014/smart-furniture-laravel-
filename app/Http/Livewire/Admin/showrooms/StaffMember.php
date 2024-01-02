<?php

namespace App\http\Livewire\Admin\Showrooms;

use Livewire\Component;
use App\Models\showRoomTeam;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class StaffMember extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $branch_id;
    public $search;
    public $perpage =5;
    public $sortfilter ='desc';   
    public $showRoom_id;
    public $data;
    public $sales_name;
    public $title;
    public $email;
    public $phone;
    public $created_by;
    public $updated_by;
    public $user;
    public $edit_id;
    public $delete_id;

  
  

public function updated($feilds)
{  
    $this->validateOnly($feilds);
}

     
public function closeModal()
{
    $this->reset(['email','sales_name','phone','title']);
}

    public function mount()
    {
        $this->user= Auth::user()->name;         
    }
     
public function updatingSearch()
{
    session()->flash('error', 'search is not active in this page'); 
}


protected function rules()
  {
       return [ 
       'email' => 'required|email',
       'sales_name' => 'required|max:150',
       'phone'=>'required|regex:/^01[0-9]{9}$/',
       'title'=>'required|integer',
                   ];
}



public function store(){
    $validatedData = $this->validate();
     try{
       showRoomTeam::create([
'showRoom_id' => $this->branch_id,
 'sales_name'=>$validatedData['sales_name'],
 'title'=>$validatedData['title'],
 'email'=>$validatedData['email'],
 'phone'=>$validatedData['phone'],
 'created_by'=> $this->user,
        ]);

    $this->reset(['email','sales_name','phone','title']);
      session()->flash('success', 'Done sucessfully'); 
      $this->emit('closeModal');
       }catch (\Exception $e) {
        session()->flash('error', $e); 
      };   
}

public function edit(int $id){
$edit= showRoomTeam::findOrFail($id);
if($edit){
 $this->edit_id = $id;
 $this->sales_name =$edit->sales_name;
 $this->title =$edit->title;
 $this->email =$edit->email;
 $this->phone =$edit->phone ;
}else{
 return redirect()->back();
}


}

public function update(){
    $validatedData = $this->validate();
   try{
    showRoomTeam::FindOrFail($this->edit_id)->
    update([
    'sales_name'=>$validatedData['sales_name'],
    'title'=>$validatedData['title'],
    'email'=>$validatedData['email'],
    'phone'=>$validatedData['phone'],
    'updated_by'=>$this->user,
    ]);
    $this->reset(['email','sales_name','phone','title']);
    $this->emit('closeModal');
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
        showRoomTeam::FindOrFail($this->delete_id)->delete();
    session()->flash('success', 'Done sucessfully'); 
    }catch (\Exception $e){
        session()->flash('error', $e); 
   }
}


    public function render()
    {
       $this->data= showRoomTeam::where('showRoom_id',$this->branch_id)->get();
        return view('livewire.admin.showrooms.staff-member');
    }
}
