
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
        <h4 class="card-title">Contac Us Page Content</h4>
        @if(contactUsPageCount() == 0)
        <a href="{{route('contact_us.add')}}" class="btn btn-primary mb-4 float-right p-2"><span class="mdi mdi-plus"></span>Create New</a>
        @else
        @endif
          <div class="table-responsive">
            <table id="order-listing" class="table emm_datatable">
              <thead>
                <tr>
                  <th>#SL</th>
                  <th>Title</th>
                  <th>email</th>
                  <th>Web url</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($contact as $con)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$con->title}}</td>
                  <td>{{$con->email}}</td>
                  <td>{{$con->web_url}}</td>
                  <td>
                    <a class="btn btn-success p-1 mt-1" href="{{route('contact_us.edit',[$con->id])}}"><span title="Edit page content" class="mdi mdi-pencil"></span></a>
                    <a class="btn btn-danger p-1 mt-1" onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('contact_us.delete',[$con->id])}}"><span title="Delete page content"  class="mdi mdi-delete"></span></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-12">
      <a href="https://google-map-generator.com/">Generate Google Map</a>
    </div>
  </div>
</div>
@endsection












































