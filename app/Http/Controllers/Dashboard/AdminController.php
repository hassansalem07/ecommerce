<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
   
    public function index()
    {
        try {
            $authAdmin = auth()->user('admin');
            if($authAdmin->hasRole('super_admin')){
            $admins = Admin::paginate(10);
            return view('dashboard.admins.index',compact('admins'));
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'list admins is failed']);
        }   
    }

    public function create()
    {
        try {
            $authAdmin = auth()->user('admin');
            if($authAdmin->hasRole('super_admin')){
            $roles = Role::get();
            return view('dashboard.admins.create',compact('roles'));
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);
           
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'create admin is failed']);
        }
    }


    public function store(AdminRequest $request)
    {
        try {
            $authAdmin = auth()->user('admin');
            if($authAdmin->hasRole('super_admin')){
                
         $admin = Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                ]);

         $admin->assignRole($request->role);
       
                
            return redirect()->route('admin.admins.index')->with(['success'=>'admin is added']);
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
        
        } catch (\Throwable $th) {
            
            return redirect()->back()->with(['error'=>'create admin is failed']);
        }
       
    }
 
    public function edit(Admin $admin)
    {
        try {
            $authAdmin = auth()->user('admin');
            if($authAdmin->hasRole('super_admin')){
                
            $roles = Role::get();
            return view('dashboard.admins.edit',compact('admin','roles'));
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);
           
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'edit admin is failed']);
        }    }

   
    public function update(AdminRequest $request, Admin $admin)
    {
        try {
            $authAdmin = auth()->user('admin');
            if($authAdmin->hasRole('super_admin')){
                
            $admin->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                ]);

            $admin->syncRoles($request->role);    
                
            return redirect()->route('admin.admins.index')->with(['success'=>'admin is updated']);
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);
        
        } catch (\Throwable $th) {
            
            return redirect()->back()->with(['error'=>'update admin is failed']);
        }
    }

   
    public function destroy(Admin $admin)
    {
        try {
            $authAdmin = auth()->user('admin');
            if($authAdmin->hasRole('super_admin')){
                
        $admin->delete();
        return redirect()->route('admin.admins.index')->with(['success'=>'admin is deleted']);
    }
    return redirect()->back()->with(['error'=>'you can’t do this action']);
    
        } catch (\Throwable $th) {
            return redirect()->route('admin.admins.index')->with(['error'=>'admin not deleted']);
        }
        
    }
}