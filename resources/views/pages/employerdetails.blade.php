@extends('master')

@section('content') 

<main>
    <div class="section-full content-inner-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="sticky-top">
                        <div class="row">
                            <!-- <div class="col-lg-12 col-md-6">
                                    <div class="m-b30">
                                        <img src="images/blog/grid/pic1.jpg" alt="">
                                    </div>
                                </div> -->
                            <div class="col-lg-12 col-md-6">
                                <div class="widget bg-white p-lr20 p-t20  widget_getintuch radius-sm">
                                    <h4 class="text-black font-weight-700 p-t10 m-b15">Company Details</h4>
                                    <ul>
                                        <li><i class="fa fa-map-marker" aria-hidden="true"></i><strong
                                                class="font-weight-700 text-black">Address</strong><span
                                                class="text-black-light"> @if(!empty($company_info->address)) {{$company_info->address}} @endif </span></li>
                                        <!-- <li><i class="fa fa-usd" aria-hidden="true"></i>
                                            <strong class="font-weight-700 text-black">Salary</strong> $800 Monthy
                                        </li> -->
                                        <!-- <li><i class="fa fa-shield" aria-hidden="true"></i>
                                            <strong class="font-weight-700 text-black">Experience</strong>6 Year
                                            Experience
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="job-info-box">
                        <h3 class="m-t0 m-b10 font-weight-700 title-head">
                            <a href="javascript:void(0);" class="text-secondry m-r30"> @if(!empty($company_info->name)) {{$company_info->name}} @endif</a>
                        </h3>
                        <ul class="job-info pl-0">
                            <li><strong>Website</strong> @if(!empty($company_info->url)) {{$company_info->url}} @endif</li>
                      
                            <!-- <li><i class="fa fa-map-marker" aria-hidden="true"></i>Dhaka</li> -->
                        </ul>
                        <p class="p-t20"></h5>
                        <!-- <div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div> -->
                        <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                            has been the industry's standard dummy text ever since the 1500s, when an unknown
                            printer took a galley of type and scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of
                            Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                            publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p> -->
                        <h5 class="font-weight-600">Company Description</h5>
                        <div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div>
                        <p>@if(!empty($company_info->description)) {!! $company_info->description !!} @endif</p>
                        <!-- <h5 class="font-weight-600">Job Requirements</h5>
                        <div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div> -->
                        <!-- <ul class="list-num-count no-round">
                            <li>The DexignLab Privacy Policy was updated on 25 June 2018.</li>
                            <li>Who We Are and What This Policy Covers</li>
                            <li>Remaining essentially unchanged It was popularised in the 1960s </li>
                            <li>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</li>
                            <li>DexignLab standard dummy text ever since</li>
                        </ul> -->
                       
                        <!-- <a href="jobs-applied-job.html" class="site-button">Apply This Job</a> -->
                       
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection