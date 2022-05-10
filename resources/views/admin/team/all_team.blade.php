
@extends('admin')
@section('content') 
<div class="content-wrapper">
  @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong> {{ session()->get('success') }} </strong>
    </div>
  @endif
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
        <h4 class="card-title">All team</h4>
        @if(teamCount() == 0)
          <a href="{{route('team.add')}}" class="btn btn-primary mb-4 float-right p-2"><span class="mdi mdi-plus"></span>Create Team</a>
        @else
        @endif
          <div class="table-responsive">
            <table id="order-listing" class="table emm_datatable">
              <thead>
                <tr>
                  <th>#SL</th>
                  <th>Title</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($team as $tea)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$tea->title}}</td>
                  <td>@if($tea->team_img)<img src="{{asset('uploads/team/'.$tea->team_img)}}" width="80">@endif</td>
                  <td>
                    <a class="btn btn-success p-1 mt-1" href="{{route('team.edit',[$tea->id])}}"><span title="Edit team" class="mdi mdi-pencil"></span></a>
                    <a class="btn btn-danger p-1 mt-1" onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('team.delete',[$tea->id])}}"><span title="Delete team"  class="mdi mdi-delete"></span></a>
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
@endsection












































