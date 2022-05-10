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
                    <h4 class="card-title">All Publications</h4>
                    <div class="table-responsive">
                      <table id="order-listing" class="table emm_datatable">
                        <thead>
                          <tr>
                            <th>#SL</th>
                            <th>Title</th>
                            <th style="width:150px!important;">Short Description</th>
                            <th>Feature Image</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($publication as $pub)
                          <tr>
                            <td>{{$no++}}</td>
                            <td>{{$pub->title}}</td>
                            <td>{{$pub->short_desc}}</td>
                            <td>@if($pub->pub_img) <img src="{{asset('uploads/publication/'.$pub->pub_img)}}" alt="{{$pub->title}}" style="width:80px!important;height:auto!important;border-radius:unset!important;"> @endif</td>
                            <td>
                              <button class="btn btn-outline-warning" title="Edit"><a href="{{route('pub.edit',[$pub->id])}}">
                              <i class="mdi mdi-pencil-box-outline"></i></button>
                              <button class="btn btn-outline-danger" title="Delete"><a onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('pub.delete',[$pub->id])}}"><i class="mdi mdi-delete"></i></a></button>
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