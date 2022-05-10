@extends('admin')
@section('content') 
<div class="content-wrapper">
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
  <div class="row">
    <div class="col-md-12  grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h5 class="font-weight-bold mb-4">Let's Know Us - Add Option</h5>
          <form role="form" class="forms-sample" action="{{route('footer.lets_know_us.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="title">Title <span class="required-icon">*</span> </label>
              <input type="text" required="" class="form-control" value="{{old('title')}}" id="title" name="title" placeholder="Please enter title">
              @error('title')
                <small class="error text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group">
              <label for="url">Url</label>
              <input type="url" class="form-control" id="url" value="{{old('url')}}" name="url" placeholder="Please enter url">
              @error('url')
                <small class="error text-danger">{{ $message }}</small>
              @enderror
            </div>    
            <button type="submit" class="btn btn-success mr-2">Add</button>
            <button class="btn btn-light">Cancel</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection