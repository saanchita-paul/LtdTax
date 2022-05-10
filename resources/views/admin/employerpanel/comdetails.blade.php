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
          <h4 class="card-title">All Company Details</h4>
          <div class="table-responsive">
            <table id="order-listing" class="table emm_datatable">
              <thead>
                <tr>
                  <th>#SL</th>
                  <th class="text-center">Logo</th>
                  <th>Company Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($cominfo as $com)
                <tr>
                  <td>{{$no++}}</td>
                  <td class="text-center">@if($com->logo) <img src="{{asset('uploads/cominfo/'.$com->logo)}}" alt="{{$com->name}}" style="width:80px!important;height:auto!important;border-radius:unset!important;"> @endif</td>
                  <td>{{$com->name}}</td>
                  <td>
                    <a class="btn btn-success p-1 mt-1" href="{{route('cominfo.edit',[$com->id])}}"><span title="Edit company" class="mdi mdi-pencil"></span></a>
                    <a class="btn btn-danger p-1 mt-1" onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('cominfo.delete',[$com->id])}}"><span title="Delete company"  class="mdi mdi-delete"></span></a>
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