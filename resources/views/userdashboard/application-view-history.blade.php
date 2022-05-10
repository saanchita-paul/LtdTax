<?php include_once("web/common/config.php");?>
<?php echo $sCSSBootStrap;
echo $sCSSFontAwesome;
echo $sCSSEMM;
echo $sCSSEkko;
echo $sCSSAnimate; ?>
@extends('userdashboard.include.user-dashbord-master')
@section('user-content')
<style>
    .resume-form-input-wrapper {
        padding: unset;
    }
</style>
<div class="resume-form-input-wrapper">
    <h5 class="bg-dark text-white p-4"><i class="fa fa-file"></i> Employer Activities ({{$job->count()}})</h5>
    <div class="row p-4">
    <div class="col-lg-12 p-4">
       @if($job->count() > 0)
            <table id="application-history" class="table table-border">
            <thead>
            <tr>
                <th class="text-left">Name of The Company</th>
                <th>Job Title</th>
                <th>View Status</th>
                <th>Application Deadline</th>
            </tr>
            </thead>
        
            <tbody>
            @foreach($job as $j)
            <?php
            $more_jobs =App\Models\MoreJob::where('job_id',$j->job_id)->get();
            $company_info = App\Models\CompanyDetailInfo::where('id',$j->company_id)->get();
            ?>
            <tr>
                @foreach($company_info as $com)
                <td>{{$com->name}}</td>
                @endforeach
                <td><a href="{{url('jobdetails/'.$j->job_id.'/'.$j->slug)}}">{{$j->title}}</a></td>
               @if($j->view_status == 1)
               <td>Viewed</td>
               @else
               <td>Not viewed</td>
               @endif
                <td>{{$j->deadline}}</td>
            </tr>
            @endforeach
            </tbody>
            </table>
    </div>
    @else
    <div class="col-lg-12">
            <div class="p-4 rounded border ml-1 mr-1 mb-2 mt-2">
                <h5 class="">No Job Found</h5>
            </div>
        </div>
    @endif
    </div>
</div>
<br>
@endsection