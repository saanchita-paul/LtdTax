<footer>
    <section id="DFooterTop">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <?php
                        $lets_know_us = App\Models\FooterLetUsKnow::where('status',1)->get();
                        $jobseeker = App\Models\FooterJobSeeker::where('status',1)->get();
                        $employer = App\Models\FooterEmployer::where('status',1)->get();
                        $social_icons = App\Models\FooterSocialMediaIcon::where('status',1)->get();
                    ?>
                    @if($lets_know_us->count() > 0)
                        <p class="FooterTitle">Let's Know Us</p>
                        <ul class="textwidget">
                            @foreach($lets_know_us as $let)
                            <li class="litextwidget"><a href="{{$let->url}}">{{$let->title}}</a></li>
                            @endforeach
                        </ul>
                    @else
                        <p class="FooterTitle">Let's Know Us</p>
                        <ul class="textwidget">
                            <li class="litextwidget"><a href="/mission_vision">Our Mission &amp; Vision</a></li>
                            <li class="litextwidget"><a href="#">Our Team</a></li>
                            <li class="litextwidget"><a href="/objectives">Objectives</a></li>
                            <li class="litextwidget"><a href="/terms-condition">Terms &amp; Conditions</a></li>
                            <li class="litextwidget"><a href="/privacy-policy">Privacy Policy</a></li>
                            <li class="litextwidget"><a href="#">Sitemap</a></li>
                        </ul>
                    @endif
                </div>
                <div class="col-sm-3">
                @if($jobseeker->count() > 0)
                    <p class="FooterTitle">Job Seekers</p>
                    <ul class="textwidget ">
                        @foreach($jobseeker as $js)
                            <li class="litextwidget"><a href="{{$js->url}}">{{$js->title}}</a></li>
                        @endforeach
                    </ul>
                @else
                    <p class="FooterTitle">Job Seekers</p>
                    <ul class="textwidget ">
                        <li class="litextwidget"><a href="/register">Create Account</a></li>
                        <li class="litextwidget"><a href="#">Career Counseling</a></li>
                        <li class="litextwidget"><a href="#">FAQ</a></li>
                        <li class="litextwidget"><a href="#">Video Guides</a></li>
                    </ul>
                @endif
                </div>
                <div class="col-sm-3">
                @if($employer->count() > 0)
                    <p class="FooterTitle">Employers</p>
                    <ul class="textwidget ">
                        @foreach($employer as $emp)
                            <li class="litextwidget"><a href="{{$emp->url}}">{{$emp->title}}</a></li>
                        @endforeach
                    </ul>
                @else
                    <p class="FooterTitle">Employers</p>
                    <ul class="textwidget ">
                        <li class="litextwidget"><a href="/employer/register">Create Account</a></li>
                        <li class="litextwidget"><a href="#">Products/Service</a></li>
                        <li class="litextwidget"><a href="/company/job/select-cat">Post a Job</a></li>
                        <li class="litextwidget"><a href="#">FAQ</a></li>
                    </ul>
                @endif
                </div>
                 <div class="col-sm-3">
                    @if($social_icons->count() > 0)
                        <p class="FooterTitle">Social Media</p>
                        <ul class="textwidget ">
                            @foreach($social_icons as $icons)
                                <li class="litextwidget"><a href="{{$icons->url}}"><i class="{{$icons->icon_class}}"></i>{{$icons->title}}</a></li>
                            @endforeach
                        </ul>
                    @else
                        <p class="FooterTitle">Social Media</p>
                        <ul class="textwidget ">
                            <li class="litextwidget"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                            <li class="litextwidget"><a href="#"><i class="fa fa-youtube-play"></i>Youtube</a></li>
                            <li class="litextwidget"><a href="#"><i class="fa fa-linkedin"></i>Linkedin</a></li>
                            <li class="litextwidget"><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                            <li class="litextwidget"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <img src="{{asset('images/SSLCOMMERZ_all_pay.png')}}" alt="Images of Payment Gateways">
                </div>
            </div>
        </div>
    <div class="DFooter2Bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="DFooter2 DMarginT30">
                        <p>Copyright © 2021 | All right ® reserved by <a href="#">The Taxman</a>  | Developed by <a href="http://www.emythmakers.com/" target="_blank">eMythMakers.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
