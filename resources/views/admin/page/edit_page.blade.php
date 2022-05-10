@extends('admin')
@section('content') 
<div class="content-wrapper">
  <div class="row">
    @if($errors->any())
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
    <div class="grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h5 class="mb-4 font-weight-bold">Edit Page</h5>
          <form role="form" class="forms-sample" action="{{route('page.update',[$page->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="name">Page Title</label>
              <input type="text" class="form-control" id="name" name="name" value="@if(!empty($page->name)){{$page->name}}@else{{old('name')}}@endif" placeholder="Please enter page title">
              @error('name')
                  <small class="text-danger">{{ $message }}</small>
              @enderror 
            </div>
            <div class="form-group">
              <label for="content">Content</label>
              <textarea class="form-control ckeditor" name="content"  rows="2" cols="50">@if(!empty($page->content)){{$page->content}}@else{{old('content')}}@endif</textarea>
              @error('content')
                  <small class="text-danger">{{ $message }}</small>
              @enderror 
            </div>
            <div class="form-group">
              <label for="page_img">Page Image @if(!empty($page->page_img))<img src="{{asset('uploads/page/'.$page->page_img)}}" alt="{{$page->name}}" width="80"> @endif</label>
              <input type="file" name="page_img" class="dropify" data-height="70">
              @error('page_img')
                  <small class="text-danger">{{ $message }}</small>
              @enderror 
              <input type="hidden" name="hidden_image" value="{{$page->page_img}}">
            </div>
            @if($page->id == 1)
              <div class="form-group">
                <label for="name">Founder Name</label>
                <input type="text" class="form-control" id="founder_name" name="founder_name" value="@if(!empty($founder_message->founder_name)){{$founder_message->founder_name}}@else{{old('founder_name')}}@endif" placeholder="Please enter founder name"> 
                @error('founder_name')
                  <small class="text-danger">{{ $message }}</small>
                @enderror    
              </div>
              <div class="form-group">
                <label for="page_img">Founder Image @if(!empty($founder_message->founder_img))<img src="{{asset('uploads/page/'.$founder_message->founder_img)}}" alt="{{$founder_message->founder_name}}" width="80"> @endif</label>
                <input type="file" name="founder_img" class="dropify" data-height="70">
                @error('fuonder_img')
                  <small class="text-danger">{{ $message }}</small>
                @enderror 
                <input type="hidden" name="hidden_image_founder" value="@if(!empty($founder_message->founder_img)){{$founder_message->founder_img}}@endif">
              </div>
            @endif
            <button type="submit" class="btn btn-success mr-2">Update Page</button>
              <a href="/dashboard" class="btn btn-light">Cancel</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection