
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
          <h4 class="card-title">All Pages</h4>
          <a href="{{URL('/admin/page/add')}}" class="btn btn-primary mb-4 float-right p-2"><span class="mdi mdi-plus"></span>Add New Page</a>
          <div class="table-responsive">
            <table id="order-listing" class="table emm_datatable">
              <thead>
                <tr>
                  <th>#SL</th>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($page as $pa)
                <tr>
                  <td>{{$no++}}</td>
                  <td>@if($pa->page_img)<img src="{{asset('uploads/page/'.$pa->page_img)}}" width="80">@endif</td>
                  <td>{{$pa->name}}</td>
                  <td>
                    @if ($pa->status == 1) <label class="badge badge-success">Active</label> @else <label class="badge badge-danger">Inactive</label> @endif
                  </td>
                  <td>
                    <a class="btn btn-success p-1 mt-1" href="{{route('page.edit',[$pa->id])}}"><span title="Edit page" class="mdi mdi-pencil"></span></a>
                    <a class="btn btn-danger p-1 mt-1" onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('page.delete',[$pa->id])}}"><span title="Delete page"  class="mdi mdi-delete"></span></a>
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












































