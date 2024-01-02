<?php

namespace App\Http\Livewire\Admin\Showrooms;

use App\Models\install_tech;
use App\Models\installment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class InstallStaff extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $search;
    public $perpage =5;
    public $sortfilter ='desc';
    public $user_company_id;
    public $company_id;
    public $user;
    public $name;
    public $email;
    public $phone;
    public $delete_id;
    public $edit_id;





    public function mount(){
        $this->user_company_id=Auth::user()->company_id;
        $this->company_id=Auth::user()->company_id;
        $this->user=Auth::user()->name;
    }




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
       install_tech::create([
 'name'=>$validatedData['name'],
 'email'=>$validatedData['email'],
 'phone'=>$validatedData['phone'],
 'company_id'=>$validatedData['company_id'],
 'created_by'=> $this->user,
        ]);
        $this->reset(['name','email','phone','company_id']);
      session()->flash('success', 'Done sucessfully'); 
      $this->emit('closeModal');
       }catch (\Exception $e) {

           session()->flash('error', $e); 
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
        'company_id'=>$validatedData['company_id'],
        'updated_by'=>$this->user,
    ]);
    $this->reset(['name','email','phone','company_id']);
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
   install_tech::FindOrFail($this->delete_id)->delete();
   session()->flash('success', 'Done sucessfully'); 
   }catch (\Exception $e){
       session()->flash('error', $e); 
  }
}




    public function render()
    {
        if($this->user_company_id === 1){
            $data=install_tech::with('company')
            ->where('phone', 'like', '%' . $this->search . '%')
            ->orWhereHas('company', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');})
            ->orderBy('id',$this->sortfilter)->paginate($this->perpage);
        }
        else{
            $data=install_tech::with('company')
            ->where('company_id',$this->user_company_id)
            ->where('phone', 'like', '%' . $this->search . '%')  
            ->orderBy('id',$this->sortfilter)->paginate($this->perpage);
        }
        return view('livewire.admin.showrooms.install-staff',compact('data'));
    }
}
