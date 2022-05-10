
<?php
$edu= App\Models\EducationInfo::where('user_id',Auth::user()->id)->get()->toArray();
$counter = 1;
$dcount=1;
$year = array('1950'=>"1950", '1951'=>"1951", '1952'=>"1952", '1953'=>"1953", '1954'=>"1954", '1955'=>"1955", '1956'=>"1956", '1957'=>"1957", '1958'=>"1958", '1959'=>"1959", '1960'=>"1960", '1961'=>"1961", '1962'=>"1962", '1963'=>"1963", '1964'=>"1964", '1965'=>"1965", '1966'=>"1966", '1967'=>"1967", '1968'=>"1968", '1969'=>"1969", '1970'=>"1970", '1971'=>"1971", '1972'=>"1972", '1973'=>"1973", '1974'=>"1974", '1975'=>"1975", '1976'=>"1976", '1977'=>"1977", '1978'=>"1978", '1979'=>"1979", '1980'=>"1980", '1981'=>"1981", '1982'=>"1982", '1983'=>"1983", '1984'=>"1984", '1985'=>"1985", '1986'=>"1986", '1987'=>"1987", '1988'=>"1988", '1989'=>"1989", '1990'=>"1990", '1991'=>"1991", '1992'=>"1992", '1993'=>"1993", '1994'=>"1994", '1995'=>"1995", '1996'=>"1996", '1997'=>"1997", '1998'=>"1998", '1999'=>"1999", '2000'=>"2000", '2001'=>"2001", '2002'=>"2002", '2003'=>"2003", '2004'=>"2004", '2005'=>"2005", '2006'=>"2006", '2007'=>"2007", '2008'=>"2008", '2009'=>"2009", '2010'=>"2010", '2011'=>"2011", '2012'=>"2012", '2013'=>"2013", '2014'=>"2014", '2015'=>"2015", '2016'=>"2016", '2017'=>"2017", '2018'=>"2018", '2019'=>"2019", '2020'=>"2020", '2021'=>"2021");

