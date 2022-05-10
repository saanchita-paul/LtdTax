@extends('master')
@section('content')
<style>
.form-s form input[type="text"],
input[type="email"]
{   color:black;
    padding: 5px 10px 5px 10px;
}
input[type="password"] {
    color: black;
}

.width4 {
    width: 400px;
}
.browse-job .btn.dropdown-toggle.btn-default, .browse-job .form-control, .submit-resume .btn.dropdown-toggle.btn-default, .submit-resume .form-control {
    box-shadow: none!important;
}
.job-bx {
    box-shadow: none;
}
.candidate-info .candidate-detail {
    box-shadow: none;
}
</style>
<main>
    <div class="section-full bg-white p-t50 p-b20">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 m-b30">
                    @include('empdashboard.include.emp-sidebar')
                </div>
                <div class="col-xl-9 col-lg-8 m-b30 mg-tp">
                    <div class="job-bx submit-resume">
                        <div class="job-bx-title clearfix">
                            <h5 class="font-weight-700 pull-left">Company Profile</h5><br><br>
                            @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}
                            <button type="button" class="close"
                            data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            @endif
                            @if(Session::has('warning'))
                            <div class="alert alert-warning">{{Session::get('warning')}}
                            <button type="button" class="close"
                            data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            @endif
                            <a href="/" class="site-button right-arrow button-sm float-right">Back</a>
                        </div>
                        <form  action="@if(!empty($empinfo)){{route('employer.update',[$empinfo->id])}} @else{{route('employer.store')}} @endif " method="post" enctype="multipart/form-data">
                            @if($empinfo != '')
                            @csrf
                            @method('PATCH')
                            @else
                            @csrf
                            @endif
                            <div class="row m-b30">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Company Name <span class="text-danger">*</span></label>
                                        <input type="text" required="" maxlength="100" class="form-control" placeholder="Enter Company Name"
                                            value="@if(!empty($empinfo->name)){{$empinfo->name}}@else{{old('name')}}@endif" name="name" id="name">
                                        @error('name')
                                        <small
                                        class="error text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Company Address <span class="text-danger">*</span></label>
                                        <input type="text" required="" maxlength="100" class="form-control" placeholder="Enter Company Address"
                                            value="@if(!empty($empinfo->address)){{$empinfo->address}}@else{{old('address')}}@endif" name="address"
                                            id="address">
                                        @error('name')
                                        <small
                                        class="error text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Website</label>
                                        <input maxlength="100" type="url" class="form-control" placeholder="Website Link"
                                        value="@if(!empty($empinfo->url)){{$empinfo->url}}@else {{old('url')}}@endif" name="url" id="url">
                                        @error('url')
                                        <small
                                        class="error text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="file_upload">
                                        Business/Tread license
                                        </label>
                                        <p>@if(!empty($empinfo->file_upload)){{ $empinfo->file_upload }}<span> <a style="background:#005A13;" class="p-1 btn text-white" href="{{ asset('uploads/cominfo/'.$empinfo->file_upload) }}">Download File</a></span>@else<p></p>@endif</p>
                                        <input type="file" name="file_upload" class="dropify form-control"
                                            data-height="70">
                                            <input type="hidden" name="hidden_file"
                                            value="@if(!empty($empinfo->file_upload)){{$empinfo->file_upload}}@endif">
                                        <small>Upload Pdf file in 5MB</small>
                                        @error('file_upload')
                                        <small
                                        class="error text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Company Logo <span class="text-danger">*</span></label>
                                        @if(!empty($empinfo->logo))
                                        <img width="80" src="{{asset('uploads/cominfo/'.$empinfo->logo)}}" alt="{{$empinfo->name}}">
                                        @else  
                                        <img width="80" src="{{asset('uploads/cominfo/company_logo.png')}}" alt="company logo">
                                        @endif
                                        <input type="file" name="logo" class="dropify form-control" data-height="70"
                                            value="@if(!empty($empinfo->logo)){{$empinfo->logo}}@endif">
                                        <input type="hidden" name="hidden_image" value="@if(!empty($empinfo->logo)){{$empinfo->logo}}@endif">
                                        @error('logo')
                                        <small
                                        class="error text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Description:</label>
                                        <textarea class="form-control" name="description" id="description" rows="4">@if(!empty($empinfo->description)){!!$empinfo->description!!}@else{{old('description')}}@endif</textarea>
                                        @error('description')
                                        <small
                                        class="error text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group-s">
                                        <label>District <span class="text-danger">*</span></label>
                                        <select name="district_id"
                                            class="form-control district_id @error('district_id') is-invalid @enderror ">
                                            <option value=""> -- Select District -- </option>
                                            @foreach ($districts as $district)
                                            <option value="{{ $district->id }}" @if(!empty($empinfo->district_id)) @if($district->id == $empinfo->district_id) selected @endif @endif>
                                                {{ $district->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('district_id')
                                        <small
                                        class="error text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group-s">
                                        <label>Thana/Police
                                            Station <span class="text-danger">*</span></label>
                                            <?php
                                        $thana= App\Models\Location::whereNotNull('district_id')->get();
                                        ?>
                                        <select name="thana_id" class="form-control thana_id" required=""> 
                                        @foreach($thana as $tha)
                                        @if(!empty($empinfo->thana_id))
                                        <option value="{{ $tha->id}}" @if($tha->id == $empinfo->thana_id) selected @endif> {{ $tha->name}} </option>
                                        @endif
                                        @endforeach    
                                        </select>
                                        @error('thana_id')
                                        <small
                                        class="error text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group-s">
                                        <label>Post Code <span class="text-danger">*</span></label>
                                        <input maxlength="4" pattern="\d{4}" title="Post code only allow 4 digits" type="text" name="post_code"
                                        class="form-control @error('post_code') is-invalid @enderror" value="@if(!empty($empinfo->post_code)){{$empinfo->post_code}}@else{{old('post_code')}}@endif"
                                        required="" placeholder="Post Code">
                                        @error('post_code')
                                        <small
                                        class="error text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- Contact Information -->
                            <div class="job-bx-title clearfix">
                                <h5 class="font-weight-700 pull-left text-uppercase mt-4">Contact Information</h5>
                            </div>
                            <div class="row m-b30">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Name </label>
                                        <input type="text" maxlength="100" title="Name should contain only letters" class="form-control" name="contact_name" id="name"
                                        placeholder="Enter name"
                                        value="@if(!empty($contact->name)){{$contact->name}}@else{{old('contact_name')}}@endif">
                                        @error('contact_name')
                                        <small
                                        class="error text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Designation</label>
                                        <input type="text" maxlength="100"  class="form-control" name="designation" id="designation"
                                        placeholder="Enter designation"
                                        value="@if(!empty($contact->designation)){{$contact->designation}}@else{{old('designation')}}@endif">
                                        @error('designation')
                                        <small
                                        class="error text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" maxlength="15" pattern="[+]?[0-9]{6,15}" title="Enter a valid phone number" class="form-control" placeholder="Enter phone  number"
                                        name="contact_phone" id="contact_phone"
                                        value="@if(!empty($contact->phone)){{$contact->phone}}@else{{old('contact_phone')}}@endif">
                                        @error('contact_phone')
                                        <small
                                        class="error text-danger">{{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" maxlength="100" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Email address must be a valid email.Example: john@gmail.com" class="form-control" name="contact_email" id="contact_email"
                                        placeholder="example@gmail.com"
                                        value="@if(!empty($contact->email)){{$contact->email}}@else{{old('contact_email')}}@endif">
                                        @error('contact_email')
                                        <small
                                        class="error text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="job-bx-title clearfix">
                                <h5 class="font-weight-700 pull-left text-uppercase">Billing Address</h5>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input type="email" maxlength="100" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Email address must be a valid email.Example: john@gmail.com" class="form-control" placeholder="example@gmail.com"
                                        name="billing_email" id="billing_email"
                                        value="@if(!empty($billing->email)){{$billing->email}}@else{{old('billing_email')}}@endif">
                                        @error('billing_email')
                                        <small
                                        class="error text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>Phone <span class="text-danger">*</span></label>
                                        <input type="text" maxlength="15" pattern="[+]?[0-9]{6,15}" title="Enter valid phpne number" class="form-control" placeholder="Enter phone number"
                                        name="billing_phone" id="billing_phone"
                                        value="@if(!empty($billing->phone)){{$billing->phone}}@else{{old('billing_phone')}}@endif">
                                        @error('billing_phone')
                                        <small
                                        class="error text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Address <span class="text-danger">*</span></label>
                                        <input type="text" maxlength="200" class="form-control" placeholder="Dhaka city"
                                        name="billing_address" id="address"
                                        value="@if(!empty($billing->address)){{$billing->address}}@else{{old('name')}}@endif">
                                        @error('billing_address')
                                        <small
                                        class="error text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="site-button m-b30">Update Setting</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
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
@endpush
