<?php

namespace App\Http\Controllers;

use App\Models\version_control;
use Illuminate\Http\Request;

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
