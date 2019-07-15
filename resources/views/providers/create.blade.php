@extends('../layouts.app')

@section('content')

	<!-- Provider Create -->
	<section class="provider-create-container my-5">
		<div class="container">
			<div class="row mb-4">
				<img class="banner-img" src="{{ asset('assets/img/bg-masthead.jpg') }}">
			</div>
			<div class="row">
				<form class="provider-create-form">
					<h2>Backwoods Ski School</h2>
					<div class="row select-group my-5">
						<div class="col-3">
							<select class="selectpicker filter-category" data-live-search="true" data-style="btn btn-primary-border" name="filter-category" id="filter-category" title="Category">
							  <option data-tokens="ketchup mustard">Education</option>
							  <option data-tokens="mustard">Course</option>
							  <option data-tokens="frosting">Presentation</option>
							</select>
						</div>
						<div class="col-3">
							<select class="selectpicker filter-category" data-live-search="true" data-style="btn btn-primary-border" name="filter-category" id="filter-category" title="Category">
							  <option data-tokens="ketchup mustard">Education</option>
							  <option data-tokens="mustard">Course</option>
							  <option data-tokens="frosting">Presentation</option>
							</select>
						</div>
						<div class="col-3">
							<select class="selectpicker filter-category" data-live-search="true" data-style="btn btn-primary-border" name="filter-category" id="filter-category" title="Category">
							  <option data-tokens="ketchup mustard">Education</option>
							  <option data-tokens="mustard">Course</option>
							  <option data-tokens="frosting">Presentation</option>
							</select>
						</div>
						<div class="col-3">
							<select class="selectpicker filter-category" data-live-search="true" data-style="btn btn-primary-border" name="filter-category" id="filter-category" title="Category">
							  <option data-tokens="ketchup mustard">Education</option>
							  <option data-tokens="mustard">Course</option>
							  <option data-tokens="frosting">Presentation</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-8">
							<div class="row">
								<div class="col-8">
									<div class="form-group">
								    <label for="exampleInputEmail1">Contact Info</label>
								    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
								  </div>
								  <div class="form-group">
								    <label for="exampleInputEmail1">Website</label>
								    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
								  </div>
								</div>
								<div class="col-4">
									<div class="form-group">
								    <label for="exampleInputEmail1">Availability</label>
								    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
								  </div>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-12">
							    <label for="exampleInputEmail1">Activity Description</label>
							    <textarea class="form-control" id="exampleInputEmail1" rows="7">
							    </textarea>
							  </div>
							</div>
							<div class="row">
								<div class="form-group col-12">
							    <label for="exampleInputEmail1">Upload Images</label>
							    <div class="upload-gird-wrapper">
							    	@for($i = 0; $i < 12; $i++)
										<div class="upload-item">
											<div class="plus-item-group">
												<div class="plus-icon">+</div>
												<div class="plus-text">Add Photo</div>
											</div>
										</div>
							    	@endfor
							    </div>
							  </div>
							</div>
							<div class="row">
								<div class="col-8">
									<div class="form-group">
								    <label for="exampleInputEmail1">Social Media Links</label>
								    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
								  </div>
								</div>
							</div>
						</div>
					</div>
				</form>
				
			</div>
		</div>
	</section>

	<!-- Styles -->
	@push('contentCss')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.10/css/bootstrap-select.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	@endpush

	<!-- Scripts -->
	@push('contentJs')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.10/js/bootstrap-select.min.js"></script>
	@endpush

@endsection