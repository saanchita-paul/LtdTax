@extends('admin')

@section('content') 
<div class="content-wrapper">
            <div class="row">
             
              <div class="col-md-5 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Category</h4>
                    <!-- <p class="card-description"> Category & Subcategory for Blog </p> -->

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
                            <div class="alert alert-success" role="alert">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                    <form class="forms-sample" action="{{route('pubcat.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title">Title <span class="required-icon">*</span></label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title">
                    </div>



                    <div class="form-group">
                        <label for="description">Description</label> 
                        <textarea class="form-control" name="description" id="description" rows="2"></textarea>
                    </div>

                      <div class="form-group">
                        <label>Category Image</label>
                        <input type="file" name="cat_img" class="dropify" data-height="70">
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
                    <!-- <p class="card-description"> Blog all category & subcategory </p> -->
                    <div class="table-responsive">
                      <table id="order-listing" class="table emm_datatable">
                        <thead>
                          <tr>
                            <th>#SL</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $cat)
                          <tr>
                            <td>{{$no++}}</td>
                            <td>{{$cat->title}}</td>
                            <td>@if($cat->cat_img) <img src="{{asset('uploads/publication/'.$cat->cat_img)}}" alt="{{$cat->title}}" style="width:80px!important;height:auto!important;border-radius:unset!important;"> @endif</td>

                            <td>
                              <button class="btn btn-outline-danger"><a onClick="return confirm('Are you sure you want to Destroy this data permanently?')" href="{{route('pubcat.delete',[$cat->id])}}"><i class="mdi mdi-delete"></i></a></button>
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