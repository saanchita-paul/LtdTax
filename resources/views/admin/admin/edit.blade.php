@extends('admin')
@section('content')
<div class="content-wrapper">
    @if ($errors->any())
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
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h5 class="font-weight-bold mb-4">Edit Admin</h5>
                    <form class="forms-sample" action="{{route('admin.update',[$admin->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name <span class="required-icon">*</span></label>
                            <input type="text" class="form-control" value="{{$admin->name}}" name="name" id="name" placeholder="Enter admin name">
                        </div> 
                        <div class="form-group">
                            <label for="name">Email <span class="required-icon">*</span></label>
                            <input type="text" class="form-control" value="{{$admin->email}}" name="email" id="email" placeholder="Enter admin email">
                        </div> 
                        <div class="form-group">
                            <label for="phone">phone</label>
                            <input type="text" class="form-control" maxlength="15" pattern="[+]?[0-9]{6,15}" title="Enter a valid phone number" value="{{$admin->phone}}" name="phone" id="phone" placeholder="Enter admin phone no.">
                        </div>
                        <div class="form-group">
                            <label for="password">Change Password</label>
                            <input type="password" class="form-control" value="" name="password" id="password" placeholder="Enter new password">
                        </div>            
                        <div class="form-group">
                            <label for="photo">Photo 
                                @if($admin->photo)
                                <img src="{{asset('uploads/users/'.$admin->photo)}}" alt="{{$admin->name}}" width="80"> 
                                @endif
                            </label>
                            <input type="file" name="photo" class="dropify" data-height="70">
                            <input type="hidden" name="hidden_image" value="{{$admin->photo}}">
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Update Admin</button>
                        <a href="/dashboard" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection