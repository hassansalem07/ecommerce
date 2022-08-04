<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;


class TagController extends Controller
{
   
    public function index()
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('list')){
              
            $tags = Tag::select('id','name','slug')->paginate(10);
            return view('dashboard.tags.index',compact('tags'));
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
          
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'list tags is failed']);
        }   
    }

    public function create()
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('create')){
              
            return view('dashboard.tags.create');
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
          
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'create tags is failed']);
        }
    }


    public function store(TagRequest $request)
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('create')){
              
            Tag::create([
                'name' => $request->name,
                'slug' => $request->slug,
                ]);

                
            return redirect()->route('admin.tags.index')->with(['success'=>'tag is added']);
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
           
        } catch (\Throwable $th) {
            
            return redirect()->back()->with(['error'=>'create tag is failed']);
        }
       
    }
 
    public function edit(Tag $tag)
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('edit')){
              
            return view('dashboard.tags.edit',compact('tag'));
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
         
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error'=>'edit tag is failed']);
        }    }

   
    public function update(TagRequest $request, Tag $tag)
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('edit')){
              
            $tag->update([
                'name' => $request->name,
                'slug' => $request->slug,
                ]);
                
            return redirect()->route('admin.tags.index')->with(['success'=>'tag is updated']);
        }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
        
        } catch (\Throwable $th) {
            
            return redirect()->back()->with(['error'=>'update tag is failed']);
        }
    }

   
    public function destroy(Tag $tag)
    {
        try {
            $admin = auth()->user('admin');
            if($admin->can('delete')){
              
        $tag->delete();
        return redirect()->route('admin.tags.index')->with(['success'=>'tag is deleted']);
    }
        return redirect()->back()->with(['error'=>'you can’t do this action']);   
   
        } catch (\Throwable $th) {
        return redirect()->route('admin.tags.index')->with(['error'=>'tag not deleted']);
        }
        
    }
}