<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>SIMAX | Melonseed</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="{{ asset('assets/css/landing-page.min.css') }}" rel="stylesheet">

  <!-- App Css -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>

  @stack('contentCss')

</head>

<body>
  
  <div id="app">
    
    <!-- Navigation -->
    <nav class="navbar navbar-light bg-light static-top">
      <div class="container">
        <div class="logo-container">
          <a class="navbar-brand" href="/">SIMAX</a>
        </div>
        <div class="nav-container">
          <a class="btn" href="/activities">Activities</a>
          <a class="btn" href="/activities/create">Providers</a>
          <a class="btn nav-btn btn-accent-border" data-toggle="modal" data-target="#loginModal">Log In</a>
          <a class="btn nav-btn btn-accent" data-toggle="modal" data-target="#loginModal">Sign Up</a>
        </div>
      </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer class="footer bg-dark">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 h-100 text-center text-lg-left my-auto display-inline">
            <div class="col-4 logo-container">
              <a class="navbar-brand" href="/">SIMAX</a>
            </div>
            <div class="col-4">
              <a class="btn btn-footer-nav" href="/activities/create">Providers</a>
            </div>
            <div class="col-4">
              <a class="btn btn-footer-nav" href="/activities">Activities</a>
            </div>
          </div>
          <div class="col-lg-5 h-100 text-center text-lg-right my-auto">
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <a class="btn nav-btn btn-accent-border" data-toggle="modal" data-target="#loginModal">Log In</a>
              </li>
              <li class="list-inline-item">
                <a class="btn nav-btn btn-accent" data-toggle="modal" data-target="#loginModal">Sign Up</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    
  </div>

  <!-- The Modal -->
  <div class="modal login-modal" id="loginModal">
    <div class="modal-dialog">
      <div class="modal-content">
      <!-- Nav tabs -->
        <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#parents">Parents</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#providers">Providers</a>
        </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
        <div id="parents" class="container tab-pane active"><br>
          <form id="parents-form">
            <div class="form-group">
              <input type="text" class="form-control" id="usr">
              <label for="usr">Need to register a new account?</label>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="pwd">
              <label for="pwd">Forgot Password?</label>
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
        <div id="providers" class="container tab-pane fade"><br>
          <form id="providers-form">
            <div class="form-group">
              <input type="text" class="form-control" id="usr">
              <label for="usr">Need to register a new account?</label>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="pwd">
              <label for="pwd">Forgot Password?</label>
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
  

  <!-- App JavaScript -->
  <script src="{{ asset('js/app.js') }}"></script>
  @stack('contentJs')
  
</body>

</html>
