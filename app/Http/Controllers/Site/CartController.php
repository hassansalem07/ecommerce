<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Shipping;
use Carbon\Carbon;


class CartController extends Controller
{
    public function index()
    {
        try {
            $products = session()->get('cart');
            if(session()->has('cart') && count($products) > 0 ){
                foreach( session()->get('cart') as $product ){
                    $prices[] =  $product->selling_price * $product->qty;
                    }    
                    
                    $total = array_sum($prices);
                    $shippings = Shipping::get();    
                    return view('site.cart',compact('total','shippings'));
            }
                    flash('you don’t have products in cart')->error();
                    return redirect()->back();
                    
        } catch (\Throwable $th) {
            flash('cart is failed')->error();
            return redirect()->back();
        }    
    }

                    

    public function add(Product $product)
    {
         try {
            if(session()->has('cart')){
            
                $products = session()->get('cart');
                if($products->contains('id',$product->id)){
                    
                    flash('product already exist')->warning();
                    return redirect()->back();
                }
                else {
                $product->qty = 1;
                $products->push($product);
                session()->put('cart',$products);
                }
            } else {
                
                $product->qty = 1;
                $products = collect();
                $products->push($product);
                session()->put('cart',$products);
            }
    
            flash('the product added to cart')->success();
            return redirect()->back();
            
         } catch (\Throwable $th) {
            flash('add to cart is failed')->error();
            return redirect()->back();         } 
    }

    
    public function remove(Product $product)
    {
         try {
            if(session()->has('cart')){
            
                $products = session()->get('cart');
                
                foreach( $products as $key => $item ){
                    if($item->id == $product->id ){
                        $products->pull($key);
                    }
                }
                session()->put('cart',$products);
            }
    
            if(count($products) >= 1){
                flash('product removed from cart')->success();
                return redirect()->back();
            }
            flash('your cart is empty')->success();
            return redirect()->route('site');
            
         } catch (\Throwable $th) {
            flash('remove from card is failed')->error();
            return redirect()->back();
         }


        
      
    }

    public function update_quantity($product,$qty)
    {
        try {
        $products = session()->get('cart');
        $product = $products->where('id',$product)->first();
        $product->increment('qty',$qty);
        return redirect()->back();
        
        } catch (\Throwable $th) {
            flash('update quantity is failed')->error();
            return redirect()->back();
        }
       
    }


    public function checkout(CheckoutRequest $request )
    {
        try {
            $shipping_cost = Shipping::where('city',$request->city)->select('price','city')->first();
            $coupon = Coupon::where('code',$request->code)->first();
    
    
            if($request->code && $coupon->start < Carbon::now() && $coupon->end > Carbon::now()){ 
            
             $order_price = $request->price - $coupon->discount_value;
            } else {
                $order_price = $request->price;
            }
               $total = $order_price + $shipping_cost->price;
               
            return view('site.checkout',compact('order_price','shipping_cost','total'));
            
        } catch (\Throwable $th) {
            flash('checkout is failed')->error();
            return redirect()->back();
        }
    }

    
}