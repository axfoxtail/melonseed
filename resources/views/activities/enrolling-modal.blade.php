<!-- The Modal -->
  <div class="modal login-modal" id="enrollingModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
          <li class="nav-item" style="width: 100%;">
            <a class="nav-link" style="width: 100%;">Enrolling</a>
          </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <div id="" class="container tab-pane active"><br>
            <form id="enrolling-form">
              <input type="hidden" class="hidden" name="provider_id" value="{{ $activity->id }}">
              <div class="row">
                <div class="col-12">
                  <h2>{{ $activity->business_name ? $activity->business_name : 'Undefined Business Name' }}</h2>
                  <p class="detail-description">
                    {{ $activity->activity_description ? $activity->activity_description : 'activity_description' }}
                  </p>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 col-12">
                  <div class="form-group">
                    <label class="h3">Start date</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" value="" required autocomplete="start_date" autofocus>
                  </div>
                </div>
                <div class="col-sm-6 col-12">
                  <div class="form-group">
                    <label class="h3">End date</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" value="" required autocomplete="end_date" autofocus>
                  </div>
                </div>
              </div>
              <div class="row my-3">
                <div class="col-12 text-center">
                  <input type="button" class="form-control btn btn-primary btn-enrolling-submit" value="Submit">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Scripts -->
  @push('contentJs')
  <script type="text/javascript">
    $('.btn-enrolling-submit').on('click', function(e) {
      e.preventDefault();
      
      $.ajax({
        type: 'POST',
        url: base_url + '/activity/enrolling',
        data: {
          provider_id: $('input[name=provider_id]').val(),
          start_date: $('input[name=start_date]').val(),
          end_date: $('input[name=end_date]').val()
        },
        success: function(data) {
          console.log('res-success: ', data);
          toastr.success(data.message);
          $('#enrollingModal').modal('toggle');
        },
        error: function(err) {
          console.log('err: ', err);
          
        }
      });

    });
  </script>
  @endpush
