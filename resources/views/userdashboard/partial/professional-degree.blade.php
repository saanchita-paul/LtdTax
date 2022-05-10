<?php
$counter = 1;
?>
@if(count($skill)>0)

<form action="{{route('update.professional-degree')}}" method="POST">
@csrf
	<div class="row">
		<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group-s mt-3">
				<label class="profile_details_text-required">Professional Degree</label><br>
                    <?php 
                     $degree_stored = App\Models\CandidateProfessionalDegree::where('status',1)->where('user_id',Auth::user()->id)->get();
                     $professional_degree= App\Models\ProfessionalDegree::where('status',1)->get();
                    ?>
                <select required class="form-control professional-degree" id="professional_degree" name="professional_degree[]"  multiple="multiple">
                    @foreach($professional_degree as $degree)
                    <option value="{{$degree->id}}" @if($degree_stored != '') @foreach($degree_stored as
                    $deg){{ $deg->degree_id == $degree->id ? 'selected': ''}} @endforeach @endif> {{ $degree->degree_title }}</option>
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
<form action="{{route('update.professional-degree')}}" method="POST">
@csrf
	<div class="row">
    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
			<div class="form-group-s mt-3">
				<label class="profile_details_text-required">Skills</label><br>
				<?php  $professional_degree = App\Models\ProfessionalDegree::where('status',1)->get();?>
				<select required class="form-control professional-degree" id="professional_degree" name="professional_degree[]"  multiple="multiple">
					@foreach($professional_degree as $degree)
					<option value="{{$degree->id}}"> {{$degree->degree_tilte}}</option>
					@endforeach
				</select>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 submit">
			<div class="form-group-s mt-3 mb-5 sc-btn">
				<input type="submit" class="btn btn-success btn-save" value="Save">
			</div>
			<div class="form-group-s mt-3 mb-5 pl-3 sc-btn ">
				<a href="/" class="btn btn-primary">cancel</a>
			</div>
		</div>
	</div>
</form>
@endif