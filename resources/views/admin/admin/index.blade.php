@extends('admin')
@section('content')
<style>
.alert-success {
color:#007050;
background-color: rgba(25, 216, 149, 0.2);
border-color:transparent;
}
</style>
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
                    <h4 class="card-title">All Admins</h4>
                    <a href="{{route('admin.add')}}" class="btn btn-primary mb-4 float-right p-2"><span class="mdi mdi-plus"></span>Create New Admin</a>
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
                                @foreach($admin as $a)
                                <tr>
                                    <td><?php echo $counter ++;?></td>
                                    <td><img src="{{asset('uploads/users/'.$a->photo)}}" alt="{{$a->name}}"></td>
                                    <td>{{$a->name}}</td>
                                    <td>{{$a->username}}</td>
                                    <td>{{$a->phone}}</td>
                                    <td>{{$a->email}}</td>
                                    <td>
                                        @if(Auth::user()->id == $a->id)
                                        <a class="btn btn-success p-1 mt-1" href="{{route('admin.edit',$a->id)}}">
                                           <span title="Edit admin" class="mdi mdi-pencil"></span>
                                        </a>
                                        @else
                                        <a class="btn btn-success p-1 mt-1" href="{{route('admin.edit',$a->id)}}">
                                            <span title="Edit Admin" class="mdi mdi-pencil"></span>
                                        </a>
                                        <a class="btn btn-danger p-1 mt-1" onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('admin.delete',$a->id)}}">
                                            <span title="Delete admin"  class="mdi mdi-delete"></span>
                                        </a>
                                        @endif
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