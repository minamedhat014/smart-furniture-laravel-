<?php

namespace App\Http\Livewire\Admin\Procedures;

use App\Models\Company;
use Livewire\Component;
use App\Traits\HasTable;
use App\Models\CompanyPolicy;
use App\Models\Department;
use App\Traits\HasFilesUpload;
use App\services\PolicyService;
use Livewire\Attributes\Computed;
use Spatie\Permission\Models\Role;

class Policies extends Component
{

    use HasTable;
    use HasFilesUpload;
 
 
  public $companies =[];
  public $edit_id;
  public $company_id;
  public $department_id;
  public $policy_name;
  public $departments=[];
  public $have_access;
  public $policy_description;
  protected $PolicyService;
  public $titles;
  public $roles=[];
  protected $write_permission ="write policy";
  

  public function __construct()
  {
      $this->PolicyService = app(PolicyService::class);
  }
  

  public function mount(){
    $this->check_permission("view policies");   
     $this->companies = Company::all(['id','name']);
     $this->departments = Department::all(['id','name']);
     $this->roles =Role::all();
  
    }
  
  
  
  protected function rules()
     {
          return [ 
          'company_id' => 'required|numeric',
          'department_id' => 'required|numeric',
          'policy_name'=>'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
          'policy_description' => 'required|regex:/^[\p{Arabic}a-zA-Z0-9\s\-]+$/u',
          'files' => 'sometimes|array',
          'files.*' => 'required|file|mimes:pdf|max:10240', // 10MB Max
          
                      ];
  }
  
  
      public function closeModal()
      {
        $this->reset(['company_id','policy_name','policy_description','department_id','files'
       ]); 
      }
  
  
    
  public function store(){
      try{
     $this->check_permission($this->write_permission);
    $validatedData = $this->validate();
    $this->PolicyService ->store($validatedData);
   $this->success();
        }catch (\Exception $e) {
          errorMessage($e);
       };   
  }
  

  
  public function edit(int $id){
    $edit= CompanyPolicy::findOrFail($id);
    if($edit){
     $this->edit_id = $id;
     $this->company_id =$edit->company_id;
     $this->department_id =$edit->department_id;
     $this->policy_name =$edit->policy_name;
    $this->policy_description =$edit->policy_description;
    }else{
     return redirect()->back();
    }
   
   
    }
   
  
  
    public function update(){
      try{
        $this->check_permission($this->write_permission);
    $validatedData = $this->validate();
    $this->PolicyService->update($this->edit_id, $validatedData);
    $this->success();
        }catch (\Exception $e) {
          errorMessage($e);
       };     
    }
   
  
    public function gettingId(int $selected_id){
      $this->edit_id= $selected_id;
      }
  
  
      public function approve(){
        try {
          $this->check_permission('approve policy');
         CompanyPolicy::FindOrFail($this->edit_id)->update([
          'status' => 'approved',
          'approved_by' =>authName(),
         ]);
        successMessage();
         }catch (\Exception $e){
          errorMessage($e);
         }
     } 
    

   
  
   public function delete(){
      try {
        $this->check_permission($this->write_permission);
       CompanyPolicy::FindOrFail($this->edit_id)->delete();
      successMessage();
       }catch (\Exception $e){
        errorMessage($e);
       }
   } 
  

  
  
   #[Computed]
   public function policies(){
  
    if(authedCan($this->write_permission)){
      return 
      $this->PolicyService->index($this->search,$this->sortfilter,$this->perpage);
    }else{
      return 
      $this->PolicyService->indexApproved($this->search,$this->sortfilter,$this->perpage);
    }
   
   }
  
    public function render()
    {
        return view('livewire.admin.procedures.policies');
    }
}
