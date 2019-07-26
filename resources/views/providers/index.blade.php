@extends('../layouts.app')

@section('content')

  <!-- Provider Create -->
  <section class="provider-create-container my-5">
    <div class="container">
      <div class="row mt-5">
        @if(count($providers))
          @foreach($providers as $provider)
          <div class="col-4 mb-3">
            <div class="card position-relative">
              <img class="img-thumbnail" style="width: 100%; height: 20vw;" src="{{ asset($provider->profile_img) }}">
              <div class="hover">
                <div class="hover-title position-relative">
                  <div class="position-absolute w-100 h-100" style="z-index: 10">
                    <div class="position-relative text-center h2 text-white mt-2">
                      {{ $provider->business_name }}
                    </div>
                  </div>
                  <div class="bg-accent w-100 h-100 position-absolute" style="opacity: 0.8"></div>
                </div>
                <div class="hover-description position-relative">
                  <div class="position-absolute w-100 h-100" style="z-index: 10">
                    <div class="position-relative text-center h4 text-white p-3">{{ $provider->activity_description }}</div>
                  </div>
                  <div class="bg-primary w-100 h-100 position-absolute" style="opacity: 0.8"></div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        @else
          <div class="col-12 mb-3">
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