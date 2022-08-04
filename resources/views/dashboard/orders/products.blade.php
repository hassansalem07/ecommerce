@extends('dashboard.includes.master')
@section('content')


<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
          <a class="btn btn-outline-success" href="{{route('admin.orders.index')}}" >back</a>
          <h6>order products</h6>
        </div>

          @include('dashboard.includes.alerts.success')
          @include('dashboard.includes.alerts.errors')


          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">

              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">sku</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">price</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">quantity</th>

                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                        <img src="{{asset('images/products/'.$product->image)}}" class="avatar avatar-sm me-3" alt="user1">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{$product->name}}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-2 py-1">   
                        <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{$product->sku}}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-2 py-1">   
                        <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{$product->selling_price}}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-2 py-1">   
                        <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{$product->pivot->qty}}</h6>
                        </div>
                      </div>
                    </td>

                    
                  </tr>
                @endforeach
              </tbody>
              </table>
             </div>
          </div>
        </div>
      </div>
    </div>
   
    
@endsection