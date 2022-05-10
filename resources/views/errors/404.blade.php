<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title> {{ config('app.name', '') }}</title>

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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />


@stack('css')

</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id;js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>


@include('layouts.navbar')


<section class="not-found-page section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto text-center  pt-4 pb-5">
                    <h1><img class="img-fluid" src="{{asset('/web/img/404.png')}}" alt="404"></h1>
                    <h1>Sorry! Page not found.</h1>
                    <p class="land">The page you required is not found. We are sincerely sorry for that. We are taking you back to the home page. Thank you for stayin with Taxman. Any of your opinion will enrich us. Please email us your feedback:info@taxman.com taxman@gmail.com</p>
                    <div class="mt-5">
                        <a href="{{url('/')}}" class="btn btn-success btn-lg"><i class="mdi mdi-home"></i> GO TO HOME
                            PAGE</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


@include('layouts.footer')




<!--[if lt IE 9]>

<![endif]-->
<!-- https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js -->
<script type="text/javascript" src="{{asset('web/common/jQuery-2.2.4/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('web/common/bootstrap-4.3.1-dist/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/animateCSS/1.2.2/jquery.animatecss.min.js"></script>
<script type="text/javascript" src="{{asset('web/common/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
<script type="text/javascript" src="{{asset('web/common/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('web/common/js/eMythMakers.js')}}"></script>


<script type="text/javascript" src="{{asset('web/js/controls.js')}}"></script>
<script type="text/javascript" src="{{asset('web/js/easing.js')}}"></script>
<script type="text/javascript" src="{{asset('web/js/jquery.filterizr.js')}}"></script>
<script type="text/javascript" src="{{asset('web/js/wow.min.js')}}"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5fa108bfc648df27"></script>

<script src="{{asset('web/js/wow.min.js')}}"></script>
<script>new WOW().init();</script>


<script type="text/javascript" src="{{asset('web/common/slick-1.8.1/slick/slick.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<!-- <script type="text/javascript" src="{{asset('web/another/js/combining.js')}}"></script> -->


</body>
</html>
