<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
   
  
 
    public function edit(Contact $contact)
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('edit')){
                
            return view('dashboard.contacts',compact('contact'));
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
        
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'edit contact is failed']);
        }    }

   
    public function update(Request $request, Contact $contact)
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('edit')){
                
            $contact->update($request->all());
                
            return redirect()->route('admin.contacts.edit',1)->with(['success'=>'contacts is updated']);
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
         
        } catch (\Throwable $th) {
            
            return redirect()->back()->with(['error'=>'update contacts is failed']);
        }
    }

   
   
}