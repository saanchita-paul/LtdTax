<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>@if(Request::url() != url('/') ){{$title ?? ''}} ::@endif {{ config('app.name', '') }}</title>
<meta name="description" content="{{$title ?? ''}}">
<meta name="keywords" content="{{$title ?? ''}}">
<meta http-equiv="refresh" content="600">
<meta name="author" content="taxman.com.bd">
<meta name="Developer" content="eMythMakers.com">
<meta name="resource-type" content="document">
<meta name="contact" content="">
<meta name="copyright" content="Copyright (c).">
<meta name="robots" content="index, follow">
<meta name="googlebot" content="index, follow">
<meta name="msnbot" content="index, follow">
@if(Request::url() != url('/login') )
@if(Request::url() != url('/register') )
@if(Request::url() != url('/employer/register') )
<meta property="fb:app_id" content="">
<meta property="og:site_name" content="The Taxman">
<meta property="og:title" content="{{$title ?? ''}}">
<meta property="og:description" content="{!! $description ?? '' !!}">
<meta property="og:url" content="<?php echo url()->current();?>">
<meta property="og:type" content="article">
<meta property="og:image" content="@if($meta_img != ''){{asset('uploads/news/'.$meta_img)}} @else {{asset('web/media/common/logo.png')}} @endif">
<meta property="og:locale" content="en_US">
<meta name="twitter:card" content="@if($meta_img != ''){{asset('uploads/news/'.$meta_img)}} @else {{asset('web/media/common/logo.png')}} @endif" />
<meta name="twitter:description" content="@if($description) {!! $description !!} @endif" />
<meta name="twitter:title" content="{{$title ?? ''}}" />
<meta name="twitter:site" content="The Taxman" />
<meta name="twitter:image" content="@if($meta_img != ''){{asset('uploads/blog/'.$meta_img)}} @else {{asset('web/media/common/logo.png')}} @endif" />
<meta name="twitter:creator" content="The Taxman" />
<link rel="image_src" href="@if($meta_img != '') {{asset('web/media/common/'.$meta_img)}} @else {{asset('web/media/common/logo-fb.png')}} @endif">
<link rel="publisher" href="">
<link rel="canonical" href="<?php echo url()->current();?>">
@endif
@endif
@endif
<link type="image/x-icon" rel="shortcut icon" href="{{asset('admin/images/T-only.png')}}">
<link type="image/x-icon" rel="icon" href="{{asset('admin/images/T-only.png')}}">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com"> 
<link href="https://fonts.googleapis.com/css2?family=Dosis&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">  
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
<link rel="stylesheet" type="text/css" href="{{asset('web/common/slick-1.8.1/slick/slick.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('web/common/slick-1.8.1/slick/slick-theme.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('web/common/bootstrap-4.3.1-dist/css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('web/common/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('web/common/css/eMythMakers.css?dt=')}}{{date('d-m-YH:i:s')}}">
<link rel="stylesheet" type="text/css" href="{{asset('web/common/ekko-lightbox/ekko-lightbox.min.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap4-toggle/3.6.1/bootstrap4-toggle.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
<link rel="stylesheet" href="{{asset('admin/vendors/summernote/dist/summernote-bs4.css')}}">
<link rel="stylesheet" href="{{asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="{{asset('admin/vendors/select2/select2.min.css')}}">
@stack('css')
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-FF4M2199K2"></script>
<script>window.dataLayer=window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'G-FF4M2199K2');</script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-PBP6LZ2');</script>
<!-- End Google Tag Manager -->
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PBP6LZ2" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="fb-root"></div>
<script>(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id;js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>
@include('layouts.navbar')

@yield('content')

@include('layouts.footer')
<link rel="stylesheet" href="{{asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('web/flipbook/css/flipbook.style.css')}}">
<script type="text/javascript" src="{{asset('web/common/jQuery-2.2.4/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script type="text/javascript" src="{{asset('web/common/bootstrap-4.3.1-dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/vendors/summernote/dist/summernote-bs4.min.js')}}"></script>
<script src="{{asset('admin/js/shared/editorDemo.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap4-toggle/3.6.1/bootstrap4-toggle.min.js"></script>
<script type="text/javascript" src="{{asset('web/flipbook/js/flipbook.min.js')}}"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/animateCSS/1.2.2/jquery.animatecss.min.js"></script>
<script type="text/javascript" src="{{asset('web/common/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
<script type="text/javascript" src="{{asset('web/common/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('web/common/js/eMythMakers.js')}}"></script>
<script type="text/javascript" src="{{asset('web/js/controls.js')}}"></script>
<script type="text/javascript" src="{{asset('web/js/easing.js')}}"></script>
<script type="text/javascript" src="{{asset('web/js/jquery.filterizr.js')}}"></script>
<script type="text/javascript" src="{{asset('web/js/wow.min.js')}}"></script>
<script src="{{asset('admin/vendors/datatables.net/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('web/js/wow.min.js')}}"></script>
<script>new WOW().init();</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.0/jquery.flexslider.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/xzoom/dist/xzoom.min.js"></script>
<script type="text/javascript" src="https://hammerjs.github.io/dist/hammer.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/foundation.min.js"></script>
<script type="text/javascript" src="{{asset('web/common/slick-1.8.1/slick/slick.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script src="{{asset('admin/vendors/summernote/dist/summernote-bs4.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
<script src="https://cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>
<script src="{{asset('admin/js/shared/data-table.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="{{asset('admin/vendors/select2/select2.min.js')}}"></script>
@stack('js')
<script>
    window.onscroll = function() {myFunction()};
    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;

    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
</script>
<!-- home search salary range  -->
<script type="text/javascript">
$(document).ready(function() {

  $("#slider-range").slider({
    range: true,
    min: 200,
    max: 300000,
    values: [200, 300000],
    slide: function(event, ui) {
      $("#salary").val("TK. " + ui.values[0] + " - Tk. " + ui.values[1]);
    }
  });
  
  $("#search").click(function(e){
    var [min, max] = $("#slider-range").slider("option", "values");
    console.log(min, max);
  });
});
</script>
<!-- home search age range  -->
<script type="text/javascript">
$(document).ready(function() {

  $("#age-range").slider({
    range: true,
    min: 18,
    max: 60,
    values: [18, 60],
    slide: function(event, ui) {
      $("#age").val("Age: " + ui.values[0] + " - " + ui.values[1]);
    }
  });
  
  $("#search").click(function(e){
    var [min, max] = $("#age-range").slider("option", "values");
    console.log(min, max);
  });
});
</script>
<script type="text/javascript">
  $(document).ready(function() {

  $("a#inline").fancybox({
    'hideOnContentClick': true
  });

  /* Apply fancybox to multiple items */
  
  $("a.group1").fancybox({
    'transitionIn'  : 'elastic',
    'transitionOut' : 'elastic',
    'speedIn'   : 600, 
    'speedOut'    : 200, 
    'overlayShow' : false
  });

});
</script>
<script>
$(window).load(function() {
    var $st = $('.pagination');
    var $slickEl = $('.center');
    
    $slickEl.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
      var i = (currentSlide ? currentSlide : 0) + 1;
      $st.text(i + ' of ' + slick.slideCount);
    });
    
    $slickEl.slick({
      centerMode: true,
      centerPadding: '100px 0',
      slidesToShow: 4,
      // focusOnSelect: true,
      dots: false,
      infinite: true,
      // autoplay: true,
      // autoplaySpeed: 5000,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 1
          }
        }
      ]
    });
});
</script>
<!--=======Select Number of person(Range)========-->
<script>
const settings={
  fill: '#888',
  background: '#d7dcdf'
}
const sliders = document.querySelectorAll('.range-slider');
Array.prototype.forEach.call(sliders,(slider)=>{
  slider.querySelector('input').addEventListener('input', (event)=>{
    slider.querySelector('span').innerHTML = event.target.value;
    applyFill(event.target);
  });
  applyFill(slider.querySelector('input'));
});

