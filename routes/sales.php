<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesTeamController;



//--------------------------------------admin routes ------------------------------------

//guest to admin area 


Route::prefix('sales')->middleware('guest:salesTeam')->group(function(){

    Route::get('/login',[SalesTeamController::class,'index'])->name('sales.login_form');
    Route::post('/login/owner',[SalesTeamController::class,'login'])->name('sales.login');
    });
    //--------------------------- -----------------------------
    //auth to dashboard area 
    Route::prefix('sales')->middleware('auth:salesTeam')->group(function(){
        Route::get('/',[SalesTeamController::class,'dashboard'])->name('sales.dashboard');
        Route::post('/logout',[SalesTeamController::class,'salesLogout'])->name('sales.logout');


















        
        });
    
      

    
    
    
    
    