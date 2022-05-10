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

h1.emph1 {
    text-align: center;
    margin: 0 auto;
    display: block;
}
.job-mtop{
    margin-top:20px;
}
.table-bordered th, td{
    font-size:14px;
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
               
                    <div class="content-wrapper">
                        @if(session()->has('success'))
                        <div class="alert alert-success mt-4" role="alert">
                            {{ session()->get('success') }}
                        </div>
                        @endif
                        <div class="row">
                            <h5 class="font-weight-700 pull-left job-mtop mb-3 ml-3">Job List</h5>
                            <div class="col-md-12 grid-margin stretch-card">
                                
                                <div class="card">
                                    <div class="card-body">
                                    @if(!empty($job) && $job->count() > 0)

                                        <div class="table-responsive">
                                            <table id="order-listing" class="table emm_datatable">
                                                <thead>
                                                    <tr>
                                                        <th>#SL</th>
                                                        <th class="">Title</th>
                                                        <th class="text-center">Category</th>
                                                        <th class="text-center">Applications</th>
                                                        <th class="text-center">Viewed Status</th>
                                                        <th class="text-center">Vacancy</th>
                                                        <th class="text-center">Deadine</th>
                                                        <th class="text-center">Status</th>
                                                        <th class="text-center">Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($job as $jo)
                                                    <tr>
                                                        <?php
                                                            $application =  App\Models\AppliedJob::where('job_id',$jo->id)->get();
                                                            $viewed_resume = DB::table('resume_view_statuses')
                                                            ->select('users.*')
                                                            ->leftJoin('applied_jobs', 'resume_view_statuses.application_id', '=', 'applied_jobs.id')
                                                            ->leftJoin('users', 'applied_jobs.user_id', '=', 'users.id')
                                                            ->where('resume_view_statuses.view_status', 1)
                                                            ->where('applied_jobs.job_id',$jo->id)
                                                            ->where('resume_view_statuses.employer_id',Auth::user()->id)
                                                            ->get();
                                                        ?>
                                                        <td>{{$no++}}</td>
                                                        <td>
                                                        @if($jo->status == 0)
                                                        <button class="shadow-none bg-transparent border-0 p-0" onclick="wow()">{!!$jo->title!!}</button>
                                                        @endif
                                                        @if($jo->status == 1)
                                                        <a href="{{$jo->id}}/job_applicant_details/"><i class="fa fa-eye"></i> {!!$jo->title!!}</a>
                                                        @endif
                                                        @if($jo->status == 2)
                                                        <button class="shadow-none bg-transparent border-0 p-0" onclick="drafted()">{!!$jo->title!!}</button>
                                                        @endif
                                                        </td>
                                                        <td>
                                                        @if($jo->hot_job == 0)
                                                            Category Job
                                                        @else
                                                            Hot Job
                                                        @endif
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $application->count()}}
                                                        </td>
                                                        <td class="text-center">{{$viewed_resume->count()}} out of {{$application->count()}}</td>
                                                        <td class="text-center">{{$jo->vacancy}}</td>
                                                        <td class="text-center">{{$jo->deadline}}</td>
                                                        <td class="text-center">
                                                            @if($jo->status == 1)
                                                            <small class="bg-success p-2 text-white rounded">
                                                                Approved</small>
                                                            @endif
                                                            @if($jo->status == 2)
                                                            <small
                                                                class="bg-secondary p-2 text-white rounded">Drafted</small>
                                                            @endif
                                                            @if($jo->status == 0)
                                                            <small
                                                                class="bg-danger p-2 text-white rounded">Pending</small>
                                                            @endif
                                                        </td>
                                                        <td class="text-center">
                                                            <button class="p-0 vanish" title="Edit"><a
                                                            class="text-success"  href="{{route('employer.jobedit',[$jo->id])}}">
                                                            <i class="fa fa-edit"></i></button> &nbsp;
                                                            <button class="p-0 vanish"  title="Delete"><a class="text-white"
                                                            onClick="return confirm('Are you sure you want to Destroy this data permanently?')"
                                                            href="{{route('employer.jobdelete',[$jo->id])}}"><i
                                                            class="fa fa-trash text-danger"></i></a></button>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                  @else
                                                  <h5 class="text-center bg-secondary p-4 rounded mt-4 text-white">No Job Found.</h5>
                                                  @endif
                                                </tbody>
                                            </table>
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


    

</main>

<script>
function wow(){
alert('Admin did not approved the post yet.')
}
function drafted(){
alert('you did not publish the job yet.')
}
</script>
@endsection
