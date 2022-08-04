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
                    <h3 >edit {{$shipping->city}}</h3>     
                    </div>   
                    
                    @include('dashboard.includes.alerts.success')
                    @include('dashboard.includes.alerts.errors')

                <div class="row ">
                  <div class="col-lg-7 mx-auto">
                    <div class="card mt-2 mx-auto p-4 bg-light">
                        <div class="card-body bg-light">
                        <div class = "container">
                            
                        <form id="contact-form" role="form" 
                        action="{{route('admin.shippings.update',$shipping->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="controls">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="city">city</label>
                                    <input id="city" value="{{$shipping->city}}" type="text" name="city" class="form-control" placeholder="city">  
                                    </div>
                                    @error('city')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror

                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="price">price</label>
                                      <input id="price" value="{{$shipping->price}}" type="number" name="price" class="form-control" placeholder="price">  
                                      </div>
                                      @error('price')
                                      <span class="text-danger">{{$message}}</span>
                                      @enderror

                                      
                                <div class="col-md-12 m-4">
                                 <input type="submit" class="btn btn-success btn-send  pt-2 btn-block"  value="Save" >
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

