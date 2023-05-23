<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
      <a class="navbar-brand brand-logo mr-5" href="{{route('home')}}"><img src="images/logo_munzalan.png" class="mr-2" alt="logo"/></a>
      <a class="navbar-brand brand-logo-mini" href="{{route('home')}}"><img src="images/logo_munzalan_mini.png" alt="logo"/></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="icon-menu"></span>
      </button>

      <ul class="navbar-nav navbar-nav-right">

        <li class="nav-item nav-profile dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
            <i class="ti-settings text-primary"></i>
            
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">

            <form action="{{url("logout")}}" method="post">
                @csrf
                
                <button type="submit" class="dropdown-item"><i class="ti-power-off text-primary"></i>logout</button>
            </form>
          </div>
        </li>
        <li class="nav-item nav-settings d-none d-lg-flex">
          <a class="nav-link" href="#">  
            <i class="icon-ellipsis"></i>
          </a>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="icon-menu"></span>
      </button>
    </div>
  </nav>