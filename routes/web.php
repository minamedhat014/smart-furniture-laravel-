<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalesTeamController;

use App\Http\Controllers\CustomerOrderController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/orderQoutation/{id}',[CustomerOrderController::class,'guestQoutation'])
->middleware('signed')->name('guestOrderQoutation.print');
    
    
   
    
    require __DIR__.'/auth.php';
    require __DIR__.'/admin.php';
    require __DIR__.'/sales.php';





