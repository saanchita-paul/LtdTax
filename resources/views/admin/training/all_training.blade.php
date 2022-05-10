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
          <h4 class="card-title">All Trainings</h4>
          <a href="{{URL('/admin/training/add')}}" class="btn btn-primary mb-4 float-right p-2"><span class="mdi mdi-plus"></span>Add New Training</a>
          <div class="table-responsive">
              <table id="order-listing" class="table emm_datatable">
                  <thead>
                      <tr>
                        <th>#SL</th>
                        <th>Feature Image</th>
                        <th>Title</th>
                        <th>Venue</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($training as $train)
                      <tr>
                        <td>{{$no++}}</td>
                        <td>
                          @if($train->train_img)
                          <img src="{{asset('uploads/training/'.$train->train_img)}}" alt="{{$train->title}}" style="width:80px!important;height:auto!important;border-radius:unset!important;">
                          @endif
                        </td>
                        <td title="{{$train->title}}">{{\Illuminate\Support\Str::limit($train->title, 20, $end='...')}}</td>
                        <td title="{{$train->venue}}">{{\Illuminate\Support\Str::limit($train->venue, 20, $end='...')}}</td>
                        <td>
                          <a class="btn btn-success p-1 mt-1" href="{{route('training.edit',[$train->id])}}"><span title="Edit training" class="mdi mdi-pencil"></span></a>
                          <a class="btn btn-danger p-1 mt-1" onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('training.delete',[$train->id])}}"><span title="Delete training"  class="mdi mdi-delete"></span>
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
