<?php

namespace App\http\Livewire\Admin\Settings;

use Livewire\Component;
use App\Models\dropdownLists;
use App\Traits\HasTable;
use Livewire\Attributes\Locked;
class DropLists extends Component
{



use HasTable;
public $data;
public $name;
public $selected_list;

#[Locked]
public $edit_id;
#[Locked]
public $delete_id;
public $model_namespace;
public string $table_name;
protected $write_permission='write system list';



protected function rules()
{
    $rules = [
        'name' => 'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
    ];

    if ($this->selected_list === $this->model_namespace) {
        $rules['model_namespace'] = 'unique:dropdown_lists,model_namespace,' . $this->edit_id;
    }

    return $rules;
}


public function closeModal()
    {
        $this->reset('name','model_namespace');
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


// public function storeList(){
//     try{       
//       $validatedData = $this->validate();
// dropdownLists::create([
// 'name'=>$validatedData['name'],
// 'model_namespace'=>$validatedData['model_namespace'],
// 'created_by'=> authName(),
//        ]);
//          $this->success();
//    }catch (\Exception $e) {

//     errorMessage($e);
//      };   
// }


public function update(){
    try{
        $this->check_permission($this->write_permission);
      $validatedData = $this->validate();
      $update=$this->selected_list::findOrFail($this->edit_id);
     $update->update([
   'name'=>$validatedData['name'],
   'created_by'=>authName(),
       ]);
      $this->success();
   }catch (\Exception $e) {

   errorMessage($e);
     };   
}

public function deleteID(int $id){
$this->delete_id =$id;
}


public function delete(){
    try {
        $this->check_permission($this->write_permission);
        $this->selected_list::FindOrFail($this->delete_id)->delete();
        successMessage();
     }catch (\Exception $e){
        errorMessage($e);
     }
 }


public function store(){
    try{
        $this->check_permission('write system list');
      $validatedData = $this->validate();
      $this->selected_list::create([
'name'=>$validatedData['name'],
'created_by'=> authName(),
       ]);
      $this->success();
   }catch (\Exception $e) {

    errorMessage($e);
     };   
}

public function mount()
{ 
    $this->data=dropdownLists::all();
   $this->check_permission('view system list');
}

public function selected()
{ 
    $this->data=$this->selected_list::all();

    $this->table_name = $this->selected_list;
}




    public function render()
    {
        if($this->selected_list){
        $this->selected();
        }
        return view('livewire.admin.settings.drop-lists');
    }
}
