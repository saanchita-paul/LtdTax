@extends('master')

@section('content')
<style>
.vanish{
    border:none;
    outline:0;
    background:none;
}
.mar-top{
    margin-top:270px;
}
.p-size{
    font-size: 14px;
}

.g-tax{
    color:#005900;
}
.g-tax-bg{
    background-color:#005900;
}
.com-info{
    font-size: 16px;
}
.sm-top{
margin-top:50px;
}
</style>
<main>
    <div class="section-full bg-white p-t50 p-b20 sm-top">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 m-b30">
                @include('empdashboard.include.emp-sidebar')
                </div>
                <div class="col-xl-9 col-lg-8 m-b30">
                    <div class="content-wrapper">
                        <div class="row">
                            <?php
                                $id=Auth::user()->id; 
                                $applied = DB::table('applied_jobs')
                                ->where('job_id', $job_sidebar->job_id)
                                ->where('user_id', $id)
                                ->first();
                            ?>
                            <div class="col-md-12 grid-margin stretch-card ">
                                <div class="card bx-sh">
                                    <div class="card-body">
                                        @if($job_info->hot_job == 1)
                                            @if(!empty($more_jobs->job_cover_img))
                                                <div class="row">
                                                    <div class="col-lg-12 mx-auto">
                                                        <img src="{{asset('uploads/job/'.$more_jobs->job_cover_img)}}" alt="Cover image of {{$job_info->title}}"> 
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                     <div class="row">
                                        <div class="col-lg-7">
                                        @if(!empty($job_info->title))
                                        <h5 class="g-tax mt-4"><b>
                                            {{$job_info->title}}
                                        </b></h5>
                                        @endif
                                        @if(!empty($all_status->company_name) && $all_status->company_name == 1 )
                                            @if(!empty($company_alt_name))
                                            <h6 class="text-dark mb-4 mt-3"><b>{{$company_alt_name}}</b></h6>
                                            @else
                                            <h6 class="text-dark mb-4 mt-3"><b>{{$company_info->name}}</b></h6>
                                            @endif
                                        @endif
                                        @if(!empty($job_info->vacancy))
                                            <h6 class="text-dark"><b>Vacancy</b></h6>
                                            <p class="ml-3 text-secondary mb-3">{{$job_info->vacancy}}</p>
                                        @endif
                                        @if(!empty($job_cat->title))
                                            <h6 class="text-dark"><b>Job Category</b></h6>
                                            <p class="ml-3 text-secondary mb-3">{{$job_cat->title}}</p>
                                        @endif
                                        @if(!empty($job_context))
                                            <h6 class="text-dark"><b>Job Context</b></h6>
                                            <ul class="ml-3 text-secondary mb-3">
                                                @foreach($job_context as $context)
                                                <li class="text-justify">{{$context}}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                        @if(!empty($job_responsibility))
                                            <h6 class="text-dark"><b>Job Responsibilities</b></h6>
                                            <ul class="ml-3 text-secondary mb-3">
                                                @foreach($job_responsibility as $responsibility)
                                                <li class="text-justify">{{$responsibility}}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                        <h6 class="text-dark"><b>Employment Status</b></h6>
                                        @if($job_info->emp_status == 0)
                                            <p class="ml-3 text-secondary mb-3">Full-time</p>
                                        @endif
                                        @if($job_info->emp_status == 1)
                                            <p class="ml-3 text-secondary mb-3">Half-time</p>
                                        @endif
                                        <h6 class="text-dark"><b>Work Place</b></h6>
                                        @if($job_info->work_place == 0)
                                            <p class="ml-3 text-secondary mb-3">Work at Office</p>
                                        @endif
                                        @if($job_info->work_place == 1)
                                            <p class="ml-3 text-secondary mb-3">Work from home</p>
                                        @endif
                                        @if(!empty($job_sidebar->institute) || !empty($o_qualification) || !empty($candidate_qualification))
                                            <h6 class="text-dark"><b>Educational Requirements</b></h6>  
                                            <ul class="ml-3 text-secondary mb-3">
                                            @foreach($education as $edu)
                                                @if(!empty($candidate_qualification))
                                                    @foreach($candidate_qualification as $qual)
                                                        @if($edu->id == $qual->qualification_id)
                                                            <li>
                                                            {{$edu->name}}, 
                                                            @foreach($degree as $deg)
                                                                @if($deg->id == $qual->degree_id)
                                                                    {{$deg->name}}<br>
                                                                @endif
                                                            @endforeach
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                            @if(!empty($o_qualification))
                                                @foreach($o_qualification as $other_qua)
                                                <li class="text-justify">
                                                    {{$other_qua}}
                                                </li>
                                                @endforeach
                                            @endif
                                            @if(!empty($job_sidebar->institute))
                                                <li>{!!$job_sidebar->institute!!}</li>
                                            @endif
                                            </ul>
                                        @endif
                                        @if(!empty($experience) || !empty($job_sidebar->short_experience) )
                                            <h6 class="text-dark"><b>Experience</b></h6>
                                            <ul class="ml-3 text-secondary mb-3">
                                                @if($job_sidebar->short_experience != 0)
                                                <li>At least {{$job_sidebar->short_experience}}
                                                    @if($job_sidebar->short_experience > 1) 
                                                        years
                                                    @else 
                                                        year 
                                                    @endif
                                                </li>
                                                @endif
                                                @if(!empty($experience))
                                                    @foreach($experience as $exep)
                                                        <li class="text-justify">{{$exep}}</li>
                                                    @endforeach
                                                @else
                                                @endif
                                            </ul>
                                        @endif
                                        @if(!empty($train_course) || !empty($required_job_skills) && $required_job_skills->count() > 0)
                                            <h6 class="text-dark"><b>Specialization</b></h6>
                                        <ul class="ml-3 text-secondary mb-3">
                                            @if(!empty($train_course))
                                                @foreach($train_course as $tra_cour)
                                                <li class="text-justify">
                                                    {{$tra_cour}}
                                                </li>
                                                @endforeach
                                            @endif
                                            @foreach($skills as $skill)
                                                @if(!empty($required_job_skills))
                                                    @foreach($required_job_skills as $r_skill)
                                                        @if($skill->id == $r_skill->skill_id)
                                                        <li>{{$skill->skill_title}}</li>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </ul>
                                        @endif
                                        @if(!empty($add_req) || !empty($job_sidebar->age_min) && !empty($job_sidebar->age_max) || !empty($job_sidebar->gender))
                                            <h6 class="text-dark"><b>Additional Requirements</b></h6>
                                            <ul class="ml-3 text-secondary mb-3">
                                                <li >Age {{$job_sidebar->age_min}}-{{$job_sidebar->age_max}}</li>
                                                @if($job_sidebar->gender == 0)
                                                <li>Only males are allowed to apply</li>
                                                @endif
                                                @if($job_sidebar->gender == 1)
                                                <li>Only females are allowed to apply</li>
                                                @endif
                                                @if($job_sidebar->gender == 2)
                                                <li>Both males & females are allowed to apply</li>
                                                @endif
                                                @if(!empty($job_sidebar->add_req))
                                                    @foreach($add_req as $additional_requ )
                                                    <li class="text-justify">{{$additional_requ}}</li>
                                                    @endforeach
                                                @endif
                                            </ul>    
                                        @endif
                                        @if(!empty($more_jobs->location))
                                        <h6 class="text-dark"><b>Job Location</b></h6>
                                        <p class="ml-3 text-secondary mb-3">{{$more_jobs->location}}</p>
                                        @endif
                                        @if(!empty($all_status->salary) && $all_status->salary == 1 )
                                            @if(!empty($more_jobs->min_salary) && !empty($more_jobs->max_salary))
                                            <h6 class="text-dark"><b>Salary</b></h6>
                                            <ul class="ml-3 text-secondary mb-3"><li>
                                                @if($more_jobs->salary != 4)
                                                    Tk. {{$more_jobs->min_salary}} - Tk. {{$more_jobs->max_salary}}
                                                @else
                                                    Negotiable
                                                @endif
                                                @if($more_jobs->salary == 0 )
                                                (Monthly)
                                                @endif

                                                @if($more_jobs->salary == 1 )
                                                (Daily)
                                                @endif

                                                @if($more_jobs->salary == 2 )
                                                (Yearly)
                                                @endif

                                                @if($more_jobs->salary == 3 )
                                                (Hourly)
                                                @endif
                                                </li></ul>
                                            @endif
                                        @endif
                                        @if(!empty($compensation) || !empty($additional_sal))
                                        <h6 class="text-dark"><b>Compensation & Other Benefits</b></h6>
                                        <ul class="ml-3 text-secondary mb-3">
                                        @if(!empty($compensation))
                                            @foreach($compensation as $compen)
                                                <li class="text-justify">{{$compen}}</li>
                                            @endforeach
                                        @endif
                                        @if(!empty($additional_sal))
                                            @foreach($additional_sal as $addi_salary)
                                                <li class="text-justify">{{$addi_salary}}</li>
                                            @endforeach
                                        @endif
                                        </ul>
                                        @endif
                                        <h6 class="text-dark"><b>Job Source</b></h6>
                                        <p class="ml-3 text-secondary mb-3">The Taxman LTD. Online Job Posting.</p>
                                        </div>
                                        <div class="col-lg-5">
                                        @if(!empty($job_cat->title))
                                        <p class="mb-2 p-size text-right"><b>Category:</b> {{$job_cat->title}}</p>
                                        @endif
                                        <div class="card">
                                        <h6 class="card-title bg-dark text-white p-2 font-weight-bold"><span class="jb-sum">Job Summary</span></h6>
                                            <div class="card-body pt-0">
                                            @if(!empty($post_date))
                                            <p class="mb-3 p-size"><b>Posted on:</b> <?php $posted_date = strtotime($post_date); echo  date(' jS F , Y', $posted_date);?></p>
                                            @endif
                                            @if(!empty($job_info->vacancy))
                                            <p class="mb-3 p-size"><b>Vacancy:</b> {{$job_info->vacancy}}</p>
                                            @endif
                                            @if(!empty($all_status->age) && $all_status->age == 1 )
                                                @if(!empty($candidate->age_min) && !empty($candidate->age_max))
                                                    <p class="mb-3 p-size"><b>Age:</b> {{$candidate->age_min}}-{{$candidate->age_max}}</p>
                                                @endif
                                            @endif
                                            <p class="mb-3 p-size"><b>Employment Status: </b> 
                                            @if($job_info->emp_status == 0)
                                            Full time
                                            @endif
                                            @if($job_info->emp_status == 1)
                                            Half time
                                            @endif
                                            </p>
                                            @if($job_sidebar->short_experience != 0)
                                            <p class="mb-3 p-size"><b>Experience:</b> At least {{$job_sidebar->short_experience}}
                                                @if($job_sidebar->short_experience > 1) 
                                                    years
                                                @else 
                                                    year 
                                                @endif</p>
                                            @endif
                                            @if(!empty($job_cat->title))
                                            <p class="mb-3 p-size"><b>Job Category:</b> {{$job_cat->title}}</p>
                                            @endif
                                            @if(!empty($more_jobs->location))
                                            <p class="mb-3 p-size"><b>Job Location:</b> {{$more_jobs->location}}</p>
                                            @endif
                                            
                                            @if(!empty($all_status->salary) && $all_status->salary == 1 )
                                            @if(!empty($more_jobs->min_salary) && !empty($more_jobs->max_salary))
                                        
                                            <p class="mb-3 p-size"><b>Salary:</b> 
                                            @if($more_jobs->salary != 4)
                                                        Tk. {{$more_jobs->min_salary}} - Tk. {{$more_jobs->max_salary}}
                                                    @else
                                                        Negotiable
                                                    @endif
                                                    @if($more_jobs->salary == 0 )
                                                    (Monthly)
                                                    @endif

                                                    @if($more_jobs->salary == 1 )
                                                    (Daily)
                                                    @endif

                                                    @if($more_jobs->salary == 2 )
                                                    (Yearly)
                                                    @endif

                                                    @if($more_jobs->salary == 3 )
                                                    (Hourly)
                                                    @endif
                                            </p>
                                            @endif
                                            @endif
                                            @if(!empty($deadline))
                                            <p class="mb-3 p-size"><b>Application Deadline:</b> <?php $d = strtotime($deadline); echo  date(' jS F , Y', $d);?></p>
                                            @endif
                                            </div>
                                            </div>
                                        </div>
                                     </div>       
                                     <br><br>  
                                    <div class="row">
                                       <div class="col-lg-10 mx-auto text-center">
                                            <p class="text-dark  text-center"><b>Read Before Apply</b></p>
                                            <p class="text-secondary mt-4 border-top"><br><span class="text-center">{!!$job_info->instruction!!}</span></p><br>
                                            <h6 class="text-secondary text-center mt-4 mb-5"><b>Apply Procedures</b></h6>
                                            @if(Auth::user() == '')
                                            <a href="/login" class="btn site-button btn-success">Login to Apply This Job</a>
                                            @else
                                                <?php
                                                $id=Auth::user()->id; 
                                                $applied = DB::table('applied_jobs')
                                                ->where('job_id', $job_sidebar->job_id)
                                                ->where('user_id', $id)
                                                ->first();
                                                ?>
                                                @if(Auth::user()->user_role == 2)
                                                    @if($applied)
                                                        <span class="site-button bg-secondary text-white">Applied</span>
                                                    @else
                                                    <form action="{{route('job.apply',[ 'job_id' => $job_sidebar->job_id, 'user_id' => $id])}}" method="post">
                                                    @csrf
                                                    <button class="btn btn-success site-button border-bottom">Apply Online</button>
                                                    </form>
                                                    @endif
                                                @else
                                                    <span class="site-button bg-secondary site-button text-white">You can not apply for the job</span>
                                                @endif
                                                
                                            @endif
                                          <br><hr><br><br>
                                          <p class="text-dark mb-3"><b>Email</b></p>
                                          @if(!empty($company_email))
                                          <p class="text-secondary mb-3">Send your CV to <b class="text-dark">{{$company_email}}</b></p>
                                          @endif
                                          @if(!empty($deadline))
                                          <p class="text-secondary mb-3">Application Deadline: <?php $d = strtotime($deadline); echo  date(' jS F , Y', $d);?></p>
                                          @endif
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                   
                                    @if(!empty($all_status->company_name) && $all_status->company_name == 1 )
                                    <div class="row">
                                       
                                        <div class="col-lg-12 border-top">
                                            <h6 class="text-dark mb-3 mt-2 com-info"><b>Company Information</b></h6>

                                            @if(!empty($company_alt_name))
                                                <p class="text-secondary mb-2 p-size">{{$company_alt_name}}</p>
                                            @else
                                                <p class="text-secondary mb-2 p-size">{{$company_info->name}}</p>
                                            @endif

                                            @if($all_status->company_addr == 1 )
                                            @if(!empty($company_info->address))
                                            <p class="text-secondary mb-2 p-size">{{$company_info->address}}</p>
                                            @endif
                                            @endif
                                            @if(!empty($company_info->url))
                                            <p class="text-secondary mb-2 p-size">Web: {{$company_info->url}}</p>
                                            @endif
                                            @if(!empty($company_info->business))
                                            <p class="text-secondary mb-2 p-size">Business: {{$company_info->business}}
                                            </p>
                                            @endif
                                        </div>
                                       
                                    </div>
                                    @else
                                    @endif
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mt-2">
                                        <form action="{{route('job-publish',$job_info->id)}}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn g-tax-bg text-white">
                                            @if($job_info->status == 2)
                                                Publish Job
                                            @else
                                                Save Job
                                            @endif
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

@endsection
