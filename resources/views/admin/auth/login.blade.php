

<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Log in</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ URL::to('admin/assets/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ URL::to('admin/assets/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ URL::to('admin/assets/bower_components/Ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{ URL::to('admin/assets/dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{ URL::to('admin/assets/plugins/iCheck/square/blue.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        body {
         
        }
    </style>
  </head>
  <body class="hold-transition login-page" style="background-image: url('https://www.gaonconnection.com/h-upload/2023/08/07/366984-1.webp');background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;">
    <div class="login-box">
      <div class="login-logo"; >
        <a  style="color:white" href="#">
          <b style="color:white">Sign In </b> EAST INDIA MCS LTD </a>
      </div>
      <div class="login-box-body">
        <p class="login-box-msg"; style="color:white">Sign in to start your session</p>
        <form method="POST" action="{{ route('admin.adminlogin') }}">
         @csrf
          <x-auth-validation-errors class="mb-4" :errors="$errors" />
          <div class="form-group has-feedback">
             <input type="text" class="form-control" id="username" name="email" :value="old('email')" required autofocus placeholder="Enter username">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Enter password" id="password-input" name="password" required autocomplete="current-password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me </label>
              </div>
            </div>
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
          </div>
        </form>
       
        <a href="#">I forgot my password</a>
       
      </div>
    </div>
    <script src="{{ URL::to('admin/assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ URL::to('admin/assets/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ URL::to('admin/assets/plugins/iCheck/icheck.min.js')}}"></script>
    <script>
      $(function() {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' /* optional */
        });
      });
    </script>
  </body>
</html>