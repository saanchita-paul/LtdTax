@extends('master')

@section('content')
<style>
    .form-s form input[type="text"],
    input[type="email"],
    input[type="password"] {
        color: black;
    }

    .width4 {
        width: 400px;
    }

</style>
<main>
    <div class="section-full bg-white p-t50 p-b20">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 m-b30">
                    @include('empdashboard.include.emp-sidebar')
                </div>
                <div class="col-xl-9 col-lg-8 m-b30">
                    <div class="job-bx submit-resume">
                        <div class="job-bx-title clearfix">
                           
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
                            <h5 class="font-weight-700 pull-left">Profile  Information</h5>
                            <a href="/company/dashboard" class="site-button right-arrow button-sm float-right mt-4">Back</a>
                        </div>

                        <form
                            action="{{route('comprofile.update')}}"
                            method="post" enctype="multipart/form-data">
                          
                            @csrf
                          
                            <div class="row m-b30">
                                <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                <label class="profile_details_text-required">Username</label>
                                <input type="text" maxlength="30" title="Name should contain only letters [a-z,A-Z,.- ] and only 30 characters." pattern="[A-Za-z.\- ]{1,30}" name="firstname" required="" plaseholder="Enter firstname" id="firstname"
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
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
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


                                <div class="col-lg-6 col-md-6">
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