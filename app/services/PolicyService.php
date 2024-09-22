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


    public function index($search,$sort,$pages)
    {
       
      $this->search = $search;
      $this->sortfilter = $sort; 
      $this->perpage = $pages; 
       return  
        CompanyPolicy::with('lines')
        ->where('policy_name', 'like', '%'.$search.'%')->
        orWhere('policy_description', 'like', '%'.$search.'%')
        ->orderBy('id',$sort)->paginate($pages);
       }
       

          
       }
