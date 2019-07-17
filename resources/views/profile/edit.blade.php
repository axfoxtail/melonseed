@extends('../layouts.app')

@section('content')

  <!-- Provider Create -->
  <section class="profile-edit-container bg-white my-5">
    <div class="container">
      <div class="row">
        <div class="profile-form-container">
          <div class="row">
            <div class="col-4">
              <form class="profile-avatar-form" id="profile-avatar-form" action="{{ url('/profile') }}/{{ Auth::user()->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="profile-img-container">
                  <div class="profile-img-wrapper">
                    <img class="profile-img img-rounded img-thumbnail" id="profile-img" src="{{ asset(Auth::user()->avatar) }}">
                    <div class="profile-img-overlay">
                      <a class="btn btn-upload-avatar"><i class="fa fa-pencil"></i></a>
                    </div>
                    <input type="file" name="avatar" class="hidden" hidden id="upload-avatar" accept="image/*">
                  </div>
                  <div class="row mx-0 w-100 avatar-btn-wrapper">
                    
                  </div>
                </div>
              </form>
            </div>
            <div class="col-8">
              <div class="row">
                <form class="profile-edit-form" id="profile-edit-form" action="{{ url('/profile') }}/{{ Auth::user()->id }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="col-8">
                    <div class="form-group">
                      <label for="first name">First Name</label>
                      <input type="text" class="form-control" name="first_name" value="{{ old('first_name') ? old('first_name') : Auth::user()->first_name }}" placeholder="" >
                      @error('first_name')
                        <div class="input-error">{{$message}}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="last name">Last Name</label>
                      <input type="text" class="form-control" name="last_name" value="{{ old('last_name') ? old('last_name') : Auth::user()->last_name }}" placeholder="" >
                      @error('last_name')
                        <div class="input-error">{{$message}}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" class="form-control" name="username" value="{{ old('username') ? old('username') : Auth::user()->username }}" disabled placeholder="" >
                      @error('username')
                        <div class="input-error">{{$message}}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="email">Email Address</label>
                      <input type="email" class="form-control" name="email" value="{{ old('email') ? old('email') : Auth::user()->email }}" placeholder="" >
                      @error('email')
                        <div class="input-error">{{$message}}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="phone">Phone Number</label>
                      <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number') ? old('phone_number') : Auth::user()->phone_number }}" placeholder="" >
                      @error('phone_number')
                        <div class="input-error">{{$message}}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="role">User Role</label>
                      <input type="text" class="form-control" name="is_provider" disabled value="{{ Auth::user()->is_provider ? 'Provider' : 'Parents' }}" placeholder="" >
                      <input type="text" class="hidden" name="is_provider" hidden value="{{ Auth::user()->is_provider }}" placeholder="" >
                    </div>
                    <div class="form-group">
                      <label for="current password">Current Password</label>
                      <input type="password" class="form-control" name="current_password" placeholder="" >
                      @error('current_password')
                        <div class="input-error">{{$message}}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="password">New Password</label>
                      <input type="password" class="form-control" name="password" placeholder="" >
                      @error('password')
                        <div class="input-error">{{$message}}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="password_confirmation">Confirm Password</label>
                      <input type="password" class="form-control" name="password_confirmation" placeholder="" >
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary" value="Save">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </section>

  <!-- Styles -->
  @push('contentCss')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  @endpush

  <!-- Scripts -->
  @push('contentJs')
  <script type="text/javascript">
    // var old_img;
    $('.btn-upload-avatar').on('click', function() {
      $('#upload-avatar').click();
    });

    $('#upload-avatar').on('change', function(e) {
      var old_img = $('#profile-img')[0].src;
      var img_file = e.target.files[0];

      if (img_file) {
        var reader = new FileReader();
        reader.onload = function(event) {
          $('#profile-img')[0].src = event.target.result;
        }
        reader.readAsDataURL(img_file);
        $('.avatar-btn-wrapper').html('<div class="avatar-btn-group">' + 
                                        '<a class="btn btn-md btn-accent mr-2 btn-avatar-save">Save</a>' + 
                                        '<a class="btn btn-md btn-primary-border ml-2 btn-avatar-cancel">Cancel</a>' + 
                                      '</div>');
      }
      
      $(document).on('click', '.btn-avatar-cancel', function() {
        $('#profile-img')[0].src = old_img;
        $('.avatar-btn-wrapper').empty();
      });

      $(document).on('click', '.btn-avatar-save', function() {
        $('.avatar-btn-wrapper').empty();
        $('#profile-avatar-form').submit();
      })
    });

  </script>
  @endpush

@endsection