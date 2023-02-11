
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
 <link rel="icon" href="{{asset('assets/images/header-logo.png')}}" />
 <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('backend_assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('backend_assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('backend_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('backend_assets/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend_assets/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('backend_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('backend_assets/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('backend_assets/plugins/summernote/summernote-bs4.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend_assets/assets/css/toastr.min.css')}}" />
  <link rel="stylesheet" href="{{asset('backend_assets/assets/css/waitMe.css')}}" />
 

  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet"> -->

 <style type="text/css">

  

  .sidebar-dark-orange .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-orange .nav-sidebar>.nav-item>.nav-link.active
  {
    background-color: #e35425;
    color: #ffffff;
  }


 

  .logo{
  margin-right:auto;
  display:block;
  margin-left:auto;
  width:50%;
}
  </style>

  
  @yield('header-script')
</head>
<body class="hold-transition sidebar-mini layout-fixed" id="container">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('assets/images/header-logo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    
       <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
         <li class="nav-item">
          <div>
            
        </div>
      </li>

      <li class="nav-item">
            <div>
              <a class="dropdown-item" href="{{url('profile')}}" >
                Profile
              </a>
            </div>
      </li>

      <li class="nav-item">
          <div>
            <a class="dropdown-item" href="{{ route('logouts') }} ">
                {{ __('Logout') }}
            </a>
           </div>
      </li>

      
     
    </ul>

    @yield('navbar-section')
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('admin/dashboard')}}" class="brand-link">
      <img class="logo" src="{{asset('assets/images/header-logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <!-- <span class="brand-text font-weight-light">Admin Panel</span> -->
      <!-- <span class="brand-text font-weight-light">Admin Panel</span> -->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item @if(Route::currentRouteName() == 'dashboard') menu-open @endif">
            <a href="#" class="nav-link @if(Route::currentRouteName() == 'dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('dashboard')}}" class="nav-link @if(Route::currentRouteName() == 'dashboard') active  @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
             </ul>
          </li>


          <li class="nav-item @if(Route::currentRouteName() == 'view_user' || Route::currentRouteName() == 'settings' || Route::currentRouteName() == 'user_detail' || Route::currentRouteName() == 'privacy-policy' || Route::currentRouteName() == 'cookie-policy' || Route::currentRouteName() == 'terms' || Route::currentRouteName() == 'about-us') menu-open @endif">
            <a href="#" class="nav-link @if(Route::currentRouteName() == 'view_user' || Route::currentRouteName() == 'settings' || Route::currentRouteName() == 'user_detail' || Route::currentRouteName() == 'privacy-policy' || Route::currentRouteName() == 'cookie-policy' || Route::currentRouteName() == 'terms' || Route::currentRouteName() == 'about-us' ) active @endif">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Setting Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('view_user')}}" class="nav-link @if(Route::currentRouteName() == 'view_user' || Route::currentRouteName() == 'user_detail' ) active  @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>view user</p>
                </a>
              </li>
              
               <li class="nav-item">
                <a href="{{route('about-us')}}" class="nav-link @if(Route::currentRouteName() == 'about-us' ) active  @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>About Us</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{route('settings')}}" class="nav-link @if(Route::currentRouteName() == 'settings' ) active  @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Setting</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{route('privacy-policy')}}" class="nav-link @if(Route::currentRouteName() == 'privacy-policy' ) active  @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Privacy Policy</p>
                </a>
              </li>
              
              
               <li class="nav-item">
                <a href="{{route('cookie-policy')}}" class="nav-link @if(Route::currentRouteName() == 'cookie-policy' ) active  @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cookie Policy</p>
                </a>
              </li>
              
               <li class="nav-item">
                <a href="{{route('terms')}}" class="nav-link @if(Route::currentRouteName() == 'terms' ) active  @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Terms Condition</p>
                </a>
              </li>
              
              
              
              
           </ul>
          </li>


          <li class="nav-item @if(Route::currentRouteName() == 'view-category' || Route::currentRouteName() == 'sub-category' || Route::currentRouteName() == 'all-news') menu-open @endif">
            <a href="#" class="nav-link @if(Route::currentRouteName() == 'view-category' || Route::currentRouteName() == 'sub-category' || Route::currentRouteName() == 'all-news') active @endif">
              <i class="nav-icon fa fa-list-alt"></i>
              <p>
              Category Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('view-category')}}" class="nav-link @if(Route::currentRouteName() == 'view-category') active  @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Category</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('all-news')}}" class="nav-link @if(Route::currentRouteName() == 'all-news' ) active  @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All News</p>
                </a>
              </li>
            </ul>
          </li>

         


         

          </ul>
        </li>
      </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
   @yield('sider-section')
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <br>
    <!-- /.content -->
   @yield('body-section')
  </div>
  
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020-<?php echo date('Y') ?> <a href="{{route('dashboard')}}"></a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <!-- <b>Version</b> 3.1.0 -->
    </div>
    @yield('footer-section')
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<div class="script_section">
<script src="{{asset('backend_assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('backend_assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)

   setTimeout(function(){
       $("div.alert").fadeOut(4000);
    }, 500 )
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('backend_assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('backend_assets/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('backend_assets/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('backend_assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('backend_assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('backend_assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('backend_assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('backend_assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<!-- <script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script> -->
<!-- Summernote -->
<script src="{{asset('backend_assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('backend_assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend_assets/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('backend_assets/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{asset('dist/js/pages/dashboard.js')}}"></script> -->
<script src="{{asset('backend_assets/plugins/jquery-validation/jquery.validate.min.js')}}"></script>

<script src="{{asset('backend_assets/assets/js/toastr.min.js')}}"></script>

<script src="{{asset('backend_assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend_assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend_assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend_assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('backend_assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend_assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('backend_assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('backend_assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('backend_assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('backend_assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('backend_assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script> -->
<script src="{{asset('backend_assets/assets/ckeditor/ckeditor.js')}}"></script>

<script>
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


      var current_effect ='bounce';
      function full_page()
      {
        $('#container').waitMe({
          effect : 'bounce',
          text : '',
          bg : 'rgba(255,255,255,0.7)',
          color : '#000',
          maxSize : '',
          waitTime : -1,
          textPos : 'vertical',
          fontSize : '',
          source : '',
          onClose : function() {}
          });
      }
</script>




@yield('footer-script')
</div>
</body>
</html>
