@include('site.includes.header')


  {{-- <div class="container-fluid py-4"> --}}
    {{-- <div class="row"> --}}
      <div class="col-md-10">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-flex align-items-center">
              <h1 >{{'Edit '. $user->name . ' Profile'}}</h1>
            </div>
          </div>
          @include('dashboard.includes.alerts.success')
          @include('dashboard.includes.alerts.errors')

          <div class="card-body">
            <form action="{{route('update.account',$user->id)}}" method="post">
              @csrf
              @method('put')
            <div class="row">
              <input type="hidden" name="userId" value="{{$user->id}}">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Name</label>
                <input class="form-control" name="name" type="text" value="{{$user->name}}">
                </div>
              </div>
              @error('name')
              <span class="text-danger">{{$message}}</span>
              @enderror
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Email</label>
                  <input class="form-control" name="email" type="email" value="{{$user->email}}">
                </div>
              </div>
              @error('email')
              <span class="text-danger">{{$message}}</span>
              @enderror
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Password</label>
                <input class="form-control" name="password" type="password" >
                </div>
              </div>
            
              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Confirm Password</label>
                  <input class="form-control" name="password_confirmation" type="password" >
                </div>
                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror
              </div>
            
              <div class="col-md-6">
                  <button type="submit" class="btn btn-primary btn-md ms-auto">save</button>
              </div>
          </form>
            </div>
           
      
@include('site.includes.footer')
