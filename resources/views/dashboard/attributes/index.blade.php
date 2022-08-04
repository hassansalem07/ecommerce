@extends('dashboard.includes.master')
@section('content')


<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
          <a class="btn btn-outline-success" href="{{route('admin.attributes.create')}}" >add new attribute</a>
          <h6>attributes table</h6>
        </div>

          @include('dashboard.includes.alerts.success')
          @include('dashboard.includes.alerts.errors')


          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">

              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"></th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"></th>

                </tr>
                </thead>
                <tbody>
                @foreach ($attributes as $attribute)
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                       
                        <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{$attribute->name}}</h6>
                        </div>
                      </div>
                    </td>
                   
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">                                          
                          <a href="{{route('admin.attributes.edit',$attribute->id)}}"
                           class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1">edit</a>
                          </div>
                        </td>
                      <td>
                        <div>                  
                        <form  action="{{route('admin.attributes.destroy',$attribute->id)}}" method="post">
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
              {{$attributes->links("pagination::bootstrap-4")}}   
             </div>
          </div>
        </div>
      </div>
    </div>
   
    
@endsection