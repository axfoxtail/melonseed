@extends('../layouts.app')

@section('content')

  <!-- Activity Detail -->
  <section class="detail-container bg-white my-5">
    <div class="container mt-3">
      <div class="row">
        <div class="col-md-4 col-sm-4 col-12 mt-2">
          <div class="card">
            <div class="card-body">
              <div class="text-center">PAST ACTIVITIES</div>
              <div class="text-center h1 font-weight-bold mb-0">{{ $counts['past'] }}</div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4 col-12 mt-2">
          <div class="card">
            <div class="card-body">
              <div class="text-center">TOTAL ACTIVITIES</div>
              <div class="text-center h1 font-weight-bold mb-0">{{ $counts['total'] }}</div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4 col-12 mt-2">
          <div class="card">
            <div class="card-body">
              <div class="text-center">CURRENT ACTIVITIES</div>
              <div class="text-center h1 font-weight-bold mb-0">{{ $counts['current'] }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Activity Location -->
  <section class="location-container bg-white my-5">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h3>My Activities</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card text-center" style="overflow: scroll;">
            <div class="card-header" style="min-width: 1000px;">
              <div class="row">
                <div class="col-2">Activity</div>
                <div class="col-1">Type</div>
                <div class="col-3">Description</div>
                <div class="col-2">Booking Date</div>
                <div class="col-2">Status</div>
                <div class="col-2">Reviews</div>
              </div>
            </div>
            <div class="card-body" style="min-width: 1000px;">
              @foreach($bookings as $index => $booking)
              <div class="row odd-even-row py-2">
                <div class="col-2">
                  <div>{{ $booking->providers->business_name }}</div>
                  @if ($booking->providers->thumbnail_img)
                  <img class="thumbnail-img" style="width: 100px; height: 50px;" src="{{ $booking->providers->thumbnail_img }}">
                  @endif
                </div>
                <div class="col-1 p-0">
                  <div>{{ $booking->providers->categories->category_name }}</div>
                  <div>{{ $booking->providers->activityTypes->activity_type_name }}</div>
                </div>
                <div class="col-3">
                  {{ $booking->providers->activity_description }}
                </div>
                <div class="col-2">
                  <div>From {{ date('D, F d, Y', strtotime($booking->start_date)) }}</div>
                  <div>To {{ date('D, F d, Y', strtotime($booking->end_date)) }}</div>
                </div>
                <div class="col-2">
                  {{ getBookingStatus($booking->status) }}
                </div>
                <div class="col-2">
                  @switch($booking->status)
                    @case (0)
                      <a href="javascript:openModal({{ $booking->id }})">Complete & Give Feedback</a>
                      @break
                    @case (1)
                      <div class="read-rating-sm" data-rating="{{ $booking->reviews->rate }}"></div>
                      @break
                    @case (2)
                      
                      @break
                    @case (3)

                      @break
                    @default
                  @endswitch
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- The Modal -->
  <div class="modal login-modal" id="feedbackModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
          <li class="nav-item" style="width: 100%;">
            <a class="nav-link" style="width: 100%;">Give Feeback</a>
          </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <div id="" class="container tab-pane active"><br>
            <form id="feedback-form">
              <input type="hidden" class="hidden" name="booking_id" value="">
              <div class="row">
                <div class="col-12 text-center p-3">
                  <div class="give-rating" data-show-clear="false"></div>
                  <input type="hidden" class="hidden" name="review_rate" value="">
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <textarea class="form-control" name="review_content" rows="5" style="height: 150px;"></textarea>
                </div>
              </div>
              <div class="row my-3">
                <div class="col-12 text-center">
                  <input type="button" class="form-control btn btn-primary btn-feedback-submit" value="Submit" style="height: 50px; font-size: 25px;">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Styles -->
  @push('contentCss')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('plugins/star-rating-svg/src/css/star-rating-svg.css') }}">
  @endpush

  <!-- Scripts -->
  @push('contentJs')
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

    $(".give-rating").starRating({
      starSize: 50,
      hoverColor: '#38cbb7',
      activeColor: '#38cbb7',
      ratedColor: '#38cbb7',
      useGradient: false,
      disableAfterRate: false,
      callback: function(currentRating, $el){
        // make a server call here
        console.log(currentRating);
        $('input[name=review_rate]').val(currentRating);
      }
    });

    function openModal(booking_id) {
      $('input[name=booking_id]').val(booking_id);
      $('#feedbackModal').modal('toggle');
    }

    $(document).on('click', '.btn-feedback-submit', function(e) {
      e.preventDefault();
      
      $.ajax({
        type: 'POST',
        url: base_url + '/activity/complete',
        data: {
          booking_id: $('input[name=booking_id]').val(),
          review_rate: $('input[name=review_rate]').val(),
          review_content: $('textarea[name=review_content]').val()
        },
        success: function(data) {
          console.log('res-success: ', data);
          toastr.success(data.message);
          $('#feedbackModal').modal('toggle');
          document.location.reload();
        },
        error: function(err) {
          console.log('err: ', err);
          
        }
      });

    });
  </script>
  @endpush

@endsection