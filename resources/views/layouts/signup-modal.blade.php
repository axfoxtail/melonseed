<!-- The Modal -->
  <div class="modal login-modal" id="signupModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
          <li class="nav-item" style="width: 100%;">
            <a class="nav-link" style="width: 100%;">Sign Up</a>
          </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <div id="" class="container tab-pane active"><br>
            <form id="signup-form">
              @csrf

              <div class="form-group">
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                @error('username')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">
                <!-- <label for="usr">Need to register a new account?</label> -->
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" id="password" placeholder="Password">
                <!-- <label for="usr">Need to register a new account?</label> -->
                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="password-confirm" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                <!-- <label for="pwd">Forgot Password?</label> -->
              </div>
              <div class="row">
                <div class="col-6">
                  <label class="h5">Are you parents or provider?</label>
                  <input type="checkbox" id="is_provider" name="is_provider" data-toggle="toggle" data-on="Privider" data-off="Parents" data-onstyle="accent" data-offstyle="primary" data-width="100%" data-height="40" value="1">
                </div>
                <div class="col-6">
                  <input type="button" class="form-control btn btn-primary btn-signup-submit" value="Sign up">
                </div>
              </div>
              <div class="row">
                <div class="trigger-login-wrapper mt-5">
                  <small class="h5">
                    I have already account. <a class="link-login" onclick="triggerLogin();">Log In</a>
                  </small>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $('.btn-signup-submit').on('click', function(e) {
      e.preventDefault();
      
      $.ajax({
        type: 'POST',
        url: '/register',
        data: {
          username: $('#signup-form input[name=username]').val(),
          email: $('#signup-form input[name=email]').val(),
          password: $('#signup-form input[name=password]').val(),
          password_confirmation: $('#signup-form input[name=password_confirmation]').val(),
          is_provider: $('#signup-form input[name=is_provider]').is(':checked') ? "1" : "0"
        },
        success: function(data) {
          // console.log('res-success: ', data);
          toastr.success('Successfully logged in.');
          document.location.reload();
        },
        error: function(err) {
          console.log('err: ', err);
          if(err.status) {
            if(err.responseJSON.errors.username) {
              for (var j=0; j<err.responseJSON.errors.username.length; j++) {
                toastr.error(err.responseJSON.errors.username[j]);
              }
            }
            if(err.responseJSON.errors.email) {
              for (var k=0; k<err.responseJSON.errors.email.length; k++) {
                toastr.error(err.responseJSON.errors.email[k]);
              }
            }
            if(err.responseJSON.errors.password) {
              for (var l=0; l<err.responseJSON.errors.password.length; l++) {
                toastr.error(err.responseJSON.errors.password[l]);
              }
            }
            if(err.responseJSON.errors.password) {
              toastr.error('The username has been already been taken.');
            }
          }
        }
      });

    })
  </script>