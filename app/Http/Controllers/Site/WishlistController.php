<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    public function index()
    {

        try {
           
           $user = auth()->user();
           
           $products = $user->wishlist_products;
           
           return view('site.wishlist',compact('products'));
          
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'add product to wishlist is failed']);

        }
       
    }

    
    public function wishlist(Product $product)
    {

        try {
           
            Wishlist::create([
                'product_id'=>$product->id,
                'user_id'=> Auth::user()->id,
            ]);
            flash('product added to your wishlist')->success();
            return redirect()->back();
          
        } catch (\Throwable $th) {
            flash('add product to wishlist is failed')->error();
            return redirect()->back();

        }
       
    }



    public function destroy( $id)
    {

        try {
           
            $user = auth()->user();
           
            $user->wishlist_products()->detach($id);
                        
            flash('product removed from your wishlist')->success();
            return redirect()->back();
          
        } catch (\Throwable $th) {
            flash('remove product from wishlist is failed')->error();
            return redirect()->back();

        }
       
    }

    
}