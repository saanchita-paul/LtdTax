@extends('admin')
@section('content') 
<div class="content-wrapper">
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
  @if(contactUsPageCount() > 0)
    <script>window.location.href="/admin/contact_us"</script>
  @endif
  <div class="row">
    <div class="col-md-12  grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h5 class="mb-4 font-weight-bold">Add Contact Us</h5>
          <form role="form" class="forms-sample" action="{{route('contact_us.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <div class="row">
                <div class="col-lg-6">
                  <label for="title">Title <span class="required-icon">*</span> </label>
                  <input type="text" class="form-control" required="" value="{{old('title')}}" id="title" name="title" placeholder="Please enter title">
                </div>
                <div class="col-lg-6">
                  <label for="email">Email <span class="required-icon">*</span></label>
                  <input type="email" class="form-control" required="" value="{{old('email')}}" id="email" name="email" placeholder="Please enter email">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-lg-6">
                  <label for="phone1">Phone 1 <span class="required-icon">*</span></label>
                  <input type="number" class="form-control" maxlength="15" value="{{old('phone1')}}" required="" id="phone1" name="phone1" placeholder="Please enter phone number">
                </div>
                <div class="col-lg-6">
                  <label for="phone2">Phone 2</label>
                  <input type="number" class="form-control" maxlength="15" value="{{old('phone2')}}" id="phone2" name="phone2" placeholder="Please enter phone number"> 
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-lg-6">
                  <label for="map_url">Map Url <span class="required-icon">*</span></label>
                  <input type="url" class="form-control" required="" value="{{old('map_url')}}" id="map_url" name="map_url" placeholder="Please enter map url"> 
                </div>
                <div class="col-lg-6">
                  <label for="web_url">Website Url <span class="required-icon">*</span></label>
                  <input type="url" class="form-control" required="" value="{{old('web_url')}}" id="web_url" name="web_url" placeholder="Please enter web url"> 
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="address">Address <span class="required-icon">*</span></label>
              <input type="text" class="form-control" required="" value="{{old('address')}}" id="address" name="address" placeholder="Please enter address">
            </div>
            <button type="submit" class="btn btn-success mr-2">Add</button>
            <button class="btn btn-light">Cancel</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection