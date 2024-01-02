<?php

namespace App\http\Livewire\Admin\Settings;

use App\Models\dropdownLists;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class DropLists extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';



public string $Model= "App\Models\dropdownLists";
public $data;
public $user;
public $name;
public $selected_list;
public $edit_id;
public $delete_id;
public $model_namespace;
public string $table_name;



protected function rules()
{
    $rules = [
        'name' => 'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
    ];

    if ($this->selected_list === $this->Model) {
        $rules['model_namespace'] = 'unique:dropdown_lists,model_namespace,' . $this->edit_id;
    }

    return $rules;
}


public function closeModal()
    {
        $this->reset();
    }

    public function edit(int $id){
        $edit= $this->selected_list::findOrFail($id);
        if($edit){
         $this->edit_id = $id;
         $this->name =$edit->name;
        }else{
         return redirect()->back();
        }      
        }


public function storeList(){
    try{       
      $validatedData = $this->validate();
dropdownLists::create([
'name'=>$validatedData['name'],
'model_namespace'=>$validatedData['model_namespace'],
'created_by'=> $this->user,
       ]);
       $this->reset(['name','model_namespace']);
       session()->flash('success','done successfully');
       $this->emit('closeModal');
   }catch (\Exception $e) {

          session()->flash('error',$e);
     };   
}


public function update(){
    try{
      $validatedData = $this->validate();
      $update=$this->selected_list::findOrFail($this->edit_id);
     $update->update([
   'name'=>$validatedData['name'],
   'created_by'=> $this->user,
       ]);
       $this->reset(['name',]);
       session()->flash('success','done successfully');
   }catch (\Exception $e) {

          session()->flash('error',$e);
     };   
}

public function deleteID(int $id){
$this->delete_id =$id;
}


public function delete(){
    try {
      $this->selected_list::FindOrFail($this->delete_id)->delete();
      session()->flash('success','done successfully');
     }catch (\Exception $e){
         session()->flash('error',$e);
     }
 }


public function store(){
    try{
      $validatedData = $this->validate();
      $this->selected_list::create([
'name'=>$validatedData['name'],
'created_by'=> $this->user,
       ]);
       $this->reset(['name',]);
       $this->emit('closeModal');
       session()->flash('success','done successfully');
   }catch (\Exception $e) {

          session()->flash('error',$e);
     };   
}

public function mount()
{ 
    $this->data=$this->Model::all();
    $this->user= Auth::user()->name;
}

public function selected()
{ 
    $this->data=$this->selected_list::all();
   
    $this->table_name = $this->selected_list;
}




    public function render()
    {
        return view('livewire.admin.settings.drop-lists');
    }
}
