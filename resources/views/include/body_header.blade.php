@php

$currentRoute = Route::current()->getName();

if (!empty(Auth()->guard('user')->user())) {
$data = Auth()->guard('user')->user();
}
@endphp
<nav class="navbar navbar-expand-lg main-navbar">
    <div class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn"><i
              class="fas fa-bars"></i></a></li>
        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
              <i class="fas fa-expand"></i>
            </a>
        </li>
        
      </ul>
    </div>
    <ul class="navbar-nav navbar-right">
      
      <li class="dropdown"><a href="#" data-toggle="dropdown"
          class="nav-link dropdown-toggle nav-link-lg nav-link-user">
          <img alt="image" src="{{ asset('public/assets/img/users/user-6.png') }}" class="user-img-radious-style">
          <span class="d-sm-none d-lg-inline-block"></span></a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-title"> {{  strtoupper($data['username']) }}</div>
          
          <div class="dropdown-divider"></div>
          <a href="{{ route('logout') }}" class="dropdown-item has-icon ">
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
        </div>
      </li>
    </ul> 
  </nav>