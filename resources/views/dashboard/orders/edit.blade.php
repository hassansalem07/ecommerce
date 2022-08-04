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
                    <h3 >change order status</h3>     
                    </div>   
                    
                    @include('dashboard.includes.alerts.success')
                    @include('dashboard.includes.alerts.errors')

                <div class="row ">
                  <div class="col-lg-7 mx-auto">
                    <div class="card mt-2 mx-auto p-4 bg-light">
                        <div class="card-body bg-light">
                        <div class = "container">
                            
                        <form id="contact-form" role="form" 
                        action="{{route('admin.orders.update',$order->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="controls">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">status</label>
                                       <select name="status" id="status">
                                         <option value="pending" 
                                         @if($order->status == "pending") selected @endif>
                                         pending</option>
                                         <option value="accepting"
                                         @if($order->status == "accepting") selected @endif>
                                         accepting</option>
                                         <option value="delevried"
                                         @if($order->status == "delevried") selected @endif>
                                         delevried</option>
                                         <option value="done"
                                          @if($order->status == "done") selected @endif>
                                          done</option>
                                       </select>
                                      </div>
                                    @error('status')
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