// dd(count($edu));
?>
@if(count($edu)>0)
@foreach($edu as $e)
<form action="{{route('add.education')}}" method="POST">
    @csrf
    <div id="education_section_content">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h6 class="mt-3">Academic <?php echo $counter++;?>
                </h6>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                <?php $all_edu = App\Models\Education::where('status',1)->where('parent_id',NULL)->get();?>
                    <label for="level_of_education" class="profile_details_text-required">Level Of Education</label>
                    <select data-id="<?php echo $dcount;?>" class="form-control form-control-sm academic_qualification academic_qualification_<?php echo $dcount;?>" id="level_of_education" name="level_of_education[]" required="">
                        <option value="">--Select Education level--</option>
                        @foreach($all_edu as $ed)
                            <option value="{{$ed->id}}"  {{ $e['parent_id'] == $ed->id ? 'selected' : '' }} >{{$ed->name}}</option>
                        @endforeach
                    </select>
                    @error('level_of_education')
                    <small
                        class="error text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="exm_degree" class="profile_details_text-required">Exam / Degree</label>
                    <?php $sub_edu = App\Models\Education::where('status',1)->where('parent_id',$e['parent_id'])->get();?>
                    <select class="form-control form-control-sm exam_degree_<?php echo $dcount++;?>" id="exm_degree" name="exm_degree[]" required="">
                    <option value="">--Select Degree--</option>
                    @foreach($sub_edu as $sub)
                    <option value="{{ $sub->id }}"  @if($sub->id == $e['child_id']) selected @endif >
                        {{ $sub->name }}
                    </option>
                    @endforeach
                    </select>
                    @error('exm_degree')
                    <small
                        class="error text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="major_group"  class="profile_details_text-required">Concentration/ Major/Group </label>
                    <input name="major_group[]" value="{{$e['major']}}" type="text" class="form-control form-control-sm" maxlength="50" required="">
                    @error('major_group')
                    <small
                        class="error text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="institution" class="profile_details_text-required">Institution</label>
                    <input name="institution[]" value="{{$e['institution']}}" type="text" class="form-control form-control-sm" maxlength="100" required="">
                    @error('institution')
                    <small
                        class="error text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="board" class="profile_details_text">Board</label>

                    <select class="form-control form-control-sm" id="board" name="board[]" >
                        <option value="11">--Select Board --</option>
                        <option value="0" {{ $e['board'] == 0 ? 'selected' : '' }}>Barisal</option>
                        <option value="1" {{ $e['board'] == 1 ? 'selected' : '' }}>Chittagong</option>
                        <option value="2" {{ $e['board'] == 2 ? 'selected' : '' }}>Comilla</option>
                        <option value="3" {{ $e['board'] == 3 ? 'selected' : '' }}>Dhaka</option>
                        <option value="4" {{ $e['board'] == 4 ? 'selected' : '' }}>Dinajpur</option>
                        <option value="5" {{ $e['board'] == 5 ? 'selected' : '' }}>Jashore</option>
                        <option value="6" {{ $e['board'] == 6 ? 'selected' : '' }}>Mymensingh</option>
                        <option value="7" {{ $e['board'] == 7 ? 'selected' : '' }}>Rajshahi</option>
                        <option value="8" {{ $e['board'] == 8 ? 'selected' : '' }}>Sylhet</option>
                        <option value="9" {{ $e['board'] == 9 ? 'selected' : '' }}>Madrasha</option>
                        <option value="10" {{ $e['board'] == 10 ? 'selected' : '' }}>Technical</option>
                        <option value="11" {{ $e['board'] == 11 ? 'selected' : '' }}>Others</option>

                    </select>
                    @error('board')
                    <small
                        class="error text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="result" class="profile_details_text-required">Result </label>
                    <select class="form-control form-control-sm" id="result" name="result[]" required="">
                        <option value="0" {{ $e['result'] == 0 ? 'selected' : '' }}>First Division</option>
                        <option value="1" {{ $e['result'] == 1 ? 'selected' : '' }}>Second Division</option>
                        <option value="2" {{ $e['result'] == 2 ? 'selected' : '' }}>Third Division</option>
                        <option value="3" {{ $e['result'] == 3 ? 'selected' : '' }}>Grade</option>
                        <option value="4" {{ $e['result'] == 4 ? 'selected' : '' }}>Appeared</option>
                        <option value="5" {{ $e['result'] == 5 ? 'selected' : '' }}>Enrolled</option>
                        <option value="6" {{ $e['result'] == 6 ? 'selected' : '' }}>Awarded</option>
                        <option value="7" {{ $e['result'] == 7 ? 'selected' : '' }}>Do Not Mention</option>
                        <option value="8" {{ $e['result'] == 8 ? 'selected' : '' }}>Pass</option>
                    </select>
                    @error('result')
                    <small
                        class="error text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="cgpa" class="profile_details_text-required">CGPA / Scale / Percentage </label>
                    <input name="cgpa[]" type="number" min="1" step="0.01" value="{{$e['cgpa']}}" class="form-control form-control-sm" required="">
                    @error('cgpa')
                    <small
                        class="error text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="pass_year" class="profile_details_text-required">Pass Year </label>
                    <select class="form-control form-control-sm" id="pass_year" name="pass_year[]" required="">
                        <option value="">--Select Passing Year--</option>
                        @foreach ($year as $k => $v)
                        <option value="{{ $k }} "  
                        @if($k == $e['pass_year']) selected @endif >
                        {{ $v }}
                        </option>
                        @endforeach
                    </select>
                    @error('pass_year')
                    <small
                        class="error text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="duration" class="profile_details_text-required">Duration </label>
                    <input name="duration[]" id="duration" min="1" max="100" value="{{$e['duration']}}" type="number" class="form-control form-control-sm" required="">
                    @error('duration')
                    <small
                        class="error text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="achievement" class="profile_details_text"> Achievement </label>
                    <input name="achievement[]" id="achievement" value="{{$e['achievement']}}" type="text" maxlength="50" title="Achievement should not contain more than 50 characters." class="form-control form-control-sm">
                    @error('achievement')
                    <small
                        class="error text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>


        </div>
    </div>
    
    <!-- <div class="d-flex justify-content-end">
        <button type="button" class="popup" data-trigger="focus">Add More</button>
    </div> -->
    @endforeach
    <div id="educationCard" class="dis-none">
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 mb-3 submit  pl-0">
        <a class="btn add-edu-btn popup" href=""><i class="fa fa-plus" aria-hidden="true"></i>
            Add Education (If
            Required)</a>
    </div>

    <div class="row">
        <div
            class="col-lg-6 col-md-12 col-sm-12 col-xs-12 submit">
            <div class="form-group-s mt-2 mb-5 sc-btn">
                <input type="submit"
                    class="btn btn-success btn-save"
                    value="Save">
            </div>
            <div class="form-group-s mt-2 mb-5 pl-3 sc-btn ">
            <a href="/" class="btn btn-primary">cancel</a>
            </div>
        </div>
    </div>
