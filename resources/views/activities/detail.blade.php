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
                @if(count($activity->reviews))
                <div class="read-rating" data-rating="{{ calcTotalRate($activity->reviews) }}"></div>
                @endif
              </div>
              <div class="row activity-place mb-3">
                {{ $activity->address ? $activity->address : '' }}
              </div>
              <div class="row activity-place mb-3">
                Ages: {{ displayAgeRange($activity->age_range) }}
              </div>
              <div class="mb-3">
                <div class="row activity-contact mb-2">Contact : </div>
                <div class="row activity-contact-info mb-2">
                  {{ $activity->phone_number ? $activity->phone_number : 'phone_number' }}
                </div>
                <div class="row activity-contact-info mb-2">
                  <a href="{{ $activity->website ? $activity->website : '/' }}" target="_blank">
                    {{ $activity->website ? $activity->website : 'website' }}
                  </a>
                </div>
              </div>
              <div class="row">
                <a disabled class="btn btn-visit btn-primary" data-toggle="modal" data-target="{{ Auth::check() ? '#enrollingModal' : '#loginModal' }}">Now Enrolling</a>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <h2>Description</h2>
              <p class="detail-description">
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
          <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q={{ $activity->latitude . ',' . $activity->longitude }}" width="100%" height="379" frameborder="0" style="border:0" allowfullscreen></iframe>
          <!-- <div id="maps-detail" class="w-100" style="height: 400px"></div> -->
        </div>
      </div>
    </div>
  </section>

  <!-- Review Showcases -->
  <section class="reviews-container bg-white my-5">
    <div class="container">
      <div class="row">
        <div class="col-9 d-flex">
          <h2 class="mr-3">
            Reviews
          </h2>
          @if(count($activity->reviews))
          <div class="read-rating" data-rating="{{ calcTotalRate($activity->reviews) }}"></div>
          @endif
        </div>
      </div>
      <div class="row">
        @foreach($activity->reviews as $review)
          <div class="col-9">
            <div class="d-flex">
              <h3>{{ ($review->users->first_name && $review->users->first_name) ? getFullName($review->users->first_name, $review->users->last_name) : $review->users->username }} - {{ $review->created_at ? catchYearFromDateTime($review->created_at) : '(unknown)' }}</h3>
              <div class="read-rating-sm pt-1 ml-3" data-rating="{{ $review->rate }}"></div>
            </div>
            <p class="reviews-content">
              {{ $review->content }}
            </p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- The Enrolling Modal -->
  @include('activities.enrolling-modal')

  <!-- Styles -->
  @push('contentCss')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('plugins/star-rating-svg/src/css/star-rating-svg.css') }}">
  @endpush

  <!-- Scripts -->
  @push('contentJs')
  <script src="{{ asset('plugins/star-rating-svg/src/jquery.star-rating-svg.js') }}"></script>
  <script type="text/javascript">
    $(".read-rating").starRating({
      starSize: 30,
      readOnly: true,
      hoverColor: '#38cbb7',
      activeColor: '#38cbb7',
      useGradient: false,
      callback: function(currentRating, $el){
          // make a server call here
      }
    });
    $(".read-rating-sm").starRating({
      starSize: 25,
      readOnly: true,
      hoverColor: '#38cbb7',
      activeColor: '#38cbb7',
      useGradient: false,
      callback: function(currentRating, $el){
          // make a server call here
      }
    });
  </script>
  <script type="text/javascript">
    var my_lat = "{{ getArrLocationFromIP($ip)->latitude }}";
    my_lat = parseFloat(my_lat);
    var my_lng = "{{ getArrLocationFromIP($ip)->longitude }}";
    my_lng = parseFloat(my_lng);
    var provider_lat = "{{ $activity->latitude }}";
    provider_lat = parseFloat(provider_lat);
    var provider_lng = "{{ $activity->longitude }}";
    provider_lng = parseFloat(provider_lng);

  </script>
  @endpush

@endsection