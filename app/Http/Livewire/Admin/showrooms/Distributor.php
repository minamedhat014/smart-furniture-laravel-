<?php

namespace App\http\Livewire\Admin\showrooms;


use session;
use App\Models\Company;
use App\Traits\HasTable;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Distributor extends Component
{
  use HasTable;
    public $name;
   public $dist_id;
  protected $write_permission ="write distributor";

    public function closeModal()
    {
        $this->reset('name');
    }

    protected function rules()
    {
         return
         
         [ 'name' => 'required|min:3|regex:/^[a-zA-Z0-9\s\-]+$/u|unique:companies,name,'.$this ->dist_id,
                     ];
 
                    
 }
 
 

 public function store(){
        try{
         $this->check_permission($this->write_permission);
        $validatedData = $this->validate();
        Company::create([
            'name'=>$validatedData['name'],
        ]);
       $this->success();
        }catch(\Exception $e){
        errorMessage($e);
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
    $this->check_permission($this->write_permission);
     $validatedData = $this->validate();
     Company::where('id',$this->dist_id)->update([
     'name'=>$validatedData['name']
     ]);
    $this->success();
    }
    catch(\Exception $e){
     DB::rollBack();
    errorMessage($e);
    }
 }
}

 public function deleteID(int $dist_id){
    $this->dist_id = $dist_id;
    }
   


 
 public function delete(){

    {
        try{
            $this->check_permission($this->write_permission);
     Company::FindOrFail($this->dist_id)->delete();
      successMessage();
        }catch(\Exception $e){
            DB::rollBack();
            errorMessage($e);
        }
    }
}


    public function render()
    {

        $data =Company::where('name', 'like', '%'.$this->search.'%')->orderBy('id', $this->sortfilter)->paginate($this->perpage);
        return view('livewire.Admin.showrooms.distributor',compact('data'));
        
    }
}
