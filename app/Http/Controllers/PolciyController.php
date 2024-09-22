<?php

namespace App\Http\Controllers;

use App\Models\CompanyPolicy;
use Illuminate\Http\Request;

class PolciyController extends Controller
{
    
    public function index(){
       
     return view('admin.procedures.company-policy-index');

    }


    public function preview($id){
               
        $policy=CompanyPolicy::FindOrFail($id);
        return view('admin.procedures.preview-pdf' ,compact('policy'));
   
       }
}
