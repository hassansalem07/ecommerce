<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;

class HomeController extends Controller
{

   public function index() 
   {
       try {
        $products = Product::active()->orderBy('id','desc')->paginate(6);
        $sliders = Slider::get();
        $categories = Category::main()->with('subCategories')->get();
        $brands = Brand::active()->get();   
        
        return view('site.index',compact('sliders','categories','brands','products'));
        
       } catch (\Throwable $th) {
        flash('home page is failed')->error();
        return redirect()->back();
        
       }
      
    }


    
}