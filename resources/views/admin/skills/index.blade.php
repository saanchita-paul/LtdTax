@extends('admin')

@section('content')
<div class="content-wrapper">
    @if ($errors->any())
    <div class="alert alert-warning" role="alert">
        <strong>Warning! </strong> @if ($errors->count() == 1)
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
        <div class="col-md-5 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Skill</h4>
                    <form class="forms-sample" action="{{route('skills.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title <span class="required-icon">*</span></label>
                            <input required="" type="text" class="form-control" name="title" id="title" placeholder="Enter Skill Title">
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Add Skill</button>
                        <a href="/dashboard" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Skills</h4>
                    <div class="table-responsive">
                        <table id="order-listing" class="table emm_datatable">
                            <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($skills as $skill)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td title="{{$skill->skill_title}}">{{\Illuminate\Support\Str::limit($skill->skill_title, 30, $end='...')}}</td>
                                    <td>
                                        <a class="btn btn-success p-1 mt-1" href="{{route('skills.edit',$skill->id)}}"><span title="Edit skill" class="mdi mdi-pencil"></span></a>
                                        <a class="btn btn-danger p-1 mt-1" onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('skills.delete',[$skill->id])}}"><span title="Delete skill"  class="mdi mdi-delete"></span></a>
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
