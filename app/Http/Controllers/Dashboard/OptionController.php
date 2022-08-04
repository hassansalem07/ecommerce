<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\OptionRequest;
use App\Models\Attribute;
use App\Models\Option;
use App\Models\Product;


class OptionController extends Controller
{
    
    public function index()
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('list')){
                
            $options = Option::select('id','name','price','attribute_id','product_id')->paginate(10);
            return view('dashboard.options.index',compact('options'));
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
        
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'list options is failed']);
        }  
     
        
    }

   
    public function create()
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('create')){
                
            $products = Product::active()->get();
            $attributes = Attribute::get();
            
            return view('dashboard.options.create',compact('products','attributes'));
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
         
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'create option is failed']);
        }
       
    }


    public function store(OptionRequest $request)
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('create')){
                
            Option::create($request->all());
    
            return redirect()->route('admin.options.index');
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
           
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'create option is failed']);
        }
         
    }

   
    public function edit(Option $option)
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('edit')){
                
            $products = Product::active()->get();
            $attributes = Attribute::get();
      
            return view('dashboard.options.edit',compact('option','products','attributes'));
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
          
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'edit option is failed']);
        }
     
    }


    public function update(OptionRequest $request, Option $option)
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('edit')){
                
            $option->update($request->all());
        
            return redirect()->route('admin.options.index')->with(['success'=>'option is updated']);
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
           
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'update option is failed']);
        }

       
    }


    public function destroy(Option $option)
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('delete')){
                
            $option->delete();
            return redirect()->back()->with(['success'=>'option is deleted']); 
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
          
        } catch (\Throwable $th) {
            return redirect()->route('admin.options.index')->with(['error'=>'option not deleted']);
        }
       
    }


  


  
}