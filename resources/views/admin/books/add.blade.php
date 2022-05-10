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
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
    </div>
    @endif
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h5 class="font-weight-bold mb-4">Add Book</h5>
                    <form class="forms-sample" action="{{route('books.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Title <span class="required-icon">*</span></label>
                            <input type="text" class="form-control" name="book_name" id="book_name" placeholder="Enter Title">
                        </div>
                        <div class="form-group">
                            <label for="name">Author Name</label>
                            <input type="text" class="form-control" name="author_name" id="author_name" placeholder="Enter Author Name">
                        </div>
                        <div class="form-group">
                            <label for="no_of_page">No. of Page</label>
                            <input type="text" class="form-control" name="no_of_page" id="no_of_page" placeholder="Enter no of page">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control ckeditor" name="description" id="description" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="regular_price">Regular Price <span class="required-icon">*</span></label>
                                    <input type="number" required="" min="1" maxlength="15" class="form-control" id="regular_price"  name="regular_price" value="{{old('regular_price')}}" placeholder="Regular price"> 
                                </div>
                                <div class="col-lg-6">
                                    <label for="price">Sale Price <span class="required-icon">*</span></label>
                                    <input type="number" required="" min="1" maxlength="15" class="form-control" id="price"  name="sale_price" value="{{old('price')}}" placeholder="Sale price"> 
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="feature_img">Feature Image <span class="required-icon">*</span></label>
                            <input type="file" name="feature_img" class="dropify" data-height="70">
                        </div>
                        <div class="form-group">
                            <label for="feature_img">Gallery Image</label>
                            <input type="file" name="gallery_img[]" id="gallery_img" class="dropify" data-height="70" multiple>
                        </div>
                        <div class="form-group">
                        <label for="file_upload">Upload Book Pdf <span class="required-icon">*</span></label>
                        <input type="file" required="" name="file_upload" class="dropify" data-height="70">
                        <small>Upload Main Pdf file in 5MB</small>
                      </div>
                        <button type="submit" class="btn btn-success mr-2">Add Book</button>
                         <a href="/dashboard" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection