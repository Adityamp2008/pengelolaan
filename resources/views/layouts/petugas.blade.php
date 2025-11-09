<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Petugas | Dashboard</title>
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/feather/feather.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/typicons/typicons.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="assets/js/select.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css')}}">
    <link rel="shortcut icon" href="{{ asset('frontend/assets/images/favicon.png')}}" />
  </head>
  <body class="with-welcome-text">
    <div class="container-scroller">
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
          <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
              <span class="icon-menu"></span>
            </button>
          </div>
          <div>
            <a class="navbar-brand brand-logo" href="index.html">
              <img src="{{ asset('frontend/assets/images/logo.svg')}}" alt="logo" />
            </a>
            <a class="navbar-brand brand-logo-mini" href="index.html">
              <img src="{{ asset('frontend/assets/images/logo.svg')}}" alt="logo" />
            </a>
          </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-top">

          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown d-none d-lg-block user-dropdown">
              <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                  {{Auth()->user()->name}}
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <p class="mb-1 mt-3 fw-semibold">{{Auth()->user()->name}}</p>
                  <p class="fw-light text-muted mb-0">{{Auth()->user()->email}}</p>
                </div>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                  @csrf
                  <button class="dropdown-item"
                          onclick="return confirm('Yakin ingin logout?')">
                    <i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>
                    Logout
                  </button>
                </form>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link {{ Route::is('rooms.*') ? 'active' : '' }}" href="{{ route('admin.dashboard')}}">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item nav-category">Sistem</li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">UI Elements</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="docs/documentation.html">
                <i class="menu-icon mdi mdi-file-document"></i>
                <span class="menu-title">Documentation</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            
            <ul class="navbar-nav">
              <li class="nav-item  d-none d-lg-block ms-0">
                <h3 class="welcome-text">Selamat datang <span class="text-black fw-bold">{{Auth()->user()->name}}</span></h3>
              </li>
            </ul>
            
            @yield('content')
            
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Sistem from RPL.</span>
              <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Copyright © 2025</span>
            </div>
          </footer>
        </div>
        
        
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- plugins:js -->
    <script src="{{ asset('frontend/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{ asset('frontend/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/vendors/chart.js/chart.umd.js')}}"></script>
    <script src="{{ asset('frontend/assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/off-canvas.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/template.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/settings.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/todolist.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.cookie.js')}}" type="text/javascript"></script>
    <script src="{{ asset('frontend/assets/js/dashboard.js')}}"></script>
  </body>
</html>
