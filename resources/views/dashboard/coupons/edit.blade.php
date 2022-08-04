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
                    <h3 >edit coupon</h3>     
                    </div>   
                    
                    @include('dashboard.includes.alerts.success')
                    @include('dashboard.includes.alerts.errors')

                <div class="row ">
                  <div class="col-lg-7 mx-auto">
                    <div class="card mt-2 mx-auto p-4 bg-light">
                        <div class="card-body bg-light">
                        <div class = "container">
                            
                        <form id="contact-form" role="form" 
                        action="{{route('admin.coupons.update',$coupon->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                       

                        <div class="controls">
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="code">code</label>
                                  <input id="code" value="{{$coupon->code}}" type="text" name="code" class="form-control" placeholder="code">  
                                  </div>
                                  @error('code')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                    <label for="discount_value">discount value</label>
                                <input id="discount_value" value="{{$coupon->discount_value}}" type="number" name="discount_value" class="form-control" placeholder="discount_value">  
                                </div>
                                @error('price')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="start">start date</label>
                                <input id="start" value="{{$coupon->start}}" type="date" name="start" class="form-control" placeholder="start">  
                                </div>
                                @error('start')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                  <label for="end">end date</label>
                              <input id="end" value="{{$coupon->end}}" type="date" name="end" class="form-control" placeholder="end">  
                              </div>
                              @error('end')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                          </div>
                        </div>
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
                     </div>
    
                @endsection

