@extends('admin')

@section('content')
<style>
.alert-success {
color:#007050!;
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
          <h4 class="card-title">All books</h4>
          <a href="{{URL('/admin/books/add')}}" class="btn btn-primary mb-4 float-right p-2"><span class="mdi mdi-plus"></span>Add New Book</a>
            <div class="table-responsive">
              <table id="order-listing" class="table emm_datatable">
                <thead>
                  <tr>
                    <th>#SL</th>
                    <th>Feature Image</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($book as $key=>$bk)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>@if($bk->feature_img) <img src="{{asset('uploads/book/'.$bk->feature_img)}}" alt="{{$bk->name}}" style="width:80px!important;height:auto!important;border-radius:unset!important;"> @endif</td>                           
                    <td title="{{$bk->name}}">{{\Illuminate\Support\Str::limit($bk->name, 35, $end='...')}}</td>
                    <td>{{$bk->author_name}}</td>
                    <td>
                      <a class="btn btn-success p-1 mt-1" href="{{route('books.edit',[$bk->id])}}">
                        <span title="Edit book" class="mdi mdi-pencil"></span>
                      </a>
                      <a class="btn btn-danger p-1 mt-1" onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('books.delete',[$bk->id])}}">
                      <span title="Delete book"  class="mdi mdi-delete"></span>
                      </a>
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