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
                        <h3 >add new brand</h3>     
                    </div>       
                <div class="row ">
                  <div class="col-lg-7 mx-auto">
                    <div class="card mt-2 mx-auto p-4 bg-light">
                        <div class="card-body bg-light">
                        <div class = "container">

                            @include('dashboard.includes.alerts.success')
                            @include('dashboard.includes.alerts.errors')
                            
                        <form id="contact-form" role="form" enctype="multipart/form-data"
                        action="{{route('admin.brands.store')}}" method="POST">
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
                                        <label>image</label>
                                        <input type="file" name="image" id="BSbtninfo">
                                    </div>
                                </div>
                            </div>
                            @error('image')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            
                            <div class="form-check form-switch">
                                <input name="is_active" class="form-check-input" type="checkbox" id="is_active" checked>
                                <label class="form-check-label" for="is_active">active</label>
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

