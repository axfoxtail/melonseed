@extends('../layouts.app')

@section('content')

  <!-- Image Showcases -->
  <section class="activities-container bg-white">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 filter-sidebar mt-4">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Location</h3>
              <div class="form-group">
                <select class="selectpicker filter-location" data-live-search="true" data-style="btn btn-primary-border" name="filter-location" id="filter-location" title="Location">
                  <!-- <option data-tokens="0" value="0">All</option> -->
                  @foreach($location_list as $location)
                  <option data-tokens="{{ $location->location_name }}" value="{{ $location->location_name }}">{{ $location->location_name }}</option>
                  @endforeach
              </select>
              <i class="arrow down"></i>
              </div>
              <h3 class="card-title">Age Range</h3>
              <div class="row">
                <div class="col-6 pr-0">
                  <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input age-checkbox" id="age1" name="age1" value="age1">
                    <label class="custom-control-label" for="age1">1 Year</label>
                  </div>
                  <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input age-checkbox" id="age3" name="age3" value="age3">
                    <label class="custom-control-label" for="age3">4-7 Years</label>
                  </div>
                  <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input age-checkbox" id="age5" name="age5" value="age5">
                    <label class="custom-control-label" for="age5">11-13 Years</label>
                  </div>
                </div>
                <div class="col-6 pr-0">
                  <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input age-checkbox" id="age2" name="age2" value="age2">
                    <label class="custom-control-label" for="age2">1-3 Years</label>
                  </div>
                  <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input age-checkbox" id="age4" name="age4" value="age4">
                    <label class="custom-control-label" for="age4">8-10 Years</label>
                  </div>
                  <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input age-checkbox" id="age6" name="age6" value="age6">
                    <label class="custom-control-label" for="age6">14-16 Years</label>
                  </div>
                </div>
              </div>
              <h3 class="card-title mt-3">Distance <small>(km)</small></h3>
              <div class="row">
                <div class="custom-control filter-range">
                  <input type="range" name="filter-distance" class="filter-distance" id="filter-distance" min="5" max="101" step="1" value="101">
                  <span class="filter-range-min">5</span>
                  <span class="filter-range-current"></span>
                  <span class="filter-range-max">100+</span>
                </div>
              </div>
              <!-- <h3 class="card-title mt-4">Cost</h3>
              <div class="row">
                <div class="custom-control filter-range">
                  <input type="range" name="filter-distance" class="filter-distance" id="filter-distance">
                  <span class="filter-range-min">$</span>
                  <span class="filter-range-max">$$$</span>
                </div>
              </div> -->
            </div>
          </div>
        </div>

        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 filter-result mt-4">
          <div class="row filter-result-header">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb-2">
              <div class="filter-result-label">{{ count($activities) ? count($activities) . (count($activities) == 1 ? ' Activity' : ' Activities') : 'No Activity' }}</div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb-2">
              <select class="selectpicker filter-category" data-live-search="false" data-style="btn btn-primary-border" name="filter-category" id="filter-category" title="Category">
                <option data-tokens="0" value="0">All</option>
                @foreach($categories as $category)
                <option data-tokens="{{ $category->id }}" value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 mb-2">
              <select class="selectpicker filter-activity-type" data-live-search="true" name="filter-activity-type" id="filter-activity-type" data-style="btn btn-primary-border" title="Activity Type">
                <option data-tokens="0" value="0">All</option>
                @foreach($activity_types as $activity_type)
                <option data-tokens="{{ $activity_type->id }}" value="{{ $activity_type->id }}">{{ $activity_type->activity_type_name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="filter-result-body" id="search-results">
            @foreach($activities as $key => $activity)
            <div class="activity-item my-2">
              <div class="activity-item-header">
                <a href="#activity_{{ $activity->id }}" data-toggle="collapse">
                  <div class="row card-header">
                    <div class="card-header-section col-md-5 col-sm-6 col-8">
                      <img class="activity-img" src="{{ $activity->thumbnail_img ? asset($activity->thumbnail_img) : asset('img/defaults/thumbnail.png') }}">
                      <div class="activity-title">{{ $activity->activity_type ? $activity->activityTypes->activity_type_name : '' }}</div>
                    </div>
                    <div class="card-header-section col-md-4 col-sm-6 col-6 mob-hidden">
                      <div class="activity-address">{{ $activity->address ? $activity->address : '' }}</div>
                    </div>
                    <!-- <div class="card-header-section col-md-4 col-sm-6 col-6">
                      <div class="activity-description">{{ $activity->activity_description ? $activity->activity_description : 'activity_description' }}</div>
                    </div> -->
                    <div class="card-header-section col-md-3 col-sm-6 col-4">
                      <div class="activity-distance">
                        {{ ($activity->latitude && $activity->longitude) ? distanceWithMyIP2ProviderPlace($my_location->ip, $activity->latitude, $activity->longitude, 'K', 2) . ' km' : 'unknown' }}
                        <i class="fa fa-angle-down"></i>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <div id="activity_{{ $activity->id }}" class="collapse activity-item-body my-2">
              <div class="row border-1">
                <div class="col-sm-3 col-12">
                  <img class="activity-detail-img" src="{{ $activity->profile_img ? $activity->profile_img : asset('img/defaults/profile.png') }}">
                </div>
                <div class="col-sm-9 col-12">
                  <div class="row">
                    <div class="col-sm-8 col-12">
                      <div class="row activity-detail-title">
                        {{ $activity->business_name ? $activity->business_name : 'business_name' }}
                      </div>
                      <div class="row activity-detail-age">
                        Ages: {{ displayAgeRange($activity->age_range) }}
                      </div>
                      <div class="row activity-detail-place">
                        <i class="material-icons" style="color: #a845ff">location_on</i>
                        <div class="activity-address">{{ $activity->address ? $activity->address : '' }}</div>
                         {{ ($activity->latitude && $activity->longitude) ? '(' . distanceWithMyIP2ProviderPlace($my_location->ip, $activity->latitude, $activity->longitude, 'K', 2) . ' km' . ')' : '' }}
                      </div>
                    </div>
                    <div class="col-sm-4 col-12 mob-inline-flex">
                      <div class="row">
                        <a href="{{ $activity->website ? $activity->website : '/' }}" class="btn btn-primary btn-lg" target="_blank">Visit Site</a>
                      </div>
                      <div class="row">
                        <a class="link-detail" href="/activities/{{ $activity->id }}">View Detail</a>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      {{ $activity->activity_description ? $activity->activity_description : 'activity_description' }}
                    </div>
                  </div>
                </div>
              </div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="row text-center">
            <button class="btn btn-primary btn-load-more mx-auto px-5 d-none">LOAD MORE</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Styles -->
  @push('contentCss')
  <link href="{{ asset('css/front/activities.css') }}" rel="stylesheet">
  @endpush

  <!-- Scripts -->
  @push('contentJs')
  <script type="text/javascript">
    // searchActivities();
    $(document).on('change', 'select[name=filter-category], select[name=filter-activity-type], select[name=filter-location], .age-checkbox, input[name=filter-distance]', function() {
      $('.filter-range-current').text(parseInt($('input[name=filter-distance]').val()) > 100 ? '100+' : $('input[name=filter-distance]').val());
      $('#search-results').empty();
      searchActivities();
    });

    function searchActivities() {
      
      $.LoadingOverlay("show");
      $.ajax({
        type: 'GET',
        url: base_url + '/activities',
        data: {
          category: $('select[name=filter-category]').val(),
          activity_type: $('select[name=filter-activity-type]').val(),
          location: $('select[name=filter-location]').val(),
          age1: $('#age1')[0].checked,
          age2: $('#age2')[0].checked,
          age3: $('#age3')[0].checked,
          age4: $('#age4')[0].checked,
          age5: $('#age5')[0].checked,
          age6: $('#age6')[0].checked,
          // age7: $('#age7')[0].checked,
          // age8: $('#age8')[0].checked,
          distance: $('input[name=filter-distance]').val(),
        },
        success: function(data) {
          console.log('res-success: ', data);
          appendActivities(data.activities, data.my_location);
          reloadActivityTypes(data.activity_types);
          $.LoadingOverlay("hide");
        },
        error: function(err) {
          $.LoadingOverlay("hide");
          console.log('err: ', err);
        }
      });
    }

    function reloadActivityTypes(activity_types) {
      if (activity_types && activity_types.length > 0) {
        $('#filter-activity-type').html('<option class="activity-type-option category_0" data-tokens="0" value="0">All</option>');
        for (var i = 0; i < activity_types.length; i++) {
          $('#filter-activity-type').append('<option class="activity-type-option category_'+ activity_types[i].category_id +'" data-tokens="'+ activity_types[i].id +'" value="'+ activity_types[i].id +'">'+ activity_types[i].activity_type_name +'</option>');
        }
        $('#filter-activity-type').selectpicker('refresh');
      } else {
        $('#filter-activity-type').html('<option class="activity-type-option category_0" data-tokens="0" value="0">All</option>');
      }
      $('#filter-activity-type').selectpicker('refresh');
    }

    function appendActivities(activities, my_location) {
      if (activities && activities.length > 0) {
        var result_length = activities.length + (activities.length == 1 ? ' Activity' : ' Activities');
        $('.filter-result-label').text(result_length);

        for (var i = 0; i < activities.length; i++) {
          $('#search-results').append('<div class="activity-item my-2">' + 
            '<div class="activity-item-header">' + 
              '<a href="#activity_'+ activities[i].id +'" data-toggle="collapse">' + 
                '<div class="row card-header">' + 
                  '<div class="card-header-section col-md-5 col-sm-6 col-8">' + 
                    '<img class="activity-img" src="'+ (activities[i].thumbnail_img ? activities[i].thumbnail_img : base_url + '/img/defaults/thumbnail.png')+'">' + 
                    '<div class="activity-title">'+ (activities[i].activity_type ? activities[i].activity_types.activity_type_name : '') +'</div>' + 
                  '</div>' + 
                  '<div class="card-header-section col-md-4 col-sm-6 col-6 mob-hidden">' + 
                    '<div class="activity-address">'+ (activities[i].address ? activities[i].address : '') +'</div>' + 
                  '</div>' + 
                  '<div class="card-header-section col-md-3 col-sm-6 col-4">' + 
                    '<div class="activity-distance">' + ((activities[i].latitude && activities[i].longitude) ? distance(my_location.latitude, my_location.longitude, activities[i].latitude, activities[i].longitude, 'K', 2) + ' km' : '') +
                      '<i class="fa fa-angle-down"></i>' + 
                    '</div>' + 
                  '</div>' + 
                '</div>' + 
              '</a>' + 
            '</div>' + 
            '<div id="activity_'+ activities[i].id +'" class="collapse activity-item-body my-2">' + 
            '<div class="row border-1">' + 
              '<div class="col-sm-3 col-12">' + 
                '<img class="activity-detail-img" src="'+ (activities[i].profile_img ? activities[i].profile_img : base_url + '/img/defaults/profile.png') +'">' + 
              '</div>' + 
              '<div class="col-md-9 col-12">' + 
                '<div class="row">' + 
                  '<div class="col-sm-8 col-12">' + 
                    '<div class="row activity-detail-title">' + (activities[i].business_name ? activities[i].business_name : '') + 
                    '</div>' + 
                    '<div class="row activity-detail-age">Ages: ' + displayAgeRange(activities[i].age_range) + 
                    '</div>' + 
                    '<div class="row activity-detail-place">' + 
                      '<i class="material-icons" style="color: #a845ff">location_on</i>' + 
                      '<div class="activity-address">' + (activities[i].address ? activities[i].address : '') + '</div>' + 
                      ((activities[i].latitude && activities[i].longitude) ? '(' + distance(my_location.latitude, my_location.longitude, activities[i].latitude, activities[i].longitude, 'K', 2) + ' km)' : '') + 
                    '</div>' + 
                  '</div>' + 
                  '<div class="col-sm-4 col-12 mob-inline-flex">' + 
                    '<div class="row">' + 
                      '<a href="'+ (activities[i].website ? activities[i].website : '/') + '" class="btn btn-primary btn-lg" target="_blank">Visit Site</a>' + 
                    '</div>' + 
                    '<div class="row">' + 
                      '<a class="link-detail" href="'+ base_url +'/activities/'+ activities[i].id +'">View Detail</a>' + 
                    '</div>' + 
                  '</div>' + 
                '</div>' + 
                '<div class="row">' + 
                  '<div class="col-12">' + 
                    (activities[i].activity_description ? activities[i].activity_description : '') + 
                  '</div>' + 
                '</div>' + 
              '</div>' + 
            '</div>' + 
            '</div>' + 
          '</div>');

        }
      } else {
        $('.filter-result-label').text('No Activity');
        $('#search-results').html('<div class="alert alert-danger text-center">There is no matched result.</div>');
      }
    }
    
    function displayAgeRange(age_range) {
      var age_pattern = '';
      if (age_range.includes('age1')) {
        age_pattern += '<div class="age-pattern">1-6 months</div>';
      }
      if (age_range.includes('age2')) {
        age_pattern += '<div class="age-pattern">1 Year</div>';
      }
      if (age_range.includes('age3')) {
        age_pattern += '<div class="age-pattern">1-3 Years</div>';
      }
      if (age_range.includes('age4')) {
        age_pattern += '<div class="age-pattern">4-7 Years</div>';
      }
      if (age_range.includes('age5')) {
        age_pattern += '<div class="age-pattern">8-10 Years</div>';
      }
      if (age_range.includes('age6')) {
        age_pattern += '<div class="age-pattern">11-13 Years</div>';
      }
      if (age_range.includes('age7')) {
        age_pattern += '<div class="age-pattern">14-17 Years</div>';
      }
      if (age_range.includes('age8')) {
        age_pattern += '<div class="age-pattern">18+ Years</div>';
      }
      return age_pattern;
    }

    function distance(lat1, lon1, lat2, lon2, unit, round) {
      if ((lat1 == lat2) && (lon1 == lon2)) {
        return 0;
      }
      else {
        var radlat1 = Math.PI * lat1/180;
        var radlat2 = Math.PI * lat2/180;
        var theta = lon1-lon2;
        var radtheta = Math.PI * theta/180;
        var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
        if (dist > 1) {
          dist = 1;
        }
        dist = Math.acos(dist);
        dist = dist * 180/Math.PI;
        dist = dist * 60 * 1.1515;
        if (unit=="K") { dist = dist * 1.609344 }
        if (unit=="N") { dist = dist * 0.8684 }
        
        var round_digit = parseInt(round);
        if (round_digit) {
          return Math.round(dist * Math.pow(10, round_digit)) / Math.pow(10, round_digit);
        } 
        return dist;
      }
    }
  </script>
  @endpush

@endsection