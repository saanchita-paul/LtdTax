<?php include_once("web/common/config.php");?>
<?php echo $sCSSBootStrap;
echo $sCSSFontAwesome;
echo $sCSSEMM;
echo $sCSSEkko;
echo $sCSSAnimate; ?>
@extends('userdashboard.include.user-dashbord-master')
@section('user-content')
<style>
    .resume-form-input-wrapper {
        padding: unset;
    }
    .form-s form input[type="text"], input[type="email"], input[type="password"] {
    color: black;
    width: 100%;
    border: 1px solid #ced4da;
    font-size: 16px;
    font-weight: 200;
    margin-bottom: 20px;
    padding: 5px 10px 5px 10px;
    background: transparent;
    border-bottom: 1px solid #ced4da;
}
</style>

<form action="{{route('update.password')}}" method="POST">
@csrf
@if(session()->has('success'))
<div class="alert alert-success mt-4" role="alert">
{{ session()->get('success') }}
</div>
@endif
@if(session()->has('warn'))
<div class="alert alert-danger mt-4" role="alert">
{{ session()->get('warn') }}
</div>
@endif
<div class="resume-form-input-wrapper p-4">
    <div class="container">
    <h4 class="mb-4">Change Password</h4>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group-s">
                    <label class="profile_details_text-required">Current Password</label>
                    <input type="password" required="" name="current_password" maxlength="80" 
                        title="Provide current password" class="form-control @error('current_password') is-invalid @enderror" value="">
                    @error('current_password')
                    <small
                    class="error text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group-s">
                    <label class="profile_details_text-required">New Password</label>
                    <input type="password" required="" name="password" maxlength="80"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                    title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"
                    class="form-control @error('password') is-invalid @enderror" value="">
                    @error('password')
                    <small
                    class="error text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            
        </div>

       
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group-s">
                    <label class="profile_details_text-required">Confirm Password</label>
                    <input type="password" required="" name="password_confirmation" maxlength="80"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                    title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" class="form-control @error('password_confirmation') is-invalid @enderror">
                    @error('password_confirmation')
                    <small
                    class="error text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            
        </div>
       
        <button class="btn btn-success" type="submit">Save changes</button>
    </div>
</div>
</form>
<br>
@endsection