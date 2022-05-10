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
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bold mb-4">Add Trainer</h5>
                    <form class="forms-sample" action="{{route('trainer.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name <span class="required-icon">*</span></label>
                            <input type="text" value="{{old('name')}}" class="form-control" maxlength="100" name="name" id="name" placeholder="Enter trainer name">
                        </div>
                        <div class="form-group">
                            <label for="name">Email <span class="required-icon">*</span></label>
                            <input type="text" value="{{old('email')}}" class="form-control" maxlength="100" name="email" id="email" placeholder="Enter trainer email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" value="{{old('phone')}}" class="form-control" maxlength="15" pattern="[+]?[0-9]{6,15}" title="Enter a valid phone number" name="phone" id="phone" placeholder="Enter trainer phone no.">
                        </div>
                        <div class="form-group">
                            <label for="password">Password <span class="required-icon">*</span></label>
                            <input type="password" class="form-control" name="password" maxlength="200" id="password" placeholder="Enter trainer password">
                        </div>
                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" name="photo" class="dropify" data-height="70">
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Add Trainer</button>
                        <a href="/dashboard" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection