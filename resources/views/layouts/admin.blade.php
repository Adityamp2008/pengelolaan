<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin | Dashboard</title>

    <!-- Vendor Styles -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">

    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">

    <!-- Fix Typo -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/js/select.dataTables.min.css') }}">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <link rel="shortcut icon" href="{{ asset('frontend/assets/images/favicon.png') }}">
</head>

<body class="with-welcome-text">
    <div class="container-scroller">

        <!-- NAVBAR -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <div class="navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <button class="navbar-toggler align-self-center me-3" type="button" data-bs-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>

                <a class="navbar-brand brand-logo" href="{{ route('admin.dashboard') }}">
                    <img src="{{ asset('frontend/assets/images/logo.svg') }}" alt="logo">
                </a>

                <a class="navbar-brand brand-logo-mini" href="{{ route('admin.dashboard') }}">
                    <img src="{{ asset('frontend/assets/images/logo.svg') }}" alt="logo-mini">
                </a>
            </div>

            <div class="navbar-menu-wrapper d-flex align-items-top ms-auto">
                <ul class="navbar-nav ms-auto">

                    <!-- USER MENU -->
                    <li class="nav-item dropdown user-dropdown">
                        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown">
                            {{ Auth()->user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown">
                            <div class="dropdown-header text-center">
                                <p class="fw-semibold mb-1 mt-3">{{ Auth()->user()->name }}</p>
                                <p class="fw-light text-muted mb-0">{{ Auth()->user()->email }}</p>
                            </div>

                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item" onclick="return confirm('Yakin ingin logout?')">
                                    <i class="mdi mdi-power text-primary me-2"></i> Logout
                                </button>
                            </form>
                        </div>
                    </li>

                </ul>

                <button class="navbar-toggler navbar-toggler-right d-lg-none" type="button" data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- /NAVBAR -->

        <div class="container-fluid page-body-wrapper">

            <!-- SIDEBAR -->
          <nav class="sidebar sidebar-offcanvas" id="sidebar">
              <ul class="nav">

                  <!-- DASHBOARD -->
                  <li class="nav-item">
                      <a class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}"
                        href="{{ route('admin.dashboard') }}">
                          <i class="mdi mdi-view-dashboard menu-icon"></i>
                          <span class="menu-title">Dashboard</span>
                      </a>
                  </li>

                  {{-- NGELIAT AKUN --}}
                  <li class="nav-item">
                      <a class="nav-link {{ Route::is('users.*') ? 'active' : '' }}"
                        href="{{ route('users.index') }}">
                          <i class="fa fa-users menu-icon"></i>
                          <span class="menu-title">Akun</span>
                      </a>
                  </li>

                  <!-- MASTER DATA -->
                  <li class="nav-item">
                      @php
                          $masterActive = Route::is('kategori.*') || Route::is('lokasi.*') || Route::is('Assets.*');
                      @endphp

                      <a class="nav-link" data-bs-toggle="collapse" href="#masterData"
                        aria-expanded="{{ $masterActive ? 'true' : 'false' }}">
                          <i class="mdi mdi-database-cog menu-icon"></i>
                          <span class="menu-title">Master Data</span>
                          <i class="menu-arrow"></i>
                      </a>

                      <div class="collapse {{ $masterActive ? 'show' : '' }}" id="masterData">
                          <ul class="nav flex-column sub-menu">
                              <li class="nav-item">
                                  <a class="nav-link {{ Route::is('kategori.*') ? 'active' : '' }}"
                                    href="{{ route('kategori.index') }}">
                                    Kelola Kategori
                                  </a>
                              </li>

                              <li class="nav-item">
                                  <a class="nav-link {{ Route::is('lokasi.*') ? 'active' : '' }}"
                                    href="{{ route('lokasi.index') }}">
                                     Kelola Lokasi
                                  </a>
                              </li>

                              <li class="nav-item">
                                  <a class="nav-link {{ Route::is('Assets.*') ? 'active' : '' }}"
                                    href="{{ route('Assets.index') }}"> Nonaktifkan Barang
                                  </a>
                              </li>
                          </ul>
                      </div>
                  </li>

                  <!-- INVENTARIS -->
                  <li class="nav-item">
                      @php
                          $inventarisActive = Route::is('ainventaris.*') || Route::is('jadwal.*');
                      @endphp

                      <a class="nav-link" data-bs-toggle="collapse" href="#inventarisMenu"
                        aria-expanded="{{ $inventarisActive ? 'true' : 'false' }}">
                          <i class="mdi mdi-package-variant-closed menu-icon"></i>
                          <span class="menu-title">Inventaris</span>
                          <i class="menu-arrow"></i>
                      </a>

                      <div class="collapse {{ $inventarisActive ? 'show' : '' }}" id="inventarisMenu">
                          <ul class="nav flex-column sub-menu">
                              <li class="nav-item">
                                  <a class="nav-link {{ Route::is('ainventaris.*') ? 'active' : '' }}"
                                    href="{{ route('ainventaris.index') }}">
                                     Data Inventaris
                                  </a>
                              </li>

                              <li class="nav-item">
                                  <a class="nav-link {{ Route::is('jadwal.*') ? 'active' : '' }}"
                                    href="{{ route('jadwal.index') }}"> 
                                    Jadwal Perbaikan
                                  </a>
                              </li>
                          </ul>
                      </div>
                  </li>

              </ul>
          </nav>
            <!-- /SIDEBAR -->

            <!-- MAIN -->
            <div class="main-panel">
                @yield('content')

                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted">Sistem from RPL.</span>
                        <span class="text-muted">Copyright © 2025</span>
                    </div>
                </footer>
            </div>
            <!-- /MAIN -->

        </div>
    </div>

    <!-- JS -->
    <script src="{{ asset('frontend/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/template.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/settings.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/todolist.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.cookie.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/dashboard.js') }}"></script>
</body>
</html>
