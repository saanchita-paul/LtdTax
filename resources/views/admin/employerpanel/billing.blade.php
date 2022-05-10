@extends('admin')
@section('content') 
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">All Billing Addresses</h4>
          <div class="table-responsive">
            <table id="order-listing" class="table emm_datatable">
              <thead>
                <tr>
                  <th>#SL</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($billing as $bill)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$bill->phone}}</td>
                  <td>{{$bill->email}}</td>
                  <td>
                    <a class="btn btn-danger p-1 mt-1" onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('billing.delete',[$bill->id])}}"><span title="Delete contact"  class="mdi mdi-delete"></span>                    </a>
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