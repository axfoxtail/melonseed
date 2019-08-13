@extends('../layouts.app')

@section('content')
  <!-- Provider Create -->
  <section class="provider-featured-container">
    <div class="container mt-3">
      <h2>Featured Providers</h2>
      <div class="row">
        <ul class="nav-pill-wrapper">
          <li class="btn btn-primary-border active nav-pill-item" data-target="All">All</li>
          @foreach ($categories as $category)
          <li class="btn btn-primary-border nav-pill-item" data-target="{{ $category->id }}">{{ $category->category_name }}</li>
          @endforeach
        </ul>
      </div>
      <div class="row mt-3 providers-container">
        @if(count($providers))
          @foreach($providers as $provider)
          <div class="featured-item-container" data-category="{{ $provider->category }}">
            <div class="featured-item-image-wrapper">
              <img class="img-thumbnail featured w-100" src="{{ $provider->profile_img }}">
            </div>
            <div class="featured-item-info-wrapper">
              <div class="featured-item-ribbon">{{ $provider->activityTypes->activity_type_name }}</div>
              <div class="featured-item-name mt-2">{{ $provider->business_name }}</div>
              <div class="featured-item-description">{{ $provider->activity_description }}</div>
            </div>
          </div>
          @endforeach
        @else
          <div class="col-12 mb-3">
            <div class="alert alert-danger p-4 text-center">
              There is no featured provider yet.
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
  <link href="{{ asset('css/front/provider-featured.css') }}" rel="stylesheet">
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
    // ----- category gallery ----- //
    $(document).on('click', '.nav-pill-item', function() {
      $('.nav-pill-item').removeClass('active');
      $(this).addClass('active');
      var target = $(this).data('target');
      $('.featured-item-container').hide();
      if (target == 'All') {
        $('.featured-item-container').show();
      } else {
        $('.featured-item-container[data-category='+ target +']').show();
      }
    });
  </script>
  @endpush

@endsection