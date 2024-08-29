<?php

namespace App\Http\Livewire\Admin\Showrooms;

use App\Models\install_tech;
use App\Traits\HasTable;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class InstallStaff extends Component
{
   use HasTable;
    public $company_id;
    public $name;
    public $email;
    public $phone;
    public $delete_id;
    public $edit_id;



    public function closeModal()
    {
        $this->reset(['name','email','phone','company_id']);
    }
    
protected function rules()
  {
       return [
       'name' => 'required|min:3|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
       'email' => 'nullable|email',
       'phone'=>'required|regex:/^01[0-9]{9}$/',
       'company_id'=>'required|integer',
    
                   ];
}



public function store(){
            $validatedData = $this->validate();
     try{
       install_tech::create([
 'name'=>$validatedData['name'],
 'email'=>$validatedData['email'],
 'phone'=>$validatedData['phone'],
 'company_id'=>authedCompany(),
 'created_by'=> authName(),
        ]);
        $this->success();
       }catch (\Exception $e) {
          errorMessage($e);
      };   
}

public function edit(int $id){
$edit= install_tech::findOrFail($id);
if($edit){
 $this->edit_id = $id;
 $this->name =$edit->name;
 $this->email =$edit->email;
 $this->phone =$edit->phone;
 $this->company_id =$edit->company_id ;
}else{
 return redirect()->back();
}


}

public function update(){

   try{
    $validatedData = $this->validate();
    install_tech::FindOrFail($this->edit_id)
    ->update([
        'name'=>$validatedData['name'],
        'email'=>$validatedData['email'],
        'phone'=>$validatedData['phone'],
        'company_id'=>authedCompany(),
        'updated_by'=>authName(),
    ]);
  $this->success();
   }catch(\Exception $e){
       session()->flash('error', $e); 
   }

}


public function deleteID(int $delete_id){
   $this->delete_id= $delete_id;
   }



 public function delete(){
   try {
   install_tech::FindOrFail($this->delete_id)->delete();
 successMessage();
   }catch (\Exception $e){
      errorMessage($e);
}
 }



    public function render()
    {
        if(userFactory()){
            $data=install_tech::with('company')
            ->where('phone', 'like', '%' . $this->search . '%')
            ->orWhereHas('company', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');})
            ->orderBy('id',$this->sortfilter)->paginate($this->perpage);
        }
        else{
            $data=install_tech::with('company')
            ->where('company_id',authedCompany())
            ->where('phone', 'like', '%' . $this->search . '%')  
            ->orderBy('id',$this->sortfilter)->paginate($this->perpage);
        }
        return view('livewire.admin.showrooms.install-staff',compact('data'));
    }
}
