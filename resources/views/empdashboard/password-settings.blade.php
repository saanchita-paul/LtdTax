@extends('master')

@section('content')
<style>
    .form-s form input[type="text"],
    input[type="email"],
    input[type="password"] {
      
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

    .width4 {
        width: 400px;
    }

</style>
<main>
    <div class="section-full bg-white p-t50 p-b20 mt-4">
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
                            <h5 class="font-weight-700 pull-left">Change Password</h5>
                           
                            <a href="/company/dashboard" class="site-button right-arrow button-sm float-right mt-4">Back</a>
                        </div>

                        <form
                            action="{{route('comupdate.password')}}"
                            method="post" enctype="multipart/form-data">
                          
                            @csrf

                                                    
                            <div class="row m-b30">
                                <div class="col-lg-6 col-md-6">
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
                            <div class="col-lg-6 col-md-6">
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


                            <div class="col-lg-6 col-md-6">
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
                          
                         
                            <button type="submit" class="site-button m-b30">Change Password</button>
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