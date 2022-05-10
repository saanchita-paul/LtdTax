@extends('master')
@section('content')
<style>
    .ct{
        margin-left: -9px;
        letter-spacing: .3px;
        font-weight: bold;
    }
    .green-text {
        color: #005B1D;
    }

    /* job-search-style-start */
    .tag-line {
        color: #999;
        font-size: 14px;
        margin-top: 25px;
        margin-left: -38px;
        color: #999;
        padding: 0;
    }

    .tag-line ul li {
        list-style: none;
        float: left;
        color: #fff;
        margin-right: 15px;
        margin-bottom: 15px;
    }

    .tag-line ul li i {
        color: white;
    }

    .training-details {

        padding-right: 0px;
        border-bottom: 1px solid #00000038;
        padding-bottom: 0;
    }

    .training-details h5 {
        font-weight: 600;
    }

    .training-details p {
        margin-bottom: 10px;
        padding-right: 30px;
        font-size: 14px;
    }

    .related-courses {

    }

    .training-list-text li {
        list-style: disclosure-closed;
        padding-top: 5px;
    }

    .tr-title h3 {
        color: #fff;
    }

    .course-mb {
        margin-bottom: 10px;
    }

    .filter-menu .panel-title {
        font-weight: unset !important;
    }

    .filter-menu .panel-group .panel-title:hover {
        color: white !important;
        text-decoration: none;
        background: #005A13;
    }

    .course-area {
        background: #005900;
        padding: 60px 0px;
        margin: 10px 0px 30px 0px !important;
    }

    .form {
        width: 100%;
        font-family: sans-serif;
        background: #fff;
        margin-top: 0 !important;
    }

    .selection-area {
        margin-top: 0;
    }

    .search-area {
        margin-top: 50px;
    }

    .search-right {
        display: inline-block;
    }

    .form-item {
        position: relative;
        margin: 0 !important;
    }

    .form-item input {
        display: block;
        width: 100%;
        height: 43px;
        background: transparent;
        border: 1px solid #A6A6A6;
        transition: all .3s ease;
        margin: 0 !important;
        padding: 0 15px
    }

    .form-item input:focus {
        border-color: #005900;
    }

    .sr {
        margin-bottom: 10px;
    }

    .form-item label {
        position: absolute;
        cursor: text;
        z-index: 2;
        top: 13px;
        left: 10px;
        font-size: 12px;
        font-weight: bold;
        background: #fff;
        padding: 0 10px;
        color: #999;
        transition: all .3s ease
    }

    .form-item input:focus+label,
    .form-item input:valid+label {
        font-size: 11px;
        top: -5px
    }

    .form-item input:focus+label {
        color: #005900;
    }

    /* selection-area-style-start */

    .btn.btn-default {
        background: #A6A6A691;
        border: none;
        border-radius: 0px;
        color: #000;
    }

    .btn.btn-default:hover {
        background: #005900;
        color: #fff;
    }

    .search-btn {
        display: inline-block;
    }

    .select-dropdown {
        display: inline-block;
    }

    select {
        padding: 10px;
        border: 1px solid #A6A6A6;
        color: #7B7A7A;
    }

    .job-search-btn {
        display: inline-block;
        margin-bottom: 2px;
    }
    .job-search-btn button{
        font-size: 14px;
        padding: 10px 40px;
        margin-bottom: 4px;
        background: #005900;
        border: none;
        color:#fff;
        border-radius: 0px;
    }
    .job-search-btn button:hover{
        background: #26341E;
        color:white;
        
    }
    .job-search-btn a {
        font-size: 14px;
        padding: 10px 40px;
        margin-bottom: 4px;
        background: #005900;
        border: none;
        border-radius: 0px;
    }

    .job-search-btn a:hover {
        background: #012401 !important;
    }

    .category-tr select {
        padding: 10px;
        border: 1px solid #A6A6A6;
        width: 100%;
    }

    .btn-link {
        color: #000 !important;
    }

    /* selection-area-style-end */

    /* job-filter-style-start */
    .tr_details {
        font-size: 14px;
    }

    .primary {
        min-height: 800px;
    }

    .panel-heading {
        position: relative;
        margin-top: 0;
    }

    .panel-heading .accordion-toggle:after {
        font-family: 'fontawesome';
        content: "\f068";
        position: absolute;
        right: 16px;
    }

    .panel-heading .accordion-toggle.collapsed:after {
        font-family: 'fontawesome';
        content: "\f067";
    }

    .filter-menu .panel {
        border-radius: 0;
        border: 1px solid #eeeeee;
    }

    .filter-menu .panel-heading {
        background: #fff;
        padding: 0;
    }

    .filter-menu .panel-title {
        color: #333333;
        font-weight: bold;
        display: block;
        padding: 16px;
    }

    .filter-menu a.panel-title {
        color: #fff;
    }

    .filter-menu a.panel-title:hover,
    .filter-menu a.panel-title:focus {
        color: #fff;
        text-decoration: none;
    }

    .filter-menu .panel-body {
        padding: 14px;
    }

    .filter-menu .panel-group {
        margin: -16px;
    }

    .filter-menu .panel-group .panel-title {
        background: #005900;
        transition: color, 0.5s, ease;
    }

    .filter-menu .panel-group .panel-title:hover {
        color: #FF0404;
        text-decoration: none;
    }

    .filter-menu .panel-group .panel+.panel {
        margin-top: 0;
    }

    .resource-persong {
        text-align: center;
    }

    .resource-persong img {
        border-radius: 50%;
        height: 88px;
        width: 88px;
    }

    .category-tr {
        width: 100%;
    }

    .tr_name {
        font-size: 18px;
        margin: 0;
        padding: 0px 20px 5px 20px;
        text-align: center;
    }

    .tr_tag {
        font-size: 14px;
        color: #808080;
        padding: 0px 30px 10px 30px;
        line-height: 20px;
        text-align: center;
    }

    .jtitle {
        font-size: 16px;
        margin-top: 20px;
        padding: 0px 20px 15px 0px;
        text-align: left;
        margin-bottom: 0px;
    }

    .single-job ul li a {
        color: #333;
    }

    .jpos {
        font-size: 14px;
        color: #808080;
        text-align: left;
        padding: 0px 20px 5px 0px;
        line-height: 20px;
    }

    .jtitle .badge {
        background-color: #757575;
        font-weight: 400;
    }

    .single-job ul li {
        list-style: none;
        border-bottom: 1px solid #eee;
        margin: 0px 5px 0px 5px;
    }

    .job-filter-list {
        margin-bottom: 50px;
    }

    .single-job ul li a:hover,
    .single-job ul li a:focus {
        color: #26a65b;
    }

    .law-bg {
        background-color: #ec407a;
    }

    .mc-title {
        background-color: #19A886;
        color: #fff;
        border-radius: 4px 4px 0px 0px;
        width: 100%;
        margin-top: 30px;
        height: 174px;
    }

    .mc-title ul li {
        list-style: none;
        float: left;
    }

    .mc-title h2 {
        font-size: 20px;
        font-weight: normal;
        width: 100%;
        padding: 0;
        margin-top: 10px;
    }

    .mc-title h2 a {
        color: #fff;
    }

    .mc-title .price {
        float: right;
        background: none repeat scroll 0% 0% rgb(255, 255, 255);
        color: #333;
        padding: 0 12px;
        font-size: 15px;
        border-radius: 50%;
        height: 100px;
        width: 100px;
        line-height: 100px;
        margin-right: 10px;
    }

    .cl-tra-photo img {
        height: 60px;
        width: 60px;
        position: absolute;
        z-index: 3;
        margin-top: -30px;
        margin-left: 30px;
    }

    .cbody {
        background-color: #fff;
        color: #999;
        min-height: 260px;
        padding: 20px;
        border-radius: 0px 0px 4px 4px;
        border: 1px solid #e0e0e0;
    }

    .tr-name {
        position: absolute;
        margin: -15px 0px 0px 80px;
        color: #999;
    }

    .status {
        margin: 10px 0px 30px 0px;
    }

    .cmeta ul {
        margin: 0;
        padding: 0;
    }

    .cmeta ul li {
        list-style: none;
        float: left;
    }

    .date-marked {
        color: #dd2c00;
    }

    .cbody .cdetails {
        color: #212121;
        border-bottom: 1px solid #e6e6e6;
        padding-bottom: 20px;
        min-height: 80px;
    }

    .cbody p {
        color: #999;
        font-size: 14px;
        margin-top: 15px;
    }

    .cstatus {
        padding: 10px 0px 30px 0px;
    }

    .crating .btn-group .btn {
        background-color: #fff;
        border: 1px solid #eee;
        color: #616161;
        border-radius: 0px;
    }

    /* job-filter-style-end */

    /* job-filtering-content-style-start */

    .list.p-tb5.p-r10 {
        display: inline-block;
    }

    .select-title {
        display: inline-block;

    }

    .list a i {
        font-size: 27px;
        color: #005900;
    }

    .bs-select-hidden {
        font-size: 16px;
        display: flex;
        flex-direction: column;
        padding: 16px 128px;
        text-align: left;
        border: 0px !important;
    }

    .job-show-title {
        border-bottom: 1px solid #A6A6A64D;
        padding-bottom: 12px;
    }

    .job-bx-title {
        padding-bottom: 10px;
    }

    .job-show-content {
        margin: 20px 0px;
        padding: 15px 25px;
        border: 1px solid #E9E9E9;
    }

    .job-title h5 {
        color: #005900;
    }

    .job-time h6 {
        display: inline-flex;
    }

    .job-show-content i {
        padding-right: 5px;
    }

    .job-deatline h5 {
        font-weight: 600;
    }
    

    @media screen and (max-width:1200px) {
        .job-search-btn a {
            padding: 10px 10px;
        }
    }

    @media screen and (max-width:992px) {
        .job-search-btn a {
            padding: 10px 5px;
        }
    }

    @media screen and (max-width:768px) {
        .job-search-btn a {
            padding: 10px 30px;
        }
    }
