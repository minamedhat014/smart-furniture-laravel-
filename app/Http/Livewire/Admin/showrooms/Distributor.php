<?php

namespace App\http\Livewire\Admin\showrooms;


use session;
use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Distributor extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $search;
    public $perpage =5;
    public $sortfilter ='desc';
    public $name,$dist_id;


    public function closeModal()
    {
        $this->reset('name');
    }

 protected $rules = [
    'name' => 'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u|min:4|unique:companies',
  
];



public function updated($feilds)
{
    $this->validateOnly($feilds);
}



public function updatingSearch()
    {
        $this->resetPage();
    }

 public function store(){

    {
        try{
        $validatedData = $this->validate();
 
        Company::create($validatedData);
        $this->reset('name');
        $this->emit('closeModal');
        session()->flash('success', 'Done sucessfully'); 
        }catch(\Exception $e){
        session()->flash('error', $e);
    }
 }
 }

 public function editDist(int $dist_id){
 $dist= Company::findOrFail($dist_id);

 if($dist){
  $this->dist_id = $dist->id;
  $this->name =$dist->name;

 }else{
  return redirect()->back();
 }


 }


 public function update(){

    {
        try{
     $validatedData = $this->validate();
     Company::where('id',$this->dist_id)->update([
     'name'=>$validatedData['name']
     ]);
     $this->reset('name');
     $this->emit('closeModal');
     session()->flash('success', 'Done sucessfully'); 
    }
    catch(\Exception $e){
     DB::rollBack();
     session()->flash('error', $e);
    }
 }
}

 public function deleteID(int $dist_id){
    $this->dist_id = $dist_id;
    }
   


 
 public function delete(){

    {
        try{
     Company::FindOrFail($this->dist_id)->delete();
     session()->flash('success', 'Done sucessfully'); 
        }catch(\Exception $e){
            DB::rollBack();
            session()->flash('error', $e);
        }
    }
}


    public function render()
    {

        $data =Company::where('name', 'like', '%'.$this->search.'%')->orderBy('id', 'desc')->paginate(5);
        return view('livewire.Admin.showrooms.distributor',compact('data'));
        
    }
}
