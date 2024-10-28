<?php

namespace App\Http\Controllers;

use App\Models\CompanyPolicy;
use App\Traits\HasTable;
use Illuminate\Http\Request;

class PolciyController extends Controller
{
    
    use HasTable;

    public function index(){
       
     return view('admin.procedures.company-policy-index');

    }


    public function preview($id){        
        $policy=CompanyPolicy::FindOrFail($id);
        $this->check_permission('view '.$policy->department?->name.' policy');
        return view('admin.procedures.preview-pdf' ,compact('policy'));
   
       }
}
