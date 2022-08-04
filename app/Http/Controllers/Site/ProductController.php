<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{

    public function products()
    {
        try {
            $products = Product::active()->get();
            $categories = Category::main()->with('subCategories')->get();
            $brands = Brand::active()->get();   
            
            return view('site.products',compact('products','categories','brands'));
            
        } catch (\Throwable $th) {

            flash('products is failed')->error();
            return redirect()->back();

        }
       
    }
    
    public function productsBySlug($slug)
    {
        try {
            $categories = Category::main()->with('subCategories')->get();
            $brands = Brand::active()->get();   
            $category = Category::where('slug',$slug)->first();
            
            if(count($category->products) > 0){
                $products = $category->products;
                return view('site.products',compact('products','categories','brands'));
          
            } else {
                flash('this category doesn’t have products')->error();
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            flash('show product is failed')->error();
            return redirect()->back();

        }
       
    }

    public function productsByBrand($id)
    {
        try {
        $categories = Category::main()->with('subCategories')->get();
        $brands = Brand::active()->get();   
        $products = Product::where('brand_id',$id)->get();
        
        return view('site.products',compact('products','brands','categories'));

        } catch (\Throwable $th) {
           
            flash('show product is failed')->error();
            return redirect()->back();
        }
       
    }

    public function productDetails($id)
    {
        try {
            
            $categories = Category::main()->with('subCategories')->get();
            $brands = Brand::active()->get();   
            $product = Product::findOrFail($id);

            $product_attributes =  Attribute::whereHas('options' , function ($q) use($id){
            $q -> whereHas('product',function ($qq) use($id){
            $qq -> where('product_id',$id);
            });
            })->get();

            $recommendedProducts = Product::where('category_id',$product->category_id)
            ->orderBy('id','desc')->paginate(3);
        
          return view('site.product_details',compact('product','categories','product_attributes','recommendedProducts','brands'));
            
        } catch (\Throwable $th) {
            flash('show product details is failed')->error();
            return redirect()->back();
        }

    }



    
}