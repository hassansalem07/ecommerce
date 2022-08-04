<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeRequest;
use App\Models\Attribute;


class AttributeController extends Controller
{
   
    public function index()
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('list')){
                
                $attributes = Attribute::select('id','name')->paginate(10);
                return view('dashboard.attributes.index',compact('attributes'));
            }
            return redirect()->back()->with(['error'=>'you can’t do this action']);   
            
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'list attributes is failed']);
        }   
    }

    public function create()
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('create')){
                
            return view('dashboard.attributes.create');
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
           
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'create attributes is failed']);
        }
    }


    public function store(AttributeRequest $request)
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('create')){
                
            Attribute::create(['name' => $request->name]);
                
            return redirect()->route('admin.attributes.index')->with(['success'=>'attribute is added']);
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
        
        } catch (\Throwable $th) {
            
            return redirect()->back()->with(['error'=>'create attribute is failed']);
        }
       
    }
 
    public function edit(Attribute $attribute)
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('edit')){
                
            return view('dashboard.attributes.edit',compact('attribute'));
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
        
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'edit attribute is failed']);
        }    }

   
    public function update(AttributeRequest $request, Attribute $attribute)
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('edit')){
                
            $attribute->update(['name' => $request->name]);
                
            return redirect()->route('admin.attributes.index')->with(['success'=>'attribute is updated']);
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
        
        } catch (\Throwable $th) {
            
            return redirect()->back()->with(['error'=>'update attribute is failed']);
        }
    }

   
    public function destroy(Attribute $attribute)
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('delete')){
                
        $attribute->delete();
        return redirect()->route('admin.attributes.index')->with(['success'=>'attribute is deleted']);
        }
         return redirect()->back()->with(['error'=>'you can’t do this action']);   
    
        } catch (\Throwable $th) {
            return redirect()->route('admin.attributes.index')->with(['error'=>'attribute not deleted']);
        }
        
    }
}