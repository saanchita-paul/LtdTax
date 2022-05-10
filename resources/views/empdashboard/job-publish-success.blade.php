@extends('master')

@section('content')
<style>
.vanish{
    border:none;
    outline:0;
    background:none;
}
.mar-top{
    margin-top:270px;
}
.p-size{
    font-size: 14px;
}

.g-tax{
    color:#005900;
}
.g-tax-bg{
    background-color:#005900;
}
.com-info{
    font-size: 16px;
}
.sm-top{
margin-top:50px;
}
</style>
<main>
    <div class="section-full bg-white p-t50 p-b20 sm-top">
        <div class="container p-2">
            <div class="row">
                <div class="col-lg-12 text-center mx-auto p-4">
                <i class="fa fa-check-circle" style="color:#005900;font-size:60px;"></i><br><br>
                @if(session()->has('success'))
                <p class="text-dark h4">
                {{ session()->get('success') }}
                </p>
                @endif
                <p class="h5">
                Job Status:  Pending <i style="color:red;font-size:20px;" class="fa fa-exclamation-circle"></i>
                </p>
                </div>

            </div>
        </div>
    </div>
</main>
<script>
setInterval(function(){ window.location.href="/company/dashboard" }, 4000);
</script>
@endsection
