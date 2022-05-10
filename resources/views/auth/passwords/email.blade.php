@extends('master')
<?php $title = 'Forgot Password';
      $meta_img = '';
      $description = '';?>
@section('title', $title)
@section('content')
<style>
input[type="email"] {
    color: black !important;
    border: 1px solid rgba(0,0,0,.125)!important;
	padding: 5px !important; 
    margin-bottom:0px;
}
.btn:hover {
    color: white;
    background:#005A13;
    text-decoration: none;
}

.f-15{
    font-size: 15px;
}
body{
    background:#EEEEEE;
}
</style>
<div class="container mb-4 mt-4">
    @if (session('status'))
    <div class="row justify-content-center ">
        <div class="col-md-4 mt-4">
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        </div>
    </div>
    @endif
    <div class="row justify-content-center ">
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header bg-secondary"> <p class="text-white">Forgot Password</p></div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                               <span class="f-15">E-Mail Address</span> 
                                <input id="email" type="email" class="mt-1 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-2 mt-4">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success btn-block">
                                    {{ __('Send Password Reset Link') }}
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
