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
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bold mb-4">Add Training</h5>
                    <form role="form" class="forms-sample" action="{{route('training.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <div class="row">
                                <div class="col-lg-6">
                                    <label for="title">Topic Title <span class="required-icon">*</span></label>
                                    <input type="text" required="" maxlength="100" class="form-control" id="title" name="title" value="{{old('title')}}" placeholder="Please enter title">
                                </div>
                                <div class="col-lg-6">
                                    <label for="tcat_id">Training Category <span class="required-icon">*</span></label>
                                    <select name="tcat_id" required="" id="tcat_id" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $cat)
                                        <option value="{{$cat->id}}">{{$cat->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="train_img">Image <span class="required-icon">*</span></label>
                            <input type="file" required="" name="train_img" class="dropify" data-height="70">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="start_date">Training Start Date <span class="required-icon">*</span></label>
                                    <input type="date" required="" class="form-control" id="start_date" name="start_date" value="{{old('start_date')}}" placeholder="dd/mm/yyyy">
                                </div>
                                <div class="col-lg-6">
                                    <label for="end_date">Training End Date <span class="required-icon">*</span></label>
                                    <input type="date" required="" class="form-control" id="end_date" name="end_date" value="{{old('start_date')}}" placeholder="dd/mm/yyyy">   
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="end_of_reg">Registration Deadline <span class="required-icon">*</span></label>
                                    <input type="date" required="" class="form-control" id="end_of_reg" name="end_of_reg" value="{{old('end_of_reg')}}" placeholder="dd/mm/yyyy">
                                </div>
                                <div class="col-lg-6">
                                    <label for="venue">Venue <span class="required-icon">*</span></label>
                                    <input type="text" required="" maxlength="100" class="form-control" id="venue" name="venue" value="{{old('venue')}}" placeholder="Please enter venue">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="duration">Duration <span class="required-icon">*</span></label>
                            <input type="text" required="" maxlength="100" class="form-control" id="duration" name="duration" value="{{old('duration')}}" placeholder="Please enter duration">
                        </div>
                        <div class="form-group">
                          <div class="row">
                                <div class="col-lg-6">
                                    <label for="regular_price">Regular Price <span class="required-icon">*</span></label>
                                    <input type="number" required="" min="0" maxlength="15" class="form-control" id="regular_price"  name="regular_price" value="{{old('regular_price')}}" placeholder="Training regular price"> 
                                </div>
                                <div class="col-lg-6">
                                    <label for="price">Sale Price <span class="required-icon">*</span></label>
                                    <input type="number" required="" min="0" maxlength="15" class="form-control" id="price"  name="price" value="{{old('price')}}" placeholder="Training sale price">
                                </div>
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="course_outline">Course Outline</label><br>
                            <textarea class="form-control ckeditor" maxlength="5000" name="course_outline" id="course_outline" cols="60" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="participant">Who Can Attend(Participants)</label><br>
                            <textarea class="form-control ckeditor" maxlength="5000" name="participant" id="participant" cols="60" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="outcome">Outcome</label><br>
                            <textarea class="form-control ckeditor" maxlength="5000" name="outcome" id="outcome" cols="60" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="trainer_id">Select Trainer <span class="required-icon">*</span></label>
                            <select name="trainer_id" required="" id="trainer_id" class="form-control trainer-select">
                                <option value="">Select Trainer</option>
                                @foreach($trainer as $t)
                                <option data-content="" data-image="{{asset('uploads/users/'.$t->photo)}}" value="{{$t->id}}">{{$t->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="trainer_position">Trainer Position <span class="required-icon">*</span></label>
                            <input type="text" class="form-control" maxlength="100" id="trainer_position" name="trainer_position" value="{{old('trainer_position')}}" placeholder="Trainer position">
                        </div>
                        <div class="form-group">
                            <label for="trainer_cv">Trainer Cv</label><br>
                            <textarea class="form-control ckeditor" maxlength="5000" name="trainer_cv" id="trainer_cv" cols="60" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Add Training</button>
                        <a href="/dashboard" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection