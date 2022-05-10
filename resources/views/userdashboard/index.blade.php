@extends('userdashboard.include.user-dashbord-master')

<!-- push select2 css -->

<link rel="stylesheet" href="{{ asset('admin/vendors/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
<style>
.select2-container .select2-selection--multiple{
width:780px!important;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #005A13!important;
    color:#fff!important;
    margin-top: 8px!important;
	border:unset;
    margin-bottom: 8px!important;
	margin-right: 10px!important;
    padding: 4px 9px!important;
}
.select2-container--default .select2-selection--multiple .select2-selection__rendered{
	padding-left:5px;
}
span.select2-dropdown.select2-dropdown--below {
	width:300px!important;
	max-height: 200px;
}

ul#select2-skills-results {
    width: 300px;
}
.select2-container--default .select2-results>.select2-results__options {
    max-height: 200px;
    overflow-y: auto;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
    color: #fff!important;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
    color: #fff!important;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice {
    border: 1px solid #165900!important;
}
.select2-container--default .select2-search--inline .select2-search__field {
    /* margin-top: 8px!important; */
    min-width: 200px!important;
}

.profile_details_text {
    margin-bottom: 10px!important;
}

.form-group{
    margin-bottom:16px!important;
}
.rm-btn{
    border:none;outline:0;background:none;
}

</style>

@section('user-content')
<div class="resume-form-input-wrapper">
<div class="row">
<div class="col-lg-12">
<div class="resume-header-text mt-4 mb-3">
<h6>Here you can edit your resume in five different steps (Personal, Education/ Training, Employment, Other Information and Photograph). To enrich your resume provide authentic information. </h6>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<div class="resume-top-nav mt-2 mb-4">
<h6><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i>
Home</a> / Edit Resume</h6>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<nav>
<div class="nav nav-tabs" id="nav-tab" role="tablist">
<a class="nav-item nav-link resume-nav active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
role="tab" aria-controls="nav-home" aria-selected="true"><i class="fa fa-user"
aria-hidden="true"></i>
Personal</a>
<a class="nav-item nav-link resume-nav" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fa fa-graduation-cap"
aria-hidden="true"></i>
Education/Training</a>
<a class="nav-item nav-link resume-nav" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa fa-briefcase"
aria-hidden="true"></i>
Employment</a>
<a class="nav-item nav-link resume-nav" id="nav-info-tab" data-toggle="tab" href="#nav-info"
role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa fa-info"
aria-hidden="true"></i>

Other Information</a>
<a class="nav-item nav-link resume-nav" id="nav-photo-tab" data-toggle="tab" href="#nav-photo"
role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fa fa-camera"
aria-hidden="true"></i>
Photograph</a>
</div>
</nav>
@if (session()->has('success'))
<div class="alert alert-success mt-4 mb-2" role="alert">
{{ session()->get('success') }}
<button type="button" class="close"
data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
@endif
@if (session()->has('warning'))
<div class="alert alert-warning mt-4 mb-2" role="alert">
{{ session()->get('warning') }}
<button type="button" class="close"
data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
@endif
<div class="tab-content" id="nav-tabContent">
<div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
<div class="row">
<div class="col-lg-12">
<div class="wrapper center-block mt-4">
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<div class="panel panel-default">
<div class="panel-heading active" role="tab" id="headingOne">
<h4 class="panel-title">
<a role="button" data-toggle="collapse" data-parent="#accordion"
href="#collapseOne" aria-expanded="false"
aria-controls="collapseOne" class="collapsed">
Personal Details
</a>
</h4>
</div>
<div id="collapseOne" class="panel-collapse in collapse show" role="tabpanel"
aria-labelledby="headingOne" style="">
<div class="panel-body">
<div class="row">
<div class="col-lg-12">
<form action="{{ route('personal.info') }}" method="POST">
@csrf
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s">
<label
class="profile_details_text-required">First
Name:</label>
<input type="text" maxlength="50" title="First name should contain only letters [a-z,A-Z,.- ] and only 50 characters." pattern="[A-Za-z.\- ]{1,50}" name="firstname" required="" plaseholder="Enter firstname" id="firstname"
class="form-control @error('firstname') is-invalid @enderror "
placeholder="Enter First Name" @if (!empty($user_data->name)) value="{{$user_data->name}}"
@else
value="{{old('name')}}"
@endif
>
@error('firstname')
<small
class="error text-danger">{{ $message }}</small>
@enderror
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s mt-1">
<label
class="profile_details_text-required">Last
Name:
</label>
<input type="text" name="lastname" title="Last name should contain only letters  [a-z,A-Z,.- ] and only 30 characters."  required="" id="lastname" maxlength="50" pattern="[A-Za-z.\- ]{1,50}"
class="form-control @error('lastname') is-invalid @enderror"
placeholder="Last Name" @if (!empty($user_data->lname)) value="{{ $user_data->lname}}" @else value="{{old('lastname')}}" @endif>
@error('lastname')
<small
class="error text-danger">{{ $message }}</small>
@enderror
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s">
<label
class="profile_details_text-required">Father's
Name:</label>
<input type="text" name="fathersname" id="fathersname" title="Father's name should contain only letters [a-z,A-Z, .] and only 30 characters." required="" placeholder="Father Name" maxlength="50" pattern="[A-Za-z.\- ]{1,30}"
class="form-control @error('fathersname') is-invalid @enderror"
@if (!empty($user_data->fathers_name)) value="{{ $user_data->fathers_name}}" @else value="{{old('fathersname')}}" @endif >
@error('fathersname')
<small
class="error text-danger">{{ $message }}</small>
@enderror
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s">
<label
class="profile_details_text-required">Mother's
Name:</label>
<input type="text" name="mothersname" id="mothersname" title="Mother's name should contain only letters [a-z,A-Z, . ] and only 30 characters." required="" maxlength="30" pattern="[A-Za-z.- ]{1,30}"
class="form-control @error('mothersname') is-invalid @enderror" 
placeholder="Mother's Name" @if (!empty($user_data->mothers_name)) value="{{$user_data->mothers_name}}" @else value="{{old('mothersname')}}" @endif >
@error('mothersname')
<small
class="error text-danger">{{ $message }}</small>
@enderror
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s">
<label class="profile_details_text-required">Date of Birth:</label>
<input type="date" name="dob" required=""
class="form-control input-group @error('dob') is-invalid @enderror"
placeholder="mm/dd/yyyy" id="dob"
@if (!empty($user_data->dob)) value="{{ $user_data->dob}}"@else value="{{old('dob')}}" @endif >
@error('dob')
<small
class="error text-danger">{{ $message }}</small>
@enderror
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s">
<label
class="profile_details_text-required">Religions:</label>
<select
class="form-control @error('religion') is-invalid @enderror"
name="religion" id="religion" required="">
<option value="">Select Religion</option>
<option value="1" @if (!empty($user_data->religion)) @if ($user_data->religion == 1) selected @endif @endif>
Muslim
</option>
<option value="2" @if (!empty($user_data->religion)) @if ($user_data->religion == 2) selected @endif @endif>
Christianity
</option>
<option value="3" @if (!empty($user_data->religion)) @if ($user_data->religion == 3) selected @endif @endif>
Hinduism
</option>
<option value="4" @if (!empty($user_data->religion)) @if ($user_data->religion === 4) selected @endif @endif>
Others
</option>
</select>
@error('religion')
<small
class="error text-danger">{{ $message }}</small>
@enderror
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s">
<label
class="profile_details_text-required">Marital
Status:</label>
<select name="maritual_status"
class="form-control @error('maritual_status') is-invalid @enderror"
value="" required="">
<option value="">Select Marital Status</option>
<option value="1" @if (!empty($user_data->marital_status)) @if ($user_data->marital_status == 1) selected @endif @endif>
Single
</option>
<option value="2" @if (!empty($user_data->marital_status)) @if ($user_data->marital_status == 2) selected @endif @endif>
Married
</option>
<option value="3" @if (!empty($user_data->marital_status)) @if ($user_data->marital_status == 3) selected @endif @endif>
Divorce
</option>
<option value="4" @if (!empty($user_data->marital_status)) @if ($user_data->marital_status == 4) selected @endif @endif>
Widowed
</option>
</select>
@error('maritual_status')
<small
class="error text-danger">{{ $message }}</small>
@enderror
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s">
<label
class="profile_details_text-required">Gender:</label>
<select name="gender"
class="form-control @error('maritual_status') is-invalid @enderror"
value="" required="">
<option value="">Select Gender</option>
<option value="1" @if (!empty($user_data->gender)) @if ($user_data->gender == 1) selected @endif @endif>
Male
</option>
<option value="2" @if (!empty($user_data->gender)) @if ($user_data->gender == 2) selected @endif @endif>
Female
</option>
<option value="3" @if (!empty($user_data->gender)) @if ($user_data->gender == 3) selected @endif @endif>
Other
</option>
</select>
@error('maritual_status')
<small
class="error text-danger">{{ $message }}</small>
@enderror
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s">
<label class="profile_details_text">NID Number:</label>
<input type="text" name="nid" id="nid" maxlength="30"  
class="form-control @error('nid')is-invalid @enderror"
placeholder="NID Number" @if (!empty($user_data->nid)) value="{{$user_data->nid}}" @else value="{{old('nid')}}" @endif>
@error('nid')
<small
class="error text-danger">{{ $message }}</small>
@enderror
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s">
<label class="profile_details_text">Passport
Number:</label>
<input name="passport" id="passport" maxlength="40" type="text" title=""
class="form-control @error('passport') is-invalid @enderror"
placeholder="Passport" @if (!empty($user_data->passport))  value="{{$user_data->passport}}" @else value="{{old('passport')}}" @endif>
@error('passport')
<small class="error text-danger">{{ $message }}</small>
@enderror
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s">
<label class="profile_details_text">Passport Issue Date:</label>
<input name="passport_issue_date"
id="passport_issue_date" type="date" placeholder="Passport Issue date"
class="form-control @error('passport_issue_date') is-invalid @enderror"
@if (!empty($user_data->passport_issue_date)) value="{{ $user_data->passport_issue_date}}" @else value="{{old('passport_issue_date')}}" @endif>
@error('passport_issue_date')
<small
class="error text-danger">{{ $message }}</small>
@enderror
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s">
<label class="profile_details_text-required">Mobile
Number-1:</label>
<input name="phone" required="" id="phone" maxlength="15" pattern="[+]?[0-9]{6,15}" title="Enter a valid phone number"
type="tel"
class="form-control @error('phone') is-invalid @enderror "
placeholder="Mobile No 1" 
@if (!empty($user_data->phone))  value="{{ $user_data->phone}}" @else value="{{old('phone')}}"  @endif>
@error('phone')
<small class="error text-danger">{{ $message }}</small>
@enderror
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s">
<label class="profile_details_text">Mobile Number-2:</label>
<input name="mobil_no2" id="mobil_no2" maxlength="15" pattern="[+]?[0-9]{6,15}"  title="Enter a valid phone number"
type="tel"
class="form-control @error('mobil_no2') is-invalid @enderror"
placeholder="Mobile No 2" @if (!empty($user_data->mobile2)) value="{{ $user_data->mobile2}}" @else value="{{old('mobil_no2')}}" @endif>
@error('mobil_no2')
<small
class="error text-danger">{{ $message }}</small>
@enderror
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s">
<label class="profile_details_text">Mobile Number-3:</label>
<input name="mobil_no3" id="mobil_no3" maxlength="15" pattern="[+]?[0-9]{6,15}"  title="Enter a valid phone number"
type="tel"
class="form-control @error('mobil_no3') is-invalid @enderror "
placeholder="Mobile No 3" @if (!empty($user_data->mobile3))value="{{ $user_data->mobile3 }}" @else value="{{old('mobil_no3')}}" @endif>
@error('mobil_no3')
<small
class="error text-danger">{{ $message }}</small>
@enderror
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s">
<label class="profile_details_text-required">Email
Address:</label>
<input  type="text" title="Email address must be a valid email.Example: john@gmail.com" maxlength="100" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
class="form-control @error('email') is-invalid @enderror"
placeholder="Email address" @if (!empty($user_data->email)) value="{{$user_data->email}}" @else value="{{old('email')}}" @endif>
@error('email')
<small
class="error text-danger">{{ $message }}</small>
@enderror
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s">
<label class="profile_details_text">Alternative Email Address:</label>
<input name="alt_email" id="alt_email"
type="text" maxlength="40"
class="form-control @error('alt_email') is-invalid @enderror" title="Email address must be a valid email.Example: john@gmail.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
placeholder="Alternative Email address" @if (!empty($user_data->alt_email)) value="{{$user_data->alt_email}}" @else value="{{old('alt_email')}}" @endif>
@error('alt_email')
<small
class="error text-danger">{{ $message }}</small>
@enderror
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s">
<label
class="profile_details_text-required">Nationality:</label>
<input type="text" required="" name="nationality" title="Nationality should contain only letters  [a-z,A-Z] and only 15 characters."  maxlength="15" pattern="[A-Za-z]{1,15}" 
id="nationality"
class="form-control @error('nationality') is-invalid  @enderror"
placeholder="nationality" @if (!empty($user_data->nationality)) value="{{$user_data->nationality}}" @else value="{{old('nationality')}}" @endif>
@error('nationality')
<small
class="error text-danger">{{ $message }}</small>
@enderror
</div>
</div>
</div>
<div class="row">
<div
class="col-lg-6 col-md-12 col-sm-12 col-xs-12 submit">
<div class="form-group-s mt-2 mb-2 sc-btn">
<input type="submit"
class="btn btn-success btn-save"
value="Save">
</div>
<div class="form-group-s mt-2 mb-2 pl-3 sc-btn ">
<a href="/" class="btn btn-primary text-white">cancel</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</form>
<form action="{{route('personal.address_info')}}" method="post">
@csrf
<div class="panel panel-default">
<div class="panel-heading active" role="tab" id="headingTwo">
<h4 class="panel-title">
<a class="" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
Address Details
</a>
</h4>
</div>
<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" style="">
<div class="panel-body">
<div class="row">
<div class="col-lg-12">

<div class="row">
    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
        <div class="address-details-title mt-2">
            <h6>Present Address</h6>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group-s">
            <label class="profile_details_text-required">Address 1</label>
            <input required="" maxlength="100" class="form-control @error('present_address_1') is-invalid  @enderror" type="text" name="present_address_1" @if (!empty($user_data->present_address_1)) value="{{$user_data->present_address_1}}" @else value="{{ old('present_address_1')}}" @endif>
                @error('present_address_1')
                <small
                class="error text-danger">{{ $message }}</small>
                @enderror
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group-s">
            <label class="profile_details_text">Address 2</label>
            <input class="form-control @error('present_address_2') is-invalid  @enderror" maxlength="100" type="text" name="present_address_2" @if (!empty($user_data->present_address_2)) value="{{$user_data->present_address_2}}" @else value="{{old('present_address_2')}}" @endif>
            @error('present_address_2')
                <small
                class="error text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s">
<label class="profile_details_text-required">District</label>
<select name="present_district_id" class="form-control district_id @error('present_district_id') is-invalid  @enderror">
<option value=""> -- Select District -- </option>
@foreach ($districts as $district)
@if(!empty($user_data->present_district_id))
<option value="{{ $district->id }} "  
@if($district->id == $user_data->present_district_id) selected @endif >
    {{ $district->name }}
</option>
@else
<option value="{{ $district->id }}">
    {{ $district->name }}
</option>
@endif
@endforeach
</select>
@error('present_district_id')
<small
class="error text-danger">{{ $message }}</small>
@enderror
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s">
<label class="profile_details_text-required">Thana/Police
Station</label>
<?php
$thana= App\Models\Location::whereNotNull('district_id')->get();
?>
<select name="present_thana_id" class="form-control thana_id @error('present_thana_id') is-invalid  @enderror" required="">
@foreach($thana as $tha)
@if(!empty($user_data->present_thana_id))
<option value="{{ $tha->id}}" @if($tha->id == $user_data->present_thana_id) selected @endif> {{ $tha->name}} </option>
@endif
@endforeach    
</select>
@error('present_thana_id')
<small
class="error text-danger">{{ $message }}</small>
@enderror
</div>
</div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group-s">
            <label class="profile_details_text-required">Post Code</label>
            <input required="" maxlength="4" title="Post code allow only 4 digits" pattern="\d{4}" placeholder="Post Code" class="form-control @error('present_post_code') is-invalid  @enderror" type="text" name="present_post_code" class="form-control" @if (!empty($user_data->present_post_code)) value="{{ $user_data->present_post_code }}" @else value="{{old('present_post_code')}}" @endif >
            @error('present_post_code')
            <small
            class="error text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>                   
<div class="row">
    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
        <div class="address-details-title mt-5">
            <h6>Permanent Address
            </h6>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group-s">
            <label class="profile_details_text-required">Address 1</label>
            <input required="" maxlength="100" class="form-control @error('permanent_address_1') is-invalid  @enderror" type="text" name="permanent_address_1" class="form-control" @if (!empty($user_data->permanent_address_1))  value="{{$user_data->permanent_address_1}}" @else value="{{old('permanent_address_1')}}" @endif >
            @error('permanent_address_1')
            <small
            class="error text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group-s">
            <label class="profile_details_text">Address 2</label>
            <input maxlength="100" class="form-control @error('permanent_address_2') is-invalid  @enderror" type="text" name="permanent_address_2" class="form-control" @if (!empty($user_data->permanent_address_2))  value="{{$user_data->permanent_address_2}}" @else value="{{old('permanent_address_2')}}" @endif>
            @error('permanent_address_2')
            <small
            class="error text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s">
<label class="profile_details_text-required">District</label>
<select name="permanent_district_id" class="form-control district_id1  @error('permanent_district_id') is-invalid  @enderror">
<option value=""> -- Select District -- </option>
@foreach ($districts as $district)
@if(!empty($user_data->permanent_district_id))
<option value="{{ $district->id }} "  @if($district->id == $user_data->permanent_district_id) selected @endif >
    {{ $district->name }}
</option>
@else
<option value="{{ $district->id }}">
    {{ $district->name }}
</option>
@endif
@endforeach
</select>
@error('permanent_district_id')
<small
class="error text-danger">{{ $message }}</small>
@enderror
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s">
<label class="profile_details_text-required">Thana/Police
Station</label>
<?php
$thana= App\Models\Location::whereNotNull('district_id')->get();
?>
<select name="permanent_thana_id" class="form-control thana_id1 @error('permanent_thana_id') is-invalid  @enderror" required=""> 
@foreach($thana as $tha)
@if(!empty($user_data->permanent_thana_id))
<option value="{{ $tha->id}}" @if($tha->id == $user_data->permanent_thana_id) selected @endif> {{ $tha->name}} </option>
@endif
@endforeach    
</select>
@error('permanent_thana_id')
<small
class="error text-danger">{{ $message }}</small>
@enderror
</div>
</div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group-s">
            <label class="profile_details_text-required">Post Code</label>
            <input required="" title="Post code allow only 4 digits" placeholder="Post Code" maxlength="4" pattern="\d{4}" class="form-control @error('permanent_post_code') is-invalid  @enderror" type="text" name="permanent_post_code" class="form-control" @if (!empty($user_data->permanent_post_code))  value="{{ $user_data->permanent_post_code}}" @else value="{{old('permanent_post_code')}}" @endif >
            @error('permanent_post_code')
            <small
            class="error text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div> 
<div class="row">
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 submit">
        <div class="form-group-s mt-2 mb-2 sc-btn">
            <input type="submit" class="btn btn-success btn-save" value="Save">
        </div>
        <div class="form-group-s mt-2 mb-2 pl-3 sc-btn ">
        <a href="/" class="btn btn-primary text-white">cancel</a>
        </div>
    </div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading" role="tab" id="headingThree">
<h4 class="panel-title">
<a class="collapsed" role="button" data-toggle="collapse"
data-parent="#accordion" href="#collapseThree" aria-expanded="false"
aria-controls="collapseThree">
Career &amp; Application Information
</a>
</h4>
</div>
<div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
aria-labelledby="headingThree">
<div class="panel-body">


<form action="{{ route('personal.career_and_personal_info') }}"
method="post">
@csrf
<div class="row">
<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">

<div class="form-group">
<label class="profile_details_text-required">Career
Objectives</label>
<textarea required class="form-control @error('career_obj') is-invalid @enderror" id="career_objective" rows="3" name="career_obj" placeholder="Career Objective">@if(!empty($user_career->career_obj)){{ $user_career->career_obj }}@else{{old('career_obj')}}@endif</textarea>
@error('career_obj')
<small
class="error text-danger">{{ $message }}</small>
@enderror
</div>

</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s">
<label class="profile_details_text">Present
Salary
(Month)</label>
<input type="text" name="present_salary" maxlength="6" pattern="[0-9]+" title="Present salary must be in digits [0-9] max 6 digits"
class="form-control @error('present_salary') is-invalid @enderror"
value="@if(!empty($user_career->pre_salary)){{ $user_career->pre_salary }}@else{{old('present_salary')}}@endif">
@error('present_salary')
<small
class="error text-danger">{{ $message }}</small>
@enderror
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s">
<label class="profile_details_text">Expected
Salary
(Month)</label>
<input type="text" name="expected_salary" maxlength="6" pattern="[0-9]+" title="Expected salary must be in digits [0-9] and max 6 digits"
class="form-control @error('expected_salary') is-invalid @enderror"
value="@if(!empty($user_career->exp_salary)){{ $user_career->exp_salary }}@else{{old('expected_salary')}}@endif">
@error('expected_salary')
<small
class="error text-danger">{{ $message }}</small>
@enderror
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s">
<label class="profile_details_text-required">Category Job</label>
<select name="looking_for_job_category"
class="form-control @error('looking_for_job_category') is-invalid @enderror"
value="" required="">
<option value="">--Select One--</option>
@forelse ($job_categories as $category)

