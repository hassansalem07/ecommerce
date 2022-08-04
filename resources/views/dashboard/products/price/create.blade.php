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
                        <h3 >{{'add price to '.$product->name }}</h3>     
                    </div>       
                <div class="row ">
                  <div class="col-lg-7 mx-auto">
                    <div class="card mt-2 mx-auto p-4 bg-light">
                        <div class="card-body bg-light">
                        <div class = "container">

                            @include('dashboard.includes.alerts.success')
                            @include('dashboard.includes.alerts.errors')
                            
                        <form id="contact-form" role="form" 
                        action="{{route('admin.save.price',$product->id)}}" method="POST">
                        @csrf
                        <div class="controls">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_price">price</label>
                                    <input id="form_price" value="{{$product->price}}" type="number" name="price" class="form-control" placeholder="price">  
                                    </div>
                                    @error('price')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_special_price">special price</label>
                                    <input id="form_special_price" value="{{$product->special_price}}" type="number" name="special_price" class="form-control" placeholder="special price">  
                                    </div>
                                    @error('special_price')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_special_price_type">special price type</label>
                                        <select id="form_special_price_type" name="special_price_type" class="form-control" >
                                            <option value="" selected disabled>--Select Your special price type--</option>
                                        <option value="fixed" @if($product->special_price_type == 'fixed') selected @endif >fixed</option>
                                        <option value="precent" @if($product->special_price_type == 'precent') selected @endif >precent</option>
                                        </select>
                                    </div>
                                    @error('special_price_type')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                           
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_special_price_start">special price start</label>
                                    <input id="form_special_price_start" value="{{$product->special_price_start}}" type="date" name="special_price_start" class="form-control" >  
                                    </div>
                                    @error('special_price_start')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_special_price_end">special price end</label>
                                    <input id="form_special_price_end" value="{{$product->special_price_end}}" type="date" name="special_price_end" class="form-control">  
                                    </div>
                                    @error('special_price_end')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> 
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_selling_price">selling price</label>
                                <input id="form_selling_price" value="{{$product->selling_price}}" type="number" name="selling_price" class="form-control" placeholder="selling price">  
                                </div>
                                @error('selling_price')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
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

