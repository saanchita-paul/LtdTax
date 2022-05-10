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
        <h5 class="font-weight-bold mb-4">Edit Team</h5>
          <form role="form" class="forms-sample" action="{{route('team.update',[$team->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="title">Title <span class="required-icon">*</span></label>
              <input type="text" required="" class="form-control" id="title" name="title" value="{{$team->title ?? old('title') }}" placeholder="Please enter title"> 
            </div>
            <div class="form-group">
              <label for="description">Description <span class="required-icon">*</span></label>
              <textarea id="" required="" class="form-control" name="description"  rows="2" cols="50">{{$team->description ?? old('description') }}</textarea>
            </div>
            <div class="form-group">
              <label for="team_img"> Image <span class="required-icon">*</span> @if($team->team_img)<img src="{{asset('uploads/team/'.$team->team_img)}}" alt="{{$team->title}}" width="80"> @endif</label>
              <input type="file" name="team_img" class="dropify" data-height="70">
              <input type="hidden" name="hidden_image" value="{{$team->team_img}}">
            </div>
            <button type="submit" class="btn btn-success mr-2">Update team</button>
            <button class="btn btn-light">Cancel</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection