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
                    <h3 >edit {{$category->name}}</h3>     
                    </div>   
                    
                    @include('dashboard.includes.alerts.success')
                    @include('dashboard.includes.alerts.errors')

                <div class="row ">
                  <div class="col-lg-7 mx-auto">
                    <div class="card mt-2 mx-auto p-4 bg-light">
                        <div class="card-body bg-light">
                        <div class = "container">
                            
                        <form id="contact-form" role="form" 
                        action="{{route('admin.categories.update',$category->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="{{$category->id}}" name="categoryId">
                          <div class="controls">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_name">name</label>
                                        <input id="form_name" value="{{$category->name}}" type="text" name="name" class="form-control" placeholder="name">  
                                    </div>
                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            

                           
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_name">slug</label>
                                        <input id="form_name" value="{{$category->slug}}" type="text" name="slug" class="form-control" placeholder="slug">  
                                    </div>
                                    @error('slug')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-check form-switch">
                                    <input name="is_active" class="form-check-input" type="checkbox" id="is_active"
                                    @if($category->is_active == 1)  checked @endif>
                                    <label class="form-check-label" for="is_active">active</label>
                                  </div>
                                </div>
                                </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label" for="main">
                                        <input onclick="hide()" type="radio" class="form-check-input" name="type" id="main" value='1'
                                         @if($category->parent_id == null) checked @endif>
                                    main category 
                                  </label>
                                </div>
                                        @error("type")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label" for="sub">
                                    <input onclick="show()" type="radio" class="form-check-input" name="type" id="sub" value='2'
                                    @if($category->parent_id != null) checked @endif>
                                    sub category 
                                  </label>
                                </div>
                                        @error("type")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                      
                            </div>

                            <div style="display:none"  id="cats_list">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_name"> select the main category</label>
                                       <select name="parent_id">
                                           <optgroup>
                                               @foreach ($mainCategories as $mainCategory)
                                                <option value="{{$mainCategory->id}}"
                                                   @if($category->parent_id == $mainCategory->id )selected @endif
                                                  >{{$mainCategory->name}}</option>
                                                @endforeach
                                           </optgroup>
                                       </select>
                                       </div>
                                    @error('parent_id')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                                <div class="col-md-12 m-4">
                                 <input type="submit" class="btn btn-success btn-send  pt-2 btn-block"  value="Save" >
                                </div>
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


                @section('script')
                <script>
                function show() {
                  var x = document.getElementById("cats_list");
                  if (x.style.display === "none") {
                    x.style.display = "block";
                  } 
                } 
                
                function hide() {
                  var x = document.getElementById("cats_list");
                  if (x.style.display === "block") {
                    x.style.display = "none";
                  } 
                } 
                
                    
                </script>
                @endsection