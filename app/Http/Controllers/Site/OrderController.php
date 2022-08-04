<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
   
    public function index()
    {
        try {
            $orders = Order::where('customer_email',auth()->user()->email)->get();
            return view('site.my_orders',compact('orders'));
            
        } catch (\Throwable $th) {
            flash('list orders is failed')->error();
            return redirect()->back();
        }
      
    }

    
    public function order_products(Order $order)
    {
        try {
            $products = $order->products;
            return view('site.order_products',compact('products'));
            
        } catch (\Throwable $th) {
            flash('list orders is failed')->error();
            return redirect()->back();        }
      
    }


    public function store(Request $request)
    {
        
        try {
            
          $order = Order::create([
                'customer_name'=>$request->name,
                'customer_email'=>$request->email,
                'customer_address'=>$request->address,
                'customer_city'=>$request->city,
                'customer_phone'=>$request->phone,
                'customer_message'=>$request->message,
                'total_price'=>$request->total,
            ]);

            if(session()->has('cart')){
                $products = session()->get('cart');
                
                foreach( $products as $key => $item ){
                    $order->products()->attach($item->id,['qty'=>$item->qty]);

                    }
                    session()->pull('cart');
                }
            
            return redirect()->route('site');
            
        } catch (\Throwable $th) {

            flash('order is failed')->error();
            return redirect()->route('site');
        }
    }

    
    public function destroy(Order $order)
    {
        try {
            $products = $order->products;
            foreach($products as $product){
            $order->products()->detach($product->id);
             }
             $order->delete();
             return redirect()->back();
             
        } catch (\Throwable $th) {
            flash('remove order is failed')->error();
            return redirect()->route('site');        }

    }


}