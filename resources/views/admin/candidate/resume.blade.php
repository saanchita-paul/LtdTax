
@extends('admin')
@push('css')
<style>
    .content-wrapper{
        padding:0;
    }
    ul.BDJNormalText03.text-capitalize {
  padding: 0;
  margin-left: 31px;
  }
  ul.text-capitalize li {
      font-size: 12px;
      color: #222;
      margin-bottom:5px;
      font-weight: 400;
  }
  /* resume-input-page-style-start */
  .application-info-table{
    border: none;
  }
  .application-info-table td {
    border: none;
      font-size: 12px;
      text-align: left;
      line-height: 30px;
  }
  .application-inf{
      margin-top: 30px;
  }
  .application-inf table {
      border: none !important;
      
    }

  .common-title h5{
      background: #fff;
      font-size: 16px;
    padding: 5px 0px;
    text-decoration-line: underline;
  }
  .training-summery {
    margin-top: 30px;
  }
  .training-summery table td {
    font-size: 12px;
    text-align: center;
  }
  .academic-qual {
    margin-top: 30px;
  }
  .academic-qual table td {
    font-size: 12px;
      text-align: center;
      padding: 10px;
  }
  .academic-qual h5 {
    background: #fff;
    padding: 5px 0px;
    text-decoration-line: underline;
  }
  .cand-res {
    margin-top: 10px;
    text-decoration: underline;
      font-weight: 600;
  }
  .cand-ex-text {
    margin-top: 10px;
  }
  .company-nm {
    margin-top: 10px;
    font-size: 12px;
    text-decoration: underline;
      font-weight: 600;

  }
  .address-cand ul li {
    list-style: none;
    font-size: 12px;
    line-height: 23px;
    word-spacing: 5px;
  }
  .skill ul li {
    font-size: 12px;
    line-height: 23px;
    word-spacing: 5px;
  }
  .resume-em-history ul p {
    margin-left: 10px;
  }
  .resume-em-history ul li {
    /* list-style: number; */
    font-size: 14px;
  }
  .resume-em-history {
    margin-top: 30px;
  }
  .resume-em-history p {
    font-size: 12px;
    line-height: 20px;
    word-spacing: 2px;
  }
  .resume-career-objects {
    margin-top: 30px;
  }
  .resume-career-objects p {
    font-size: 12px;
    line-height: 20px;
    word-spacing: 2px;
  }
  .resume-photo {
    float: right;
  }
  .resume-p {
    width: 150px;
  }
  .address-cand ul li {
    list-style: none;
    font-size: 12px;
  }
  .address-cand ul {
    padding-left: 15px;
  }

  .resume-view-wrapper {
    margin-top: 10px;
  }
  .resume-view-title h6 {
    color: #fff;
  }
  .resume-view-title {
    background: #005900;
  }
  .right
  {
      float: left;
      height: auto;
      width: 100%;
      box-shadow: 0px 0px 7px grey;
      background-color: white;
      padding: 20px;
      margin-bottom: 50px;
      margin-bottom: 50px;
  }
  #heading
  {
      font-weight:bold;
  }
  .training-table th, td {
    border: 1px solid #00000040;
    font-size: 12px;
    text-align: center;
    padding: 10px 15px;
  }

  .table thead th {
    font-size: 14px;
      border:1px solid #a1a5a9;
  }

  .table td, .table th{
      border:1px solid #a1a5a9;
  }
  .zero-mar{
      margin-left: 0;
      margin-right: 0;
  }
  /* resume  end*/
