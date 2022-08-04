<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\Models\Coupon;

class CouponController extends Controller
{
   
    public function index()
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('list')){
              
            $coupons = Coupon::paginate(10);
            return view('dashboard.coupons.index',compact('coupons'));
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
        
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'list coupons is failed']);
        }   
    }

    public function create()
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('create')){
              
            return view('dashboard.coupons.create');
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
         
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'create coupon is failed']);
        }
    }


    public function store(CouponRequest $request)
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('create')){
              
            Coupon::create($request->all());
                
            return redirect()->route('admin.coupons.index')->with(['success'=>'coupon is added']);
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
         
        } catch (\Throwable $th) {
            
            return redirect()->back()->with(['error'=>'create coupon is failed']);
        }
       
    }
 
    public function edit(Coupon $coupon)
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('edit')){
              
            return view('dashboard.coupons.edit',compact('coupon'));
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
        
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'edit coupon is failed']);
        }    }

   
    public function update(CouponRequest $request,Coupon $coupon)
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('edit')){
              
            $coupon->update($request->all());
                
            return redirect()->route('admin.coupons.index')->with(['success'=>'coupon is updated']);
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
          
        } catch (\Throwable $th) {
            
            return redirect()->back()->with(['error'=>'update coupon is failed']);
        }
    }

   
    public function destroy(Coupon $coupon)
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('delete')){
              
        $coupon->delete();
        
        return redirect()->route('admin.coupons.index')->with(['success'=>'coupon is deleted']);
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
   
        } catch (\Throwable $th) {
            return redirect()->route('admin.coupons.index')->with(['error'=>'coupon not deleted']);
        }
        
    }
}