</form>
@else
<?php $counter=1;?>
<form action="{{route('add.education')}}" method="POST">
    @csrf
    <div id="education_section_content">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <h6 class="mt-2">Academic 1
                </h6>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <?php $education =App\Models\Education::where('status',1)->where('parent_id',NULL)->get(); ?>
                    <label for="level_of_education" class="profile_details_text-required">Level Of Education</label>
                    <select data-id="1" class="form-control form-control-sm academic_qualification academic_qualification_1" id="level_of_education" name="level_of_education[]" required="">
                        <option value="">--Select Education level--</option>
                        <@foreach ($education as $edu)
                            <option value="{{$edu->id}}">{{$edu->name}}</option>
                        @endforeach
                    </select>
                    @error('level_of_education')
                    <small
                        class="error text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="exm_degree" class="profile_details_text-required">Exam / Degree</label>
                    <select class="form-control form-control-sm exam_degree_1" id="exm_degree" name="exm_degree[]" required="">
                        <option value="">--Select Degree--</option>
                    </select>
                    @error('exm_degree')
                    <small
                        class="error text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="major_group" class="profile_details_text-required">Concentration/ Major/Group </label>
                    <input name="major_group[]" value="{{old('major_group')}}" type="text" class="form-control form-control-sm" maxlength="50"  required="">
                    @error('major_group')
                    <small
                        class="error text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="institution" class="profile_details_text-required">Institution</label>
                    <input name="institution[]" value="{{old('institution')}}" type="text" class="form-control form-control-sm" maxlength="100" required="">
                    @error('institution')
                    <small
                        class="error text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="board" class="profile_details_text">Board</label>
                    <select class="form-control form-control-sm" id="board" name="board[]">
                        <option value="11">--Select Board --</option>
                        <option value="0">Barisal</option>
                        <option value="1">Chittagong</option>
                        <option value="2">Comilla</option>
                        <option value="3">Dhaka</option>
                        <option value="4">Dinajpur</option>
                        <option value="5">Jashore</option>
                        <option value="6">Mymensingh</option>
                        <option value="7">Rajshahi</option>
                        <option value="8">Sylhet</option>
                        <option value="9">Madrasha</option>
                        <option value="10">Technical</option>
                        <option value="11">Others</option>
                    </select>
                    @error('board')
                    <small
                        class="error text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="result" class="profile_details_text-required">Result </label>
                    <select class="form-control form-control-sm" id="result" name="result[]" required="">
                        <option value="">--Select Result --</option>
                        <option value="0">First Division</option>
                        <option value="1">Second Division</option>
                        <option value="2">Third Division</option>
                        <option value="3">Grade</option>
                        <option value="4">Appeared</option>
                        <option value="5">Enrolled</option>
                        <option value="6">Awarded</option>
                        <option value="7">Do Not Mention</option>
                        <option value="8">Pass</option>
                    </select>
                    @error('result')
                    <small
                        class="error text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="cgpa" class="profile_details_text-required">CGPA / Scale / Percentage </label>
                    <input name="cgpa[]" type="number" min="1" step="0.01"  value="{{old('cgpa')}}" class="form-control form-control-sm" required="">
                    @error('cgpa')
                    <small
                        class="error text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="pass_year"  class="profile_details_text-required">Pass Year </label>
                    <select class="form-control form-control-sm" id="pass_year" name="pass_year[]" required="">
                        <option value="">--Select Passing Year--</option>
                        @foreach($year as $k => $v)
                        <option value="<?php echo $k; ?>">{{ $v }}</option>
                        @endforeach
                    </select>
                    @error('pass_year')
                    <small
                        class="error text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="duration" class="profile_details_text-required">Duration </label>
                    <input name="duration[]" id="duration" value="{{old('duration')}}" min="1" max="100" type="number" class="form-control form-control-sm" required="">
                    @error('duration')
                    <small
                        class="error text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="achievement" class="profile_details_text"> Achievement </label>
                    <input name="achievement[]" id="achievement" value="{{old('achievement')}}" type="text" maxlength="50" title="Achievement should not contain more than 50 characters." class="form-control form-control-sm">
                    @error('achievement')
                    <small
                        class="error text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div id="educationCard" class="dis-none">
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 mb-3 submit pl-0">
        <a class="btn add-edu-btn popup" href=""><i class="fa fa-plus" aria-hidden="true"></i> Add Education (If Required)</a>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 submit">
            <div class="form-group-s mt-2 mb-2 sc-btn">
                <input type="submit"class="btn btn-success btn-save" value="Save">
            </div>
            <div class="form-group-s mt-2 mb-2 pl-3 sc-btn ">
                <a href="/user/dashboard" class="btn btn-primary text-white">cancel</a>
            </div>
        </div>
    </div>
</form>
@endif
@section('js')
<script type="text/javascript">
$('.academic_qualification').on('change',function(){
		var eduID = $(this).val();
        console.log(eduID)
        var eID = $(this).attr('data-id');
		if(eduID)
		{
			$.ajax({
				url : '/user/get/education/'+eduID,
				type : "GET",
				dataType : "json",
				success:function(data)
				{  
                    console.log(data) 
					$('.exam_degree_'+eID).empty();
					$('.exam_degree_'+eID).append('<option value="">--Select Degree--</option>');
					$.each(data, function(key,value){
						$('.exam_degree_'+eID).append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        console.log(value.name)
					});
				}
			});
		}
		else
		{
		$('.exam_degree_'+eID).empty();
		}
	});
</script>
@endsection



