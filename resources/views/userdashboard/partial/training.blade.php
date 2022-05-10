
<?php
$counter = 1;
?>
@if(count($edu_training)>0)
@foreach($edu_training as $edu)
<form action="{{route('education.training')}}" method="POST">
@csrf
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h6 class="mt-3">Training <?php echo $counter++;?>
    </div>
</div>
<div id="training_section_content" class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group-s mt-3">
            <label class="profile_details_text-required">Training
                title</label>
            <input type="text" name="train_title[]" maxlength="100" title="Training Title Maximum 100 characters." class="form-control " value="@if(!empty($edu->train_title)) {{ $edu->train_title }} @endif" required="">
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
            <input type="text" name="train_country[]" class="form-control" maxlength="50" title="Country Name Maximum 50 characters." value="@if(!empty($edu->train_country)) {{ $edu->train_country }} @endif">
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
            <input type="text" name="topic_coverd[]" class="form-control" maxlength="200" title="Topics Covered Maximum 200 characters." value="@if(!empty($edu->topic_coverd)) {{ $edu->topic_coverd }} @endif" required="">
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
            <input type="text" name="train_institution[]" class="form-control" maxlength="80" title="Institute Name Maximum 80 characters." value="@if(!empty($edu->train_institution)) {{ $edu->train_institution }} @endif" required="">
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
            <input type="text" maxlength="10" title="Duration Maximum 10 characters."  name="train_duration[]" placeholder="2 hours/months/years"   required="" class="form-control" value="{{ $edu->train_duration }}" >
            @error('train_duration')
            <small class="text-danger">
            {{$message}}
            </small>
            @enderror
        </div>
    </div>
    <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group-s mt-3">
            <label class="profile_details_text-required">Training
                Year</label>
            <input type="text" name="first_name" class="form-control" value="" required="">
        </div>
    </div> -->
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group-s mt-3">
            <label class="profile_details_text-required">Training
                Period</label>
            <input type="text" name="train_period[]" placeholder="2014-2016" maxlength="50" title="Training Period Maximum 50 characters." class="form-control" value="@if(!empty($edu->train_period)) {{ $edu->train_period }} @endif" required="">
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
            <input type="text" name="train_location[]" class="form-control" maxlength="50" title="Location Maximum 50 characters." value="@if(!empty($edu->train_location)) {{ $edu->train_location }} @endif">
            @error('train_location')
            <small class="text-danger">
            {{$message}}
            </small>
            @enderror
        </div>
    </div>
</div>

@endforeach
<div id="trainingCard" class="dis-none"></div>
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
        <a class="btn add-edu-btn popup_training mt-3 mb-3" href=""><i class="fa fa-plus" aria-hidden="true"></i>
            Add Training (If
            Required)</a>
    </div>
</div>
</form>
<br>
@else
<form action="{{route('education.training')}}" method="POST">
@csrf
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h6 class="mt-3">Training <?php echo $counter++;?>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group-s mt-3">
            <label class="profile_details_text-required">Training
                title</label>
            <input type="text" name="train_title[]" maxlength="100" title="Training Title Maximum 100 characters." class="form-control " value="{{old('train_title')}}" required="">
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
            <input type="text" name="topic_coverd[]" maxlength="200" title="Topics Covered Maximum 200 characters." class="form-control" value="{{old('topic_coverd')}}" required="">
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
            <input type="text" name="train_institution[]" class="form-control" maxlength="80" title="Institute Name Maximum 80 characters." value="{{old('train_institution')}}" required="">
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
            <input type="text" name="train_duration[]" maxlength="10" title="Duration Maximum 10 characters." placeholder="2 hours/months/years" class="form-control" value="{{old('train_duration')}}" required="">
            @error('train_duration')
            <small class="text-danger">
            {{$message}}
            </small>
            @enderror
        </div>
    </div>
    <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group-s mt-3">
            <label class="profile_details_text-required">Training
                Year</label>
            <input type="text" name="first_name" class="form-control" value="" required="">
        </div>
    </div> -->
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group-s mt-3">
            <label class="profile_details_text-required">Training
                Period</label>
            <input type="text" name="train_period[]" maxlength="50" title="Training Period Maximum 50 characters." placeholder="2014-2016" class="form-control" value="{{old('train_period')}}" required="">
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
            <input type="text" name="train_location[]" class="form-control" maxlength="50" title="Location Maximum 50 characters." value="{{old('train_location')}}">
            @error('train_location')
            <small class="text-danger">
            {{$message}}
            </small>
            @enderror
        </div>
    </div>
</div>


<div id="trainingCard" class="dis-none"></div>
<div class="row">
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 submit">
        <a class="btn add-edu-btn popup_training mt-3 mb-3" href=""><i class="fa fa-plus" aria-hidden="true"></i>
            Add Training (If
            Required)</a>
    </div>
</div>
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

</form>
@endif