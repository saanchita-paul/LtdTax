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
          <h5 class="font-weight-bold mb-4">Add Thana</h5>
          <form role="form" class="forms-sample" action="{{route('location.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="name">Name <span class="text-danger">*</span> </label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Please enter first name">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea  class="form-control" name="description" rows="3" cols="50"></textarea>
            </div>
            <div class="form-group">
                <label for="district_id">District</label>
                <select name="district_id" id="district_id" class="form-control">
                    <option value="">Select District</option>
                    @foreach($district_id as $dis)
                    <option value="{{$dis->id}}">{{$dis->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success mr-2">Add Location</button>
            <a href="/dashboard" class="btn btn-light">Cancel</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection