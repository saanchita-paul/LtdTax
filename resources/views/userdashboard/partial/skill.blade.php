<?php
$counter = 1;
?>
@if(count($skill)>0)
<form action="{{route('update.skill')}}" method="POST">
@csrf
	<div class="row">
		<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group-s mt-3">
				<label class="profile_details_text-required">Skills</label><br>
                    <?php 
                     $skill_stored = App\Models\CandidateSkill::where('status',1)->where('user_id',Auth::user()->id)->get();
                     $skills= App\Models\Skill::where('status',1)->get();
                    ?>
                <select required class="form-control js-example-basic-multiple" id="skills" name="skills[]"  multiple="multiple">
                    @foreach($skills as $skill)
                    <option value="{{$skill->id}}" @if($skill_stored != '') @foreach($skill_stored as
                    $skillid){{ $skillid->skill_id == $skill->id ? 'selected': ''}} @endforeach @endif> {{ $skill->skill_title }}</option>
                    @endforeach
				</select>
			</div>
		</div>
	</div>
	<br>	
	<div class="row">
		<div
			class="col-lg-6 col-md-12 col-sm-12 col-xs-12 submit">
			<div class="form-group-s sc-btn">
				<input type="submit"
					class="btn btn-success btn-save"
					value="Save">
			</div>
			<div class="form-group-s pl-3 sc-btn ">
            <a href="/" class="btn btn-primary">cancel</a>
			</div>
		</div>
	</div>
</form>
@else
<form action="{{route('update.skill')}}" method="POST">
@csrf
<div class="row">
<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
<div class="Experience-history mb-4">
<h6>Your Skills</h6>
</div>
</div>
</div>
	<div class="row">
    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group-s mt-3">
				<label
					class="profile_details_text-required">Skills</label>
                    <?php 
                    $skills = App\Models\Skill::where('status',1)->get();
                    ?>
                <select required class="form-control js-example-basic-multiple" id="skills" name="skills[]"  multiple="multiple">
                    @foreach($skills as $skill)
                    <option value="{{$skill->id}}"> {{ $skill->skill_title }}</option>
                    @endforeach
				</select>
			</div>
		</div>
	</div>

	<br>
	<!-- <div id="skillCard" class="dis-none"></div>
	<div class="row">
		<div
			class="col-lg-6 col-md-12 col-sm-12 col-xs-12 submit">
			<a class="btn add-edu-btn popSkill  mt-0" href=""><i
					class="fa fa-plus" aria-hidden="true"></i>
				Add Skill</a>
		</div>
	</div> -->
	
	<div class="row">
		<div
			class="col-lg-6 col-md-12 col-sm-12 col-xs-12 submit">
			<div class="form-group-s mt-3 mb-5 sc-btn">
				<input type="submit"
					class="btn btn-success btn-save"
					value="Save">
			</div>
			<div class="form-group-s mt-3 mb-5 pl-3 sc-btn ">
				<a href="/" class="btn btn-primary">cancel</a>
			</div>
		</div>
	</div>
</form>
@endif