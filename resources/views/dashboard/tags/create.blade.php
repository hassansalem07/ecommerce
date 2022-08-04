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
                        <h3 >add new tag</h3>     
                    </div>       
                <div class="row ">
                  <div class="col-lg-7 mx-auto">
                    <div class="card mt-2 mx-auto p-4 bg-light">
                        <div class="card-body bg-light">
                        <div class = "container">

                            @include('dashboard.includes.alerts.success')
                            @include('dashboard.includes.alerts.errors')
                            
                        <form id="contact-form" role="form" 
                        action="{{route('admin.tags.store')}}" method="POST">
                        @csrf
                        <div class="controls">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_name">name</label>
                                    <input id="form_name" value="{{old('name')}}" type="text" name="name" class="form-control" placeholder="name">  
                                    </div>
                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_name">slug</label>
                                    <input id="form_name" value="{{old('slug')}}" type="text" name="slug" class="form-control" placeholder="slug">  
                                    </div>
                                    @error('slug')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                           
                                <div class="col-md-12 m-4">
                                 <input type="submit" class="btn btn-success btn-send  pt-2 btn-block"  value="Save" >
                                </div>
                      
                            </div>
                            </div>
                           </form>
                        </div>
                       </div>
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

