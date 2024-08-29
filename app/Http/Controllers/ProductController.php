<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Barryvdh\DomPDF\PDF;

use Illuminate\Http\Request;
use App\Models\productDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Admin\products\Products;


class ProductController extends Controller
{
    public function index(){
        return view('admin.products.index');
    }



    public function pdf($id){   
    $products =Product::FindOrFail($id);
    $selected= productDetail::where('product_id',$id)->where('set',1)->get();
    $data= productDetail::where('product_id',$id)->get();    
   return view('admin.systemlayouts.productLayout',compact('products','data','selected'));
    }

    public function show($id){
        $products =Product::FindOrFail($id);
        $selected= productDetail::where('product_id',$id)->where('set',1)->get();
        $data= productDetail::where('product_id',$id)->get();
         DB::table('notifications')->where('notifiable_id',Auth::user()->id)->update(['read_at'=>now()]);
       return view('admin.systemlayouts.productLayout',compact('products','data','selected'));
    }
    

    }

   





