@extends('admin')

@section('content') 
<div class="content-wrapper">
  @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <button type="button" class="close rounded-right" data-dismiss="alert">&times;</button>
        <strong> {{ session()->get('success') }} </strong>
    </div>
  @endif
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">All packages</h4>
          <a href="{{URL('/admin/publication/the-taxman-publication/package/add')}}" class="btn btn-primary mb-4 float-right p-2"><span class="mdi mdi-plus"></span>Add New Package</a>
          <div class="table-responsive">
            <table id="order-listing" class="table emm_datatable">
              <thead>
                <tr>
                  <th>#SL</th>
                  <th>Package Image</th>
                  <th>Title</th>
                  <th>Price</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($package as $key=>$pk)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>@if($pk->package_img) <img src="{{asset('uploads/publication/'.$pk->package_img)}}" alt="{{$pk->name}}" style="width:80px!important;height:auto!important;border-radius:unset!important;"> @endif</td>
                  <td title="{{$pk->package_name}}">{{\Illuminate\Support\Str::limit($pk->package_name, 40, $end='...')}}</td>
                  <td>@if($pk->price){{$pk->price}}@endif</td>
                  <td>
                    <a class="btn btn-success p-1 mt-1" href="{{route('edit-package',[$pk->id])}}"><span title="Edit package" class="mdi mdi-pencil"></span></a>
                    <a class="btn btn-danger p-1 mt-1" onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('delete-package',[$pk->id])}}"><span title="Delete package"  class="mdi mdi-delete"></span></a>
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