<?php
$counter = 1;
?>
@if(count($p_certificate) > 0)
@foreach($p_certificate as $certificate)
<form action="{{route('update.certificate')}}" method="POST">
@csrf
<div id="certificate_section_content" class="row certificate_section_content">
<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
<div class="Experience-history mb-4">
<h6>Certificate<?php echo $counter ++; ?></h6>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<form action="{{route('update.certificate')}}" method="POST">
@csrf
<div class="form-group">
<label class="profile_details_text-required">Name
of Certificate</label>
<input type="text" required="" maxlength="80" title="Name
of Certificate maximum 80 characters." name="certificate_title[]" class="form-control"
value="@if(!empty($certificate->certificate_title)) {{ $certificate->certificate_title }} @endif">
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
<input type="text" required="" maxlength="100" title="Institute maximum 100 characters." name="certificate_institution[]" class="form-control" value="@if(!empty($certificate->certificate_institution)) {{ $certificate->certificate_institution }} @endif"
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
<input type="text" placeholder="" maxlength="100" title="Period maximum 100 characters."  required="" name="certificate_period[]" class="form-control" value="@if(!empty($certificate->certificate_period)) {{ $certificate->certificate_period }}@else {{old('certificate_period')}} @endif"
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
<input type="text" name="certificate_location[]" maxlength="100"  title="Location maximum 100 characters." class="form-control" value="@if(!empty($certificate->certificate_location)) {{ $certificate->certificate_location }} @else {{old('certificate_location')}} @endif"
>
@error('certificate_location')
<small class="text-danger">
{{$message}}
</small>
@enderror
</div>
</div>
</div>
@endforeach
<div id="certificateCard" class="dis-none"></div>
<div class="row">
<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 submit">
<div class="form-group-s mt-2 mb-2 sc-btn">
<input type="submit" class="btn btn-success btn-save" value="Save">
</div>
<div class="form-group-s mt-2 mb-2 pl-3 sc-btn ">
<a href="/user/dashboard" class="btn btn-primary text-white">cancel</a>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 submit">
    <a class="btn add-edu-btn popCertificate" href=""><i class="fa fa-plus" aria-hidden="true"></i>
        Add Certificate (If Required) </a>
</div>
</div>

</form>
@else
<form action="{{route('update.certificate')}}" method="POST">
@csrf
<div id="certificate_section_content" class="row">
<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
<div class="Experience-history mb-4">
<h6>Certificate<?php echo $counter ++; ?></h6>
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
value="{{old('certificate_title')}}">
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
<input type="text" required="" maxlength="100" title="Institution maximum 100 characters." name="certificate_institution[]" class="form-control" value="{{ old('certificate_institution') }}"
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
<input type="date" required="" name="start_date[]" class="form-control" value="{{ old('start_date') }}"
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
<input type="date" required="" name="end_date[]" class="form-control" value="{{ old('end_date') }}"
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
<input type="text" placeholder="" maxlength="100" title="Period maximum 100 characters." required="" name="certificate_period[]" class="form-control" value="{{ old('certificate_period') }}"
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
<input type="text" name="certificate_location[]" maxlength="100" title="Location maximum 100 characters." class="form-control" value="{{ old('certificate_location') }}"
>
@error('certificate_location')
<small class="text-danger">
{{$message}}
</small>
@enderror
</div>
</div>
</div>

<div id="certificateCard" class="dis-none"></div>
<div class="row">
<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 submit">
    <a class="btn add-edu-btn popCertificate mb-2" href=""><i class="fa fa-plus" aria-hidden="true"></i>
        Add Certificate (If Required) </a>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 submit">
<div class="form-group-s mt-3 mb-3 sc-btn">
<input type="submit" class="btn btn-success btn-save" value="Save">
</div>
<div class="form-group-s mt-3 mb-3 pl-3 sc-btn ">
<a href="/user/dashboard" class="btn btn-primary text-white">cancel</a>
</div>
</div>
</div>
</form>
@endif