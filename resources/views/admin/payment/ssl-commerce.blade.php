@extends('admin')
@section('content')

<div class="content-wrapper">
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
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
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong> {{ session()->get('success') }} </strong>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bold mb-4">{{ $ssl_title }}</h5>                    
                    <form class="forms-sample" action="{{route('ssl.update')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title <span class="required-icon">*</span></label>
                            <input type="text" value="{{ $ssl_title }}" class="form-control" name="title" id="title" placeholder="Enter Title">
                        </div>
                        <div class="form-group">
                            <label for="store_id">Store ID <span class="required-icon">*</span></label>
                            <input type="text" class="form-control" name="store_id" id="store_id" value="{{$ssl_store_id}}" placeholder="500">
                        </div>
                        <div class="form-group">
                            <label for="store_password">Store Password<span class="required-icon">*</span></label>
                            <input type="text" class="form-control" name="store_password" id="store_password" value="{{ $ssl_store_password }}" placeholder="500">
                        </div>
                        <div class="form-group">
                            <label for="status">Status <span class="required-icon">*</span></label>
                            <select class="form-control form-control-lg" id="status" name="status">
                                <option value="yes" {{ $ssl_enable_option  == 'yes' ? 'selected' : '' }}>Enable</option>
                                <option value="no" {{ $ssl_enable_option  == 'no' ? 'selected' : '' }}>Disable</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Save</button>
                        <a href="{{url('/dashboard')}}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
