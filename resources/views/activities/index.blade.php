@extends('../layouts.app')

@section('content')

  <!-- Image Showcases -->
  <section class="activities-container my-5">
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
              <h3 class="card-title mt-4">Cost</h3>
              <div class="row">
                <div class="custom-control filter-range">
                  <input type="range" name="filter-distance" class="filter-distance" id="filter-distance">
                  <span class="filter-range-min">$</span>
                  <span class="filter-range-max">$$$</span>
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
              <select class="selectpicker filter-category" data-live-search="true" data-style="btn btn-primary-border" name="filter-category" id="filter-category" title="Category">
                <option data-tokens="ketchup mustard">Education</option>
                <option data-tokens="mustard">Course</option>
                <option data-tokens="frosting">Presentation</option>
              </select>
            </div>
            <div class="col-lg-4 col-md-4, col-sm-4, col-xs-12">
              <select class="selectpicker filter-activity-type" data-live-search="true" name="filter-activiti-type" id="filter-activity-type" data-style="btn btn-primary-border" title="Activity Type">
                <option data-tokens="ketchup mustard">Computer</option>
                <option data-tokens="mustard">Sports</option>
                <option data-tokens="frosting">Musics</option>
              </select>
            </div>
          </div>
          <div class="filter-result-body">
            @for ($i = 0; $i < 10; $i++)
            <div class="activity-item my-2">
              <div class="activity-item-header">
                <a href="#activity_{{ $i }}" data-toggle="collapse">
                  <div class="row card-header">
                    <div class="col-3">
                      <img class="activity-img" src="{{ asset('img/Swimming Lesson.jpg') }}">
                      <div class="activity-title">Swim Lesson</div>
                    </div>
                    <div class="col-3">
                      <div class="activity-address">381 King Street</div>
                    </div>
                    <div class="col-3">
                      <div class="activity-description">Introduce Exercise</div>
                    </div>
                    <div class="col-3">
                      <div class="activity-distance">
                        4.8km
                        <i class="fa fa-angle-down"></i>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <div id="activity_{{ $i }}" class="collapse activity-item-body my-2">
              <div class="row border-1">
                <div class="col-3">
                  <img class="activity-detail-img" src="{{ asset('img/Swimming Lesson.jpg') }}">
                </div>
                <div class="col-9">
                  <div class="row">
                    <div class="col-8">
                      <div class="row activity-detail-title">
                        Backwoods Ski School
                      </div>
                      <div class="row activity-detail-age">
                        Ages 14+
                      </div>
                      <div class="row activity-detail-place">
                        Blue Mountain Ski Resort (4.8km)
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="row">
                        <a href="" class="btn btn-primary btn-lg">Visit Site</a>
                      </div>
                      <div class="row activity-status">
                          Now Enrolling                         
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      Whistler Blackcomb Snow School is regarded as one of the best ski and snowboard schools in North America. Snow School programs offer up the best possible opportunity to improve skills and gain confidence, skip lift lines and discover the wonders of Whistler Blackcomb. We have certified and professional instructors from around the world to help you in your language, ability and style.
                    </div>
                    </div>
                </div>
              </div>
              </div>
            </div>
            @endfor
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Styles -->
  @push('contentCss')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.10/css/bootstrap-select.min.css">
  @endpush

  <!-- Scripts -->
  @push('contentJs')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.10/js/bootstrap-select.min.js"></script>
  @endpush

@endsection