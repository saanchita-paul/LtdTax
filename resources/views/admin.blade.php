<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex,nofollow">
    <meta name="googlebot" content="noindex, nofollow">
    <meta name="msnbot" content="noindex, nofollow">
    <title>{{ config('app.name', 'Tax Man') }}</title>
    <!-- plugins:css -->
    <!-- <link rel="stylesheet" href="{{asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}"> -->
    <link rel="stylesheet" href="{{asset('admin/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/typicons/typicons.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/dropify/dropify.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('web/common/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.9.55/css/materialdesignicons.min.css">
        <!-- Plugin css for this page -->
    <!-- <link rel="stylesheet" href="{{asset('admin/vendors/summernote/dist/summernote-bs4.css')}}"> -->
    <link rel="stylesheet" href="{{asset('admin/vendors/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/select2-bootstrap-theme/select2-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('admin/vendors/jvectormap/jquery-jvectormap.css')}}">
  
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('admin/css/shared/style.css')}}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('admin/css/demo_1/style.css')}}">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="{{asset('admin/images/T-only.png')}}" />
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <style>
    .alert-success {
    color:#007050;
    background-color: rgba(25, 216, 149, 0.2);
    border-color:transparent;
    }
    </style>
    @stack('css')
  </head>
  <body>
    <div class="container-scroller">
    @include('layouts.navbar-admin')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        
        @include('layouts.sidebar-admin')
        <!-- partial -->
        <div class="main-panel">
        @yield('content')
          <!-- content-wrapper ends -->
          @include('layouts.footer-admin')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
  <script src="{{asset('admin/vendors/justgage/raphael-2.1.4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 

  <!-- plugins:js -->
  <script src="{{asset('admin/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{asset('admin/vendors/select2/select2.min.js')}}"></script>
  <script src="{{asset('admin/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('admin/vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>
  <script src="{{asset('admin/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>

  <script src="{{asset('admin/vendors/justgage/justgage.js')}}"></script>
  <script src="{{asset('admin/vendors/dropify/dropify.min.js')}}"></script>
  <script src="{{asset('admin/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('admin/js/shared/off-canvas.js')}}"></script>
  <script src="{{asset('admin/js/shared/hoverable-collapse.js')}}"></script>
  <script src="{{asset('admin/js/shared/misc.js')}}"></script>
  <script src="{{asset('admin/js/shared/settings.js')}}"></script>
  <script src="{{asset('admin/js/shared/todolist.js')}}"></script>
  <script src="{{asset('admin/js/shared/dropify.js')}}"></script>
  <script src="{{asset('admin/js/shared/data-table.js')}}"></script>
  <script src="{{asset('admin/js/shared/select2.js')}}"></script>

  <!-- <script src="{{asset('admin/vendors/summernote/dist/summernote-bs4.min.js')}}"></script> -->
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="{{asset('admin/js/demo_1/dashboard.js')}}"></script>
  <!-- <script src="{{asset('admin/js/shared/editorDemo.js')}}"></script> -->

  <!-- End custom js for this page -->
  <script src="{{asset('admin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

  <script type="text/javascript">
    jQuery(document).ready(function ()
    {
            jQuery('.salary-type').on('change',function(){
               var salType = jQuery(this).val();
               if(salType==4)
               {
                jQuery('.min-salary').attr("disabled", "disabled"); 
                jQuery('.max-salary').attr("disabled", "disabled");
               }else{
                jQuery('.min-salary').prop("disabled", false);
                jQuery('.max-salary').prop("disabled", false);
               }
               
            });

            $('#accordionExample').collapse({
              toggle: false
            })

          //   $('#accordion .panel-default').on('click', function () {
          //     $('#accordion .panel-collapse').collapse('toggle');
          // });
          $('#collapseOne').collapse("hide");

          $('#accordionExample [data-toggle="collapse"]').on('click',function(){
               console.log($(this).attr('data-target'));
               let target = $(this).attr('data-target');
               if(!$(this).hasClass('collapsed')){
                $(target).collapse("hide");
               }
            });

    });
  </script>
  <script type="text/javascript">
	$(function(){
		$(".datepicker-popup").datepicker({
      dateFormat: 'DD-MMMM-YYYY',
      dateFormat: 'dd-mm-yy'
    });
    
    $(".start_date1").datepicker({
        minViewMode: 'years',
        autoclose: true,
        format: 'yyyy'
		});
	});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('.select-icon').select2({
        placeholder: 'Select icon',
        templateResult: iformat,
        templateSelection: iformat
        // maximumSelectionLength: 5
    });
    
    });    
    function iformat (opt) {
        if (!opt.id) {
            return opt.text.toUpperCase();
        }
        console.log(opt)
        var optimage = $(opt.element).attr('data-icon'); 
        console.log(optimage)
        if(!optimage){
          return opt.text.toUpperCase();
        } else {                    
            var $opt = $(
              '<span><i class="' + optimage + '" width="100"></i> ' + opt.text.toUpperCase() + '</span>'
            );
            return $opt;
        }
    }
