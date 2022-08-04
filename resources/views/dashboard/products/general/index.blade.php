@extends('dashboard.includes.master')
@section('content')


<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
          <a class="btn btn-outline-success" href="{{route('admin.products.create')}}" >add new product</a>
          <h6>products table</h6>
        </div>

          @include('dashboard.includes.alerts.success')
          @include('dashboard.includes.alerts.errors')


          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">

              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">name</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">short description</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">slug</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">brand</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">category</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"></th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"></th>

                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{$product->name}}</h6>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle text-center text-sm">
                    <span class="badge badge-sm bg-gradient-{{$product->is_active == 1 ? 'success' : 'secondary'}}">
                      {{$product->isActive()}}</span>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{$product->short_description}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{$product->slug }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{$product->brand->name ?? "-"}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{$product->category->name ?? "-"}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>


                        <div class="btn-group" role="group" aria-label="Basic example">                                          
                          <a href="{{route('admin.products.price',$product->id)}}"
                           class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">price</a>

                            <a href="{{route('admin.products.stock',$product->id)}}"
                             class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">stock</a>

                             
                              </div>
                              <div  role="group" aria-label="Basic example" >
                                <a href="{{route('admin.products.images',$product->id)}}"
                                  class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">images</a>
                                <a href="{{route('admin.products.reviews',$product->id)}}"
                                  class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">reviews</a>
                              </div>
                  </td>
                  
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">                                          
                          <a href="{{route('admin.products.edit',$product->id)}}"
                           class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1">edit</a>
                          </div>
                     
                        <form  action="{{route('admin.products.destroy',$product->id)}}" method="post">
                           @csrf
                           @method('DELETE')
                           <button class=" btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1" type="submit">
                           delete</button>
                           
                          </form>
                        </td>
  
                  </tr>
                @endforeach
              </tbody>
              </table>
              {{$products->links("pagination::bootstrap-4")}}   
             </div>
          </div>
        </div>
      </div>
    </div>
   
    
@endsection