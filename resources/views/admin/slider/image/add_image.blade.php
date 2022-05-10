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
    <div class="col-md-12  grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h5 class="mb-4 font-weight-bold">Add Slider Image</h5>
          <form role="form" class="forms-sample" action="{{route('slider.store-image')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <div class="row">
                <div class="col-lg-6">
                  <label for="title">Image Title</label>
                  <input type="text" class="form-control" value="{{old('title')}}" id="title" name="title" placeholder="Please enter title">
                  @error('title')
                    <small class="text-danger">{{$message}}</small>
                  @enderror
                </div>
                <div class="col-lg-6">
                  <label for="url">Url</label>
                  <input type="text" class="form-control" value="{{old('url')}}" id="url" name="url" placeholder="Please enter url">
                  @error('url')
                    <small class="text-danger">{{$message}}</small>
                  @enderror
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="slider_img">Image <span class="text-danger">*</span></label>
              <input type="file" required name="slider_img" id="slider_img" class="dropify" data-height="70">
              @error('slider_img')
                <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
            <button type="submit" class="btn btn-success mr-2">Add Image</button>
            <button class="btn btn-light">Cancel</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection