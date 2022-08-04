@extends('dashboard.includes.master')
@section('content')


<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
          <a class="btn btn-outline-success" href="{{route('admin.orders.index')}}" >back</a>
          <h6>customer information</h6>
        </div>

          @include('dashboard.includes.alerts.success')
          @include('dashboard.includes.alerts.errors')


          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">

              <table class="table align-items-center mb-0">
                <thead>
                  <tr>

                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">email</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">address</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">city</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">phone</th>


                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">   
                        <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{$order->customer_name}}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-2 py-1">   
                        <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{$order->customer_email}}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-2 py-1">   
                        <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{$order->customer_address}}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-2 py-1">   
                        <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{$order->customer_city}}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-2 py-1">   
                        <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{$order->customer_phone}}</h6>
                        </div>
                      </div>
                    </td>
                  </tr>
              </tbody>
              </table>
             </div>
          </div>
        </div>
      </div>
    </div>
   
    
@endsection