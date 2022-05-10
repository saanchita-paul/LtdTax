@extends('admin')

@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h3>Edit Candidate Information</h3>

                    @if ($errors->any())
                    <div class="alert alert-warning" role="alert">
                        <strong>Warning! </strong> @if ($errors->count() == 1)
                        {{$errors->first()}}
                        @else
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    @endif



                    <div class="container">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home">Personal
                                    information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu1">Education / Training</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu2">Employment</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu3">Other Information</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu4">Photograph</a>
                            </li>

                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">


                            <div id="home" class="container tab-pane active"><br>
                                <!-- <h3>HOME</h3> -->

                                
                                <form role="form" class="forms-sample"
                                    action="{{route('candidate.update',$candidate->user_id)}}" method="POST"
                                    enctype="multipart/form-data">

                                    @csrf

                                    <div class="accordion" id="accordionExample">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h1 class="mb-0">
                                                    <button
                                                        class="btn btn-link btn-block text-left addressaccordion collapsed"
                                                        type="button" data-toggle="collapse" data-target="#collapseOne"
                                                        aria-expanded="false" aria-controls="collapseOne">
                                                        Persoanl & Address Details
                                                    </button>
                                                </h1>
                                            </div>

                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                                data-parent="#accordionExample">
                                                <div class="card-header bg-light">

                                                </div>
                                                <div class="card-body">

                                                    <h3>Personal Details</h3><br>
                                                    <input type="hidden" value="{{Auth::user()->id}}" name="user_id">

                                                    <div class="form-group">
                                                        <label for="fathers_name">Father's name </label>
                                                        <input type="text" class="form-control" id="fathers_name"
                                                            name="fathers_name" value="{{$candidate->fathers_name}}"
                                                            placeholder="Please enter father's name">
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="mothers_name">Mother's name </label>
                                                        <input type="text" class="form-control" id="mothers_name"
                                                            name="mothers_name" value="{{$candidate->mothers_name}}"
                                                            placeholder="Please enter mother's name">
                                                    </div>




                                                    <div class="form-group">
                                                        <label for="dob">Date of Birth</label>
                                                        <div id="" class="input-group date datepicker datepicker-popup">
                                                            <input type="text" class="form-control" id="dob" name="dob"
                                                                value="{{$candidate->dob}}" placeholder="dd/mm/yyyy">
                                                            <span
                                                                class="input-group-addon input-group-append border-left">
                                                                <span class="mdi mdi-calendar input-group-text"></span>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="religion">Religions</label>
                                                        <select class="form-control form-control-lg" id="religion"
                                                            name="religion">

                                                            <option value="">--Select Religions</option>
                                                            <option value="0"
                                                                {{$candidate->religion === 0 ? 'Selected' : ''}}>Islam

                                                            </option>
                                                            <option value="1"
                                                                {{$candidate->religion === 1 ? 'Selected' : ''}}>
                                                                Christianity
                                                            </option>
                                                            <option value="2"
                                                                {{$candidate->religion === 2 ? 'Selected' : ''}}>
                                                                Hinduism
                                                            </option>
                                                            <option value="3"
                                                                {{$candidate->religion === 3 ? 'Selected' : ''}}>
                                                                Buddhists
                                                            </option>
                                                            <option value="4"
                                                                {{$candidate->religion === 4 ? 'Selected' : ''}}>Others
                                                            </option>


                                                        </select>
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="marital_status">Martital Status</label>
                                                        <select class="form-control form-control-lg" id="marital_status"
                                                            name="marital_status">
                                                            <option value="">--Select Martital Status</option>

                                                            <option value="0"
                                                                {{$candidate->marital_status === 0 ? 'Selected' : ''}}>
                                                                Single

                                                            </option>
                                                            <option value="1"
                                                                {{$candidate->marital_status === 1 ? 'Selected' : ''}}>
                                                                Married
                                                            </option>
                                                            <option value="2"
                                                                {{$candidate->marital_status === 2 ? 'Selected' : ''}}>
                                                                Divorced
                                                            </option>
                                                            <option value="3"
                                                                {{$candidate->marital_status === 3 ? 'Selected' : ''}}>
                                                                Widowed
                                                            </option>

                                                        </select>
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="nationality">Nationality</label>
                                                        <input type="text" class="form-control" id="nationality"
                                                            name="nationality" value="{{$candidate->nationality}}"
                                                            placeholder="Please enter nationality">
                                                    </div>



                                                    <div class="form-group">
                                                        <label for="nid">NID </label>
                                                        <input type="number" min="1" class="form-control" id="nid" name="nid"
                                                            value="{{$candidate->nid}}" placeholder="Please enter nid">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="passport">Passport Number </label>
                                                        <input type="number" min="1" class="form-control" id="passport"
                                                            name="passport" value="{{$candidate->passport}}"
                                                            placeholder="Please enter passport number">
                                                    </div>



                                                    <div class="form-group">
                                                        <label for="passport_issue_date">Passport Issue Date</label>
                                                        <div id="" class="input-group date datepicker datepicker-popup">
                                                            <input type="text" class="form-control"
                                                                id="passport_issue_date" name="passport_issue_date"
                                                                value="{{$candidate->passport_issue_date}}"
                                                                placeholder="dd/mm/yyyy">
                                                            <span
                                                                class="input-group-addon input-group-append border-left">
                                                                <span class="mdi mdi-calendar input-group-text"></span>
                                                            </span>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="mobile1">Mobile Number-1 <span
                                                                class="required-icon">*</span></label>
                                                        <input type="number" min="1" class="form-control" id="mobile1"
                                                            name="mobile1" value="{{$candidate->mobile1}}"
                                                            placeholder="Please enter mobile-1">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="mobile2">Mobile Number-2</label>
                                                        <input type="number" min="1" class="form-control" id="mobile2"
                                                            name="mobile2" value="{{$candidate->mobile2}}"
                                                            placeholder="Please enter mobile-2">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="mobile3">Mobile Number-3</label>
                                                        <input type="number" min="1" class="form-control" id="mobile3"
                                                            name="mobile3" value="{{$candidate->mobile3}}"
                                                            placeholder="Please enter mobile-3">
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="email">Email <span
                                                                class="required-icon">*</span></label>
                                                        <input type="email" class="form-control" id="email" name="email"
                                                            value="{{$candidate->email}}"
                                                            placeholder="Please enter email">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="alt_email">Alternative Email </label>
                                                        <input type="email" class="form-control" id="alt_email"
                                                            name="alt_email" value="{{$candidate->alt_email}}"
                                                            placeholder="Please enter alternative email">
                                                    </div>

                                                    <h3>Address Details</h3><br>

                                                    <div class="form-group">
                                                        <label for="district_id">District </label>
                                                        <select class="js-example-basic-single district_id"
                                                            style="width:100%" name="district_id" id="">
                                                            <option value="">Select District</option>

                                                            @foreach($district_id as $dis)
                                                            <option value="{{$dis->id}}"
                                                                {{ $dis->id == $candidate->district_id ? 'selected' : '' }}>
                                                                {{$dis->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="thana_id">Thana </label>
                                                        <select class="js-example-basic-single thana thana_id"
                                                            style="width:100%" name="thana_id" id=""
                                                            class="form-control">
                                                            <option value="">Select Thana</option>
                                                            @foreach($thana_id as $thn)
                                                            <option value="{{$thn->id}}"
                                                                {{ $thn->id == $candidate->thana_id ? 'selected' : '' }}>
                                                                {{$thn->name}}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="address1">Address 1 </label>
                                                                <input type="text" class="form-control" id="address1"
                                                                    name="address1" value="{{$candidate->address1}}"
                                                                    placeholder="Please enter address-1">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="address2">Address 2 </label>
                                                                <input type="text" class="form-control" id="address2"
                                                                    name="address2" value="{{$candidate->address2}}"
                                                                    placeholder="Please enter address-2">
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="pre_address">Present Address</label>
                                                                <input type="text" class="form-control" id="pre_address"
                                                                    name="pre_address"
                                                                    value="{{$candidate->pre_address}}"
                                                                    placeholder="Please enter present address">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="parm_address">Parmanent Address</label>
                                                                <input type="text" class="form-control"
                                                                    id="parm_address" name="parm_address"
                                                                    value="{{$candidate->parm_address}}"
                                                                    placeholder="Please enter parmanent address">
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="post_code">Post Code</label>
                                                        <input type="number" min="1" class="form-control" id="post_code"
                                                            name="post_code" value="{{$candidate->post_code}}"
                                                            placeholder="Please enter post code">
                                                    </div>


                                                    <button type="submit" class="btn btn-success mr-2">Update</button>
                                                     <a href="/dashboard" class="btn btn-light">Cancel</a>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </form>


                                <div class="accordion md-accordion" id="accordionExmple" role="tablist"
                                    aria-multiselectable="fase">

                                  
                                    <form role="form" class="forms-sample"
                                        action="{{route('cancareer.update',[$career->user_id])}}" method="POST"
                                        enctype="multipart/form-data">

                                        @csrf

                                        <div class="card">

                                            <!-- Card header -->
                                            <div class="card-header" role="tab" id="headingFive5">
                                                <a class="collapsed" data-toggle="collapse"
                                                    data-parent="#accordionExmple" href="#collapseFive5"
                                                    aria-expanded="false" aria-controls="collapseFive5">
                                                    <h5 class="mb-0">
                                                        Career and Application Information <i
                                                            class="fa fa-angle-down rotate-icon"></i>
                                                    </h5>
                                                </a>
                                            </div>

                                            <!-- Card body -->
                                            <div id="collapseFive5" class="collapse" role="tabpanel"
                                                aria-labelledby="headingFive5" data-parent="#accordionExmple">


                                                <div class="card-body">
                                                    <!-- <h3>Skills-1</h3> -->
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="objective">Objective</label>
                                                                <textarea class="form-control" name="objective" rows="4"
                                                                    cols="50" id="objective" name="objective"
                                                                    placeholder="Write Career objective">{{$career->objective}}</textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label>Present salary</label>
                                                                <input type="text" class="form-control"
                                                                    name="pre_salary" id="pre_salary"
                                                                    value="{{$career->pre_salary}}"
                                                                    placeholder="TK/Month">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label>Expected Salary</label>
                                                                <input type="text" class="form-control"
                                                                    name="exp_salary" id="exp_salary"
                                                                    value="{{$career->exp_salary}}"
                                                                    placeholder="TK/Month">
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6 form-group">
                                                            <label for="lookForView">Looking for (Job Level)</label>



                                                            <div class="btn-form-control">
                                                                <fieldset>
                                                                    <legend class="sr-only">Looking for (Job Level)
                                                                    </legend>
                                                                    <label aria-label="entry level"
                                                                        class="radio-inline">

                                                                        <input type="radio" name="job_level"
                                                                            id="job_level" value="0"
                                                                            {{ ($career->job_level=="0")? "checked" : "" }}>
                                                                        Entry Level
                                                                    </label>
                                                                    <label aria-label="mid level" class="radio-inline">
                                                                        <input type="radio" name="job_level"
                                                                            id="job_level" value="1"
                                                                            {{ ($career->job_level=="1")? "checked" : "" }}>
                                                                        Mid Level
                                                                    </label>

                                                                    <label aria-label="top level" class="radio-inline">
                                                                        <input type="radio" name="job_level"
                                                                            id="job_level" value="2"
                                                                            {{ ($career->job_level=="2")? "checked" : "" }}>
                                                                        Top Level
                                                                    </label>
                                                                </fieldset>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 form-group">
                                                            <label for="" id="availForInfo">Available for (Job
                                                                Nature)</label>



                                                            <div class="btn-form-control">
                                                                <div>
                                                                    <fieldset>
                                                                        <legend class="sr-only">Available for (Job
                                                                            Nature)</legend>
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="optAvail"
                                                                                id="avaiRadio"
                                                                                aria-describedby="availForInfo"
                                                                                value="0"
                                                                                {{ ($career->job_nature=="0")? "checked" : "" }}>
                                                                            Full time
                                                                        </label>
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="optAvail"
                                                                                id="avaiRadio"
                                                                                aria-describedby="availForInfo"
                                                                                value="1"
                                                                                {{ ($career->job_nature=="1")? "checked" : "" }}>
                                                                            Part time
                                                                        </label>
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="optAvail"
                                                                                id="avaiRadio"
                                                                                aria-describedby="availForInfo"
                                                                                value="2"
                                                                                {{ ($career->job_nature=="2")? "checked" : "" }}>
                                                                            Contract
                                                                        </label>
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="optAvail"
                                                                                id="avaiRadio"
                                                                                aria-describedby="availForInfo"
                                                                                value="3"
                                                                                {{ ($career->job_nature=="3")? "checked" : "" }}>
                                                                            Internship
                                                                        </label>
                                                                        <label class="radio-inline">
                                                                            <input type="radio" name="optAvail"
                                                                                id="avaiRadio"
                                                                                aria-describedby="availForInfo"
                                                                                value="4"
                                                                                {{ ($career->job_nature=="4")? "checked" : "" }}>
                                                                            Freelance
                                                                        </label>
                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <button type="submit"
                                                            class="btn btn-success mr-2">Update</button>
                                                         <a href="/dashboard" class="btn btn-light">Cancel</a>

                                                    </div>
                                                </div>

                                            </div>
                                    </form>

                                    <form role="form" class="forms-sample"
                                        action="{{route('language.update',[$language->user_id])}}" method="POST"
                                        enctype="multipart/form-data">

                                        @csrf
                                        <div class="card">

                                            <!-- Card header -->
                                            <div class="card-header" role="tab" id="headingSix6">
                                                <a class="collapsed" data-toggle="collapse"
                                                    data-parent="#accordionExmple" href="#collapseSix6"
                                                    aria-expanded="false" aria-controls="collapseSix6">
                                                    <h5 class="mb-0">
                                                        Preferred Areas<i class="fas fa-angle-down rotate-icon"></i>
                                                    </h5>
                                                </a>
                                            </div>

                                            <!-- Card body -->
                                            <div id="collapseSix6" class="collapse" role="tabpanel"
                                                aria-labelledby="headingSix6" data-parent="#accordionExmple">
                                                <div class="card-body">
                                                    <!-- <h3>Language-1</h3> -->
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="language_name">Language</label>
                                                                <input type="text" class="form-control"
                                                                    name="language_name" id="language_name"
                                                                    value="{{$lang->language_name}}"
                                                                    placeholder="Enter language">
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="reading">Reading</label>
                                                                <select class="form-control form-control-sm"
                                                                    id="reading" name="reading">
                                                                    <option value="">--Select--</option>

                                                                    <option value="0"
                                                                        {{$lang->reading === 0 ? 'Selected' : ''}}>High

                                                                    </option>
                                                                    <option value="1"
                                                                        {{$lang->reading === 1 ? 'Selected' : ''}}>
                                                                        Medium
                                                                    </option>
                                                                    <option value="2"
                                                                        {{$lang->reading === 2 ? 'Selected' : ''}}>
                                                                        Low
                                                                    </option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="writing">Writing</label>
                                                                <select class="form-control form-control-sm"
                                                                    id="writing" name="writing">
                                                                    <option value="">--Select--</option>
                                                                    <option value="0"
                                                                        {{$lang->writing === 0 ? 'Selected' : ''}}>High

                                                                    </option>
                                                                    <option value="1"
                                                                        {{$lang->writing === 1 ? 'Selected' : ''}}>
                                                                        Medium
                                                                    </option>
                                                                    <option value="2"
                                                                        {{$lang->writing === 2 ? 'Selected' : ''}}>
                                                                        Low
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="speaking">Speaking</label>
                                                                <select class="form-control form-control-sm"
                                                                    id="speaking" name="speaking">
                                                                    <option value="">--Select--</option>
                                                                    <option value="0"
                                                                        {{$lang->speaking === 0 ? 'Selected' : ''}}>High

                                                                    </option>
                                                                    <option value="1"
                                                                        {{$lang->speaking === 1 ? 'Selected' : ''}}>
                                                                        Medium
                                                                    </option>
                                                                    <option value="2"
                                                                        {{$lang->speaking === 2 ? 'Selected' : ''}}>
                                                                        Low
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>







                                                    </div>

                                                    <button type="submit" class="btn btn-success mr-2">Save</button>
                                                     <a href="/dashboard" class="btn btn-light">Cancel</a>
                                                    <div class="d-flex justify-content-end">


                                                        <button type="button"
                                                            class=" btn btn-success mr-2 training_add_btn"
                                                            data-trigger="focus">Add Language</button>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </form>

                                    <form role="form" class="forms-sample"
                                        action="{{route('relinfo.update',[$relinfo->user_id])}}" method="POST"
                                        enctype="multipart/form-data">

                                        @csrf
                                        <div class="card">

                                            <!-- Card header -->
                                            <div class="card-header" role="tab" id="headingSeven7">
                                                <a class="collapsed" data-toggle="collapse"
                                                    data-parent="#accordionExmple" href="#collapse"
                                                    aria-expanded="false" aria-controls="collapse">
                                                    <h5 class="mb-0">
                                                        Other Relevant Information <i
                                                            class="fas fa-angle-down rotate-icon"></i>
                                                    </h5>
                                                </a>
                                            </div>

                                            <!-- Card body -->
                                            <div id="collapse" class="collapse" role="tabpanel"
                                                aria-labelledby="headingSeven7" data-parent="#accordionExmple">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="career_sum">Career Summary</label>
                                                                <textarea class="form-control" rows="4" cols="50"
                                                                    id="career_sum" name="career_sum"
                                                                    placeholder="Write your Career summery">{{$relinfo->career_sum}}</textarea>
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="spec_qualification">Special
                                                                    Qualification</label>
                                                                <textarea class="form-control" rows="4" cols="50"
                                                                    id="spec_qualification" name="spec_qualification"
                                                                    value=""
                                                                    placeholder="Write special qualification">{{$relinfo->spec_qualification}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label>Keywords</label>
                                                                <input type="text" class="form-control" name="keyword"
                                                                    id="keyword" value="{{$relinfo->keyword}}"
                                                                    placeholder="Enter keywords">
                                                            </div>
                                                        </div>





                                                    </div>

                                                    <button type="submit" class="btn btn-success mr-2">Save</button>
                                                     <a href="/dashboard" class="btn btn-light">Cancel</a>

                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <form role="form" class="forms-sample"
                                        action="{{route('disability.update',[$disable->user_id])}}" method="POST"
                                        enctype="multipart/form-data">

                                        @csrf
                                        <div class="card">

                                            <!-- Card header -->
                                            <div class="card-header" role="tab" id="headingSeven7">
                                                <a class="collapsed" data-toggle="collapse"
                                                    data-parent="#accordionExmple" href="#collapse"
                                                    aria-expanded="false" aria-controls="collapse">
                                                    <h5 class="mb-0">
                                                        Disability Information <i
                                                            class="fas fa-angle-down rotate-icon"></i>
                                                    </h5>
                                                </a>
                                            </div>

                                            <!-- Card body -->
                                            <div id="collapse" class="collapse" role="tabpanel"
                                                aria-labelledby="headingSeven7" data-parent="#accordionExmple">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="career_objective">Difficulty to See </label>
                                                                <select class="form-control form-control-sm"
                                                                    id="diff_see" name="diff_see">
                                                                    <option value="">--Select--</option>
                                                                    <option value="0"
                                                                        {{$disable->diff_see === 0 ? 'Selected' : ''}}>
                                                                        Can not do at all

                                                                    </option>
                                                                    <option value="1"
                                                                        {{$disable->diff_see === 1 ? 'Selected' : ''}}>
                                                                        Yes- a lot of difficulty
                                                                    </option>
                                                                    <option value="2"
                                                                        {{$disable->diff_see === 2 ? 'Selected' : ''}}>
                                                                        Yes- Some difficulty
                                                                    </option>


                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label>Difficulty to Hear </label>
                                                                <select class="form-control form-control-sm"
                                                                    id="diff_hear" name="diff_hear">
                                                                    <option value="">--Select--</option>
                                                                    <option value="0"
                                                                        {{$disable->diff_hear === 0 ? 'Selected' : ''}}>
                                                                        Can not do at all

                                                                    </option>
                                                                    <option value="1"
                                                                        {{$disable->diff_hear === 1 ? 'Selected' : ''}}>
                                                                        Yes- a lot of difficulty
                                                                    </option>
                                                                    <option value="2"
                                                                        {{$disable->diff_hear === 2 ? 'Selected' : ''}}>
                                                                        Yes- Some difficulty
                                                                    </option>


                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label>Difficulty to Concentrate or remember </label>
                                                                <select class="form-control form-control-sm"
                                                                    id="diff_remember" name="diff_remember">
                                                                    <option value="">--Select--</option>
                                                                    <option value="0"
                                                                        {{$disable->diff_remember === 0 ? 'Selected' : ''}}>
                                                                        Can not do at all

                                                                    </option>
                                                                    <option value="1"
                                                                        {{$disable->diff_remember === 1 ? 'Selected' : ''}}>
                                                                        Yes- a lot of difficulty
                                                                    </option>
                                                                    <option value="2"
                                                                        {{$disable->diff_remember === 2 ? 'Selected' : ''}}>
                                                                        Yes- Some difficulty
                                                                    </option>

                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label>Difficulty to Sit, Stand, Walk or Climb Stairs
                                                                </label>
                                                                <select class="form-control form-control-sm"
                                                                    id="diff_sit" name="diff_sit">
                                                                    <option value="">--Select--</option>
                                                                    <option value="0"
                                                                        {{$disable->diff_sit === 0 ? 'Selected' : ''}}>
                                                                        Can not do at all

                                                                    </option>
                                                                    <option value="1"
                                                                        {{$disable->diff_sit === 1 ? 'Selected' : ''}}>
                                                                        Yes- a lot of difficulty
                                                                    </option>
                                                                    <option value="2"
                                                                        {{$disable->diff_sit === 2 ? 'Selected' : ''}}>
                                                                        Yes- Some difficulty
                                                                    </option>


                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label>Difficulty to Communicate </label>
                                                                <select class="form-control form-control-sm"
                                                                    id="diff_communi" name="diff_communi">
                                                                    <option value="">--Select--</option>
                                                                    <option value="0"
                                                                        {{$disable->diff_communi === 0 ? 'Selected' : ''}}>
                                                                        Can not do at all

                                                                    </option>
                                                                    <option value="1"
                                                                        {{$disable->diff_communi === 1 ? 'Selected' : ''}}>
                                                                        Yes- a lot of difficulty
                                                                    </option>
                                                                    <option value="2"
                                                                        {{$disable->diff_communi === 2 ? 'Selected' : ''}}>
                                                                        Yes- Some difficulty
                                                                    </option>

                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label>Difficulty of Taking Care (example: shower,
                                                                    wearing clothes) </label>
                                                                <select class="form-control form-control-sm"
                                                                    id="diff_care" name="diff_care">
                                                                    <option value="">--Select--</option>
                                                                    <option value="0"
                                                                        {{$disable->diff_care === 0 ? 'Selected' : ''}}>
                                                                        Can not do at all

                                                                    </option>
                                                                    <option value="1"
                                                                        {{$disable->diff_care === 1 ? 'Selected' : ''}}>
                                                                        Yes- a lot of difficulty
                                                                    </option>
                                                                    <option value="2"
                                                                        {{$disable->diff_care === 2 ? 'Selected' : ''}}>
                                                                        Yes- Some difficulty
                                                                    </option>

                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label>Disability ID</label>
                                                                <input type="text" class="form-control"
                                                                    name="disability_id" id="disability_id"
                                                                    placeholder="Enter disability id">
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6 form-group">
                                                            <label for="lookForView">Show on Resume </label>



                                                            <div class="btn-form-control">
                                                                <fieldset>

                                                                    <label aria-label="entry level"
                                                                        class="radio-inline">

                                                                        <input type="radio" name="show_disability"
                                                                            id="show_disability" value="1"
                                                                            checked="checked"
                                                                            {{ ($disable->show_disability=="0")? "checked" : "" }}>
                                                                        Yes
                                                                    </label>
                                                                    <label aria-label="mid level" class="radio-inline">
                                                                        <input type="radio" name="show_disability"
                                                                            id="show_disability1" value="0"
                                                                            {{ ($disable->show_disability=="0")? "checked" : "" }}>No
                                                                    </label>


                                                                </fieldset>
                                                            </div>
                                                        </div>


                                                    </div>

                                                    <button type="submit" class="btn btn-success mr-2">Save</button>
                                                     <a href="/dashboard" class="btn btn-light">Cancel</a>

                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>


                                <!-- <ul>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#menu1">Career &amp; Application Information</a>
                                            </li>
                                        </ul> -->

                            </div>



                            <div id="menu1" class="container tab-pane fade"><br>
                                <!-- <h3>Menu 1</h3> -->
                                <div class="accordion md-accordion" id="education_section" role="tablist"
                                    aria-multiselectable="true">

                                    <form role="form" class="forms-sample"
                                        action="{{route('education.update',[$education->user_id])}}" method="POST"
                                        enctype="multipart/form-data">

                                        @csrf
                                        <div class="card">
                                            <!-- Card header -->
                                            <div class="card-header" role="tab" id="headingOne1">
                                                <a data-toggle="collapse" data-parent="#education_section"
                                                    href="#collapseOne1" aria-expanded="false"
                                                    aria-controls="collapseOne1">
                                                    <h5 class="mb-0">
                                                        Education <i class="fa fa-angle-down rotate-icon"></i>
                                                    </h5>
                                                </a>
                                            </div>
                                            <!-- Card body -->
                                            <div id="collapseOne1" class="collapse show" role="tabpanel"
                                                aria-labelledby="headingOne1" data-parent="#education_section">
                                                <div class="card-body">
                                                    <div id="education_section_content">
                                                        <h3>Education 1</h3><br>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="level_of_education">Level Of
                                                                        Education</label>

                                                                    <select class="form-control form-control-sm"
                                                                        name="parent_id">
                                                                        <option value="">--Select Education lavel--
                                                                        </option>
                                                                        @foreach($parent_id as $par)
                                                                        <option value="{{$par->id}}"
                                                                            {{ $par->id == $education->parent_id ? 'selected' : '' }}>
                                                                            {{$par->name}}</option>
                                                                        @endforeach

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="exm_degree">Exam / Degree Title</label>

                                                                    <select class="form-control form-control-sm"
                                                                        id="exm_degree" name="exm_degree">
                                                                        <option value="">--Select Degree --</option>
                                                                        @foreach($child_id as $chil)
                                                                        <option value="{{$chil->id}}"
                                                                            {{ $chil->id == $education->child_id ? 'selected' : '' }}>
                                                                            {{$chil->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="board">Board</label>

                                                                    <select class="form-control form-control-sm"
                                                                        id="board" name="board">
                                                                        <option value="">--Select Board --</option>

                                                                        <option value="0"
                                                                            {{$education->board === 0 ? 'Selected' : ''}}>
                                                                            Barishal</option>
                                                                        <option value="1"
                                                                            {{$education->board === 1 ? 'Selected' : ''}}>
                                                                            Chattogram</option>
                                                                        <option value="2"
                                                                            {{$education->board === 2 ? 'Selected' : ''}}>
                                                                            Cumilla</option>
                                                                        <option value="3"
                                                                            {{$education->board === 3 ? 'Selected' : ''}}>
                                                                            Dhaka</option>
                                                                        <option value="4"
                                                                            {{$education->board === 4 ? 'Selected' : ''}}>
                                                                            Dinajpur</option>
                                                                        <option value="5"
                                                                            {{$education->board === 5 ? 'Selected' : ''}}>
                                                                            Jashore</option>
                                                                        <option value="6"
                                                                            {{$education->board === 6 ? 'Selected' : ''}}>
                                                                            Mymensingh</option>
                                                                        <option value="7"
                                                                            {{$education->board === 7 ? 'Selected' : ''}}>
                                                                            Rajsahi</option>
                                                                        <option value="8"
                                                                            {{$education->board === 8 ? 'Selected' : ''}}>
                                                                            Sylhet</option>
                                                                        <option value="9"
                                                                            {{$education->board === 9 ? 'Selected' : ''}}>
                                                                            Madrasha</option>
                                                                        <option value="10"
                                                                            {{$education->board === 10 ? 'Selected' : ''}}>
                                                                            Technical</option>
                                                                    </select>
                                                                </div>
                                                            </div>


                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="exm_degree">Concentration/ Major/Group
                                                                    </label>
                                                                    <input name="major" type="text"
                                                                        class="form-control form-control-sm"
                                                                        value="{{$education->major}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="institution">Institution</label>
                                                                    <input name="institution" type="text"
                                                                        value="{{$education->institution}}"
                                                                        class="form-control form-control-sm">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="result">Result </label>
                                                                    <select class="form-control form-control-sm"
                                                                        id="result" name="result">
                                                                        <option value="">--Select Result --</option>
                                                                        <option value="0"
                                                                            {{$education->result === 0 ? 'Selected' : ''}}>
                                                                            First Division/ Class</option>
                                                                        <option value="1"
                                                                            {{$education->result === 1 ? 'Selected' : ''}}>
                                                                            Second Division/ Class</option>
                                                                        <option value="2"
                                                                            {{$education->result === 2 ? 'Selected' : ''}}>
                                                                            Third Division/ Class</option>
                                                                        <option value="3"
                                                                            {{$education->result === 3 ? 'Selected' : ''}}>
                                                                            Grade</option>
                                                                        <option value="4"
                                                                            {{$education->result === 4 ? 'Selected' : ''}}>
                                                                            Appeared</option>
                                                                        <option value="5"
                                                                            {{$education->result === 5 ? 'Selected' : ''}}>
                                                                            Enrolled</option>
                                                                        <option value="6"
                                                                            {{$education->result === 6 ? 'Selected' : ''}}>
                                                                            Awarded</option>
                                                                        <option value="7"
                                                                            {{$education->result === 7 ? 'Selected' : ''}}>
                                                                            Do not mention</option>
                                                                        <option value="8"
                                                                            {{$education->result === 8 ? 'Selected' : ''}}>
                                                                            Pass</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="cgpa">CGPA / Scale </label>
                                                                    <input name="cgpa" type="text"
                                                                        value="{{$education->cgpa}}"
                                                                        class="form-control form-control-sm">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="pass_year">Pass Year </label>
                                                                    <input name="pass_year" type="text"
                                                                        value="{{$education->pass_year}}"
                                                                        class="form-control form-control-sm date-own">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="duration">Duration </label>
                                                                    <input name="duration" id="duration" type="text"
                                                                        value="{{$education->duration}}"
                                                                        class="form-control form-control-sm">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="achievement"> Achievement </label>
                                                                    <input name="achievement" id="achievement"
                                                                        type="text" value="{{$education->achievement}}"
                                                                        class="form-control form-control-sm">
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                    <div id="educationCard" class="dis-none">

                                                    </div>
                                                    <button type="submit" class="btn btn-success mr-2">Update</button>
                                                     <a href="/dashboard" class="btn btn-light">Cancel</a>
                                                    <div class="d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-success mr-2">Add
                                                            More</button>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </form>

                                </div>

                                <!--Accordion wrapper-->
                                <div class="accordion md-accordion" id="accordionEx" role="tablist"
                                    aria-multiselectable="true">

                                    <form role="form" class="forms-sample"
                                        action="{{route('cantraining.update',[$training->user_id])}}" method="POST"
                                        enctype="multipart/form-data">

                                        @csrf
                                        <div class="card">

                                            <!-- Card header -->
                                            <div class="card-header" role="tab" id="headingTwo2">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx"
                                                    href="#collapseTwo2" aria-expanded="false"
                                                    aria-controls="collapseTwo2">
                                                    <h5 class="mb-0">
                                                        Training Summery<i class="fa fa-angle-down"></i>
                                                    </h5>
                                                </a>
                                            </div>

                                            <!-- Card body -->
                                            <div id="collapseTwo2" class="collapse" role="tabpanel"
                                                aria-labelledby="headingTwo2" data-parent="#accordionEx">
                                                <div class="card-body">
                                                    <div id="training_section_content">
                                                        <h3>Training 1</h3>
                                                        <div class="row">


                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="train_title">Training Title </label>
                                                                    <input name="train_title" type="text"
                                                                        class="form-control form-control-sm"
                                                                        value="{{$training->train_title}}">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="topic_coverd"> Topic Covered </label>
                                                                    <input name="topic_coverd" type="text"
                                                                        class="form-control form-control-sm"
                                                                        value="{{$training->topic_coverd}}">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="train_institution">Training
                                                                        Institution</label>
                                                                    <input name="train_institution" type="text"
                                                                        class="form-control form-control-sm"
                                                                        value="{{$training->train_institution}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="train_location"> Location
                                                                    </label>
                                                                    <input name="train_location" type="text"
                                                                        class="form-control form-control-sm"
                                                                        value="{{$training->train_location}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="training_duration"> Duration </label>
                                                                    <input name="training_duration" type="text"
                                                                        class="form-control form-control-sm"
                                                                        value="{{$training->training_duration}}">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="train_country"> Country </label>
                                                                    <input name="train_country" id="train_country"
                                                                        type="text" class="form-control form-control-sm"
                                                                        value="{{$training->train_country}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="train_period"> Training Period
                                                                    </label>
                                                                    <input name="train_period" id="train_period"
                                                                        type="text" class="form-control form-control-sm"
                                                                        value="{{$training->train_period}}">
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>

                                                    <div id="trainingCard" class="dis-none">

                                                    </div>

                                                    <button type="submit" class="btn btn-success mr-2">Update</button>
                                                     <a href="/dashboard" class="btn btn-light">Cancel</a>
                                                    <div class="d-flex justify-content-end">


                                                        <button type="button"
                                                            class=" btn btn-success mr-2 training_add_btn"
                                                            data-trigger="focus">Add More
                                                            Training</button>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </form>

                                    <form role="form" class="forms-sample"
                                        action="{{route('procerificate.update',[$certificate->user_id])}}" method="POST"
                                        enctype="multipart/form-data">

                                        @csrf
                                        <div class="card">

                                            <!-- Card header -->
                                            <div class="card-header" role="tab" id="headingThree3">
                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx"
                                                    href="#collapseThree3" aria-expanded="false"
                                                    aria-controls="collapseThree3">
                                                    <h5 class="mb-0">
                                                        Professional certification Summery <i
                                                            class="fa fa-angle-down rotate-icon"></i>
                                                    </h5>
                                                </a>
                                            </div>

                                            <!-- Card body -->
                                            <div id="collapseThree3" class="collapse" role="tabpanel"
                                                aria-labelledby="headingThree3" data-parent="#accordionEx">
                                                <div class="card-body">
                                                    <div id="professional_certification_content">
                                                        <h3>Professional qualification 1</h3><br>
                                                        <div class="row">

                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="certificate_title">Name of
                                                                        Certificate
                                                                    </label>
                                                                    <input name="certificate_title"
                                                                        id="certificate_title" type="text"
                                                                        class="form-control form-control-sm"
                                                                        value="{{$certificate->certificate_title}}">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="certificate_institution">
                                                                        Institution
                                                                    </label>
                                                                    <input name="certificate_institution" type="text"
                                                                        id="certificate_institution"
                                                                        class="form-control form-control-sm"
                                                                        value="{{$certificate->certificate_institution}}">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="certificate_location">
                                                                        Location
                                                                    </label>
                                                                    <input name="certificate_location"
                                                                        id="certificate_location" type="text"
                                                                        class="form-control form-control-sm"
                                                                        value="{{$certificate->certificate_location}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="start_date">Duration</label>
                                                                            <div id=""
                                                                                class="input-group date datepicker datepicker-popup">
                                                                                <input type="text" class="form-control"
                                                                                    id="start_date" name="start_date"
                                                                                    placeholder="start date"
                                                                                    value="{{$certificate->start_date}}">
                                                                                <span
                                                                                    class="input-group-addon input-group-append border-left">
                                                                                    <span
                                                                                        class="mdi mdi-calendar input-group-text"></span>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="end_date"></label>
                                                                            <div id=""
                                                                                class="input-group date datepicker datepicker-popup">
                                                                                <input type="text" class="form-control"
                                                                                    id="end_date" name="end_date"
                                                                                    placeholder="end date"
                                                                                    value="{{$certificate->end_date}}">
                                                                                <span
                                                                                    class="input-group-addon input-group-append border-left">
                                                                                    <span
                                                                                        class="mdi mdi-calendar input-group-text"></span>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                            </div>

                                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="certificate_period"> Period
                                                                    </label>
                                                                    <input name="certificate_period"
                                                                        id="certificate_period" type="text"
                                                                        class="form-control form-control-sm"
                                                                        value="{{$certificate->certificate_period}}">
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                    <div id="professional_certificate_Card" class="dis-none">

                                                    </div>
                                                    <button type="submit" class="btn btn-success mr-2">Update</button>
                                                     <a href="/dashboard" class="btn btn-light">Cancel</a>
                                                    <div class="d-flex justify-content-end">
                                                        <button type="button"
                                                            class="professional_certificate_add_btn btn btn-success mr-2"
                                                            data-trigger="focus">Add More certificate</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </form>



                                </div>


                            </div>

                            <div id="menu2" class="container tab-pane fade"><br>
                                <form role="form" class="forms-sample"
                                    action="{{route('canemployment.update',[$employ->user_id])}}" method="POST"
                                    enctype="multipart/form-data">

                                    @csrf
                                    <div class="card">


                                        <div class="card-header" role="tab" id="headingThree4">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx"
                                                href="#collapseThree4" aria-expanded="false"
                                                aria-controls="collapseThree4">
                                                <h5 class="mb-0">
                                                    Employment History<i class="fa fa-angle-down rotate-icon"></i>
                                                </h5>
                                            </a>
                                        </div>


                                        <div id="collapseThree4" class="collapse" role="tabpanel"
                                            aria-labelledby="headingThree4" data-parent="#accordionEx">
                                            <div class="card-body">
                                                <div id="employment_content">
                                                    <h3>Employment Experience 1</h3>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="company_name">Company Name
                                                                </label>
                                                                <input name="company_name" id="company_name" type="text"
                                                                    class="form-control form-control-sm"
                                                                    valu="{{$employ->comapny_name}}">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="company_business"> Company
                                                                    Business </label>
                                                                <input name="company_business" type="text"
                                                                    id="company_business"
                                                                    class="form-control form-control-sm"
                                                                    value="{{$employ->company_business}}">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="designation"> Designation
                                                                </label>
                                                                <input name="designation" id="designation" type="text"
                                                                    class="form-control form-control-sm"
                                                                    value="{{$employ->designation}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="department"> Depertment
                                                                </label>
                                                                <input name="department" id="department" type="text"
                                                                    class="form-control form-control-sm"
                                                                    value="{{$employ->department}}">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="area_experience"> Area Experience
                                                                    <span>max(3)</span>
                                                                </label>
                                                                <input name="area_experience" id="area_experience"
                                                                    type="text" class="form-control form-control-sm"
                                                                    value="{{$employ->area_experience}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="area_responsibility">Area
                                                                    Responsibilities</label>
                                                                <textarea class="form-control"
                                                                    name="area_responsibility" id="area_responsibility"
                                                                    rows="4"
                                                                    cols="50">{{$employ->area_responsibility}}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="company_location"> Company
                                                                    Location </label>
                                                                <input name="company_location" id="company_location"
                                                                    type="text" class="form-control form-control-sm"
                                                                    value="{{$employ->company_location}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12">

                                                            <div class="form-group">
                                                                <label for="employment_period"> Employment Period
                                                                </label>
                                                                <div class="row">
                                                                    <div class="col-md-6 col-sm-12">
                                                                        <div id="datepicker-popup"
                                                                            class="input-group date datepicker datepicker-popup">
                                                                            <input type="text" class="form-control"
                                                                                id="today_date"
                                                                                name="employment_period_start"
                                                                                value="{{$employ->employment_period_start}}"
                                                                                placeholder="dd/mm/yyyy">
                                                                            <span
                                                                                class="input-group-addon input-group-append border-left">
                                                                                <span
                                                                                    class="fa fa-calendar input-group-text"></span>
                                                                            </span>
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-md-6 col-sm-12">

                                                                        <div id="datepicker-popup"
                                                                            class="input-group date datepicker datepicker-popup">
                                                                            <input type="text" class="form-control"
                                                                                id="today_date"
                                                                                name="employment_period_end"
                                                                                value="{{$employ->employment_period_end}}"
                                                                                placeholder="From(dd/mm/yyyy)">
                                                                            <span
                                                                                class="input-group-addon input-group-append border-left">
                                                                                <span
                                                                                    class="fa fa-calendar input-group-text"></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>


                                                    </div>
                                                </div>
                                                <div id="employment_Card" class="dis-none">

                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <button type="button" class="employment_add_btn"
                                                        data-trigger="focus">Add More
                                                        Experience</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </form>


                                <!-- End Employment section-->

                            </div>
                            <!-- Accordion wrapper -->



                        </div>
                        <!-- end education section -->


                        <div id="menu3" class="container tab-pane fade"><br>

                            <!--Accordion wrapper-->
                            <div class="accordion md-accordion" id="accordionExmple" role="tablist"
                                aria-multiselectable="fase">

                                <form role="form" class="forms-sample" action="{{route('skill.update',[$skill->user_id])}}"
                                    method="POST" enctype="multipart/form-data">

                                    @csrf
                                    <div class="card">

                                        <!-- Card header -->
                                        <div class="card-header" role="tab" id="headingFive5">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionExmple"
                                                href="#collapseFive5" aria-expanded="false"
                                                aria-controls="collapseFive5">
                                                <h5 class="mb-0">
                                                    Specialization <i class="fa fa-angle-down rotate-icon"></i>
                                                </h5>
                                            </a>
                                        </div>

                                        <!-- Card body -->
                                        <div id="collapseFive5" class="collapse" role="tabpanel"
                                            aria-labelledby="headingFive5" data-parent="#accordionExmple">


                                            <div class="card-body">
                                                <h3>Skills-1</h3>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="career_objective">Skill</label>
                                                            <input type="text" class="form-control" name="skill"
                                                                placeholder="Enter Skill" value="{{$skill->skill}}">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <label>How did you learn the skill?</label>
                                                            <input type="text" class="form-control" name="how_learn"
                                                                placeholder="Present Salary BDT"
                                                                value="{{$skill->how_learn}}">
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label>Expected Salary</label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Expected Salary BDT">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="job_level">Job Level</label>
                                                                <select class="form-control form-control-sm"
                                                                    id="job_level" name="job_level">
                                                                    <option value="">--Select Job Level</option>
                                                                    <option value="0">Entry</option>
                                                                    <option value="1">Mid</option>
                                                                    <option value="2">Top</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="job_level">Job Nature</label>
                                                                <select class="form-control form-control-sm"
                                                                    id="job_level" name="job_level">
                                                                    <option value="">--Select Job Nature --</option>
                                                                    <option value="">Full Time</option>
                                                                    <option value="">Part Time</option>
                                                                    <option value=""> Contractual</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            <div class="form-group">
                                                                <label for="">Preferred Area</label>
                                                                <select class="js-example-basic-multiple"
                                                                    multiple="multiple" name="" id=""
                                                                    style="width:100%">
                                                                    <option value="">Select Area</option>
                                                                    <option value="">Dhaka</option>
                                                                    <option value="">Gazipur</option>
                                                                    <option value="">Rajshahi</option>
                                                                    <option value="">Rangpur</option>
                                                                    <option value="">Shylhet</option>
                                                                    <option value="">Commella</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="form-group">
                                                                <label>Preferred Organization (Maximum 10)</label>
                                                                <select class="js-example-basic-multiple"
                                                                    multiple="multiple" name="" id=""
                                                                    style="width:100%">
                                                                    <option value="">Select Organization</option>
                                                                    <option value="">Banks</option>
                                                                    <option value="">Insurance</option>
                                                                    <option value="">Telecommunication</option>
                                                                    <option value="">Garments</option>
                                                                    <option value="">Buying House</option>
                                                                    <option value="">Audit Film</option>
                                                                    <option value="">Tax Consultancy Firm</option>
                                                                    <option value="">Hospital/Diagnostic Center</option>
                                                                    <option value="">Agro Firm</option>
                                                                    <option value="">School/Collage/University</option>
                                                                    <option value="">Goverment Job</option>
                                                                    <option value="">DSE / CSE</option>
                                                                    <option value="">Brokerage House</option>
                                                                    <option value="">Vat Consultancy Firm</option>
                                                                    <option value="">Multinational Company's</option>
                                                                </select>
                                                            </div>
                                                        </div> -->




                                                </div>

                                                <button type="submit" class="btn btn-success mr-2">Update</button>
                                                 <a href="/dashboard" class="btn btn-light">Cancel</a>
                                                <div class="d-flex justify-content-end">


                                                    <button type="button" class=" btn btn-success mr-2 training_add_btn"
                                                        data-trigger="focus">Add More Skill</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                <form role="form" class="forms-sample"
                                    action="{{route('language.update',[$language->user_id])}}" method="POST"
                                    enctype="multipart/form-data">

                                    @csrf
                                    <div class="card">

                                        <!-- Card header -->
                                        <div class="card-header" role="tab" id="headingSix6">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionExmple"
                                                href="#collapseSix6" aria-expanded="false" aria-controls="collapseSix6">
                                                <h5 class="mb-0">
                                                    Language Proficiency<i class="fas fa-angle-down rotate-icon"></i>
                                                </h5>
                                            </a>
                                        </div>

                                        <!-- Card body -->
                                        <div id="collapseSix6" class="collapse" role="tabpanel"
                                            aria-labelledby="headingSix6" data-parent="#accordionExmple">
                                            <div class="card-body">
                                                <h3>Language-1</h3>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="language_name">Language</label>
                                                            <input type="text" class="form-control" name="language_name"
                                                                id="language_name" value="{{$lang->language_name}}"
                                                                placeholder="Enter language">
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="reading">Reading</label>
                                                            <select class="form-control form-control-sm" id="reading"
                                                                name="reading">
                                                                <option value="">--Select--</option>

                                                                <option value="0"
                                                                    {{$lang->reading === 0 ? 'Selected' : ''}}>High

                                                                </option>
                                                                <option value="1"
                                                                    {{$lang->reading === 1 ? 'Selected' : ''}}>
                                                                    Medium
                                                                </option>
                                                                <option value="2"
                                                                    {{$lang->reading === 2 ? 'Selected' : ''}}>
                                                                    Low
                                                                </option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="writing">Writing</label>
                                                            <select class="form-control form-control-sm" id="writing"
                                                                name="writing">
                                                                <option value="">--Select--</option>
                                                                <option value="0"
                                                                    {{$lang->writing === 0 ? 'Selected' : ''}}>High

                                                                </option>
                                                                <option value="1"
                                                                    {{$lang->writing === 1 ? 'Selected' : ''}}>
                                                                    Medium
                                                                </option>
                                                                <option value="2"
                                                                    {{$lang->writing === 2 ? 'Selected' : ''}}>
                                                                    Low
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label for="speaking">Speaking</label>
                                                            <select class="form-control form-control-sm" id="speaking"
                                                                name="speaking">
                                                                <option value="">--Select--</option>
                                                                <option value="0"
                                                                    {{$lang->speaking === 0 ? 'Selected' : ''}}>High

                                                                </option>
                                                                <option value="1"
                                                                    {{$lang->speaking === 1 ? 'Selected' : ''}}>
                                                                    Medium
                                                                </option>
                                                                <option value="2"
                                                                    {{$lang->speaking === 2 ? 'Selected' : ''}}>
                                                                    Low
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>







                                                </div>

                                                <button type="submit" class="btn btn-success mr-2">Save</button>
                                                 <a href="/dashboard" class="btn btn-light">Cancel</a>
                                                <div class="d-flex justify-content-end">


                                                    <button type="button" class=" btn btn-success mr-2 training_add_btn"
                                                        data-trigger="focus">update Language</button>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </form>

                                <form role="form" class="forms-sample"
                                    action="{{route('reference.update',[$reference->user_id])}}" method="POST"
                                    enctype="multipart/form-data">

                                    @csrf
                                <div class="card">

                                    <!-- Card header -->
                                    <div class="card-header" role="tab" id="headingSeven7">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionExmple"
                                            href="#collapse" aria-expanded="false" aria-controls="collapse">
                                            <h5 class="mb-0">
                                                Reference <i class="fas fa-angle-down rotate-icon"></i>
                                            </h5>
                                        </a>
                                    </div>

                                    <!-- Card body -->
                                    <div id="collapse" class="collapse" role="tabpanel" aria-labelledby="headingSeven7"
                                        data-parent="#accordionExmple">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="career_objective">Name</label>
                                                        <input type="text" class="form-control" name="ref_name" value="{{$reference->ref_name}}" placeholder="Enter name">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Designation</label>
                                                        <input type="text" class="form-control" name="ref_designation" value="{{$reference->ref_designation}}"
                                                            placeholder="enter designation">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Organisation</label>
                                                        <input type="text" class="form-control" name="ref_org" value="{{$reference->ref_org}}"
                                                            placeholder="enter organizarion">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control" name="ref_email" value="{{$reference->ref_email}}"
                                                            placeholder="enter email">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="ref_relation">Relation</label>
                                                        <select class="form-control form-control-sm" id="ref_relation"
                                                            name="ref_relation">
                                                            <option value="">--Select--</option>
                                                          
                                                            <option value="0" {{$reference->ref_relation === 0 ? 'Selected' : ''}}>Relative</option>
                                                            <option value="1" {{$reference->ref_relation === 1 ? 'Selected' : ''}}>Family Friend</option>
                                                            <option value="2" {{$reference->ref_relation === 2 ? 'Selected' : ''}}>Academic</option>
                                                            <option value="3" {{$reference->ref_relation === 3 ? 'Selected' : ''}}>Professional</option>
                                                            <option value="4" {{$reference->ref_relation === 4 ? 'Selected' : ''}}>Others</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Mobile</label>
                                                        <input type="number" min="1" class="form-control" name="ref_mobile" value="{{$reference->ref_mobile}}"
                                                            placeholder="Enter mobile number">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Phone(Off)</label>
                                                        <input type="number" min="1" class="form-control" name="ref_phone_off" value="{{$reference->ref_phone_off}}"
                                                            placeholder="Enter mobile number">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Phone(Res)</label>
                                                        <input type="number" min="1" class="form-control" name="ref_phone_res" value="{{$reference->ref_phone_res}}"
                                                            placeholder="Enter mobile number">
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label>Address</label>
                                                        <textarea class="form-control" name="career_objective" rows="4"
                                                            cols="50" id="ref_address" name="ref_address"
                                                            placeholder="enter address">{{$reference->ref_address}}</textarea>

                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <button type="submit" class="btn btn-success mr-2">Save</button>
                                             <a href="/dashboard" class="btn btn-light">Cancel</a>
                                            <div class="d-flex justify-content-end">


                                                <button type="button" class=" btn btn-success mr-2 training_add_btn"
                                                    data-trigger="focus">Add Reference</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                               </form>
                            </div>

                        </div>



                        <div id="menu4" class="container tab-pane fade"><br>

                            <!--Accordion wrapper-->
                            <div class="accordion md-accordion" id="accordionExmple" role="tablist"
                                aria-multiselectable="fase">


                                <div class="form-group">
                                    <label for="feature_img"> Image</label>
                                    <input type="file" name="feature_img" class="dropify" data-height="70">
                                </div>

                                <button type="submit" class="btn btn-success mr-2">Change Photo</button>
                                <button class="btn btn-danger">Delete</button>
                                <div class="d-flex justify-content-end">


                                </div>

                            </div>

                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>



</div>
</div>




@endsection
