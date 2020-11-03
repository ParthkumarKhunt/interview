@php

$currentRoute = Route::current()->getName();
if (!empty(Auth()->guard('user')->user())) {
$data = Auth()->guard('user')->user();
}
@endphp
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
      <a href="{{ route('dashboard') }}">
          <img alt="image" src="{{ asset('public/assets/img/logo.png') }}" class="header-logo" />
          <span class="logo-name">ABC</span>
        </a>
      </div>
      <ul class="sidebar-menu">
          <li class="dropdown active" style="display: block;">
               <div class="sidebar-profile">
                 <div class="siderbar-profile-pic">
                     <img src="{{ asset('public/assets/img/users/user-6.png') }}" class="profile-img-circle box-center" alt="User Image">
                 </div>
                 <div class="siderbar-profile-details">
                     <div class="siderbar-profile-name"> {{  strtoupper($data['username']) }}</div>
                 </div>
                 <div class="sidebar-profile-buttons ">
                   <center>
                     <a class="tooltips waves-effect waves-block" href="auth-login.html" data-toggle="tooltip" title="" data-original-title="Logout">
                        <i class="fas fa-share-square sidebarQuickIcon"></i>
                     </a>
                   </center>
                 </div>
             </div>
         </li>

        <li class="menu-header">Menu</li>
        <li class="{{ $currentRoute == 'dashboard' || $currentRoute == 'my-profile' ? "active" : ''}}">
            <a class="nav-link" href="{{ route('dashboard') }}">
              <i class="fas fa-desktop"></i>
              <span>Dashboard</span></a>
        </li>
        <li class="{{ $currentRoute == 'customer-list' || $currentRoute == 'customer-add' || $currentRoute == 'customer-view' || $currentRoute == 'customer-edit' ? "active" : ''}}">
            <a class="nav-link" href="{{ route('customer-list') }}">
              <i class="fas fa-users"></i>
              <span>Customer List</span></a>
        </li>

        <li class="{{ $currentRoute == 'customer-list-paginate'  ? "active" : ''}}">
            <a class="nav-link" href="{{ route('customer-list-paginate') }}">
              <i class="fas fa-users"></i>
              <span>Customer List Paginate</span></a>
        </li>

      </ul>
    </aside>
  </div>