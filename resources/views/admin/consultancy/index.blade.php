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
          <h4 class="card-title">All Consultancy</h4>
          <a href="{{URL('/admin/consultancy/add')}}" class="btn btn-primary mb-4 float-right p-2"><span class="mdi mdi-plus"></span>Add New Consultancy</a>
          <div class="table-responsive">
            <table id="order-listing" class="table emm_datatable">
              <thead>
                <tr>
                  <th>#SL</th>
                  <th>Title</th>
                  <th style="width:150px!important;">Short Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($consult as $ct)
                <tr>
                  <td>{{$no++}}</td>
                  <td title="{{$ct->title}}">{{\Illuminate\Support\Str::limit($ct->title, 30, $end='...')}}</td>
                  <td title="{{$ct->short_description}}">{!! \Illuminate\Support\Str::limit( $ct->short_description , 50, $end='...'); !!}</td>
                  <td>
                    <a class="btn btn-success p-1 mt-1" href="{{route('consult.edit',[$ct->id])}}"><span title="Edit consultancy" class="mdi mdi-pencil"></span></a>
                    <a class="btn btn-danger p-1 mt-1" onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('consult.delete',[$ct->id])}}"><span title="Delete consultancy"  class="mdi mdi-delete"></span></a>
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