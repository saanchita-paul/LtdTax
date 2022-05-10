@extends('admin')

@section('content') 
<div class="content-wrapper">
            <div class="row">
             
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Publication</h4>
                    <!-- <p class="card-description"> Edit Blog Post with Category </p> -->

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

                    <form class="forms-sample" action="{{route('pub.update',[$publication->id])}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title">Title <span class="required-icon">*</span></label>
                        <input type="text" class="form-control" value="{{$publication->title}}" name="title" id="title" placeholder="Please enter Title">
                    </div>


                        <div class="form-group">
                            <label for="pcat_id">Publication Category</label>
                            <select name="pcat_id" id="pcat_id" class="form-control">
                                @foreach($categories as $cat)
                                <option value="{{$cat->id}}" {{ $cat->id == $publication->pcat_id ? 'selected' : '' }}>{{$cat->title}}</option>
                                @endforeach

                            </select>
                        </div>

                    

                    <div class="form-group">
                        <label for="short_desc">Short Description</label> 
                        <textarea class="form-control" name="short_desc" id="short_desc" rows="2">{{$publication->short_desc}}</textarea>
                    </div>


                    <div class="form-group">
                        <label for="description">Description</label> 
                        <textarea class="form-control ckeditor" name="description" id="description" rows="2">{{$publication->description}}</textarea>
                    </div>

                      <div class="form-group">
                        <label for="pub_img"> Image @if($publication->pub_img)<img src="{{asset('uploads/publication/'.$publication->pub_img)}}" alt="{{$publication->title}}" width="80"> @endif</label>
                        <input type="file" name="pub_img" class="dropify" data-height="70">
                        <input type="hidden" name="hidden_image" value="{{$publication->pub_img}}">
                      </div>
                      <div class="form-group">
                        <label for="regular_price">Regular Price</label>
                        <input type="number" max="5000" min="1" class="form-control" id="regular_price"  name="regular_price" value="@if(!empty($publication->regular_price)){{$publication->regular_price}}@else{{old('regular_price')}}@endif" placeholder="Please enter regular price"> 
                      </div>

                      <div class="form-group">
                        <label for="sale_price">Sale Price</label>
                        <input type="number" max="5000" min="1" class="form-control" id="sale_price" name="sale_price" value="@if(!empty($publication->sale_price)){{$publication->sale_price}}@else{{old('sale_price')}}@endif" placeholder="Please enter sale price"> 
                      </div>

                      <div class="form-group">
                        <label for="file_upload">Upload Main File @if($publication->file_upload)<iframe
                                        src="{{asset('uploads/publication/'.$publication->file_upload)}}"
                                        frameBorder="0"
                                        scrolling="auto"
                                        height="80"
                                        width="120"
                                    ></iframe> @endif</label>
                        <input type="file" name="file_upload" class="dropify" data-height="70">
                        <input type="hidden" name="hidden_file" value="{{$publication->file_upload}}">
                        <small>Upload Main Pdf file in 5MB</small>
                      </div>

                      <div class="form-group">
                        <label for="file_upload">Upload Demo File @if($publication->demo_pdf)<iframe
                                        src="{{asset('uploads/publication/'.$publication->demo_pdf)}}"
                                        frameBorder="0"
                                        scrolling="auto"
                                        height="80"
                                        width="120"
                                    ></iframe> @endif</label>
                        <input type="file" name="demo_pdf" class="dropify" data-height="70">
                        <input type="hidden" name="hidden_file2" value="{{$publication->demo_pdf}}">
                        <small>Upload Demo Pdf file in 5MB</small>
                      </div>
                      
                      
                      <button type="submit" class="btn btn-success mr-2">Update Publication</button>
                       <a href="/dashboard" class="btn btn-light">Cancel</a>
                    </form>
                  </div>
                </div>
              </div>
           

            </div>
          </div>
          @endsection