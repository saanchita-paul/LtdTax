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
.g-tax {
    background: #005900;
}
.toggle-group label {
    color: white;
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
                        <div class="job-bx-title clearfix mt-3 mb-5">
                            <?php  $cv = App\Models\ComInfoMatchingVisibility::where('job_id',$job_id)->first();?>
                            <h5 class="mb-4">Company Info Visibility</h5>
                            @if(!empty($cv))
                                <form role="form" class="forms-sample" action="{{route('info.post')}}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{$job_id}}" name="job_id">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 mb-2">
                                                <div><label for="company_name">Company Name</label></div>
                                                <div>
                                                    <input type="checkbox" name="company_name" {{ $cv->company_name == 1 ? 'checked' : '' }} data-toggle="toggle" data-on="Show" data-off="Hide" data-onstyle="success" data-offstyle="danger">
                                                </div>
                                                <div class="checkbox mt-4">
                                                    <label><input type="checkbox" id="changeShip"> Company Alternate Name</label>
                                                </div>
                                                <div id="changeShipInputs">
                                                    <div class="form-group">
                                                        <input type="text" class="w-75" value="@if(!empty($company_alt_name)){{$company_alt_name}}@endif" placeholder="Alternate name"  id="alt_name" name="alt_name">
                                                    </div>
                                                </div>
                                                @error('company_name')
                                                <small class="text-danger">
                                                    {{$message}}
                                                </small>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div><label for="company_addr">Company Address</label>
                                                </div>
                                                <div>
                                                    <input type="checkbox" name="company_addr" {{ $cv->company_addr == 1 ? 'checked' : '' }} data-toggle="toggle" data-on="Show" data-off="Hide" data-onstyle="success" data-offstyle="danger">
                                                </div>
                                                @error('company_addr')
                                                <small class="text-danger">
                                                    {{$message}}
                                                </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 mb-2">
                                                <div><label for="company_bus">Company Business</label>
                                                </div>
                                                <div>
                                                    <input type="checkbox" name="company_bus" {{ $cv->company_bus == 1 ? 'checked' : '' }} data-toggle="toggle" data-on="Show" data-off="Hide" data-onstyle="success" data-offstyle="danger">
                                                </div>
                                                @error('company_bus')
                                                <small class="text-danger">
                                                    {{$message}}
                                                </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h5 class="mb-4">Matching Criteria</h5>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 mb-2">
                                                <div> <label for="age">Age</label> </div>
                                                <div>
                                                    <input type="checkbox" name="age" {{ $cv->age == 1 ? 'checked' : '' }} data-toggle="toggle" data-on="Show" data-off="Hide" data-onstyle="success" data-offstyle="danger">
                                                </div>
                                                @error('age')
                                                <small class="text-danger">
                                                    {{$message}}
                                                </small>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div><label for="total_year_xp">Total Year of Experience</label></div>
                                                <div>
                                                    <input type="checkbox" name="total_year_xp" {{ $cv->total_year_xp == 1 ? 'checked' : '' }} data-toggle="toggle" data-on="Show" data-off="Hide" data-onstyle="success" data-offstyle="danger">
                                                </div>
                                                @error('total_year_xp')
                                                <small class="text-danger">
                                                    {{$message}}
                                                </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 mb-2">
                                                <div> <label for="salary">Salary</label> </div>
                                                <div>
                                                    <input type="checkbox" name="salary" {{ $cv->salary == 1 ? 'checked' : '' }}  data-toggle="toggle" data-on="Show" data-off="Hide" data-onstyle="success" data-offstyle="danger">
                                                </div>
                                                @error('salary')
                                                <small class="text-danger">
                                                    {{$message}}
                                                </small>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div><label for="area_exp">Area of Experience</label> </div>
                                                <div>
                                                    <input type="checkbox" name="area_exp" {{ $cv->area_exp == 1 ? 'checked' : '' }} data-toggle="toggle" data-on="Show" data-off="Hide" data-onstyle="success" data-offstyle="danger">
                                                </div>
                                                @error('area_exp')
                                                <small class="text-danger">
                                                    {{$message}}
                                                </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 mb-2">
                                                <div> <label for="gender">Gender</label> </div>
                                                <div>
                                                    <input type="checkbox" name="gender" {{ $cv->gender == 1 ? 'checked' : '' }} data-toggle="toggle" data-on="Show" data-off="Hide" data-onstyle="success" data-offstyle="danger">
                                                </div>
                                                @error('gender')
                                                <small class="text-danger">
                                                    {{$message}}
                                                </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div><br>
                                    <button class="btn btn-secondary" type="submit">Save & Preview Job</button>
                                </form>
                            @else
                                <form role="form" class="forms-sample" action="{{route('info.post')}}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{$job_id}}" name="job_id">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 mb-2">
                                                <div> <label for="company_name">Company Name</label> </div>
                                                <div>
                                                    <input type="checkbox" name="company_name" checked  data-toggle="toggle" id="sh" data-on="Show" data-off="Hide" data-onstyle="success" data-offstyle="danger">
                                                </div>
                                                <div class="checkbox mt-4">
                                                    <label><input type="checkbox" id="changeShip"> Company Alternate Name</label>
                                                </div>
                                                <div id="changeShipInputs">
                                                    <div class="form-group mt-2">
                                                        <input type="text" calss="w-75" placeholder="Alternate name" id="alt_name" name="alt_name">
                                                    </div>
                                                </div>  
                                                @error('company_name')
                                                <small class="text-danger">
                                                    {{$message}}
                                                </small>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div><label for="company_addr">Company Address</label></div>
                                                <div>
                                                    <input type="checkbox" name="company_addr" checked data-toggle="toggle" data-on="Show" data-off="Hide" data-onstyle="success" data-offstyle="danger">
                                                </div>
                                                @error('company_addr')
                                                <small class="text-danger">
                                                    {{$message}}
                                                </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 mb-2">
                                                <div><label for="company_bus">Company Business</label></div>
                                                <div>
                                                    <input type="checkbox" name="company_bus" checked data-toggle="toggle" data-on="Show" data-off="Hide" data-onstyle="success" data-offstyle="danger">
                                                </div>
                                                @error('company_bus')
                                                <small class="text-danger">
                                                    {{$message}}
                                                </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h5 class="mb-4">Matching Criteria</h5>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 mb-2">
                                                <div> <label for="age">Age</label> </div>
                                                <div>
                                                    <input type="checkbox" name="age" checked data-toggle="toggle" data-on="Show" data-off="Hide" data-onstyle="success" data-offstyle="danger">
                                                </div>
                                                @error('age')
                                                <small class="text-danger">
                                                    {{$message}}
                                                </small>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div><label for="total_year_xp">Total Year of Experience</label> </div>
                                                <div>
                                                    <input type="checkbox" name="total_year_xp" checked data-toggle="toggle" data-on="Show" data-off="Hide" data-onstyle="success" data-offstyle="danger">
                                                </div>
                                                @error('total_year_xp')
                                                <small class="text-danger">
                                                    {{$message}}
                                                </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 mb-2">
                                                <div> <label for="salary">Salary</label> </div>
                                                <div>
                                                    <input type="checkbox" name="salary" checked data-toggle="toggle" data-on="Show" data-off="Hide" data-onstyle="success" data-offstyle="danger">
                                                </div>
                                                @error('salary')
                                                <small class="text-danger">
                                                    {{$message}}
                                                </small>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div><label for="title">Area of Experience</label></div>
                                                <div>
                                                    <input type="checkbox" name="area_exp" checked data-toggle="toggle" data-on="Show" data-off="Hide" data-onstyle="success" data-offstyle="danger">
                                                </div>
                                                @error('area_exp')
                                                <small class="text-danger">
                                                    {{$message}}
                                                </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 mb-2">
                                                <div> <label for="gender">Gender</label></div>
                                                <div>
                                                    <input type="checkbox" name="gender" checked data-toggle="toggle" data-on="Show" data-off="Hide" data-onstyle="success" data-offstyle="danger">
                                                </div>
                                                @error('gender')
                                                <small class="text-danger">
                                                    {{$message}}
                                                </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div><br>
                                    <button class="btn btn-secondary" type="submit">Save & Preview Job</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
