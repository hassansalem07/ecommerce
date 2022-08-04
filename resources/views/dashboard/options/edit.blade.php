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
                    <h3 >edit {{$option->name}}</h3>     
                    </div>   
                    
                    @include('dashboard.includes.alerts.success')
                    @include('dashboard.includes.alerts.errors')

                <div class="row ">
                  <div class="col-lg-7 mx-auto">
                    <div class="card mt-2 mx-auto p-4 bg-light">
                        <div class="card-body bg-light">
                        <div class = "container">
                            
                        <form id="contact-form" role="form"
                        action="{{route('admin.options.update',$option->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="controls">
                          <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_name">name</label>
                                <input id="form_name" value="{{$option->name}}" type="text" name="name" class="form-control" placeholder="name">  
                                </div>
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">price</label>
                                <input id="price" value="{{$option->price}}" type="number" name="price" class="form-control" placeholder="price">  
                                </div>
                                @error('price')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="attribute">attribute</label>
                                    <select id="attribute" name="attribute_id" class="form-control">
                                        <option value="" selected disabled>--Select Your attribute--</option>
                                        @foreach ($attributes as $attribute)
                                    <option value="{{$attribute->id}}" 
                                      @if($attribute->id == $option->attribute_id) selected @endif
                                      >{{$attribute->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('attribute_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="product">product</label>
                                    <select id="product" name="product_id" class="form-control">
                                        <option value="" selected disabled>--Select Your product--</option>
                                        @foreach ($products as $product)
                                    <option value="{{$product->id}}"
                                      @if($product->id == $option->product_id) selected @endif
                                      >{{$product->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('product_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-12 m-5">
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

