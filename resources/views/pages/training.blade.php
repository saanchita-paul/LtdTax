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
<main>
<div class="container-fluid " id="news">
  <section class="PageTitleInner">
    <div class="PageTitleInnerBg" data-stellar-background-ratio="0.6" style="background-position: 50% -30.8px;"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="SectionTitle text-center wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
                    <p><span>Training</span></p>
                </div>
            </div>
        </div>
    </div>
  </section>
</div>
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
<div class="container">
  <div class="row">
    <div class="col-lg-12 col-sm-12">
      <div class="DNews">
        <div class="row">
        @foreach($training_cat as $train)
            <div class="col-lg-4 col-sm-6 d-flex">
                <div class="DInnerBlogList align-self-stretch">
                    <a href="/trainingcat/{{$train->id}}/{{$train->slug}}"">
                        <div class="Imgresize">
                        <figure class="ImgViewer">
                            <picture class="FixingRatio">
                            @if($train->cat_img)
                                <img class="img-fluid news-page-img" alt="{{$train->title}}" src="{{asset('uploads/training/'.$train->cat_img)}}">
                            @else
                                <img class="img-fluid news-page-img" alt="{{$train->title}}" src="{{asset('uploads/1.jpg')}}">
                            @endif
                            </picture>
                        </figure>
                    </div>
                        <div class="Desc">
                            <div class="FixHeight">
                                <h3 class="Title">{{$train->title}} 
                                    <span class="badge badge-success ml-2">{{TrainingCountWithCat($train->id)}}</span>
                                </h3>
                                <p class="Brief">{{$train->description}}</p>
                            </div>
                            <p class="Writter">{{$train->created_at->format('jS M, Y')}}</p>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="pagination d-flex justify-content-center">
        {!! $training_cat->links() !!}
        </div>
      </div>
     </div>
  </div>
</div>
</main>
@endsection
