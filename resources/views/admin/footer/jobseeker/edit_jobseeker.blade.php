@extends('admin')
@section('content') 
<div class="content-wrapper">
  @if ($errors->any())
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
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
        <h5 class="font-weight-bold mb-4">Jobseeker - Edit Option</h5>
          <form role="form" class="forms-sample" action="{{route('footer.jobseeker.update',[$jobseeker->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="title">Title <span class="required-icon">*</span></label>
              <input type="text" required="" class="form-control" id="title" name="title" value="{{$jobseeker->title ?? old('title')}}" placeholder="Please enter title"> 
              @error('title')
              <small class="error text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="url">Url</label>
              <input type="url" class="form-control" id="url" name="url" value="{{$jobseeker->url ?? old('url') }}" placeholder="Please enter title"> 
              @error('url')
              <small class="error text-danger">{{ $message }}</small>
              @enderror
            </div>
            <button type="submit" class="btn btn-success mr-2">Update</button>
            <button class="btn btn-light">Cancel</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection