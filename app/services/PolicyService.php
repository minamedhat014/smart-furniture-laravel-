<?php

namespace App\services;

use App\Models\CompanyPolicy;
use Illuminate\Support\Facades\DB;

class PolicyService {

  private $search;
  private $sortfilter;
  private $perpage;

   
public function store($validatedData){

   try{
     DB::beginTransaction();
   $policy= CompanyPolicy::create([
'company_id'=>$validatedData['company_id'],
'department_id'=>$validatedData['department_id'],
'policy_name'=>$validatedData['policy_name'],
'policy_description'=>$validatedData['policy_description'],
'created_by'=>authName(),
    ]); 

    foreach($validatedData['files']as $file){
      $policy->addMedia($file)->toMediaCollection('companyPolicy'); 
}
   DB::commit();
   successMessage();
}catch(\Exception $e){
   DB::rollBack();
   errorMessage($e);
}

}


 public function update($id,$validatedData){
   try{
    
    DB::beginTransaction();
    $policy =CompanyPolicy::FindOrFail($id);
    $policy->update([
'company_id'=>$validatedData['company_id'],
'department_id'=>$validatedData['department_id'],
'policy_name'=>$validatedData['policy_name'],
'policy_description'=>$validatedData['policy_description'],
'updated_by'=>authName(),
    ]); 
    if(count($validatedData['files']) > 0){
      $policy->clearMediaCollection('companyPolicy');
      foreach($validatedData['files']as $file){
          $policy->addMedia($file)->toMediaCollection('companyPolicy'); 
      };}
      DB::commit(); 
      successMessage(); 
     }catch(\Exception $e){
         DB::rollBack();
         errorMessage($e);
     }  

    }


    public function indexApproved($search,$sort,$pages)
    {    
      $this->search = $search;
      $this->sortfilter = $sort; 
      $this->perpage = $pages; 

       return  
       
       CompanyPolicy::with('company', 'department')
       ->where('status', 'approved')
       ->where(function ($query) {
           $query->where('policy_name', 'like', '%' . $this->search . '%')
                 ->orWhere('policy_description', 'like', '%' . $this->search . '%')
                 ->orWhereRelation('department', 'name', 'like', '%' . $this->search . '%');
       })
       ->orderBy('id', $this->sortfilter)
       ->paginate($this->perpage);
   
       }
       
       
       public function index($search,$sort,$pages)
       {    
         $this->search = $search;
         $this->sortfilter = $sort; 
         $this->perpage = $pages; 
   
          return  
          
          CompanyPolicy::with('company', 'department')
          ->where(function ($query) {
              $query->where('policy_name', 'like', '%' . $this->search . '%')
                    ->orWhere('policy_description', 'like', '%' . $this->search . '%')
                    ->orWhereRelation('department', 'name', 'like', '%' . $this->search . '%');
          })
          ->orderBy('id', $this->sortfilter)
          ->paginate($this->perpage);
      
          }
          
       }
