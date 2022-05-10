@extends('master')
<?php $title = 'Password Reset';
        $meta_img = '';
        $description = '';?>
@section('title', $title)
@section('content')
<style>
    input[type="email"], input[type="password"] {
    color: black !important;
    border: 1px solid rgba(0,0,0,.125)!important;
	padding: 5px !important; 
}
body{
    background:#EEEEEE;
}
.f-15{
    font-size:15px;
}
.btn:hover {
    color: white;
    background:#005A13;
    text-decoration: none;
}
</style>
<div class="container mt-4 mb-4">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-secondary"><p class="text-white pt-1 pb-1">Reset Password</p> </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <input id="email" type="hidden"  class="mt-1 mb-0 form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="row mb-3">
                            <div class="col-md-12">
                            <span class="f-15">New Password</span> 
                                <input id="password" type="password" class="mt-1 mb-0 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-12">
                            <span class="f-15">Confirm Password</span> 
                                <input id="password-confirm" type="password" class="form-control mt-1 mb-0" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success btn-block">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
