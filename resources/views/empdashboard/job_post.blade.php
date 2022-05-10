@extends('master')

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
.rm-btn{
border:none;outline:0;background:none;
}
input.form-control.job_cover_img {
    border: 0;
}
</style>
<main>
    <div class="section-full bg-white p-t50 p-b20">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 m-b30">
                    @include('empdashboard.include.emp-sidebar')
                </div>
                <div class="col-xl-9 col-lg-8 m-b30"><br>
                    @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
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
                    <h5 class="font-weight-700 pull-left">Post a new job</h5><br>
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <form role="form" id="basic-form" class="forms-sample" action="{{route('employer.jobstore', $job_cat)}}" method="POST"
                            enctype="multipart/form-data">
                            <div class="qualification_section_content" id="qualification_section_content">
                            @csrf
                            <div class="panel panel-default">
                                <div class="panel-heading active" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                            <i class="fa fa-chevron-down fa-xs"></i>  Primary Job Information
                                        </a>
                                    </h4>
                                </div>                                
                                <div id="collapseOne" class="panel-collapse in collapse show" role="tabpanel"
                                    aria-labelledby="headingOne" style="">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label for="title">Title <span class="required-icon text-danger">*</span></label>
                                                    <input type="text"  maxlength="100" required="" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}"
                                                        placeholder="Please enter title">
                                                    <small class="text-danger" id="error_title"></small>
                                                    @error('title')
                                                    <small class="text-danger">{{$message}}</small>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="vacancy">Vacancy </label>
                                                    <input type="number" max="100" pattern="\d" title="Vacancy allows only number" min="1" class="form-control" id="vacancy" name="vacancy" value="{{old('vacancy')}}" placeholder="Please enter no of vacancy">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label for="jobcat_id">Job Category <span
                                                            class="required-icon text-danger">*</span></label>
                                                    <select name="jobcat_id" required="" id="jobcat_id" class="form-control">
                                                        <option value="">--Select Category--</option>
                                                        @if($categories != '')
                                                        @foreach($categories as $cat)
                                                        <option value="{{$cat->id}}">
                                                            {{$cat->title}}</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="emp_status">Employment Status</label>
                                                    <select class="form-control form-control-lg" id="emp_status"
                                                        name="emp_status">
                                                        <option value="">--Select Employment Status--</option>
                                                        <option value="0">Full Time</option>
                                                        <option value="1">Half Time</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="company_id" value="@if($empinfo != '') {{$empinfo->id}} @endif">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label for="deadline">Application DeadLine <span class="required-icon text-danger">*</span></label>
                                                    <div id="datepicker-popup"
                                                        class="input-group date datepicker datepicker-popup">
                                                        <input type="date" required="" class="form-control" id="deadline" name="deadline" placeholder="dd/mm/yyyy">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="resume_option">Resume receiving option</label>
                                                    <select class="form-control form-control-lg" id="resume_option" name="resume_option">
                                                        <option value="">--Select Resume receiving option--
                                                        </option>
                                                        <option value="0">Online Apply</option>
                                                        <option value="1">Email</option>
                                                        <option value="2">Hard Copy</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="instruction">Special Instruction for job seekers</label>
                                            <textarea class="form-control @error('instruction') is-invalid @enderror " name="instruction" rows="5" cols="50" maxlength="5000">{{old('instruction')}}</textarea>
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
                                        <a role="button" data-toggle="collapse" data-parent="#more_job" href="#more_job" aria-expanded="false" aria-controls="more_job" class="collapsed">
                                            <i class="fa fa-chevron-down fa-xs"></i>
                                            More Job Information
                                        </a>
                                    </h4>
                                </div>
                                <div id="more_job" class="panel-collapse in collapse show" role="tabpanel"
                                    aria-labelledby="headingOne" style="">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="row">
                                                @if($job_cat == 1)
                                                <div class="col-lg-6">
                                                    <label for="job_level">Job Level</label>
                                                    <select class="form-control form-control-lg" id="job_level" name="job_level">
                                                        <option value="">--Select Job Level--</option>
                                                        <option value="0">Entry</option>
                                                        <option value="1">Mid</option>
                                                        <option value="2">Top</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="job_cover_img">Job Cover Image</label>
                                                     <input type="file" name="job_cover_img" class="form-control job_cover_img">                                                
                                                </div>
                                                @else
                                                <div class="col-lg-12">
                                                    <label for="job_level">Job Level</label>
                                                    <select class="form-control form-control-lg" id="job_level" name="job_level">
                                                        <option value="">--Select Job Level--</option>
                                                        <option value="0">Entry</option>
                                                        <option value="1">Mid</option>
                                                        <option value="2">Top</option>
                                                    </select>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <label for="context">Job context</label>
                                                    <textarea class="form-control @error('context') is-invalid @enderror " name="context" rows="5" cols="50">{{old('context')}}</textarea>
                                                    @error('context')
                                                    <small class="text-danger">{{$message}}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="responsibility">Job Responsibility</label>
                                            <textarea class="form-control @error('responsibility') is-invalid @enderror " name="responsibility" rows="5" cols="50">{{old('responsibility')}}</textarea>
                                            @error('responsibility')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label for="wrok_place">Work Place</label>
                                                <select class="form-control form-control-lg" id="wrok_place" name="wrok_place">
                                                    <option value="">--Select work place--</option>
                                                    <option value="0">Work at office</option>
                                                    <option value="1">Work from home</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="location">Job Location</label>
                                                <input type="text" maxlength="200" class="form-control" id="location" name="location" value="{{old('location')}}"  placeholder="Please enter job location">
                                                <small class="text-danger" id="error_location"></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="salary">Salary <span class="required-icon text-danger">*</span></label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <select required="" class="form-control form-control-lg salary-type" id="salary" name="salary">
                                                    <option value="">--Select--</option>
                                                    <option value="0">Monthly</option>
                                                    <option value="1">Daily</option>
                                                    <option value="2">Yearly</option>
                                                    <option value="3">Hourly</option>
                                                    <option value="4">Negotiable</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <input type="number" required="" min="1" maxlength="10" pattern="\d" class="form-control min-salary" id="min_salary" name="min_salary" value="{{old('min_salary')}}" placeholder="Enter min salary">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <p>(min) <span class="required-icon text-danger">*</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <input type="number" required="" class="form-control max-salary"  id="max_salary" name="max_salary" min="1" maxlength="10" pattern="\d" value="{{old('max_salary')}}" placeholder="Enter max salary">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <p>(max) <span class="required-icon text-danger">*</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="add_salary">Additional Salary information</label>
                                        <textarea class="form-control @error('add_salary') is-invalid @enderror " name="add_salary" rows="5" cols="50" maxlength="5000">{{old('add_salary')}}</textarea>
                                        @error('add_salary')
                                        <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="compensation">Compensation other benefits</label>
                                        <textarea class="form-control @error('compensation') is-invalid @enderror " name="compensation" rows="5" cols="50" maxlength="5000">{{old('compensation')}}</textarea>
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
                                    <i class="fa fa-chevron-down fa-xs"></i>
                                    Candidates Requirements
                                </a>
                            </h4>
                        </div>
                        <div id="candidate_requirements" class="panel-collapse in collapse show" role="tabpanel"
                            aria-labelledby="headingOne" style="">
                            <div class="panel-body">
                                <div class="form-group mb-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="qualification">Academic qualification <span class="required-icon text-danger">*</span></label>
                                            <select required="" class="form-control form-control-lg academic_qualification" id="qualification"  name="qualification[]">
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
                                            <label for="degree">Degree <span class="required-icon text-danger">*</span></label>
                                            <select required="" class="form-control form-control-lg exam_degree" id="degree"  name="degree[]">
                                            <option value="">--Select Degree--</option>
                                            </select>
                                            @error('degree')
                                            <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div id="quaCard"></div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 submit">
                                            <a  id="add_more" class="btn btn-sm btn-success popQualification mb-4" href=""><i class="fa fa-plus" aria-hidden="true"></i> Add More </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="institute">Preferred Education Institution</label>
                                    <input type="text" maxlength="200" class="form-control" id="institute" name="institute" value="{{old('institute')}}" placeholder="Please enter education institute">
                                    <small class="text-danger" id="error_institute"></small>
                                </div>
                                <div class="form-group">
                                    <label for="other_qualification">Other educational qualification</label>
                                    <textarea class="form-control @error('other_qualification') is-invalid @enderror " name="other_qualification" rows="5" cols="50" maxlength="5000">{{old('other_qualification')}}</textarea>
                                    @error('other_qualification')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="skill">Professional Degree</label>
                                    <?php  $professional_degree = App\Models\ProfessionalDegree::where('status',1)->get();?>
                                    <select class="form-control professional-degree" id="professional_degree" name="professional_degree[]"  multiple="multiple">
                                        @foreach($professional_degree as $degree)
                                        <option value="{{$degree->id}}"> {{ $degree->degree_title }}</option>
                                        @endforeach
                                    </select>
                                    @error('professional_degree')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="training_course">Training/Trade Course</label>
                                    <textarea class="form-control @error('training_course') is-invalid @enderror " name="training_course" rows="5" cols="50" maxlength="5000">{{old('training_course')}}</textarea>
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
                                        <input type="number" min="1" maxlength="2" max="99" class="form-control" id="short_experience" name="short_experience" value="{{old('short_experience')}}" placeholder="No of years">
                                        <div class="input-group-append">
                                            <span class="input-group-text">year/years</span>
                                        </div>
                                    </div>
                                    <small class="text-danger" id="error_short_experience"></small>
                                </div>
                                <div class="form-group">
                                    <label for="experience">Experience</label>
                                    <textarea class="form-control @error('experience') is-invalid @enderror " name="experience" rows="5" cols="50" maxlength="5000">{{old('experience')}}</textarea>
                                    @error('experience')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="skill">Skill</label>
                                    <?php  $skills = App\Models\Skill::where('status',1)->get();?>
                                    <select class="form-control js-example-basic-multiple" id="skill" name="skill[]"  multiple="multiple">
                                        @foreach($skills as $skill)
                                        <option value="{{$skill->id}}"> {{ $skill->skill_title }}</option>
                                        @endforeach
                                    </select>
                                    @error('skill')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="add_req">Additional requirements</label>
                                    <textarea class="form-control @error('add_req') is-invalid @enderror " name="add_req" rows="5" cols="50" maxlength="5000">{{old('add_req')}}</textarea>
                                    @error('add_req')
                                    <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="gender">Gender <span class="required-icon text-danger">*</span></label>
                                            <select class="form-control" required="" id="gender" name="gender">
                                                <option value="">--Select Gender--</option>
                                                <option value="0">Male</option>
                                                <option value="1">Female</option>
                                                <option value="2">Both Male & Female</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-8">
                                            <label for="age">Age Limit<span class="required-icon text-danger">*</span></label>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <input type="number" min="18" max="99" maxlength="2" required="" pattern="\d" class="form-control" id="age_min" name="age_min" value="{{old('age_min')}}" placeholder="Min age">
                                                    <small class="text-danger" id="error_age_min"></small>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="number" min="19" max="99" maxlength="2" required="" pattern="\d"  class="form-control" id="age_max" name="age_max" value="{{old('age_max')}}" placeholder="Max age">
                                                    <small class="text-danger" id="error_age_max"></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mr-2 mt-4">Post Job</button>
                    <a class="btn btn-light mt-4" href="/company/jobpost">cancel</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>
