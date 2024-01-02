<?php

namespace App\Http\Controllers;

use toastr;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.auth.login');
       
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function login (Request $Request):RedirectResponse
    {
        $validated = $Request->validate([
            'email' => 'required|max:100|email',
            'password' => 'regex:/^[a-zA-Z0-9\s\-]+$/u|required|max:20',
        ]);
     
       $check= $Request->all();
    
       if(Auth::guard('admin')->attempt(['email'=>$check['email'],'password'=>$check['password']])){
        $status = Auth::guard('admin')->user()->status;
       if($status ==1){
        return redirect()->route('admin.home');
       }else{
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login_form')->with('error','This user is no longer active');
       }

        
       }else{
        return back()->with('error','Invaild Email or Password');
       }

    }

    public function home  ()
    {
        return view('admin.home');
    }

public function adminLogout(){
 
   Auth::guard('admin')->logout();
   return redirect()->route('admin.login_form');

    }


   
}
