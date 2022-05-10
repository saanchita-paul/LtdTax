@extends('master')

@section('content')
<main>
    <!-- search-area -->
    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="form">
                        <div class="form-item">
                            <input type="password" id="password" autocomplete="on" required>
                            <label for="password">Job Title, Keywords</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form">
                        <div class="form-item">
                            <input type="password" id="password" autocomplete="on" required>
                            <label for="password">City</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="selection-area">
                        <div class="select-dropdown">
                            <select>
                                <option value="Option 1">Select Organization</option>
                                <option value="Option 2">Construction</option>
                                <option value="Option 3">Employer</option>
                                <option value="Option 3">Financial Career</option>
                                <option value="Option 3">Information Technolory</option>
                                <option value="Option 3">Marketing</option>
                                <option value="Option 3">Quality Check</option>
                                <option value="Option 3">Real Estate</option>
                                <option value="Option 3">Seles</option>
                                <option value="Option 3">Supporting</option>
                                <option value="Option 3">Teaching</option>
                            </select>
                        </div>
                        <div class="job-search-btn">
                            <a class="btn btn-primary" href=""> Find Job</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="job-filter-list mt-20">
        <div class="primary">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="filter-menu">
                            <form>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <!-- /.panel-title -->
                                        <div class="panel-body">
                                            <button class="btn btn-default" type="submit">Apply Filters</button>
                                            <!-- <a class="btn btn-sm btn-link pull-right visible-sm-inline"
                                                    href="#">Clear Selections</a> -->
                                            <a class="btn btn-sm btn-link pull-right hidden-sm" href="#">Reset</a>
                                        </div><!-- /.panel-body -->
                                    </div><!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <div class="panel-group" id="filter-menu" role="tablist"
                                            aria-multiselectable="true">
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="headingOne">
                                                    <a class="panel-title accordion-toggle" role="button"
                                                        data-toggle="collapse" href="#collapseOne" aria-expanded="true"
                                                        aria-controls="collapseOne">
                                                        Companies
                                                    </a><!-- /.panel-title -->
                                                </div><!-- /.panel-heading -->
                                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                                    aria-labelledby="headingOne">
                                                    <div class="panel-body">
                                                        <div class="checkbox"><label><input type="checkbox"
                                                                    name="career_state[]" value="recent_graduate">
                                                                Job Mirror
                                                                Consultancy</label>
                                                        </div>
                                                        <div class="checkbox"><label><input type="checkbox"
                                                                    name="career_state[]" value="imposter_syndrome">
                                                                Engineering
                                                                Group</label></div>
                                                        <div class="checkbox"><label><input type="checkbox"
                                                                    name="career_state[]" value="wise_old_head">
                                                                Electric Co.</label></div>
                                                        <div class="checkbox"><label><input type="checkbox"
                                                                    name="career_state[]" value="wise_old_head">
                                                                Telecom industry</label></div>
                                                    </div><!-- /.panel-body -->
                                                </div><!-- /.panel-collapse -->
                                            </div><!-- /.panel -->

                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="headingTwo">
                                                    <a class="panel-title accordion-toggle collapsed" role="button"
                                                        data-toggle="collapse" href="#collapseTwo" aria-expanded="false"
                                                        aria-controls="collapseTwo">
                                                        Experience
                                                    </a><!-- /.panel-title -->
                                                </div><!-- /.panel-heading -->
                                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel"
                                                    aria-labelledby="headingTwo">
                                                    <div class="panel-body">
                                                        <div class="checkbox"><label><input type="checkbox"
                                                                    name="topic[]" value="politics">
                                                                0-1 Years</label>
                                                        </div>
                                                        <div class="checkbox"><label><input type="checkbox"
                                                                    name="topic[]" value="religion">1-2
                                                                Years</label>
                                                        </div>
                                                        <div class="checkbox"><label><input type="checkbox"
                                                                    name="topic[]" value="music"> 2-3
                                                                Years</label></div>
                                                        <div class="checkbox"><label><input type="checkbox"
                                                                    name="topic[]" value="music">3-4
                                                                Years</label></div>
                                                        <div class="checkbox"><label><input type="checkbox"
                                                                    name="topic[]" value="music"> 4-5
                                                                Years</label></div>
                                                    </div><!-- /.panel-body -->
                                                </div><!-- /.panel-collapse -->
                                            </div><!-- /.panel -->

                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="headingThree">
                                                    <a class="panel-title accordion-toggle collapsed" role="button"
                                                        data-toggle="collapse" href="#collapseThree"
                                                        aria-expanded="false" aria-controls="collapseThree">
                                                        Salary
                                                    </a><!-- /.panel-title -->
                                                </div><!-- /.panel-heading -->
                                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                                                    aria-labelledby="headingThree">
                                                    <div class="panel-body">
                                                        <div class="checkbox"><label><input type="checkbox"
                                                                    name="format[]" value="magazine">
                                                                $0-$500</label></div>
                                                        <div class="checkbox"><label><input type="checkbox"
                                                                    name="format[]" value="website">
                                                                $500-$1000</label>
                                                        </div>
                                                        <div class="checkbox"><label><input type="checkbox"
                                                                    name="format[]" value="vine">
                                                                $1000-$1500</label></div>
                                                        <div class="checkbox"><label><input type="checkbox"
                                                                    name="format[]" value="tweet">
                                                                $1500-$2000</label>
                                                        </div>
                                                        <div class="checkbox"><label><input type="checkbox"
                                                                    name="format[]" value="tweet">
                                                                $2000-$2500</label>
                                                        </div>
                                                        <div class="checkbox"><label><input type="checkbox"
                                                                    name="format[]" value="tweet">
                                                                $2500-$3000</label>
                                                        </div>
                                                    </div><!-- /.panel-body -->
                                                </div><!-- /.panel-collapse -->
                                            </div><!-- /.panel -->

                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="headingFour">
                                                    <a class="panel-title accordion-toggle collapsed" role="button"
                                                        data-toggle="collapse" href="#collapseFour"
                                                        aria-expanded="false" aria-controls="collapseFour">
                                                        Job Function
                                                    </a><!-- /.panel-title -->
                                                </div><!-- /.panel-heading -->
                                                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel"
                                                    aria-labelledby="headingFour">
                                                    <div class="panel-body">
                                                        <div class="checkbox"><label><input type="checkbox"
                                                                    name="status[]" value="single"> Production
                                                                Management <span> (120)</span></label>
                                                        </div>
                                                        <div class="checkbox"><label><input type="checkbox"
                                                                    name="status[]" value="married"> Design
                                                                Engineering<span> (300)</span></label>
                                                        </div>
                                                        <div class="checkbox"><label><input type="checkbox"
                                                                    name="status[]" value="its_complicated"> Safety/
                                                                Health <span> (300)</span></label>
                                                        </div>
                                                        <div class="checkbox"><label><input type="checkbox"
                                                                    name="status[]" value="its_complicated"> Product
                                                                Development <span> (700)</span></label>
                                                        </div>
                                                    </div><!-- /.panel-body -->
                                                </div><!-- /.panel-collapse -->
                                            </div><!-- /.panel -->
                                        </div><!-- /.panel-group -->
                                    </div><!-- /.panel-body -->

                                </div><!-- /.panel -->
                            </form>
                        </div><!-- /.filter-menu -->
                    </div>
                    <div class="col-lg-9">
                        <div class="job-bx-title mt-10">
                            <div class="job-show-title">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h5>2269 Jobs Found</h5>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="float-right d-flex align-items-center">
                                            <span class="select-title pr-3">Sort by freshness</span>
                                            <div class=" list pt-1 pr-3">
                                                <a href="browse-job-filter" class="pl-2"><i
                                                        class="fa fa-th-list"></i></a>
                                                <a href="browse-job-filter" class="pl-2"><i class="fa fa-th"></i></a>
                                            </div>
                                            <select class="bs-select-hidden">
                                                <option>Last 2 Months</option>
                                                <option>Last Months</option>
                                                <option>Last Weeks</option>
                                                <option>Last 3 Days</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="job-show-content">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="job-title pt-2">
                                            <h5>Digital Marketing Executive</h5>
                                        </div>
                                        <div class="organization-nm pt-2">
                                            <h5>eMythmakes.com</h5>
                                        </div>
                                        <div class="job-location pt-2">
                                            <h6><i class="fa fa-map-marker" aria-hidden="true"></i> Dhaka,Bangladesh
                                            </h6>
                                        </div>
                                        <div class="job-time pt-2">
                                            <h6><i class="fa fa-pencil" aria-hidden="true"></i>
                                                Bachelor degree in any discipline
                                                Master`s degree in any discipline will be appreciated
                                            </h6>
                                        </div>
                                        <div class="job-ex pt-2">
                                            <h6> <i class="fa fa-briefcase" aria-hidden="true"></i> At least 2 years
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 d-flex align-items-end justify-content-end">
                                        <div class="job-deatline">
                                            <h5>Salary : $2500-$3000</h5>
                                            <h6>Deadline : 1 May 2021</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="job-show-content">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="job-title pt-2">
                                            <h5>Digital Marketing Executive</h5>
                                        </div>
                                        <div class="organization-nm pt-2">
                                            <h5>eMythmakes.com</h5>
                                        </div>
                                        <div class="job-location pt-2">
                                            <h6><i class="fa fa-map-marker" aria-hidden="true"></i> Dhaka,Bangladesh
                                            </h6>
                                        </div>
                                        <div class="job-time pt-2">
                                            <h6><i class="fa fa-pencil" aria-hidden="true"></i>
                                                Bachelor degree in any discipline
                                                Master`s degree in any discipline will be appreciated
                                            </h6>
                                        </div>
                                        <div class="job-ex pt-2">
                                            <h6> <i class="fa fa-briefcase" aria-hidden="true"></i> At least 2 years
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 d-flex align-items-end justify-content-end">
                                        <div class="job-deatline">
                                            <h5>Salary : $2500-$3000</h5>
                                            <h6>Deadline : 1 May 2021</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="job-show-content">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="job-title pt-2">
                                            <h5>Digital Marketing Executive</h5>
                                        </div>
                                        <div class="organization-nm pt-2">
                                            <h5>eMythmakes.com</h5>
                                        </div>
                                        <div class="job-location pt-2">
                                            <h6><i class="fa fa-map-marker" aria-hidden="true"></i> Dhaka,Bangladesh
                                            </h6>
                                        </div>
                                        <div class="job-time pt-2">
                                            <h6><i class="fa fa-pencil" aria-hidden="true"></i>
                                                Bachelor degree in any discipline
                                                Master`s degree in any discipline will be appreciated
                                            </h6>
                                        </div>
                                        <div class="job-ex pt-2">
                                            <h6> <i class="fa fa-briefcase" aria-hidden="true"></i> At least 2 years
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 d-flex align-items-end justify-content-end">
                                        <div class="job-deatline">
                                            <h5>Salary : $2500-$3000</h5>
                                            <h6>Deadline : 1 May 2021</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="job-show-content">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="job-title pt-2">
                                            <h5>Digital Marketing Executive</h5>
                                        </div>
                                        <div class="organization-nm pt-2">
                                            <h5>eMythmakes.com</h5>
                                        </div>
                                        <div class="job-location pt-2">
                                            <h6><i class="fa fa-map-marker" aria-hidden="true"></i> Dhaka,Bangladesh
                                            </h6>
                                        </div>
                                        <div class="job-time pt-2">
                                            <h6>
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                                Bachelor degree in any discipline
                                                Master`s degree in any discipline will be appreciated
                                            </h6>
                                        </div>
                                        <div class="job-ex pt-2">
                                            <h6> <i class="fa fa-briefcase" aria-hidden="true"></i> At least 2 years
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 d-flex align-items-end justify-content-end">
                                        <div class="job-deatline">
                                            <h5>Salary : $2500-$3000</h5>
                                            <h6>Deadline : 1 May 2021</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
