
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>App Name - @yield('title')</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link rel="stylesheet" href="{{ asset('web/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('web/css/Panier.css') }}">


		<!-- Slick -->
		
		<link rel="stylesheet" href="{{ asset('web/css/slick.css') }}">
		<link rel="stylesheet" href="{{ asset('web/css/slick-theme.css') }}">

		<!-- nouislider -->
		<link rel="stylesheet" href="{{ asset('web/css/nouislider.min.css') }}">

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="{{ asset('web/css/font-awesome.min.css') }}">

		<!-- Custom stlylesheet -->
		<link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
		<link rel="stylesheet" href="{{ asset('web/css/About.css') }}">
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						
						<li><a href="#"><i class="fa fa-phone"></i> 0629607717</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> hamzaennassel@email.com</a></li>
						<li><a href="https://www.google.com/maps/place/El+Jadida/@33.2334522,-8.5036645,13z/data=!3m1!4b1!4m6!3m5!1s0xda91dc1b421fe47:0x307cf87fb6b01a1f!8m2!3d33.2316326!4d-8.5007116!16zL20vMDNodjly"><i class="fa fa-map-marker"></i>el jadida</a></li>
<!-- 						
						<li>
				@auth
					<span style="color: white;">Welcome</span>
					<span style="color: white;">{{ Auth::user()->name }}</span>
					<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger logout-button">
						<span>Logout</span>
						</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
				@else
					<a href="{{ route('login') }}">Login</a>
				@endauth
			</li>
			<li>
				@guest
					<a href="{{ route('register') }}">Register</a>
				@endguest
			</li>	
		 -->
   						
				</div>
			</div>
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<div  class="log">
					@if (Route::has('login'))
     					   @auth
         					   
								<span style="color: white;"><strong>Welcome<strong></span>
								<span style="color: white;"><strong>{{ Auth::user()->name }}</storng></span>
								<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger logout-button">
									<span>Logout</span>
									</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>	

     					   @else
         					   <li><a href="{{ route('login') }}">Log in</a></li>
         						  @if (Route::has('register'))
          					     	 <li><a href="{{ route('register') }}">Register</a></li>
          				  		@endif
      					  @endauth
   						 @endif
					</ul>
					</div>
				</div>
			
			</div>

			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
									<img src="{{ asset('web/img/logo.png') }}" alt="">
									
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form action="{{ route('search') }}" method="GET">
									<input class="input" name="keyword" placeholder="Search here">
									<button class="search-btn" type="submit">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
								    <a href="{{route('panier.index')}}">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<div class="qty">{{ Cart::content()->count() }}</div>
									</a>
									</div>

								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
		
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="{{'/'}}">Home</a></li>
						<li><a href="{{route('categorie')}}">Categories</a></li>
						<li><a href="{{route('About')}}">About Us</a></li>
						<li><a href="{{route('Contact')}}">Contact Us</a></li>

					</ul>
					<!-- /NAV -->
				</div>
				
				<!-- /responsive-nav -->
			</div>
			
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->
		<div class="container">
            @yield('content')
        </div>
		
		<script src="{{ asset('web/js/jquery.min.js') }}"></script>
		<script src="{{ asset('web/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('web/js/slick.min.js') }}"></script>
		<script src="{{ asset('web/js/nouislider.min.js') }}"></script>
		<script src="{{ asset('web/js/jquery.zoom.min.js') }}"></script>
		<script src="{{ asset('web/js/main.js') }}"></script>

        </body>
        </html>