<option value="{{ $category->id }}" @if (!empty($user_career->jobcat_id))  @if ($user_career->jobcat_id==$category->id)
selected @endif
@endif>
{{ $category->title }}
</option>
@empty
<option value="">No Category found!!</option>
@endforelse
</select>
@error('looking_for_job_category')
<small
class="error text-danger">{{ $message }}</small>
@enderror

</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s">
<label class="profile_details_text-required">Available
for
Job Nature</label>
<select name="job_nature"
class="form-control @error('job_nature') is-invalid @enderror"
 required="">
<option value="" > Select Job
Nature
</option>

<option value="1"  @if(!empty($user_career->job_nature)) @if($user_career->job_nature == 1)
selected @endif 
@endif >Full Time
</option>
<option value="2" @if(!empty($user_career->job_nature)) @if($user_career->job_nature == 2)
selected @endif 
@endif >Part Time
</option>
<option value="3"  @if(!empty($user_career->job_nature)) @if($user_career->job_nature == 3) 
selected @endif 
@endif >
Contractual
</option>

</select>
@error('job_nature')
<small
class="error text-danger">{{ $message }}</small>
@enderror
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 submit">
<div class="form-group-s mt-2 mb-2 sc-btn">
<input type="submit" class="btn btn-success btn-save"
value="Save">
</div>
<div class="form-group-s mt-2 mb-2 pl-3 sc-btn ">
<a href="/" class="btn btn-primary text-white">cancel</a>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading" role="tab" id="headinggFour">
<h4 class="panel-title">
<a class="collapsed" role="button" data-toggle="collapse"
data-parent="#accordion" href="#collapseFive" aria-expanded="false"
aria-controls="collapseThree">
Other Relevant Information
</a>
</h4>
</div>
<div id="collapseFive" class="panel-collapse collapse" role="tabpanel"
aria-labelledby="headinggFour">
<div class="panel-body">
<form action="{{ route('personal.other_relavent_info') }}" method="post">
@csrf
<div class="row">
<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">

<div class="form-group">
<label class="profile_details_text">Carrier
Summary</label>
<textarea name="career_summery" class="form-control @error('career_summery') is-invalid @enderror"
id="career_summery" rows="3">@if (!empty($candidate_other_info->career_sum)) {{ $candidate_other_info->career_sum }}@else {{old('career_summery')}} @endif</textarea>
@error('career_summery')
<small class="error text-danger">{{ $message }}</small>
@enderror

</div>

</div>
</div>
<div class="row">
<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">

<div class="form-group">
<label class="profile_details_text">Special
Qualification</label>
<textarea name="special_quealification"
class="form-control @error('special_quealification') is-invalid @enderror" id="special_quealification"
rows="3">@if (!empty($candidate_other_info->spec_qualification)) {{ $candidate_other_info->spec_qualification }}@else {{old('special_quealification')}} @endif</textarea>
@error('special_quealification')
<small class="error text-danger">{{ $message }}</small>
@enderror

</div>

</div>
</div>
<div class="row">
<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s mb-5">

<label
class="profile_details_text-required">Keywords</label>

<input required="" type="text" name="keywords" class="form-control @error('keywords') is-invalid @enderror" title="Comma seperated kewords are only allowed." pattern="^[0-9a-zA-z]+(,[0-9a-zA-z]+){0,11}$"
@if (!empty($candidate_other_info->keyword)) value="{{ $candidate_other_info->keyword }}" @else value="{{old('keywords')}}" @endif>
@error('keywords')
<small
class="error text-danger">{{ $message }}</small>
@enderror

</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 submit">
<div class="form-group-s mt-2 mb-2 sc-btn">
<input type="submit" class="btn btn-success btn-save"
value="Save">
</div>
<div class="form-group-s mt-2 mb-2 pl-3 sc-btn ">
<a href="/" class="btn btn-primary text-white">cancel</a>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
<div class="row">
<div class="col-lg-12">
<div class="wrapper center-block mt-4">
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<div class="panel panel-default">
<div class="panel-heading" role="tab" id="headingOne">
<h4 class="panel-title">
<a role="button" data-toggle="collapse" data-parent="#accordion"
href="#collapseOne" aria-expanded="false"
aria-controls="collapseOne" class="collapsed">
Education
</a>
</h4>
</div>
<div id="collapseOne" class="panel-collapse in collapse" role="tabpanel"
aria-labelledby="headingOne">
<div class="panel-body">
<!-- education section here -->
@include('userdashboard.partial.education')

</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading" role="tab" id="headingTwo">
<h4 class="panel-title">
<a class="collapsed" role="button" data-toggle="collapse"
data-parent="#accordion" href="#collapseTwo" aria-expanded="false"
aria-controls="collapseTwo">
Training Summary
</a>
</h4>
</div>
<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
aria-labelledby="headingTwo">
<div class="panel-body">
<div class="row">
<div class="col-lg-12">
@include('userdashboard.partial.training')
</div>
</div>
</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading" role="tab" id="headingThree">
<h4 class="panel-title">
<a class="collapsed" role="button" data-toggle="collapse"
data-parent="#accordion" href="#collapseThree" aria-expanded="false"
aria-controls="collapseThree">
Professional Certification Summary
</a>
</h4>
</div>
<div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
aria-labelledby="headingThree">
<div class="panel-body">
@include('userdashboard.partial.professional-certificate')
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
<div class="employment-tab-area mt-5">
@include('userdashboard.partial.experience')
</div>
</div>
<div class="tab-pane fade" id="nav-info" role="tabpanel" aria-labelledby="nav-contact-tab">
<div class="row">
<div class="col-lg-12">
<div class="wrapper center-block mt-4">
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<div class="panel panel-default">
<div class="panel-heading" role="tab" id="headingOne">
<h4 class="panel-title">
<a role="button" data-toggle="collapse" data-parent="#accordion"
href="#collapseOne" aria-expanded="false"
aria-controls="collapseOne" class="collapsed">
Specialization
</a>
</h4>
</div>
<div id="collapseOne" class="panel-collapse in collapse" role="tabpanel"
aria-labelledby="headingOne" style="">
<div class="panel-body">
<div class="row">
<div class="col-lg-12">
@include('userdashboard.partial.skill')
@include('userdashboard.partial.professional-degree')
</div>
</div>
</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading" role="tab" id="headingTwo">
<h4 class="panel-title">
<a class="collapsed" role="button" data-toggle="collapse"
data-parent="#accordion" href="#collapseTwo" aria-expanded="false"
aria-controls="collapseTwo">
Language Proficiency
</a>
</h4>
</div>
<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
aria-labelledby="headingTwo">
<div class="panel-body">
<div class="row">
<div class="col-lg-12">
@include('userdashboard.partial.language')
</div>
</div>
</div>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading" role="tab" id="headingThree">
<h4 class="panel-title">
<a class="collapsed" role="button" data-toggle="collapse"
data-parent="#accordion" href="#collapseThree" aria-expanded="false"
aria-controls="collapseThree">
Reference
</a>
</h4>
</div>
<div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
aria-labelledby="headingThree">
<div class="panel-body">
@include('userdashboard.partial.reference')
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="tab-pane fade" id="nav-photo" role="tabpanel" aria-labelledby="nav-contact-tab">
<div class="row">
<div class="col-lg-4 offset-lg-4 col-md-6 col-sm-6 col-xs-12 ">
<div class="upload-image">
@if(!empty($user_data->photo))
<img class="img-fluid photo-up mt-4" src="{{asset('uploads/users/'.$user_data->photo)}}"
alt="taxman profile photo">
@else
<img class="img-fluid photo-up" src="{{asset('uploads/users/dummy-profile-pic-male.jpg')}}"
alt="taxman profile photo">                 
@endif
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 offset-lg-3 col-md-6 col-sm-6 col-xs-12">
@if(!empty($user_data->photo))
<h6 class="text-center mt-4 mb-4">Update your photo </h6>
@else
<h6 class="text-center mt-4 mb-4">You don't have any photo, Please upload photo </h6>                         
@endif
</div>
</div>
<div class="row">
<div class="col-lg-4 offset-lg-4 col-md-6 col-sm-6 col-xs-12">
<form action="{{route('up.photo')}}" method="POST" enctype="multipart/form-data">
@csrf
<div class="form-group-photo-up">
<input type="file" class="form-control-file" name="photo" required="" id="exampleFormControlFile1">                                     
</div>
@error('photo')
<small class="text-danger">
{{$message}}
</small>
@enderror

