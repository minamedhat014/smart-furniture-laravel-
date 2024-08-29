<?php

namespace App\Http\Controllers;



class productUpdateController extends Controller
{
 public function index(){
  
  return view('admin.products.productUpdate');
 }

//  public function images($id){
//  $data= version_control::FindOrFail($id);
//  return view('admin.products.version_docs',compact('data'));
//  }
}
