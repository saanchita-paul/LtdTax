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
                    <h4 class="card-title">All Location</h4>
                    <a href="{{URL('/admin/location/add')}}" class="btn btn-primary mb-4 float-right p-2"><span class="mdi mdi-plus"></span>Add New Thana</a>
                    <div class="table-responsive">
                        <table id="order-listing" class="table emm_datatable">
                            <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>District</th>
                                    <th>Thana</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($district_id as $dis)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{$dis->name}}</td>
                                    <td>
                                    @foreach($thana_id as $thn)
                                    @if($thn->district_id==$dis->id)
                                    <div class="row">
                                        <div class="col-md-8">
                                        {{$thn->name}}
                                        </div>
                                        <div class="col-md-4">
                                            <a title="Delete" onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('thana.delete',[$thn->id])}}"> <span class="mdi mdi-window-close text-danger"></span></a>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                    </td>
                                    <td>
                                        @if ($dis->status == 1) 
                                            <label class="badge badge-success">Active</label>
                                        @else
                                            <label class="badge badge-danger">Inactive</label>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-success p-1 mt-1"  href="{{route('location.edit',[$dis->id])}}"><span title="Edit location" class="mdi mdi-pencil"></span></a>
                                        <a class="btn btn-danger p-1 mt-1"  onClick="return confirm('Are you sure you want to Destroy this data permanently?')"  href="{{route('district.delete',[$dis->id])}}"><span title="Delete location"  class="mdi mdi-delete"></span></a>
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