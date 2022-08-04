<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;


class OrderController extends Controller
{
   
    public function index()
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('list')){
               
            $orders = Order::paginate(10);
            return view('dashboard.orders.index',compact('orders'));
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
         
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'list orders is failed']);
        }   
    }

    
 
    public function edit(Order $order)
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('edit')){
               
            return view('dashboard.orders.edit',compact('order'));
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
         
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'edit order is failed']);
        }    }

   
    public function update(Request $request, Order $order)
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('edit')){
               
            $order->update(['status' => $request->status]);
                
            return redirect()->route('admin.orders.index')->with(['success'=>'order is updated']);
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
          
        } catch (\Throwable $th) {
            
            return redirect()->back()->with(['error'=>'update order is failed']);
        }
    }

   
    public function destroy(Order $order)
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('delete')){
               
            $products = $order->products;
            foreach($products as $product){
                $order->products()->detach($product->id);
            }
             $order->delete();

             return redirect()->route('admin.orders.index')->with(['success'=>'order is deleted']);
            }
            return redirect()->back()->with(['error'=>'you can’t do this action']);   
           
        } catch (\Throwable $th) {
            return redirect()->route('admin.orders.index')->with(['error'=>'order not deleted']);
        }
        
    }

    public function customer(Order $order)
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('list')){
                
            return view('dashboard.orders.customer',compact('order'));
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
          
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'list orders is failed']);
        }
    }

    public function products(Order $order)
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('list')){
                
            $products = $order->products;
            return view('dashboard.orders.products',compact('products'));
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
          
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'list products is failed']);
        }
      
    }
}