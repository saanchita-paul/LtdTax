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
    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h5 class="font-weight-bold mb-4">Edit Training</h5>
                    <form role="form" class="forms-sample" action="{{route('training.update',[$training->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <div class="row">
                                <div class="col-lg-6">
                                    <label for="title">Topic Title <span class="required-icon">*</span></label>
                                    <input type="text" required="" maxlength="100" class="form-control" id="title" name="title" value="@if(!empty($training->title)){{$training->title}}@else{{old('title')}}@endif" placeholder="Please enter title">
                                </div>
                                <div class="col-lg-6">
                                    <label for="tcat_id">Training Category <span class="required-icon">*</span></label>
                                    <select name="tcat_id" required="" id="tcat_id" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $cat)
                                        <option value="{{$cat->id}}" {{ $cat->id == $training->tcat_id ? 'selected' : '' }}>{{$cat->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="train_img"> Image <span class="required-icon">*</span>
                                @if(!empty($training->train_img))
                                <img src="{{asset('uploads/training/'.$training->train_img)}}" alt="{{$training->title}}" width="80">
                                @endif
                            </label>
                            <input type="file" name="train_img" class="dropify" data-height="70">
                            <input type="hidden" name="hidden_image" value="{{$training->train_img}}">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="start_date">Training Start Date <span class="required-icon">*</span></label>
                                    <input type="date" required="" class="form-control" id="start_date" name="start_date" value="@if(!empty($training->start_date)){{$training->start_date}}@else{{old('start_date')}}@endif" placeholder="dd/mm/yyyy">
                                </div>
                                <div class="col-lg-6">
                                    <label for="end_date">Training End Date <span class="required-icon">*</span></label>
                                    <input type="date" required="" class="form-control" id="end_date" name="end_date" value="@if(!empty($training->end_date)){{$training->end_date}}@else{{old('end_date')}}@endif" placeholder="dd/mm/yyyy">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="end_of_reg">Registration Deadline <span class="required-icon">*</span></label>
                                    <input type="date" required="" class="form-control" id="end_of_reg" name="end_of_reg" value="@if(!empty($training->end_of_reg)){{$training->end_of_reg}}@else{{old('end_of_reg')}}@endif" placeholder="dd/mm/yyyy">
                                </div>
                                <div class="col-lg-6">
                                    <label for="venue">Venue <span class="required-icon">*</span></label>
                                    <input type="text" required="" maxlength="100" class="form-control" id="venue" name="venue" value="@if(!empty($training->venue)){{$training->venue}}@else{{old('venue')}}@endif" placeholder="Please enter venue">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="duration">Duration <span class="required-icon">*</span></label>
                            <input type="text" required="" maxlength="100" class="form-control" id="duration" name="duration" value="@if(!empty($training->duration)){{$training->duration}}@else{{old('duration')}}@endif" placeholder="Please enter duration">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="regular_price">Regular Price <span class="required-icon">*</span></label>
                                    <input type="number" required="" min="0" maxlength="15" class="form-control" id="regular_price"  name="regular_price" value="@if(!empty($training->regular_price)){{$training->regular_price}}@else{{old('regular_price')}}@endif" placeholder="Package regular price">
                                </div>
                                <div class="col-lg-6">
                                    <label for="price">Sale Price <span class="required-icon">*</span></label>
                                    <input type="number" required="" min="0" maxlength="15" class="form-control" id="price"  name="price" value="@if(!empty($training->price)){{$training->price}}@else{{old('price')}}@endif" placeholder="Package sale price">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="course_outline">Course Outline</label><br>
                            <textarea class="form-control ckeditor" maxlength="5000" name="course_outline" id="course_outline" cols="60" rows="5">@if(!empty($training->course_outline)){{$training->course_outline}}@else{{old('course_outline')}}@endif</textarea>
                        </div>
                        <div class="form-group">
                            <label for="participant">Who Can Attend(Participants)</label><br>
                            <textarea class="form-control ckeditor" maxlength="5000" name="participant" id="participant" cols="60" rows="5">@if(!empty($training->participant)){{$training->participant}}@else{{old('participant')}}@endif</textarea>
                        </div>
                        <div class="form-group">
                            <label for="outcome">Outcome</label><br>
                            <textarea class="form-control ckeditor" maxlength="5000" name="outcome" id="outcome" cols="60" rows="5">@if(!empty($training->outcome)){{$training->outcome}}@else{{old('outcome')}}@endif</textarea>
                        </div>
                        <div class="form-group">
             
                            <label for="trainer_id">Select Trainer <span class="required-icon">*</span></label>
                            <select name="trainer_id" required="" id="trainer_id" class="form-control trainer-select">
                                <option value="">Select Trainer</option>
                                @foreach($trainer as $t)
                                <option data-image="{{asset('uploads/users/'.$t->photo)}}" value="{{$t->id}}" {{ $t->id == $training->trainer_id ? 'selected' : '' }}>{{$t->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="trainer_position">Trainer Position <span class="required-icon">*</span></label>
                            <input type="text" class="form-control" maxlength="100" id="trainer_position" name="trainer_position" value="@if(!empty($training->trainer_position)){{$training->trainer_position}}@else{{old('trainer_position')}}@endif" placeholder="Trainer position">
                        </div>
                        <div class="form-group">
                            <label for="trainer_cv">Trainer Cv</label><br>
                            <textarea class="form-control ckeditor" maxlength="5000" name="trainer_cv" id="trainer_cv" cols="60" rows="5">@if(!empty($training->trainer_cv)){{$training->trainer_cv}}@else{{old('trainer_cv')}}@endif</textarea>
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Update Training</button>
                        <a href="/dashboard" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection