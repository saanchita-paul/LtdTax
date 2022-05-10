
@extends('admin')
@section('content') 
<div class="content-wrapper">
  @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong> {{ session()->get('success') }} </strong>
    </div>
  @endif
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Jobseeker - All Option</h4>
          <a href="{{route('footer.jobseeker.add')}}" class="btn btn-primary mb-4 float-right p-2"><span class="mdi mdi-plus"></span>Create New</a>
          <div class="table-responsive">
            <table id="order-listing" class="table emm_datatable">
              <thead>
                <tr>
                  <th>#SL</th>
                  <th>Title</th>
                  <th>Url</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($jobseeker as $js)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$js->title}}</td>
                  <td title="{{$js->url}}">{{\Illuminate\Support\Str::limit($js->url, 50, $end='...')}}</td>
                  <td>
                    <a class="btn btn-success p-1 mt-1" href="{{route('footer.jobseeker.edit',[$js->id])}}"><span title="Edit option" class="mdi mdi-pencil"></span></a>
                    <a class="btn btn-danger p-1 mt-1" onClick="return confirm('Are you sure you want to Destroy this data permanently?')"  href="{{route('footer.jobseeker.delete',[$js->id])}}"><span title="Delete option"  class="mdi mdi-delete"></span></a>
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












































