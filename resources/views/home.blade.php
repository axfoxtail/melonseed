@extends('layouts.app')

@section('content')

	<!-- Masthead -->
	<header class="masthead text-white text-center">
		<div class="overlay"></div>
		<div class="container align-middle-center">
			<div class="my-auto">
				<div class="col-md-12 col-lg-11 col-xl-11 mx-auto">
					<form>
						<div class="form-row">
							<div class="col-12 col-md-9 mb-2 mb-md-0 px-1">
								<input type="text" class="form-control form-control-lg" value="You’re located in Toronto, ON">
							</div>
							<div class="col-12 col-md-3 px-1">
								<input type="submit" class="btn btn-primary" value="Let's Go">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</header>

	<!-- Popular Activities Carousel -->
	<section class="bg-light text-center popular-carousel">
		<div class="container">
			<h2 class="mb-4">Popular activities in Toronto</h2>
			<div class="row">
				<div class="owl-carousel">
				  <div class="owl-ele">
				  	<div class="owl-img">
				  		<img src="{{ asset('assets/img/bg-showcase-1.jpg') }}">
				  	</div>
				  	<div class="owl-hover">
				  		<a class="align-middle-center" href="">Swim Lessons</a>
				  	</div>
				  </div>
				  <div class="owl-ele">
				  	<div class="owl-img">
				  		<img src="{{ asset('assets/img/bg-showcase-1.jpg') }}">
				  	</div>
				  	<div class="owl-hover">
				  		<a class="align-middle-center" href="">Swim Lessons</a>
				  	</div>
				  </div>
				  <div class="owl-ele">
				  	<div class="owl-img">
				  		<img src="{{ asset('assets/img/bg-showcase-1.jpg') }}">
				  	</div>
				  	<div class="owl-hover">
				  		<a class="align-middle-center" href="">Swim Lessons</a>
				  	</div>
				  </div>
				  <div class="owl-ele">
				  	<div class="owl-img">
				  		<img src="{{ asset('assets/img/bg-showcase-1.jpg') }}">
				  	</div>
				  	<div class="owl-hover">
				  		<a class="align-middle-center" href="">Swim Lessons</a>
				  	</div>
				  </div>
				  <div class="owl-ele">
				  	<div class="owl-img">
				  		<img src="{{ asset('assets/img/bg-showcase-1.jpg') }}">
				  	</div>
				  	<div class="owl-hover">
				  		<a class="align-middle-center" href="">Swim Lessons</a>
				  	</div>
				  </div>
				  <div class="owl-ele">
				  	<div class="owl-img">
				  		<img src="{{ asset('assets/img/bg-showcase-1.jpg') }}">
				  	</div>
				  	<div class="owl-hover">
				  		<a class="align-middle-center" href="">Swim Lessons</a>
				  	</div>
				  </div>
				</div>
			</div>
		</div>
	</section>

	<!-- Image Showcases -->
	<section class="showcase">
		<div class="container">
			<div class="row">
				<!-- <div class="col-lg-7 order-lg-2 text-white showcase-img" style="background-image: url('img/melonseed-home-02.png');"></div> -->
				<div class="col-lg-7 order-lg-2 text-white showcase-img">
					<img src="{{ asset('img/melonseed-home-02.png') }}">
				</div>
				<div class="col-lg-5 order-lg-1 my-auto showcase-text">
					<h2>What we do  “Helping busy parents”</h2>
					<p class="lead mb-0">Simax helps parents find the perfect activities for 
					their kids! With certified instructors and activities
					across hundreds of cities we’re confident that 
					there’s something for everyone. </p>
				</div>
			</div>
		</div>
	</section>

	<!-- Area | Location -->
	<section class="area-classes text-center bg-light">
		<div class="container">
			<h2 class="mb-4">Classes in your area</h2>
			<div class="row">
				<iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France" width="100%" height="532" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>
	</section>
	
	<!-- Styles -->
	@push('contentCss')
	<link rel="stylesheet" href="{{ asset('plugins/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css') }}">
	@endpush

	<!-- Scripts -->
	@push('contentJs')
	<script src="{{ asset('plugins/OwlCarousel2-2.3.4/dist/owl.carousel.min.js') }}"></script>
	<script type="text/javascript">
		// Owl Carousel
		$(document).ready(function(){
		  $(".owl-carousel").owlCarousel({
		  	loop: true,
		  	dots: false,
		  	responsive: {
	        0:{ items:2.5, margin: 5, nav:true },
	        425:{ items:3, margin: 5, nav:false },
	        768:{ items:3.5, margin: 10, nav:false, },
	        1024:{ items: 4.5, margin: 10, nav:false, },
	        1100:{ items: 4.5, margin: 10, nav:true, }
		    }
		  });
		});


		// Google Map

	</script>


	@endpush

@endsection