</div>
</div>
<div class="row">
<div class="col-lg-4 offset-lg-4 col-md-6 col-sm-6 col-xs-12 d-flex align-items-center">
@if(!empty($user_data->photo))
<button type="submit" class="btn photo-btn mt-4 mb-5" href="">Update Photo</button>                              
@else
<button type="submit" class="btn photo-btn mt-4 mb-5" href="">Update Photo</button>                            
@endif
<?php $t=5;?>
</div>
</form>
</div>

</div>
</div>
</div>
</div>
</div>
@endsection

@push('js')
<script type="text/javascript">
jQuery(document).ready(function ()
{       
jQuery('.district_id').on('change',function(){
var districtID = jQuery(this).val();
if(districtID)
{
jQuery.ajax({
url : 'get/thana/'+districtID,
type : "GET",
dataType : "json",
success:function(data)
{
// console.log(data);
jQuery('.thana_id').empty();
jQuery('.thana_id').append('<option value="">--Select Thana--</option>');

jQuery.each(data, function(key,value){
$('.thana_id').append('<option value="'+ value.id +'">'+ value.name +'</option>');
});
}
});
}
else
{
$('.thana_id').empty();
}
});
});
</script>
<script type="text/javascript">
jQuery(document).ready(function ()
{       

jQuery('.district_id1').on('change',function(){
var districtID = jQuery(this).val();
if(districtID)
{
jQuery.ajax({
url : 'get/thana/'+districtID,
type : "GET",
dataType : "json",
success:function(data)
{
// console.log(data);
jQuery('.thana_id1').empty();
jQuery('.thana_id1').append('<option value="">--Select Thana--</option>');

jQuery.each(data, function(key,value){
$('.thana_id1').append('<option value="'+ value.id +'">'+ value.name +'</option>');
});
}
});
}
else
{
$('.thana_id1').empty();
}
});
});
</script>
<!-- start education script -->
<script>
var x = document.querySelectorAll('#education_section_content').length;
if(x == 0){
    x = 1;
}
var max = 9;
$('.popup').on('click', function(e) {
e.preventDefault();
const form = `
<div id="education_section_content" class="education_section_content sec${x+1} pt-4">
<div class='form_wraper'>
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<h6 class="mt-3">Academic ` + (x + 1) + `
<button class="remove_btn btn text-danger rm-btn" onClick="removeSection(${x+1})"><i class="fa fa-trash"></i></button>
</h6>
</div>
</div>

<div class="row">
<div class="col-lg-6 col-md-6 col-sm-12">
<div class="form-group">
<label for="level_of_education" class="profile_details_text-required">Level Of Education</label>
<?php $education =App\Models\Education::where('status',1)->where('parent_id',NULL)->get(); ?>
<select data-id="`+(x+1)+`" class="form-control form-control-sm academic_qualification academic_qualification_`+(x+1)+`" id="level_of_education" name="level_of_education[]" required="">
    <option value="">--Select Education level--</option>
    <@foreach ($education as $edu)
        <option value="{{$edu->id}}">{{$edu->name}}</option>
    @endforeach
</select>
@error('level_of_education')
<small
class="error text-danger">{{ $message }}</small>
@enderror
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12">
<div class="form-group">
<label for="exm_degree" class="profile_details_text-required">Exam / Degree</label>
<select class="form-control form-control-sm exam_degree_`+(x+1)+`" id="exm_degree" name="exm_degree[]" required="">
    <option value="">--Select Degree--</option>
</select>
@error('exm_degree')
<small
class="error text-danger">{{ $message }}</small>
@enderror
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12">
<div class="form-group">
<label for="major_group" class="profile_details_text-required">Concentration/ Major/Group </label>
<input name="major_group[]" value="{{old('major_group')}}" type="text" class="form-control form-control-sm" maxlength="50" required="">
@error('major_group')
<small
class="error text-danger">{{ $message }}</small>
@enderror
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12">
<div class="form-group">
<label for="institution" class="profile_details_text-required">Institution</label>
<input name="institution[]" value="{{old('institution')}}" type="text" class="form-control form-control-sm" maxlength="100" required="">
@error('institution')
<small
class="error text-danger">{{ $message }}</small>
@enderror
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12">
<div class="form-group">
<label for="board" class="profile_details_text">Board</label>

<select class="form-control form-control-sm" id="board" name="board[]">
<option value="11">--Select Board --</option>
<option value="0">Barisal</option>
<option value="1">Chittagong</option>
<option value="2">Comilla</option>
<option value="3">Dhaka</option>
<option value="4">Dinajpur</option>
<option value="5">Jashore</option>
<option value="6">Mymensingh</option>
<option value="7">Rajshahi</option>
<option value="8">Sylhet</option>
<option value="9">Madrasha</option>
<option value="10">Technical</option>
<option value="11">Others</option>

</select>
@error('board')
<small
class="error text-danger">{{ $message }}</small>
@enderror
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12">
<div class="form-group">
<label for="result" class="profile_details_text-required">Result </label>
<select class="form-control form-control-sm" id="result" name="result[]" required="">
<option value="">--Select Result --</option>
<option value="0">First Division</option>
<option value="1">Second Division</option>
<option value="2">Third Division</option>
<option value="3">Grade</option>
<option value="4">Appeared</option>
<option value="5">Enrolled</option>
<option value="6">Awarded</option>
<option value="7">Do Not Mention</option>
<option value="8">Pass</option>
</select>
@error('result')
<small
class="error text-danger">{{ $message }}</small>
@enderror
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12">
<div class="form-group">
<label for="cgpa" class="profile_details_text-required">CGPA / Scale / Percentage</label>
<input name="cgpa[]" step="0.01" type="number"  min="1" value="{{old('cgpa')}}" class="form-control form-control-sm" required="">
@error('cgpa')
<small
class="error text-danger">{{ $message }}</small>
@enderror
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-12">
<div class="form-group">
<label for="pass_year" class="profile_details_text-required">Pass Year </label>
<?php
$year = array('1950'=>"1950", '1951'=>"1951", '1952'=>"1952", '1953'=>"1953", '1954'=>"1954", '1955'=>"1955", '1956'=>"1956", '1957'=>"1957", '1958'=>"1958", '1959'=>"1959", '1960'=>"1960", '1961'=>"1961", '1962'=>"1962", '1963'=>"1963", '1964'=>"1964", '1965'=>"1965", '1966'=>"1966", '1967'=>"1967", '1968'=>"1968", '1969'=>"1969", '1970'=>"1970", '1971'=>"1971", '1972'=>"1972", '1973'=>"1973", '1974'=>"1974", '1975'=>"1975", '1976'=>"1976", '1977'=>"1977", '1978'=>"1978", '1979'=>"1979", '1980'=>"1980", '1981'=>"1981", '1982'=>"1982", '1983'=>"1983", '1984'=>"1984", '1985'=>"1985", '1986'=>"1986", '1987'=>"1987", '1988'=>"1988", '1989'=>"1989", '1990'=>"1990", '1991'=>"1991", '1992'=>"1992", '1993'=>"1993", '1994'=>"1994", '1995'=>"1995", '1996'=>"1996", '1997'=>"1997", '1998'=>"1998", '1999'=>"1999", '2000'=>"2000", '2001'=>"2001", '2002'=>"2002", '2003'=>"2003", '2004'=>"2004", '2005'=>"2005", '2006'=>"2006", '2007'=>"2007", '2008'=>"2008", '2009'=>"2009", '2010'=>"2010", '2011'=>"2011", '2012'=>"2012", '2013'=>"2013", '2014'=>"2014", '2015'=>"2015", '2016'=>"2016", '2017'=>"2017", '2018'=>"2018", '2019'=>"2019", '2020'=>"2020", '2021'=>"2021");
?>
<select class="form-control form-control-sm" id="pass_year" name="pass_year[]" required="">
<option value="">--Select Passing Year--</option>
@foreach($year as $k => $v)
<option value="<?php echo $k; ?>">{{ $v }}</option>
@endforeach
</select>
@error('pass_year')
<small
class="error text-danger">{{ $message }}</small>
@enderror
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12">
<div class="form-group">
<label for="duration" class="profile_details_text-required">Duration </label>
<input name="duration[]" id="duration" value="{{old('duration')}}"  type="number" min="1" max="100" class="form-control form-control-sm" required="">
@error('duration')
<small
class="error text-danger">{{ $message }}</small>
@enderror
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12">
<div class="form-group">
<label for="achievement" class="profile_details_text"> Achievement </label>
<input name="achievement[]" id="achievement" value="{{old('achievement')}}" maxlength="50" title="Achievement should not contain more than 50 characters." type="text" class="form-control form-control-sm">
@error('achievement')
<small
class="error text-danger">{{ $message }}</small>
@enderror
</div>
</div>
</div>
</div>
</div>
`
$('#educationCard').append('<div>' + form + '</div>');
$('.academic_qualification').on('change',function(){
		var eduID = $(this).val();
        console.log(eduID)
        var eID = $(this).attr('data-id');
		if(eduID)
		{
			$.ajax({
				url : '/user/get/education/'+eduID,
				type : "GET",
				dataType : "json",
				success:function(data)
				{  
                    console.log(data) 
					$('.exam_degree_'+eID).empty();
					$('.exam_degree_'+eID).append('<option value="">--Select Degree--</option>');
					$.each(data, function(key,value){
						$('.exam_degree_'+eID).append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        console.log(value.name)
					});
				}
			});
		}
		else
		{
		$('.exam_degree_'+eID).empty();
		}
	});
x++;
// if (x < max) {
// $('#educationCard').append('<div>' + form + '</div>');
// x++
// alert('Add More Education Info');
// }else{
// alert('You can not add more  than 10 educational info.');
// }
$('#educationCard').on('click', '.remove_btn', function(e) {
    e.preventDefault();
    $(this).parent('.education_section_content').remove();
    x--
})

});



function removeSection(id) {
// e.preventDefault();
$(`.education_section_content.sec${id}`).remove();
x--
console.log('id')
}
</script>
<!-- training script  -->
<script>
var y = document.querySelectorAll('#training_section_content').length;
if(y == 0){
    y = 1;
}
var m = 9;
$('.popup_training').on('click', function(e) {
e.preventDefault();
const form = `
<div id="training_section_content" class="training_section_content sec${y+1} mt-4 ">
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<h6 class="mt-3">Training `+(y+1)+` 
<button class="remove_btn text-danger rm-btn" onClick="removeTraining(${y+1})"><i class="fa fa-trash"></i></button>
</h6>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s mt-3">
<label class="profile_details_text-required">Training
title</label>
<input type="text" name="train_title[]" class="form-control" maxlength="100" title="Training Title Maximum 100 characters." value="{{old('train_title')}}" required="">
@error('train_title')
<small class="text-danger">
{{$message}}
</small>
@enderror
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s mt-3">
<label class="profile_details_text">Country</label>
<input type="text" name="train_country[]" maxlength="50" title="Country Name Maximum 50 characters." class="form-control" value="{{old('train_country')}}">
@error('train_country')
<small class="text-danger">
{{$message}}
</small>
@enderror
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s mt-3">
<label class="profile_details_text-required">Topic
coverage </label>
<input type="text" name="topic_coverd[]" class="form-control" value="{{old('topic_coverd')}}" maxlength="200" title="Topics Covered Maximum 200 characters." required="">
@error('topic_coverd')
<small class="text-danger">
{{$message}}
</small>
@enderror
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s mt-3">
<label class="profile_details_text-required">Institution</label>
<input type="text" name="train_institution[]" maxlength="80" title="Institute Name Maximum 80 characters." class="form-control" value="{{old('train_institution')}}" required="">
@error('train_institution')
<small class="text-danger">
{{$message}}
</small>
@enderror
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s mt-3">
<label class="profile_details_text-required">Duration</label>
<input type="text" maxlength="10" title="Duration Maximum 10 characters." placeholder="2 hours/months/years" name="train_duration[]"  class="form-control" value="{{old('train_duration')}}" required="">
@error('train_duration')
<small class="text-danger">
{{$message}}
</small>
@enderror
</div>
</div>

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s mt-3">
<label class="profile_details_text-required">Training
Period</label>
<input type="text" name="train_period[]" placeholder="2014-2016" maxlength="50" title="Training Period Maximum 50 characters." class="form-control" value="{{old('train_period')}}" required="">
@error('train_period')
<small class="text-danger">
{{$message}}
</small>
@enderror
</div>
</div>
</div>
<div class="row">

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s mt-3">
<label class="profile_details_text">Location</label>
<input type="text" name="train_location[]" maxlength="50" title="Location Maximum 50 characters." class="form-control" value="{{old('train_location')}}">
@error('train_location')
<small class="text-danger">
{{$message}}
</small>
@enderror
</div>
</div>
</div>
<br>

`
$('#trainingCard').append('<div>' + form + '</div>');
// if (y < m) {
// $('#trainingCard').append('<div>' + form + '</div>');
y++
// alert('Add More Training Info');
// }else{
// alert('You can not add more  than 10 training info.');
// }
$('#trainingCard').on('click', '.remove_btn', function(e) {
    e.preventDefault();
    $(this).parent('.training_section_content').remove();
    y--
})

});



