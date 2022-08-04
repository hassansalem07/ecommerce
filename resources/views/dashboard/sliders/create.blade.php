@extends('dashboard.includes.master')
@section('content')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">   
                <div class="container">
                    <div class=" text-center mt-5 ">
                        <h3 >add images to slider</h3>     
                    </div>       
                <div class="row ">
                  <div class="col-lg-7 mx-auto">
                    <div class="card mt-2 mx-auto p-4 bg-light">
                        <div class="card-body bg-light">
                        <div class = "container">

                            @include('dashboard.includes.alerts.success')
                            @include('dashboard.includes.alerts.errors')
                            
                        <form id="contact-form" role="form" 
                        action="{{route('admin.save.slider.images')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                  
                        <div class="form-group">
                            <label> uploud images </label>
                            <label id="projectinput7" class="file center-block">
                                <input type="file" id="file" name="images[]" multiple>
                                <span class="file-custom"></span>
                            </label>
                            @error('images')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        </div>
                            <div class="col-md-12 m-5">
                                <input type="submit" class="btn btn-success btn-send  pt-2 btn-block"  value="Save" >
                               </div>
                              </div>
                             </form>
                            </div>
                            </div>
                           </div>




                           <div class="m-4"> 
                            <div class="d-flex flex-row">
                            @foreach ($sliders as $slider) 
                              <div class="col-lg-4 col-md-4">
                            <div class="card">
                              <div class="card-body">
                                <img class="card-img-top" src="{{asset('images/sliders/'.$slider->image)}}" alt="{{$slider->image}}">
                              </div>
                              <div >
                            <a href="{{route('admin.delete.slider.images',$slider->id)}}" class="btn btn-danger "> delete</a>
                          </div>
                          </div>
                            </div>
                            </div>
                           @endforeach
                          </div>


                          </div>              
                         </div>
                        </div>
                       </div>
                      </div>
                     </div>
                    </div>
                    </div>

                    
                   
                    
                    @endsection

