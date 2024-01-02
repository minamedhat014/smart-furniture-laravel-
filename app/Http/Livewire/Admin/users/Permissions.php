<?php

namespace App\http\Livewire\Admin\users;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class Permissions extends Component
{
 

    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $search;
    public $perpage =5;
    public $sortfilter ='desc';
    public $name;
    public $guard_name ='admin';
    public $permission_id;



 protected $rules = [
    'name' => 'required|min:4|unique:permissions',
    'guard_name'=>''
  
];

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


public function closeModal()
    {
        $this->reset();
    }

public function updatingSearch()
    {
        $this->resetPage();
    }

 public function store(){

    {
        $validatedData = $this->validate();
 
        Permission::create($validatedData);
        $this->reset();
        $this->emit('closeModal');
        session()->flash('success','done successfully');  
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
     $validatedData = $this->validate();
     Permission::where('id',$this->Role_id)->update([
     'name'=>$validatedData['name']
     ]);
     $this->reset();
     $this->emit('closeModal');
     session()->flash('success','done successfully');  
    }

 }

 public function deleteID(int $id){
    $this->permission_id= $id;
    }
   


 
 public function delete(){

    {
        Permission::FindOrFail($this->permission_id)->delete();
        session()->flash('success','done successfully');
   
    }
}


public function render()
{
    $permissions = Permission::orderBy('id', 'desc')->paginate(5);
        $permissions =Permission::where('name', 'like', '%'.$this->search.'%')->orderBy('id', 'desc')->paginate(5);
        return view('livewire.Admin.users.permissions',compact('permissions'));
    }
}
