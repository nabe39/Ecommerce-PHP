<header class="header_section">
   <?php
   $user=session('user');
   $cart=session('cart');
   $order=session('orderCount')
   ?>
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{url('/')}}"><img width="280" src="images/logo.png" alt="#" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">
                <li class="nav-item nav-header active">
                   <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item nav-header">
                   <a class="nav-link" href="">Products</a>
                </li>
                <li class="nav-item nav-header">
                   <a class="nav-link" href="blog_list.html">Blog</a>
                </li>
                <li class="nav-item nav-header dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">More<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                     <li><a href="about.html">About us</a></li>
                     <li><a href="testimonial.html">Contact</a></li>
                  </ul>
               </li>
                {{-- <form class="form-inline">
                    <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                 </form> --}}
                 <li class="nav-item nav-header">
                  <div class=" pr-1">
                     <a class="nav-link cart rounded-pill" href="{{url('show_cart')}}">
                        <i style="color:black" class="bi bi-cart-fill "></i>
                        @if($cart > 0)
                        <span class="">{{$cart}}</span>
                        @endif
                        
                     </a>
                  </div>
                </li>
                {{-- <li class="nav-item nav-header" style="display: flex;align-items: center;">
                  <div style="border: 1px solid black;height: 1.5rem; opacity:0.7" ></div>
                </li> --}}
                <li class="nav-item nav-header">
                  <div class="pl-1 pr-3">
                     <a class="nav-link cart rounded-pill" href="{{url('show_order')}}">
                        <i class="fa-solid fa-truck" style="color: #000000;"></i>
                        @if($order > 0)
                        <span class="">{{$order}}</span>
                        @endif
                     </a>
                  </div>
                </li>
               @if(Route::has('login'))
               @auth
               <div class="dropdown">
                  <a class="" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                     <div class="img-account-profile-header rounded-circle mb-2">
                        @if($user->profile_photo_path == null)
                        <img class="imageProfile" src="profilePhoto/avatar-trang-4.jpg"
                            alt="">
                        @else
                        <img class="imageProfile"
                        src="profilePhoto/{{$user->profile_photo_path}}" alt="">
                        @endif
                    </div>
                    {{-- <i class="bi bi-caret-down-fill"></i> --}}
                  </a>
                  
                
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('getProfile', [$user->id]) }}">Profile</a>
                    <form method="post" action="{{ route('logout') }}" class="inline">
                     @csrf
                      <button type="submit" id="logincss" class="dropdown-item">
                            {{('Log Out') }}
                     </button>
                   </form>
                  </div>
                </div>
                  {{-- <li class="nav-item nav-header dropdown row" >
                     <div class="align-items-center">
                        <a class="nav-link dropdown-toggle btn-login badge rounded-pill " href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                           {{$name}}
                         </a>
                         <div class="dropdown-menu mt-2">
                            <a class="dropdown-item" href="#">Profile</a>
                            <div class="dropdown-divider"></div>
                            <form method="post" action="{{ route('logout') }}" class="inline">
                              @csrf
                               <button type="submit" id="logincss" class="dropdown-item">
                                     {{ __('Log Out') }}
                              </button>
                            </form>
                           </div>
                     </div>
                  </li> --}}
               @else
                  <li class="nav-item">
                    <a class="btn shadow" id="logincss" href="{{ route('login') }}">Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="btn shadow" href="{{ route('register') }}">Register</a>
                  </li>
               @endauth
               @endif
             </ul>
          </div>
       </nav>
    </div>
 </header>