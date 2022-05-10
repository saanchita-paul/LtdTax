@extends('admin')

@section('content')
<style>
.panel-title>a,
.panel-title>a:active {
    display: block;
    padding: 15px;
    color: #555;
    font-size: 14px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 1px;
    word-spacing: 3px;
    text-decoration: none;
    background: #EEEEEE;
    border-radius: 7px;
}
input.form-control.job_cover_img {
    border: 0;
}
</style>
<div class="content-wrapper">
    @if($errors->any())
        <div class="alert alert-warning" role="alert">
            <strong>Warning! </strong> 
            @if($errors->count() == 1)
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
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-12  grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-4 font-weight-bold">Edit Job</h5>
                    <form class="forms-sample" action="{{route('job.update',[$job->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="panel panel-default">
                            <div class="panel-heading active" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#primary_job_info" href="#primary_job_info" aria-expanded="false" aria-controls="candidate_requirements" class="collapsed">
                                        <i class="fa fa-chevron-down fa-xs"></i> Primary Job Information
                                    </a>
                                </h4>
                            </div>
                            <div id="primary_job_info" class="panel-collapse in collapse show p-2" role="tabpanel" aria-labelledby="headingOne" style="">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="title">Title <span class="required-icon">*</span></label>
                                                <input type="text" required="" class="form-control" id="title" name="title" value="{{$job->title ?? old('title')}}" maxlength="100" placeholder="Please enter title">
                                                <small class="text-danger" id="error_title"></small>
                                                @error('title')
                                                <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="vacancy">Vacancy </label>
                                                <input type="number" min="1" class="form-control" id="vacancy" name="vacancy" value="{{$job->vacancy ?? old('vacancy')}}" placeholder="Please enter vacancy">
                                                @error('vacancy')
                                                <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="hot_job">Job Type</label>
                                                <select name="hot_job" id="hot_job" class="form-control">
                                                    <option value="">Select Type</option>
                                                    <option value="1" {{ $job->hot_job == 1 ? 'selected' : '' }}>Hot Job</option>
                                                    <option value="0" {{ $job->hot_job == 0 ? 'selected' : '' }}>Category Job</option>
                                                </select>
                                                @error('hot_job')
                                                <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="jobcat_id">Job Category <span class="required-icon">*</span></label>
                                                <select name="jobcat_id" required="" id="jobcat_id" class="form-control">
                                                    <option value="">Select Category</option>
                                                    @foreach($categories as $cat)
                                                    <option value="{{$cat->id}}"
                                                        {{ $cat->id == $job->jobcat_id ? 'selected' : '' }}>{{$cat->title}}
                                                    </option>
                                                    @endforeach
                                                </select>  
                                                @error('jobcat_id')
                                                <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="company_id">Company <span class="required-icon">*</span></label>
                                                <select name="company_id"  required="" id="company_id" class="form-control">
                                                    <option value="">Select Company</option>
                                                    @foreach($company as $com)
                                                    <option value="{{$com->id}}"
                                                        {{ $com->id == $job->company_id ? 'selected' : '' }}>{{$com->name}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('company_id')
                                                <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="emp_status">Employment Status</label>
                                                <select class="form-control form-control-lg" id="emp_status" name="emp_status">
                                                    <option value="">--Select Employment Status</option>
                                                    <option value="0" {{$job->emp_status === 0 ? 'Selected' : ''}}>Full Time
                                                    </option>
                                                    <option value="1" {{$job->emp_status === 1 ? 'Selected' : ''}}>Half Time
                                                    </option>
                                                </select>
                                                @error('emp_status')
                                                <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="deadline">Application DeadLine <span class="required-icon">*</span></label>
                                                <input type="date" required="" class="form-control" value="{{$job->deadline ?? old('deadline')}}" id="deadline" name="deadline" placeholder="dd/mm/yyyy">
                                                @error('deadline')
                                                <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="resume_option">Resume receiving option</label>
                                                <select class="form-control form-control-lg" id="resume_option" name="resume_option">
                                                    <option value="">--Select Resume receiving option</option>
                                                    <option value="0" {{$job->resume_option === 0 ? 'Selected' : ''}}>Online apply</option>
                                                    <option value="1" {{$job->resume_option === 1 ? 'Selected' : ''}}>Email</option>
                                                    <option value="2" {{$job->resume_option === 2 ? 'Selected' : ''}}>Hard copy</option>
                                                </select>
                                                @error('resume_option')
                                                <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="instruction">Special Instruction for job seekers</label>
                                        <textarea class="form-control " name="instruction" rows="5" cols="50">{{ $job->instruction ?? old('instruction')}}</textarea>
                                        @error('instruction')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading active" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#more_job_info" href="#more_job_info" aria-expanded="false" aria-controls="more_job_info" class="collapsed">
                                        <i class="fa fa-chevron-down fa-xs"></i> More Job Information
                                    </a>
                                </h4>
                            </div>
                            <div id="more_job_info" class="panel-collapse in collapse show p-2" role="tabpanel" aria-labelledby="headingOne" style="">
                                <div class="panel-body">
                                    @if($job->hot_job == 1)
                                    <div class="row form-group">
                                        <div class="col-lg-6">
                                            <label for="job_level">Job Level</label>
                                            <select class="form-control form-control-lg" id="job_level" name="job_level">
                                                <option value="">--Select Job Level</option>
                                                <option value="0" {{$m_job->job_level === 0 ? 'Selected' : ''}}>Entry</option>
                                                <option value="1" {{$m_job->job_level === 1 ? 'Selected' : ''}}>Mid</option>
                                                <option value="2" {{$m_job->job_level === 2 ? 'Selected' : ''}}>Top</option>
                                            </select>
                                            @error('job_level')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="job_cover_img">Job Cover Image</label>
                                            <input type="file" name="job_cover_img" class="form-control job_cover_img">  
                                            <input type="hidden" name="hidden_image" value="{{$m_job->job_cover_img}}">
                                        </div>
                                        <div class="col-lg-2">
                                            @if(!empty($m_job->job_cover_img))
                                                <img src="{{asset('uploads/job/'.$m_job->job_cover_img)}}" title="Hot job cover image" alt="Cover image of {{$job->title}}" width="80"> 
                                            @endif
                                        </div>
                                    </div>
                                    @else
                                    <div class="form-group">
                                        <label for="job_level">Job Level</label>
                                        <select class="form-control form-control-lg" id="job_level" name="job_level">
                                            <option value="">--Select Job Level</option>
                                            <option value="0" {{$m_job->job_level === 0 ? 'Selected' : ''}}>Entry</option>
                                            <option value="1" {{$m_job->job_level === 1 ? 'Selected' : ''}}>Mid</option>
                                            <option value="2" {{$m_job->job_level === 2 ? 'Selected' : ''}}>Top</option>
                                        </select>
                                        @error('job_level')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="context">Job context</label>
                                        <textarea class="form-control @error('context') is-invalid @enderror " name="context" rows="5" cols="50">{{ $m_job->context ?? old('context')}}</textarea>
                                        @error('context')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="responsibility">Job Responsibility</label>
                                        <textarea class="form-control " name="responsibility" rows="5" cols="50">{{$m_job->responsibility ?? old('responsibility')}}</textarea>
                                        @error('responsibility')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="wrok_place">Work Place</label>
                                                <select class="form-control form-control-lg" id="wrok_place" name="wrok_place">
                                                    <option value="">--Select work place</option>
                                                    <option value="0" {{$m_job->wrok_place === 0 ? 'Selected' : ''}}>Work at office</option>
                                                     <option value="1" {{$m_job->wrok_place === 1 ? 'Selected' : ''}}>Work from home</option>
                                                </select>
                                                @error('wrok_place')
                                                <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="location">Job Location</label>
                                                <input type="text" maxlength="200" class="form-control" id="location" name="location" value="{{$m_job->location ?? old('location')}}" placeholder="Please enter job location">
                                                <small class="text-danger" id="error_location"></small>
                                                @error('location')
                                                <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="salary">Salary <span class="required-icon">*</span></label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <select class="form-control form-control-lg salary-type" required="" id="salary" name="salary">
                                                    <option value="">--Select</option>
                                                    <option value="0" {{$m_job->salary == 0 ? 'Selected' : ''}}>Monthly</option>
                                                    <option value="1" {{$m_job->salary == 1 ? 'Selected' : ''}}>Daily</option>
                                                    <option value="2" {{$m_job->salary == 2 ? 'Selected' : ''}}>Yearly</option>
                                                    <option value="3" {{$m_job->salary == 3 ? 'Selected' : ''}}>Hourly</option>
                                                    <option value="4" {{$m_job->salary == 4 ? 'Selected' : ''}}>Negotiable</option>
                                                </select>
                                                @error('salary')
                                                <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            @if($m_job->salary == 4)
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <input type="number" disabled min="1" required="" class="form-control min-salary" id="min_salary" name="min_salary" placeholder="Enter min salary">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <p>(min) <span class="required-icon text-danger">*</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <input type="number" disabled min="1" required="" class="form-control max-salary" id="max_salary" name="max_salary" placeholder="Enter max salary">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <p>(max) <span class="required-icon text-danger">*</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            @else
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <input type="number" min="1" required="" class="form-control min-salary"
                                                            id="min_salary" name="min_salary" placeholder="Enter min salary"
                                                            @if(!empty($m_job->min_salary)) value="{{$m_job->min_salary}}" @else
                                                            value="{{old('min_salary')}}" @endif>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <p>(min) <span class="required-icon text-danger">*</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <input type="number" min="1" required="" class="form-control max-salary"
                                                            id="max_salary" name="max_salary" placeholder="Enter max salary"
                                                            @if(!empty($m_job->max_salary)) value="{{$m_job->max_salary}}" @else
                                                            value="{{old('max_salary')}}" @endif>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <p>(max) <span class="required-icon text-danger">*</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="add_salary">Additional Salary information</label>
                                        <textarea class="form-control " name="add_salary" rows="5" cols="50">{{$m_job->add_salary ?? old('add_salary')}}</textarea>
                                        @error('add_salary')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="compensation">Compensation other benefits</label>
                                        <textarea class="form-control " name="compensation" rows="5" cols="50">{{$m_job->compensation ?? old('compensation')}}</textarea>
                                        @error('compensation')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading active" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#candidate_requirements" href="#candidate_requirements" aria-expanded="false" aria-controls="candidate_requirements" class="collapsed">
                                        <i class="fa fa-chevron-down fa-xs"></i> Candidate Requirements
                                    </a>
                                </h4>
                            </div>
                            <div id="candidate_requirements" class="panel-collapse in collapse show p-2" role="tabpanel" aria-labelledby="headingOne" style="">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <?php $counter = 1; $dcount=1; $dc=1;?>
                                        @foreach ($education as $edu)
                                            @foreach ($candidate_qualification as $qual)
                                                @if($edu->id == $qual->qualification_id)
                                                <div class="row count-row mb-2">
                                                    <div class="col-lg-6">
                                                        <label for="qualification">Academic qualification <?php echo $counter++;?> <span class="required-icon text-danger">*</span></label>
                                                        <select required="" data-id="<?php echo $dcount;?>" class="form-control form-control-lg academic_qualification academic_qualification_<?php echo $dcount;?>" id="qualification"  name="qualification[]">
                                                            <option value="">--Select Qualification--</option>
                                                            @foreach ($education as $edu)
                                                                <option value="{{ $edu->id }}" @if(!empty($edu->id)) @if($edu->id == $qual->qualification_id) selected @endif @endif>
                                                                    {{ $edu->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('qualification')
                                                        <small class="text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="degree">Degree <?php echo $dc++;?> <span class="required-icon text-danger">*</span></label>
                                                        <?php $degree = App\Models\Education::where('status',1)->where('parent_id',$qual->qualification_id)->get();?>
                                                        <select required="" class="form-control form-control-lg exam_degree_<?php echo $dcount++;?>" id="degree"  name="degree[]">
                                                            @foreach($degree as $deg)
                                                            <option value="{{ $deg->id }}" @if($deg->id == $qual->degree_id) selected @endif> {{ $deg->name}} </option>
                                                            @endforeach 
                                                        </select>
                                                        @error('degree')
                                                        <small class="text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </div>
                                    <div id="quaCard"></div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 submit">
                                                <a  id="add_more" class="btn btn-sm btn-success popQualification mb-4" href=""><i class="fa fa-plus" aria-hidden="true"></i>Add More </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="institute">Preferred Education Institution</label>
                                        <input type="text" class="form-control" id="institute" name="institute" maxlength="200" value="{{$candidate->institute ?? old('institute')}}" placeholder="Please enter edication institute">
                                        <small class="text-danger" id="error_institute"></small>
                                        @error('institute')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="other_qualification">Other educational qualification</label>
                                        <textarea class="form-control " name="other_qualification" rows="5" cols="50">{{$candidate->other_qualification ?? old('other_qualification')}}</textarea>
                                        @error('other_qualification')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="skill">Professional Degree</label>
                                        <?php  
                                        $professional_degree = App\Models\ProfessionalDegree::where('status',1)->get();
                                        $degree_stored = App\Models\RequiredProfessionalDegree::where('status',1)->where('job_id',$job->id)->get();
                                        ?>
                                        <select class="form-control professional-degree" id="professional_degree" name="professional_degree[]"  multiple="multiple">
                                            @foreach($professional_degree as $degree)
                                            <option value="{{$degree->id}}" @if(!empty($degree_stored)) @foreach($degree_stored as
                                            $deg){{ $deg->degree_id == $degree->id ? 'selected': ''}} @endforeach @endif> {{ $degree->degree_title }}</option>
                                            @endforeach
                                        </select>
                                        @error('professional_degree')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="training_course">Training/Trade Course</label>
                                        <textarea class="form-control " name="training_course" rows="5" cols="50">{{$candidate->training_course ?? old('training_course')}}</textarea>
                                        @error('training_course')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="short_experience">Experience (In Years)</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">At least</span>
                                            </div>
                                            <input type="number" min="1" maxlength="2" max="99" class="form-control" id="short_experience" name="short_experience" value="@if(!empty($candidate->short_experience)){{$candidate->short_experience}}@else{{old('short_experience')}}@endif" placeholder="No of years">
                                            <div class="input-group-append">
                                                <span class="input-group-text">year/years</span>
                                            </div>
                                        </div>
                                        <small class="text-danger" id="error_short_experience"></small>
                                        @error('short_experience')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="experience">Experience</label>
                                        <textarea class="form-control @error('experience') is-invalid @enderror " name="experience" rows="5" cols="50" maxlength="5000">{{$candidate->experience ?? old('experience')}}</textarea>
                                        @error('experience')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="skill">Skill</label>
                                        <?php  
                                        $skills = App\Models\Skill::where('status',1)->get();
                                        $skill_stored = App\Models\RequiredJobSkill::where('status',1)->where('job_id',$job->id)->get();
                                        ?>
                                        <select class="form-control js-example-basic-multiple" id="skill" name="skill[]"  multiple="multiple">
                                            @foreach($skills as $skill)
                                            <option value="{{$skill->id}}" @if(!empty($skill_stored)) @foreach($skill_stored as
                                            $skillid){{ $skillid->skill_id == $skill->id ? 'selected': ''}} @endforeach @endif> {{ $skill->skill_title }}</option>
                                            @endforeach
                                        </select>
                                        @error('skill')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="add_req">Additional requirements</label>
                                        <textarea class="form-control " name="add_req" rows="5" cols="50">{{$candidate->add_req ?? old('add_req')}}</textarea>
                                        @error('add_req')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label for="gender">Gender <span class="required-icon text-danger">*</span></label>
                                                <select required="" class="form-control form-control-lg" id="gender" name="gender">
                                                    <option value="">--Select gender</option>
                                                    <option value="0" {{$candidate->gender === 0 ? 'Selected' : ''}}>Male</option>
                                                    <option value="1" {{$candidate->gender == 1 ? 'Selected' : ''}}>Female</option>
                                                    <option value="2" {{$candidate->gender == 2 ? 'Selected' : ''}}>Both Male & Female</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-8">
                                                <label for="age">Age Limit<span class="required-icon text-danger">*</span></label>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input type="number" min="18" max="99" maxlength="2" required=""  class="form-control" id="age_min" name="age_min" 
                                                        @if(!empty($candidate->age_min)) value="{{$candidate->age_min}}" @else value="{{old('age_min')}}" @endif placeholder="Min age">
                                                        <small class="text-danger" id="error_age_min"></small>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="number" min="19" max="99" maxlength="2" required=""  class="form-control" id="age_max" name="age_max"
                                                        @if(!empty($candidate->age_max)) value="{{$candidate->age_max}}" @else value="{{old('age_max')}}" @endif placeholder="Max age">
                                                        <small class="text-danger" id="error_age_max"></small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success ml-2">Update Job</button>
                        <a class="btn btn-light" href="/dashboard">cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
var qua = document.querySelectorAll('.count-row').length;
console.log(qua);
if(qua == 0){
    qua =1;
}
var mx = 5;
$('.popQualification').on('click', function(e) {
e.preventDefault();
const form = `
<div id="qualification_section_content" class="qualification_section_content sec${qua+1} mt-4 ">
<div class="row">
<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
<div class="Experience-history">
<h6>
<button class="btn remove_btn text-white btn-sm btn-danger float-right" onClick="removeQualification(${qua+1})">Remove <i style="font-size:17px;" class="fa fa-times-circle-o" aria-hidden="true"></i>
</button>
</h6>
</div>
</div>
</div>
<div class="form-group mb-3">
    <div class="row">
        <div class="col-lg-6">
            <label for="qualification">Academic qualification `+(qua+1)+` <span class="required-icon text-danger">*</span></label>
            <select required="" data-id="`+(qua+1)+`" class="academic_qualification form-control form-control-lg academic_qualification_`+(qua+1)+`" id="qualification"  name="qualification[]">
                <option value="">--Select Qualification--</option>
                @foreach ($education as $edu)
                    <option value="{{$edu->id}}">{{$edu->name}}</option>
                @endforeach
            </select>
            @error('qualification')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="col-lg-6">
            <label for="degree">Degree `+(qua+1)+` <span class="required-icon text-danger">*</span></label>
            <select required="" class="form-control form-control-lg exam_degree_`+(qua+1)+`" id="degree"  name="degree[]">
            <option value="">--Select Degree--</option>
            </select>
            @error('degree')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
</div>
</div> 
`
if (qua < mx) {
    $('#quaCard').append('<div>' + form + '</div>');
    
    $('.academic_qualification').on('change',function(){
        console.log(qua)
		var eduID = $(this).val();
        var eID = $(this).attr('data-id');
		if(eduID)
		{
			$.ajax({
				url : '/admin/job/get/education/'+eduID,
				type : "GET",
				dataType : "json",
				success:function(data)
				{
					$('.exam_degree_'+eID).empty();
					$('.exam_degree_'+eID).append('<option value="">--Select Degree--</option>');
					$.each(data, function(key,value){
						$('.exam_degree_'+eID).append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        console.log(value.name)
					});
				}
			});
		}
		else
		{
		$('.exam_degree_'+eID).empty();
		}
	});
    qua++;    
}else{
    alert('You can not add more  than 5 qualification.');
}
$('#quaCard').on('click', '.remove_btn', function(e) {
    e.preventDefault();
    $(this).parent('.qualification_section_content').remove();
    qua--
})

});

function removeQualification(id) {
// e.preventDefault();
$(`.qualification_section_content.sec${id}`).remove();
qua--
console.log('id')
}
</script>
<script type="text/javascript">
jQuery(document).ready(function ()
{       
jQuery('.academic_qualification').on('change',function(){
var eduID = jQuery(this).val();
var eID = jQuery(this).attr('data-id');

if(eduID)
{
$.ajax({
url : '/admin/job/get/education/'+eduID,
type : "GET",
dataType : "json",
success:function(data)
{
    $('.exam_degree_'+eID).empty();
    $('.exam_degree_'+eID).append('<option value="">--Select Degree--</option>');
    $.each(data, function(key,value){
        $('.exam_degree_'+eID).append('<option value="'+ value.id +'">'+ value.name +'</option>');
        console.log(value.name)
    });
}
});
}
else
{
$('.exam_degree_'+eID).empty();
}
});
});
</script>
<script>
    $('#title').on('input',function() 
    {
    var maxlen = $(this).attr('maxlength');
    var length = $(this).val().length;
    if(length >= (maxlen) ){
        $('#error_title').text('Max length '+maxlen+' characters only!')
    }
    else
    {
        $('#error_title').text('');
    }
    });
    $('#short_experience').on('input',function() 
    {
        var maxlen = $(this).attr('maxlength');
        var length = $(this).val().length;
    if(length >= (maxlen) ){
        $('#error_short_experience').text('Max length '+maxlen+' characters only!')
    }
    else
    {
        $('#error_short_experience').text('');
    }
    });
    $('#institute').on('input',function() 
    {
        var maxlen = $(this).attr('maxlength');
        var length = $(this).val().length;
    if(length >= (maxlen) ){
        $('#error_institute').text('Max length '+maxlen+' characters only!')
    }
    else
    {
        $('#error_institute').text('');
    }
    });
    $('#location').on('input',function() 
    {
        var maxlen = $(this).attr('maxlength');
        var length = $(this).val().length;
    if(length >= (maxlen) ){
        $('#error_location').text('Max length '+maxlen+' characters only!')
    }
    else
    {
        $('#error_location').text('');
    }
    });
    $('#age').on('input',function() 
    {
        var maxlen = $(this).attr('maxlength');
        var length = $(this).val().length;
    if(length >= (maxlen) ){
        $('#error_age').text('Max length '+maxlen+' characters only!')
    }
    else
    {
        $('#error_age').text('');
    }
    });
        //age min
    // $('#age_min').on('input',function() 
    // {
    //     var maxlen = $(this).attr('maxlength');
    //     var length = $(this).val().length;
    // if(length >= (maxlen) ){
    //     $('#error_age_min').text('Max length '+maxlen+' characters only!')
    // }
    // else
    // {
    //     $('#error_age_min').text('');
    // }
    // });
    //age max
    // $('#age_max').on('input',function() 
    // {
    //     var maxlen = $(this).attr('maxlength');
    //     var length = $(this).val().length;
    // if(length >= (maxlen) ){
    //     $('#error_age_max').text('Max length '+maxlen+' characters only!')
    // }
    // else
    // {
    //     $('#error_age_max').text('');
    // }
    // });
 </script>
 @endsection