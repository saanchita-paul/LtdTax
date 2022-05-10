<!-- partial:partials/_navbar.html -->
<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper">
          <a class="navbar-brand brand-logo text-white" href="{{url('/dashboard')}}">
            <h2 class="ml-4 mt-2">Taxman</h2>
          <a class="navbar-brand brand-logo-mini" href="{{url('/dashboard')}}">
            <img src="https://www.bootstrapdash.com/demo/star-admin-pro/src/assets/images/logo-mini.svg" alt="logo" /> </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <?php 
                  $photo = Auth::user()->photo; 
              ?>
                 @if(!empty($photo))
                  <img class="img-xs rounded-circle" src="{{asset('uploads/users/'.$photo)}}" alt="{{Auth::user()->name}}">
                  @else
                  <img class="img-xs rounded-circle" src="{{asset('admin/images/faces/face8.jpg')}}" alt="{{Auth::user()->name}}">
                  @endif
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                <?php 
                  $user_img = Auth::user()->photo; 
                ?>                                  
                  @if(!empty($photo))
                  <img class="img-xs rounded-circle" src="{{asset('uploads/users/'.$photo)}}" alt="{{Auth::user()->name}}">
                  @else
                  <img class="img-xs rounded-circle" src="{{asset('admin/images/faces/face8.jpg')}}" alt="{{Auth::user()->name}}">
                  @endif
                  <p class="mb-1 mt-3 font-weight-semibold">{{ Auth::user()->name }}</p>
                  <p class="font-weight-light text-muted mb-0">{{ Auth::user()->email }}</p>
                </div>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary"></i>Sign Out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>