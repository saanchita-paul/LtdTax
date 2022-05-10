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
            <button type="button" class="close"
                data-dismiss="alert">&times;</button>
            <strong> {{ session()->get('success') }} </strong>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h5 class="font-weight-bold mb-4">{{ $payment_title }}</h5>
                    <form class="forms-sample" action="{{route('cash.update')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title <span class="required-icon">*</span></label>
                            <input type="text" value="{{$payment_title}}" class="form-control" name="title" id="title"
                                placeholder="Enter Title">
                        </div>
                        <div class="form-group">
                            <label for="status">Status <span class="required-icon">*</span></label>
                            <select class="form-control form-control-lg" id="status" name="status">
                                <option value="yes" {{ $payment_enable == 'yes' ? 'selected' : '' }} >Enable</option>
                                <option value="no"  {{ $payment_enable == 'no' ? 'selected' : '' }} >Disable</option>
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
