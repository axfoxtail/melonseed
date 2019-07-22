@extends('../layouts.app')

@section('content')

  <!-- Provider Create -->
  <section class="provider-create-container my-5">
    <div class="container">
      <div class="row">
        <form class="banner-upload-form" id="banner-upload-form" action="{{ url('/providers') }}" method="POST" enctype="multipart/form-data">
          @csrf
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
        <form class="provider-create-form" action="{{ url('/providers') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="text" class="form-control hidden" hidden name="user_id" value="{{ Auth::user()->id }}">
          <input type="text" class="form-control hidden" hidden name="slug" value="{{ Auth::user()->slug }}">
          <div class="row mt-2 mb-5">
            <div class="col-8">
              <div class="form-group">
                <label for="businessName h2">Provider Business Name</label>
                <input type="text" class="form-control h2" name="business_name" value="{{ $provider->business_name }}" aria-describedby="" placeholder="Backwoods Ski School">
              </div>
            </div>
          </div>
          <div class="row select-group mb-5">
            <div class="col-3">
              <select class="selectpicker filter-category" data-live-search="false" data-style="btn btn-primary-border" name="category" title="Category">
                @foreach($categories as $category)
                <option value="{{ $category->id }}" data-tokens="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-3">
              <select class="selectpicker filter-activity-type" data-live-search="true" data-style="btn btn-primary-border" name="activity_type" title="Activity Type">
                @foreach($activity_types as $activity_type)
                <option class="activity-type-option category_{{ $activity_type->category_id }}" data-tokens="{{ $activity_type->id }}" value="{{ $activity_type->id }}">{{ $activity_type->activity_type_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-3">
              <select class="selectpicker filter-location" data-live-search="true" data-style="btn btn-primary-border" name="location" title="Location">
                <option data-tokens="ketchup mustard">Education</option>
                <option data-tokens="mustard">Course</option>
                <option data-tokens="frosting">Presentation</option>
              </select>
            </div>
            <div class="col-3">
              <select class="selectpicker filter-distance" data-live-search="true" data-style="btn btn-primary-border" name="distance" title="Distance">
                <option data-tokens="ketchup mustard">Education</option>
                <option data-tokens="mustard">Course</option>
                <option data-tokens="frosting">Presentation</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" value="{{ $provider->address }}" aria-describedby="address" placeholder="Address">
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" class="form-control" name="state" value="{{ $provider->state }}" aria-describedby="state" placeholder="State">
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" name="city" value="{{ $provider->city }}" aria-describedby="city" placeholder="City">
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label for="zip_code">Zip Code</label>
                    <input type="text" class="form-control" name="zip_code" value="{{ $provider->zip_code }}" aria-describedby="zip_code" placeholder="Zip Code">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-8">
                  <div class="form-group">
                    <label for="phoneNumber">Contact Info</label>
                    <input type="text" class="form-control" name="phone_number" value="{{ $provider->phone_number }}" aria-describedby="phoneNumber" placeholder="Company Phone Number(###) ### - ####">
                  </div>
                  <div class="form-group">
                    <label for="website">Website</label>
                    <input type="text" class="form-control" name="website" value="{{ $provider->website }}" aria-describedby="website" placeholder="https://www.yoursite.com">
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label for="age">Min Age</label>
                    <select class="selectpicker filter-category" data-live-search="true" data-style="btn btn-primary-border btn-age" name="age_min" value="{{ $provider->age_min }}" title="Min Age">
                      <option value="1 month" data-tokens="1 month" {{$provider->age_min == '1month' ? 'selected' : '' }}>1 Month</option>
                      <option value="6 months" data-tokens="6 months" {{$provider->age_min == '6months' ? 'selected' : '' }}>6 Months</option>
                      @for($age_i = 1; $age_i < 19; $age_i++)
                      <option value="{{$age_i}} {{ $age_i == 1 ? 'Year' : 'Years' }}" data-tokens="{{$age_i}} {{ $age_i == 1 ? 'Year' : 'Years' }}" {{$provider->age_min == ($age_i . ($age_i == 1 ? ' Year' : ' Years')) ? 'selected' : '' }}>{{ $age_i }} {{ $age_i == 1 ? 'Year' : 'Years' }}</option>
                      @endfor
                      <option value="18+ Years" data-tokens="18+ Years" {{$provider->age_min == '18+ Years' ? 'selected' : '' }}>18+ Years</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="age">Max Age</label>
                    <select class="selectpicker filter-category" data-live-search="true" data-style="btn btn-primary-border btn-age" name="age_max" value="{{ $provider->age_max }}" title="Max Age">
                      <option value="1 month" data-tokens="1 month" {{$provider->age_max == '1 month' ? 'selected' : '' }}>1 Month</option>
                      <option value="6 months" data-tokens="6 months" {{$provider->age_max == '6 months' ? 'selected' : '' }}>6 Months</option>
                      @for($age_i = 1; $age_i < 19; $age_i++)
                      <option value="{{$age_i}} {{ $age_i == 1 ? 'Year' : 'Years' }}" data-tokens="{{$age_i}} {{ $age_i == 1 ? 'Year' : 'Years' }}" {{$provider->age_max == ($age_i . ($age_i == 1 ? ' Year' : ' Years')) ? 'selected' : '' }}>{{ $age_i }} {{ $age_i == 1 ? 'Year' : 'Years' }}</option>
                      @endfor
                      <option value="18+ Year" data-tokens="18+ Years" {{$provider->age_max == '18+ Years' ? 'selected' : '' }}>18+ Year</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-12">
                  <label for="activityDescription">Activity Description</label>
                  <textarea class="form-control" name="activity_description" rows="7" placeholder="Write a description of your activity, under 500 words">{{ $provider->activity_description }}</textarea>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-12">
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
                    <div class="col-6">
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
                    <div class="col-6">
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
              <div class="row">
                <div class="col-8">
                  <div class="form-group">
                    <label for="socialMediaLinks">Social Media Links</label>
                    <input type="text" class="form-control" name="social_media_links" value="{{ $provider->social_media_links }}" aria-describedby="socialMediaLinks" placeholder="Add your Social tag(/{{ config('app.name') ? config('app.name') : 'melonseed' }})">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-8">
                  <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-lg" value="{{ $provider->business_name ? 'Update' : 'Save' }}" style="color: #fff !important;">
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
  @endpush

@endsection