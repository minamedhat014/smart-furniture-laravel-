<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\customerOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CustomerOrderController extends Controller
{

    public function index(){
        return view('admin.customers.customer-details');
    }

    public function orders($id){
        
        $company_orders = customerOrder::with('store')
        ->whereRelation('store',function($query){
         $query->where('company_id','=', authedCompany());})
         ->get(); 
          $id= $id;
       
          if(userFactory()){

            return view('admin.orders.order-index',compact('id'));

          }
         elseif($company_orders->where('id',$id)->isNotEmpty()){
            
            return view('admin.orders.order-index',compact('id'));
         } 
         else{   
         errorMessage('The order you are attempting to access does not belong to your company');
          return back();
          }

       
    }

    public function show(){
        return view('admin.orders.order-show');
    }

    public function factory($id){
        $order =customerOrder::FindOrFail($id);
        $data= OrderDetail::where('order_id',$id)->get();
         DB::table('notifications')->where('notifiable_id',Auth::user()->id)->update(['read_at'=>now()]);
        return view('admin.orders.order_pdf',compact('order','data'));
    }
}
