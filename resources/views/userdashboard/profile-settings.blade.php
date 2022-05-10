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

    .form-s form input[type="text"],
    
    input[type="email"]
    {
        color: black;
        width: 100%;
        border: 1px solid #ced4da;
        font-size: 14px;
        font-weight: 200;
        margin-bottom: 45px;
        padding: 5px 10px 5px 10px;
        background: transparent;
        border-bottom: 1px solid #ced4da;
    },


    input[type="text"]
    {
        
        font-size: 14px;
        
    },


    input[type="number"]
    {
        
        font-size: 14px;
        
    },

    input[type="password"] {
        color: black;
        width: 100%;
        border: 1px solid #ced4da;
        font-size: 14px;
        font-weight: 200;
        margin-bottom: 45px;
        padding: 5px 0 10px 0;
        background: transparent;
        border-bottom: 1px solid #ced4da;
    }

    #email {
    float: right;
    margin-right: unset;
    padding-bottom: 10px;
    font-size: 14px;
    font-family: Verdana, sans-serif;
    color: unset;
}
</style>

<form action="{{route('profile.update')}}" method="POST">
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
            <h4 class="mb-4">Profile Information</h4>
            <div class="row">



                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group-s">
                        <label class="profile_details_text-required">First Name</label>
                        <input type="text" maxlength="30" title="First name should contain only letters [a-z,A-Z,.- ] and only 30 characters." pattern="[A-Za-z.\- ]{1,30}" name="firstname" required="" plaseholder="Enter firstname" id="firstname"
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
                    <div class="form-group-s">
                        <label class="profile_details_text">Last Name</label>
                       <input type="text" name="lastname" title="Last name should contain only letters  [a-z,A-Z,.- ] and only 30 characters."  required="" id="lastname" maxlength="30" pattern="[A-Za-z.\- ]{1,30}"
                        class="form-control @error('lastname') is-invalid @enderror"
                        placeholder="Last Name" @if (!empty($user_data->lname)) value="{{ $user_data->lname}}" @else value="{{old('lastname')}}" @endif>
                        @error('lastname')
                        <small
                        class="error text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="row mt-4">

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group-s">
                    <label class="profile_details_text-required">Email
                    Address:</label>
                    <input type="text" title="Email address must be a valid email.Example: john@gmail.com" maxlength="40" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
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
                        <label class="profile_details_text-required">Phone Number</label>
                        <input name="phone" required="" id="phone" maxlength="15" pattern="[+]?[0-9]{6,15}" title="Enter a valid phone number" type="tel"
                        class="form-control @error('phone') is-invalid @enderror "
                        placeholder="Phone number" 
                        @if (!empty($user_data->phone))  value="{{ $user_data->phone}}" @else value="{{old('phone')}}"  @endif>
                        @error('phone')
                        <small class="error text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

            </div>


        

            <button class="btn btn-success mt-4" type="submit">Save changes</button>
        </div>
    </div>
</form>
<br>
@endsection