<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\roleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PricesController;
use App\Http\Controllers\showRoomProducts;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\InstallmentDetailsController;
use App\Http\Controllers\InstallTechController;
use App\Http\Controllers\OfferDetailsController;
use App\Http\Controllers\offersController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\ProductController;
use App\Http\Livewire\Admin\ProductDetails;
use App\Http\Controllers\ShowRoomController;
use App\Http\Controllers\permissionController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\productUpdateController;
use App\Http\Controllers\settingsController;
use App\Http\Controllers\ShowRoomTeamController;
use App\Http\Controllers\SystemActivityLog;
use App\Http\Controllers\userPermissionController;
use App\Models\customerOrder;

Route::prefix('admin')->middleware('guest:admin')->group(function(){

    Route::get('/login',[AdminController::class,'index'])->name('admin.login_form');
    Route::post('/login/owner',[AdminController::class,'login'])->name('admin.login');
    });


   
    Route::prefix('admin')->middleware('auth:admin')->group(function(){

        // general settings 

        Route::get('/home',[AdminController::class,'home'])->name('admin.home'); 
        Route::post('logout',[AdminController::class,'adminLogout'])->name('admin.logout');  
        Route::get('roles',[roleController::class,'index'])->name('roles.index');
        Route::get('activities',[SystemActivityLog::class,'index'])->middleware('permission:view activity log')->name('systemActivity.index');
        Route::get('dropdownLists',[settingsController::class,'index'])->name('dropdown.index');
        Route::get('generate-qr', 'QrCodeController@generate');
        Route::get('notifications',[settingsController::class,'notify'])->name('notifications.index');
        Route::get('permissions',[permissionController::class,'index'])->name('permissions.index');
        Route::get ('users',[userPermissionController::class,'index'])->name('user.index');




        // sales medule 
        Route::get('distributors',[CompanyController::class,'index'])->middleware('permission:view distributors')->name('dist.index');
        Route::get('products',[ProductController::class,'index'])->name('products.index');
        Route::get('itemsDetails/{id}/{type}',[ProductDetailController::class,'index'])->name('itemsDetails');
        Route::get('productDetails',[ProductDetailController::class,'show'])->name('productDetails');
        Route::get('productDetails/export',[ProductDetailController::class,'export'])->name('productDetailsExport');
        Route::get('products/{id}',[ProductController::class,'pdf'])->name('productPDF');
        Route::get('product/{id}',[ProductController::class,'show'])->name('productSHOW');
        Route::get('product_review/{id}',[ProductReviewController::class,'index'])->name('productReview');
        Route::get('showroom',[ShowRoomController::class,'index'])->name('showroom.index');
        Route::get('showroomStaff/{id}',[ShowRoomTeamController::class,'index'])->name('showStaff.index');
        Route::get('branchStaff',[ShowRoomTeamController::class,'show'])->name('branhStaff.show');
        Route::get('installStaff',[InstallTechController::class,'index'])->name('installStaff.index');
        Route::get('showroom_products/{id}',[showRoomProducts::class,'index'])->name('showroomProducts.index');
        Route::get('branchProducts',[showRoomProducts::class,'show'])->name('brachProducts.show');
        Route::get('product_update',[productUpdateController::class,'index'])->name('productUpdate.index');
        Route::get('update_documents/{id}',[productUpdateController::class,'images'])->name('productUpdate.docs');
        Route::get('offers',[offersController::class,'index'])->name('offers.index');
        Route::get('installments',[InstallmentDetailsController::class,'index'])->name('installments.index');
        Route::get('installmentsDetails/{id}',[InstallmentDetailsController::class,'details'])->name('installmentDetails');
      


    //    customers medule 

    route::get('customers',[CustomerController::class,'index'])->name('customers.index');
    route::get('myCustomers',[CustomerController::class,'myIndex'])->name('customers.myIndex');

    // customer orders 
    route::get('customerOrders',[CustomerOrderController::class,'index'])->name('customerOrder.index');
    route::get('orders',[CustomerOrderController::class,'show'])->name('customerOrder.show');
    Route::get('orderDetails/{id}',[OrderDetailController::class,'index'])->name('orderDetails.index');
    Route::get('order/{id}',[CustomerOrderController::class,'factory'])->name('orderFactory.note');
    Route::get('deliveryAppointment',[AppointmentController::class,'index'])->name('deliveryAppointment.index');
    




        

       
        });
      

    
    
    
    
    