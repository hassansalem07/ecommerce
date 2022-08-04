<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('front/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('front/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('front/css/responsive.css')}}" rel="stylesheet">    
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<?php $contact = \App\Models\Contact::find(1); ?>
	
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
							<li><a href="#"><i class="fa fa-phone"></i>{{"  ".$contact->phone}}</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i>{{"  ".$contact->email}}</a></li>
								@if(auth()->user())
								<form action="{{route('logout')}}" method="POST">
								 @csrf
								 <input type="submit" value="logout">
								</form>
								@endif
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="{{$contact->facebook}}"><i class="fa fa-facebook"></i></a></li>
								<li><a href="{{$contact->twitter}}"><i class="fa fa-twitter"></i></a></li>
								<li><a href="{{$contact->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="{{$contact->google}}"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
                        <a href=""><img src="{{asset('front/images/home/logo.png')}}" alt="" /></a>
						</div>
					</div>

					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								@if(!auth()->user())
						    	<li><a href="{{route('login')}}"><i class="fa fa-lock"></i> Login</a></li>
								@else
							   <li><a href="{{route('account')}}"><i class="fa fa-user"></i> Account</a></li>
								@endif
							<li><a href="{{route('wishlist.index')}}"><i class="fa fa-star"></i> Wishlist</a></li>
							<li><a href="{{route('my.orders')}}"><i class="fa fa-crosshairs"></i> my orders</a></li>
							<li><a href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
							</ul>

						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
		@include('dashboard.includes.alerts.success')
		@include('dashboard.includes.alerts.errors')
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
							<li><a href="{{route('site')}}" class="active">Home</a></li>
							<li><a href="{{route('list.products')}}" >Shop</a></li>
							</ul>
						</div>
					</div>

				<form action="{{route('search')}}" method="post">
					@csrf
					<div class="input-group">
					<input name="keyword" type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
					<button type="submit" class="btn btn-primary">search</button>
				    </div>
					</form>

				</div>
			</div>
			<div class="container">
				@include('flash::message')
			</div>

		</div><!--/header-bottom-->

	</header><!--/header-->