function applyFill(slider) {
  const percentage = 100*(slider.value-slider.min)/(slider.max-slider.min);
  const bg = `linear-gradient(90deg, ${settings.fill} ${percentage}%, ${settings.background} ${percentage+0.1}%)`;
  slider.style.background = bg;
}
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
<script>
  $(document).ready( function () {
    $('#application-history').DataTable({
      scrollY:        "300px",
      fixedColumns:   {
      leftColumns: 1,
      rightColumns: 1
    }
    });
  });
</script>
<script>
  $('#bill_division_id').on('change',function(){
    var divisionID = $(this).val();
    if(divisionID)
    {
      $.ajax({
          url : "{{url('/getdistrict')}}/"+divisionID,
          type : "GET",
          dataType : "json",
          success:function(district)
          {
        //    console.log(district);
          $('#bill_district_id').prop("disabled", false);
            $('#bill_district_id').empty();
            $('#bill_district_id').append('<option value="">Select District</option>');
            $.each(district, function(key,value){
                $('#bill_district_id').append('<option value="'+ value.id +'">'+ value.name +'</option>');
            });
          }
      });
    }
    else {
      $('#bill_district_id').empty();
    }
  });
  $('#ship_division_id').on('change',function(){
    var divisionID = $(this).val();    
    if(divisionID)
    {
      $.ajax({
        url : "{{url('/sgetdistrict')}}/"+divisionID,
        type : "GET",
        dataType : "json",
        success:function(district)
        {
        $('#ship_district_id').prop("disabled", false);
          $('#ship_district_id').empty();
          $('#ship_district_id').append('<option value="">Select District</option>');
          $.each(district, function(key,value){
              $('#ship_district_id').append('<option value="'+ value.id +'">'+ value.name +'</option>');
          });
        }
      });
    }
    else {
      $('#ship_district_id').empty();
    }
  });

    function catchange(id,title){
        // var id = id;
        // console.log(title);
        let cat_title = '<div style="margin-top:18px;display: inline-block;" class="cat-title bg-secondary text-white p-1 rounded mt-4"><span>'+title+'</span> <i style="" class="fa fa-window-close title-rmv"></i></div>'
        
        $('#filter_value #cat-t').html(cat_title)
        $.ajax({
        url : "{{url('/catfilter')}}/"+id,
        type : "GET",
        dataType : "json",
        success:function(data)
        {
        let h='';
        h+='<h6 class="text-center bg-secondary text-white p-2 v-det rounded">Click the job title to view details</h6>'
        let dat ='';
        let month='';
        let year='';
        $.each(data, function(i, e) {
             let qualification = e.qualification
             //deadline
             let deadline = e.deadline
             if(deadline){
              let date = new Date(deadline)
              d= date.toDateString()
              let  r = d.split(' ')
              month = r[1]
              month = monthFullName(month)
              dat = r[2]
              dat = dat.replace(/^0+/, '');
              dat = ordinal_suffix_of(dat).trim()
              year = r[3]
             }
            //qualification
            let experience =e.experience;
            if(qualification){
              qualification = qualification.trim() 
              qualification = qualification.replace(/<[^>]+>/g, '')
              let c_len = qualification.length;
              if(c_len > 46){
                qualification = qualification.substr(0,45)
                qualification  = qualification+'...'
              }
            }
            //EXPERIENCE
            if(experience){
              experience = experience.trim() 
              experience = experience.replace(/<[^>]+>/g, '')
              let c_len = experience.length;
              if(c_len > 46){
                experience = experience.substr(0,45)
                experience  = experience+'...'
              }
            }
            h +='<div class="job-show-content">'
            h +='<div class="row">'
            h +='<div class="col-lg-8">'
            if( e.title != null){
            h +='<div class="job-title pt-2">'
            h +='<h6 class="font-weight-bold"><a class="color-tax" href="<?php echo url('/jobdetails/') ?>/'+e.job_id+'/'+e.slug+'"> '+e.title+'</a> </h6>'
            h +='</div>'}
            if( e.name != null){
            h +='<div class="organization-nm pt-2">'
            h +=' <h6 class="font-weight-bold">'+e.name+'</h6>'
            h +='</div>'
            }
            if( e.district_name != null){
            h +=' <div class="job-location pt-2">'
            h +='<h6><i class="fa fa-map-marker" aria-hidden="true"></i> '+e.district_name+' </h6>'
            h +='</div>'}
            if( qualification != null){
            h +='<div class="job-time pt-2">'
            h +='<h6><i class="fa fa-pencil" aria-hidden="true"></i> '+qualification+' </h6>'
            h +='  </div>'}
            if( experience){
            h +='<div class="job-ex pt-2">'
            h +='<h6> <i class="fa fa-briefcase" aria-hidden="true"></i> '+experience+' </h6>'
            h +='</div>'}
            if( e.min_salary != 0  && e.max_salary != 0){
            h +='<h6><i class="fa fa-money" aria-hidden="true"></i> '+'Tk. '+e.min_salary+' - '+'Tk. '+e.max_salary+'</h6>'}
            h +='</div>'
            h +='<div class="col-lg-4 d-flex align-items-end justify-content-end">'
            h +=' <div class="job-deatline">'
          
            if(deadline){
            h +=' <h6>Deadline : '+dat+' '+month+', '+year+'</h6>'
            }
            h +=' </div>'
            h +='</div>'
            h +=' </div>'
            h +='</div>'
                  
            });
            document.getElementById('catfilterid').innerHTML= h;

        }
        });
    }
    function monthFullName(m) {
      if (m == 'Jan') {
        return 'January';
      }
      if (m == 'Feb') {
        return 'February';
      }
      if (m == 'Mar') {
        return 'March';
      }
      if (m == 'Apr') {
        return 'April';
      }
      if (m == 'May') {
        return 'May';
      }
      if (m == 'Jun') {
        return 'June';
      }
      if (m == 'Jul') {
        return 'July ';
      }
      if (m == 'Aug') {
        return 'August';
      }
      if (m == 'Sep')
      {
        return 'September';
      }
      if (m == 'Oct')
      {
        return 'October';
      }
      if (m == 'Nov')
      {
        return 'November';
      }
      if (m == 'Dec')
      {
        return 'December';
      }
    }
    function ordinal_suffix_of(i) {
    var j = i % 10,
        k = i % 100;
    if (j == 1 && k != 11) {
        return i + "st";
    }
    if (j == 2 && k != 12) {
        return i + "nd";
    }
    if (j == 3 && k != 13) {
        return i + "rd";
    }
    return i + "th";
}
    $(document).ready(function(){
      $(document).on('click','.title-rmv',function(){
        $(this).parent('.cat-title').remove()
        console.log('helllo')
      });
    });
    function locationfilter(id){
        // var id = id;
         //  console.log(id);
        $.ajax({
        url : "{{url('/locationfilter')}}/"+id,
        type : "GET",
        dataType : "json",
        success:function(data)
        {
            // console.log(data);
            let h='';
        $.each(data, function(i, e) {
               h +='<div class="job-show-content">'
               h +='<div class="row">'
               h +='<div class="col-lg-8">'
               if( e.title != null){
               h +='<div class="job-title pt-2">'
               h +='<h5><a href="<?php echo url('/jobdetails/') ?>/'+e.job_id+'/'+e.slug+'"> '+e.title+'</a> </h5>'
               h +='</div>'}
               if( e.name != null){
               h +='<div class="organization-nm pt-2">'
               h +=' <h5>'+e.name+'</h5>'
               h +='</div>'
               }
               if( e.address != null){
               h +=' <div class="job-location pt-2">'
               h +='<h6><i class="fa fa-map-marker" aria-hidden="true"></i> '+e.address+' </h6>'
               h +='</div>'}
               if( e.degree != null){
               h +='<div class="job-time pt-2">'
               h +='<h6><i class="fa fa-pencil" aria-hidden="true"></i> '+e.degree+' </h6>'
               h +='  </div>'}
               if( e.experience != null){
               h +='<div class="job-ex pt-2">'
               h +='<h6> <i class="fa fa-briefcase" aria-hidden="true"></i> '+e.experience+' </h6>'
               h +='</div>'}
               h +='</div>'
               h +='<div class="col-lg-4 d-flex align-items-end justify-content-end">'
               h +=' <div class="job-deatline">'
               if( e.min_salary && e.max_salary != null){
               h +='<h5>Salary : Tk. '+e.min_salary+' - Tk. '+e.max_salary+'</h5>'}
               if( e.deadline != null){
               h +=' <h6>Deadline : '+e.deadline+'</h6>'}
               h +=' </div>'
               h +='</div>'
               h +=' </div>'
               h +='</div>'
                    
            });
            document.getElementById('catfilterid').innerHTML= h;
        }
        });
    }
    function companyfilter(id){
        // var id = id;
         //  console.log(id);
        $.ajax({
        url : "{{url('/companyfilter')}}/"+id,
        type : "GET",
        dataType : "json",
        success:function(data)
        {
            // console.log(data);
            let h='';
        $.each(data, function(i, e) {
               h +='<div class="job-show-content">'
               h +='<div class="row">'
               h +='<div class="col-lg-8">'
               if( e.title != null){
               h +='<div class="job-title pt-2">'
               h +='<h5><a href="<?php echo url('/jobdetails/') ?>/'+e.job_id+'/'+e.slug+'"> '+e.title+'</a> </h5>'
               h +='</div>'}
               if( e.name != null){
               h +='<div class="organization-nm pt-2">'
               h +=' <h5>'+e.name+'</h5>'
               h +='</div>'
               }
               if( e.address != null){
               h +=' <div class="job-location pt-2">'
               h +='<h6><i class="fa fa-map-marker" aria-hidden="true"></i> '+e.address+' </h6>'
               h +='</div>'}
               if( e.degree != null){
               h +='<div class="job-time pt-2">'
               h +='<h6><i class="fa fa-pencil" aria-hidden="true"></i> '+e.degree+' </h6>'
               h +='  </div>'}
               if( e.experience != null){
               h +='<div class="job-ex pt-2">'
               h +='<h6> <i class="fa fa-briefcase" aria-hidden="true"></i> '+e.experience+' </h6>'
               h +='</div>'}
               h +='</div>'
               h +='<div class="col-lg-4 d-flex align-items-end justify-content-end">'
               h +=' <div class="job-deatline">'
               if( e.min_salary && e.max_salary != null){
               h +='<h5>Salary : Tk. '+e.min_salary+' - Tk. '+e.max_salary+'</h5>'}
               if( e.deadline != null){
               h +=' <h6>Deadline : '+e.deadline+'</h6>'}
               h +=' </div>'
               h +='</div>'
               h +=' </div>'
               h +='</div>'                    
            });
            document.getElementById('catfilterid').innerHTML= h;
        }
        });
    }
