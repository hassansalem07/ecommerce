<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShippingsRequest;
use App\Models\Shipping;

class ShippingController extends Controller
{
   
    public function index()
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('list')){
            
            $shippings = Shipping::paginate(10);
            return view('dashboard.shippings.index',compact('shippings'));
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
          
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'list shippings is failed']);
        }   
    }

    public function create()
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('create')){
            
            return view('dashboard.shippings.create');
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
         
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'create shippings is failed']);
        }
    }


    public function store(ShippingsRequest $request)
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('create')){
            
            Shipping::create([
                'city' => $request->city,
                'price' => $request->price,
                ]);
                
            return redirect()->route('admin.shippings.index')->with(['success'=>'shipping is added']);
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
        
        } catch (\Throwable $th) {
            
            return redirect()->back()->with(['error'=>'create shipping is failed']);
        }
       
    }
 
    public function edit(Shipping $shipping)
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('edit')){
            
            return view('dashboard.shippings.edit',compact('shipping'));
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
         
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'edit shipping is failed']);
        }    }

   
    public function update(ShippingsRequest $request,Shipping $shipping)
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('edit')){
            
            $shipping->update([
                'city' => $request->city,
                'price' => $request->price,
                ]);
                
            return redirect()->route('admin.shippings.index')->with(['success'=>'shipping is updated']);
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
        
        } catch (\Throwable $th) {
            
            return redirect()->back()->with(['error'=>'update shipping is failed']);
        }
    }

   
    public function destroy(Shipping $shipping)
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('delete')){
            
        $shipping->delete();
        return redirect()->route('admin.shippings.index')->with(['success'=>'shipping is deleted']);
            }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
  
        } catch (\Throwable $th) {
        return redirect()->route('admin.shippings.index')->with(['error'=>'shipping not deleted']);
             }
        
    }
}