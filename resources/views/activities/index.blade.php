@extends('../layouts.app')

@section('content')

  <!-- Image Showcases -->
  <section class="activities-container bg-white my-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 filter-sidebar">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Location</h3>
              <div class="form-group">
                <select class=" selectpicker filter-location" data-style="btn-primary-border">
                <option>United Status</option>
                <option>United Kingdom</option>
                <option>Australia</option>
                </select>
              <i class="arrow down"></i>
              </div>
              <h3 class="card-title">Age Range</h3>
              <div class="row">
                <div class="col-6 pr-0">
                  <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input" id="age1" name="age1">
                    <label class="custom-control-label" for="age1">1-6 months</label>
                  </div>
                  <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input" id="age3" name="age3">
                    <label class="custom-control-label" for="age3">1-3 Years</label>
                  </div>
                  <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input" id="age5" name="age5">
                    <label class="custom-control-label" for="age5">8-10 Years</label>
                  </div>
                  <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input" id="age7" name="age7">
                    <label class="custom-control-label" for="age7">14-17 Years</label>
                  </div>
                </div>
                <div class="col-6 pr-0">
                  <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input" id="age2" name="age2">
                    <label class="custom-control-label" for="age2">1 Year</label>
                  </div>
                  <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input" id="age4" name="age4">
                    <label class="custom-control-label" for="age4">4-7 Years</label>
                  </div>
                  <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input" id="age6" name="age6">
                    <label class="custom-control-label" for="age6">11-13 Years</label>
                  </div>
                  <div class="custom-control custom-checkbox mb-3">
                    <input type="checkbox" class="custom-control-input" id="age8" name="age8">
                    <label class="custom-control-label" for="age8">18+ Years</label>
                  </div>
                </div>
              </div>
              <h3 class="card-title mt-3">Distance <small>(miles)</small></h3>
              <div class="row">
                <div class="custom-control filter-range">
                  <input type="range" name="filter-distance" class="filter-distance" id="filter-distance">
                  <span class="filter-range-min">5</span>
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
              <div class="row mt-4">
                <div class="col-12">
                  <button type="button" class="btn btn-primary">Apply</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 filter-result">
          <div class="row filter-result-header">
            <div class="col-lg-4 col-md-4, col-sm-4, col-xs-12">
              <div class="filter-result-label">83 Activities</div>
            </div>
            <div class="col-lg-4 col-md-4, col-sm-4, col-xs-12">
              <select class="selectpicker filter-category" data-live-search="false" data-style="btn btn-primary-border" name="filter-category" id="filter-category" title="Category">
                @foreach($categories as $category)
                <option data-tokens="{{ $category->id }}" value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-lg-4 col-md-4, col-sm-4, col-xs-12">
              <select class="selectpicker filter-activity-type" data-live-search="true" name="filter-activiti-type" id="filter-activity-type" data-style="btn btn-primary-border" title="Activity Type">
                @foreach($activity_types as $activity_type)                
                <option class="activity-type-option category_{{ $activity_type->category_id }}" data-tokens="{{ $activity_type->id }}" value="{{ $activity_type->id }}">{{ $activity_type->activity_type_name }}</option>
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
                    <div class="card-header-section col-4">
                      <img class="activity-img" src="{{ $activity->thumbnail_img ? asset($activity->thumbnail_img) : asset('img/defaults/thumbnail.png') }}">
                      <div class="activity-title">{{ $activity->activity_type ? $activity->activityTypes->activity_type_name : '' }}</div>
                    </div>
                    <div class="card-header-section col-4">
                      <div class="activity-address">{{ $activity->address ? $activity->address : '' }}</div>
                    </div>
                    <!-- <div class="card-header-section col-4">
                      <div class="activity-description">{{ $activity->activity_description ? $activity->activity_description : 'activity_description' }}</div>
                    </div> -->
                    <div class="card-header-section col-4">
                      <div class="activity-distance">
                        {{ $activity->distance ? $activity->distance : 'distance' }}
                        <i class="fa fa-angle-down"></i>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <div id="activity_{{ $activity->id }}" class="collapse activity-item-body my-2">
              <div class="row border-1">
                <div class="col-3">
                  <img class="activity-detail-img" src="{{ $activity->profile_img ? $activity->profile_img : asset('img/defaults/profile.png') }}">
                </div>
                <div class="col-9">
                  <div class="row">
                    <div class="col-8">
                      <div class="row activity-detail-title">
                        {{ $activity->business_name ? $activity->business_name : 'business_name' }}
                      </div>
                      <div class="row activity-detail-age">
                        Ages {{ $activity->age_min }} to {{ $activity->age_max }}
                      </div>
                      <div class="row activity-detail-place">
                        <i class="material-icons" style="color: #a845ff">location_on</i>
                        {{ $activity->address ? $activity->address : '' }} {{ $activity->city ? $activity->city : '' }} {{ $activity->state ? $activity->state : '' }} ({{ $activity->distance }})
                      </div>
                    </div>
                    <div class="col-4">
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
                      <!-- Whistler Blackcomb Snow School is regarded as one of the best ski and snowboard schools in North America. Snow School programs offer up the best possible opportunity to improve skills and gain confidence, skip lift lines and discover the wonders of Whistler Blackcomb. We have certified and professional instructors from around the world to help you in your language, ability and style. -->
                      {{ $activity->activity_description ? $activity->activity_description : 'activity_description' }}
                    </div>
                  </div>
                </div>
              </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Styles -->
  @push('contentCss')
  
  @endpush

  <!-- Scripts -->
  @push('contentJs')
  <script type="text/javascript">
    // searchActivities();

    function searchActivities() {
      
      $.ajax({
        type: 'GET',
        url: base_url + '/activities',
        data: {
          category: $('select[name=filter-category]').val(),
        },
        success: function(data) {
          console.log('res-success: ', data);
          if (data.activities && data.activities.length > 0) {
            for (var i = 0; i < data.activities.length; i++) {
              $('#search-results').append('<div class="activity-item my-2">' + 
                '<div class="activity-item-header">' + 
                  '<a href="#activity_'+ data.activities[i].id +'" data-toggle="collapse">' + 
                    '<div class="row card-header">' + 
                      '<div class="card-header-section col-4">' + 
                        '<img class="activity-img" src="'+ (data.activities[i].thumbnail_img ? data.activities[i].thumbnail_img : base_url + 'img/defaults/thumbnail.png')+'">' + 
                        '<div class="activity-title">'+ (data.activities[i].activity_type ? data.activities[i].activity_type : '') +'</div>' + 
                      '</div>' + 
                      '<div class="card-header-section col-4">' + 
                        '<div class="activity-address">'+ (data.activities[i].address ? data.activities[i].address : '') +'</div>' + 
                      '</div>' + 
                      '<div class="card-header-section col-4">' + 
                        '<div class="activity-distance">' + (data.activities[i].distance ? data.activities[i].distance : '') +
                          '<i class="fa fa-angle-down"></i>' + 
                        '</div>' + 
                      '</div>' + 
                    '</div>' + 
                  '</a>' + 
                '</div>' + 
                '<div id="activity_'+ data.activities[i].id +'" class="collapse activity-item-body my-2">' + 
                '<div class="row border-1">' + 
                  '<div class="col-3">' + 
                    '<img class="activity-detail-img" src="'+ (data.activities[i].profile_img ? data.activities[i].profile_img : base_url + 'img/defaults/profile.png') +'">' + 
                  '</div>' + 
                  '<div class="col-9">' + 
                    '<div class="row">' + 
                      '<div class="col-8">' + 
                        '<div class="row activity-detail-title">' + (data.activities[i].business_name ? data.activities[i].business_name : '') + 
                        '</div>' + 
                        '<div class="row activity-detail-age">Ages ' + (data.activities[i].age_min ? data.activities[i].age_min : '1 month') + 'to' + (data.activities[i].age_max) + 
                        '</div>' + 
                        '<div class="row activity-detail-place">' + 
                          '<i class="material-icons" style="color: #a845ff">location_on</i>' + 
                          (data.activities[i].address ? data.activities[i].address : '') + (data.activities[i].city ? data.activities[i].city : '') + (data.activities[i].state ? data.activities[i].state : '') + '(' + (data.activities[i].distance ? data.activities[i].distance : '') + ')' + 
                        '</div>' + 
                      '</div>' + 
                      '<div class="col-4">' + 
                        '<div class="row">' + 
                          '<a href="'+ (data.activities[i].website ? data.activities[i].website : '/') + '" class="btn btn-primary btn-lg" target="_blank">Visit Site</a>' + 
                        '</div>' + 
                        '<div class="row">' + 
                          '<a class="link-detail" href="'+ base_url +'/activities/'+ data.activities[i].id +'">View Detail</a>' + 
                        '</div>' + 
                      '</div>' + 
                    '</div>' + 
                    '<div class="row">' + 
                      '<div class="col-12">' + 
                        (data.activities[i].activity_description ? data.activities[i].activity_description : '') + 
                      '</div>' + 
                    '</div>' + 
                  '</div>' + 
                '</div>' + 
                '</div>' + 
              '</div>');

            }
          } else {
            $('#search-results').html('<div class="alert alert-danger text-center">There is no matched result.</div>');
          }
        },
        error: function(err) {
          console.log('err: ', err);
        }
      });
    }
    
    $(document).on('change', 'select[name=filter-category]', function() {
      $('#search-results').empty();
      searchActivities();
    });
  </script>
  @endpush

@endsection