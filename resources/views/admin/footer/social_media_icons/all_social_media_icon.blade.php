
@extends('admin')
@section('content') 
<head>
</head>
<style>
label.btn.btn-success.toggle-on {
    padding: 8px;
}
label.btn.btn-danger.active.toggle-off {
    padding: 8px;
}
.btn-danger:not(:disabled):not(.disabled):active, .btn-danger:not(:disabled):not(.disabled).active, .show > .btn-danger.dropdown-toggle {
    color: #fff;
    background-color: #f76258;
    border-color: #ff2618;
}
.btn-success:not(:disabled):not(.disabled):active, .btn-success:not(:disabled):not(.disabled).active, .show > .btn-success.dropdown-toggle {
    color: #fff;
    background-color: #42d895;
    border-color: #129f6e;
}
</style>
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
          <h4 class="card-title">All Social Media Icons</h4>
          <a href="{{route('footer.social-media-icon.add')}}" class="btn btn-primary mb-4 float-right p-2"><span class="mdi mdi-plus"></span>Create New Icon</a>
          <div class="table-responsive">
            <table id="order-listing" class="table emm_datatable">
              <thead>
                <tr>
                  <th>#SL</th>
                  <th>Icon</th>
                  <th>Title</th>
                  <th>Url</th>
                  <th class="text-center">Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($social as $sm)
                <tr>
                  <td>{{$no++}}</td>
                  <td><i class="{{$sm->icon_class}}"></i></td>
                  <td>{{$sm->title}}</td>
                  <td title="{{$sm->url}}">{{\Illuminate\Support\Str::limit($sm->url, 40, $end='...')}}</td>
                  <td class="text-center">
                    <input data-id="{{$sm->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $sm->status ? 'checked' : '' }}>
                  </td> 
                  <td>
                    <a class="btn btn-success p-1 mt-1" href="{{route('footer.social-media-icon.edit',[$sm->id])}}"><span title="Edit icon" class="mdi mdi-pencil"></span></a>
                    <a class="btn btn-danger p-1 mt-1" onClick="return confirm('Are you sure you want to Destroy this data permanently?')"  href="{{route('footer.social-media-icon.delete',[$sm->id])}}"><span title="Delete icon"  class="mdi mdi-delete"></span></a>
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












































