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
                <h4 class="card-title">All Education</h4>
                <a href="{{URL('/admin/education/add')}}" class="btn btn-primary mb-4 float-right p-2"><span class="mdi mdi-plus"></span>Add Education</a>
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Level of Education</th>
                                    <th>Exam/Degree</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($parent_id as $par)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{$par->name}}</td>
                                    <td>
                                    @foreach($child_id as $chd)
                                        @if($chd->parent_id==$par->id)
                                        <div class="row">
                                            <div class="col-md-8">
                                            {{$chd->name}}
                                            </div>
                                            <div class="col-md-4">
                                            <a title="Delete" onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('child.delete',[$chd->id])}}"><span title="Delete Degree" class="mdi mdi-window-close text-danger"></span></a>
                                            </div>
                                        </div>                                   
                                        @endif
                                    @endforeach
                                    </td>
                                    <td>
                                        @if ($par->status == 1)
                                        <label class="badge badge-success">Active</label> 
                                        @else
                                        <label class="badge badge-danger">Inactive</label> 
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-success p-1 mt-1" href="{{route('education.edit',[$par->id])}}"><span title="Edit education" class="mdi mdi-pencil"></span></a>
                                        <a class="btn btn-danger p-1 mt-1" onClick="return confirm('Are you sure you want to Destroy this data permanently?')"  href="{{route('parent.delete',[$par->id])}}"><span title="Delete education"  class="mdi mdi-delete"></span></a>
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