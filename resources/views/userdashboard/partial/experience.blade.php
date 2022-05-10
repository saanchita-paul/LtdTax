<?php
$counter = 1;
?>
@if(count($experience)>0)
@foreach($experience as $employment)
<h5 class="mb-4"> Employment History </h5>
<form action="{{route('update.employement')}}" method="POST">
@csrf
<div id="experience_section_content" class="row">
<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
<div class="Experience-history mb-4">
<h6>Experience<?php echo $counter ++; ?></h6>
</div>
</div>
</div>

<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group-s">
<label class="profile_details_text-required">Company
Name</label>
<input type="text" maxlength="100" title="Company
Name maximum 100 characters." name="company_name[]" required=""
class="form-control @error('company_name') is-invalid @enderror"
@if (!empty($employment->company_name)) value="{{ $employment->company_name }}" @endif">
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
value="@if (!empty($employment->company_business)) {{ $employment->company_business }} @endif">
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
<label
class="profile_details_text-required mt-3">Designation</label>
<input type="text" maxlength="100" title="Designation maximum 100 characters." name="designation[]" required=""
class="form-control @error('designation') is-invalid @enderror"
value="@if (!empty($employment->designation)) {{ $employment->designation }} @endif">
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
<input type="text" maxlength="100" title="Department maximum 100 characters." name="department[]"
class="form-control @error('department') is-invalid @enderror"
value="@if (!empty($employment->department)) {{ $employment->department }} @endif">
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
<textarea
class="form-control @error('area_responsibility') is-invalid @enderror" required=""
name="area_responsibility[]" id="exampleFormControlTextarea1"
rows="3">@if (!empty($employment->area_responsibility)) {{ $employment->area_responsibility }} @endif</textarea>
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
value="@if (!empty($employment->company_location)) {{ $employment->company_location }} @endif">
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
value="{{ $employment->employment_period_start }}"
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
value="{{ $employment->employment_period_end }}"
required="">
@error('employment_period_end')
<small class="text-danger">
{{$message}}
</small>
@enderror

</div>
</div>
</div>
<br><br>
<!-- <div class="row">
<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 submit">
<div class="form-check mt-1">
<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
<label class="form-check-label" for="defaultCheck1">
Currently Working
</label>
</div>
</div>
</div> -->

@endforeach
<div id="expCard" class="dis-none"></div>
<div class="row">
<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 submit">
<div class="form-group-s mt-2 mb-5 sc-btn">
<input type="submit" class="btn btn-success btn-save" value="Save">
</div>
<div class="form-group-s mt-2 mb-5 pl-3 sc-btn ">
<a href="/user/dashboard" class="btn btn-primary text-white">cancel</a>
</div>
</div>
</div>
</form>
<div class="row">
<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 submit">
    <a class="btn add-edu-btn popExperience" href=""><i class="fa fa-plus" aria-hidden="true"></i>
        Add Experience (If Required) </a>
</div>
</div>
@else
<form action="{{route('update.employement')}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
            <div class="Experience-history mb-4">
                <h6>Experience <?php echo $counter ++; ?></h6>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group-s">
                <label class="profile_details_text-required">Company
                    Name</label>
                <input type="text" maxlength="100" title="Company Name maximum 100 characters." name="company_name[]" required=""
                    class="form-control @error('company_name') is-invalid @enderror" value="{{old('company_name')}}">
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
                <input type="text" maxlength="100" title="Designation maximum 100 characters." name="designation[]" required=""
                    class="form-control @error('designation') is-invalid @enderror" value="{{old('designation')}}">
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
                <textarea class="form-control @error('area_responsibility') is-invalid @enderror"
                    name="area_responsibility[]" id="exampleFormControlTextarea1" required=""
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
                <input type="text" maxlength="100" title="Company location maximum 100 characters."  name="company_location[]"
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
                    value="{{old('employment_period_start')}}" required="">
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
                    value="{{old('employment_period_end')}}" required="">
                @error('employment_period_end')
                <small class="text-danger">
                    {{$message}}
                </small>
                @enderror

            </div>
        </div>
    </div>


<div id="expCard" class="dis-none"></div>
<div class="row">
<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 submit">
<a class="btn add-edu-btn popExperience mt-3 mb-2" href=""><i class="fa fa-plus"
aria-hidden="true"></i>
Add Experience (If Required) </a>
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
