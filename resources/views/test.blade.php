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
      var mapProp= {
        center:new google.maps.LatLng(51.508742,-0.120850),
        zoom:5,
      };
      var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
    }
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGanHZo00WmfUKCi46LYXqc_kXkYbsklk&callback=myMap"></script>

  @endpush

@endsection