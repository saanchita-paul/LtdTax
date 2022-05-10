
<?php $counter=1;?>
@if(count($language)> 0)
@foreach($language as $lang)
<form action="{{route('update.language')}}" method="POST">
@csrf
    <div id="lang_section_content" class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h6 class="mt-3">Language <?php echo $counter++;?>
            </h6>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group-s mt-3">
                <label class="profile_details_text-required">Name
                    of Language</label>
                <input type="text" name="language_name[]" maxlength="100" title="Name
                    of Language maximum 100 characters." class="form-control" value="@if($lang->language_name){{$lang->language_name}}@endif" required="">
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
                <input type="text" name="reading[]" maxlength="100" title="Reading maximum 100 characters." class="form-control" value="@if($lang->reading){{$lang->reading}}@endif" required="">
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
                <input type="text" name="writing[]" maxlength="100" title="Writing maximum 100 characters." class="form-control" value="@if($lang->writing){{$lang->writing}}@endif" required="">
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
                <input type="text" name="speaking[]" maxlength="100" title="Speaking maximum 100 characters." class="form-control" value="@if($lang->speaking){{$lang->speaking}}@endif" required="">
				@error('speaking')
				<small class="text-danger">
				{{$message}}
				</small>
				@enderror
            </div>
        </div>
    </div>
	@endforeach
	<div id="langCard" class="dis-none"></div>
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 submit">
            <a class="btn add-edu-btn popLang mt-4" href=""><i class="fa fa-plus" aria-hidden="true"></i>
                Add Language</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 submit">
            <div class="form-group-s mt-4 mb-3 sc-btn">
                <input type="submit" class="btn btn-success btn-save" value="Save">
            </div>
            <div class="form-group-s mt-4 mb-3 pl-3 sc-btn ">
                <a  href="/" class="btn btn-primary text-white">cancel</a>
            </div>
        </div>
    </div>
</form>
@else
<form action="{{route('update.language')}}" method="POST">
@csrf
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h6 class="mt-3">Language <?php echo $counter++;?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group-s mt-3">
                <label class="profile_details_text-required">Name
                    of Language</label>
                <input type="text" name="language_name[]" maxlength="100" title="Name
                    of Language maximum 100 characters."  class="form-control" value="{{old('language_name')}}" required="">
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
	<div id="langCard" class="dis-none"></div>
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 submit">
            <a class="btn add-edu-btn popLang mt-4 mb-2" href=""><i class="fa fa-plus" aria-hidden="true"></i>
                Add Language</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 submit">
            <div class="form-group-s mt-4 mb-3 sc-btn">
                <input type="submit" class="btn btn-success btn-save" value="Save">
            </div>
            <div class="form-group-s mt-4 mb-3 pl-3 sc-btn ">
			<a  href="/" class="btn btn-primary text-white">cancel</a>
            </div>
        </div>
    </div>
    
</form>
@endif