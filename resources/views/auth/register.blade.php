@extends('master')

@section('content')
<?php $title="User Registration";?>
<style>
.form-s form input[type="text"], input[type="email"], input[type="password"] {
    margin-bottom:unset;
}
label{
    margin-bottom:unset;
    font-weight:unset;
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
                                    <h5 class="pb-4">User Registration</h5>
                                    <p class="pb-4">Step forward to an Employability Test and Stand out exceptionally
                                        among thousands of jobseekers. It helps to- </p>
                                    <p class="pb-4">- Know the intellectual qualifications and hidden soft skills. </p>
                                    <p class="pb-4">- Secure the next step of recruitment process.</p>
                                    <p class="pb-4">- Increase the number of interview calls.</p>
                                </div>
                            </div>
                            <div class="form-cont-job-s">

                                <div class="top-buttons">
                                    <a href="{{ url('/register') }}" class="btn to-signup top-active-button">
                                        Sign Up
                                    </a>
                                    <a href="{{ url('/login') }}" class="btn to-signin text-white">
                                        Sign In
                                    </a>
                                </div>

                                <div class="form-s form-signup" style="display: block;">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group">
                                            <!-- <label for="username">Username</label> -->
                                            <input id="username" name="username" class=" pl-1 @error('username') is-invalid @enderror" type="text" placeholder="Username" value="{{ old('username') }}">
                                            @error('username')
                                            <span class=" d-block invalid-feedback" role="alert">
                                                <small>{{ $message }}</small>
                                            </span>

                                            @enderror

                                        </div>
                                        <div class="form-group">
                                            <!-- <label for="username">Username</label> -->
                                            <input id="email" name="email" class=" pl-1 @error('email') is-invalid @enderror" type="text" placeholder="Email" value="{{ old('email') }}">
                                            @error('email')
                                            <span class=" d-block invalid-feedback" role="alert">
                                                <small>{{ $message }}</small>
                                            </span>

                                            @enderror

                                        </div>

                                        <div class="form-group">
                                            <!-- <label for="username">Username</label> -->
                                            <input id="phone" name="phone" class=" pl-1 @error('phone') is-invalid @enderror" type="text" placeholder="phone" value="{{ old('phone') }}">
                                            @error('phone')
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
                                        </div>

                                        <div class="form-group">
                                            <!-- <label for="password_confirmation"> Confirm Password</label> -->
                                            <input name="password_confirmation" class="@error('password_confirmation') is-invalid  @enderror" id="password_confirmation" type="password" placeholder="Confirm Password">
                                            @error('password_confirmation')
                                            <span class="d-block invalid-feedback" role="alert">
                                                <small>{{ $message }}</small>
                                            </span>
                                            @enderror
                                        </div>
                                        <p class="terms">
                                            <input name="terms_of_service" id="terms_of_service"  type="checkbox">
                                            <label for="terms_of_service">I agree all statments in</label>
                                            <a href="{{URL('/terms-condition')}}" class="lined-link">terms & condition</a>
                                                @error('terms_of_service')
                                                <span class="d-block invalid-feedback" role="alert">
                                                    <small>{{ $message }}</small>
                                                </span>
                                                @enderror
                                        </p>
                                        
                                        <input type="submit" class="form-btn" value="Sign Up">
                                        <br><br>
                                        <a href="{{ url('/login') }}" class="lined-link to-signin-link">I'm already
                                            member</a>
                                    </form>
                                </div>

                                 <!-- <div class="form form-signin" style="display: none;">
                                    <form action="#">
                                        <lable>E-MAIL</lable>
                                        <input type="email" placeholder="Your e-mail">
                                        <lable>PASSWORD</lable>
                                        <input type="password" placeholder="Your password">
                                        <input type="submit" class="form-btn" value="Sign In">
                                        <br><br>
                                        <a href="#" class="lined-link to-signup-link">Create new account</a>
                                    </form>
                                </div>  -->
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