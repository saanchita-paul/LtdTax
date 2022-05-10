@extends('master')

@section('content')
<style>
.job-show-title {
    border-bottom: none!important;
    padding-bottom:none!important;
    margin-top: -31px;
}
.filter-menu .panel-group .panel-title:hover {
    color: #ffffff;
    text-decoration: none;
    background: #005a13;
}
.job-show-content{
    margin: 12px 0px;
    padding: 20px 20px;
    border: 1px solid #E9E9E9;
    background:#EEEEEE;
    border-radius:4px;
    box-shadow:0px 0px 3px gray;
}
.color-tax{
    color:#005A13;
}
.br-rad{
    border-top-left-radius:4px;
    border-top-right-radius:4px;
}
.v-det{margin-top:20px;}
.pagination{
    margin-top:0!important;
    float:right!important;
}
.page-item.active .page-link {
    z-index: 1;
    color: #fff;
    background-color: #6c757d;
    border-color: #6c757d;
}
.page-link:hover {
    color: black;
}

.page-link{
    color:black;
    line-height:.50;
}
.txt-limit{
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 1; /* number of lines to show */
    -webkit-box-orient: vertical;
}
.panel-heading{
margin-top:1px;
}
.filter-menu .panel-title {
    color: #333333;
    font-weight: unset;
    display: block;
    padding: 10px;
}
label {
    font-weight: unset;
    margin-bottom: 10px;
    font-size:14px;
}
input:focus {
    outline: none !important;
}
.f-15{
    font-size:15px;
}
.ui-slider-range {
    top: 0;
    height: 100%;
    width:100%;
}
.loc-height{
    max-height:200px;
    overflow-y:scroll;
}
#filter_value{
    display:flex;
    flex-wrap:wrap;
}
.t_all {
    margin-right: 6px;
}
</style>
<main>
    <!-- search-area -->
    <!-- <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="form">
                        <div class="form-item">
                            <input type="password" id="password" autocomplete="on" required>
                            <label for="password">Job Title, Keywords</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form">
                        <div class="form-item">
                            <input type="password" id="password" autocomplete="on" required>
                            <label for="password">City</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="selection-area">
                        <div class="select-dropdown">
                            <select>
                                <option value="Option 1">Select Organization</option>
                                <option value="Option 2">Construction</option>
                                <option value="Option 3">Employer</option>
                                <option value="Option 3">Financial Career</option>
                                <option value="Option 3">Information Technolory</option>
                                <option value="Option 3">Marketing</option>
                                <option value="Option 3">Quality Check</option>
                                <option value="Option 3">Real Estate</option>
                                <option value="Option 3">Seles</option>
                                <option value="Option 3">Supporting</option>
                                <option value="Option 3">Teaching</option>
                            </select>
                        </div>
                        <div class="job-search-btn">
                            <a class="btn btn-primary" href=""> Find Job</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="job-filter-list mt-4">
        <div class="primary">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 pl-2 pr-2">
                        @include('pages.include.job-filter-sidebar')
                    </div>
                    <div class="col-lg-8 pl-2 pr-2">
                        <div class="job-bx-title mt-10">
                            <div class="job-show-title">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <!-- <h5>2269 Jobs Found</h5> -->
                                    </div>
                                    <div class="col-lg-6">
                                        <!-- <div class="float-right d-flex align-items-center">
                                            <span class="select-title pr-3">Sort by freshness</span>
                                            <div class=" list pt-1 pr-3">
                                                <a href="" class="pl-2"><i
                                                        class="fa fa-th-list"></i></a>
                                                <a href="" class="pl-2"><i class="fa fa-th"></i></a>
                                            </div>
                                            <select class="bs-select-hidden">
                                                <option>Last 2 Months</option>
                                                <option>Last Months</option>
                                                <option>Last Weeks</option>
                                                <option>Last 3 Days</option>
                                            </select>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div id="filter_value">
                                        
                                    </div>
                                </div>
                            </div>
                            <div id="jobfilter">
                            <?php $all_location=App\Models\Location::where('status',1)->get();?>
                            <h6 class="text-center bg-secondary text-white p-2 v-det rounded">Click the job title to view details</h6>
                           
                            @foreach($jobs as $job)
                            <div class="job-show-content">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="job-title">
                                            @if(!empty($job->title))<h6 class="font-weight-bold"><a href="{{url('jobdetails/'.$job->id.'/'.$job->slug)}}" class="color-tax">{!!$job->title!!}</a> </h6>@endif
                                        </div>
                                        <?php $company = App\Models\CompanyDetailInfo::where('status',1)->where('id',$job->company_id)->get();
                                            $all_status = App\Models\ComInfoMatchingVisibility::where('job_id',$job->id)->get();
                                            $company_alt_name = App\Models\CompanyAltName::where('job_id', $job->id)->get();
                                                      
                                        ?>
                                        @foreach($company as $com)
                                        <div class="organization-nm">
                                        @foreach($all_status as $status)
                                            @if(!empty($status->company_name) && $status->company_name == 1 )
                                                @if(!empty($com->name))
                                                    @foreach($company_alt_name as $com_alt_name) 
                                                        @if(!empty($com_alt_name->alt_name))
                                                            <h6 class="font-weight-bold">{{$com_alt_name->alt_name}}</h6>
                                                        @else
                                                            <h6 class="font-weight-bold">{{$com->name}}</h6>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endif
                                        @endforeach
                                        </div>
                                        <div class="job-location">
                                            @foreach($all_location as $loc)
                                                @if($com->district_id == $loc->id)
                                                    @if(!empty($com->district_id))
                                                    <h6><i style="font-size:14px;" class="fa fa-map-marker" aria-hidden="true"></i> {{ $loc->name }} </h6>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                        @endforeach
                                        <div class="job-time txt-limit">
                                        <?php $cq = App\Models\CandidateQualification::where('status',1)->where('job_id',$job->id)->get();?>
                                            @if($cq->count()  > 0) 
                                                <h6><i class="fa fa-graduation-cap" style="font-size:14px;" aria-hidden="true"></i></h6> 
                                            @endif
                                            @foreach($degree as $deg)
                                                @foreach( $cq as $c)
                                                    @if ($job->id == $c->job_id) 
                                                        @if($deg->id == $c->degree_id )
                                                            {{$deg->name}}, 
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endforeach          
                                        </div>
                                        <div class="job-ex">
                                            <?php $cinfo = App\Models\CandidateInfo::where('status',1)->where('job_id',$job->id)->get();?>
                                            @foreach($cinfo as $candidate_info)
                                                @if(!empty($candidate_info->short_experience))
                                                    <h6> <i style="font-size:14px;" class="fa fa-briefcase" aria-hidden="true"></i> 
                                                        At least {{$candidate_info->short_experience}}
                                                        @if($candidate_info->short_experience > 1) 
                                                            years
                                                        @else 
                                                            year 
                                                        @endif
                                                    </h6>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="job-ex">
                                        <?php $salary = App\Models\MoreJob::where('status',1)->where('job_id',$job->id)->get();?>
                                        @foreach($salary as $sal)
                                            @if($sal->salary != 4)
                                            @if(!empty($sal->min_salary) && !empty($sal->max_salary))
                                            <h6> <i style="font-size:14px;" class="fa fa-money"></i> Tk. {{$sal->min_salary}} - Tk. {{$sal->max_salary}}
                                                @if($sal->salary == 0)
                                                    (Monthly)
                                                @endif
                                                @if($sal->salary == 1)
                                                    (Daily)
                                                @endif
                                                @if($sal->salary == 2)
                                                    (Yearly)
                                                @endif
                                                @if($sal->salary == 3)
                                                    (Hourly)
                                                @endif
                                            </h6>                
                                            @endif
                                            @endif
                                        @endforeach
                                        </div>
                                    </div>
                                    <div class="col-lg-5 d-flex align-items-end justify-content-end">
                                        <div class="job-deatline ">
                                        @if(!empty($job->deadline))
                                         <h6 class="m-0"><i style="font-size:14px;" class="fa fa-calendar" aria-hidden="true"></i> Deadline :
                                             <?php $deadline =strtotime($job->deadline); echo  date(' jS F , Y', $deadline);?></h6>@endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <p>{{$jobs->links()}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 pl-2 pr-2">
                        @include('pages.include.ads')
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
