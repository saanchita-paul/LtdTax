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
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h5 class="font-weight-bold mb-4">Edit Social Media Icon</h5>
          <form role="form" class="forms-sample" action="{{route('footer.social-media-icon.update',[$social->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="title">Title <span class="required-icon">*</span></label>
              <input type="text" required="" class="form-control" id="title" name="title" value="{{$social->title ?? old('title')}}" placeholder="Please enter title"> 
              @error('title')
                <small class="error text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="url">Icon Class</label>
              <select class="select-icon" required="" name="icon_class" id="icon_class" style="width:100%">
                  <?php
                    $icon_facebook ='fa fa-facebook';
                    $icon_youtube = 'fa fa-youtube-play';
                    $icon_linkedin ='fa fa-linkedin';
                    $icon_instagram ='fa fa-instagram';
                    $icon_twitter ='fa fa-twitter';
                  ?>
                  <option data-icon="fa fa-facebook" value="fa fa-facebook" {{ $icon_facebook == $social->icon_class ? 'selected': ''}}>Facebook</option>
                  <option data-icon="fa fa-youtube-play" value="fa fa-youtube-play" {{$icon_youtube == $social->icon_class ? 'selected': ''}}>Youtube</option>
                  <option data-icon="fa fa-linkedin" value="fa fa-linkedin" {{$icon_linkedin == $social->icon_class ? 'selected': ''}}>Linkedin</option>
                  <option data-icon="fa fa-instagram" value="fa fa-instagram" {{$icon_instagram == $social->icon_class ? 'selected': ''}}>Instagram</option>
                  <option data-icon="fa fa-twitter" value="fa fa-twitter" {{$icon_twitter == $social->icon_class ? 'selected': ''}}>Twitter</option>
              </select>
              @error('icon_class')
                <small class="error text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="url">Url</label>
              <input type="url" class="form-control" id="url" name="url" value="{{$social->url ?? old('url')}}" placeholder="Please enter title">
              @error('url')
                <small class="error text-danger">{{ $message }}</small>
              @enderror 
            </div>
            <button type="submit" class="btn btn-success mr-2">Update</button>
            <a href="/dashboard" class="btn btn-light">Cancel</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection