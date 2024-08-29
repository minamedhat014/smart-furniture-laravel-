<?php

namespace App\Http\Controllers;

use toastr;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\RateLimiter;

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


        $key = 'login-attempts:' . $Request->ip();
    // Check if the request has been throttled

    if (RateLimiter::tooManyAttempts($key, 4)) {
        return back()->with('error', 'Too many login attempts. Please try again later.');
    }
    
        $Request->validate([
            'email' => 'required|max:100|email',
            'password' => 'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/|required|max:20|min:8',
        ]);
     
        
        $credentials = $Request->only('email', 'password');

    if (Auth::guard('admin')->attempt($credentials)) {
        RateLimiter::clear($key);

        $status = Auth::guard('admin')->user()->status;
        if ($status == 1) {
            return redirect()->route('admin.home');
        } else {
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login_form')->with('error', 'This user is no longer active.');
        }
    } else {
        RateLimiter::hit($key, 60); // Throttle for 60 seconds
        return back()->with('error', 'Invalid email or password.');
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
