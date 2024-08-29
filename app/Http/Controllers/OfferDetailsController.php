<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OfferDetailsController extends Controller
{
    public function index($id){
        $id=$id;   
      return view('admin.products.offer-details',compact('id'));
     }
}
