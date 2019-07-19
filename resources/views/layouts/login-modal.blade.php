<!-- The Modal -->
  <div class="modal login-modal" id="loginModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
          <li class="nav-item" style="width: 100%;">
            <a class="nav-link" data-toggle="tab" href="#login-form-container">Log In</a>
          </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <div id="login-form-container" class="container tab-pane active"><br>
            <form id="login-form">
              @csrf

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
                <div class="col-6">
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
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $('.btn-login-submit').on('click', function(e) {
      e.preventDefault();
      
      $.ajax({
        type: 'POST',
        url: '/login',
        data: {
          email: $('#login-form input[name=email]').val(),
          password: $('#login-form input[name=password]').val()
        },
        success: function(data) {
          // console.log('res-success: ', data);
          toastr.success('Successfully logged in.');
          document.location.reload();
        },
        error: function(err) {
          console.log('err: ', err);
          if(err.status) {
            if(err.responseJSON.errors.email) {
              for (var i=0; i<err.responseJSON.errors.email.length; i++) {
                toastr.error(err.responseJSON.errors.email[i]);
              }
            }
          }
        }
      });

    })
  </script>