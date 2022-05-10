<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name', 'Taxman') }}</title>
    <!-- plugins:css -->
    <link rel="shortcut icon" type="image/x-icon" href="img/icons/favicon.png">
    <link rel="stylesheet" href="{{asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/typicons/typicons.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/shared/style.css')}}">
    <!-- endinject -->
    <link href="{{asset('/admin/vendors/icons/css/materialdesignicons.min.css')}}" media="all" rel="stylesheet" type="text/css" />
    <style>
    .auth.theme-two .auto-form-wrapper {
    padding: 50px 5% 5%!important;
     }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper auth p-0 theme-two">
          <div class="row d-flex align-items-stretch">
            <div class="col-md-4 banner-section d-none d-md-flex align-items-stretch justify-content-center">
              <div class="slide-content bg-1" > </div>
            </div>
            <div class="col-12 col-md-8 h-100 bg-white">
              <div class="auto-form-wrapper d-flex align-items-center justify-content-center flex-column">
               
                <form action="{{route('admin.loginpage')}}" method="post">
                  @csrf
                  <div class="text-center">
                  <a href="/">
                  <img style="width:120px;" src="{{asset('web/img/T-only.png')}}" class="logo" alt="logo images">
                  </a>
                  </div>

                  <h3 class="mr-auto text-center mb-4">Taxman Admin</h3><br>
                    @if(Session::has('error'))
                    <div class="alert alert-danger">
                    {{Session::get('error')}}
                    </div>
                    @endif
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-secondary">
                          <i  style="color:black;"  class="mdi mdi-email-outline"></i>
                        </span>
                      </div>
                      <input type="email" class="form-control" name="email" :value="old('email')" required autofocus placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend ">
                        <span class="input-group-text bg-secondary">
                          <i style="color:black;" class="mdi mdi-lock-outline"></i>
                        </span>
                      </div>
                      <input type="password" class="form-control" placeholder="Password" name="password" required autocomplete="current-password">
                    </div>
                  </div>
                  <div class="form-group text-center">
                    <button class="btn btn-block btn-primary submit-btn">SIGN IN</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('admin/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('admin/js/shared/off-canvas.js')}}"></script>
    <script src="{{asset('admin/js/shared/hoverable-collapse.js')}}"></script>
    <script src="{{asset('admin/js/shared/misc.js')}}"></script>
    <script src="{{asset('admin/js/shared/settings.js')}}"></script>
    <script src="{{asset('admin/js/shared/todolist.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>

</html>