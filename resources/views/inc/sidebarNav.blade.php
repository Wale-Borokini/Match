<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-light navbar-shadow">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row position-relative">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ url('/') }}"><img class="brand-logo" alt="logo" src="{{ asset('app-assets/images/logo/Black-n-bg.png') }}">
          
          <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
        </ul>
      </div>
      <div class="navbar-container content">
        <div class="container collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left">         
              <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"></a>
                <form class="form-inline float-left">
                  <input id="input-box-width" type="text" class="form-control mt-1 mb-1" id="inlineFormInput" placeholder="Search">
                  <!-- <button type="submit" class="btn btn-primary mt-1">Submit</button> -->
                </form>
              </li>
          </ul>
          <ul class="nav navbar-nav float-right">
            @if (Auth::user())
              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="mr-1">{{ Auth::user()->name }}<span class="user-name text-bold-700"></span></span>
                <span class="avatar avater-md avatar-online"><img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}"><i></i></span></a>
              </li>
            @endif
          </ul>
        </div>
      </div>
    </div>
</nav>