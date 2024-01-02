<?php

namespace App\Http\Controllers;

use App\Models\SalesTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SalesTeamController extends Controller
{
    public function index()
    {
        return view('sales.auth.login');
       
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function login (Request $Request):RedirectResponse
    {
        $validated = $Request->validate([
            'email' => 'required|max:100|email',
            'password' => 'required|max:20',
        ]);
     
       $check= $Request->all();
       if(Auth::guard('salesTeam')->attempt(['email'=>$check['email'],'password'=>$check['password']])){
         return redirect()->route('sales.dashboard');
       }else{
        return back()->with('error','Invaild Email and Password');
       }

    }

    public function dashboard  ()
    {
        return view('sales.dashboard');
    }

public function salesLogout(){
   Auth::guard('salesTeam')->logout();
   return redirect()->route('sales.login_form')->with('success','You have Logged out Successfully ');

    }

   
}
