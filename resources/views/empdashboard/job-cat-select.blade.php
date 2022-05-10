@extends('master')

@section('content')
<style>
    .form-s form input[type="text"],
    input[type="email"],
    input[type="password"] {
        color: black;
    }

    .width4 {
        width: 400px;
    }
    .g-tax{
        background: #005900;
    }

</style>
<main>
    <div class="section-full bg-white p-t50 p-b20">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 m-b30">
                    @include('empdashboard.include.emp-sidebar')
                </div>
                <div class="col-xl-9 col-lg-8 m-b30">
                    <?php
                    $c='cat-job';
                    $h='hot-job';
                    ?>
                    <div class="job-bx submit-resume ">
                        <div class="job-bx-title clearfix text-center mt-5 mb-5">
                        <h3 class="font-weight-600 mb-3">Select Category</h3>
                         @if(Session::has('warn'))
                         <span class="text-danger">{{Session::get('warn')}}</span><br>
                         @endif
                         <br>
                            <a href="{{route('employer.jobpost',$c)  }}" class="btn btn-lg btn-success g-tax">Category Job</a>
                            <a href="{{route('employer.jobpost',$h)}}" class="btn btn-lg btn-success g-tax">Hot Job</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

@endsection
