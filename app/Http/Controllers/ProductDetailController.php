<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productDetail;
use App\Exports\productDetails;
use Maatwebsite\Excel\Facades\Excel;

class ProductDetailController extends Controller
{
   public function index($id,$type){
      $id=$id;
      $type=$type;
    return view('admin.products.items-details',compact('id','type'));
   }


   public function show(){
   
      return view('admin.products.price-list');
   }


   public function available(){
      return view('admin.products.available-items');
   }

}
