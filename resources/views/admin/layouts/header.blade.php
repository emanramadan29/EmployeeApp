
  <header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo" style="background-color:#96beb4">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Employee App</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Employee App <i class=""></i></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top"  style="background-color: #96beb4">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" style="background-color:#96beb4">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">


            <!-- Messages: style can be found in dropdown.less-->

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              {{-- <img src="{{url('admin') }}/dist/img/avatar.jpg" class="user-image" alt="User Image"> --}}
              <span class="hidden-xs">{{ (Auth::user()->name) }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header" style="background-color: #96beb4">
                {{-- <img src="{{url('admin') }}/dist/img/avatar.jpg" class="img-circle" alt="User Image"> --}}

                <p>
                  {{ Auth::user()->name }}
                  <small>Member since {{date(' F Y', strtotime(Auth::user()->created_at))}}</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a class="btn btn-default btn-flat" href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
