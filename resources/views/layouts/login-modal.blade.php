<!-- The Modal -->
  <div class="modal login-modal" id="loginModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#parents-login">Parents</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#providers-login">Providers</a>
          </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <div id="parents-login" class="container tab-pane active"><br>
            <form id="parents-form" method="POST" action="{{ route('login') }}">
              @csrf

              <input type="text" class="hidden" hidden name="is_provider" value="{{ false }}" required>
              <div class="form-group">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <a class="h6 trigger-signup" onclick="triggerSignup();">Need to register a new account?</a>
              </div>
              <div class="form-group">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                <a class="h6 trigger-forgetpwd" href="">Forgot Password?</a>
              </div>
              <div class="row">
                <div class="col-6">
                <input type="submit" class="form-control btn btn-primary" value="Login">
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
          <div id="providers-login" class="container tab-pane fade"><br>
            <form id="providers-form" method="POST" action="{{ route('login') }}">
              @csrf

              <input type="text" class="hidden" hidden name="is_provider" value="{{ true }}" required>
              <div class="form-group">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <a class="h6" onclick="triggerSignup();">Need to register a new account?</a>
              </div>
              <div class="form-group">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                <a class="h6 trigger-forgetpwd" href="">Forgot Password?</a>
              </div>
              <div class="row">
                <div class="col-6" style="margin-left: auto; margin-right: auto;">
                  <input type="submit" class="form-control btn btn-primary" value="Login">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>