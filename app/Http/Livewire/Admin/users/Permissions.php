<?php

namespace App\http\Livewire\Admin\users;

use App\Traits\HasTable;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Permissions extends Component
{
 

    use HasTable;
    public $name;
    public $guard_name ='admin';
    public $permission_id;
    protected $write_permission = 'write user';

    protected function rules()
    {
         return
         
         [ 'name' => 'required|min:3|regex:/^[a-zA-Z0-9\s\-]+$/u|unique:permissions,name,'.$this ->permission_id,
                     ];
 
                    
 }




public function closeModal()
    {
        $this->reset();
    }

    public function mount(){
        $this->check_permission('view users');
    }

 public function store(){
    try{
        $this->check_permission($this->write_permission);
        $validatedData = $this->validate();
        Permission::create([
        'name' =>$validatedData['name'],
        'guard_name' =>$this->guard_name,
        ]);
        $this->success();
     }catch (\Exception $e){
        errorMessage($e);
    }
 }

 public function edit(int $id){
 $edit= Permission::findOrFail($id);

 if($edit){
  $this->permission_id= $id;
  $this->name =$edit->name;

 }else{
  return redirect()->back();
 }


 }


 public function update(){
    {
        $this->check_permission($this->write_permission);
     $validatedData = $this->validate();
     Permission::where('id',$this->permission_id)->update([
     'name'=>$validatedData['name']
     ]);
     $this->success();
    }
 }

 public function deleteID(int $id){
    $this->permission_id= $id;
    }
   


 
 public function delete(){
    {
        $this->check_permission($this->write_permission);
        Permission::FindOrFail($this->permission_id)->delete();
        successMessage();  
    }
}


public function render()
{
        $permissions =Permission::where('name', 'like', '%'.$this->search.'%')->orderBy('id', $this->sortfilter)->paginate($this->perpage);
        return view('livewire.Admin.users.permissions',compact('permissions'));
    }
}
