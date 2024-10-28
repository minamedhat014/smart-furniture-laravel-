<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\roleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\offersController;
use App\Http\Controllers\PolciyController;
use App\Http\Controllers\showRoomProducts;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SystemActivityLog;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\settingsController;
use App\Http\Controllers\ShowRoomController;
use App\Http\Controllers\permissionController;
use App\Http\Controllers\ProcessureController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\InstallTechController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\ShowRoomTeamController;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\productUpdateController;
use App\Http\Controllers\userPermissionController;
use App\Http\Controllers\InstallmentDetailsController;



// public routs 

// login guest routes 
Route::prefix('admin')->middleware('guest:admin')->group(function(){
    Route::get('/login',[AdminController::class,'index'])->name('admin.login_form');
    Route::post('/login/owner',[AdminController::class,'login'])->name('admin.login');   
    });


   
    Route::prefix('admin')->middleware('auth:admin')->group(function(){
    
                // general routes 
                Route::get('/home/',[AdminController::class,'home'])->name('admin.home'); 
                Route::post('/logout/',[AdminController::class,'adminLogout'])->name('admin.logout');       
                Route::get('/generate-qr/', 'QrCodeController@generate');
                Route::get('/notifications/',[settingsController::class,'notify'])->name('notifications.index');
              
                 //only for admins 
                Route::get ('/users/',[userPermissionController::class,'index'])->middleware(['permission:view users', 'role:admin|super admin'])->name('user.index');
                Route::get('/roles/',[roleController::class,'index'])->middleware(['permission:view users','role:admin|super admin'])->name('roles.index');
                Route::get('/permissions/',[permissionController::class,'index'])->middleware(['permission:view users','role:admin|super admin'])->name('permissions.index');
                Route::get('/activities/',[SystemActivityLog::class,'index'])->middleware(['permission:view activity log','role:admin|super admin'])->name('systemActivity.index');
                Route::get('/dropdownLists/',[settingsController::class,'index'])
                ->middleware(['permission:view system list','role:admin|super admin'])
                ->name('dropdown.index');
                Route::get('/importCenter/',[settingsController::class,'importCenter'])->middleware(['permission:view import center','role:admin|super admin|super sales factory'])->name('settings.importCenter');
    
               // processure routes 
                Route::get('/policies/',[PolciyController::class,'index'])->middleware('permission:view policies')->name('policy.index'); 
                Route::get('/policies/preview/{id}',[PolciyController::class,'preview'])->middleware('permission:view policies')->name('policy.preview'); 

               //distributor and showroom routes 
              Route::get('/showroom/',[ShowRoomController::class,'index'])->middleware('permission:view showrooms')->name('showroom.index');
              Route::get('/distributors/',[CompanyController::class,'index'])->middleware('permission:view distributors')->name('dist.index');
              Route::get('/showroom/Staff/{id}/',[ShowRoomTeamController::class,'index'])->middleware('permission:showroom staff')->name('showStaff.index');
              Route::get('/branch/Staff/',[ShowRoomTeamController::class,'show'])->name('branhStaff.show');
              Route::get('/install/Staff/',[InstallTechController::class,'index'])->name('installStaff.index');
              Route::get('/showroom/products/{id}/',[showRoomProducts::class,'index'])->middleware('permission:showroom products')->name('showroomProducts.index');
              Route::get('/branch/products/',[showRoomProducts::class,'show'])->name('brachProducts.show');

            //products and offers 
             Route::get('/products/',[ProductController::class,'index'])->middleware('permission:view products')->name('products.index');
             Route::get('/items/details/{id}/{type}/',[ProductDetailController::class,'index'])->name('itemsDetails');
             Route::get('/product/details/',[ProductDetailController::class,'show'])->name('productDetails');
             Route::get('/available/items/',[ProductDetailController::class,'available'])->middleware('permission:view available items')->name('avilableItems');
             Route::get('/product/details/export',[ProductDetailController::class,'export'])->name('productDetailsExport');
             Route::get('/products/{id}/',[ProductController::class,'pdf'])->middleware('permission:print product layout')->name('productPDF');
             Route::get('/product/{id}/',[ProductController::class,'show'])->middleware('permission:print product layout')->name('productSHOW');
             Route::get('/product/review/{id}/',[ProductReviewController::class,'index'])->middleware('permission:rate products')->name('productReview');
             Route::get('/productUpdate/',[productUpdateController::class,'index'])->middleware('permission:view product version')->name('productUpdate.index'); 
             Route::get('/offers/',[offersController::class,'index'])->middleware('permission:view offers')->name('offers.index');
             Route::get('/product/discounts/',[offersController::class,'discount'])->name('productDiscount.index');
             Route::get('/installments/',[InstallmentDetailsController::class,'index'])->middleware('permission:view installments')->name('installments.index');
             Route::get('/installments/details/{id}/',[InstallmentDetailsController::class,'details'])->middleware('permission:view installments')->name('installmentDetails');
      
         //    customers
             route::get('/customers/',[CustomerController::class,'index'])->middleware('permission:view customers')->name('customers.index');
             route::get('/myCustomers/',[CustomerController::class,'myIndex'])->middleware('permission:view customers')->name('customers.myIndex');
             route::get('/customer/details',[CustomerController::class,'insight'])->name('customer.insight');
         // customer orders 
            route::get('/customer/Orders/',[CustomerOrderController::class,'customerSelect'])->name('customerOrder.customerSelect');
            route::get('/customer/Order/preview/{id}',[CustomerOrderController::class,'preview'])->name('orderPDF.preview');
            route::get('/customer/Order/{id}',[CustomerOrderController::class,'orders'])->name('customerOrders.show');
            route::get('/orders/',[CustomerOrderController::class,'delivered'])->name('customerOrder.delivered');
            Route::get('/order/Details/{id}/',[OrderDetailController::class,'index'])->name('orderDetails.index');
            Route::get('/order/{id}/',[CustomerOrderController::class,'qoutation'])->name('orderQoutation.print');
         // appointment
            Route::get('/Appointments/',[AppointmentController::class,'select'])->name('appointment.select');
            Route::get('/Appointment/{id}',[AppointmentController::class,'viewAppointment'])->name('appointment.view');
            Route::post('/Appointments/',[AppointmentController::class,'index'])->name('appointment.index');



 
       
        });
      

    
    
    
    
    