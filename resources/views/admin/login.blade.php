<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in</title>
  <link rel="icon" href="{{asset('backend_assets/assets/images/favicon.png')}}" />

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('backend_assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('backend_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend_assets/dist/css/adminlte.min.css')}}">
   <link rel="stylesheet" href="{{asset('backend_assets/assets/css/toastr.min.css')}}" />
  <style type="text/css">
   /* .btn-primary{
      background: linear-gradient(159deg, rgba(0,132,235,1) 42%, rgba(190,0,254,1) 66%);
      border: 1px solid #6f42c1;
    }

    .btn-primary:hover{
      background: linear-gradient(159deg, rgba(0,132,235,1) 42%, rgba(190,0,254,1) 66%);
      border: 1px solid #6f42c1;
    } */
  body{
    background-color:#000000 !important;
  }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <!-- <img src="{{asset('front-assets/images/logo.png')}}" alt=""> -->
    <br>
    <br>
    <!-- <a href="javascript:void(0)"><b>Honey Staff LLC</b></a> -->
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{route('loginAdminProcess')}}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email"  name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block" >Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
      <!-- /.social-auth-links -->

      <!-- <p class="mb-1">
        <a href="/password/reset">I forgot my password</a>
      </p> -->
      <p class="mb-0">
        <!-- <a href="{{route('user-register')}}" class="text-center">Register a new membership</a> | <a href="{{url('forgot-password')}}" class="text-center">forgot-password </a> -->
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('backend_assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend_assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend_assets/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('backend_assets/assets/js/toastr.min.js')}}"></script>

<script type="text/javascript">
  var type = "{{ Session::get('type') }}";
      switch (type) {
          case 'info':
              toastr.info("{{ Session::get('message') }}");
              break;

          case 'warning':
              toastr.warning("{{ Session::get('message') }}");
              break;

          case 'success':
              toastr.success("{{ Session::get('message') }}");
              break;

          case 'error':
              toastr.error("{{ Session::get('message') }}");
              break;

      }
</script> 
</body>
</html>
