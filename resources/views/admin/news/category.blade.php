@extends('admin')
@section('content') 
<div class="content-wrapper">
  @if($errors->any())
  <div class="alert alert-warning" role="alert">
      <strong>Warning! </strong> 
      @if($errors->count() == 1)
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
  @if(session()->has('success'))
      <div class="alert alert-success" role="alert">
          {{ session()->get('success') }}
      </div>
  @endif
  <div class="row">
    <div class="col-md-5 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Add Category & Subcategory</h4>
          <form class="forms-sample" action="{{route('news.cat_store')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              <label for="name">Title <span class="required-icon">*</span></label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Enter Title">
          </div>
          <div class="form-group">
              <label for="parent_id">Parent Category</label>
              <select class="form-control" name="parent_id" id="parent_id">
              <option value="">Select Parent Category</option>
              @foreach($parent_cat as $par_cat)
              <option value="{{$par_cat->id}}">{{$par_cat->name}}</option>
              @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="description">Content</label> 
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
                  <th>Title</th>
                  <th>Parent</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($news_cat as $ncat)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$ncat->name}}</td>
                  <td>@if(!empty($ncat->parent_id)){{$ncat->nwcat['name']}} @endif</td>
                  <td class="text-center">
                    <a class="btn btn-danger p-1 mt-1" onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('news.cat_delete',[$ncat->id])}}"><span title="Delete category"  class="mdi mdi-delete"></span></a>
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