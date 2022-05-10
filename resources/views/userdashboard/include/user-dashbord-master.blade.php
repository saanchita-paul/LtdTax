@extends('master')
@section('content')
<style>
/* personal-iformation-area-style-start */
.profile_details_text {
	font-size: 12px;
	margin-bottom: 5px;
}
.form-control {
	display: block;
	width: 100%;
	/* height:0 !important;
	padding:0 !important; */
	font-size: 1rem;
	font-weight: 400;
	line-height: 1.5;
	color: #495057;
	background-color: #fff;
	background-clip: padding-box;
	border: 1px solid #ced4da;
	border-radius: .25rem;
	transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
/* personal-iformation-area-style-end */

/* resume-input-page-style-start */
.Resume.Details-input-page{
	background: #EEEEEE;
}
.resume-form-input-wrapper {
	background: #fff;
	padding: 10px 30px;
	margin-top: 30px;
}
   /* reume-menu */
   .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active{
	color: #fff;
	background-color: #595959;
    position: relative;
    }
    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active::before{
     position: absolute;
     content: "";
     width: 10px;
     height: 10px;
     left:43%;
     right:0;
     bottom:-10px;
     border-style: solid;
     border-width: 10px 10px 0 10px;
     border-color: #595959 transparent transparent transparent;     
    }
    /* .nav-tabs{
        border-bottom: none !important;
    } */
   .resume-nav{
	display: flex;
	flex-direction: column;
    text-align: center;
    padding: 15px 30px 15px 30px;
   }
   .resume-nav i{
    font-size: 24px;
   } 
  
  .resume-sibebar li a {
	color: #005900b3;
    font-size: 14px;
 }
.resume-sibebar li a i{
	padding-right: 5px;
 }
  .panel-title-sidebar a {
	color: #fff !important;
 }
/* .wrapper{
    width:85%;
  } */
  @media(max-width:992px){
   .wrapper{
    width:100%;
  } 
  }
  .panel-heading {
    padding: 0;
      border:0;
  }
  .panel-title>a, .panel-title>a:active{
      display:block;
      padding:15px;
      color:#555;
      font-size:14px;
      font-weight:500;
      text-transform:uppercase;
      letter-spacing:1px;
      word-spacing:3px;
      text-decoration:none;
      background: #EEEEEE;
      border-radius: 7px;
  }
  .panel-title-sidebar>a, .panel-title-sidebar>a:active{
    display:block;
    padding:15px;
    color:#555;
    font-size:14px;
    font-weight:500;
    text-transform:uppercase;
    letter-spacing:1px;
    word-spacing:3px;
    text-decoration:none;
    background: #005900;
}
  .panel-heading  a:before {
     font-family: 'fontawesome';
     content: "\f078";
     float: left;
     margin-right: 10px;
     transition: all 0.5s;
  }
  .panel-heading.active a:before {
      -webkit-transform: rotate(180deg);
      -moz-transform: rotate(180deg);
      transform: rotate(180deg);
  } 
  .resume-header-text h6{
      font-size: 14px;
      line-height:25px;
}
.checkbox.area {
	overflow-y: scroll;
	height: 200px;
	border: 1px solid #EEEEEE;
	padding: 10px 15px;
}
.form-check-label {
	font-size: 12px;
}
.profile_details_text-radio {
	display: block;
}
.form-check-radio {
	position: relative;
	display: inline-block;
}
.form-check-input {
	position: absolute;
	margin-top: .4rem !important;
	margin-left: -1.25rem;
}
.profile_details_text-required::after {
    content: '* ';  
    color: red;
    padding-left: 5px;
  }
.example-bg{
    color: #A6A6A6 !important;
}
.profile_details_text-required {
	font-size: 12px;
}

.profile_details_text {
	font-size: 12px;
}
.sc-btn{
    display: inline-block;
}
.btn-save {
	padding: 6px 21px;
}
.resume-top-nav h6 {
	font-size: 12px;
}
.resume-top-nav h6 a{
    color: #005900;
}
.input-max-selector {
	font-size: 12px;
	font-style: italic;
}
.exp-date {
	margin-top: 44px;
}
.info-checkbox {
	display: inline-block;
}
.info-t {
	display: block;
}
.info-checkbox {
	display: inline-block;
	padding-left: 24px;
}
.upload-image {
    display: flex;
    align-content: center;
}
.ph-upload{
text-align: center !important;
}
.photo-btn {
	margin-left: 25%;
    background: #005900;
    color: #fff;
}
.form-group-photo-up {
	border: 2px solid #C8C8C8;
}
.nav-item .fa-user {
    font-size: 1.5rem!important; 
    border: unset!important;
    color: unset!important;
    padding: unset!important;
    border-radius: 50%;
}
/* resume-input-page-style-end */
a:hover{color:#005A13;}
/* resume-sibebar-style-start */
.resume-sidebar-area {
	margin-top: 30px;
	background: #fff;
    padding-top: 10px;
}
.resume-sibebar {
	padding-left: 18px;
}
.resume-sibebar li {
	display: flex;
    padding: 4px 0px;
}
/* resume-sibebar-style-end */
/* education-training-page-style-start */
.add-edu-btn {
	border: 1px solid #045B04;
	color: #045B04;
}
.add-edu-btn:hover {
	color: #FF0404;
}

/* education-training-page-style-end */


/* =================end userdasbord new==================== */
</style>
<main>
    <div class="Resume Details-input-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <!-- user dashbord sidebar -->
                    @include('userdashboard.include.user-dashbord-sidebar')
                </div>
                <div class="col-lg-9">
                    @yield('user-content')
                </div>
            </div>
        </div>
    </div>    
</main>
@endsection