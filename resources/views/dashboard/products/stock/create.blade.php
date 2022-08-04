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
                        <h3 >{{'add stock details to '.$product->name }}</h3>     
                    </div>       
                <div class="row ">
                  <div class="col-lg-7 mx-auto">
                    <div class="card mt-2 mx-auto p-4 bg-light">
                        <div class="card-body bg-light">
                        <div class = "container">

                            @include('dashboard.includes.alerts.success')
                            @include('dashboard.includes.alerts.errors')
                            
                        <form id="contact-form" role="form" 
                        action="{{route('admin.save.stock',$product->id)}}" method="POST">
                        @csrf
                        <div class="controls">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_price">sku</label>
                                    <input id="form_sku" value="{{$product->sku}}" type="text" name="sku" class="form-control" placeholder="sku">  
                                    </div>
                                    @error('sku')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="in_stock">in stock</label>
                                        <select id="in_stock" name="in_stock" class="form-control" >
                                            <option value="" selected disabled>--select your choice--</option>
                                        <option value="1" @if($product->in_stock == '1') selected @endif >available</option>
                                        <option value="0" @if($product->in_stock == '0') selected @endif >not available</option>
                                        </select>
                                    </div>
                                    @error('in_stock')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            
                           
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="qty">qty</label>
                                    <input id="qty" value="{{$product->qty}}" type="number" name="qty" class="form-control" placeholder="qty">  
                                    </div>
                                    @error('qty')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
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
                      </div>              
                     </div>
                     </div>
                     </div>
                    </div>
                  </div>
                 </div>
                 </div>
    
                @endsection


