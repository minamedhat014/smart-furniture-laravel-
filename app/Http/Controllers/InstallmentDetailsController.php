<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstallmentDetailsController extends Controller
{
    public function index(){
        return view('admin.products.installment');
    }

    public function details($id){
        $id=$id;   
      return view('admin.products.installment-details',compact('id'));
     }
}
