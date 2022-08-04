<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
   
    public function index()
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('list')){
                
            $mainCategories = Category::main()->select('id','name','slug','is_active')->paginate(10);
            $subCategories = Category::sub()->paginate(10);
            
            return view('dashboard.categories.index',compact('mainCategories','subCategories'));
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
         
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'list categories is failed']);
        }   
    }

    public function create()
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('create')){
                
            $mainCategories = Category::main()->select('id','name')->get();
            return view('dashboard.categories.create',compact('mainCategories'));
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
          
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'create category is failed']);
        }
    }


    public function store(CategoryRequest $request)
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

            if($request->type == 1){
                $request->request->add(['parent_id' => null]);
            }
            
            Category::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'is_active' => $request->is_active,
                'parent_id' => $request->parent_id ?? null,
                ]);

                DB::commit();
                
            return redirect()->route('admin.categories.index')->with(['success'=>'category is added']);
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
        
        } catch (\Throwable $th) {
            
            DB::rollBack();
            return redirect()->back()->with(['error'=>'create category is failed']);
        }
       
    }

    public function show(Category $category)
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('list')){
                
            $subCategories = $category->subCategory;
            return view('dashboard.categories.subCategories',compact( 'category','subCategories'));
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
         
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'list sub categories is failed']);
        }
       
    }

 
    public function edit(Category $category)
    {
        
        try {
            $admin = auth()->user('admin');
            if($admin->can('edit')){
                
            $mainCategories = Category::main()->select('id','name')->get();

            return view('dashboard.categories.edit',compact('category','mainCategories'));
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
          
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'edit category is failed']);
        }    }

   
    public function update(CategoryRequest $request, Category $category)
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
                   
            if($request->type == 1){
                $request->request->add(['parent_id' => null]);
            }
            
            $category->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'is_active' => $request->is_active,
                'parent_id' => $request->parent_id ?? null,
                ]);

                DB::commit();
                
            return redirect()->route('admin.categories.index')->with(['success'=>'category is updated']);
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
         
        } catch (\Throwable $th) {
            
            DB::rollBack();
            return redirect()->back()->with(['error'=>'update category is failed']);
        }
    }

   
    public function destroy(Category $category)
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('delete')){
                
        $category->delete();
        return redirect()->route('admin.categories.index')->with(['success'=>'category is deleted']);
    }
    return redirect()->back()->with(['error'=>'you can’t do this action']);   
    
        } catch (\Throwable $th) {
            return redirect()->route('admin.categories.index')->with(['error'=>'category not deleted']);
        }  
    }

}