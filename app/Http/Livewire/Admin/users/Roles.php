<?php

namespace App\http\Livewire\Admin\users;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Roles extends Component
{


        use WithPagination;
        protected $paginationTheme = 'bootstrap';
    
    
        public $search;
        public $perpage =5;
        public $sortfilter ='desc';
        public $name;
        public $Role_id;
        public $assigned_Permissions =[];
    
    
    
     protected $rules = [
        'name' => 'required|min:4|unique:roles',
      
    ];
    
    
public function closeModal()
{
    $this->reset();
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
     
            Role::create($validatedData);
            $this->reset();
            $this->emit('closeModal');
            session()->flash('success','done successfully');  
        }catch(\Exception $e){
            session()->flash('error',$e);
        }
     }
    
     public function edit(int $id){
     $edit= Role::findOrFail($id);
    
     if($edit){
      $this->Role_id= $id;
      $this->name =$edit->name;
    
     }else{
      return redirect()->back();
     }
    
    
     }
    
     public function hydrate(){
        $this->dispatchBrowserEvent('pharaonic.select2.init');
        $this->dispatchBrowserEvent('pharaonic.select2.load', [
            'component' => $this->id,
            'target'    => '#multiSelect'
        ]);
     }

    
     public function update(){
    if( $this->Role_id > 1){
        try {
            $validatedData = $this->validate();
            Role::where('id',$this->Role_id)->update([
            'name'=>$validatedData['name']
            ]);
            $this->reset();
            $this->emit('closeModal');
            session()->flash('success','done successfully');   
           }catch(\Exception $e){
               session()->flash('error',$e);
           }
    }else{
        session()->flash('error', "you can't change this role");
    }
       
    
     }
    
     public function deleteID(int $id){
        $this->Role_id = $id;
        }
       
        public function RoleID(int $id){
            $this->Role_id = $id;
            }
           
    public function assignPermissions(){
        $role= Role::findOrFail($this->Role_id);
        $role->givePermissionTo($this->assigned_Permissions);
        session()->flash('success','done successfully');   
        $this->reset();
    }
     
     public function delete(){
     if($this ->Role_id > 1)
        {
         Role::FindOrFail($this->Role_id)->delete();
         session()->flash('success','done successfully');
        }
        else{
            session()->flash('error', "you can't delete this role");
        }
    }
    

    public function render()
    {
        $permissions = Permission::all();
        $roles = Role::orderBy('id', 'asc')->paginate(5);
            $roles =Role::where('name', 'like', '%'.$this->search.'%')->orderBy('id', 'asc')->paginate(5);
        return view('livewire.Admin.users.roles',compact('roles','permissions'));
    }
}
