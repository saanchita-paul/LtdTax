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
  @if(teamCount() > 0)
    <script>window.location.href="/admin/team"</script>
  @endif
  <div class="row">
    <div class="col-md-12  grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h5 class="font-weight-bold mb-4">Add Team</h5>
          <form role="form" class="forms-sample" action="{{route('team.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="title">Title <span class="required-icon">*</span> </label>
              <input type="text" required="" class="form-control" value="{{old('title')}}" id="title" name="title" placeholder="Please enter title">
              @error('title')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="description">Description <span class="required-icon">*</span></label>
              <textarea id="" required="" class="form-control" value="{{old('description')}}" name="description"  rows="5" cols="50"></textarea>
              @error('description')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="team_img"> Image <span class="required-icon">*</span></label>
              <input type="file" required="" name="team_img" class="dropify" data-height="70">
              @error('team_img')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <button type="submit" class="btn btn-success mr-2">Add team</button>
            <button class="btn btn-light">Cancel</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection