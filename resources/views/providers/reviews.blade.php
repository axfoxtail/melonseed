@extends('../layouts.app')

@section('content')

  <!-- Provider Create -->
  <section class="provider-create-container my-5">
    <div class="container">
      <div class="row">
        <div class="banner-upload-form" id="banner-upload-form">
          <div class="banner-container">
            <img class="banner-img" src="{{ asset('img/defaults/banners/banner_swim.jpg') }}">
          </div>
        </div>
      </div>
      <div class="row mt-5">
        @if(count($reviews))
          @foreach($reviews as $review)
          <div class="col-md-6 col-sm-12 col-12 mb-3">
            <div class="card">
              <div class="card-body d-inline-flex">
                <img class="img-thumbnail rounded-circle" style="width: 100px; height: 100px;" src="{{ asset($review->users->avatar) }}">
                <div class="d-inline-block w-100 px-3 align-middle">
                  <div class="read-rating-sm" data-rating="{{ 5 }}"></div>
                  <div class="d-block h5">"{{ $review->content }}"</div>
                  <div class="text-right align-text-bottom h4 font-weight-bold">{{ $review->users->first_name ? $review->users->first_name : $review->users->username }}</div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        @else
          <div class="col-md-6 col-sm-12 col-12 mb-3">
            <div class="alert alert-danger p-4 text-center">
              There is no review yet.
            </div>
          </div>
        @endif
      </div>
    </div>
  </section>

  <!-- Styles -->
  @push('contentCss')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.10/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('plugins/star-rating-svg/src/css/star-rating-svg.css') }}">
  @endpush

  <!-- Scripts -->
  @push('contentJs')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.10/js/bootstrap-select.min.js"></script>
  <script src="{{ asset('plugins/star-rating-svg/src/jquery.star-rating-svg.js') }}"></script>
  <script type="text/javascript">
    $(".read-rating-sm").starRating({
      starSize: 25,
      readOnly: true,
      hoverColor: '#38cbb7',
      activeColor: '#38cbb7',
      ratedColor: '#38cbb7',
      useGradient: false,
      callback: function(currentRating, $el){
          // make a server call here
      }
    });

  </script>
  @endpush

@endsection