</style>

<body>
    <main>
        <!-- search-area -->
    <div class="search-area">
        <form action="{{route('search.training')}}" method="GET">
            <div class="container">
                        <div class="row">
                            <div class=" col-lg-4 col-md-8 col-sm-12 sr">
                                <div class="form">
                                    <div class="form-item">
                                        <input type="text" id="title" name="title">
                                        <label for="title">Training Title, Keywords</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-8 col-sm-12 sr">
                                <div class="select-dropdown category-tr">
                                    <select name="category" id="category">
                                        <option value="">Select Category</option>
                                        @foreach($all_training_category as $cat)
                                        <option value="{{$cat->id}}">{{$cat->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-8 col-sm-12sr">
                                <div class="selection-area">
                                    <div class="select-dropdown course-mb">
                                        <select class="trainer-ct" name="resource_person">
                                            <option value="">Select Resource Person</option>
                                            @foreach($all_trainer as $t)
                                            <option value="{{$t->id}}">{{$t->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="job-search-btn">
                                        <button class="btn" type="submit">Find Training</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
        <div class="course-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="training-cr-wrapper">
                            <div class="training-cr">
                                <div class="tr-title">
                                    <h2 class="text-white">{{$training->title}}</h2>
                                </div>
                                <div class="tr-text">
                                    <div class="tag-line">
                                        <ul>
                                            <li>
                                                <i class="fa fa-bars" aria-hidden="true"></i> <span
                                                    class="ml-2">Category :</span>
                                                <strong>{{$train_cat->title}}</strong>
                                            </li>
                                            <li>
                                                <i class="fa fa-calendar-o" aria-hidden="true"></i> <span
                                                    class="ml-2">Date :</span> <strong>{!! date('d M',
                                                    strtotime($training->start_date)) !!} - {!! date('d M',
                                                    strtotime($training->end_date)) !!}, {!! date('Y',
                                                    strtotime($training->start_date)) !!}</strong>
                                            </li>
                                            <li>
                                                <i class="fa fa-clock-o" aria-hidden="true"></i> <span
                                                    class="ml-2">Duration :</span>
                                                <strong>{{$training->duration}}</strong>
                                            </li>
                                            <li>
                                                <i class="fa fa-calendar-o" aria-hidden="true"></i> <span
                                                    class="ml-2">Registration Deadline :</span>
                                                <strong>{!! date('d M, Y', strtotime($training->end_of_reg))
                                                    !!}</strong>
                                            </li>
                                            <li>
                                                <i class="fa fa-map-marker" aria-hidden="true"></i> <span
                                                    class="ml-2">Venus :</span>
                                                <strong>{{$training->venue}}</strong>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                    </div>
                </div>
            </div>
        </div>
        <div class="job-filter-list mt-20 mb-20">
            <div class="primary">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="training-details">
                                <!-- <h5>Introduction</h5> -->
                                <p class="mb-20">
                                    {!! $training->course_outline !!}
                                </p>
                                <?php $content = Cart::content();?>
                                <div class="pricing-table text-center mt-4">
                                    @if(($training->regular_price != 0 ))
                                    <h3 class="text-center">Price: <b><span class="green-text">Tk. {{$training->regular_price}}</span></b></h3>
                                    @else
                                    <h3 class="text-center">Price: <b><span class="green-text">Free</span></b></h3>
                                    @endif
                                    <a href="{{url('training-cart/'.$training->id)}}" class="btn btn-default pay-btn w-25 mt-2">Register</a>
                                </div>
                                <div class="container text-center">
                                    <h5 class="mt-4">Share with:</h5>
                                    <div class="row">
                                        <div class="col-lg-6 mx-auto">
                                            <div class="addthis_inline_share_toolbox mt-1"></div>
                                        </div>
                                    </div>
                                    <div class="text-left mt-4">
                                        <h5 class="ct">Related Courses</h5>
                                    </div>                 
                                </div> 
                            </div>
                                                   
                            <div class="related-courses">
                                <div class="container">
                                    <div class="row">
                                    @if(count($related_training) > 0)                 
                                        @foreach($related_training as $t_course)
                                        <div class="col-md-6 col-sm-6">
                                            <div class="DTrainingList">
                                                <div class="Imgresize">
                                                    <figure class="ImgViewer">
                                                    <a href="{{route('training.details',[$t_course->id,$t_course->slug])}}">
                                                        <picture class="FixingRatio">
                                                            <img class="img-fluid img100 Ratio Ratio16x9 ImgRatio"
                                                                src="{{asset('uploads/training/'.$t_course->train_img)}}"
                                                                title="{{$t_course->title}}"
                                                                alt="{{$t_course->title}}">
                                                        </picture>
                                                    </a>
                                                    </figure>
                                                </div>
                                                <div class="item-list-content">
                                                    <a href="{{route('training.details',[$t_course->id,$t_course->slug])}}">
                                                        <h2 title="{{$t_course->title}}" class="company-course-title">{{\Illuminate\Support\Str::limit($t_course->title, 40, $end='...')}}</h2>
                                                    </a>
                                                    <span class="short-line"></span>
                                                    <div class="date-time-stamp">
                                                        <ul>
                                                            <li><i class="fa fa-calendar-o" aria-hidden="true"></i>
                                                            {!! date('d M',strtotime($training->start_date)) !!} - {!! date('d M',strtotime($training->end_date)) !!}, {!! date('Y',strtotime($training->start_date)) !!}
                                                            </li>
                                                            <li><i class="fa fa-clock-o" aria-hidden="true"></i>Total Hours: {{$t_course->duration}}</li>
                                                        </ul>
                                                    </div>
                                                    <div class="price-block">
                                                    <a href="{{route('training.details',[$t_course->id,$t_course->slug])}}">
                                                        <span class="course-reg-btn">Enroll Now</span>
                                                    </a>
                                                    <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    @else
                                    @foreach($related_training_all as $t_course)
                                        <div class="col-md-6 col-sm-6">
                                            <div class="DTrainingList">
                                                <div class="Imgresize">
                                                    <figure class="ImgViewer">
                                                    <a href="{{route('training.details',[$t_course->id,$t_course->slug])}}">
                                                        <picture class="FixingRatio">
                                                            <img class="img-fluid img100 Ratio Ratio16x9 ImgRatio"
                                                                src="{{asset('uploads/training/'.$t_course->train_img)}}"
                                                                title="{{$t_course->title}}"
                                                                alt="{{$t_course->title}}">
                                                        </picture>
                                                    </a>
                                                    </figure>
                                                </div>
                                                <div class="item-list-content">
                                                    <a href="{{route('training.details',[$t_course->id,$t_course->slug])}}">
                                                        <h2 class="company-course-title">{{$t_course->title}}</h2>
                                                    </a>
                                                    <span class="short-line"></span>
                                                    <div class="date-time-stamp">
                                                        <ul>
                                                            <li><i class="fa fa-calendar-o" aria-hidden="true"></i>
                                                            {!! date('d M',strtotime($training->start_date)) !!} - {!! date('d M',strtotime($training->end_date)) !!}, {!! date('Y',strtotime($training->start_date)) !!}
                                                            </li>
                                                            <li><i class="fa fa-clock-o" aria-hidden="true"></i>Total Hours : {{$t_course->duration}}</li>
                                                        </ul>
                                                    </div>
                                                    <div class="price-block">
                                                    <a href="{{route('training.details',[$t_course->id,$t_course->slug])}}">
                                                        <span class="course-reg-btn">Enroll Now</span>
                                                    </a>
                                                    <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach           
                                    @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="filter-menu">
                                <form>
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="panel-group" id="filter-menu" role="tablist"
                                                aria-multiselectable="true">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="tab" id="headingOne">
                                                        <a class="panel-title accordion-toggle" role="button"
                                                            data-toggle="collapse" href="#collapseOne" aria-expanded=""
                                                            aria-controls="collapseOne">
                                                            Who can Attend
                                                        </a><!-- /.panel-title -->
                                                    </div><!-- /.panel-heading -->
                                                    <div id="collapseOne" class="panel-collapse collapse in show"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            {!! $training->participant !!}
                                                        </div><!-- /.panel-body -->
                                                    </div><!-- /.panel-collapse -->
                                                </div><!-- /.panel -->
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="tab" id="headingOne">
                                                        <a class="panel-title accordion-toggle" role="button"
                                                            data-toggle="collapse" href="#collapseO" aria-expanded=""
                                                            aria-controls="collapseOne">
                                                            Outcome
                                                        </a><!-- /.panel-title -->
                                                    </div><!-- /.panel-heading -->
                                                    <div id="collapseO" class="panel-collapse collapse in show"
                                                        role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            {!! $training->outcome !!}
                                                        </div><!-- /.panel-body -->
                                                    </div><!-- /.panel-collapse -->
                                                </div><!-- /.panel -->

                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="tab" id="headingTwo">
                                                        <a class="panel-title accordion-toggle collapsed" role="button"
                                                            data-toggle="collapse" href="#collapseTwo"
                                                            aria-expanded="false" aria-controls="collapseTwo">
                                                            Resource Person
                                                        </a><!-- /.panel-title -->
                                                    </div><!-- /.panel-heading -->
                                                    <div id="collapseTwo" class="panel-collapse collapse in show"
                                                        role="tabpanel" aria-labelledby="headingTwo">
                                                        <div class="panel-body">
                                                            <div class="resource-persong">
                                                                @if(!empty($trainer->photo))
                                                                <img class="img-fluid"
                                                                    src="{{asset('uploads/users/'.$trainer->photo)}}"
                                                                    alt="{{$trainer->name}}">
                                                                @else
                                                                <img class="img-fluid"
                                                                    src="media/imgAll/training-person.jpg"
                                                                    alt="{{$trainer->name}}">
                                                                @endif
                                                            </div>
                                                            <p class="tr_name">
                                                                {{$trainer->name}}
                                                            </p>
                                                            <p class="tr_tag">
                                                                {{$training->trainer_position}}
                                                            </p>
                                                            <p class="tr_details" style="text-align:left; padding:5px;">
                                                                {!! $training->trainer_cv !!}
                                                            </p>
                                                        </div><!-- /.panel-body -->
                                                    </div><!-- /.panel-collapse -->
                                                </div><!-- /.panel -->

                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="tab" id="headingThree">
                                                        <a class="panel-title accordion-toggle collapsed" role="button"
                                                            data-toggle="collapse" href="#collapseThree"
                                                            aria-expanded="false" aria-controls="collapseThree">
                                                            Courses from this trainer
                                                            @if(count($courses_from_trainer) > 0)
                                                            <span class="badge badge-success">{{count($courses_from_trainer)}}</span>
                                                            @endif
                                                        </a><!-- /.panel-title -->
                                                    </div><!-- /.panel-heading -->
                                                    <div id="collapseThree" class="panel-collapse collapse"
                                                        role="tabpanel" aria-labelledby="headingThree">
                                                        <div class="panel-body">
                                                            <div class="single-job">
                                                                <ul class="p-1">
                                                                @if(!empty($courses_from_trainer))
                                                                    @foreach($courses_from_trainer as $trainer_course)
                                                                        <li>
                                                                            <p class="jtitle"><a href="{{route('training.details',[$trainer_course->id,$trainer_course->slug])}}">
                                                                                    <span>{{ $trainer_course->title}}</span>
                                                                                    <!-- <span class="badge badge-dark">19 Times</span><br> -->
                                                                                </a>
                                                                            </p>
                                                                        </li>
                                                                    @endforeach
                                                                @else
                                                                <li>
                                                                    <p class="jtitle">
                                                                        No course Found
                                                                    </p>
                                                                </li>
                                                                @endif                                                                    
                                                                </ul>
                                                            </div>
                                                        </div><!-- /.panel-body -->
                                                    </div><!-- /.panel-collapse -->
                                                </div><!-- /.panel -->
                                            </div><!-- /.panel-group -->
                                        </div><!-- /.panel-body -->
                                    </div><!-- /.panel -->
                                </form>
                            </div><!-- /.filter-menu -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
@endsection
@section('js')
<script type="text/javascript" src="https://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5fa108bfc648df27"></script>
@endsection