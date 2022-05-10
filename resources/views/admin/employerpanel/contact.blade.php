@extends('admin')

@section('content') 
<div class="content-wrapper">
  @if ($errors->any())
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
          <h4 class="card-title">All Company Contacts</h4>
          <div class="table-responsive">
            <table id="order-listing" class="table emm_datatable">
              <thead>
                <tr>
                  <th>#SL</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($contact as $con)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$con->name}}</td>
                  <td>{{$con->phone}}</td>
                  <td>
                    <a class="btn btn-danger p-1 mt-1" onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('emcontact.delete',[$con->id])}}"><span title="Delete contact"  class="mdi mdi-delete"></span></a>
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