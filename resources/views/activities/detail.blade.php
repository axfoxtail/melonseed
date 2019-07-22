@extends('../layouts.app')

@section('content')

  <!-- Activity Detail -->
  <section class="detail-container bg-white my-5">
    <div class="container">
      <div class="row">
        <div class="col-12 mb-3">
          <a class="btn-text btn-back" href="/activities"><i class="fa fa-long-arrow-left"></i> Back to listings</a>
        </div>
      </div>
      <div class="row">
        <div class="col-8">
          <div class="row">
            <div class="col-6 detail-img-wrapper">
              <img class="detail-img" src="{{ $activity->profile_img ? $activity->profile_img : asset('img/defaults/profile.png') }}">
            </div>
            <div class="col-6">
              <div class="row activity-title mb-3">
                {{ $activity->business_name ? $activity->business_name : 'business_name' }}
                <div class="rate-stars">
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star checked"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                </div>
              </div>
              <div class="row activity-place mb-3">
                {{ $activity->address ? $activity->address : '' }}
                {{ $activity->city ? $activity->city : '' }}
                {{ $activity->state ? $activity->state : '' }}
              </div>
              <div class="mb-3">
                <div class="row activity-contact mb-2">Contact : </div>
                <div class="row activity-contact-info mb-2">
                  {{ $activity->phone_number ? $activity->phone_number : 'phone_number' }}
                </div>
                <div class="row activity-contact-info mb-2">
                  {{ $activity->website ? $activity->website : 'website' }}
                </div>
              </div>
              <div class="row">
                <a href="{{ $activity->website ? $activity->website : '/' }}" class="btn btn-visit btn-primary" target="_blank">Visit Site</a>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <h2>Description</h2>
              <p class="detail-description">
                <!-- "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." -->
                {{ $activity->activity_description ? $activity->activity_description : 'activity_description' }}
              </p>
            </div>
          </div>
        </div>
        <div class="col-4">
          <iframe class="ad-sidebar" src="" width="246" height="651"></iframe>
        </div>
      </div>
    </div>
  </section>

  <!-- Activity Location -->
  <section class="location-container bg-white my-5">
    <div class="container">
      <div class="row">
        <div class="col-9">
          <h3>Location Map</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France" width="100%" height="379" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </section>

  <!-- Review Showcases -->
  <section class="reviews-container bg-white my-5">
    <div class="container">
      <div class="row">
        <div class="col-9">
          <h2 class="mr-3">
            Reviews
          </h2>
          <div class="rate-stars">
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
          </div>
        </div>
      </div>
      <div class="row">
        @for($i = 0; $i < 5; $i++)
        <div class="col-9">
          <h3>Jordan Robin - 2018</h3>
          <p class="reviews-content">
            The activities were great, my kids loved it and were really excited to go back again this coming summer! Thanks again to activity name for hosting such a great summer cmap for kids of all age :D 
          </p>
        </div>
        @endfor
      </div>
    </div>
  </section>

  <!-- Styles -->
  @push('contentCss')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  @endpush

  <!-- Scripts -->
  @push('contentJs')
  
  @endpush

@endsection