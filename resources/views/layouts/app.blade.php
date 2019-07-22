<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Melonseed') }}</title>

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

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Additional CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.10/css/bootstrap-select.min.css">
  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.5.0/css/bootstrap4-toggle.min.css" rel="stylesheet">
  <link href="{{ asset('plugins/Toastr/build/toastr.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  @stack('contentCss')

</head>
<body class="bg-white">
  <div id="app">
    <!-- Navigation -->
    <nav class="navbar navbar-light bg-white static-top">
      <div class="container">
        <div class="logo-container">
          <a class="navbar-brand" href="/">{{ config('app.name', 'Melonseed') }}</a>
        </div>
        <div class="nav-container">
          <div class="btn dropdown">
            <a class="btn-activities {{Auth::check() ? 'dropbtn' : ''}}" href="{{ url('/activities') }}">Activities</a>
            @if(Auth::check())
              <div class="dropdown-content">
                <a href="{{ url('/activities') }}/11">My Activity</a>
                <a href="{{ url('/activities') }}">Find Activities</a>
              </div>
            @endif
          </div>
          <div class="btn dropdown">
            <a class="btn-activities {{Auth::check() ? 'dropbtn' : ''}}" href="{{ url('/providers/profile') }}">Providers</a>
            @if(Auth::check() && Auth::user()->is_provider)
              <div class="dropdown-content">
                <a href="{{ url('/providers/profile') }}">Provider Profile</a>
                <a href="{{ url('/providers/review') }}">Reviews</a>
              </div>
            @endif
          </div>

          @guest
            <a class="btn nav-btn btn-accent-border btn-login" data-toggle="modal" data-target="#loginModal">Log In</a>
            <a class="btn nav-btn btn-accent btn-signup" data-toggle="modal" data-target="#signupModal">Sign Up</a>
          @else
            <div class="btn nav-user-info">
              <a class="btn-user-info py-0 dropdown-toggle" data-toggle="dropdown">
                <div class="avatar-wrapper">
                  <img class="avatar-img img-thumbnail img-rounded" src="{{ asset(Auth::user()->avatar) }}">
                </div>
                <div class="user-info-wrapper">
                  <div class="user-info-name">
                    {{ Auth::user()->first_name ? Auth::user()->first_name : Auth::user()->username }}
                  </div>
                  <div class="user-info-role">
                    {{ Auth::user()->is_provider ? 'Provider' : 'Parents' }}
                  </div>
                </div>
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="/profile/{{ Auth::user()->id }}/edit">Profile</a>
                <a class="dropdown-item" 
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
              </div>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          @endguest
        </div>
      </div>
    </nav>


    <!-- The Notification Section -->
    @include('layouts.notification-section')
    

    <main class="mx-0 h-100">
      @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer bg-dark">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 h-100 text-center text-lg-left my-auto display-inline">
            <div class="col-4 logo-container">
              <a class="navbar-brand" href="{{ url('/') }}">Melonseed</a>
            </div>
            <div class="col-4">
              <a class="btn btn-footer-nav" href="{{ url('/providers/profile') }}">Providers</a>
            </div>
            <div class="col-4">
              <a class="btn btn-footer-nav" href="{{ url('/activities') }}">Activities</a>
            </div>
          </div>
          <div class="col-lg-5 h-100 text-center text-lg-right my-auto">
            <ul class="list-inline mb-0">
              @guest
                <li class="list-inline-item">
                  <a class="btn nav-btn btn-accent-border btn-login" data-toggle="modal" data-target="#loginModal">Log In</a>
                </li>
                <li class="list-inline-item">
                  <a class="btn nav-btn btn-accent btn-signup" data-toggle="modal" data-target="#signupModal">Sign Up</a>
                </li>
              @else
                <li class="list-inline-item">
                  <a class="btn nav-btn btn-accent-border" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  Log Out</a>
                </li>
              @endguest
            </ul>
          </div>
        </div>
      </div>
    </footer>

  </div>
  
  <!-- The Login Modal -->
  @include('layouts.login-modal')
  
  <!-- The Sign Up Modal -->
  @include('layouts.signup-modal')

  <!-- App JavaScript -->
  <script src="{{ asset('js/app.js') }}"></script>

  <!-- Additional JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.10/js/bootstrap-select.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.5.0/js/bootstrap4-toggle.min.js"></script>
  <script src="{{ asset('plugins/Toastr/build/toastr.min.js') }}"></script>

  @stack('contentJs')
  
  <script type="text/javascript">
    var base_url = "{{ url('/') }}";
    var previous_url = "{{ isset($previous_url) ? $previous_url : '' }}";
    if (previous_url) {
      if (previous_url == 'login') {
        $('.btn-login')[0].click();
      }
      if (previous_url == 'register') {
        $('.btn-signup')[0].click();
      }
    }
    
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    function triggerSignup() {
      document.getElementById('loginModal').click();
      document.getElementsByClassName('btn-signup')[0].click();
    }

    function triggerLogin() {
      document.getElementById('signupModal').click();
      document.getElementsByClassName('btn-login')[0].click();
    }
  </script>
  <script type="text/javascript">
    function reloadAtivityTypes(index) {
      console.log('aa==', index);
      $('.activity-type-option').css('display', 'none');
      if (index) {
        $('.category_' + index).css('display', 'block');
      }
    }
    
    reloadAtivityTypes(0);

    $(document).on('change', 'select.filter-category', function(e) {
      console.log('bb==', $(this).val());
      reloadAtivityTypes($(this).val());
    });
  </script>
</body>
</html>
