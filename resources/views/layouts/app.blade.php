<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>SIMAX | Melonseed</title>

	<!-- Bootstrap core CSS -->
	<link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

	<!-- Custom fonts for this template -->
	<link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

	<!-- Custom styles for this template -->
	<link href="{{ asset('assets/css/landing-page.min.css') }}" rel="stylesheet">

	<!-- App Css -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

	<!-- Bootstrap core JavaScript -->
	<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>

	@stack('contentCss')

</head>

<body>
	
	<div id="app">
		
		<!-- Navigation -->
		<nav class="navbar navbar-light bg-light static-top">
			<div class="container">
				<div class="logo-container">
					<a class="navbar-brand" href="#">SIMAX</a>
				</div>
				<div class="nav-container">
					<a class="btn" href="#">Activities</a>
					<a class="btn" href="#">Providers</a>
					<a class="btn nav-btn btn-accent-border" href="#">Log In</a>
					<a class="btn nav-btn btn-accent" href="#">Sign Up</a>
				</div>
			</div>
		</nav>

		@yield('content')

		<!-- Footer -->
		<footer class="footer bg-dark">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 h-100 text-center text-lg-left my-auto display-inline">
						<div class="col-4 logo-container">
							<a class="navbar-brand" href="#">SIMAX</a>
						</div>
						<div class="col-4">
							<a class="btn btn-footer-nav" href="#">Providers</a>
						</div>
						<div class="col-4">
							<a class="btn btn-footer-nav" href="#">Activities</a>
						</div>
					</div>
					<div class="col-lg-5 h-100 text-center text-lg-right my-auto">
						<ul class="list-inline mb-0">
							<li class="list-inline-item">
								<a class="btn nav-btn btn-accent-border" href="#">Log In</a>
							</li>
							<li class="list-inline-item">
								<a class="btn nav-btn btn-accent" href="#">Sign Up</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
		
	</div>
	

	<!-- App JavaScript -->
	<script src="{{ asset('js/app.js') }}"></script>
	@stack('contentJs')

</body>

</html>
