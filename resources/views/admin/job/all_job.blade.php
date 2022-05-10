@extends('admin')

@section('content')
<div class="content-wrapper">
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close"
                data-dismiss="alert">&times;</button>
            <strong> {{ session()->get('success') }} </strong>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="suc"></p>
                    <h4 class="card-title">Job List</h4>
                    <a href="{{URL('/admin/job/add')}}" class="btn btn-primary mb-4 float-right p-2"><span class="mdi mdi-plus"></span>Post New Job</a>
                    <div class="table-responsive">
                        <table id="order-listing" class="table emm_datatable">
                            <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th class="">Title</th>
                                    <th class="text-center">Category</th>
                                    <th class="text-center">Applications</th>
                                    <th class="text-center">Vacancy</th>
                                    <th class="text-center">Deadine</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($job as $jo)
                                <tr>
                                    <?php $application =  App\Models\AppliedJob::where('job_id',$jo->id)->get(); ?>
                                    <td>{{$no++}}</td>
                                    <td>
                                    @if($jo->status == 0)
                                    <button title="{{$jo->title}}" class="shadow-none bg-transparent border-0 text-danger" onclick="wow()">{{\Illuminate\Support\Str::limit($jo->title, 30, $end='...')}}</button>
                                    @endif
                                    @if($jo->status == 1)
                                    <a title="{{$jo->title}}" href="{{route('list.job-applicants',$jo->id)}}" class="text-dark"><i class="mdi mdi-eye"></i> {{\Illuminate\Support\Str::limit($jo->title, 30, $end='...')}}</a>
                                    @endif
                                    </td>
                                    <td>
                                        @if($jo->hot_job == 0)
                                            Category Job
                                        @else
                                            Hot Job
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $application->count()}}</td>
                                    <td class="text-center">{{$jo->vacancy}}</td>
                                    <td>{{$jo->deadline}}</td>
                                    <td>
                                    <select  name="o_status" onchange="jobPostStatus(this,<?php echo $jo->id?>)" class="">
                                    <option value="0" {{ $jo->status == 0 ? 'selected' : '' }}>Pending</option>
                                    <option value="1" {{ $jo->status == 1 ? 'selected' : '' }}>Approved</option>
                                    </select>
                                    </td>
                                    <td>
                                       <a class="btn btn-success p-1 mt-1" href="{{route('job.edit',[$jo->id])}}"><span title="Edit job" class="mdi mdi-pencil"></span></a>
                                        <a class="btn btn-danger p-1 mt-1" onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('job.delete',[$jo->id])}}"><span title="Delete job"  class="mdi mdi-delete"></span></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>


    </div>
</div>
<script>
function jobPostStatus(val,id) {
    let i = val.value;
    $.ajax({
      url: "{{url('/admin/job/post/status/')}}/"+id+"/"+i, 
      type: 'GET', 
      dataType: "json",
      success: function(data){
       $('.suc').html('<p class="alert alert-success">Job Post Status Changed Successfully</p>');
       setTimeout(function(){
        $('.suc').html('');
        }, 3000);
     }
   });
  }
</script>
<script>
function wow(){
alert('No admin did not approved the post yet.')
}
</script>
@endsection
