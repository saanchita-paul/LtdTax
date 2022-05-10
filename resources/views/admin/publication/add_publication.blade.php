@extends('admin')

@section('content') 

<div class="content-wrapper">
            <div class="row">
              <div class="col-md-8 offset-2 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h3>Add Publication</h3>

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

                    <form role="form" class="forms-sample" action="{{route('pub.store')}}" method="POST" enctype="multipart/form-data">
                    
                    @csrf

                      <div class="form-group">
                        <label for="title">Title <span class="required-icon">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" placeholder="Please enter title"> 
                      </div>


                      <div class="form-group">
                          <label for="pcat_id">Publication Category </label>
                          <select name="pcat_id" id="pcat_id" class="form-control">
                              <option value="">Select Category</option>
                              @foreach($categories as $cat)
                              <option value="{{$cat->id}}">{{$cat->title}}</option>
                              @endforeach
                          </select>
                      </div>

                      <div class="form-group">
                        <label for="short_desc">Short Description</label>
                        <textarea class="form-control" name="short_desc"  rows="3" cols="50">{{old('short_desc')}}</textarea>
                     </div>


                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control ckeditor" name="description"  rows="5" cols="50">{{old('description')}}</textarea>
                     </div>

                    <div class="form-group">
                        <label for="pub_img"> Image</label>
                        <input type="file" name="pub_img" class="dropify" data-height="70">
                      </div>

                      <div class="form-group">
                        <label for="regular_price">Regular Price</label>
                        <input type="number" max="5000" min="1" class="form-control" id="regular_price"  name="regular_price" value="{{old('regular_price')}}" placeholder="Please enter regular price"> 
                      </div>

                      <div class="form-group">
                        <label for="sale_price">Sale Price</label>
                        <input type="number" max="5000" min="1" class="form-control" id="sale_price" name="sale_price" value="{{old('sale_price')}}" placeholder="Please enter sale price"> 
                      </div>

                      <div class="form-group">
                        <label for="file_upload">Upload Main File</label>
                        <input type="file" name="file_upload" class="dropify" data-height="70">
                        <small>Upload Main Pdf file in 5MB</small>
                      </div>

                      <div class="form-group">
                        <label for="file_upload">Upload Demo File</label>
                        <input type="file" name="demo_pdf" class="dropify" data-height="70">
                        <small>Upload Demo Pdf file in 5MB</small>
                      </div>



                      <button type="submit" class="btn btn-success mr-2">Add Publication</button>
                       <a href="/dashboard" class="btn btn-light">Cancel</a>
                    </form>
                  </div>
                </div>
              </div>

              
              
            </div>
          </div>
          @endsection