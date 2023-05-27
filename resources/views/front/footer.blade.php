<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link rel="stylesheet" href="{{ asset('web/css/bootstrap.min.css') }}">
		

		<!-- Slick -->
		
		<link rel="stylesheet" href="{{ asset('web/css/slick.css') }}">
		<link rel="stylesheet" href="{{ asset('web/css/slick-theme.css') }}">

		<!-- nouislider -->
		<link rel="stylesheet" href="{{ asset('web/css/nouislider.min.css') }}">

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="{{ asset('web/css/font-awesome.min.css') }}">

		<!-- Custom stlylesheet -->
		<link rel="stylesheet" href="{{ asset('web/css/style.css') }}">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
	
<!-- FOOTER -->
<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					
						<div class="col-md-6 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
									<li><a href="{{route('home.show','Laptops')}}">Laptops</a></li>
									<li><a href="{{route('home.show','Smartphones')}}">Smartphones</a></li>
									<li><a href="{{route('home.show','Cameras')}}">Cameras</a></li>
									<li><a href="{{route('home.show','Accessories')}}">Accessories</a></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-6 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Contact</h3>
								<ul class="footer-links">
								<li><a href="#"><i class="fa fa-facebook"></i>facebook</a></li>
								<li><a href="#"><i class="fa fa-twitter"></i>twitter</a></li>
								<li><a href="#"><i class="fa fa-instagram"></i>instagram</a></li>
								<li><a href="#"><i class="fa fa-pinterest"></i>pinterest</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved </a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

        </body>
        </html>