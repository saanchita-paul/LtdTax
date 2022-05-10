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
        <div class="grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-4 font-weight-bold">Add Page</h5>
                    <form role="form" class="forms-sample" action="{{route('page.store')}}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Page Title <span class="required-icon">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}"  placeholder="Please enter page title">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control ckeditor" name="content" rows="5" cols="50">{{old('content')}}</textarea>
                            @error('content')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="page_img">Page Image</label>
                            <input type="file" name="page_img" class="dropify" data-height="70">
                            @error('page_img')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Add Page</button>
                         <a href="/dashboard" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection