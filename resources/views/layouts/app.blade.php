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
		<footer class="footer bg-light">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 h-100 text-center text-lg-left my-auto">
						<ul class="list-inline mb-2">
							<li class="list-inline-item">
								<a href="#">About</a>
							</li>
							<li class="list-inline-item">&sdot;</li>
							<li class="list-inline-item">
								<a href="#">Contact</a>
							</li>
							<li class="list-inline-item">&sdot;</li>
							<li class="list-inline-item">
								<a href="#">Terms of Use</a>
							</li>
							<li class="list-inline-item">&sdot;</li>
							<li class="list-inline-item">
								<a href="#">Privacy Policy</a>
							</li>
						</ul>
						<p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2019. All Rights Reserved.</p>
					</div>
					<div class="col-lg-6 h-100 text-center text-lg-right my-auto">
						<ul class="list-inline mb-0">
							<li class="list-inline-item mr-3">
								<a href="#">
									<i class="fab fa-facebook fa-2x fa-fw"></i>
								</a>
							</li>
							<li class="list-inline-item mr-3">
								<a href="#">
									<i class="fab fa-twitter-square fa-2x fa-fw"></i>
								</a>
							</li>
							<li class="list-inline-item">
								<a href="#">
									<i class="fab fa-instagram fa-2x fa-fw"></i>
								</a>
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
