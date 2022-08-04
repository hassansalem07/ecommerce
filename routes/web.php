<?php

use App\Http\Controllers\Site\CartController;
use App\Http\Controllers\Site\ProductController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\OrderController;
use App\Http\Controllers\Site\ReviewController;
use App\Http\Controllers\Site\SearchController;
use App\Http\Controllers\Site\WishlistController;
use App\Http\Controllers\Site\UserController;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', [HomeController::class , 'index'])->name('site');

Route::get('list-products', [ProductController::class , 'products'])->name('list.products');

Route::get('product/{id}', [ProductController::class , 'productDetails'])->name('product.details');

Route::get('brand/products/{id}', [ProductController::class , 'productsByBrand'])->name('brand.products');

Route::get('category/{slug}', [ProductController::class , 'productsBySlug'])->name('category.slug');

Route::post('review',[ReviewController::class , 'store'])->name('review.store');

Route::post('order',[OrderController::class , 'store'])->name('order.store');

Route::post('search', [SearchController::class , 'search'])->name('search');

Route::group(['prefix' => 'cart'],function(){

    Route::get('/',[CartController::class , 'index'])->name('cart');
    Route::get('add/{product}',[CartController::class , 'add'])->name('add.cart');
    Route::get('remove/{product}',[CartController::class , 'remove'])->name('remove.cart');
    Route::get('quantity/{product}/{qty}',[CartController::class , 'update_quantity'])->name('cart.quantity');
    Route::post('checkout',[CartController::class , 'checkout'])->name('cart.checkout');
});




Route::group(['middleware'=>'auth'],function(){

    Route::group(['prefix' => 'account'],function(){
 
        Route::get('/', [UserController::class , 'account'])->name('account');
        Route::put('update/{user}',[UserController::class , 'update'])->name('update.account');
    });

    Route::group(['prefix' => 'wishlist'],function(){

        Route::get('/',[WishlistController::class , 'index'])->name('wishlist.index');
        Route::get('add/{product}',[WishlistController::class , 'wishlist'])->name('wishlist');
        Route::get('remove/{id}',[WishlistController::class , 'destroy'])->name('wishlist.remove');
    });
    
    Route::group(['prefix' => 'orders'],function(){

        Route::get('/',[OrderController::class , 'index'])->name('my.orders');
        Route::get('products/{order}',[OrderController::class , 'order_products'])->name('order.products');
        Route::get('delete/{order}',[OrderController::class , 'destroy'])->name('order.destroy');

    });
    

});