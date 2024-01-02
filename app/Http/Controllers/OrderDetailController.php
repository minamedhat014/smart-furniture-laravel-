<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customerOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class OrderDetailController extends Controller
{

   
    public function index ($id){

         $company_orders = customerOrder::with('store')
         ->whereRelation('store',function($query){
          $query->where('company_id','=', Auth::user()->company_id);})
          ->get();
           $id= $id;
        

           if(userFactory()){
            return view('admin.orders.order-details' ,compact('id'));  
           }
          elseif($company_orders->where('id',$id)->isNotEmpty()){
            return view('admin.orders.order-details' ,compact('id'));  
          } 
          else{   
           Session()->flash('error', 'The order you are attempting to access does not belong to your company');
           return back();
           }
    }
    

}