</script>
<script>
$(document).ready(function(){
  $("#social").DataTable()
});

$(function() {
  $('.toggle-class').change(function() {
      var status = $(this).prop('checked') == true ? 1 : 0; 
      var social_id = $(this).data('id'); 
      console.log(social_id);
      console.log(status);
      $.ajax({
          type: "GET",
          dataType: "json",
          url: '/admin/footer/social-media-icon/changeStatus',
          data: {'status': status, 'social_id': social_id},
          success: function(data){
            console.log(data)
          }
      });
  })
})
</script>
<!-- trainer select with image -->
   <script type="text/javascript">
    $(document).ready(function() {
    $('.trainer-select').select2({
        placeholder: 'Select Trainer',
        templateResult: formatState,
        templateSelection: formatState
        // maximumSelectionLength: 5
    });
    
    });
    //dropdown image select 2 
    function formatState (opt) {
        if (!opt.id) {
            return opt.text.toUpperCase();
        } 
        var optimage = $(opt.element).attr('data-image'); 
        console.log(optimage)
        if(!optimage){
          return opt.text.toUpperCase();
        } else {                    
            var $opt = $(
              '<span><img src="' + optimage + '" width="50" /> ' + opt.text.toUpperCase() + '</span> '
            );
            return $opt;
        }
    }
    </script>
    <!-- slider image select -->
   <script type="text/javascript">
    $(document).ready(function() {
    $('.select_slider_img').select2({
        placeholder: 'Select Image',
        templateResult: formatImage,
        templateSelection: formatImage
        // maximumSelectionLength: 5
    });
    
    });
    //dropdown image select 2 
    function formatImage (opt) {
        if (!opt.id) {
            return opt.text.toUpperCase();
        } 
        var optimage = $(opt.element).attr('data-image'); 
        console.log(optimage)
        if(!optimage){
          return opt.text.toUpperCase();
        } else {                    
            var $opt = $(
              '<span><img src="' + optimage + '" width="30" height="30" /> ' + opt.text.toUpperCase() + '</span> '
            );
            return $opt;
        }
    }
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2({
        placeholder: 'Select Book',
        // maximumSelectionLength: 5
    });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
    $('.professional-degree').select2({
        placeholder: 'Select Degree',
        maximumSelectionLength: 12
    });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
    $('.skill-multiple').select2({
        placeholder: '--Select Skill--',
        maximumSelectionLength: 12
    });
    });
</script>
    <script type="text/javascript">
    $(document).ready(function() {
    $('.multiple-cat').select2({
        placeholder: 'Select Category',
        // maximumSelectionLength: 5
    });
    });
    </script>
  <script type="text/javascript">
    $(document).ready(function() {
    $('.multiple-thana').select2({
        placeholder: 'Select Thana',
        // maximumSelectionLength: 5
    });
    });
    </script>
    <script src="https://cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>
    <script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
 </script>
 <script type="text/javascript">
    const min_s = $('#min_salary').val()
    const max_s = $('#max_salary').val()
    $(document).ready(function () {
        $("#salary").on('change', function(){
            console.log('hello')
            if($(this).val() == 4) {
                $('#min_salary').attr('disabled','disabled')
                $('#max_salary').attr('disabled','disabled')
                $('#min_salary').val('')
                $('#max_salary').val('')
            }
            else{
                $('#min_salary').removeAttr('disabled')
                $('#max_salary').removeAttr('disabled')
                $('#min_salary').val(min_s)
                $('#max_salary').val(max_s)
            }
        });
    });
 </script>
  @yield('js')
  </body>

</html>