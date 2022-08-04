@extends('dashboard.includes.master')
@section('content')


<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
          <a class="btn btn-outline-secondary" href="{{route('admin.categories.index')}}" >back to table</a>
          <h6>{{$category->name . " sub categories"}}</h6>

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
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">slug</th>

                  </tr>
                </thead>
                <tbody>
                  @foreach ($subCategories as $subCategory)
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{$subCategory->name}}</h6>
                        </div>
                      </div>
                    </td>

                    <td class="align-middle text-center text-sm">
                      <span class="badge badge-sm bg-gradient-{{$subCategory->is_active == 1 ? 'success' : 'secondary'}}">
                        {{$subCategory->isActive()}}</span>
                        </td>

                    <td>
                      <p class="text-xs font-weight-bold mb-0">{{$subCategory->slug}}</p>
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