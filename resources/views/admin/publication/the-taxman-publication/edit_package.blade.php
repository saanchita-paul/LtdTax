@extends('admin')
@section('content') 
<style>
.note-toolbar.card-header {
    position: relative !important;
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
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h5 class="font-weight-bold mb-4">Edit Package</h5>
          <form role="form" class="forms-sample" action="{{route('update-package',$pac->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="package_name">Package Name <span class="required-icon">*</span></label>
              <input type="text" maxlength="100" required="" class="form-control" id="package_name" name="package_name" value="@if(!empty($pac->package_name)){{$pac->package_name}}@else{{old('package_name')}}@endif" placeholder="Please enter package name"> 
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control ckeditor" name="package_desc"  rows="5" cols="50">@if(!empty($pac->package_desc)){{$pac->package_desc}}@else{{old('package_desc')}}@endif</textarea>
            </div>
            <div class="form-group">
              <label for="package_img">
              @if($pac->package_img)
                <img src="{{asset('uploads/publication/'.$pac->package_img)}}" alt="{{$pac->package_name}}" width="80"> 
              @endif
              </label>
              <input type="file" name="package_img" class="dropify" data-height="70">
              <input type="hidden" name="hidden_image" value="{{$pac->package_img}}">
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-lg-6">
                  <label for="regular_price">Regular Price <span class="required-icon">*</span></label>
                  <input type="number" required="" min="1" maxlength="15" class="form-control" id="regular_price"  name="regular_price" value="@if(!empty($pac->regular_price)){{$pac->regular_price}}@else{{old('regular_price')}}@endif" placeholder="Package regular price"> 
                </div>
                <div class="col-lg-6">
                  <label for="price">Sale Price <span class="required-icon">*</span></label>
                  <input type="number" required="" min="1" maxlength="15" class="form-control" id="price"  name="price" value="@if(!empty($pac->price)){{$pac->price}}@else{{old('price')}}@endif" placeholder="Package sale price">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="book">Select books for the package</label>
              <select required="" class="form-control js-example-basic-multiple" id="select_books" name="select_books[]" multiple="multiple">                
                @foreach($books as $book)
                  <option value="{{$book->id}}" @if($package != '') @foreach($package as
                  $book_package){{ $book_package->book_id == $book->id ? 'selected': ''}} @endforeach @endif
                  @if($all_book_packages) @foreach($all_book_packages as
                               $pack){{ $pack->book_id == $book->id ? 'disabled': ''}} @endforeach @endif
                  > {{ $book->name }}
                  </option>
                @endforeach
              </select>
              @error('select_books')
              <small class="text-danger">{{ $message }}</small>
              @enderror                     
            </div>
            <button type="submit" class="btn btn-success mr-2">Update Package</button>
            <a href="/dashboard" class="btn btn-light">Cancel</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection