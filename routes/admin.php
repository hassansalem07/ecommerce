<?php

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\AdminLoginController;
use App\Http\Controllers\Dashboard\AttributeController;
use App\Http\Controllers\Dashboard\BrandController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\CouponController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\TagController;
use App\Http\Controllers\Dashboard\OptionController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\ShippingController;
use App\Http\Controllers\Dashboard\SliderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group([ 'middleware'=>'guest:admin','prefix'=>'admin'],function(){
    
    Route::get('login',[AdminLoginController::class , 'login'])->name('admin.login');
    Route::post('submit-login',[AdminLoginController::class , 'submit_login'])->name('admin.submit.login');
       
});



Route::group(['middleware'=>'auth:admin','prefix'=>'admin'],function(){
    
    Route::get('dashboard',[DashboardController::class , 'index'])->name('dashboard.index');
    Route::get('logout',[DashboardController::class , 'logout'])->name('admin.logout');
    Route::get('profile',[ProfileController::class , 'index'])->name('admin.profile');
    Route::put('profile/update/{admin}',[ProfileController::class , 'update'])->name('update.profile');


    Route::group(['as' => 'admin.'],function(){
    
        Route::resource('admins' , AdminController::class);
        Route::resource('brands' , BrandController::class);
        Route::resource('categories' , CategoryController::class);
        Route::resource('tags' , TagController::class);
        Route::resource('products' , ProductController::class);
        Route::resource('attributes' , AttributeController::class);
        Route::resource('options' , OptionController::class);
        Route::resource('shippings' , ShippingController::class);
        Route::resource('coupons' , CouponController::class);
        Route::resource('orders' , OrderController::class);
        Route::resource('contacts' , ContactController::class);

        Route::group(['prefix'=>'products'],function(){
            
            Route::get('price/{id}' , [ProductController::class , 'price'])->name('products.price');
            Route::post('price/{id}' , [ProductController::class , 'savePrice'])->name('save.price');
            Route::get('stock/{id}' , [ProductController::class , 'stock'])->name('products.stock');
            Route::post('stock/{id}' , [ProductController::class , 'saveStock'])->name('save.stock');
            Route::get('images/{id}' , [ProductController::class , 'images'])->name('products.images');
            Route::post('images/{id}' , [ProductController::class , 'saveImages'])->name('save.images');
            Route::get('delete/Images/{id}' , [ProductController::class , 'deleteImages'])->name('delete.images');
            Route::get('reviews/{id}' , [ProductController::class , 'reviews'])->name('products.reviews');
            Route::delete('reviews/{id}' , [ProductController::class , 'deleteReview'])->name('reviews.destroy');
        });
        
        Route::group(['prefix'=>'slider'],function(){
            
            Route::get('images' , [SliderController::class , 'create'])->name('create.slider.images');
            Route::post('images' , [SliderController::class , 'store'])->name('save.slider.images');
            Route::get('delete/images/{id}' , [SliderController::class , 'destroy'])->name('delete.slider.images');
        });
        
        Route::group(['prefix'=>'orders'],function(){

            Route::get('customer/{order}',[OrderController::class , 'customer'])->name('order.customer');
            Route::get('products/{order}',[OrderController::class , 'products'])->name('order.products');

        });  
       
    
    });     


        
        


});