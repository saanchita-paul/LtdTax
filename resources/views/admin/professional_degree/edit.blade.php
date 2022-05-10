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
  @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
      {{ session()->get('success') }}
    </div>
  @endif
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card mx-auto">
      <div class="card">
        <div class="card-body">
          <h5 class="font-weight-bold mb-4">Edit Professional Degree</h5>
          <form class="forms-sample" action="{{route('professionalDegree.update', $professional_degree->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="title">Title <span class="required-icon">*</span></label>
              <input type="text" required="" class="form-control" name="title" id="title" placeholder="Enter Professional Degree Title" value="{{$professional_degree->degree_title ?? old('title')}}">
            </div>              
            <button type="submit" class="btn btn-success mr-2">Update Professional Degree</button>
            <a href="/dashboard" class="btn btn-light">Cancel</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection