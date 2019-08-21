@extends('layouts.app')

@section('content')

  <!-- Masthead -->
  <header class="masthead text-white text-center" style="margin-top: -3rem">
    <div class="overlay"></div>
    <div class="container align-middle-center">
      <div class="my-auto">
        <div class="col-md-12 col-lg-11 col-xl-11 mx-auto">
          <form>
            <div class="form-row">
              <div class="col-12 col-md-9 mb-2 mb-md-0 px-1 d-flex">
                <div class="form-control form-control-lg search-location">
                  <span class="search-prefix">You’re located in </span>
                  <select class="selectpicker select-region" data-live-search="false" data-style="btn btn-primary-border" name="region" id="region" title="">
                    <option data-tokens="Toronto" value="Toronto" selected>Toronto</option>
                    <option data-tokens="York" value="York">York</option>
                    <option data-tokens="Peel" value="Peel">Peel</option>
                  </select>
                  <i class="material-icons search-subfix">location_on</i>
                </div>
              </div>
              <div class="col-12 col-md-3 px-1">
                <a class="btn btn-primary btn-go" onclick="findActivitiesOnRegion();">Let's Go</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </header>

  <!-- Popular Activities Carousel -->
  <section class="bg-white text-center popular-carousel">
    <div class="container">
      <h1 class="mb-4 text-left">Popular activities in Toronto</h1>
      <div class="row">
        <div class="owl-carousel">
          <div class="owl-ele">
            <div class="owl-img">
              <img alt="kids swimming activity" src="{{ asset('img/home/swimming.png') }}">
            </div>
            <div class="owl-hover">
              <a class="align-middle-center" href="">Swimming</a>
            </div>
          </div>
          <div class="owl-ele">
            <div class="owl-img">
              <img alt="kids soccer activity" src="{{ asset('img/home/soccer.png') }}">
            </div>
            <div class="owl-hover">
              <a class="align-middle-center" href="">Soccer</a>
            </div>
          </div>
          <div class="owl-ele">
            <div class="owl-img">
              <img alt="kids music lesson" src="{{ asset('img/home/music.png') }}">
            </div>
            <div class="owl-hover">
              <a class="align-middle-center" href="">Music Lessons</a>
            </div>
          </div>
          <div class="owl-ele">
            <div class="owl-img">
              <img alt="kids gymnastics activity" src="{{ asset('img/home/gymnastics.png') }}">
            </div>
            <div class="owl-hover">
              <a class="align-middle-center" href="">Gymnastics</a>
            </div>
          </div>
          <div class="owl-ele">
            <div class="owl-img">
              <img alt="kids baseball activity" src="{{ asset('img/home/baseball.png') }}">
            </div>
            <div class="owl-hover">
              <a class="align-middle-center" href="">Baseball</a>
            </div>
          </div>
          <div class="owl-ele">
            <div class="owl-img">
              <img alt="kids dance activity" src="{{ asset('img/home/dance.png') }}">
            </div>
            <div class="owl-hover">
              <a class="align-middle-center" href="">Dance Lessons</a>
            </div>
          </div>
          <div class="owl-ele">
            <div class="owl-img">
              <img alt="kids ice skating acitivty" src="{{ asset('img/home/ice-skating.png') }}">
            </div>
            <div class="owl-hover">
              <a class="align-middle-center" href="">Ice Skating</a>
            </div>
          </div>
          <div class="owl-ele">
            <div class="owl-img">
              <img alt="kids skiing activity" src="{{ asset('img/home/skiing.png') }}">
            </div>
            <div class="owl-hover">
              <a class="align-middle-center" href="">Skiing</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Image Showcases -->
  <section class="showcase bg-white">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 order-lg-2 text-white showcase-img">
          <img alt="kis activity banner image" class="mt-5" src="{{ asset('img/melonseed-home-02.png') }}">
        </div>
        <div class="col-lg-5 order-lg-1 my-auto showcase-text">
          <h2>What we do <br> “Helping busy parents”</h2>
          <p class="lead mb-0">Melonseed helps parents find the perfect activities for their kids! With hundreds of activities listed, we’re confident that there’s something for everyone. </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Area | Location -->
  <section class="area-classes text-center bg-white">
    <div class="container">
      <h1 class="mb-4 text-left">Classes in your area</h1>
      <div class="row">
        <!-- <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q={{ getCurrentLatLonKeywardFromIP($ip) }}" width="100%" height="532" frameborder="0" style="border:0" allowfullscreen></iframe> -->
        <div id="maps-home" class="w-100"></div>
      </div>
    </div>
  </section>

  
  
  <!-- Styles -->
  @push('contentCss')
  <link rel="stylesheet" href="{{ asset('plugins/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css') }}">
  <link href="{{ asset('css/front/home.css') }}" rel="stylesheet">
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
          0:{ items:2.5, margin: 5, nav:false },
          425:{ items:3, margin: 5, nav:false },
          768:{ items:3.5, margin: 10, nav:false, },
          1024:{ items: 4.5, margin: 10, nav:false, },
          1100:{ items: 4.5, margin: 10, nav:true, }
        },
        autoplay: true,
        autoplayTimeout: 3000
      });
    });

    function findActivitiesOnRegion() {
      var selected_region = $('select[name=region]').val();
      window.location.href = base_url + '/activities?region=' + selected_region;
    }
  </script>
  <script type="text/javascript">
    // initMap();
    function initMap() {
      $.ajax({
        type: 'GET', 
        url: base_url + '/get_map_data', 
        data: {},
        processData: false, 
        contentType: false, 
        success: function(data) {
          var locations = [
            ['My position', parseFloat(data.my_location.latitude), parseFloat(data.my_location.longitude)]
          ];
          for (var i = 0; i < data.providers.length; i++) {
            if (data.providers[i].latitude && data.providers[i].longitude) {
              locations.push([
                data.providers[i].business_name, parseFloat(data.providers[i].latitude), parseFloat(data.providers[i].longitude)
              ]);
            }
          }
          drawMap(locations);
        }, 
        error: function(err) {
          console.log('err: ', err);
        }
      });
    }

    function drawMap(locations) {

      var map = new google.maps.Map(document.getElementById('maps-home'), {
        center: new google.maps.LatLng(locations[0][1], locations[0][2]), 
        zoom: 9
      });

      var marker;
      
      for (var i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
          position: new google.maps.LatLng(locations[i][1], locations[i][2]), 
          map: map, 
          title: locations[i][0]
        });
      }
    }
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_API_KEY', 'AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc') }}&callback=initMap"></script>
  @endpush

@endsection