</script>

<script>
  var min = 0; 
  var max = 0;
  $( function() {
    $( "#salary-slider-range" ).slider({
      range: true,
      min: 0,
      max: 120000,
      values: [ 10, 30000 ],
      slide: function( event, ui ) {
       $( "#salaryfillter" ).val( "৳ " + ui.values[ 0 ] + " - ৳ " + ui.values[ 1 ] );
        min = ui.values[0];
        max = ui.values[1];
      },
      change: function(event, ui) { 
        min = ui.values[0];
        max = ui.values[1]; 
      }
    });
  });
</script>
<script>
  var min = 0; 
  var max = 0;
  $( function() {
    $( "#age-limit" ).slider({
      range: true,
      min: 18,
      max: 60,
      values: [ 18, 60],
      slide: function( event, ui ) {  
       $( "#agefillter" ).val( "Age: " + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
        min = ui.values[0];
        max = ui.values[1];
      },
      change: function(event, ui) { 
        min = ui.values[0];
        max = ui.values[1]; 
      }
    });
  });
</script>
<script type="text/javascript">
    (function ($) {
    $(document).ready(function() {
        $('.xzoom, .xzoom-gallery').xzoom({zoomWidth: 400, title: true, tint: '#333', Xoffset: 15});
        $('.xzoom2, .xzoom-gallery2').xzoom({position: '#xzoom2-id', tint: '#ffa200'});
        $('.xzoom3, .xzoom-gallery3').xzoom({position: 'lens', lensShape: 'circle', sourceClass: 'xzoom-hidden'});
        $('.xzoom4, .xzoom-gallery4').xzoom({tint: '#006699', Xoffset: 15});
        $('.xzoom5, .xzoom-gallery5').xzoom({tint: '#006699', Xoffset: 15});

        //Integration with hammer.js
        var isTouchSupported = 'ontouchstart' in window;

        if (isTouchSupported) {
            //If touch device
            $('.xzoom, .xzoom2, .xzoom3, .xzoom4, .xzoom5').each(function(){
                var xzoom = $(this).data('xzoom');
                xzoom.eventunbind();
            });
            
            $('.xzoom, .xzoom2, .xzoom3').each(function() {
                var xzoom = $(this).data('xzoom');
                $(this).hammer().on("tap", function(event) {
                    event.pageX = event.gesture.center.pageX;
                    event.pageY = event.gesture.center.pageY;
                    var s = 1, ls;
    
                    xzoom.eventmove = function(element) {
                        element.hammer().on('drag', function(event) {
                            event.pageX = event.gesture.center.pageX;
                            event.pageY = event.gesture.center.pageY;
                            xzoom.movezoom(event);
                            event.gesture.preventDefault();
                        });
                    }
    
                    xzoom.eventleave = function(element) {
                        element.hammer().on('tap', function(event) {
                            xzoom.closezoom();
                        });
                    }
                    xzoom.openzoom(event);
                });
            });

        $('.xzoom4').each(function() {
            var xzoom = $(this).data('xzoom');
            $(this).hammer().on("tap", function(event) {
                event.pageX = event.gesture.center.pageX;
                event.pageY = event.gesture.center.pageY;
                var s = 1, ls;

                xzoom.eventmove = function(element) {
                    element.hammer().on('drag', function(event) {
                        event.pageX = event.gesture.center.pageX;
                        event.pageY = event.gesture.center.pageY;
                        xzoom.movezoom(event);
                        event.gesture.preventDefault();
                    });
                }

                var counter = 0;
                xzoom.eventclick = function(element) {
                    element.hammer().on('tap', function() {
                        counter++;
                        if (counter == 1) setTimeout(openfancy,300);
                        event.gesture.preventDefault();
                    });
                }

                function openfancy() {
                    if (counter == 2) {
                        xzoom.closezoom();
                        $.fancybox.open(xzoom.gallery().cgallery);
                    } else {
                        xzoom.closezoom();
                    }
                    counter = 0;
                }
            xzoom.openzoom(event);
            });
        });
        
        $('.xzoom5').each(function() {
            var xzoom = $(this).data('xzoom');
            $(this).hammer().on("tap", function(event) {
                event.pageX = event.gesture.center.pageX;
                event.pageY = event.gesture.center.pageY;
                var s = 1, ls;

                xzoom.eventmove = function(element) {
                    element.hammer().on('drag', function(event) {
                        event.pageX = event.gesture.center.pageX;
                        event.pageY = event.gesture.center.pageY;
                        xzoom.movezoom(event);
                        event.gesture.preventDefault();
                    });
                }

                var counter = 0;
                xzoom.eventclick = function(element) {
                    element.hammer().on('tap', function() {
                        counter++;
                        if (counter == 1) setTimeout(openmagnific,300);
                        event.gesture.preventDefault();
                    });
                }

                function openmagnific() {
                    if (counter == 2) {
                        xzoom.closezoom();
                        var gallery = xzoom.gallery().cgallery;
                        var i, images = new Array();
                        for (i in gallery) {
                            images[i] = {src: gallery[i]};
                        }
                        $.magnificPopup.open({items: images, type:'image', gallery: {enabled: true}});
                    } else {
                        xzoom.closezoom();
                    }
                    counter = 0;
                }
                xzoom.openzoom(event);
            });
        });

        } else {
            //If not touch device

            //Integration with fancybox plugin
            $('#xzoom-fancy').bind('click', function(event) {
                var xzoom = $(this).data('xzoom');
                xzoom.closezoom();
                $.fancybox.open(xzoom.gallery().cgallery, {padding: 0, helpers: {overlay: {locked: false}}});
                event.preventDefault();
            });
           
            //Integration with magnific popup plugin
            $('#xzoom-magnific').bind('click', function(event) {
                var xzoom = $(this).data('xzoom');
                xzoom.closezoom();
                var gallery = xzoom.gallery().cgallery;
                var i, images = new Array();
                for (i in gallery) {
                    images[i] = {src: gallery[i]};
                }
                $.magnificPopup.open({items: images, type:'image', gallery: {enabled: true}});
                event.preventDefault();
            });
        }
    });
})(jQuery);
</script>
<script type="text/javascript">
    $(window).load(function() {
  // The slider being synced must be initialized first

  let carousel = '#carousel';
  let slider = '#slider';

  for (var i = 1; i < 19; i++) {

    carousel = carousel+i;
    slider = slider+i;

      $('#carousel'+i).flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 105,
        itemMargin: 8,
        asNavFor: "#slider"+i
      });

      $('#slider'+i).flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        controlsContainer: $(".custom-controls-container"),
        sync: "#carousel"+i
      });

    carousel = '#carousel';
    slider = '#slider';
  }
});
</script>
<script>
    window.onscroll = function() {myFunction()};

    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;

    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
