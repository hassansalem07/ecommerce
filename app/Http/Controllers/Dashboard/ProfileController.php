<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
   
    public function index()
    {
        try {
            $admin = auth('admin')->user();
            return view('dashboard.admin.profile',compact('admin'));
            
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'profile is failed']);
        }
       
    }

  
    public function update(AdminRequest $request, Admin $admin)
    {
        try {
            $admin->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            
            return redirect()->back()->with(['success' => 'your profile is updated']);
            
        } catch (\Throwable $th) {
            
            return redirect()->back()->with(['error' => 'update profile is failed']);
        }
   
    }

  
}