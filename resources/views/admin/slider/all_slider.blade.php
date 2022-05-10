
@extends('admin')

@section('content') 
<div class="content-wrapper">
  @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close"
            data-dismiss="alert">&times;</button>
        <strong> {{ session()->get('success') }} </strong>
    </div>
  @endif
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
        <h5 class="mb-2 font-weight-bold">All Sliders</h5>
        <a href="{{route('slider.add')}}" class="btn btn-primary mb-4 float-right p-2"><span class="mdi mdi-plus"></span>Create New Slider</a>                 
        <div class="table-responsive">
          <table id="order-listing" class="table emm_datatable">
            <thead>
              <tr>
                <th>#SL</th>
                <th>Title</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach($slider as $slide)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$slide->title}}</td>
                <td>
                  @foreach($slider_images as $images)
                    @if($slide->id == $images->slider_id)
                      @foreach($slider_gallery as $gal)
                        @if($gal->id == $images->img_id)
                          <img src="{{asset('uploads/slider/'.$gal->slider_img)}}" width="80">
                        @endif
                      @endforeach
                    @endif
                  @endforeach
                </td>
                <td>
                  @if($slide->status == 1)
                    <label class="badge badge-success">Active</label>
                  @else 
                    <label class="badge badge-danger">Inactive</label> 
                  @endif
                </td>
                <td>
                  <a class="btn btn-success p-1 mt-1" href="{{route('slider.edit',[$slide->id])}}">
                    <span title="Edit slider" class="mdi mdi-pencil"></span>
                  </a>
                  <a class="btn btn-danger p-1 mt-1" onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('slider.delete',[$slide->id])}}">
                    <span title="Delete slider"  class="mdi mdi-delete"></span>
                  </a>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection












































