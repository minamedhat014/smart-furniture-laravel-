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
