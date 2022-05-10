@extends('admin')

@section('content') 

<div class="content-wrapper">
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
    @endif
    @if($errors->any())
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
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h5 class="font-weight-bold mb-4">Edit Education</h5>
                <form role="form" class="forms-sample" action="{{route('education.update',[$education->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Level of Education <span class="text-danger">*</span> </label>
                        <input type="text" required="" class="form-control" id="name" name="name" value="{{$education->name}}" placeholder="Please enter level of education">
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Update Education</button>
                        <a href="/dashboard" class="btn btn-light">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
$('#country_id').change(function(){
var id = $(this).val();
var dataID = {'id':id};
    $.ajax({
        type:"GET",
        url:"{{url('location/stateID')}}",
        dataType: 'json',
        data: dataID,
        success:function(data){
            if(data){
                document.getElementById('state_id').removeAttribute("disabled");
                $("#state_id").empty();
                $("#state_id").append('<option value="">Select State</option>');
                $.each(data,function(key,value){
                    $("#state_id").append('<option value="'+key+'">'+value+'</option>');
                });
            }else{
                $("#state_id").empty();
            }
        }
    });
});
$('#state_id').change(function(){
    var id = $(this).val();
    var dataID = {'id':id};
    $.ajax({
        type:"GET",
        url:"{{url('location/cityID')}}",
        dataType: 'json',
        data: dataID,
        success:function(data){
            if(data){
                document.getElementById('city_id').removeAttribute("disabled");
                $("#city_id").empty();
                $("#city_id").append('<option value="">Select City</option>');
                $.each(data,function(key,value){
                    $("#city_id").append('<option value="'+key+'">'+value+'</option>');
                });

            }else{
                $("#city_id").empty();
            }
        }
    });
});
</script>
@endsection