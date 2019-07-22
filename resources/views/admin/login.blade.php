<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/admin/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/admin/img/favicon.ico') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Melonseed - Admin Login</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
  <!-- CSS Files -->
  <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('plugins/Toastr/build/toastr.css') }}" rel="stylesheet">
  <style type="text/css">
    .bg-admin-login {
      position: absolute;
      width: 100%;
      height: 100%;
      background-repeat: no-repeat;
      background-size: cover;
      opacity: 0.4;
      background-image: url({{ asset('img/bg-admin-login.jpg') }});
    }
    .login-form-container {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      min-width: 300px;
      max-width: 600px;
      width: 90%;
    }
    .card {
      border: none;
    }
    .card-header {
      margin: 0;
      padding: 15px !important;
      background-color: #a845ff !important;
      color: #fff;
      font-weight: bold;
    }
    button.btn-login {
      border-color: #a845ff !important;
      background-color: #a845ff !important;
      color: #fff;
    }
  </style>
</head>

<body>
  <div class="bg-admin-login"></div>
  <div class="login-form-container">
    <div class="card">
      <div class="card-header text-center h2">
        Admin Login
      </div>
      <div class="card-body">
        <form>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
          </div>
          <div class="form-group form-check">
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" id="remember" name="remember"> Remember me
            </label>
          </div>
          <button type="button" class="btn btn-primary btn-login">Submit</button>
        </form>
      </div>
    </div>
  </div>
  
</body>
<!--   Core JS Files   -->
<script src="{{ asset('assets/admin/js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/Toastr/build/toastr.min.js') }}"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script type="text/javascript">
  var base_url = "{{ url('/') }}";
  
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('.btn-login').on('click', function(e) {
    e.preventDefault();
    
    $.ajax({
      type: 'POST',
      url: base_url + '/admin/login',
      data: {
        email: $('#email').val(),
        password: $('#pwd').val(),
        remember: $('#remember')[0].checked
      },
      success: function(data) {
        toastr.success('Successfully logged in.');
        document.location.href = base_url + '/admin';
      },
      error: function(err) {
        console.log('err: ', err);
        if(err.responseJSON.email) {
          for (var i=0; i<err.responseJSON.email.length; i++) {
            toastr.error(err.responseJSON.email[i]);
          }
        }
        if(err.responseJSON.password) {
          for (var i=0; i<err.responseJSON.password.length; i++) {
            toastr.error(err.responseJSON.password[i]);
          }
        }
        if(err.responseJSON.exist) {
          toastr.error(err.responseJSON.exist);
        }
      }
    });

  })

</script>

</html>
