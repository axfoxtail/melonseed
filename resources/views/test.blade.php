@extends('layouts.app')

@section('content')

  <!-- Area | Location -->
  <section class="area-classes text-center bg-white">
    <div class="container">
      <h2 class="mb-4">Classes in your area</h2>
      <div class="row">
        <div id="googleMap" style="width: 100%;height: 400px;border: solid 1px red;"></div>
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
    // Google Map
    function myMap() {
      var locations = [
        ['Los Angeles', 34.052235, -118.243683],
        ['Santa Monica', 34.024212, -118.496475],
        ['Redondo Beach', 33.849182, -118.388405],
        ['Newport Beach', 33.628342, -117.927933],
        ['Long Beach', 33.770050, -118.193739]
      ];

      var center = new google.maps.LatLng(locations[0][1], locations[0][2]);
      
      var mapProp= {
        center: center,
        zoom:10,
      };
      
      var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

      var marker = new google.maps.Marker({
        position: center,
        map: map
      });

      var infowindow = new google.maps.InfoWindow({});

      var marker, count;

      for (count = 0; count < locations.length; count++) {
        marker = new google.maps.Marker({
          position: new google.maps.LatLng(locations[count][1], locations[count][2]),
          map: map,
          title: locations[count][0]
        });
      }

    }
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&callback=myMap"></script>

  @endpush

@endsection