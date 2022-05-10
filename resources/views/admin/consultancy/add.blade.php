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
                <h5 class="font-weight-bold mb-4">Add Consultancy</h5>
                    <form class="forms-sample" action="{{route('consult.store')}}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title <span class="required-icon">*</span></label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" required="">
                        </div>
                        <div class="form-group">
                            <label for="short_description">Short Description <span class="required-icon">*</span></label>
                            <textarea class="form-control" name="short_description" required="" id="short_description" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="content">Description <span class="required-icon">*</span></label>
                            <textarea class="form-control ckeditor" required="" name="content" id="content" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category">Category <span class="required-icon">*</span></label>
                            <select name="concat_id" id="concat_id" required="" class="form-control">
                                <option value="">Select Category</option>
                                @foreach($categories as $cat)
                                <option value="{{$cat->id}}">{{$cat->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Add Consultancy</button>
                         <a href="/dashboard" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
