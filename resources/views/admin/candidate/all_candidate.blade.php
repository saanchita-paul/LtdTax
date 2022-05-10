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
                    <h4 class="card-title">All Candidates</h4>
                    <div class="table-responsive">
                        <table id="order-listing" class="table emm_datatable">
                            <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Username</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <a class="btn btn-success p-1 mt-1" href="{{url('/admin/candidate/'.$user->id.'/applicant_resume')}}"><span title="View resume"class="mdi mdi-eye"></span></a>
                                        <a class="btn btn-danger p-1 mt-1" onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('candidate.delete',[$user->id])}}"><span title="Delete candidate"  class="mdi mdi-delete"></span></a>
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
