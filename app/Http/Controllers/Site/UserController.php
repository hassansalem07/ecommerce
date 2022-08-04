<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function account()
    {
        try {
        $user = auth()->user();
        return view('site.account',compact('user'));
        
        } catch (\Throwable $th) {
            flash('account is failed')->error();
            return redirect()->back();
        }
      
    }


    public function update(UserRequest $request , User $user)
    {
        try {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            
            flash('your account is updated')->success();
            return redirect()->back();
            
        } catch (\Throwable $th) {
            flash('update account is failed')->error();
            return redirect()->back();
        }
    }

    
}