@include('site.includes.header')
	<section ><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form method="POST" action="{{route('login')}}">
                            @csrf
                            <div>
                                <label for="email" class="col-md-4 col-form-label text-md-end">email</label>
                                <input id="email" type="email" name="email" value="{{old('email')}}" placeholder="Email Address" />
                            </div>
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                            <div>
                                <label for="password" class="col-md-4 col-form-label text-md-end">password</label>
                                <input id="password" type="password" name="password" value="{{old('password')}}" placeholder="password" />
                            </div>
                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

							<span>
								<input type="checkbox" name="remember" class="checkbox" {{ old('remember') ? 'checked' : '' }}> 
								Keep me signed in
							</span>
							<div>
							<button type="submit" class="btn btn-default">Login</button>
							</div>
							<div>
							@if (Route::has('password.request'))
							<a class="btn btn-link" href="{{ route('password.request') }}">
								{{ __('Forgot Your Password?') }}
							</a>
						@endif
					    </div>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div>
                                <label for="name" class="col-md-4 col-form-label text-md-end">name</label>
                                <input id="name" type="text" name="name" placeholder="Name" value="{{ old('name') }}"/>
                            </div>

                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                            <div>
                                <label for="email" class="col-md-4 col-form-label text-md-end">email</label>
                                <input id="email" type="email" name="email" placeholder="Email Address" value="{{ old('email') }}"/>
                            </div>

                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                            <div>
                                <label for="password" class="col-md-4 col-form-label text-md-end">password</label>
                                <input id="password" type="password" name="password" placeholder="Password" value="{{ old('password') }}"/>
                            </div>

                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                            <div>
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm password</label>
                                <input id="password-confirm" type="password" name="password_confirmation" placeholder="confirm Password" value="{{ old('password_confirmation') }}"/>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-default">Signup</button>
                            </div>
                           
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
	@include('site.includes.footer')

	

  
    <script src="{{asset('front/js/jquery.js')}}"></script>
	<script src="{{asset('front/js/price-range.js')}}"></script>
    <script src="{{asset('front/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('front/js/main.js')}}"></script>
</body>
</html>