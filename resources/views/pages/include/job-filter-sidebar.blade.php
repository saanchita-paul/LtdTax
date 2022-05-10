<?php
$professional_degree = App\Models\ProfessionalDegree::where('status',1)->get();
$location = App\Models\Location::whereNull('district_id')->get();
?>
<div class="filter-menu">
    <form>
        <div class="panel panel-default">
            <div class="">
                <div class="bg-secondary text-white br-rad">
                    <h6 class="m-0 p-2"> Job Filters</h6>
                </div>
            </div>
            <div class="panel-body">
                <div class="panel-group" id="filter-menu" role="tablist"
                    aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <a class="panel-title f-15 accordion-toggle" role="button"
                                data-toggle="collapse" href="#collapseOne" aria-expanded="true"
                                aria-controls="collapseOne">
                                Category
                            </a>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                            aria-labelledby="headingOne">
                            <div class="panel-body">
                                @foreach($categories as $cat)
                                    <div class="checkbox">
                                        <label>
                                        <input type="radio" class="filter-input" data-title="{{$cat->title}}" name="category"  value="{{$cat->id}}"> {{$cat->title}}
                                        </label>
                                    </div>
                                @endforeach                                              
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <a class="panel-title f-15 accordion-toggle" role="button"
                                data-toggle="collapse" href="#collapseQua" aria-expanded="true"
                                aria-controls="collapseOne">
                                Qualification 
                            </a>
                        </div>
                        <div id="collapseQua" class="panel-collapse collapse in" role="tabpanel"
                            aria-labelledby="headingOne">
                            <div class="panel-body">
                                @foreach($education as $edu)
                                <div class="checkbox">
                                    <label>
                                    <input type="radio" data-title="{{$edu->name}}" class="filter-input"  name="qualification"  value="{{$edu->id}}"> {{$edu->name}}
                                    </label>
                                </div>
                                @endforeach                                              
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <a class="panel-title f-15 accordion-toggle" role="button"
                                data-toggle="collapse" href="#collapseDeg" aria-expanded="true"
                                aria-controls="collapseOne">
                                Professional Degree 
                            </a>
                        </div>
                        <div id="collapseDeg" class="panel-collapse collapse in" role="tabpanel"
                            aria-labelledby="headingOne">
                            <div class="panel-body">
                                @foreach($professional_degree as $deg)
                                <div class="checkbox">
                                    <label>
                                    <input type="radio" class="filter-input" data-title="{{$deg->degree_title}}"  name="pro_degree"  value="{{$deg->id}}"> {{$deg->degree_title}}
                                    </label>
                                </div>
                                @endforeach                                              
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <a class="panel-title f-15 accordion-toggle collapsed" role="button"
                                data-toggle="collapse" href="#collapseThree"
                                aria-expanded="false" aria-controls="collapseThree">
                                Salary
                            </a>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingThree">
                            <div class="panel-body">
                                <div class="checkbox"><div class="range-slider">
                                    <input type="text" readonly id="salaryfillter" value="৳ 0 - ৳ 30000" name="salary" class="salary mb-2" style="font-size:14px;border:0;margin-left:-3px;">
                                    <div id="salary-slider-range"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <a class="panel-title f-15 accordion-toggle collapsed" role="button"
                                data-toggle="collapse" href="#collapseAge"
                                aria-expanded="false" aria-controls="collapseThree">
                                Age Limit
                            </a>
                        </div>
                        <div id="collapseAge" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingThree">
                            <div class="panel-body">
                                <div class="checkbox"><div class="range-slider">
                                    <input type="text" readonly id="agefillter" value="Age: 18-60" name="age" class="salary mb-2" style="font-size:14px;border:0;margin-left:-2px;">
                                    <div id="age-limit"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingsix">
                            <a class="panel-title f-15 accordion-toggle collapsed" role="button"
                                data-toggle="collapse" href="#collapseExp" aria-expanded="false"
                                aria-controls="collapsesix">
                                Experience
                            </a>
                        </div>
                        <div id="collapseExp" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingsix">
                            <div class="panel-body">
                                <div class="input-group">
                                    <!-- <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">In Years</span>
                                    </div> -->
                                    <select class="form-control filter-input" name="expe">
                                        <option value="">Select Year</option>
                                        <?php
                                            for ($i=1; $i<=50; $i++)
                                            { ?>
                                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>                                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingsix">
                            <a class="panel-title f-15 accordion-toggle collapsed" role="button"
                                data-toggle="collapse" href="#collapsesix" aria-expanded="false"
                                aria-controls="collapsesix">
                                Location
                            </a>
                        </div>
                        <div id="collapsesix" class="panel-collapse collapse" role="tabpanel"
                            aria-labelledby="headingsix">
                            <div class="panel-body loc-height">
                            @foreach($location as $loca)
                                <div class="checkbox"><label><input type="radio" data-title="{{$loca->name}}" class="filter-input" name="location" value="{{$loca->id}}">
                                    {{$loca->name}}</label>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>