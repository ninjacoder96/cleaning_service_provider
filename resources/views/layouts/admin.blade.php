
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>CM</title>

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <message-component></message-component>
      <!-- Notifications Dropdown Menu -->
      <notification-component></notification-component>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i> {{ Auth::user()->username }}

        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="\page_profile" class="dropdown-item">
            <span>Profile</span>
          </a>
          <a href="\page_change_password" class="dropdown-item">
            <span>Change Password</span>
          </a>
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </div>
      </li>
    </ul>
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src=""  class="brand-image img-circle elevation-3"style="opacity: .8">
      <span class="brand-text font-weight-light">Clean Meister</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="" class="img-circle elevation-2">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->profile->firstname }}</a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @if(Auth::user()->role_id == 1)
          <li class="nav-item">
            <a href="\home" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="\manage_accounts" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Manage Accounts
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="\pending_requests" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Pending Requests
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="\admin_report" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Reports
              </p>
            </a>
          </li>
          @endif
          @if(Auth::user()->role_id == 2)
            @if(Auth::user()->approved == 0)
              <li class="nav-item">
                <a href="\ownerprofile" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Service Profile Profile
                  </p>
                </a>
              </li>
            @endif
            @if(Auth::user()->approved == 1)
              <li class="nav-item">
                <a href="\service_provider_services" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Services
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="\cleaners" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Cleaners
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="\page_clients" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Clients
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="\service_provider_booking" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Booking Transaction
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="\complaints" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Complaints
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="\service_provider_report" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Reports
                  </p>
                </a>
              </li>
            @endif
          @endif
          @if(Auth::user()->role_id == 3)
            <li class="nav-item">
              <a href="../cleaner_booking" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Booking Transaction
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../schedules" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Schedules
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../cleaner_report" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Reports
                </p>
              </a>
            </li>
          @endif
          @if(Auth::user()->role_id == 4)
            <li class="nav-item">
              <a href="\client_service_provider" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Book A Service
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="\client_booking" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Transactions
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="\client_report" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Reports
                </p>
              </a>
            </li>
          @endif
        </ul>
      </nav>

    </div>

  </aside>
  <div class="content-wrapper">
    @yield('content')
  </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
