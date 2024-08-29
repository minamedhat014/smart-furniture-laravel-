<?php

namespace App\http\Livewire\Admin\Showrooms;

use Livewire\Component;
use App\Models\showRoomTeam;
use App\Traits\HasTable;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class StaffMember extends Component
{
 


    use HasTable;

    public $branch_id;
    public $showRoom_id;
    public $data;
    public $sales_name;
    public $title;
    public $email;
    public $phone;
    public $edit_id;
    public $delete_id;

    protected $write_permission="showroom staff";

  

     
public function closeModal()
{
    $this->reset(['email','sales_name','phone','title']);
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
     try{
        $this->check_permission($this->write_permission);
        $validatedData = $this->validate();
       showRoomTeam::create([
'showRoom_id' => $this->branch_id,
 'sales_name'=>$validatedData['sales_name'],
 'title'=>$validatedData['title'],
 'email'=>$validatedData['email'],
 'phone'=>$validatedData['phone'],
 'created_by'=> authName(),
        ]);
      $this->success();
       }catch (\Exception $e) {
      errorMessage($e);
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
   try{
    $this->check_permission($this->write_permission);
    $validatedData = $this->validate();
    showRoomTeam::FindOrFail($this->edit_id)->
    update([
    'sales_name'=>$validatedData['sales_name'],
    'title'=>$validatedData['title'],
    'email'=>$validatedData['email'],
    'phone'=>$validatedData['phone'],
    'updated_by'=>authName(),
    ]);
    $this->success();
   }catch(\Exception $e){
    
   }

}



public function deleteID(int $delete_id){
    $this->delete_id= $delete_id;
    }



  public function delete(){
    try {
        $this->check_permission($this->write_permission);
        showRoomTeam::FindOrFail($this->delete_id)->delete();
       successMessage();
    }catch (\Exception $e){
     errorMessage($e);
   }
}


    public function render()
    {
       $this->data= showRoomTeam::where('showRoom_id',$this->branch_id)->get();
        return view('livewire.admin.showrooms.staff-member');
    }
}