</style>
@endpush
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-11 mx-auto">
            <div class="resume-view-wrapper">
                <div class="row zero-mar">
                    <div class="col-lg-12 resume-view-title">
                        <div class="">
                            <div class="float-left mt-2 mb-2">
                                <span class="btn btn-sm text-white"><i class="fa fa-file-text-o" aria-hidden="true"></i> View Resume</span>
                            </div>
                            <div class="float-right mt-2 mb-2">
                                <button onclick="printDiv('printableArea')" class="btn btn-sm btn-success float-right ml-2"><i class="fa fa-print"></i> Print</button>
                                <button id="buttonID" class="btn btn-success btn-sm float-right ml-2"><i class="fa fa-file-pdf-o"></i> PDF Download</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="printableArea">
                    <div class="col-lg-12">
                        <div class="right">
                            @if(!empty($user_data))
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="address-cand">
                                        <h5 class="text-capitalize">{{$user_data->name}} {{$user_data->lname}}</h5>
                                        <p>
                                            <ul>
                                            @if(!empty($user_data->present_address_1) || !empty($user_data->present_address_2) || !empty($user_data->present_district_id) || !empty($user_data->present_thana_id) || !empty($user_data->present_post_code) )
                                            <li>Address:
                                                    @if(!empty($user_data->present_address_1)) {{$user_data->present_address_1}},@endif
                                                    @if(!empty($user_data->present_address_2)) {{$user_data->present_address_2}},<br>
                                                    @endif

                                                    @if(!empty($user_data->present_district_id))
                                                        @foreach($districts as
                                                        $district)@if($district->id==$user_data->present_district_id){{$district->name}}@endif
                                                        @endforeach,
                                                    @endif

                                                    @if(!empty($user_data->present_thana_id))
                                                        @foreach($thana as
                                                        $tha)@if($tha->id==$user_data->present_thana_id){{$tha->name}} @endif
                                                        @endforeach,
                                                    @endif
                                                    @if(!empty($user_data->present_post_code))
                                                    {{$user_data->present_post_code}}.
                                                    @endif
                                                </li>
                                                @endif
                                                @if(!empty($user_data->phone))
                                                <li>
                                                    Mobile 1: <span>{{$user_data->phone}}</span>
                                                </li>
                                                @endif
                                                @if(!empty($user_data->mobile2))
                                                <li>Mobile 2: <span>{{$user_data->mobile2}}</span></li>
                                                @endif
                                                @if(!empty($user_data->mobile3))
                                                <li>Mobile 3: <span>{{$user_data->mobile3}}</span></li>
                                                @endif
                                                @if(!empty($user_data->email))
                                                <li>Email: <span>{{$user_data->email}}</span></li>
                                                @endif
                                            
                                            </ul>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="resume-photo">
                                        @if(!empty($user_data->photo))
                                        <img class="resume-p img-fluid" src="{{asset('uploads/users/'.$user_data->photo)}}"
                                            alt="taxman profile photo">
                                        @else
                                        <img class="resume-p img-fluid"
                                            src="{{asset('web/media/imgAll/dummy-profile-pic-male.jpg')}}"
                                            alt="taxman profile photo">
                                        @endif

                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="mb-4"></div>
                            @endif
                        
                            @if(!empty($user_career))
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="resume-career-objects common-title">
                                        <h5>Career Objective:</h5>
                                        <p>{{$user_career->career_obj}}</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if(!empty($candidate_other_info->career_sum))
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="resume-career-objects common-title">
                                        <h5>Career Summary:</h5>
                                        <p>{{$candidate_other_info->career_sum}}</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if(!empty($candidate_other_info->spec_qualification))
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="resume-career-objects common-title">
                                        <h5>Special Qualification:</h5>
                                        <p>{{$candidate_other_info->spec_qualification}}</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <!-- @if(!empty($candidate_other_info->keyword))
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="resume-career-objects common-title">
                                        <h5>Keyword:</h5>
                                        <p>{{$candidate_other_info->keyword}}</p>
                                    </div>
                                </div>
                            </div>
                            @endif -->
                            @if(!empty($experience))
                            @if ($experience->count() > 0)
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="resume-em-history common-title">
                                        <h5>Employment History:</h5>
                                        @foreach ($experience as $exper)
                                        <p>Total Year of Experience : <span>{{$exper->area_experience}} Year(s)</span></p>
                                        <ul>
                                            <li>
                                                <p class="cand-ex-text">{{$exper->designation}} ( {{$exper->employment_period_start}} - {{$exper->employment_period_end}}) </p>
                                                <p class="company-nm">Company Name : <span>{{$exper->company_name}}</span></p>
                                                <p class="company-addr">Company Business : <span>{{$exper->company_business}}</span></p>
                                                <p class="company-addr">Company Location : <span>{{$exper->company_location}}</span></p>
                                                <p class="company-department">Department :<span> {{$exper->department}}
                                                    </span></p>
                                                <p class="cand-res">Duties / Responsibilities :</p>
                                                <p>{{$exper->area_responsibility}}.</p>
                                            </li>
                                        </ul>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="mb-4"></div>
                            @endif
                            @endif
                            @if(!empty($educations))
                            @if ($educations->count() > 0)
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="academic-qual common-title">
                                        <h5>Educational Qualifications</h5>
                                        <table class="table table-boardered">
                                            <tr id="heading">
                                                <td>Exam Title</td>
                                                <td>Subject / Major</td>
                                                <td>Institute</td>
                                                <td>Board</td>
                                                <td>Result</td>
                                                <td>Pas.Year</td>
                                                <td>Duration</td>
                                            </tr>
                                            @foreach($educations as $educa)
                                            <tr>
                                                <td>@foreach($education as $edu) @if($edu->id == $educa->child_id){{$edu->name}} @endif @endforeach</td>
                                                <td>{{$educa->major}}</td>
                                                <td>{{$educa->institution}}</td>
                                                <td>
                                                <?php
                                                switch ($educa->board) {
                                                    case '0':
                                                        echo 'Barisal';
                                                        break;
                                                    case '1':
                                                        echo 'Chittagong';
                                                        break;
                                                    case '2':
                                                        echo 'Comilla';
                                                        break;
                                                    case '3':
                                                        echo 'Dhaka';
                                                        break;
                                                    case '4':
                                                        echo 'Dinajpur';
                                                        break;
                                                    case '5':
                                                        echo 'Jashore';
                                                        break;
                                                    case '6':
                                                        echo 'Mymensingh';
                                                        break;
                                                    case '7':
                                                        echo 'Rajshahi';
                                                        break;
                                                    case '8':
                                                        echo 'Sylhet';
                                                        break;
                                                    case '9':
                                                        echo 'Madrasha';
                                                        break;
                                                    case '10':
                                                        echo 'Technical';
                                                        break;
                                                    case '11':
                                                        echo 'Others';
                                                        break;
                                                }
                                                ?>
                                                </td>
                                                <td>CGPA/DIVISION: {{$educa->cgpa}}
                                                    </td>
                                                <td>{{$educa->pass_year}}</td>
                                                <td>{{$educa->duration}}</td>
                                        </tr>
                                        @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="mb-4"></div>
                            @endif
                            @endif
                            @if(!empty($edu_training))
                            @if($edu_training->count()>0)
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="training-summery common-title">
                                        <h5>Training Summary:</h5>
                                        <table class="table table-boardered training-table">
                                            <tr>
                                                <th>Training Title</th>
                                                <th>Topic</th>
                                                <th>Institute</th>
                                                <th>Country</th>
                                                <th>Location</th>
                                                <th>Year</th>
                                                <th>Duration</th>
                                            </tr>
                                            @foreach($edu_training as $training)
                                            <tr>
                                                <td>{{$training->train_title}}</td>
                                                <td>{{$training->topic_coverd}}</td>
                                                <td>{{$training->train_institution}}</td>
                                                <td>{{$training->train_country}}</td>
                                                <td>{{$training->train_location}}</td>
                                                <td>{{$training->train_period}}</td>
                                                <td>{{$training->train_duration}}</td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="mb-4"></div>
                            @endif
                            @if(!empty($p_certificate) && $p_certificate->count()>0)
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="training-summery common-title">
                                        <h5>Professional Certificate:</h5>
                                        <table class="table table-boardered training-table">
                                            <tr>
                                                <th>Title</th>
                                                <th>Institution</th>
                                                <th>Location</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Period</th>
                                            </tr>
                                            @foreach($p_certificate as $certificate)
                                            <tr>
                                                <td>{{$certificate->certificate_title}}</td>
                                                <td>{{$certificate->certificate_institution}}</td>
                                                <td>{{$certificate->certificate_location}}</td>
                                                <td>{{$certificate->start_date}}</td>
                                                <td>{{$certificate->end_date}}</td>
                                                <td>{{$certificate->certificate_period}}</td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="mb-4"></div>
                            @endif
                            @endif
                            @if(!empty($language))
                            @if($language->count()>0)
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="training-summery common-title">
                                        <h5>Language Proficiency:</h5>
                                        <table class="table table-boardered training-table">
                                            <tr>
                                                <th>Language</th>
                                                <th>Reading</th>
                                                <th>Writing</th>
                                                <th>Speaking</th>
                                            </tr>
                                            @foreach($language as $lang)
                                            <tr>
                                                <td>{{$lang->language_name}}</td>
                                                <td>{{$lang->reading}}</td>
                                                <td>{{$lang->writing}}</td>
                                                <td>{{$lang->speaking}}</td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="mb-4"></div>
                            @endif
                            @endif
                            @if(!empty($user_career))
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="application-inf">
                                        <div class="common-title">
                                            <h5>Career and Application Information:</h5>
                                        </div>
                                        <table class="application-info-table">
                                            <tbody>
                                                <tr class="taxmanNormalText">
                                                    <td>Preferred Job Category</td>
                                                    <td>:</td>
                                                    <td>
                                                    @foreach ($job_categories as $category)
                                                    @if($user_career->jobcat_id == $category->id)
                                                    {{ $category->title }}
                                                    @endif
                                                    @endforeach
                                                    </td>
                                                </tr>
                                            
                                                <tr class="taxmanNormalTex">
                                                    <td>
                                                        Available For</td>
                                                    <td>:</td>
                                                    <td>
                                                    <?php
                                                    switch ($user_career->job_nature) {
                                                        case '0':
                                                            echo "Full Time";
                                                            break;
                                                        case '1':
                                                            echo "Part Time";
                                                            break;
                                                        case '2':
                                                            echo "Contractual";
                                                            break;
                                                    }
                                                    ?>
                                                    </td>
                                                </tr>

                                                <tr class="taxmanNormalTex">
                                                    <td>
                                                    Present Salary </td>
                                                    <td>:</td>
                                                    <td>
                                                        TK. {{$user_career->pre_salary}}
                                                    </td>
                                                </tr>
                                                <tr class="taxmanNormalTex">
                                                    <td>
                                                    Expected Salary </td>
                                                    <td>:</td>
                                                    <td>
                                                        TK. {{$user_career->exp_salary}}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="mb-4"></div>
                            @endif
                            @if(!empty($user_data))
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="application-inf">
                                        @if(!empty($user_data->fathers_name) || !empty($user_data->mothers_name) || !empty($user_data->dob) || !empty($user_data->gender) || !empty($user_data->marital_status) || !empty($user_data->nationality) || !empty($user_data->religion) || !empty($user_data->permanent_address_1) || !empty($user_data->permanent_address_2) || !empty($user_data->permanent_district_id) || !empty($user_data->permanent_thana_id) || !empty($user_data->permanent_post_code))
                                        <div class="common-title">
                                            <h5>Personal Details::</h5>
                                        </div>
                                        @endif
                                        <table class="application-info-table">
                                            <tbody>
                                                <tr class="taxmanNormalText">
                                                @if(!empty($user_data->fathers_name))
                                                    <td>Father's Name </td>
                                                    <td>:</td>
                                                    <td>
                                                    {{$user_data->fathers_name}}
                                                    </td>
                                                @endif
                                                </tr>
                                                <tr class="taxmanNormalTex">
                                                @if(!empty($user_data->mothers_name))
                                                    <td>
                                                        Mother's Name</td>
                                                    <td>:</td>
                                                    <td>
                                                    {{$user_data->mothers_name}}
                                                    </td>
                                                @endif
                                                </tr>
                                                <tr class="taxmanNormalTex">
                                                @if(!empty($user_data->dob))
                                                    <td>
                                                        Date of Birth</td>
                                                    <td>:</td>
                                                    <td>
                                                    {{$user_data->dob}}
                                                    </td>
                                                @endif
                                                </tr>

                                                <tr class="taxmanNormalTex">
                                                @if(!empty($user_data->gender))
                                                    <td>
                                                        Gender</td>
                                                    <td>:</td>
                                                    <td>
                                                    <?php
                                                    switch ($user_data->gender) {
                                                        case 1:
                                                            echo "Male";
                                                            break;
                                                        case 2:
                                                            echo "Female";
                                                            break;
                                                        case 3:
                                                            echo "Other";
                                                            break;
                                                    }
                                                    ?>   
                                                    </td>
                                                @endif
                                                </tr>
                                                <tr class="BDJNormalText03">
                                                @if(!empty($user_data->marital_status))
                                                    <td>
                                                        Marital Status </td>
                                                    <td>:</td>
                                                    <td>
                                                    <?php
                                                    switch ($user_data->marital_status) {
                                                        case '0':
                                                            echo "Single";
                                                            break;
                                                        case '1':
                                                            echo "Married";
                                                            break;
                                                        case '2':
                                                            echo "Divorced";
                                                            break;
                                                        case '3':
                                                            echo "Widowed";
                                                            break;
                                                    }
                                                    ?>
                                                    </td>
                                                @endif
                                                </tr>
                                                <tr class="BDJNormalText03">
                                                @if(!empty($user_data->nationality))
                                                    <td>Nationality</td>
                                                    <td>:</td>
                                                    <td>
                                                    {{$user_data->nationality}}
                                                    </td>
                                                @endif
                                                </tr>
                                                <tr class="BDJNormalText03">
                                                @if(!empty($user_data->religion))
                                                    <td>Religion</td>
                                                    <td>:</td>
                                                    <td>
                                                    <?php
                                                    switch ($user_data->religion) {
                                                        case '0':
                                                            echo "Islam";
                                                            break;
                                                        case '1':
                                                            echo "Christianity";
                                                            break;
                                                        case '2':
                                                            echo "Hinduism";
                                                            break;
                                                        case '3':
                                                            echo "Buddhists";
                                                            break;
                                                        case '4':
                                                            echo "Others";
                                                            break;
                                                    }
                                                    ?>
                                                    </td>
                                                @endif
                                                </tr>
                                                <tr class="BDJNormalText03">
                                                @if(!empty($user_data->permanent_address_1) || !empty($user_data->permanent_address_2) || !empty($user_data->permanent_district_id) || !empty($user_data->permanent_thana_id) || !empty($user_data->permanent_post_code))
                                                    <td>Permanent Address</td>
                                                    <td>:</td>
                                                    <td>
                                                @endif
                                                    @if(!empty($user_data->permanent_address_1))
                                                        <span>{{$user_data->permanent_address_1}},</span>
                                                        @endif
                                                        @if(!empty($user_data->permanent_address_2))
                                                        <span>{{$user_data->permanent_address_2}},</span>
                                                        @endif
                                                        @if(!empty($user_data->permanent_district_id))
                                                        <span>@foreach($districts as
                                                            $district)@if($district->id==$user_data->permanent_district_id){{$district->name}}@endif
                                                            @endforeach,</span>
                                                        @endif
                                                        @if(!empty($user_data->permanent_thana_id))
                                                        <span>@foreach($thana as
                                                            $tha)@if($tha->id==$user_data->permanent_thana_id){{$tha->name}}
                                                            @endif
                                                            @endforeach,</span>
                                                        @endif
                                                        @if(!empty($user_data->permanent_post_code))
                                                        <span>{{$user_data->permanent_post_code}}.</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr class="BDJNormalText03">
                                                @if(!empty($user_data->present_district_id))
                                                    <td>Current Location</td>
                                                    <td>:</td>
                                                    <td>
                                                    @foreach($districts as
                                                        $district)@if($district->id==$user_data->present_district_id){{$district->name}}@endif
                                                        @endforeach
                                                    </td>
                                                @endif
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="mb-4"></div>
                            @endif
                            @if(!empty($candidate_skill) && $candidate_skill->count()>0)
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="training-summery common-title">
                                        <h5>Skills:</h5>
                                        <ul class="BDJNormalText03 text-capitalize">
                                        @foreach($all_skills as $skl)       
                                            @foreach($candidate_skill as $sk)
                                                @if($skl->id == $sk->skill_id)
                                                <li class="common-title">{{$skl->skill_title}}</li>
                                                @endif
                                            @endforeach
                                        @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="mb-4"></div>
                            @endif
                            @if(!empty($reference))
                            @if($reference->count() > 0 )
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="training-summery common-title">
                                        <h5>Reference (s):</h5>
                                        <table class="table table-boardered">
                                            <thead>
                                                <th></th>
                                                <th>{{ isset($reference[0]) ? 'Reference: 01' : ''}}</th>
                                                @if(!empty($reference[1]))<th>{{ isset($reference[1]) ? 'Reference: 02' : ''}}</th>@endif
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-left font-weight-bold">Name</td>
                                                    <td class="text-left">{{ $reference[0]->ref_name ?? '' }}</td>
                                                    @if(!empty($reference[1]))<td class="text-left">{{ $reference[1]->ref_name ?? '' }}</td>@endif
                                                </tr>
                                                <tr>
                                                    <td class="text-left font-weight-bold">Designation </td>
                                                    <td class="text-left">{{ $reference[0]->ref_designation ?? ''}}</td>
                                                    @if(!empty($reference[1]))<td class="text-left">{{ $reference[1]->ref_designation ?? ''}}</td>@endif
                                                </tr>
                                                <tr>
                                                    <td class="text-left font-weight-bold">Organization </td>
                                                    <td class="text-left">{{ $reference[0]->ref_org ?? ''}}</td>
                                                    @if(!empty($reference[1]))<td class="text-left">{{ $reference[1]->ref_org ?? ''}}</td>@endif
                                                </tr>
                                                <tr>
                                                    <td class="text-left font-weight-bold">Address </td>
                                                    <td class="text-left">{{ $reference[0]->ref_address ?? ''}}</td>
                                                    @if(!empty($reference[1]))<td class="text-left">{{ $reference[1]->ref_address ?? ''}}</td>@endif
                                                </tr>
                                                <tr>
                                                    <td class="text-left font-weight-bold">Mobile </td>
                                                    <td class="text-left">{{ $reference[0]->ref_mobile ?? ''}}</td>
                                                    @if(!empty($reference[1]))<td class="text-left">{{ $reference[1]->ref_mobile ?? ''}}</td>@endif
                                                </tr>
                                                <tr>
                                                    <td class="text-left font-weight-bold">E-Mail </td>
                                                    <td class="text-left">{{ $reference[0]->ref_email ?? ''}}</td>
                                                    @if(!empty($reference[1]))<td class="text-left">{{ $reference[1]->ref_email ?? ''}}</td>@endif
                                                </tr>
                                                <tr>
                                                    <td class="text-left font-weight-bold">Relation </td>
                                                    <td class="text-left">{{ $reference[0]->ref_relation ?? ''}}</td>
                                                    @if(!empty($reference[1]))<td class="text-left">{{ $reference[1]->ref_relation ?? ''}}</td>@endif
                                                </tr>
                                                <tr>
                                                    <td class="text-left font-weight-bold">Phone Home </td>
                                                    <td class="text-left">{{ $reference[0]->ref_phone_res ?? ''}}</td>
                                                    @if(!empty($reference[1]))<td class="text-left">{{ $reference[1]->ref_phone_res ?? ''}}</td>@endif
                                                </tr>
                                                <tr>
                                                    <td class="text-left font-weight-bold">Phone Office </td>
                                                    <td class="text-left">{{ $reference[0]->ref_phone_off ?? ''}}</td>
                                                    @if(!empty($reference[1]))<td class="text-left">{{ $reference[1]->ref_phone_off ?? ''}}</td>@endif
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="mb-4"></div>
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<script type="text/javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
    window.onload = function () {
        document.getElementById('buttonID').addEventListener("click", () => {
            const invoice = this.document.getElementById('printableArea');
            // console.log(invoice)
            // console.log(window)
            html2pdf().from(invoice).save();
        })
    }

</script>
@endsection

