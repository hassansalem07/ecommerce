@extends('dashboard.includes.master')
@section('content')


<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
          <a class="btn btn-outline-success" href="{{route('admin.brands.create')}}" >add new brand</a>
          <h6>brands table</h6>
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
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"></th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"></th>

                </tr>
                </thead>
                <tbody>
                @foreach ($brands as $brand)
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                        <img src="{{asset('images/brands/'.$brand->image)}}" class="avatar avatar-sm me-3" alt="user1">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{$brand->name}}</h6>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle text-center text-sm">
                    <span class="badge badge-sm bg-gradient-{{$brand->is_active == 1 ? 'success' : 'secondary'}}">
                      {{$brand->isActive()}}</span>
                      </td>

                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">                                          
                          <a href="{{route('admin.brands.edit',$brand->id)}}"
                           class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1">edit</a>
                          </div>
                        </td>
                      <td>
                        <div>                  
                        <form  action="{{route('admin.brands.destroy',$brand->id)}}" method="post">
                           @csrf
                           @method('DELETE')
                           <button class=" btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1" type="submit">
                           delete</button>
                           
                          </form>

                       </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
              </table>
              {{$brands->links("pagination::bootstrap-4")}}   
             </div>
          </div>
        </div>
      </div>
    </div>
   
    
@endsection