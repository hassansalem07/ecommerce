<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(ReviewRequest $request)
    {

        try {
           
            Review::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'body'=>$request->body,
                'product_id'=> $request->productId,
            ]);
            flash('thank you for your review')->success();
            return redirect()->back();
          
        } catch (\Throwable $th) {
            flash('review is failed please add review later')->error();
            return redirect()->back();

        }
       
    }


    public function productDetails($id)
    {
        try {
            $categories = Category::main()->with('subCategories')->get();
            $product = Product::with('options')->findOrFail($id);
            return view('site.product_details',compact('product','categories'));
            
        } catch (\Throwable $th) {
            flash('show product details is failed')->error();
            return redirect()->back();

        }

    }



    
}