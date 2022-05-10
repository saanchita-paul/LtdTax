@extends('admin')

@section('content')
<div class="content-wrapper">
    @if ($errors->any())
        <div class="alert alert-warning" role="alert">
            <strong>Warning! </strong> @if ($errors->count() == 1)
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
                <h5 class="font-weight-bold mb-4">Edit book</h5>
                    <form class="forms-sample" action="{{route('books.update',[$book->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="book_name">Title <span class="required-icon">*</span></label>
                            <input type="text" class="form-control" value="{{$book->name}}" name="book_name" id="book_name" placeholder="Enter Title">
                        </div> 
                        <div class="form-group">
                            <label for="name">Author Name</label>
                            <input type="text" class="form-control" value="{{$book->author_name}}" name="author_name" id="author_name" placeholder="Enter Author Name">
                        </div> 
                        <div class="form-group">
                            <label for="no_of_page">No. of Page</label>
                            <input type="text" class="form-control" name="no_of_page" id="no_of_page" value="{{$book->no_of_page}}" placeholder="Enter no of page">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control ckeditor" name="description" id="description" rows="2">{{$book->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="regular_price">Regular Price <span class="required-icon">*</span></label>
                                    <input type="number" required="" min="1" maxlength="15" class="form-control" id="regular_price"  name="regular_price" value="{{$book->regular_price ?? old('regular_price')}}" placeholder="Regular price"> 
                                </div>
                                <div class="col-lg-6">
                                    <label for="price">Sale Price <span class="required-icon">*</span></label>
                                    <input type="number" required="" min="1" maxlength="15" class="form-control" id="price"  name="sale_price" value="{{$book->sale_price ?? old('price')}}" placeholder="Sale price"> 
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="feature_img">Feature Image 
                                @if($book->feature_img)
                                    <img src="{{asset('uploads/book/'.$book->feature_img)}}" alt="{{$book->name}}" width="80"> 
                                @endif
                            </label>
                            <input type="file" name="feature_img" class="dropify" data-height="70">
                            <input type="hidden" name="hidden_image" value="{{$book->feature_img}}">
                        </div>
                        <div class="form-group">
                            <label for="feature_img">Gallery Image </label>
                            <input type="file" name="gallery_img[]" id="gallery_img" class="dropify" data-height="70" multiple>
                            <div class="galery_id">
                                <div class="upload-wrap pt-1">
                                    @if($gallery)
                                        @foreach ($gallery as $gal)
                                            <div class="upload-images" style="display:inline-block; padding-right:5px;">
                                                <a class="close" onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('books.gallery.delete',[$gal->id])}}">×</a>
                                                <img alt="Gallery Image" src="{{asset('uploads/book/'.$gal->name)}}" width='100'>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="file_upload">Upload Main File 
                                @if($book->file_upload)
                                    <iframe src="{{asset('uploads/book/'.$book->file_upload)}}" frameBorder="0" scrolling="auto" height="80" width="120"></iframe> 
                                @endif
                            </label>
                            <input type="file" name="file_upload" class="dropify" data-height="70">
                            <input type="hidden" name="hidden_file" value="{{$book->file_upload}}">
                            <small>Upload Main Pdf file in 5MB</small>  
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Update Book</button>
                         <a href="/dashboard" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection