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
				  <div> Your Content </div>
				  <div> Your Content </div>
				  <div> Your Content </div>
				  <div> Your Content </div>
				  <div> Your Content </div>
				  <div> Your Content </div>
				  <div> Your Content </div>
				</div>
			</div>
		</div>
	</section>

	<!-- Image Showcases -->
	<section class="showcase">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 order-lg-2 text-white showcase-img" style="background-image: url('img/melonseed-home-02.png');"></div>
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

	<!-- Testimonials -->
	<section class="testimonials text-center bg-light">
		<div class="container">
			<h2 class="mb-5">What people are saying...</h2>
			<div class="row">
				<div class="col-lg-4">
					<div class="testimonial-item mx-auto mb-5 mb-lg-0">
						<img class="img-fluid rounded-circle mb-3" src="assets/img/testimonials-1.jpg" alt="">
						<h5>Margaret E.</h5>
						<p class="font-weight-light mb-0">"This is fantastic! Thanks so much guys!"</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="testimonial-item mx-auto mb-5 mb-lg-0">
						<img class="img-fluid rounded-circle mb-3" src="assets/img/testimonials-2.jpg" alt="">
						<h5>Fred S.</h5>
						<p class="font-weight-light mb-0">"Bootstrap is amazing. I've been using it to create lots of super nice landing pages."</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="testimonial-item mx-auto mb-5 mb-lg-0">
						<img class="img-fluid rounded-circle mb-3" src="assets/img/testimonials-3.jpg" alt="">
						<h5>Sarah W.</h5>
						<p class="font-weight-light mb-0">"Thanks so much for making these free resources available to us!"</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Call to Action -->
	<section class="call-to-action text-white text-center">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-xl-9 mx-auto">
					<h2 class="mb-4">Ready to get started? Sign up now!</h2>
				</div>
				<div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
					<form>
						<div class="form-row">
							<div class="col-12 col-md-9 mb-2 mb-md-0">
								<input type="email" class="form-control form-control-lg" placeholder="Enter your email...">
							</div>
							<div class="col-12 col-md-3">
								<button type="submit" class="btn btn-block btn-lg btn-primary">Sign up!</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
@endsection