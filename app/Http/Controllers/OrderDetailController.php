<?php

namespace App\Http\Controllers;


use App\Models\customerOrder;
use Illuminate\Support\Facades\Auth;
class OrderDetailController extends Controller
{

   
    public function index ($id){

         $company_orders = customerOrder::with('store')
         ->whereRelation('store',function($query){
          $query->where('company_id','=', authedCompany());})
          ->get(); 
           $id= $id;
        
           if(userFactory()){
            return view('admin.orders.order-details' ,compact('id'));  
           }
          elseif($company_orders->where('id',$id)->isNotEmpty()){
            return view('admin.orders.order-details' ,compact('id'));  
          } 
          else{   
          errorMessage('The order you are attempting to access does not belong to your company');
           return back();
           }
    }
    

}
