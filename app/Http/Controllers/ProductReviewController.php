<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    public function index($id){
        $id=$id;
        return view('admin.products.productReview',compact('id'));
    }
}
