<?php

namespace App\http\Livewire\Admin\users;

use App\Models\Admin;
use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Http\UploadedFile;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


use Illuminate\Support\Facades\Storage;


class User extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $search;
    public $perpage =5;
    public $sortfilter ='desc';
    public $admin_id;
    public $name;
    public $company_id;
    public $email;
    public $password;
    public $phone = null;
    public $photo;
    public $assigned_roles =[];
    public $user;
    



    public function mount()
    {
       $this->user= Auth::user()->name; 
    }

    public function hydrate(){
       $this->dispatchBrowserEvent('pharaonic.select2.init');
       $this->dispatchBrowserEvent('pharaonic.select2.load', [
           'component' => $this->id,
           'target'    => '#multiSelect'
       ]);
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


    public function updatedPhoto()
    {
        if (Storage::exists('app/photos/' . $this->photo->hashName())) {
            $this->addError('photo', 'A photo with this name already exists.');
            $this->photo = null;
        }
    }

public function removePhoto()
{
    unset($this->photo);
}

public function save()
    {
        try{
            if($this->photo !== null){
                $this->photo->store('photos');
                session()->flash('success','done successfully'); 
            } 
        }catch(\Exception $e){
            session()->flash('error',$e);
        } 
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
 
      $admin= Admin::create([
     'name'=>$validatedData['name'],
     'email'=>$validatedData['email'],
     'company_id'=>$validatedData['company_id'],
     'phone'=>$validatedData['phone'],
     'password'=>Hash::make($validatedData['password']),
        ]);
        if($this->photo !== null){
        $admin->addMedia($this->photo)->toMediaCollection('profile');
        }
        $this->reset();
        $this->emit('closeModal');
        session()->flash('success','done successfully');   
    }catch(\Exception $e){
        session()->flash('error',$e);
    }
 }

 public function edit(int $id){
 $edit= Admin::findOrFail($id);

 if($edit){
  $this->admin_id= $id;
  $this->name =$edit->name;
  $this->email =$edit->email;
  $this->company_id =$edit->Company_id;
 }else{
  return redirect()->back();
 }


 }

 public function closeModal()
 {
     $this->reset('name','email','company_id','phone','password');
 }

 public function update(){

   try{

     $validatedData = $this->validate();
    $admin= Admin::FindOrFail($this->admin_id);
    $admin->update([
     'name'=>$validatedData['name'],
     'email'=>$this->email,
     'company_id'=>$this->company_id,
     'phone'=>$this->phone,
     'password'=>Hash::make($validatedData['password']), 
     ]);
     if($this->photo !== null){
        $admin->clearMediaCollection('profile');
        $admin->addMedia($this->photo)->toMediaCollection('profile');
        }
     $this->reset();
     $this->emit('closeModal');
     session()->flash('success','done successfully');  
    }catch(\Exception $e){
        session()->flash('error',$e);
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
   $admin= Admin::findOrFail($this->admin_id);
   $admin ->assignRole($this->assigned_roles);
   session()->flash('success','done successfully'); 
   $this->reset();
   }catch(\Exception $e){
        session()->flash('error',$e);
    }

  }

   public function changeStatus (int $id){
        $admin = Admin::findOrFail($id); 
    if($admin->status ==1 && $id > 1 ){
    $admin->update([
        'status' => 0
    ]);
    session()->flash('error','user now is deactive '); 
    }elseif($admin->status == 0){
   $admin->update([
        'status' => 1
    ]);
    session()->flash('success','user now is active '); 
    }
   }


  public function removeRoles (){
    try{
        if($this->admin_id > 1 ){
        $admin= Admin::findOrFail($this->admin_id);
        $admin ->syncRoles([]);
        session()->flash('success','done successfully'); 
        $this->reset();}
        else{
            session()->flash('error','the roles of this user are not allawed to be removed '); 
        }
        }catch(\Exception $e){
             session()->flash('error',$e);
         }
  }
 
 public function delete(){

   try {
     Admin::FindOrFail($this->admin_id)->delete();
     session()->flash('success','done successfully'); 
   
    }catch(\Exception $e){
        session()->flash('error',$e);
    }
}


public function render()
{
  $roles = Role ::all();
   $companies = Company::all('id','name');
    $admins = Admin:: with('roles','media')->orderBy('id', 'desc')->paginate(5);
        $admins =Admin::where('name', 'like', '%'.$this->search.'%')->orderBy('id', 'desc')->paginate(5);
        return view('livewire.Admin.users.user',compact('admins','roles','companies'));
    }
}
