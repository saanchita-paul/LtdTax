@extends('admin')

@section('content') 
<div class="content-wrapper">
  @if(session()->has('success'))
  <div class="alert alert-success" role="alert">
  {{ session()->get('success') }}
  </div>
  @endif
  @if ($errors->any())
    <div class="alert alert-warning" role="alert">
      <strong>Warning! </strong> 
      @if ($errors->count() == 1)
        {{$errors->first()}}
      @else
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      @endif
    </div>
  @endif
  <div class="row">
    <div class="col-md-5 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Add Category</h4>
          <form class="forms-sample" action="{{route('trcat.store')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="title">Title <span class="required-icon">*</span></label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title">
          </div>
          <div class="form-group">
              <label for="description">Description</label> 
              <textarea class="form-control" name="description" id="description" rows="2"></textarea>
          </div>
          <div class="form-group">
            <label>Category Image</label>
            <input type="file" name="cat_img" class="dropify" data-height="70">
          </div>
          <button type="submit" class="btn btn-success mr-2">Add Category</button>
          <a href="/dashboard" class="btn btn-light">Cancel</a>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-7 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">All Category</h4>
          <div class="table-responsive">
            <table id="order-listing" class="table emm_datatable">
              <thead>
                <tr>
                  <th>#SL</th>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($categories as $cat)
                <tr>
                  <td>{{$no++}}</td>
                  <td>@if($cat->cat_img) <img src="{{asset('uploads/training/'.$cat->cat_img)}}" alt="{{$cat->title}}" style="width:80px!important;height:auto!important;border-radius:unset!important;"> @endif</td>
                  <td title="{{$cat->title}}">{{\Illuminate\Support\Str::limit($cat->title, 22, $end='...')}}</td>
                  <td>
                    <a class="btn btn-success p-1 mt-1" href="{{route('trcat.edit',[$cat->id])}}"><span title="Edit category" class="mdi mdi-pencil"></span></a>
                    <a class="btn btn-danger p-1 mt-1" onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('trcat.delete',[$cat->id])}}"><span title="Delete category"  class="mdi mdi-delete"></span></a>
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