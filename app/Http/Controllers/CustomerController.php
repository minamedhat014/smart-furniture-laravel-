<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){

        return view('admin.customers.index');
    }


    public function myIndex(){
        return view('admin.customers.myIndex');
    }

    public function insight(){
        return view('admin.customers.customer-details');
    }
}
