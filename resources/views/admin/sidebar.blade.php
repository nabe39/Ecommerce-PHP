<?php
$user = session('user');  
?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <a class="sidebar-brand brand-logo" href="{{route('admin')}}"><img src="images/logo.png" alt="logo" style="margin: 0" /></a>
      <a class="sidebar-brand brand-logo-mini" href="{{route('admin')}}"><img src="images/logo_1.png" alt="logo" /></a>
    </div>
    <ul class="nav">
      <li class="nav-item profile">
        <div class="profile-desc">
          <div class="profile-pic">
            <div class="count-indicator">
              {{-- @if($user->profile_photo_path == null)
              <img class="img-xs rounded-circle" src="profilePhoto/avatar-trang-4.jpg"
                  alt="">
              @else
              <img class="img-xs rounded-circle"
              src="profilePhoto/{{$user->profile_photo_path}}" alt="">
              @endif --}}
              <span class="count bg-success"></span>
            </div>
            <div class="profile-name">
              <h5 class="mb-0 font-weight-normal ">{{$user->name?? "admin"}}</h5>
            </div>
          </div>
          <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
          <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
            <div href="" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-settings text-primary"></i>
                </div>
              </div>
                <form method="post" action="{{ route('logout') }}" class="inline">
                 @csrf
                  <button type="submit" id="logincss" class="dropdown-item">
                        {{('Log Out') }}
                 </button>
               </form>
            </div>
            <div class="dropdown-divider"></div>

          </div>
        </div>
      </li>
      <li class="nav-item nav-category">
        <span class="nav-link">Navigation</span>
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" href="{{url('/')}}">
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
          </span>
          <span class="menu-title">Products</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic" style>
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('/view_product')}}">Add products</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('/show_product')}}">Show product</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{url('view_category')}}">
          <span class="menu-icon">
            <i class="mdi mdi-playlist-play"></i>
          </span>
          <span class="menu-title">Category</span>
        </a>
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" href="{{url('order')}}">
          <span class="menu-icon">
            <i class="mdi mdi-playlist-play"></i>
          </span>
          <span class="menu-title">Order</span>
        </a>
      </li>
    </ul>
  </nav>

  <style>
    .collapse {
      visibility: visible !important;
    }
  </style>