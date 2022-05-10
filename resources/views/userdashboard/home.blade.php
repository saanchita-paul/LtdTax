<?php include_once("web/common/config.php");?>
<?php echo $sCSSBootStrap;
echo $sCSSFontAwesome;
echo $sCSSEMM;
echo $sCSSEkko;
echo $sCSSAnimate; ?>
@extends('userdashboard.include.user-dashbord-master')
@section('user-content')

<div class="resume-form-input-wrapper">
<div class="row">
<div class="col-lg-12">
<div class="resume-header-text mt-4 mb-3">
<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <p class="text-dark h3 mt-4 mb-4">Welcome {{Auth::user()->name}}</p>
            <h6>Here you can edit your resume in five different steps (Personal, Education/
Training, Employment, Other Information and Photograph). To enrich your
resume
provide authentic information. </h6>
        </div>
    </div>


</div>
</div>
</div>
</div>
@endsection