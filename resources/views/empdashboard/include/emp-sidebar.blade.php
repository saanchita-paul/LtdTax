<?php
$empinfo = DB::table('company_detail_infos')->where('user_id',Auth::user()->id)->first();
?>
<style>
.candidate-info img {
    border-radius: 50%;
    width: 150px;
    height: 150px;
    background-color: #fff;
    padding: 5px;
    margin-top: 20px;
    box-shadow:0px 0px 7px grey;
}
.candidate-info .candidate-detail {
    padding: 0;
    box-shadow: none;
}
h4.m-b5.font-weight-600 {
    margin-bottom: 13px;
}
.candidate-title {
    margin-top: 13px;
}
</style>
<div class="sticky-top">
    <div class="candidate-info company-info">
        <div class="candidate-detail text-center">
            <div class="text-center">
                @if(!empty($empinfo->logo))
                    <img src="{{asset('uploads/cominfo/'.$empinfo->logo)}}"alt="{{$empinfo->name}}"> 
                @else
                    <img src="{{asset('uploads/cominfo/company_logo.png')}}" alt="company logo">
                @endif
            </div>
            <div class="candidate-title">
                <h5 class="m-b5 ml-4 mb-4 font-weight-600 text-center"><a href="javascript:void(0);">@if(!empty($empinfo->name)) {{$empinfo->name}} @endif</a></h5>
            </div>
        </div>
        <ul>
            <li>
                <a href="/company/dashboard" @if(Request::url() === url('/company/dashboard')) class="active" @endif>
                    <i class="fa fa-user-o" aria-hidden="true"></i>
                    <span>Company Profile</span>
                </a>
            </li>
            <li>
                <a href="/company/job/select-cat" @if(Request::url() === url('/company/job/select-cat')) class="active" @endif>
                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                    <span>Post A Job</span>
                </a>
            </li>
            <li>
                <a href="/company/joblist" @if(Request::url() === url('/company/joblist')) class="active" @endif>
                    <i class="fa fa-list" aria-hidden="true"></i>
                    <span>Posted Joblist</span>
                </a>
            </li>
            <li>
                <a href="{{route('comprofile.settings')}}">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span>Profile Information</span>
                </a>
            </li>
            <li>
                <a href="{{route('compassword.settings')}}">
                    <i class="fa fa-key" aria-hidden="true"></i>
                    <span>Change Password</span>
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
                    <i class="fa fa-sign-out"  aria-hidden="true"></i>Sign Out
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>        
            </li>
        </ul>
    </div>
</div>