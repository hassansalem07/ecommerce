<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;

class AdminLoginController extends Controller
{
   public function login()
   {
       return view('dashboard.auth.login');
   }


   public function submit_login(AdminRequest $request)
   {
 
     $remember_me = $request->has('remember_me') ? true : false;

     if(auth()->guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$remember_me)){

        return redirect()->route('dashboard.index');
     }
     
     return redirect()->back();
   }
   
}