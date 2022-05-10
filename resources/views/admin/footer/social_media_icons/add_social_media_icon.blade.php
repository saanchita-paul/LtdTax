@extends('admin')
@section('content') 
<style>
	select{
		font-family: fontAwesome
	}
</style>
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
  <div class="row">
    <div class="col-md-12  grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
        <h5 class="font-weight-bold mb-4">Add Social Media Icon</h5>
          <form role="form" class="forms-sample" action="{{route('footer.social-media-icon.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="title">Title <span class="required-icon">*</span> </label>
              <input type="text" required="" class="form-control" value="{{old('title')}}" id="title" name="title" placeholder="Please enter title"> 
              @error('title')
                <small class="error text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="url">Icon Class <span class="required-icon">*</span></label>
              <select class="select-icon" required="" name="icon_class" id="icon_class" style="width:100%">
                <option value="">Select icon class</option>
                <option data-icon="fa fa-facebook" value="fa fa-facebook">Facebook</option>
                <option data-icon="fa fa-youtube-play" value="fa fa-youtube-play">Youtube</option>
                <option data-icon="fa fa-linkedin" value="fa fa-linkedin">Linkedin</option>
                <option data-icon="fa fa-instagram" value="fa fa-instagram">Instagram</option>
                <option data-icon="fa fa-twitter" value="fa fa-twitter">Twitter</option>
              </select>
              @error('icon_class')
                <small class="error text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="url">Url</label>
              <input type="url" class="form-control" value="{{old('url')}}" id="url" name="url" placeholder="Please enter url">
              @error('url')
                <small class="error text-danger">{{ $message }}</small>
              @enderror
            </div>
            <button type="submit" class="btn btn-success mr-2">Add</button>
            <a href="/dashboard" class="btn btn-light">Cancel</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection