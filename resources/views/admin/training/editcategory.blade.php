@extends('admin')
@section('content') 
<div class="content-wrapper">
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
  @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
      {{ session()->get('success') }}
    </div>
  @endif
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h5 class="font-weight-bold mb-4">Edit Category</h5>
          <form class="forms-sample" action="{{route('trcat.update', $category->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title <span class="required-icon">*</span></label>
                <input type="text" class="form-control" value="@if(!empty($category->title)){{$category->title}}@else{{old('title')}}@endif" name="title" id="title" placeholder="Enter Title">
            </div>
            <div class="form-group">
                <label for="description">Description</label> 
                <textarea class="form-control" name="description" id="description" rows="2">@if(!empty($category->description)){{$category->description}}@else{{old('description')}}@endif</textarea>
            </div>
            <div class="form-group">
              <label>Category Image <p class="mt-2"><img src="{{asset('uploads/training/'.$category->cat_img)}}" alt="{{$category->title}}" width="80"></p></label>
              <input type="file" name="cat_img" class="dropify" data-height="70">
              <input type="hidden" name="hidden_image" value="{{$category->cat_img}}">
            </div>
            <button type="submit" class="btn btn-success mr-2">Update Category</button>
            <a href="/dashboard" class="btn btn-light">Cancel</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection