@extends('dashboard.includes.master')
@section('content')


<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
          <h6>orders table</h6>
        </div>

          @include('dashboard.includes.alerts.success')
          @include('dashboard.includes.alerts.errors')


          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">

              <table class="table align-items-center mb-0">
                <thead>
                  <tr>

                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">created at</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">status</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">total price</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">notes</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"></th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"></th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"></th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"></th>

                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $order)
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">   
                        <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{$order->created_at}}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-2 py-1">   
                        <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{$order->status}}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-2 py-1">   
                        <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{$order->total_price}}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-2 py-1">   
                        <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{$order->customer_message ?? "-"}}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic example">                                          
                        <a href="{{route('admin.order.customer',$order->id)}}"
                         class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">customer <br> information</a>
                        </div>
                      </td>
                      <td>
                        <div class="btn-group" role="group" aria-label="Basic example">                                          
                          <a href="{{route('admin.order.products',$order->id)}}"
                           class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">order <br> products</a>
                          </div>
                        </td>
        
                   
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">                                          
                          <a href="{{route('admin.orders.edit',$order->id)}}"
                           class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1">change <br> status</a>
                          </div>
                        </td>
                      <td>
                        <div>                  
                        <form  action="{{route('admin.orders.destroy',$order->id)}}" method="post">
                           @csrf
                           @method('DELETE')
                           <button class=" btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1" type="submit">
                           delete <br> order </button>
                           
                          </form>

                       </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
              </table>
              {{$orders->links("pagination::bootstrap-4")}}   
             </div>
          </div>
        </div>
      </div>
    </div>
   
    
@endsection