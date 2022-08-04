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
                    <h3 >contacts</h3>     
                    </div>   
                    
                    @include('dashboard.includes.alerts.success')
                    @include('dashboard.includes.alerts.errors')

                <div class="row ">
                  <div class="col-lg-7 mx-auto">
                    <div class="card mt-2 mx-auto p-4 bg-light">
                        <div class="card-body bg-light">
                        <div class = "container">
                            
                        <form id="contact-form" role="form" 
                        action="{{route('admin.contacts.update',$contact->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="controls">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">phone</label>
                                    <input id="phone" value="{{$contact->phone}}" type="text" name="phone" class="form-control" placeholder="phone">  
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">email</label>
                                    <input id="email" value="{{$contact->email}}" type="text" name="email" class="form-control" placeholder="email">  
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="facebook">facebook</label>
                                      <input id="facebook" value="{{$contact->facebook}}" type="text" name="facebook" class="form-control" placeholder="facebook">  
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="twitter">twitter</label>
                                      <input id="twitter" value="{{$contact->twitter}}" type="text" name="twitter" class="form-control" placeholder="twitter">  
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="google">google</label>
                                        <input id="google" value="{{$contact->google}}" type="text" name="google" class="form-control" placeholder="google">  
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="linkedin">linkedin</label>
                                        <input id="linkedin" value="{{$contact->linkedin}}" type="text" name="linkedin" class="form-control" placeholder="linkedin">  
                                        </div>
                                      </div>
                                    </div>

                                <div class="col-md-12 m-4">
                                 <input type="submit" class="btn btn-success btn-send  pt-2 btn-block"  value="Save" >
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

