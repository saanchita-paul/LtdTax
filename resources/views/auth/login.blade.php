@extends('master')
@section('content')
<?php $title="Login"?>
<style>
.form-s form input[type="text"], input[type="email"], input[type="password"] {
    margin-bottom:unset;
}
</style>
<div class="container">
    <main>
        <div class="job-seeker-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-box">
                            <div class="slider-cont">
                                <div class="sign-page-text p-5">
                                    <h5 class="pb-4">Employability Test</h5>
                                    <p class="pb-4">Step forward to an Employability Test and Stand out exceptionally
                                        among thousands of jobseekers. It helps to- </p>
                                    <p class="pb-4">- Know the intellectual qualifications and hidden soft skills. </p>
                                    <p class="pb-4">- Secure the next step of recruitment process.</p>
                                    <p class="pb-4">- Increase the number of interview calls.</p>
                                </div>
                            </div>
                            <div class="form-cont-job-s">

                                <div class="top-buttons">
                                    <a href="{{ url('/register') }}" class="btn to-signup text-white">
                                        Sign Up
                                    </a>
                                    <a href="{{ url('/login') }}" class="btn to-signin top-active-button ">
                                        Sign In
                                    </a>
                                </div>

                                <div class="form-s form-signup" style="display: block;">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <!-- <label for="username">Username</label> -->
                                            <input id="email" name="login" class=" pl-1 @error('email') is-invalid @enderror" type="text" placeholder="Email/Phone/Username" value="{{ old('email') }}">
                                                @error('email')
                                                <span class=" d-block invalid-feedback" role="alert">
                                                <small>{{ $message }}</small>
                                                </span>
                                                @enderror
                                                @error('phone')
                                                <span class=" d-block invalid-feedback" role="alert">
                                                <small>{{ $message }}</small>
                                                </span>
                                                @enderror
                                                @error('username')
                                                <span class=" d-block invalid-feedback" role="alert">
                                                <small>{{ $message }}</small>
                                                </span>
                                                @enderror

                                        </div>
                                        
                                        <div class="form-group">
                                            <!-- <label for="password">Password</label> -->
                                            <input name="password" id type="Password" class="@error('password') is-invalid  @enderror" placeholder="Password">
                                            @error('password')
                                            <span class="d-block invalid-feedback" role="alert">
                                            <small>{{ $message }}</small>
                                            </span>
                                            @enderror
                                            <a class="float-right mt-2" href="/password/reset">Forgot Password?</a>
                                        </div>
                                        
                                        
                                        <input type="submit" class="form-btn" value="Sign In">
                                        <br><br>
                                        <a href="{{ url('/register') }}" class="lined-link to-signin-link">Create New Account</a>
                                    </form>
                                </div>

                            </div>
                            <div class="clear-fix"></div>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>

    </main>
</div>
@endsection