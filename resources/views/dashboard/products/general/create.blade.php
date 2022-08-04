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
                        <h3 >add new product</h3>     
                    </div>       
                <div class="row ">
                  <div class="col-lg-7 mx-auto">
                    <div class="card mt-2 mx-auto p-4 bg-light">
                        <div class="card-body bg-light">
                        <div class = "container">

                            @include('dashboard.includes.alerts.success')
                            @include('dashboard.includes.alerts.errors')
                            
                        <form id="contact-form" role="form" 
                        action="{{route('admin.products.store')}}" method="POST">
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
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_brand">brand</label>
                                        <select id="form_brand" name="brand_id" class="form-control">
                                            <option value="" selected disabled>--Select Your brand--</option>
                                            @foreach ($brands as $brand)
                                        <option value="{{$brand->id}}" >{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('brand_id')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_category">category</label>
                                        <select id="form_category" name="category_id" class="form-control" >
                                            <option value="" selected disabled>--Select Your category--</option>
                                            @foreach ($categories as $category)
                                        <option value="{{$category->id}}" >{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('category_id')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div for="tags" class="form-group">
                                    <select class=" select2 form-control" name="tags[]" id="tags" multiple>
                                    <optgroup label="select the tags">
                                     @if ($tags && $tags->count() > 0)
                                     @foreach ($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                     @endforeach
                                      @endif
                                    </select>
                                    </div>  
                                    @error('tags')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror   
                                   </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_description">description</label>
                                        <textarea id="form_description" name="description" class="form-control" placeholder="Write your message here." rows="4" ></textarea>
                                        </div>
                                        @error('description')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                   </div>

                            <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form_short">short description</label>
                                    <textarea id="form_short" name="short_description" class="form-control" placeholder="Write your message here." rows="2" ></textarea>
                                    </div>
                                    @error('short_description')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-check form-switch">
                                    <input name="is_active" class="form-check-input" type="checkbox" id="is_active" checked>
                                    <label class="form-check-label" for="is_active">active</label>
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

