<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Admin;
use App\Models\Company;
use Livewire\Component;
use App\Traits\HasTable;
use App\services\UserService;
use App\Traits\HasMultiSelect;
use App\Traits\HasPhotoUpload;
use Livewire\Attributes\Computed;
use Spatie\Permission\Models\Role;

class User extends Component
{

    use HasTable;
    use HasPhotoUpload;
    use HasMultiSelect;

    public $admin_id;
    public $name;
    public $company_id;
    public $email;
    public $password;
    public $phone = null;
    public $assigned_roles =[];
    public $roles;
    public $companies;
    protected $write_permission='write user';


     
    public function mount(){
        $this->check_permission('view user');
        $this->roles = Role ::all('id','name');
        $this->companies = Company::all('id','name');
    }

    public function closeModal()
    {
   
        $this->reset('name','email','company_id','phone','password','assigned_roles','photo',);
    }
    

 

    protected function rules()
    {
            return [
                            'name' => 'required|string|max:255',
                            'email' => 'required|min:6|max:255|email|unique:admins,email,' . $this->admin_id,
                            'password' => 'required|min:7',
                            'phone' => 'nullable|regex:/^01[0-9]{9}$/',
                            'company_id' => 'required',
                            'photo' => 'nullable|image|mimes:jpeg,png,pdf|max:1024', // 1MB Max

                        ];
    }





 public function store(UserService $userService){
    try{
        $this->check_permission($this->write_permission);
        $validatedData = $this->validate();
        $userService->store($validatedData);
         $this->success();
    }catch(\Exception $e){
        errorMessage($e);
 }}



 public function edit(int $id){
 $edit= Admin::findOrFail($id);

 if($edit){
  $this->admin_id= $id;
  $this->name =$edit->name;
  $this->email =$edit->email;
  $this->phone =$edit->phone;
  $this->company_id =$edit->Company_id;
 }else{
  return redirect()->back();
 }


 }



 public function update(UserService $userService){

   try{
    $this->check_permission($this->write_permission);
     $validatedData = $this->validate();
     $userService->update( $validatedData,$this->admin_id);
     $this->success();
    }catch(\Exception $e){
          errorMessage($e);
    }

 }

 public function deleteID(int $id){
    $this->admin_id = $id;
    }
   

    public function AdminID(int $id){
        $this->admin_id = $id;
    }

  public function assignRoles (){ 
   try{
    $this->check_permission($this->write_permission);
   if($this->admin_id > 1 ){
    $admin= Admin::findOrFail($this->admin_id);
    $admin ->syncRoles($this->assigned_roles);
    $this->success();}
    else{
        errorMessage('The roles of this admin are not allawed to be removed or sync'); 
    }
   }catch(\Exception $e){
    errorMessage($e);
    }

  }

   public function changeStatus (int $id){
    $this->check_permission($this->write_permission);
    $admin = Admin::findOrFail($id); 
    if($admin->status ==1 && $id > 1 ){
    $admin->update([
        'status' => 0
    ]);
    errorMessage('user now is deactive '); 
    }elseif($admin->status == 0){
    $admin->update([
        'status' => 1
    ]);
    successMessage('user now is active '); 
    }
   }


  public function removeRoles (){
    try{
        $this->check_permission($this->write_permission);
        if($this->admin_id > 1 ){
        $admin= Admin::findOrFail($this->admin_id);
        $admin ->syncRoles([]);
        $this->success();}
        else{
            errorMessage('The roles of this admin are not allawed to be removed '); 
        }
        }catch(\Exception $e){
            errorMessage($e);
         }
  }
 

  
 public function delete(){
   try {
    $this->check_permission($this->write_permission);
    if($this->admin_id > 1 ){
     Admin::FindOrFail($this->admin_id)->delete();
   $this->success();
    }
    session()->flash('error','You are not allawed to remove this Admin '); 
    }catch(\Exception $e){
        errorMessage($e);
    }
}

#[Computed]
public function admins(){
    return Admin::where('name', 'like', '%'.$this->search.'%')->orderBy('id', $this->sortfilter)->paginate($this->perpage);
}


public function render()
{
        return view('livewire.Admin.users.user');
    
    }
}
