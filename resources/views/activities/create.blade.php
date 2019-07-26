@extends('../layouts.app')

@section('content')

  <!-- Provider Create -->
<!--   <section class="provider-create-container bg-white my-5">
    <div class="container">
      <div class="row mb-4">
        <img class="banner-img" src="{{ asset('assets/img/bg-masthead.jpg') }}">
      </div>
      <div class="row">
        <form class="provider-create-form">
          <h2>Backwoods Ski School</h2>
          <div class="row select-group my-5">
            <div class="col-3">
              <select class="selectpicker filter-category" data-live-search="true" data-style="btn btn-primary-border" name="location" id="location" title="Location">
                <option data-tokens="ketchup mustard">Education</option>
                <option data-tokens="mustard">Course</option>
                <option data-tokens="frosting">Presentation</option>
              </select>
            </div>
            <div class="col-3">
              <select class="selectpicker filter-category" data-live-search="true" data-style="btn btn-primary-border" name="category" id="category" title="Category">
                <option data-tokens="ketchup mustard">Education</option>
                <option data-tokens="mustard">Course</option>
                <option data-tokens="frosting">Presentation</option>
              </select>
            </div>
            <div class="col-3">
              <select class="selectpicker filter-category" data-live-search="true" data-style="btn btn-primary-border" name="activity-type" id="activity-type" title="Activity Type">
                <option data-tokens="ketchup mustard">Education</option>
                <option data-tokens="mustard">Course</option>
                <option data-tokens="frosting">Presentation</option>
              </select>
            </div>
            <div class="col-3">
              <select class="selectpicker filter-category" data-live-search="true" data-style="btn btn-primary-border" name="distance" id="distance" title="Distance">
                <option data-tokens="ketchup mustard">Education</option>
                <option data-tokens="mustard">Course</option>
                <option data-tokens="frosting">Presentation</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="row">
                <div class="col-8">
                  <div class="form-group">
                  <label for="phone">Contact Info</label>
                  <input type="text" class="form-control" id="phone" aria-describedby="phoneHelp" placeholder="Company Phone Number(###)###-####">
                  </div>
                  <div class="form-group">
                  <label for="website">Website</label>
                  <input type="email" class="form-control" id="website" aria-describedby="websiteHelp" placeholder="https://www.yoursite.com">
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                  <label for="availability">Availability</label>
                  <!-- <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"> -->
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-12">
                <label for="description">Activity Description</label>
                <textarea class="form-control" id="description" rows="7">
                </textarea>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-12">
                <label for="upload">Upload Images</label>
                <div class="upload-gird-wrapper">
                  @for($i = 0; $i < 12; $i++)
                    <div class="upload-item">
                      <div class="plus-item-group">
                        <div class="plus-icon">+</div>
                        <div class="plus-text">Add Photo</div>
                      </div>
                    </div>
                  @endfor
                </div>
                </div>
              </div>
              <div class="row">
                <div class="col-8">
                  <div class="form-group">
                  <label for="socialMediaLinks">Social Media Links</label>
                  <input type="email" class="form-control" id="socialMediaLinks" aria-describedby="socialMediaLinks" placeholder="Add your social tag(/simax)">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
        
      </div>
    </div>
  </section> -->

  <!-- Styles -->
  @push('contentCss')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  @endpush

  <!-- Scripts -->
  @push('contentJs')
  
  @endpush

@endsection