function removeTraining(id) {
// e.preventDefault();
$(`.training_section_content.sec${id}`).remove();
y--
console.log('id')
}
</script>

<!-- certificate script -->
<script>

var cer = document.querySelectorAll('#certificate_section_content').length;
if(cer == 0){
    cer =1;
}
var mx = 9;
$('.popCertificate').on('click', function(e) {
e.preventDefault();
const form = `
<div id="certificate_section_content" class="certificate_section_content sec${cer+1}" >
<div  class="row mt-4">
<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
<div class="Experience-history mb-4">
<h6>Certificate `+(cer+1)+`
<button class="remove_btn text-danger rm-btn" onClick="removeCertificate(${cer+1})"><i class="fa fa-trash"></i></button>
</h6>
</div>
</div>
</div>

<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group">
<label class="profile_details_text-required">Name
of Certificate</label>
<input type="text" required="" maxlength="80" title="Name
of Certificate maximum 80 characters." name="certificate_title[]" class="form-control"
value="@if(!empty($certificate->certificate_title)) {{ $certificate->certificate_title }}@else {{old('certificate_title')}} @endif">
@error('certificate_title')
<small class="text-danger">
{{$message}}
</small>
@enderror
</div>

</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group">
<label class="profile_details_text-required">Institution</label>
<input type="text" required="" maxlength="100" title="Name
of Institution maximum 100 characters." name="certificate_institution[]" class="form-control" value="@if(!empty($certificate->certificate_institution)) {{ $certificate->certificate_institution }}@else{{old('certificate_institution')}} @endif"
>
@error('certificate_institution')
<small class="text-danger">
{{$message}}
</small>
@enderror
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group">
<label class="profile_details_text-required">Start Date</label>
<input type="date" required="" name="start_date[]" class="form-control" @if (!empty($certificate->start_date)) value="{{ $certificate->start_date }}" @else old('start_date') @endif"
>
@error('start_date')
<small class="text-danger">
{{$message}}
</small>
@enderror
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group">
<label class="profile_details_text-required">End Date</label>
<input type="date" required="" name="end_date[]" class="form-control" @if (!empty($certificate->end_date)) value="{{ $certificate->end_date }}" @else {{old('end_date')}} @endif"
>
@error('end_date')
<small class="text-danger">
{{$message}}
</small>
@enderror
</div>
</div>
</div>
<div class="row">

<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group">
<label class="profile_details_text-required">Period</label>
<input type="text" placeholder="" maxlength="100" title="Period maximum 80 characters."  required="" name="certificate_period[]" class="form-control" value="@if(!empty($certificate->certificate_period)) {{ $certificate->certificate_period }}@else {{old('certificate_period')}} @endif"
>
@error('certificate_period')
<small class="text-danger">
{{$message}}
</small>
@enderror
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group">
<label class="profile_details_text">Location</label>
<input type="text" name="certificate_location[]" maxlength="100" title="Location maximum 80 characters." class="form-control" value="@if(!empty($certificate->certificate_location)) {{ $certificate->certificate_location }} @else {{old('certificate_location')}} @endif"
>
@error('certificate_location')
<small class="text-danger">
{{$message}}
</small>
@enderror
</div>
</div>
</div>
<br>

</div>
</div>
`

console.log(form)

$('#certificateCard').append('<div>' + form + '</div>');
// if (exep < mx) {
// $('#expCard').append('<div>' + form + '</div>');
cer++
// alert('Add More Experience Info');
// }else{
// alert('You can not add more  than 10 Experience info.');
// }
$('#certificateCard').on('click', '.remove_btn', function(e) {
    e.preventDefault();
    $(this).parent('.certificate_section_content').remove();
    cer--
})

});



function removeCertificate(id) {
// e.preventDefault();
$(`.certificate_section_content.sec${id}`).remove();
cer--
console.log('id')
}
</script>
<script>

var exep = document.querySelectorAll('#experience_section_content').length;
if(exep == 0){
    exep =1;
}
var mx = 9;
$('.popExperience').on('click', function(e) {
e.preventDefault();
const form = `
<div id="experience_section_content" class="experience_section_content sec${exep+1} mt-4 ">
<div class="row">
<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
<div class="Experience-history mb-4">
<h6>Experience `+(exep+1)+`
<button class="remove_btn text-danger rm-btn" onClick="removeExperience(${exep+1})"><i class="fa fa-trash"></i></button>
</h6>
</div>
</div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group-s">
            <label class="profile_details_text-required">Company
                Name</label>
            <input type="text" maxlength="100" title="Company Name maximum 100 characters." name="company_name[]" required=""
                class="form-control @error('company_name') is-invalid @enderror"
                value="{{old('company_name')}}">
            @error('company_name')
            <small class="text-danger">
                {{$message}}
            </small>
            @enderror
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group-s">
            <label class="profile_details_text-required">Company
                Business</label>
            <input type="text" maxlength="100" title="Company
                Business maximum 100 characters." name="company_business[]" required=""
                class="form-control @error('company_business') is-invalid @enderror"
                value="{{old('company_business')}}">
            @error('company_business')
            <small class="text-danger">
                {{$message}}
            </small>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group-s">
            <label class="profile_details_text-required mt-3">Designation</label>
            <input type="text" maxlength="100" title="Designation maximum 100 characters." name="designation[]" required="" class="form-control @error('designation') is-invalid @enderror"
                value="{{old('designation')}}">
            @error('designation')
            <small class="text-danger">
                {{$message}}
            </small>
            @enderror
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group-s">
            <label class="profile_details_text mt-4">Department</label>
            <input type="text" maxlength="100" title="Department maximum 100 characters." name="department[]" class="form-control @error('department') is-invalid @enderror"
                value="{{old('department')}}">
            @error('department')
            <small class="text-danger">
                {{$message}}
            </small>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group-s">
            <label class="profile_details_text-required mt-3">Area
                Responsibilities</label>
            <textarea class="form-control @error('area_responsibility') is-invalid @enderror" required=""
                name="area_responsibility[]" id="exampleFormControlTextarea1"
                rows="3">{{old('area_responsibility')}}</textarea>
            @error('area_responsibility')
            <small class="text-danger">
                {{$message}}
            </small>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group-s">
            <label class="profile_details_text mt-3">Company
                location</label>
            <input type="text" maxlength="100" title="Company
                location maximum 100 characters." name="company_location[]"
                class="form-control @error('company_location') is-invalid @enderror"
                value="{{old('company_location')}}">
            @error('company_location')
            <small class="text-danger">
                {{$message}}
            </small>
            @enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group-s">
            <label class="profile_details_text-required mt-3">Employment
                Period</label>
            <input type="date" name="employment_period_start[]"
                class="form-control @error('employment_period_start') is-invalid @enderror"
                value="{{old('employment_period_start')}}"
                required="">
            @error('employment_period_start')
            <small class="text-danger">
                {{$message}}
            </small>
            @enderror
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group-s">
            <input type="date" name="employment_period_end[]"
                class="form-control exp-date @error('employment_period_end') is-invalid @enderror"
                value="{{old('employment_period_end')}}"
                required="">
            @error('employment_period_end')
            <small class="text-danger">
                {{$message}}
            </small>
            @enderror

        </div>
    </div>
</div>


<br>

</div> 
`
$('#expCard').append('<div>' + form + '</div>');
// if (exep < mx) {
// $('#expCard').append('<div>' + form + '</div>');
exep++
// alert('Add More Experience Info');
// }else{
// alert('You can not add more  than 10 Experience info.');
// }
$('#expCard').on('click', '.remove_btn', function(e) {
    e.preventDefault();
    $(this).parent('.experience_section_content').remove();
    exep--
})

});