@endsection
@section('js')

<script>
var qua = document.querySelectorAll('#qualification_section_content').length;
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
				url : '/company/get/education/'+eduID,
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
if(eduID)
{
jQuery.ajax({
url : '/company/get/education/'+eduID,
type : "GET",
dataType : "json",
success:function(data)
{
console.log(data);
jQuery('.exam_degree').empty();
jQuery('.exam_degree').append('<option value="">--Select Degree--</option>');

jQuery.each(data, function(key,value){
$('.exam_degree').append('<option value="'+ value.id +'">'+ value.name +'</option>');
});
}
});
}
else
{
$('.exam_degree').empty();
}
});
});
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
 </script>
 <script>
    $('#title').on('input',function() 
    {
        var maxlen = $(this).attr('maxlength');
        var length = $(this).val().length;
        console.log(maxlen)
        console.log(length)

    if(length >= maxlen ){
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
    if(length >= maxlen ){
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
    if(length >= maxlen ){
        $('#error_institute').text('Max length '+maxlen+' characters only!')
    }
    else
    {
        $('#error_institute').text('');
    }
    });
    //location
    $('#location').on('input',function() 
    {
        var maxlen = $(this).attr('maxlength');
        var length = $(this).val().length;
    if(length >= maxlen ){
        $('#error_location').text('Max length '+maxlen+' characters only!')
    }
    else
    {
        $('#error_location').text('');
    }
    });
    //age min
    // $('#age_min').on('input',function() 
    // {
    //     var maxlen = $(this).attr('maxlength');
    //     var length = $(this).val().length;
    // if(length >= maxlen ){
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
    // if(length >= maxlen ){
    //     $('#error_age_max').text('Max length '+maxlen+' characters only!')
    // }
    // else
    // {
    //     $('#error_age_max').text('');
    // }
    // });
 </script>
@endsection