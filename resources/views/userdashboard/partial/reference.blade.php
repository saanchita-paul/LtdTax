<?php $counter=1;?>
@if(count($reference)> 0)
@foreach($reference as $ref)
<form action="{{route('update.reference')}}" method="POST">
    @csrf
    <div id="ref_section_content" class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h6 class="mt-3">Reference <?php echo $counter++;?>
        </div>
    </div>
    <div  class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            
                <div class="form-group-s mt-2">
                    <label class="profile_details_text-required">Name</label>
                    <input type="text" name="ref_name[]" maxlength="100" title="Name maximum 100 characters."
                     class="form-control" value="@if(!empty($ref->ref_name)){{$ref->ref_name}}@endif" required="">
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
                    <input type="text" name="ref_designation[]" maxlength="100" title="Designation maximum 100 characters." class="form-control" value="@if(!empty($ref->ref_designation)){{$ref->ref_designation}}@endif" required="">
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
                <input type="text" name="ref_org[]" maxlength="100" title="Organization maximum 100 characters."  class="form-control" value="@if(!empty($ref->ref_org)){{$ref->ref_org}}@endif" required="">
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
                <input type="text" name="ref_relation[]" maxlength="100" title="Relation maximum 100 characters."   class="form-control" value="@if(!empty($ref->ref_relation)){{$ref->ref_relation}}@endif">
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
                <input type="text" name="ref_email[]" title="Email address must be a valid email.Example: john@gmail.com" maxlength="80" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" value="@if(!empty($ref->ref_email)){{$ref->ref_email}}@endif">
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
                <input type="text" name="ref_mobile[]" maxlength="15" pattern="[+]?[0-9]{6,15}" title="Enter a valid phone number" class="form-control" value="@if(!empty($ref->ref_mobile)){{$ref->ref_mobile}}@endif" required="">
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
                <input type="text" name="ref_phone_res[]" maxlength="15" pattern="[+]?[0-9]{6,15}" title="Enter a valid phone number" class="form-control" value="@if(!empty($ref->ref_phone_res)){{$ref->ref_phone_res}}@endif">
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
                <input type="text" name="ref_phone_off[]" class="form-control" maxlength="15" pattern="[+]?[0-9]{6,15}" title="Enter a valid phone number" value="@if(!empty($ref->ref_phone_off)){{$ref->ref_phone_off}}@endif">
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
                <input type="text" name="ref_address[]" maxlength="100" title="Address maximum 100 characters."  class="form-control" value="@if(!empty($ref->ref_address)){{$ref->ref_address}}@endif">
                @error('ref_address')
                    <small class="text-danger">
                    {{$message}}
                    </small>
                    @enderror
            </div>
        </div>
    </div>
    
    @endforeach
    <br>
    <div id="refCard" class="dis-none"></div>
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 submit">
            <a class="btn add-edu-btn mb-2 popRef" href=""><i class="fa fa-plus" aria-hidden="true"></i>
                Add Reference</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 submit">
            <div class="form-group-s mt-3 mb-3 sc-btn">
                <input type="submit" class="btn btn-success btn-save" value="Save">
            </div>
            <div class="form-group-s mt-3 mb-3 pl-3 sc-btn ">
            <a  href="/" class="btn btn-primary text-white">cancel</a>
            </div>
        </div>
    </div>
    
</form>
@else
<form action="{{route('update.reference')}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h6 class="mt-3">Reference <?php echo $counter++;?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        
                <div class="form-group-s mt-2">
                    <label class="profile_details_text-required">Name</label>
                    <input type="text" name="ref_name[]" maxlength="100" title="Name maximum 100 characters."
 class="form-control" value="{{old('ref_name')}}" required="">
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
                    <input type="text" maxlength="100" title="Designation maximum 100 characters." name="ref_designation[]" class="form-control" value="{{old('ref_designation')}}" required="">
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
                <input type="text" name="ref_email[]" title="Email address must be a valid email.Example: john@gmail.com" maxlength="80" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" value="{{old('ref_email')}}">
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
    <div id="refCard" class="dis-none"></div>
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 submit">
            <a class="btn add-edu-btn mb-2 popRef" href=""><i class="fa fa-plus" aria-hidden="true"></i>
                Add Reference</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 submit">
            <div class="form-group-s mt-3 mb-3 sc-btn">
                <input type="submit" class="btn btn-success btn-save" value="Save">
            </div>
            <div class="form-group-s mt-3 mb-3 pl-3 sc-btn ">
            <a  href="/" class="btn btn-primary text-white">cancel</a>
            </div>
        </div>
    </div>
    
</form>
@endif