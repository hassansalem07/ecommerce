@extends('dashboard.includes.master')
@section('content')


<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
          <a class="btn btn-outline-success" href="{{route('admin.categories.create')}}" >add new category</a>
          <h6>main categories table</h6>

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
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">sub categories</th>
                    <th class="text-secondary opacity-7"></th>
                    <th class="text-secondary opacity-7"></th>

                  </tr>
                </thead>
                <tbody>
                  @foreach ($mainCategories as $mainCategory)
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{$mainCategory->name}}</h6>
                        </div>
                      </div>
                    </td>

                    <td class="align-middle text-center text-sm">
                      <span class="badge badge-sm bg-gradient-{{$mainCategory->is_active == 1 ? 'success' : 'secondary'}}">
                        {{$mainCategory->isActive()}}</span>
                        </td>
  
                    <td>
                      <p class="text-xs font-weight-bold mb-0">{{$mainCategory->slug}}</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <div>
                      <a href="{{route('admin.categories.show',$mainCategory->id)}}" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">
                          sub categories</a>
                      </div>
                    </td>
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic example">                                          
                      <a href="{{route('admin.categories.edit',$mainCategory->id)}}"
                         class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1">edit</a>
                        </div>
                      </td>
                    <td>
                      <div>                  
                      <form  action="{{route('admin.categories.destroy',$mainCategory->id)}}" method="post">
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
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>sub categories table </h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">name</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">slug</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">main category</th>
                    <th class="text-secondary opacity-7"></th>
                    <th class="text-secondary opacity-7"></th>

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
                    <td class="align-middle text-center text-sm">
                      <div>
                        <h6  class="mb-0 text-sm">
                        {{$subCategory->mainCategory->name}}</h6>
                      </div>
                    </td>
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic example">                                          
                        <a href="{{route('admin.categories.edit',$subCategory->id)}}"
                         class="btn btn-outline-success btn-min-width box-shadow-3 mr-1 mb-1">edit</a>
                        </div>
                      </td>
                    <td>
                      <div>                  
                      <form  action="{{route('admin.categories.destroy',$subCategory->id)}}" method="post">
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
            </div>
          </div>
        </div>
      </div>
    </div>  
@endsection