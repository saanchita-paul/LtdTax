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
          <h5 class="mb-4 font-weight-bold">Add Slider</h5>
          <form role="form" class="forms-sample" action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <div class="row">
                <div class="col-lg-6">
                  <label for="title">Slider Title <span class="required-icon">*</span></label>
                  <input required="" type="text" class="form-control" value="{{old('title')}}" id="title" name="title" placeholder="Please enter title">
                  @error('title')
                    <small class="text-danger">{{$message}}</small>
                  @enderror
                </div>
                <div class="col-lg-6">
                  <label for="status">Status <span class="required-icon">*</span></label>
                  <select required="" class="form-control form-control-lg" id="status" name="status">
                    <option value="" >Select Status</option>
                    <option value="1" >Enable</option>
                    <option value="0" >Disable</option>
                  </select>
                  @error('status')
                    <small class="text-danger">{{$message}}</small>
                  @enderror
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="slider_desc">Slider Description</label>
              <textarea type="text" class="form-control" rows="5" id="slider_desc" name="slider_desc" placeholder="Slider description">{{old('slider_desc')}}</textarea>
              @error('slider_desc')
                <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="select_slider_img">Select Slider Images <span class="text-danger">*</span></label>
              <select required="" class="form-control select_slider_img" id="select_slider_img" name="select_slider_img[]" multiple="multiple">
                @foreach($images as $image)
                  <option data-image="{{asset('uploads/slider/'.$image->slider_img)}}" value="{{$image->id}}">@if(!empty($image->title)){{ $image->title }}@else{{$image->slider_img}}@endif</option>
                @endforeach        
              </select> 
              @error('select_slider_img')
                <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
            <button type="submit" class="btn btn-success mr-2">Add Slider</button>
            <button class="btn btn-light">Cancel</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection