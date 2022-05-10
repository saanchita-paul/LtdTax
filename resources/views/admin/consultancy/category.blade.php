@extends('admin')
@section('content') 
<div class="content-wrapper">
  @if($errors->any())
    <div class="alert alert-warning" role="alert">
      <strong>Warning! </strong> 
      @if($errors->count() == 1)
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
  @if($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
  @endif
  <div class="row">
    <div class="col-md-5 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Add Category</h4>
          <form role="form" class="forms-sample" action="{{route('concat.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Please enter title"> </div>
            <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" class="form-control" name="description"  rows="4" cols="50"></textarea>
          </div>
          <button type="submit" class="btn btn-success mr-2">Add Category</button>
          <a href="/dashboard" class="btn btn-light">Cancel</a>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-7 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">All Category</h4>
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                  <th>#SL</th>
                  <th>Title</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($categories as $cat)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td title="{{$cat->title}}">{{\Illuminate\Support\Str::limit($cat->title, 30, $end='...')}}</td>
                  <td>
                  @if ($cat->status == 1) <label class="badge badge-success">Active</label> @else <label class="badge badge-danger">Inactive</label> @endif
                  </td>
                  <td>
                  <a class="btn btn-danger p-1 mt-1" onClick="return confirm('Are you sure you want to Destroy category with news permanently?')" href="{{route('concat.delete',[$cat->id])}}"><span title="Delete category" class="mdi mdi-delete"></span></a>
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
