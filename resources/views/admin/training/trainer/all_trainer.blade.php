@extends('admin')
@section('content')
<div class="content-wrapper">
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close bg-danger rounded-right"
            data-dismiss="alert">&times;</button>
        <strong> {{ session()->get('success') }} </strong>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Trainer</h4>
                    <a href="{{route('add.trainer')}}" class="btn btn-primary mb-4 float-right p-2"><span class="mdi mdi-plus"></span>Add New Trainer</a>
                    <div class="table-responsive">
                        <table id="order-listing" class="table emm_datatable">
                            <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $counter = 1; ?>
                                @foreach($trainer as $a)
                                <tr>
                                    <td><?php echo $counter ++;?></td>
                                    <td><img src="{{asset('uploads/users/'.$a->photo)}}" alt="{{$a->name}}"></td>
                                    <td>{{$a->name}}</td>
                                    <td>{{$a->username}}</td>
                                    <td>{{$a->phone}}</td>
                                    <td>{{$a->email}}</td>
                                    <td>
                                        <a class="btn btn-success p-1 mt-1" href="{{route('edit.trainer',$a->id)}}"><span title="Edit trainer" class="mdi mdi-pencil"></span></a>
                                        <a class="btn btn-danger p-1 mt-1" onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('delete.trainer',$a->id)}}"><span title="Delete trainer"  class="mdi mdi-delete"></span></a>
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