</script>
<script type="text/javascript">
    $(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 3
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 2
            }
        }]
    });
});

$(function() {
 $(".button").on("click", function() {
   var $button = $(this);
   var $parent = $button.parent(); 
   var oldValue = $parent.find('.input').val();

   if ($button.text() == "+") {
      var newVal = parseFloat(oldValue) + 1;
    } else {
       // Don't allow decrementing below zero
      if (oldValue > 1) {
        var newVal = parseFloat(oldValue) - 1;
        } else {
        newVal = 1;
      }
      }
    $parent.find('a.add-to-cart').attr('data-quantity', newVal);
    $parent.find('.input').val(newVal);
 });
});
</script>
<script>
function maxLengthCheck(object)
  {
    if (object.value.length > object.maxLength)
      object.value = object.value.slice(0, object.maxLength)
  }
</script>
<script type="text/javascript">
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2({
        placeholder: 'Select Skill',
        maximumSelectionLength: 12
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
<script>
  var checkbox = $('#changeShip'),
  chShipBlock = $('#changeShipInputs');
  chShipBlock.hide();
  checkbox.on('click', function() {
      if($(this).is(':checked')) {
        chShipBlock.show();
        chShipBlock.find('input').attr('required', true);
      } else {
        chShipBlock.hide();
        chShipBlock.find('input').attr('required', false);
      }
  })
</script>
<script>
  $(document).ready(function() {
    var cat_filter ='';
    var qua_filter ='';
    var pro_deg_filter ='';
    var sal_max='';
    var sal_min='';
    var age_min ='';
    var age_max ='';
    var exp_filter ='';
    var loc_filter='';


    $('.filter-input').change(function(){
      if($(this).attr('name')=='category'){
        cat_filter = $(this).val()
        if($('#cat-t').length > 0){
          let cat_title = '<div style="margin-top:18px;display: inline-block;" class="cat-title bg-secondary text-white p-1 rounded mt-4"><span>'+$(this).attr('data-title')+'</span> <i style="" class="fa fa-window-close title-rmv"></i></div>'
          $('#filter_value #cat-t').html(cat_title)
        }else{
          let cat_title = '<div id="cat-t" class="t_all"><div style="margin-top:18px;display: inline-block;" class="cat-title bg-secondary text-white p-1 rounded mt-4"><span>'+$(this).attr('data-title')+'</span> <i style="" class="fa fa-window-close title-rmv"></i></div></div>'
          $('#filter_value').append(cat_title)
        }
      }
      else if($(this).attr('name')=='qualification'){
        qua_filter = $(this).val()
        if($('#qua-t').length > 0){
          let qua_title = '<div style="margin-top:18px;display: inline-block;" class="cat-title bg-secondary text-white p-1 rounded mt-4"><span>'+$(this).attr('data-title')+'</span> <i style="" class="fa fa-window-close title-rmv"></i></div>'
          $('#filter_value #qua-t').html(qua_title)
        }else{
          let qua_title = '<div id="qua-t" class="t_all"><div style="margin-top:18px;display: inline-block;" class="cat-title bg-secondary text-white p-1 rounded mt-4"><span>'+$(this).attr('data-title')+'</span> <i style="" class="fa fa-window-close title-rmv"></i></div></div>'
          $('#filter_value').append(qua_title)
        }
      }
      else if($(this).attr('name')=='pro_degree'){
        pro_deg_filter = $(this).val()
        if($('#deg-t').length > 0){
          let deg_title = '<div style="margin-top:18px;display: inline-block;" class="cat-title bg-secondary text-white p-1 rounded mt-4"><span>'+$(this).attr('data-title')+'</span> <i style="" class="fa fa-window-close title-rmv"></i></div>'
          $('#filter_value #deg-t').html(deg_title)
        }else{
          let deg_title = '<div id="deg-t" class="t_all"><div style="margin-top:18px;display: inline-block;" class="cat-title bg-secondary text-white p-1 rounded mt-4"><span>'+$(this).attr('data-title')+'</span> <i style="" class="fa fa-window-close title-rmv"></i></div></div>'
          $('#filter_value').append(deg_title)
        }
      }
      else if($(this).attr('name')=='expe'){
        exp_filter = $(this).val()
        if($('#exp-t').length > 0){
          let exp_title = '<div style="margin-top:18px;display: inline-block;" class="cat-title bg-secondary text-white p-1 rounded mt-4"><span>'+$(this).val()+' years</span> <i style="" class="fa fa-window-close title-rmv"></i></div>'
          $('#filter_value #exp-t').html(exp_title)
        }else{
          let exp_title = '<div id="exp-t" class="t_all"><div style="margin-top:18px;display: inline-block;" class="cat-title bg-secondary text-white p-1 rounded mt-4"><span>'+$(this).val()+' years</span> <i style="" class="fa fa-window-close title-rmv"></i></div></div>'
          $('#filter_value').append(exp_title)
        }
      }
      else if($(this).attr('name')=='location'){
        loc_filter = $(this).val()
        if($('#loc-t').length > 0){
          let loc_title = '<div style="margin-top:18px;display: inline-block;" class="cat-title bg-secondary text-white p-1 rounded mt-4"><span>'+$(this).attr('data-title')+'</span> <i style="" class="fa fa-window-close title-rmv"></i></div>'
          $('#filter_value #loc-t').html(loc_title)
        }else{
          let loc_title = '<div id="loc-t" class="t_all"><div style="margin-top:18px;display: inline-block;" class="cat-title bg-secondary text-white p-1 rounded mt-4"><span>'+$(this).attr('data-title')+'</span> <i style="" class="fa fa-window-close title-rmv"></i></div></div>'
          $('#filter_value').append(loc_title)
        }
      }
      jobFilter()
    });

    
    $('#salary-slider-range').on('slide',function(event,ui){
        sal_min = ui.values[0];
        sal_max= ui.values[1];
        if($('#sal-t').length > 0){
          let sal_title = '<div style="margin-top:18px;display: inline-block;" class="cat-title bg-secondary text-white p-1 rounded mt-4"><span>Tk. '+sal_min+' - Tk. '+sal_max+'</span> <i style="" class="fa fa-window-close title-rmv"></i></div>'
          $('#filter_value #sal-t').html(sal_title)
        }else{
          let sal_title = '<div id="sal-t" class="t_all"><div style="margin-top:18px;display: inline-block;" class="cat-title bg-secondary text-white p-1 rounded mt-4"><span>'+sal_min+' - Tk. '+sal_max+'</span> <i style="" class="fa fa-window-close title-rmv"></i></div></div>'
          $('#filter_value').append(sal_title)
        }
        jobFilter()
    });

    $('#age-limit').on('slide',function(event,ui){
        age_min = ui.values[0];
        age_max= ui.values[1];
       
        if($('#age-t').length > 0){
          let age_title = '<div style="margin-top:18px;display: inline-block;" class="cat-title bg-secondary text-white p-1 rounded mt-4"><span>Age: '+age_min+' - '+age_max+' years</span> <i style="" class="fa fa-window-close title-rmv"></i></div>'
          $('#filter_value #age-t').html(age_title)
        }else{
          let age_title = '<div id="age-t" class="t_all"><div style="margin-top:18px;display: inline-block;" class="cat-title bg-secondary text-white p-1 rounded mt-4"><span>Age: '+age_min+' - '+age_max+' years</span> <i style="" class="fa fa-window-close title-rmv"></i></div></div>'
          $('#filter_value').append(age_title)
        }
        jobFilter()
    });

    function jobFilter(){
      var jobdata =  {
         'cat_filter':cat_filter,
         'qua_filter':qua_filter, 
         'pro_deg_filter':pro_deg_filter,
         'sal_max':sal_max,
         'sal_min':sal_min,
         'age_min':age_min,
         'age_max':age_max,
         'exp_filter':exp_filter,
         'loc_filter':loc_filter,
         "_token": "{{ csrf_token() }}",
      }

        $.ajax({
        url : "{{url('/jobfilter')}}",
        type : "POST",
        dataType : "json",
        data:jobdata,
        success:function(data)
        {
          console.log(data)
            let h='';
            let dat ='';
            let month='';
            let year='';
            let deadline='';
              h+='<h6 class="text-center bg-secondary text-white p-2 v-det rounded">Click the job title to view details</h6>'
            $.each(data, function(i, e) {
                deadline = e.deadline
              if(deadline){
                let date = new Date(deadline)
                d= date.toDateString()
                let  r = d.split(' ')
                month = r[1]
                month = monthFullName(month)
                dat = r[2]
                dat = dat.replace(/^0+/, '');
                dat = ordinal_suffix_of(dat).trim()
                year = r[3]
              }
               h +='<div class="job-show-content">'
               h +='<div class="row">'
               h +='<div class="col-lg-7">'
               if( e.title != null){
               h +='<div class="job-title">'
               h +='<h6 class="font-weight-bold"><a class="color-tax" href="<?php echo url('/jobdetails/') ?>/'+e.id+'/'+e.job_slug+'"> '+e.title+'</a> </h6>'
               h +='</div>'}
               if( e.alt_name != null){
               h +='<div class="organization-nm">'
               h +=' <h6 class="font-weight-bold">'+e.alt_name+'</h6>'
               h +='</div>'
               }
               else{
                h +='<div class="organization-nm">'
               h +=' <h6 class="font-weight-bold">'+e.company_name+'</h6>'
               h +='</div>'
               }
               if( e.district_name != null){
               h +=' <div class="job-location">'
               h +='<h6><i class="fa fa-map-marker" style="font-size:14px;" aria-hidden="true"></i> '+e.district_name+' </h6>'
               h +='</div>'}
               if( e.eduName != null){
               h +='<div class="job-time txt-limit">'
               h +='<h6><i class="fa fa-graduation-cap" style="font-size:14px;" aria-hidden="true"></i></h6> '+e.eduName+''
               h +='  </div>'}
               if( e.short_experience != null && e.short_experience != 0){
                if( e.short_experience == 1){
                h +='<div class="job-ex">'
                h +='<h6> <i class="fa fa-briefcase" style="font-size:14px;" aria-hidden="true"></i> At least '+e.short_experience+' year</h6>'
                h +='</div>'}
                else{
                  h +='<div class="job-ex">'
                h +='<h6> <i class="fa fa-briefcase" style="font-size:14px;" aria-hidden="true"></i> At least '+e.short_experience+' years</h6>'
                h +='</div>'
                }
              }
              if( e.min_salary  && e.max_salary != null){
                if( e.min_salary  && e.max_salary != 0){
                h +='<div class="job-ex">'
                h +='<h6><i style="font-size:14px;" class="fa fa-money"></i> Tk. '+e.min_salary+' - Tk. '+e.max_salary+'</h6>'
                h +='</div>'}
              }
              h +='</div>'
              if( deadline != null){
              h +='<div class="col-lg-5 d-flex align-items-end justify-content-end">'
              h +=' <div class="job-deatline">'
              h +=' <h6 class="m-0"><i style="font-size:14px;" class="fa fa-calendar" aria-hidden="true"></i> Deadline : '+dat +' ' +month +', '+year+'</h6>'}
              h +=' </div>'
              h +='</div>'
              h +=' </div>'
              h +='</div>'
              });
            document.getElementById('jobfilter').innerHTML= h;
        }
      });
    }
    function monthFullName(m) {
      if (m == 'Jan') {
        return 'January';
      }
      if (m == 'Feb') {
        return 'February';
      }
      if (m == 'Mar') {
        return 'March';
      }
      if (m == 'Apr') {
        return 'April';
      }
      if (m == 'May') {
        return 'May';
      }
      if (m == 'Jun') {
        return 'June';
      }
      if (m == 'Jul') {
        return 'July ';
      }
      if (m == 'Aug') {
        return 'August';
      }
      if (m == 'Sep')
      {
        return 'September';
      }
      if (m == 'Oct')
      {
        return 'October';
      }
      if (m == 'Nov')
      {
        return 'November';
      }
      if (m == 'Dec')
      {
        return 'December';
      }
    }
    function ordinal_suffix_of(i) {
		var j = i % 10,
			k = i % 100;
		if (j == 1 && k != 11) {
			return i + "st";
		}
		if (j == 2 && k != 12) {
			return i + "nd";
		}
		if (j == 3 && k != 13) {
			return i + "rd";
		}
		return i + "th";
	}
  });
</script>
@yield('js')
</body>
</html>
