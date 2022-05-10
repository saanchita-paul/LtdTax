<div class="row">
    <div class="resume-sidebar-area ">
        <div class="col-lg-12">
            <div class="wrapper center-block fixed">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading-h " role="tab" id="headingOne">
                            <h4 class="panel-title-sidebar">
                                <a role="button" href="{{url('user/dashboard')}}">
                                    Home
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne-sidebar" class="panel-collapse in collapse show" role="tabpanel" aria-labelledby="headingOne" style="">
                            <div class="panel-body">

                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default active">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title-sidebar">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo-sidebar" aria-expanded="false" aria-controls="collapseTwo">
                                    Resume
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo-sidebar" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" style="">
                            <div class="panel-body-sibebar ">
                                <ul class="resume-sibebar ">
                                    <li><a href="{{url('/user/view-resume')}}"><i class="fa fa-file-o" aria-hidden="true"></i> View Resume</a></li>
                                    <li><a href="{{route('user.edit-resume')}}"><i class="fa fa-file-text" aria-hidden="true"></i> Edit Resume</a></li>
                                    <!-- <li><a href="#"><i class="fa fa-upload" aria-hidden="true"></i> Upload Resume</a></li>
                                    <li><a href="#"><i class="fa fa-paper-plane" aria-hidden="true"></i> Email Resume</a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree-sidebar">
                            <h4 class="panel-title-sidebar">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree-sidebar" aria-expanded="false" aria-controls="collapseThree">
                                    My Activities
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree-sidebar" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" style="">
                            <div class="panel-body-sibebar">
                                <ul class="resume-sibebar">
                                    <li><a href="{{route('user.application-history')}}"><i class="fa fa-file-word-o" aria-hidden="true"></i>Application History</a>
                                    </li>
                                    <!-- <li><a href="#"><i class="fa fa-paper-plane" aria-hidden="true"></i> Emailed Resume</a></li>
                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i> Shortlisted Job</a></li>
                                    <li><a href="#"><i class="fa fa-low-vision" aria-hidden="true"></i> Following Employer</a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headinggFour-sidebar">
                            <h4 class="panel-title-sidebar">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour-sidebar" aria-expanded="false" aria-controls="collapseThree">
                                    Employer Activities
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFour-sidebar" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headinggFour">
                            <div class="panel-body-sibebar">
                                <ul class="resume-sibebar">
                                    <li><a href="{{route('user.application-view-history')}}"><i class="fa fa-file-text" aria-hidden="true"></i> Employer View Resume</a>
                                    </li>
                                    <!-- <li><a href="#"><i class="fa fa-commenting" aria-hidden="true"></i> Employer Message</a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headinggFour">
                            <h4 class="panel-title-sidebar">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive-sidebar" aria-expanded="false" aria-controls="collapseThree">
                                    Personalization
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFive-sidebar" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headinggFour">
                            <div class="panel-body-sibebar">
                                <ul class="resume-sibebar">
                                    <li><a href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i> My Training</a></li>
                                    <li><a href="#"><i class="fa fa-comments" aria-hidden="true"></i> SMS Job Alert</a></li>
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i> Favorite Search</a></li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headinggFour">
                            <h4 class="panel-title-sidebar">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsesix-sidebar" aria-expanded="false" aria-controls="collapseThree">
                                    Assessment
                                </a>
                            </h4>
                        </div>
                        <div id="collapsesix-sidebar" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headinggFour">
                            <div class="panel-body-sibebar">
                                <ul class="resume-sibebar">
                                    <li><a href="#"><i class="fa fa-certificate" aria-hidden="true"></i> Employability
                                            Certification</a></li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headinggFour">
                            <h4 class="panel-title-sidebar">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#account-settings" aria-expanded="false" aria-controls="collapseThree">
                                    Account Settings
                                </a>
                            </h4>
                        </div>
                        <div id="account-settings" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headinggFour">
                            <div class="panel-body-sibebar">
                                <ul class="resume-sibebar">

                                    <li><a href="{{route('profile.settings')}}"><i class="fa fa-user" aria-hidden="true"></i> Profile Information</a></li>
                                    <li><a href="{{route('password.settings')}}"><i class="fa fa-lock" aria-hidden="true"></i> Change Password</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>