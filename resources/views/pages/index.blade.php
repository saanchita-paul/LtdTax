@extends('master')

@section('content')
<style>
#publication{
    padding-top:70px;
}
.DPublicationList.align-self-stretch img {
    /* height: 206px; */
    max-height: 100%;
    /* align-self: center; */
}
.cImage {
    height: 270px;
    overflow: hidden;
    display: flex;
}

.comIMg{
    height: 56px;
    overflow: hidden;
    display: flex;
}

.DCompanyImg{
max-height: 100%;
}
.company-course-title{
}
.ConsultancyDetails{
    max-height:151px !important;
    text-align:justify;
}
.range-slider{
    padding: .375rem;
}
input[type="text"]:focus,
input[type="search"]:focus,
.uneditable-input:focus {   
  border-color: transparent;
  box-shadow: 0 ;
  outline: 0 none;
}
.DHotJobsList .HotJobListAll{list-style:none;overflow-y:auto;padding:5px 0 0;margin-bottom:0;}
.DHotJobsList .HotJobListAll li{list-style:none;}
.DHotJobsList .HotJobListAll li a i{padding-right:3px;}
.DHotJobsList .HotJobListAll li a{color:#797979;font-size:14px;border-bottom:1px solid #fff;line-height: 14px;}
.DCompanyImg {
    border-radius: 4px;
}
</style>
<main>
    <div class="container">
        <div class="row">
            @if(!empty($slider_images) && !empty($slider_gallery))
                <div class="col-sm-9 pr-0 mt-4">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                        <?php
                        $i = 0;
                        ?>
                        @foreach($slider_gallery as $gal)
                            @foreach($slider_images as $images)
                                @if($gal->id == $images->img_id)
                                    <div class="carousel-item  @if($i == 0) active @endif <?php $i++; ?>">
                                        <a class="" href="{{$gal->url}}">
                                            <img class="d-block w-100 img100 img-fluid"  src="{{asset('uploads/slider/'.$gal->slider_img)}}" alt="{{$gal->title}}">
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            @else
            <div class="col-sm-9 pr-0 mt-4">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <a class="" href=""><img class="d-block w-100 img100 img-fluid"
                                    src="{{asset('web/media/common/Banner1.png')}}" alt=""></a>
                        </div>
                        <div class="carousel-item">
                            <a class="" href=""><img class="d-block w-100 img100 img-fluid"
                                    src="{{asset('web/media/common/Banner2.png')}}" alt=""></a>
                        </div>
                        <div class="carousel-item">
                            <a class="" href=""><img class="d-block w-100 img100 img-fluid"
                                    src="{{asset('web/media/common/Banner3.png')}}" alt=""></a>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            @endif
            <div class="col-sm-3 pl-0">
                <form action="{{route('search.name')}}" method="GET" novalidate="novalidate">
                    <div class="search-sec mt-4">
                        <div class="row h-100">
                            <div class="col-sm-12 m-auto">
                                @if(!Auth::user())
                                <div class="DSearchType">
                                    <div class="row">
                                        <div class="col-sm-5 pr-0">
                                            <p>Job Seeker</p>
                                        </div>
                                        <div class="col-sm-7 text-right">
                                            <div class="SignUpbtn">
                                                <a href="/login">
                                                    <button type="button"  class="btn btn-danger loginbtn">Login</button>
                                                </a>
                                            </div>
                                            <div class="SignUpbtn">
                                                <a href="/register">
                                                    <button type="button" class="btn btn-danger signupbtn">Sign Up</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="DSearchType">
                                    <div class="row">
                                        <div class="col-sm-5 pr-0">
                                            <p>Employer</p>
                                        </div>
                                        <div class="col-sm-7 text-right">
                                            <div class="SignUpbtn">
                                                <a href="/login">
                                                    <button type="button"  class="btn btn-danger loginbtn">Login</button>
                                                </a>
                                            </div>
                                            <div class="SignUpbtn"><a href="/employer/register"><button type="button" class="btn btn-danger signupbtn">Sign Up</button></a></div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <button type="button" class="SearchTitle" data-toggle="modal" data-target="#myModal">Search for the right jobs <i class="fa fa-search"></i></button>
                                <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <div id="pac-container">
                                                    <p class="SearchTitleInner">Search for the right job for you</p>
                                                    <input id="pac-input" type="text" class="form-control search-slt mb-3" placeholder="Search by job title" name="searchname">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <select class="form-control search-slt mb-3"  name="job_cat" id="exampleFormControlSelect1">
                                                                <option value="" class="selected">Category</option>
                                                                @foreach($job_cat as $joc)
                                                                <option value="{{$joc->id}}">{{ $joc->title }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <select class="form-control search-slt mb-3" name="qua" id="exampleFormControlSelect1">
                                                                <option value="" class="selected"><strong>Academic Qualification</strong></option>
                                                                @foreach($education as $edu)
                                                                <option value="{{$edu->id}}">{{ $edu->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <select class="form-control search-slt mb-3" name="pro_degree" id="exampleFormControlSelect1">
                                                                <option value="" class="selected"><strong>Porfessional Degree</strong></option>
                                                                @foreach($professional_degree as $degree)
                                                                <option value="{{$degree->id}}">{{ $degree->degree_title }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">Experience</span>
                                                                </div>
                                                                <select class="form-control filter-input" name="exp">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                        for($i=1; $i<=50; $i++)
                                                                        { ?>
                                                                        <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1">Year/Years</span>
                                                                </div>                                                      
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <select class="form-control search-slt mb-3" name="location" id="exampleFormControlSelect1">
                                                                <option value="" class="selected" >Location</option>
                                                                @foreach($location as $loc)
                                                                <option value="{{$loc->id}}">{{ $loc->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="level_name">Salary</div>
                                                            <div class="range-slider mb-3">
                                                                <input type="text" id="salary" readonly value="" name="salary" class="salary" style="border:0; color:; font-weight:bold;font-size:12px;">
                                                                <span id="salary"></span>
                                                                <div id="slider-range"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="level_name">Age Limit</div>
                                                            <div class="range-slider">
                                                                <input type="text" id="age" readonly name="age" value=""  class="age" style="border:0; color:; font-weight:bold;font-size:12px;">
                                                                <div id="age-range"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button id="search" type="submit"  class="SearchTitleBtn">Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pac-card" id="pac-card">
                                    <div id="pac-container">
                                        <div class="OtherLinks">
                                            <h5>Quick links</h5>
                                            <div class="OtherLinksList">
                                                <ul>
                                                    <li><a href="/joblist"><i class="fa fa-angle-double-right"></i> Job List</a></li>
                                                    <li><a href="/joblist"><i class="fa fa-angle-double-right"></i> New Jobs (24 hrs)</a></li>
                                                    <li><a href="/joblist"><i class="fa fa-angle-double-right"></i>Contractual Jobs</a></li>
                                                    <li><a href="/joblist"><i class="fa fa-angle-double-right"></i> Part time Jobs</a></li>
                                                    <li><a href="/joblist"><i class="fa fa-angle-double-right"></i>Overseas Jobs</a></li>
                                                    <li><a href="/joblist"><i class="fa fa-angle-double-right"></i> WorkFrom Home</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="DStepArea">
        <div class="container">
            <div class="CatTitle CatTitleSM">
                <h2>Jobs <span></span></h2>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="DJobCategory">
                        <h3><i class="fa fa-list"></i> Browse Category</h3>
                        <ul class="DJobCategoryList">
                            <div class="row">
                                @foreach($job_cat as $joc)
                                <div class="col-md-3">
                                    <?php $job_count_cat =App\Models\Job::where('jobcat_id',$joc->id)->where('hot_job',0)->where('status',1)->get();?>
                                    <li>
                                    <a href="{{route('cat-job',['id'=>$joc->id,'slug'=>$joc->slug] )}}">
                                        <p>{{ $joc->title }} ({{ $job_count_cat->count() }})</p>
                                    </a>
                                    </li>
                                </div>
                                @endforeach
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="DHotJobs">
                <h3><i class="fa fa-list"></i> Hot Jobs</h3>
                <div class="row rowresize">
                    @foreach($job as $jo)
                        <div class="col-md-4">
                            <div data-id="{{$jo->id}}" class="DHotJobsList">
                                <div class="DCompanyProfile">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <a href="{{route('employer.details',[$jo->id])}}">
                                                <div class="DCompanyImg">
                                                <div class="comIMg">
                                                @if(!empty($jo->company_logo))
                                                    <img src="{{asset('uploads/cominfo/'.$jo->company_logo)}}" alt="{{$jo->company_name}}"
                                                        title="{{$jo->company_name}}" class="img-fluid img100">
                                                    @else
                                                    <img src="{{asset('uploads/cominfo/company_logo.png')}}"
                                                        alt="{{$jo->company_name}}">
                                                    @endif
                                                </div>

                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="row h-100 joblist-menu">
                                                <div class="col-sm-12 m-auto">
                                                    <div class="DCompanyName">
                                                        <a href="{{route('employer.details',[$jo->id])}}" title="{{$jo->company_name}}">
                                                            <h3 title="{{$jo->company_name}}">{{\Illuminate\Support\Str::limit($jo->company_name, 20, $end='...')}}</h3>
                                                        </a>
                                                    </div>
                                                    <ul class="HotJobList">
                                                        <?php  $com_job=App\Models\Job::where('status',1)->where('company_id',$jo->id)->where('hot_job',1)->limit(2)->get();
                                                        ?>
                                                        @foreach( $com_job as $cjob)
                                                            @if(!empty($cjob))
                                                                <li>
                                                                    <a href="{{url('jobdetails/'.$cjob->id.'/'.$cjob->slug)}}" title="{{$cjob->title}}">
                                                                        <i class="fa fa-caret-right"></i> {{\Illuminate\Support\Str::limit($cjob->title, 38, $end='...')}}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                    <ul class="HotJobListAll">
                                                        <?php  $com_job=App\Models\Job::where('status',1)->where('company_id',$jo->id)->where('hot_job',1)->get();
                                                        ?>
                                                        @foreach( $com_job as $cjob)
                                                            @if(!empty($cjob))
                                                                <li>
                                                                    <a href="{{url('jobdetails/'.$cjob->id.'/'.$cjob->slug)}}" title="{{$cjob->title}}">
                                                                        <i class="fa fa-caret-right"></i> {{\Illuminate\Support\Str::limit($cjob->title, 38, $end='...')}}
                                                                    </a>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="CatTitle mt-4">
            <h2>News <span></span></h2>
        </div>
        <div class="DNewsArea">
            <div class="row rowresize">
                @foreach($news as $new)
                <div class="col-sm-4 border-right">
                    <a href="{{route('news.details',[$new->id,$new->slug])}}">
                        <div class="DNewsList">
                            <div class="row">
                                <div class="col-sm-3 col-lg-4">
                                    <div class="Imgresize">
                                        <figure class="ImgViewer">
                                            <picture class="FixingRatio">
                                                @if($new->feature_img)
                                                <img class="img-fluid img100 Ratio Ratio16x9 ImgRatio"
                                                    src="{{asset('uploads/news/'.$new->feature_img)}}"
                                                    title="{{$new->name}}" alt="{{$new->name}}">
                                                @else
                                                <img src="{{asset('web/img/slider/utpal-shuvro2.jpg')}}"
                                                    alt="{{$new->name}}">
                                                @endif
                                            </picture>
                                        </figure>
                                    </div>
                                </div>
                                <div class="col-sm-9 col-lg-8">
                                    <div class="Desc">
                                        <h3 class="Title" title="{{$new->name}}">{{\Illuminate\Support\Str::limit($new->name, 73, $end='...')}}</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="BriefArea">
                                <p class="Brief">{{$new->short_desc}}.</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="DStepArea mt-5" id="publication">
        <div class="container">
            <div class="CatTitle">
                <h2 >Publications <span></span></h2>
            </div>
            <div class="DPublicationArea">
                <div class="row center">
                @foreach($books as $book) 
                    <div class="d-flex ">
                        <div class="DPublicationList align-self-stretch">
                            <a href="{{route('publication.details',[$book->id,$book->slug])}}">
                                <div class="cImage">
                                    @if($book->feature_img)
                                        <img src="{{asset('uploads/book/'.$book->feature_img)}}" alt="{{$book->title}}"
                                            title="{{$book->title}}" class="img-responsive img100">
                                    @else
                                        <img src="{{asset('web/img/slider/utpal-shuvro2.jpg')}}" alt="{{$book->title}}">
                                    @endif
                                </div>
                                <div class="BorderLeft">
                                    <h3 title="{{$book->name}}">{{\Illuminate\Support\Str::limit($book->name, 57, $end='...')}}<p></p>
                                    </h3>
                                </div>
                            </a>
                            <div class="PublicationTime text-center">
                                <p class="Time"><i class="fa fa-calendar" aria-hidden="true"></i><b> Published:</b>
                                    {{$book->created_at->format('jS M, Y')}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
                
            </div>
        </div>
    </div>
    <div class="container">
        <div class="CatTitle mt-4">
            <h2>Training <span></span></h2>
        </div>
        <div class="DTrainingArea">
            <div class="DVideoSlider">
                <div class="slider center">
                    @foreach($training as $train)
                    <div class="slide">
                        <a href="{{route('training.details',[$train->id,$train->slug])}}">
                            <div class="DTrainingList">
                                <div class="Imgresize">
                                    <figure class="ImgViewer">
                                        <picture class="FixingRatio">
                                            @if($train->train_img)
                                            <img class="img-fluid img100 Ratio Ratio16x9 ImgRatio"
                                                src="{{asset('uploads/training/'.$train->train_img)}}"
                                                title="{{$train->title}}" alt="{{$train->title}}">
                                            @else
                                            <img src="{{asset('web/img/slider/utpal-shuvro2.jpg')}}"
                                                alt="{{$train->title}}">
                                            @endif
                                        </picture>
                                    </figure>
                                </div>
                                <div class="item-list-content">
                                    <h2 class="company-course-title" title="{{$train->title}}">{{\Illuminate\Support\Str::limit($train->title, 26, $end='...')}}</h2>
                                    <span class="short-line"></span>
                                    <div class="date-time-stamp">
                                        <ul>
                                            <li><i class="fa fa-calendar-o" aria-hidden="true"></i>
                                            {!! date('d M',strtotime($train->start_date)) !!} - {!! date('d M',strtotime($train->end_date)) !!}, {!! date('Y',strtotime($train->start_date)) !!} </li>
                                            <li><i class="fa fa-clock-o" aria-hidden="true"></i>Total Hours : {{$train->duration}}</li>
                                        </ul>
                                    </div>
                                    <div class="price-block">
                                        <span class="course-reg-btn">Enroll Now</span>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="DStepArea mt-5">
        <div class="container">
            <div class="CatTitle">
                <h2>Consultancy <span></span></h2>
            </div>
            <div class="DConsultancyArea">
                <div class="row">
                    @foreach($consultancy as $consult)
                    <div class="col-md-4 border-right padding_left d-flex">
                        <div class="DConsultancyList align-self-stretch">
                            <a href="{{route('consultancy.details',[$consult->id,$consult->slug])}}">
                                <div class="Desc">
                                    <h3 class="ConsultancyTitle" title="{{$consult->title}}">{{\Illuminate\Support\Str::limit($consult->title, 40, $end='...')}}</h3>
                                    <!-- <p class="ConsultancyDetails" title="">
                                        {{\Illuminate\Support\Str::limit($consult->short_description, 350, $end='...')}}
                                    </p> -->
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- @if(!empty($team))
        <div class="OurTeamBG">
            <div class="container">
                <div class="CatTitle">
                    <h2>{{$team->title}}<span></span></h2>
                </div>
                <p class="AboutTeam">{!!$team->description!!}</p>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="text-center">
                            <img class="img-fluid img100" src="{{asset('uploads/team/'.$team->team_img)}}" alt="{{$team->title}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="OurTeamBG">
            <div class="container">
                <div class="CatTitle">
                    <h2>Our Team<span></span></h2>
                </div>
                <p class="AboutTeam">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                    laboris nisi ut aliquip ex ea commodo consequat.</p>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="text-center">
                            <img class="img-fluid img100" src="{{asset('web/media/common/img-07.png')}}" alt="Team Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif -->
</main>
@endsection
@section('js')
<script>
$(document).ready(function(){
    $('.HotJobList').show()
    $('.HotJobListAll').hide();
    $(".joblist-menu").hover(function(){
        $(this).find('.HotJobListAll').show();
        $(this).find('.HotJobList').hide();
    });
    $(".joblist-menu").mouseleave(function(){
        $(this).find('.HotJobList').show();
        $(this).find('.HotJobListAll').hide();
    });
});
</script>
@endsection