<!-- The Modal -->
  <div class="modal login-modal" id="loginModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
          <li class="nav-item" style="width: 100%;">
            <a class="nav-link" data-toggle="tab" href="#login-form-container" style="background-color: #a845ff; color: #fff;">Log In</a>
          </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <div id="login-form-container" class="container tab-pane active"><br>
            <div id="login-form" class="login-signup-form">
              <!-- <input type="text" class="hidden" hidden name="is_provider" value="0" required> -->
              <div class="form-group">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <a class="h6 trigger-signup" onclick="triggerSignup();">Need to register a new account?</a>
              </div>
              <div class="form-group">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                <a class="h6 trigger-forgetpwd" style="color: #212529;" href="{{ route('password.request') }}">Forgot Password?</a>
              </div>
              <div class="row">
                <div class="col-6 pt-2">
                  <input type="button" class="form-control btn btn-primary btn-login-submit" value="Login">
                </div>
                <div class="col-6 hidden" style="display: none;">
                  <button class="btn btn-outline-dark btn-google-login">
                    <div class="btn-text">
                      Login with Google 
                    </div>
                    <div class="btn-icon">
                      <i class='fab fa-google-plus-g'></i>
                    </div>
                  </button>
                  <button class="btn btn-outline-dark btn-twitter-login">
                    <div class="btn-text">
                      Login with Twitter 
                    </div>
                    <div class="btn-icon">
                      <i class='fab fa-twitter'></i>
                    </div>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(document).on('keyup', '#login-form input', function(e) {
      e.preventDefault();
      if (e.keyCode == '13') {
        if (!$('#login-form input[name=email]').val()) {
          $('#login-form input[name=email]').focus();
          return;
        }
        if (!$('#login-form input[name=password]').val()) {
          $('#login-form input[name=password]').focus();
          return;
        }
        if ($('#login-form input[name=email]').val() && $('#login-form input[name=password]').val()) {
          submitLoginForm();
        }
      }
    });

    $('.btn-login-submit').on('click', function(e) {
      e.preventDefault();
      submitLoginForm();
    });

    function submitLoginForm() {
      $('#loginModal .modal-content').LoadingOverlay("show");
      $.ajax({
        type: 'POST',
        url: base_url + '/login',
        data: {
          email: $('#login-form input[name=email]').val(),
          password: $('#login-form input[name=password]').val()
        },
        success: function(data) {
          // console.log('res-success: ', data);
          $('#loginModal .modal-content').LoadingOverlay("hide");
          toastr.success('Successfully logged in.');
          document.location.reload();
        },
        error: function(err) {
          console.log('err: ', err);
          $('#loginModal .modal-content').LoadingOverlay("hide");
          if(err.status) {
            if(err.responseJSON.errors.email) {
              for (var i=0; i<err.responseJSON.errors.email.length; i++) {
                toastr.error(err.responseJSON.errors.email[i]);
              }
            }
          }
        }
      });
    }
  </script>