function removeExperience(id) {
// e.preventDefault();
$(`.experience_section_content.sec${id}`).remove();
exep--
console.log('id')
}
</script>
<!-- language script-->
<script>
var l = document.querySelectorAll('#lang_section_content').length;
if(l == 0){
    l = 1;
}
var ml = 4;
$('.popLang').on('click', function(e) {
e.preventDefault();
const form = `
<div id="lang_section_content" class="lang_section_content sec${l+1} mt-4 ">
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<h6 class="mt-3">Language `+(l+1)+`
<button class="remove_btn text-danger rm-btn" onClick="removeLang(${l+1})"><i class="fa fa-trash"></i></button>
<h6>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s mt-3">
<label class="profile_details_text-required">Name
of Language</label>
<input type="text" name="language_name[]" maxlength="100" title="Name
of Language maximum 100 characters." class="form-control" value="{{old('language_name')}}" required="">
@error('language_name')
<small class="text-danger">
{{$message}}
</small>
@enderror
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s mt-3">
<label class="profile_details_text-required">Reading</label>
<input type="text" name="reading[]" maxlength="100" title="Reading maximum 100 characters." class="form-control" value="{{old('reading')}}" required="">
@error('reading')
<small class="text-danger">
{{$message}}
</small>
@enderror
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s mt-3">
<label class="profile_details_text-required">Writing</label>
<input type="text" name="writing[]" maxlength="100" title="Writing maximum 100 characters." class="form-control" value="{{old('writing')}}" required="">
@error('writing')
<small class="text-danger">
{{$message}}
</small>
@enderror
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s mt-3">
<label class="profile_details_text-required">Speaking</label>
<input type="text" name="speaking[]" maxlength="100" title="Speaking maximum 100 characters." class="form-control" value="{{old('speaking')}}" required="">
@error('speaking')
<small class="text-danger">
{{$message}}
</small>
@enderror
</div>
</div>
</div>
<br>
</div>
`
$('#langCard').append('<div>' + form + '</div>');
// if (l < ml) {
// $('#langCard').append('<div>' + form + '</div>');
l++
// alert('Add More Language Info');
// }else{
// alert('You can not add more  than 5 language skill info.');
// }
$('#langCard').on('click', '.remove_btn', function(e) {
    e.preventDefault();
    $(this).parent('.language_section_content').remove();
    l--
})

});



function removeLang(id) {
// e.preventDefault();
$(`.lang_section_content.sec${id}`).remove();
l--
console.log('id')
}
</script>

<script>
var r = document.querySelectorAll('#ref_section_content').length;
if(r == 0){
    r = 1;
}
var mr = 2;
$('.popRef').on('click', function(e) {
e.preventDefault();
const form = `
<div id="ref_section_content" class="ref_section_content sec${r+1} mt-4 ">
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<h6 class="mt-3">Reference `+(r+1)+`
<button class="remove_btn text-danger rm-btn" onClick="removeRef(${r+1})"><i class="fa fa-trash"></i>
</button>
</h6>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

<div class="form-group-s mt-2">
<label class="profile_details_text-required">Name</label>
<input type="text" name="ref_name[]" maxlength="100" title="Name maximum 100 characters." class="form-control" value="{{old('ref_name')}}" required="">
@error('ref_name')
<small class="text-danger">
{{$message}}
</small>
@enderror
</div>

</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

<div class="form-group-s mt-2">
<label class="profile_details_text-required">Designation</label>
<input type="text" name="ref_designation[]" maxlength="100" title="Designation maximum 100 characters." class="form-control" value="{{old('ref_designation')}}" required="">
@error('ref_designation')
<small class="text-danger">
{{$message}}
</small>
@enderror
</div>

</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s mt-2">
<label class="profile_details_text-required">Organization</label>
<input type="text" name="ref_org[]" maxlength="100" title="Organization maximum 100 characters." class="form-control" value="{{old('ref_org')}}" required="">
@error('ref_org')
<small class="text-danger">
{{$message}}
</small>
@enderror
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s mt-2">
<label class="profile_details_text">Relation</label>
<input type="text" name="ref_relation[]" maxlength="100" title="Relation maximum 100 characters." class="form-control" value="{{old('ref_relation')}}">
@error('ref_relation')
<small class="text-danger">
{{$message}}
</small>
@enderror
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s mt-2">
<label class="profile_details_text">Email</label>
<input type="text" name="ref_email[]" title="Email address must be a valid email.Example: john@gmail.com" maxlength="40" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" value="{{old('ref_email')}}">
@error('ref_email')
<small class="text-danger">
{{$message}}
</small>
@enderror
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s mt-2">
<label class="profile_details_text-required">Mobile</label>
<input type="text" name="ref_mobile[]" maxlength="15" pattern="[+]?[0-9]{6,15}" title="Enter a valid phone number" class="form-control" value="{{old('ref_mobile')}}" required="">
@error('ref_mobile')
<small class="text-danger">
{{$message}}
</small>
@enderror
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s mt-2">
<label class="profile_details_text">Phone Home</label>
<input type="text" name="ref_phone_res[]" maxlength="15" pattern="[+]?[0-9]{6,15}" title="Enter a valid phone number" class="form-control" value="{{old('ref_phone_res')}}" >
@error('ref_phone_res')
<small class="text-danger">
{{$message}}
</small>
@enderror
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s mt-2">
<label class="profile_details_text">Phone Office</label>
<input type="text" name="ref_phone_off[]" maxlength="15" pattern="[+]?[0-9]{6,15}" title="Enter a valid phone number" class="form-control" value="{{old('ref_phone_off')}}">
@error('ref_phone_off')
<small class="text-danger">
{{$message}}
</small>
@enderror
</div>
</div>
</div>

<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s mt-2">
<label class="profile_details_text">Address</label>
<input type="text" name="ref_address[]" maxlength="100" title="Address maximum 100 characters." class="form-control" value="{{old('ref_address')}}">
@error('ref_address')
<small class="text-danger">
{{$message}}
</small>
@enderror
</div>
</div>
</div>
<br>

</div>
`

if (r < mr) {
$('#refCard').append('<div>' + form + '</div>');
r++

}else{
alert('You can not add more  than 2 reference info.');
}
// $('#educationCard').on('click', '.remove_btn', function(e) {
//     e.preventDefault();
//     $(this).parent('.education_section_content').remove();
//     r--
// })

});



function removeRef(id) {
// e.preventDefault();
$(`.ref_section_content.sec${id}`).remove();
r--
console.log('id')
}
</script>
@endpush
