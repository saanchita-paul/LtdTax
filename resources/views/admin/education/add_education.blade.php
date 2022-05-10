@extends('admin')
@section('content') 
<div class="content-wrapper">
  @if($errors->any())
    <div class="alert alert-warning" role="alert">
        <strong>Warning!</strong>
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
    <div class="col-md-12 mx-auto grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h5 class="mb-4 font-weight-bold">Add Education</h5>
          <form role="form" class="forms-sample" action="{{route('education.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="parent_id">Level of Education <span class="text-danger">*</span></label>
            <select name="parent_id" required="" id="parent_id" class="form-control">
                <option value="">--Select Education Level--</option>
                @foreach($parent_id as $par)
                <option value="{{$par->id}}">{{$par->name}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
              <label for="name">Exam Degree <span class="text-danger">*</span></label>
              <input type="text" required="" class="form-control" id="name" name="name" placeholder="Please enter exam degree">
          </div>
          <button type="submit" class="btn btn-success mr-2">Add Education</button>
          <a href="/dashboard" class="btn btn-light">Cancel</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection