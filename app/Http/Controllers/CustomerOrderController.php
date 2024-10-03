<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\customerOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class CustomerOrderController extends Controller
{

   




  public function customerSelect(){
        
   return view('admin.orders.customer-select');

   
}


    public function orders($id){
        
        $company_orders = customerOrder::with('store')
        ->whereRelation('store',function($query){
         $query->where('company_id','=', authedCompany());})
         ->get(); 
          $id= $id;
       
          if(userFactory()){
            DB::table('notifications')->where('notifiable_id',Auth::user()->id)->update(['read_at'=>now()]);
            return view('admin.orders.order-show',compact('id'));

          }
         elseif($company_orders->where('id',$id)->isNotEmpty()){
            
            return view('admin.orders.order-show',compact('id'));
         } 
         else{   
         errorMessage('The order you are attempting to access does not belong to your company');
          return back();
          }

       
    }

   

    public function qoutation($id){

        $company_orders = customerOrder::with('store')
        ->whereRelation('store',function($query){
         $query->where('company_id','=', authedCompany());})
         ->get(); 
          $id= $id;
          
        $order =customerOrder::FindOrFail($id);
        $data= OrderDetail::where('order_id',$id)->get();
       
          if(userFactory()){

            return view('admin.systemLayouts.orderQoutation',compact('order','data'));

          }
         elseif($company_orders->where('id',$id)->isNotEmpty()){
            
            return view('admin.systemLayouts.orderQoutation',compact('order','data'));
         } 
         else{   
         errorMessage('The order you are attempting to access does not belong to your company');
          return back();
          }
       
    }

    public function preview($id){
        $company_orders = customerOrder::with('store')
        ->whereRelation('store',function($query){
         $query->where('company_id','=', authedCompany());})
         ->get(); 
          $id= $id;
          $order= customerOrder::FindOrFail($id);
          
       if(userFactory()){

            return view('admin.orders.preview-pdf',compact('order'));

          }
         elseif($company_orders->where('id',$id)->isNotEmpty()){
            
            return view('admin.orders.preview-pdf',compact('order'));
         } 
         else{   
         errorMessage('The order you are attempting to access does not belong to your company');
          return back();
          }
       
    }
}
