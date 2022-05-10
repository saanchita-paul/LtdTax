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
          <h4 class="card-title">All Contact Messages</h4>
          <div class="table-responsive">
            <table id="order-listing" class="table emm_datatable">
              <thead>
                <tr>
                  <th>#SL</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($webcontact as $webcon)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$webcon->name}}</td>
                  <td>{{$webcon->email}}</td>
                  <td>
                    <a class="btn btn-success p-1 mt-1" href="{{route('webcontact.edit',[$webcon->id])}}">
                    <span title="View message" class="mdi mdi-eye"></span>
                    </a>
                    <a class="btn btn-danger p-1 mt-1" onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('webcontact.delete',[$webcon->id])}}"><span title="Delete message"  class="mdi mdi-delete"></span></a>
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