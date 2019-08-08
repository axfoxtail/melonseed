@extends('../layouts.app')

@section('content')

  <!-- Provider Create -->
  <section class="provider-create-container">
    <div class="container mt-3">
      <div class="row">
        <form class="banner-upload-form" id="banner-upload-form" action="{{ url('/providers') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="text" class="form-control hidden" hidden name="user_id" value="{{ Auth::user()->id }}">
          <input type="file" class="form-control hidden" hidden name="banner_img" value="">
          <div class="banner-container">
            <img class="banner-img" src="{{ $provider->banner_img ? asset($provider->banner_img) : asset('img/defaults/banners/banner_swim.jpg') }}">
            <div class="banner-overlay">
              <a class="btn btn-upload-banner"><i class="fa fa-pencil"></i></a>
            </div>
          </div>
          <div class="banner-btn-wrapper">
            
          </div>
        </form>
      </div>
      <div class="row">
        <form class="provider-create-form" id="provider-create-form">
          <input type="text" class="form-control hidden" hidden name="user_id" value="{{ Auth::user()->id }}">
          <input type="text" class="form-control hidden" hidden name="slug" value="{{ Auth::user()->slug }}">
          <div class="row mt-2 mb-3">
            <div class="col-md-8 col-sm-10 col-12">
              <div class="form-group">
                <label for="businessName h2">Provider Business Name</label>
                <input type="text" class="form-control h2" name="business_name" value="{{ $provider->business_name }}" aria-describedby="" placeholder="Backwoods Ski School">
              </div>
            </div>
          </div>
          <div class="row select-group mb-3">
            <div class="col-lg-3 col-md-4 col-sm-4 col-12 mb-2">
              <select class="selectpicker filter-category" data-live-search="false" data-style="btn btn-primary-border" name="category" title="Category">
                @foreach($categories as $category)
                <option value="{{ $category->id }}" data-tokens="{{ $category->id }}" {{ $provider->category == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4 col-12 mb-2">
              <select class="selectpicker filter-activity-type" data-live-search="true" data-style="btn btn-primary-border" name="activity_type" title="Activity Type">
                @foreach($activity_types as $activity_type)
                <option class="activity-type-option category_{{ $activity_type->category_id }}" data-tokens="{{ $activity_type->id }}" value="{{ $activity_type->id }}" {{ $provider->activity_type == $activity_type->id ? 'selected' : '' }}>{{ $activity_type->activity_type_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4 col-12 mb-2">
              <select class="selectpicker filter-location" data-live-search="true" data-style="btn btn-primary-border" name="location" title=" {{ $provider->location ? $provider->location : 'Location' }}">
                {{-- @foreach(getCityListFromIP($ip) as $location) --}}
                @foreach($locations as $location)
                  <option data-tokens="{{ $location->location_name }}" value="{{ $location->location_name }}" {{ $provider->location == $location->location_name ? 'selected' : '' }}>{{ $location->location_name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-10 col-sm-12 col-12">
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" value="{{ $provider->address }}" aria-describedby="address" placeholder="Address">
                  </div>
                </div>
                <!-- <div class="col-md-4 col-sm-4 col-4">
                  <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" class="form-control" name="state" value="{{ $provider->state ? $provider->state : getArrLocationFromIP($ip)->region_name }}" aria-describedby="state" placeholder="State">
                  </div>
                </div>
                <div class="col-md-4 col-sm-4 col-4">
                  <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" name="city" value="{{ $provider->city ? $provider->city : getArrLocationFromIP($ip)->city }}" aria-describedby="city" placeholder="City">
                  </div>
                </div>
                <div class="col-md-4 col-sm-4 col-4">
                  <div class="form-group">
                    <label for="zip_code">Zip Code</label>
                    <input type="text" class="form-control" name="zip_code" value="{{ $provider->zip_code ? $provider->zip_code : getArrLocationFromIP($ip)->zip }}" aria-describedby="zip_code" placeholder="Zip Code">
                  </div>
                </div> -->
              </div>
              <div class="row">
                <div class="col-md-7 col-sm-12 col-12">
                  <div class="form-group">
                    <label for="phoneNumber">Contact Info</label>
                    <input type="text" class="form-control" name="phone_number" value="{{ $provider->phone_number }}" aria-describedby="phoneNumber" placeholder="Company Phone Number(###) ### - ####">
                  </div>
                  <div class="form-group">
                    <label for="website">Website</label>
                    <input type="text" class="form-control" name="website" value="{{ $provider->website }}" aria-describedby="website" placeholder="https://www.yoursite.com">
                  </div>
                </div>
                <div class="col-md-5 col-sm-12 col-12">
                  <h3 class="card-title">Age Range</h3>
                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-6 pr-0">
                      <div class="custom-control custom-checkbox mb-4">
                        <input type="checkbox" class="custom-control-input age-checkbox" id="age1" name="age1" value="age1" {{ checkAvailableAge($provider->age_range, 'age1') ? 'checked' : '' }}>
                        <label class="custom-control-label available-age-label" style="font-size: 22px;" for="age1">1 Year</label>
                      </div>
                      <div class="custom-control custom-checkbox mb-4">
                        <input type="checkbox" class="custom-control-input age-checkbox" id="age3" name="age3" value="age3" {{ checkAvailableAge($provider->age_range, 'age3') ? 'checked' : '' }}>
                        <label class="custom-control-label available-age-label" style="font-size: 22px;" for="age3">4-7 Years</label>
                      </div>
                      <div class="custom-control custom-checkbox mb-4">
                        <input type="checkbox" class="custom-control-input age-checkbox" id="age5" name="age5" value="age5" {{ checkAvailableAge($provider->age_range, 'age5') ? 'checked' : '' }}>
                        <label class="custom-control-label available-age-label" style="font-size: 22px;" for="age5">11-13 Years</label>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-6 pr-0">
                      <div class="custom-control custom-checkbox mb-4">
                        <input type="checkbox" class="custom-control-input age-checkbox" id="age2" name="age2" value="age2" {{ checkAvailableAge($provider->age_range, 'age2') ? 'checked' : '' }}>
                        <label class="custom-control-label available-age-label" style="font-size: 22px;" for="age2">1-3 Years</label>
                      </div>
                      <div class="custom-control custom-checkbox mb-4">
                        <input type="checkbox" class="custom-control-input age-checkbox" id="age4" name="age4" value="age4" {{ checkAvailableAge($provider->age_range, 'age4') ? 'checked' : '' }}>
                        <label class="custom-control-label available-age-label" style="font-size: 22px;" for="age4">8-10 Years</label>
                      </div>
                      <div class="custom-control custom-checkbox mb-4">
                        <input type="checkbox" class="custom-control-input age-checkbox" id="age6" name="age6" value="age6" {{ checkAvailableAge($provider->age_range, 'age6') ? 'checked' : '' }}>
                        <label class="custom-control-label available-age-label" style="font-size: 22px;" for="age6">14-16 Years</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-10 col-sm-12 col-12">
                  <label for="activityDescription">Activity Description</label>
                  <textarea class="form-control" name="activity_description" rows="7" placeholder="Write a description of your activity, under 500 words">{{ $provider->activity_description }}</textarea>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-log-8 col-md-10 col-sm-12 col-12">
                  <label for="photos">Upload Images</label>
                  <!-- <div class="upload-gird-wrapper"> -->
                    <!-- <div class="upload-item">
                      <div class="plus-item-group">
                        <div class="plus-icon">+</div>
                        <div class="plus-text">Add Photo</div>
                      </div>
                    </div> -->
                  <!-- </div> -->
                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-12 mb-3">
                      <label style="font-size: 17px;">Thumbnail Image</label>
                      <input type="file" class="hidden" hidden name="thumbnail_img">
                      <div class="thumbnail-img-wrapper">
                        <img class="thumbnail-img" src="{{ $provider->thumbnail_img ? asset($provider->thumbnail_img) : asset('img/defaults/thumbnail.png') }}">
                        <div class="btn-thumbnail btn-hover {{ $provider->thumbnail_img ? 'remove' : 'upload' }}">
                          <div class="btn-overlay"></div>
                          <div class="img-btn-txt">{{ $provider->thumbnail_img ? 'Remove' : '+Add' }}
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-12">
                      <label style="font-size: 17px;">Profile Image</label>
                      <input type="file" class="hidden" hidden name="profile_img">
                      <div class="profile-img-wrapper">
                        <img class="profile-img" src="{{ $provider->profile_img ? asset($provider->profile_img) : asset('img/defaults/profile.png') }}">
                        <div class="btn-profile btn-hover {{ $provider->profile_img ? 'remove' : 'upload' }}">
                          <div class="btn-overlay"></div>
                          <div class="img-btn-txt">{{ $provider->profile_img ? 'Remove' : '+Add' }}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row my-5">
                <h3 class="ml-3">Schedule - Pattern</h3>
                <div class="col-lg-10 col-md-12 col-sm-12 col-12 schedule-pattern-row my-2">
                  <div class="col-md-3 col-sm-3 col-12">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input available-day" id="monday" name="monday" value="1" {{ ($provider->business_hours && getAvailableDayObj($provider->business_hours, 'monday')->available) ? 'checked' : '' }}>
                      <label class="custom-control-label" for="monday">Monday</label>
                    </div>
                  </div>
                  <div class="col-md-9 col-sm-9 col-12 d-inline-flex">
                    <div class="col-md-6 col-sm-6 col-6 form-inline">
                      <label style="font-size: 20px;">Start time</label>
                      <input class="form-control available-time ml-2" type="time" name="monday_start" value="{{ ($provider->business_hours && getAvailableDayObj($provider->business_hours, 'monday')->start) ? getAvailableDayObj($provider->business_hours, 'monday')->start : '10:00' }}">
                    </div>
                    <div class="col-md-6 col-sm-6 col-6 form-inline">
                      <label style="font-size: 20px;">End time</label>
                      <input class="form-control available-time ml-2" type="time" name="monday_end" value="{{ ($provider->business_hours && getAvailableDayObj($provider->business_hours, 'monday')->end) ? getAvailableDayObj($provider->business_hours, 'monday')->end : '17:00' }}">
                    </div>
                  </div>
                </div>
                <div class="col-lg-10 col-md-12 col-sm-12 col-12 schedule-pattern-row my-2">
                  <div class="col-md-3 col-sm-3 col-12">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input available-day" id="tuesday" name="tuesday" value="1" {{ ($provider->business_hours && getAvailableDayObj($provider->business_hours, 'tuesday')->available) ? 'checked' : '' }}>
                      <label class="custom-control-label" for="tuesday">Tuesday</label>
                    </div>
                  </div>
                  <div class="col-md-9 col-sm-9 col-12 d-inline-flex">
                    <div class="col-md-6 col-sm-6 col-6 form-inline">
                      <label style="font-size: 20px;">Start time</label>
                      <input class="form-control available-time ml-2" type="time" name="tuesday_start" value="{{ ($provider->business_hours && getAvailableDayObj($provider->business_hours, 'tuesday')->start) ? getAvailableDayObj($provider->business_hours, 'tuesday')->start : '10:00' }}">
                    </div>
                    <div class="col-md-6 col-sm-6 col-6 form-inline">
                      <label style="font-size: 20px;">End time</label>
                      <input class="form-control available-time ml-2" type="time" name="tuesday_end" value="{{ ($provider->business_hours && getAvailableDayObj($provider->business_hours, 'tuesday')->end) ? getAvailableDayObj($provider->business_hours, 'tuesday')->end : '17:00' }}">
                    </div>
                  </div>
                </div>
                <div class="col-lg-10 col-md-12 col-sm-12 col-12 schedule-pattern-row my-2">
                  <div class="col-md-3 col-sm-3 col-12">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input available-day" id="wednesday" name="wednesday" value="1" {{ ($provider->business_hours && getAvailableDayObj($provider->business_hours, 'wednesday')->available) ? 'checked' : '' }}>
                      <label class="custom-control-label" for="wednesday">Wednesday</label>
                    </div>
                  </div>
                  <div class="col-md-9 col-sm-9 col-12 d-inline-flex">
                    <div class="col-md-6 col-sm-6 col-6 form-inline">
                      <label style="font-size: 20px;">Start time</label>
                      <input class="form-control available-time ml-2" type="time" name="wednesday_start" value="{{ ($provider->business_hours && getAvailableDayObj($provider->business_hours, 'wednesday')->start) ? getAvailableDayObj($provider->business_hours, 'wednesday')->start : '10:00' }}">
                    </div>
                    <div class="col-md-6 col-sm-6 col-6 form-inline">
                      <label style="font-size: 20px;">End time</label>
                      <input class="form-control available-time ml-2" type="time" name="wednesday_end" value="{{ ($provider->business_hours && getAvailableDayObj($provider->business_hours, 'wednesday')->end) ? getAvailableDayObj($provider->business_hours, 'wednesday')->end : '17:00' }}">
                    </div>
                  </div>
                </div>
                <div class="col-lg-10 col-md-12 col-sm-12 col-12 schedule-pattern-row my-2">
                  <div class="col-md-3 col-sm-3 col-12">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input available-day" id="thursday" name="thursday" value="1" {{ ($provider->business_hours && getAvailableDayObj($provider->business_hours, 'thursday')->available) ? 'checked' : '' }}>
                      <label class="custom-control-label" for="thursday">Thursday</label>
                    </div>
                  </div>
                  <div class="col-md-9 col-sm-9 col-12 d-inline-flex">
                    <div class="col-md-6 col-sm-6 col-6 form-inline">
                      <label style="font-size: 20px;">Start time</label>
                      <input class="form-control available-time ml-2" type="time" name="thursday_start" value="{{ ($provider->business_hours && getAvailableDayObj($provider->business_hours, 'thursday')->start) ? getAvailableDayObj($provider->business_hours, 'thursday')->start : '10:00' }}">
                    </div>
                    <div class="col-md-6 col-sm-6 col-6 form-inline">
                      <label style="font-size: 20px;">End time</label>
                      <input class="form-control available-time ml-2" type="time" name="thursday_end" value="{{ ($provider->business_hours && getAvailableDayObj($provider->business_hours, 'thursday')->end) ? getAvailableDayObj($provider->business_hours, 'thursday')->end : '17:00' }}">
                    </div>
                  </div>
                </div>
                <div class="col-lg-10 col-md-12 col-sm-12 col-12 schedule-pattern-row my-2">
                  <div class="col-md-3 col-sm-3 col-12">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input available-day" id="friday" name="friday" value="1" {{ ($provider->business_hours && getAvailableDayObj($provider->business_hours, 'friday')->available) ? 'checked' : '' }}>
                      <label class="custom-control-label" for="friday">Friday</label>
                    </div>
                  </div>
                  <div class="col-md-9 col-sm-9 col-12 d-inline-flex">
                    <div class="col-md-6 col-sm-6 col-6 form-inline">
                      <label style="font-size: 20px;">Start time</label>
                      <input class="form-control available-time ml-2" type="time" name="friday_start" value="{{ ($provider->business_hours && getAvailableDayObj($provider->business_hours, 'friday')->start) ? getAvailableDayObj($provider->business_hours, 'friday')->start : '10:00' }}">
                    </div>
                    <div class="col-md-6 col-sm-6 col-6 form-inline">
                      <label style="font-size: 20px;">End time</label>
                      <input class="form-control available-time ml-2" type="time" name="friday_end" value="{{ ($provider->business_hours && getAvailableDayObj($provider->business_hours, 'friday')->end) ? getAvailableDayObj($provider->business_hours, 'friday')->end : '17:00' }}">
                    </div>
                  </div>
                </div>
                <div class="col-lg-10 col-md-12 col-sm-12 col-12 schedule-pattern-row my-2">
                  <div class="col-md-3 col-sm-3 col-12">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input available-day" id="saturday" name="saturday" value="1" {{ ($provider->business_hours && getAvailableDayObj($provider->business_hours, 'saturday')->available) ? 'checked' : '' }}>
                      <label class="custom-control-label" for="saturday">Saturday</label>
                    </div>
                  </div>
                  <div class="col-md-9 col-sm-9 col-12 d-inline-flex">
                    <div class="col-md-6 col-sm-6 col-6 form-inline">
                      <label style="font-size: 20px;">Start time</label>
                      <input class="form-control available-time ml-2" type="time" name="saturday_start" value="{{ ($provider->business_hours && getAvailableDayObj($provider->business_hours, 'saturday')->start) ? getAvailableDayObj($provider->business_hours, 'saturday')->start : '10:00' }}">
                    </div>
                    <div class="col-md-6 col-sm-6 col-6 form-inline">
                      <label style="font-size: 20px;">End time</label>
                      <input class="form-control available-time ml-2" type="time" name="saturday_end" value="{{ ($provider->business_hours && getAvailableDayObj($provider->business_hours, 'saturday')->end) ? getAvailableDayObj($provider->business_hours, 'saturday')->end : '17:00' }}">
                    </div>
                  </div>
                </div>
                <div class="col-lg-10 col-md-12 col-sm-12 col-12 schedule-pattern-row my-2">
                  <div class="col-md-3 col-sm-3 col-12">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input available-day" id="sunday" name="sunday" value="1" {{ ($provider->business_hours && getAvailableDayObj($provider->business_hours, 'sunday')->available) ? 'checked' : '' }}>
                      <label class="custom-control-label" for="sunday">Sunday</label>
                    </div>
                  </div>
                  <div class="col-md-9 col-sm-9 col-12 d-inline-flex">
                    <div class="col-md-6 col-sm-6 col-6 form-inline">
                      <label style="font-size: 20px;">Start time</label>
                      <input class="form-control available-time ml-2" type="time" name="sunday_start" value="{{ ($provider->business_hours && getAvailableDayObj($provider->business_hours, 'sunday')->start) ? getAvailableDayObj($provider->business_hours, 'sunday')->start : '10:00' }}">
                    </div>
                    <div class="col-md-6 col-sm-6 col-6 form-inline">
                      <label style="font-size: 20px;">End time</label>
                      <input class="form-control available-time ml-2" type="time" name="sunday_end" value="{{ ($provider->business_hours && getAvailableDayObj($provider->business_hours, 'sunday')->end) ? getAvailableDayObj($provider->business_hours, 'sunday')->end : '17:00' }}">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 col-sm-10 col-12">
                  <div class="form-group">
                    <label for="socialMediaLinks">Social Media Links</label>
                    <input type="text" class="form-control" name="social_media_links" value="{{ $provider->social_media_links }}" aria-describedby="socialMediaLinks" placeholder="Add your Social tag(/{{ config('app.name') ? config('app.name') : 'melonseed' }})">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 col-sm-10 col-12">
                  <div class="form-group">
                    <input type="button" class="btn btn-primary btn-lg btn-submit-provider-form" value="{{ $provider->business_name ? 'Update' : 'Save' }}" style="color: #fff !important;">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
        
      </div>
    </div>
  </section>

  <!-- Styles -->
  @push('contentCss')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.10/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="{{ asset('css/front/provider-create.css') }}" rel="stylesheet">
  @endpush

  <!-- Scripts -->
  @push('contentJs')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.10/js/bootstrap-select.min.js"></script>
  <script type="text/javascript">
    $('.btn-upload-banner').on('click', function() {
      $('input[name=banner_img]').click();
    });

    $('input[name=banner_img]').on('change', function(e) {
      var old_banner = $('.banner-img')[0].src;
      var banner_file = e.target.files[0];

      if (banner_file) {
        var reader = new FileReader();
        reader.onload = function(event) {
          $('.banner-img')[0].src=event.target.result;
        }
        reader.readAsDataURL(banner_file);
        $('.banner-btn-wrapper').html('<a class="btn btn-md btn-accent btn-banner-save mr-1">Save</a>' + 
            '<a class="btn btn-md btn-primary btn-banner-cancel">Revert</a>');
      }

      $(document).on('click', '.btn-banner-cancel', function() {
        $('.banner-img')[0].src = old_banner;
        $('.banner-btn-wrapper').empty();
      });

      $(document).on('click', '.btn-banner-save', function() {
        $('.banner-btn-wrapper').empty();
        $('#banner-upload-form').submit();
      });
    });

    $(document).on('click', '.btn-thumbnail', function() {
      if ($(this).hasClass('upload')) {
        $('input[name=thumbnail_img]').click();
      }
      if ($(this).hasClass('remove')) {
        $('input[name=thumbnail_img]').val('');
        $('.thumbnail-img')[0].src = base_url + "/img/defaults/thumbnail.png";
        $(this).removeClass('remove')
              .addClass('upload')
              .find('.img-btn-txt').text('+Add');
      }

    });

    $(document).on('change', 'input[name=thumbnail_img]', function(e) {
      var thumbnail_img = e.target.files[0];

      if (thumbnail_img) {
        var reader = new FileReader();
        reader.onload = function(event) {
          $('.thumbnail-img')[0].src = event.target.result;
        }
        reader.readAsDataURL(thumbnail_img);
      }
      $('.btn-thumbnail').removeClass('upload')
                      .addClass('remove')
                      .find('.img-btn-txt').text('Remove');
    });

    $(document).on('click', '.btn-profile', function() {
      if ($(this).hasClass('upload')) {
        $('input[name=profile_img').click();
      }
      if ($(this).hasClass('remove')) {
        $('input[name=profile_img]').val('');
        $('.profile-img')[0].src = base_url + "/img/defaults/profile.png";
        $(this).removeClass('remove')
              .addClass('upload')
              .find('.img-btn-txt').text('+Add');
      }
    });

    $(document).on('change', 'input[name=profile_img]', function(e) {
      var profile_img = e.target.files[0];

      if (profile_img) {
        var reader = new FileReader();
        reader.onload = function(event) {
          $('.profile-img')[0].src = event.target.result;
        }
        reader.readAsDataURL(profile_img);
      }
      $('.btn-profile').removeClass('upload')
                      .addClass('remove')
                      .find('.img-btn-txt').text('Remove');
    });

  </script>

  <script type="text/javascript">
    $(function() {
      checkAvailableDays();
    });

    function checkAvailableDays() {
      if ($('input[name=monday]')[0].checked) {
        $('input[name=monday_start]')[0].removeAttribute('disabled');
        $('input[name=monday_end]')[0].removeAttribute('disabled');
      } else {
        $('input[name=monday_start]').attr('disabled', 'true');
        $('input[name=monday_end]').attr('disabled', 'true');
      }

      if ($('input[name=tuesday]')[0].checked) {
        $('input[name=tuesday_start]')[0].removeAttribute('disabled');
        $('input[name=tuesday_end]')[0].removeAttribute('disabled');
      } else {
        $('input[name=tuesday_start]').attr('disabled', 'true');
        $('input[name=tuesday_end]').attr('disabled', 'true');
      }

      if ($('input[name=wednesday]')[0].checked) {
        $('input[name=wednesday_start]')[0].removeAttribute('disabled');
        $('input[name=wednesday_end]')[0].removeAttribute('disabled');
      } else {
        $('input[name=wednesday_start]').attr('disabled', 'true');
        $('input[name=wednesday_end]').attr('disabled', 'true');
      }

      if ($('input[name=thursday]')[0].checked) {
        $('input[name=thursday_start]')[0].removeAttribute('disabled');
        $('input[name=thursday_end]')[0].removeAttribute('disabled');
      } else {
        $('input[name=thursday_start]').attr('disabled', 'true');
        $('input[name=thursday_end]').attr('disabled', 'true');
      }

      if ($('input[name=friday]')[0].checked) {
        $('input[name=friday_start]')[0].removeAttribute('disabled');
        $('input[name=friday_end]')[0].removeAttribute('disabled');
      } else {
        $('input[name=friday_start]').attr('disabled', 'true');
        $('input[name=friday_end]').attr('disabled', 'true');
      }

      if ($('input[name=saturday]')[0].checked) {
        $('input[name=saturday_start]')[0].removeAttribute('disabled');
        $('input[name=saturday_end]')[0].removeAttribute('disabled');
      } else {
        $('input[name=saturday_start]').attr('disabled', 'true');
        $('input[name=saturday_end]').attr('disabled', 'true');
      }

      if ($('input[name=sunday]')[0].checked) {
        $('input[name=sunday_start]')[0].removeAttribute('disabled');
        $('input[name=sunday_end]')[0].removeAttribute('disabled');
      } else {
        $('input[name=sunday_start]').attr('disabled', 'true');
        $('input[name=sunday_end]').attr('disabled', 'true');
      }
    }

    $(document).on('change', '.available-day', function() {
      checkAvailableDays();
    });

  </script>

  <script type="text/javascript">
    function getBusinessHoursJsonString() {
      var business_hours = {
        monday: {
          available: $('input[name=monday]')[0].checked, 
          start: $('input[name=monday_start]').val(), 
          end: $('input[name=monday_end]').val()
        }, 
        tuesday: {
          available: $('input[name=tuesday]')[0].checked, 
          start: $('input[name=tuesday_start]').val(), 
          end: $('input[name=tuesday_end]').val()
        }, 
        wednesday: {
          available: $('input[name=wednesday]')[0].checked, 
          start: $('input[name=wednesday_start]').val(), 
          end: $('input[name=wednesday_end]').val()
        }, 
        thursday: {
          available: $('input[name=thursday]')[0].checked, 
          start: $('input[name=thursday_start]').val(), 
          end: $('input[name=thursday_end]').val()
        }, 
        friday: {
          available: $('input[name=friday]')[0].checked, 
          start: $('input[name=friday_start]').val(), 
          end: $('input[name=friday_end]').val()
        }, 
        saturday: {
          available: $('input[name=saturday]')[0].checked, 
          start: $('input[name=saturday_start]').val(), 
          end: $('input[name=saturday_end]').val()
        }, 
        sunday: {
          available: $('input[name=sunday]')[0].checked, 
          start: $('input[name=sunday_start]').val(), 
          end: $('input[name=sunday_end]').val()
        }
      };

      return JSON.stringify(business_hours);
    }

    function getAvailableAgeRange() {
      var ages = $('.age-checkbox');
      var range_string = '';
      for (var i = 0; i < ages.length; i++) {
        if (ages[i].checked) {
          range_string += ', ' + ages[i].value;
        }
      }
      return range_string;
    }

    $(document).on('click', '.btn-submit-provider-form', function() {
      var fd = new FormData();
      fd.append('user_id', $('input[name=user_id]').val());
      fd.append('business_name', $('input[name=business_name]').val());
      fd.append('category', $('select[name=category]').val());
      fd.append('activity_type', $('select[name=activity_type]').val());
      fd.append('location', $('select[name=location]').val());
      // fd.append('distance', $('input[name=distance]').val());
      fd.append('address', $('input[name=address]').val());
      // fd.append('state', $('input[name=state]').val());
      // fd.append('city', $('input[name=city]').val());
      // fd.append('zip_code', $('input[name=zip_code]').val());
      fd.append('phone_number', $('input[name=phone_number]').val());
      fd.append('website', $('input[name=website]').val());
      fd.append('age_range', getAvailableAgeRange());
      fd.append('activity_description', $('textarea[name=activity_description]').val());
      fd.append('social_media_links', $('input[name=social_media_links]').val());
      fd.append('thumbnail_img', $('input[name=thumbnail_img]')[0].files[0]);
      fd.append('profile_img', $('input[name=profile_img]')[0].files[0]);
      fd.append('business_hours', getBusinessHoursJsonString());
      fd.append('slug', $('input[name=slug]').val());

      $.LoadingOverlay("show");
      $.ajax({
        type: 'POST',
        url: base_url + '/providers',
        data: fd,
        processData: false,
        contentType: false,
        success: function(data) {
          // console.log('res-success: ', data);
          $.LoadingOverlay("hide");
          if (data.status) {
            toastr.success(data.message);
            $('input[name=address]').val(data.formatted_address);
          } else {
            if (data.errors.business_name) {
              for (var i = 0; i < data.errors.business_name.length; i++) {
                toastr.error(data.errors.business_name[i]);
              }
            }
            if (data.errors.category) {
              for (var i = 0; i < data.errors.category.length; i++) {
                toastr.error(data.errors.category[i]);
              }
            }
            if (data.errors.activity_type) {
              for (var i = 0; i < data.errors.activity_type.length; i++) {
                toastr.error(data.errors.activity_type[i]);
              }
            }
            if (data.errors.location) {
              for (var i = 0; i < data.errors.location.length; i++) {
                toastr.error(data.errors.location[i]);
              }
            }
            if (data.errors.address) {
              for (var i = 0; i < data.errors.address.length; i++) {
                toastr.error(data.errors.address[i]);
              }
            }
            if (data.errors.phone_number) {
              for (var i = 0; i < data.errors.phone_number.length; i++) {
                toastr.error(data.errors.phone_number[i]);
              }
            }
            if (data.errors.website) {
              for (var i = 0; i < data.errors.website.length; i++) {
                toastr.error(data.errors.website[i]);
              }
            }
            if (data.errors.age_range) {
              for (var i = 0; i < data.errors.age_range.length; i++) {
                toastr.error(data.errors.age_range[i]);
              }
            }
            if (data.errors.activity_description) {
              for (var i = 0; i < data.errors.activity_description.length; i++) {
                toastr.error(data.errors.activity_description[i]);
              }
            }
            if (data.errors.thumbnail_img) {
              for (var i = 0; i < data.errors.thumbnail_img.length; i++) {
                toastr.error(data.errors.thumbnail_img[i]);
              }
            }
            if (data.errors.profile_img) {
              for (var i = 0; i < data.errors.profile_img.length; i++) {
                toastr.error(data.errors.profile_img[i]);
              }
            }
          }

        },
        error: function(err) {
          $.LoadingOverlay("hide");
          console.log('err: ', err);
        }
      });
    });
  </script>
  @endpush

@endsection