<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
   
    public function index()
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('list')){
            $brands = Brand::select('id','name','is_active','image')->paginate(10);
            return view('dashboard.brands.index',compact('brands'));
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
          
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'list brands is failed']);
        }   
    }

    public function create()
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('create')){
            return view('dashboard.brands.create');
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
          
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'create brand is failed']);
        }
    }


    public function store(BrandRequest $request)
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('create')){
                
            DB::beginTransaction();
         
            if(!$request->has('is_active')){
                $request->request->add(['is_active' => 0]);
            }
            else{
                $request->request->add(['is_active' => 1]);
            }
                       
           if($request->hasFile('image')){
             $image =  $request->file('image');
             $imageName = $image->getClientOriginalName();
             $path = public_path('images/brands');
             $image->move($path,$imageName);
           }  

            Brand::create([
                'name' => $request->name,
                'image' => $imageName ?? null,
                'is_active' => $request->is_active,
                ]);

                DB::commit();
                
            return redirect()->route('admin.brands.index')->with(['success'=>'brand is added']);
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
          
        } catch (\Throwable $th) {
            
            DB::rollBack();
            return redirect()->back()->with(['error'=>'create brand is failed']);
        }
       
    }
 
    public function edit(Brand $brand)
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('edit')){
                
            return view('dashboard.brands.edit',compact('brand'));
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
         
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'edit brand is failed']);
        }    }

   
    public function update(BrandRequest $request, Brand $brand)
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('edit')){
            DB::beginTransaction();
         
            if(!$request->has('is_active')){
                $request->request->add(['is_active' => 0]);
            }
            else{
                $request->request->add(['is_active' => 1]);
            }
                       
           if($request->hasFile('image')){
             $image =  $request->file('image');
             $imageName = $image->getClientOriginalName();
             $path = public_path('images/brands');
             $image->move($path,$imageName);
           }  

            $brand->update([
                'name' => $request->name,
                'image' => $imageName ?? null,
                'is_active' => $request->is_active,
                ]);

                DB::commit();
                
            return redirect()->route('admin.brands.index')->with(['success'=>'brand is updated']);
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
          
        } catch (\Throwable $th) {
            
            DB::rollBack();
            return redirect()->back()->with(['error'=>'update brand is failed']);
        }
    }

   
    public function destroy(Brand $brand)
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('delete')){
                
        $brand->delete();
        return redirect()->route('admin.brands.index')->with(['success'=>'brand is deleted']);
    }
    return redirect()->back()->with(['error'=>'you can’t do this action']);   
    
        } catch (\Throwable $th) {
            return redirect()->route('admin.brands.index')->with(['error'=>'brand not deleted']);
        }
        
    }
}