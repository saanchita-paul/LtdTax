
							<div class="sticky-top">
								<div class="candidate-info">
									<div class="candidate-detail text-center">
                                        <div class="candi_ditels_wrapper">
                                            <div class="canditate-des">
                                                <a href="javascript:void(0);">
                                                    <img alt="profile photo" src="{{asset('uploads/pic1.jpeg')}}">
                                                </a>
                                                <div class="upload-link" title="" data-toggle="tooltip" data-placement="right" title="Tooltip on right">
                                                    <input type="file" class="update-flie">
                                                    <i class="fa fa-camera"></i>
                                                </div>
                                            </div>
                                        </div>
										
										<div class="candidate-title">
											<div class="">
												<h4 class="m-b5"><a href="javascript:void(0);">David Matin</a></h4>
												<p class="m-b0"><a href="javascript:void(0);">Web developer</a></p>
											</div>
										</div>
									</div>
									<ul>
										<li><a href="#" class="active">
											<i class="fa fa-user-o" aria-hidden="true"></i> 
											<span>Profile</span></a></li>
										<li><a href="{{ route('user.resume') }}">
											<i class="fa fa-file-text-o" aria-hidden="true"></i> 
											<span>My Resume</span></a></li>
										<li><a href="">
											<i class="fa fa-heart-o" aria-hidden="true"></i> 
											<span>Saved Jobs</span></a></li>
										<li><a href="#">
											<i class="fa fa-briefcase" aria-hidden="true"></i> 
											<span>Applied Jobs</span></a></li>
										<li><a href="#">
											<i class="fa fa-bell-o" aria-hidden="true"></i> 
											<span>Job Alerts</span></a></li>
										<li><a href="#">
											<i class="fa fa-id-card-o" aria-hidden="true"></i> 
											<span>CV Manager</span></a></li>
										<li><a href="#">
											<i class="fa fa-key" aria-hidden="true"></i> 
											<span>Change Password</span></a></li>
                                        <li>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item"><i class="fa fa-sign-out"  aria-hidden="true"></i>Sign Out</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                        </li>
									</ul>
								</div>
							</div>
	