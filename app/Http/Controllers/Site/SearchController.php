<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        try {
            $categories = Category::main()->with('subCategories')->get();
            $brands = Brand::active()->get();   
            
            if($request->keyword){
                
                $keyword = $request->keyword;
                $query = Product::query();
        
                $products = $query->where('name','like','%'.$keyword.'%')
                                ->orWhere('description','like','%'.$keyword.'%')
                                ->orWhereHas('brand',function($brand) use ($keyword) {
                                    $brand->where('name','like','%'.$keyword.'%');
                                })
                                ->orWhereHas('category',function($category) use ($keyword){
                                    $category->where('name','like','%'.$keyword.'%');
                                })->get();
        
                return view('site.products',compact('products','categories','brands'));
            }
            return redirect()->back(); 
              
        } catch (\Throwable $th) {
            flash('search is failed')->error();
            return redirect()->back();
        }
       
    }
}