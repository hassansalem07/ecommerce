<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductImagesRequest;
use App\Http\Requests\ProductPriceRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductStockRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Review;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    
    public function index()
    {
      try {
        $admin = auth()->user('admin');
        if($admin->can('list')){
           
        $products = Product::select('id','name','short_description','slug','category_id','brand_id','is_active')
        ->paginate(10);
           
         return view('dashboard.products.general.index',compact('products'));
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
      
      } catch (\Throwable $th) {
        return redirect()->back()->with(['error'=>'list products is failed']);
      }
     
        
    }

   
    public function create()
    {
      try {
        $admin = auth()->user('admin');
        if($admin->can('create')){
           
        $brands = Brand::active()->get();   
        $categories = Category::active()->get();
        $tags = Tag::get();

        return view('dashboard.products.general.create',compact('brands','categories','tags'));
      }
      return redirect()->back()->with(['error'=>'you can’t do this action']);   
    
      } catch (\Throwable $th) {
        return redirect()->back()->with(['error'=>'create product is failed']);
      }
       
    }


    public function store(ProductRequest $request)
    {
      try {
        $admin = auth()->user('admin');
        if($admin->can('create')){
           
        DB::beginTransaction();
        
        if(!$request->has('is_active'))
        $request->request->add(['is_active' => 0]);
        else
        $request->request->add(['is_active' => 1]);

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'short_description' => $request->short_description,
            'slug' => $request->slug,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'is_active' => $request->is_active,
        ]);

        $product->tags()->attach($request->tags);

        DB::commit();
        return redirect()->route('admin.products.index');
      }
      return redirect()->back()->with(['error'=>'you can’t do this action']);   
      
      } catch (\Throwable $th) {
        
        DB::rollBack();
        return redirect()->back()->with(['error'=>'create product is failed']);

      }
        
    }

    public function edit(Product $product)
    {
      try {
        $admin = auth()->user('admin');
        if($admin->can('edit')){
           
        $brands = Brand::active()->get();   
        $categories = Category::active()->get();
        $tags = Tag::all();
 
        return view('dashboard.products.general.edit',compact('product','categories' , 'brands','tags'));
      }
      return redirect()->back()->with(['error'=>'you can’t do this action']);   
    
      } catch (\Throwable $th) {
        return redirect()->back()->with(['error'=>'edit product is failed']);
      }

     
    }

    
    public function update(ProductRequest $request, Product $product)
    {
      try {
        $admin = auth()->user('admin');
        if($admin->can('edit')){
           
        DB::beginTransaction();
        
        if(!$request->has('is_active'))
        $request->request->add(['is_active' => 0]);
        else
        $request->request->add(['is_active' => 1]);

        $product->update($request->all());
                
        $product->tags()->attach($request->tags);

        DB::commit();
        return redirect()->route('admin.products.index')->with(['success'=>'product is updated']);
      }
      return redirect()->back()->with(['error'=>'you can’t do this action']);   
    
      } catch (\Throwable $th) {
        DB::rollBack();
        return redirect()->back()->with(['error'=>'update product is failed']);
      }

       
    }


    public function destroy( Product $product)
    {
      try {
        $admin = auth()->user('admin');
        if($admin->can('delete')){
           
        $product->delete();
        return redirect()->back()->with(['success'=>'product is deleted']); 
      }
      return redirect()->back()->with(['error'=>'you can’t do this action']);   
    
      } catch (\Throwable $th) {
        return redirect()->route('admin.products.index')->with(['error'=>'product not deleted']);
      }
       
    }


  public function Price($id)
  {
    try {
      $admin = auth()->user('admin');
      if($admin->can('create')){
         
      $product = Product::findOrFail($id);
      return view('dashboard.products.price.create',compact('product'));
    }
    return redirect()->back()->with(['error'=>'you can’t do this action']);   
  
    } catch (\Throwable $th) {
      return redirect()->back()->with(['error'=>'product price is failed']);
    }

   
  }

  public function savePrice(ProductPriceRequest $request , $id)
  {
    try {
      $admin = auth()->user('admin');
      if($admin->can('create')){
         
      $product = Product::findOrFail($id);
      $product->update($request->all());
         
      return redirect()->route('admin.products.index')->with(['success'=>'price is updated']);
    }
    return redirect()->back()->with(['error'=>'you can’t do this action']);   
  
    } catch (\Throwable $th) {
      return redirect()->back()->with(['error'=>'save product price is failed']);
    }
      
   
  }


  public function Stock($id)
  {
    try {
      $admin = auth()->user('admin');
      if($admin->can('create')){
         
      $product = Product::findOrFail($id);
      return view('dashboard.products.stock.create',compact('product'));
    }
    return redirect()->back()->with(['error'=>'you can’t do this action']);   
  
    } catch (\Throwable $th) {
      return redirect()->back()->with(['error'=>'product stock is failed']);
    }
      
  
  }

  public function saveStock(ProductStockRequest $request , $id)
  {
    try {
      $admin = auth()->user('admin');
      if($admin->can('create')){
         
      $product = Product::findOrFail($id);
      $product->update($request->all());
      return redirect()->route('admin.products.index')->with(['success'=>'stock is updated']);
    }
    return redirect()->back()->with(['error'=>'you can’t do this action']);   
  
    } catch (\Throwable $th) {
      return redirect()->back()->with(['error'=>'save product stock is failed']);
    }

   
  }

  public function images($id)
  {
      try {
        $admin = auth()->user('admin');
        if($admin->can('create')){
           
        $product = Product::findOrFail($id);
        return view('dashboard.products.images.create',compact('product'));
      }
      return redirect()->back()->with(['error'=>'you can’t do this action']);   
    
      } catch (\Throwable $th) {
        return redirect()->back()->with(['error'=>'product images is failed']);
      }
   
  }

  public function saveImages(ProductImagesRequest $request , $id)
  {
    try {
      $admin = auth()->user('admin');
      if($admin->can('create')){
         
      DB::beginTransaction();
      
      if($request->hasFile('images')){
      
        foreach($request->File('images') as $image){
          $photoName =  Time().'-'.$image->getClientOriginalName();
          $path = public_path('images/products');
          $image->move($path,$photoName); 
       
        Image::create([
          'name' => $photoName,
          'imageable_id' => $id,
          'imageable_type' => "App\Models\Product",
        ]);
        
         } 
         
        DB::commit();
        return redirect()->route('admin.products.index')->with(['success' => 'images is uploaded']);
      } 
      return redirect()->back()->with(['error'=>'images not found']);
    }
    return redirect()->back()->with(['error'=>'you can’t do this action']);   
  
    } catch (\Throwable $th) {
      DB::rollBack();
      return redirect()->back()->with(['error'=>'save product images is failed']);
    }
    
  }

  public function deleteImages($id)
  {
    try {
      $admin = auth()->user('admin');
      if($admin->can('delete')){
         
      $image = Image::findOrFail($id);
      $image->delete();
      return redirect()->back()->with(['success'=>'image is deleted']); 
    }
    return redirect()->back()->with(['error'=>'you can’t do this action']);   
  
    } catch (\Throwable $th) {
      return redirect()->back()->with(['error'=>'delete product images is failed']);
    }
     
  }

  public function reviews($id)
  {
    try{
      $admin = auth()->user('admin');
      if($admin->can('list')){
         
      $product = Product::findOrFail($id);
      
      return view('dashboard.products.reviews.index',compact('product'));
        }
      return redirect()->back()->with(['error'=>'you can’t do this action']);   
  
      } catch (\Throwable $th) {
      return redirect()->back()->with(['error'=>' product reviews is failed']);
     }
  
 } 


  public function deleteReview($id)
  {
    try {
      $admin = auth()->user('admin');
      if($admin->can('delete')){
         
      $review = Review::findOrFail($id);
      $review->delete();
      return redirect()->back()->with(['success'=>'review is deleted']); 
    }
    return redirect()->back()->with(['error'=>'you can’t do this action']);   
  
    } catch (\Throwable $th) {
      return redirect()->back()->with(['error'=>'delete review is failed']);
    }
     
  }
  
  
}