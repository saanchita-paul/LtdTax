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
                <h5 class="font-weight-bold mb-4">Edit Company detail</h5>
                    <form class="forms-sample" action="{{route('cominfo.update',[$cominfo->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Company Name</label>
                            <input type="text" class="form-control" value="{{$cominfo->name}}" name="name" id="name" placeholder="Please enter Company Name">
                        </div>
                        <div class="form-group">
                            <label for="address">Company Address</label>
                            <input type="text" class="form-control" value="{{$cominfo->address}}" name="address" id="address" placeholder="Please enter Company address">
                        </div>
                        <div class="form-group">
                            <label for="district_id">District </label>
                            <select class="js-example-basic-single district_id @error('district_id') is-invalid @enderror " style="width:100%" name="district_id">
                                <option value="">Select District</option>
                                @foreach ($districts as $district)
                                    <option value="{{$district->id}}" @if(!empty($cominfo->district_id)) @if($district->id == $cominfo->district_id) selected @endif @endif>{{ $district->name }}</option>
                                @endforeach
                            </select>
                            @error('district_id')
                            <small class="error text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="thana_id">Thana </label>
                            <?php $thana= App\Models\Location::whereNotNull('district_id')->get();?>
                            <select class="js-example-basic-single thana_id" style="width:100%" name="thana_id" id="">
                                <option value="">Select Thana</option>
                                @foreach($thana as $tha)
                                    @if(!empty($cominfo->thana_id))
                                    <option value="{{$tha->id}}" @if($tha->id == $cominfo->thana_id) selected @endif>
                                        {{$tha->name}}
                                    </option>
                                    @endif
                                @endforeach
                            </select>
                            @error('thana_id')
                            <small class="error text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="post_code">Postcode</label>
                            <input type="number" min="1" class="form-control" value="{{$cominfo->post_code}}" name="post_code" id="name" placeholder="Please enter post code">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control ckeditor" name="description" id="description" rows="2">{{$cominfo->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="file_upload">Business/Tread license 
                                @if($cominfo->file_upload)
                                    <iframe src="{{asset('uploads/cominfo/'.$cominfo->file_upload)}}" frameBorder="0" scrolling="auto" height="80" width="120"></iframe> 
                                @endif
                            </label>
                            <input type="file" name="file_upload" class="dropify" data-height="70">
                            <input type="hidden" name="hidden_file" value="{{$cominfo->file_upload}}">
                            <small>Upload Pdf file in 5MB</small>
                        </div>
                        <div class="form-group">
                            <label for="url">Website URL</label>
                            <input type="text" class="form-control" value="{{$cominfo->url}}" name="url" id="url" placeholder="Please enter website url">
                        </div>
                        <div class="form-group">
                            <label for="logo"> Company Logo 
                                @if($cominfo->logo)
                                <img src="{{asset('uploads/cominfo/'.$cominfo->logo)}}" alt="{{$cominfo->name}}" width="80"> 
                                @endif
                            </label>
                            <input type="file" name="logo" class="dropify" data-height="70">
                            <input type="hidden" name="hidden_image" value="{{$cominfo->logo}}">
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Update Company Detail</button>
                        <a href="/dashboard" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('.district_id').on('change', function () {
            var districtID = jQuery(this).val();
            if (districtID) {
                jQuery.ajax({
                    url: '/admin/employerpanel/get/thana/' + districtID,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        jQuery('.thana_id').empty();
                        jQuery('.thana_id').append(
                            '<option value="">--Select Thana--</option>');

                        jQuery.each(data, function (key, value) {
                            $('.thana_id').append('<option value="' + value.id +
                                '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('.thana_id').empty();
            }
        });
    });
</script>
@endsection
@endsection