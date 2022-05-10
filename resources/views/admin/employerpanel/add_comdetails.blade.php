@extends('admin')

@section('content')
<div class="content-wrapper">
    @if ($errors->any())
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
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bold mb-4">Add Company detail</h5>
                    <form class="forms-sample" action="{{route('cominfo.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                        <div class="form-group">
                            <label for="name">Company Name <span class="required-icon">*</span></label>
                            <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}"
                                placeholder="Enter Company Name">
                        </div>
                        <div class="form-group">
                            <label for="address">Company address <span class="required-icon">*</span></label>
                            <input type="text" class="form-control" name="address" id="address"
                                value="{{old('address')}}" placeholder="Enter Company address">
                        </div>
                        <div class="form-group">
                            <label for="district_id">District <span class="required-icon">*</span></label>
                            <select class="js-example-basic-single district_id @error('district_id') is-invalid @enderror" style="width:100%" name="district_id">
                                <option value="">Select District</option>
                                @foreach ($districts as $district)
                                <option value="{{ $district->id }}" @if(!empty($empinfo->district_id)) @if($district->id == $cominfo->district_id) selected @endif @endif>{{ $district->name }}</option>
                                @endforeach
                            </select>
                            @error('district_id')
                            <small class="error text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="thana_id">Thana <span class="required-icon">*</span></label>
                            <?php $thana= App\Models\Location::whereNotNull('district_id')->get();?>
                            <select class="js-example-basic-single thana_id" style="width:100%" name="thana_id" id="">
                                <option value="">Select Thana</option>
                                @foreach($thana as $tha)
                                    @if(!empty($cominfo->thana_id))
                                    <option value="{{ $tha->id}}" @if($tha->id == $cominfo->thana_id) selected @endif>
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
                            <label for="post_code">Postcode <span class="required-icon">*</span></label>
                            <input type="number" min="1" class="form-control" name="post_code" id="post_code" value="{{old('post_code')}}" placeholder="Enter post code">
                        </div>
                        <div class="form-group">
                            <label for="description">Description </label>
                            <textarea class="form-control ckeditor" name="description" id="description" rows="2">{{old('description')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="file_upload">Business/Tread license </label>
                            <input type="file" name="file_upload" class="dropify" data-height="70">
                            <small>Upload Pdf file in 5MB</small>
                        </div>
                        <div class="form-group">
                            <label for="url">Website URL </label>
                            <input type="url" class="form-control" name="url" id="url" value="{{old('url')}}" placeholder="Enter Website url">
                        </div>
                        <div class="form-group">
                            <label>Company Logo <span class="required-icon">*</span></label>
                            <input type="file" name="logo" class="dropify" data-height="70">
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Add Company Details</button>
                        <a class="btn btn-light" href="/dashboard">Cancel</a>
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