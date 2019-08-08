<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/admin/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/admin/img/favicon.ico') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>{{ config('app.name', 'Melonseed') }} - Admin Dashboard</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!--     Fonts and icons     -->
  {{-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" /> --}}
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <!-- CSS Files -->
  <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/admin/css/light-bootstrap-dashboard.css?v=2.0.0') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('assets/admin/css/demo.css') }}" rel="stylesheet" />
  <!-- Plugins CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
  <!-- App Css -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/admin/app-admin.css') }}" rel="stylesheet">
  <!-- Additional CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.10/css/bootstrap-select.min.css">
  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.5.0/css/bootstrap4-toggle.min.css" rel="stylesheet">
  <link href="{{ asset('plugins/Toastr/build/toastr.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  @stack('adminContentCss')
  <style>
    .business-hours-pattern {
      display: inline-flex;
      margin: 3px;
      border: solid 2px #a845ff;
      border-radius: 4px;
      color: #fff;
      background-color: #30cbb7;
    }
    .pattern-day {
      padding: 3px;
      width: 70px;
      text-align: center;
      color: #fff;
      background-color: #a845ff;
    }
    .pattern-start {
      padding: 3px;
      padding-left: 5px;
    }
    .pattern-to {
      padding: 3px;
    }
    .pattern-end {
      padding: 3px;
      padding-right: 5px;
    }
    .age-pattern {
      border: solid 1px #30cbb7;
      border-radius: 15px;
      background-color: #30cbb7;
      color: #fff;
      padding: 0px 8px;
      margin: 3px;
      font-size: 15px;
      height: 25px;
      text-align: center;
      width: auto;
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <div class="sidebar" data-image="{{ asset('assets/admin/img/sidebar-5.jpg') }}">
       
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="{{ url('/') }}" class="simple-text">
            {{ config('app.name', 'Melonseed') }}
          </a>
        </div>
        <ul class="nav">
          <li class="nav-item {{ $active_class == 'dashboard' ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/admin/dashboard') }}">
              <i class="nc-icon nc-chart-pie-35"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="{{ $active_class == 'users' ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/admin/users') }}">
              <i class="nc-icon nc-circle-09"></i>
              <p>Users List</p>
            </a>
          </li>
          <li class="{{ $active_class == 'providers' ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/admin/providers') }}">
              <i class="nc-icon nc-notes"></i>
              <p>Providers List</p>
            </a>
          </li>
          <li class="{{ $active_class == 'reviews' ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('/admin/reviews') }}">
              <i class="nc-icon nc-paper-2"></i>
              <p>Reviews List</p>
            </a>
          </li>
          {{-- <li>
            <a class="nav-link" href="./icons.html">
              <i class="nc-icon nc-atom"></i>
              <p>Icons</p>
            </a>
          </li> --}}
          <li class="{{ $active_class == 'locations' ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/locations') }}">
              <i class="nc-icon nc-pin-3"></i>
              <p>Locations</p>
            </a>
          </li>
          {{-- <li>
            <a class="nav-link" href="./notifications.html">
              <i class="nc-icon nc-bell-55"></i>
              <p>Notifications</p>
            </a>
          </li>
          <li class="nav-item active active-pro">
            <a class="nav-link active" href="upgrade.html">
              <i class="nc-icon nc-alien-33"></i>
              <p>Upgrade to PRO</p>
            </a>
          </li> --}}
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg " color-on-scroll="500">
        <div class="container-fluid">
          <a class="navbar-brand" href="#pablo"> Dashboard </a>
          <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <!-- <ul class="nav navbar-nav mr-auto">
              <li class="nav-item">
                <a href="#" class="nav-link" data-toggle="dropdown">
                  <i class="nc-icon nc-palette"></i>
                  <span class="d-lg-none">Dashboard</span>
                </a>
              </li>
              <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <i class="nc-icon nc-planet"></i>
                  <span class="notification">5</span>
                  <span class="d-lg-none">Notification</span>
                </a>
                <ul class="dropdown-menu">
                  <a class="dropdown-item" href="#">Notification 1</a>
                  <a class="dropdown-item" href="#">Notification 2</a>
                  <a class="dropdown-item" href="#">Notification 3</a>
                  <a class="dropdown-item" href="#">Notification 4</a>
                  <a class="dropdown-item" href="#">Another notification</a>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nc-icon nc-zoom-split"></i>
                  <span class="d-lg-block">&nbsp;Search</span>
                </a>
              </li>
            </ul> -->
            <ul class="navbar-nav ml-auto">
              @if(Auth::check() && Auth::user()->role == 'admin')
              <li class="nav-item">
                <a class="nav-link">
                  <span class="no-icon">{{ Auth::user()->username }}</span>
                </a>
              </li>
              @endif
              <!-- <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <span class="no-icon">Account</span>
                </a>
              </li> -->
              <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="no-icon">Dropdown</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                  <div class="divider"></div>
                  <a class="dropdown-item" href="#">Separated link</a>
                </div>
              </li> -->
              <li class="nav-item">
                <a class="nav-link" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <span class="no-icon">Log out</span>
                </a>
                <form id="logout-form" action="{{ url('admin/logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      @yield('admin-content')

      <footer class="footer">
        <div class="container-fluid">
          <nav>
            <ul class="footer-menu">
              <li>
                <a href="{{ url('/') }}">
                  Home
                </a>
              </li>
              <li>
                <a href="{{ url('/activities') }}">
                  Activities
                </a>
              </li>
              <li>
                <a href="{{ url('/providers') }}">
                  Providers
                </a>
              </li>
            </ul>
            <p class="copyright text-center">
              ©
              <script>
                document.write(new Date().getFullYear())
              </script>
              <a href="">Melonseed</a>, help parents and kids.
            </p>
          </nav>
        </div>
      </footer>
    </div>
  </div>
  
</body>
<!--   Core JS Files   -->
<script src="{{ asset('assets/admin/js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{ asset('assets/admin/js/plugins/bootstrap-switch.js') }}"></script>
<!--  Google Maps Plugin    -->
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
<!--  Chartist Plugin  -->
<script src="{{ asset('assets/admin/js/plugins/chartist.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('assets/admin/js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="{{ asset('assets/admin/js/light-bootstrap-dashboard.js?v=2.0.0') }}" type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('assets/admin/js/demo.js') }}"></script>
<!-- Plugins JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<!-- Additional JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.10/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.5.0/js/bootstrap4-toggle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js"></script>
<script src="{{ asset('plugins/Toastr/build/toastr.min.js') }}"></script>
<script type="text/javascript">
  var base_url = "{{ url('/') }}";

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $(document).ready(function() {
    // Javascript method's body can be found in assets/js/demos.js
    // demo.initDashboardPageCharts();

    // demo.showNotification();

  });
</script>

@stack('adminContentJs')

</html>
