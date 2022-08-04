<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{


  public function create()
  {
      try {
        $admin = auth()->user('admin');
        if($admin->can('create')){
           
         $sliders = Slider::get();
        return view('dashboard.sliders.create',compact('sliders'));
      }
      return redirect()->back()->with(['error'=>'you can’t do this action']);   
      
      } catch (\Throwable $th) {
        return redirect()->back()->with(['error'=>'add sliders images is failed']);
      }
   
  }

  public function store(SliderRequest $request)
  {
    try {
      $admin = auth()->user('admin');
      if($admin->can('create')){
         
      DB::beginTransaction();
      
      if($request->hasFile('images')){
      
        foreach($request->File('images') as $image){
          $photoName =  $image->getClientOriginalName();
          $path = public_path('images/sliders');
          $image->move($path,$photoName); 
       
        Slider::create([
          'image' => $photoName,
        ]);
        
         } 
         
        DB::commit();
        return redirect()->back()->with(['success' => 'images is uploaded']);
      } 
      return redirect()->back()->with(['error'=>'images not found']);
    }
    return redirect()->back()->with(['error'=>'you can’t do this action']);   
   
    } catch (\Throwable $th) {
      DB::rollBack();
      return redirect()->back()->with(['error'=>'save slider images is failed']);
    }
    
  }

  public function destroy($id)
  {
    try {
      $admin = auth()->user('admin');
      if($admin->can('delete')){
         
      $slider = Slider::findOrFail($id);
      $slider->delete();
      return redirect()->back()->with(['success'=>'image is deleted']); 
    }
    return redirect()->back()->with(['error'=>'you can’t do this action']);   
   
    } catch (\Throwable $th) {
      return redirect()->back()->with(['error'=>'delete sliders images is failed']);
    }
     
  }


  
}