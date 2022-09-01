  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('home')}}" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

       <!-- Login User Info-->
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <i class="fas fa-user-graduate text-info"> </i>
          {{-- <img src="../../dist/img/user2-160x160.jpg" class="user-image img-circle elevation-2" alt="User Image"> --}}
          <span class="d-none d-md-inline text-info"> {{Auth::user()->name}} </span> 
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-dark">
            <img src="{{asset('backend')}}/dist/img/adminLogo.png" class="img-circle elevation-2" alt="User Image">

            <p>
              @php
                use Carbon\Carbon;
              @endphp
              Admin Officer
              {{-- <small>{{ Carbon::createFromFormat(Auth::user()->created_at)->diffForHumans()}}</small> --}}
            </p>
          </li>
         
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="{{route('admin.profile',Auth::user()->id)}}" class="btn btn-default btn-flat text-dark">Profile</a>
            <a href="{{ route('logout') }}" class="btn btn-default text-dark btn-flat float-right"  onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" >Sign out</a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
          </li>
        </ul>
      </li>



    </ul>
  </nav>
  <!-- /.navbar -->