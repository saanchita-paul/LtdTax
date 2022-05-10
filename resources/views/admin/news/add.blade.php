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
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h5 class="font-weight-bold mb-4">Add News</h5>
          <form class="forms-sample" action="{{route('news.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Title <span class="required-icon">*</span></label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Title">
            </div>
            <div class="form-group">
                <label for="cat_id">Category</label>
                <select class="multiple-cat" multiple="multiple" name="cat_id[]" id="cat_id" style="width:100%">
                <option value="">Select Category</option>
                @foreach($categories as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>
                @if ($cat->children)
                @foreach ($cat->children as $child)
                <option value="{{$child->id}}">-- {{$child->name}}</option>
                @endforeach
                @endif
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="short_desc">Short Description</label> 
                <textarea class="form-control" name="short_desc" id="short_desc" rows="2"></textarea>
            </div>
            <div class="form-group">
                <label for="description">Description</label> 
                <textarea class="form-control ckeditor" name="description" id="description" rows="2"></textarea>
            </div>
            <div class="form-group">
              <label for="feature_img"> Image</label>
              <input type="file" name="feature_img" class="dropify" data-height="70">
            </div>
            <button type="submit" class="btn btn-success mr-2">Add News</button>
            <a href="/dashboard" class="btn btn-light">Cancel</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection