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
          <h4 class="card-title">All News</h4>
          <a href="{{URL('/admin/news/add')}}" class="btn btn-primary mb-4 float-right p-2"><span class="mdi mdi-plus"></span>Add New News</a>
          <div class="table-responsive">
            <table id="order-listing" class="table emm_datatable">
              <thead>
                <tr>
                  <th>#SL</th>
                  <th>Feature Image</th>
                  <th>Title</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($news as $nw)
                <tr>
                  <td>{{$no++}}</td>
                  <td>@if($nw->feature_img) <img src="{{asset('uploads/news/'.$nw->feature_img)}}" alt="{{$nw->name}}" style="width:80px!important;height:auto!important;border-radius:unset!important;"> @endif</td>
                  <td title="{{$nw->name}}">{{\Illuminate\Support\Str::limit($nw->name, 55, $end='...')}}</td>
                  <td>
                    <a class="btn btn-success p-1 mt-1" href="{{route('news.edit',[$nw->id])}}"><span title="Edit news" class="mdi mdi-pencil"></span></a>
                    <a class="btn btn-danger p-1 mt-1" onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('news.delete',[$nw->id])}}"><span title="Delete news"  class="mdi mdi-delete"></span></a>
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