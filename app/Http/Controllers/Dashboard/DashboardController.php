<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
   public function index()
   {
       try {
           
        $categories = Category::sub()->active()->orderBy('id','desc')->paginate(5);
        $products = Product::active()->orderBy('id','desc')->paginate(5);

        return view('dashboard.index',compact('categories','products'));
        
       } catch (\Throwable $th) {
        return redirect()->back()->with(['error'=>'dashboard is failed']);
    }
     
   }

   public function logout()
   {
       try {
        Auth::logout(); 
        
        return redirect()->route('admin.login')->with(['success' => 'you are loged out']);
        
       } catch (\Throwable $th) {
           
        return redirect()->back()->with(['error' => 'log out is failed']);

       }              
   }
}