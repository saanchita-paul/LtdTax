 <nav class="sidebar sidebar-offcanvas" id="sidebar">
     <ul class="nav">
         <?php 
            $user_img = Auth::user()->profile_photo_path; 
            ?>
         <li class="nav-item nav-category">Main Menu</li>
         <li class="nav-item">
             <a class="nav-link" href="{{url('/dashboard')}}">
                 <i class="menu-icon typcn typcn-home"></i>
                 <span class="menu-title">Dashboard</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#admin" aria-expanded="false" aria-controls="admin">
                 <i class="menu-icon typcn typcn-book"></i>
                 <span class="menu-title">Admin</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="admin">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/admin-user/all')}}">All Admin</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/admin-user/add')}}">Create Admin</a>
                     </li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#booksPage" aria-expanded="false"
                 aria-controls="booksPage">
                 <i class="menu-icon typcn typcn-book"></i>
                 <span class="menu-title">Taxman Books</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="booksPage">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/books')}}">All Books</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/books/add')}}">Add Books</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/books/review')}}">Books Review</a>
                     </li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#orderPage" aria-expanded="false"
                 aria-controls="orderPage">
                 <i class="menu-icon typcn typcn-book"></i>
                 <span class="menu-title">Orders</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="orderPage">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/orders')}}">All Orders</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/orders/type/book')}}">Book Orders</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/orders/type/training')}}">Training Orders</a>
                     </li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#paymentPage" aria-expanded="false"
                 aria-controls="paymentPage">
                 <i class="menu-icon typcn typcn-book"></i>
                 <span class="menu-title">Payment</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="paymentPage">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/payment/cash-on-delivery')}}">Cash on Delivery</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/payment/ssl-commerce')}}">SSL COMMERZ</a>
                     </li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#contactPage" aria-expanded="false"
                 aria-controls="contactPage">
                 <i class="menu-icon typcn typcn-news"></i>
                 <span class="menu-title">Contact </span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="contactPage">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/contact')}}">Contact Messages</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#contact" aria-expanded="false"
                                aria-controls="contact">
                            <i class="menu-icon typcn typcn-folder-open"></i>
                            <span class="">Contact Us Page</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="contact">
                            <ul class="nav flex-column sub-menu">
                                @if(contactUsPageCount() == 0)
                                <li class="nav-item ml-4 p-1 mt-2">
                                    <a class="nav-link" href="{{url('/admin/contact_us/add')}}">Add Page Content</a>
                                </li>
                                @else
                                @endif
                                <li class="nav-item ml-4 p-1">
                                    <a class="nav-link" href="{{url('/admin/contact_us')}}">All Page Content</a>
                                </li>
                            </ul>
                        </div>
                     </li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#newsPage" aria-expanded="false" aria-controls="newsPage">
                 <i class="menu-icon typcn typcn-news"></i>
                 <span class="menu-title">News</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="newsPage">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/news')}}">All News</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/news/add')}}">Add News</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/news/category')}}">Category</a>
                     </li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#adminPage" aria-expanded="false"
                 aria-controls="adminPage">
                 <i class="menu-icon typcn typcn-document"></i>
                 <span class="menu-title">Page</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="adminPage">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/page')}}">All Pages</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/page/add')}}">Add Page</a>
                     </li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#adminSlider" aria-expanded="false"
                 aria-controls="admintraining">
                 <i class="menu-icon typcn typcn-document-text"></i>
                 <span class="menu-title">Slider</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="adminSlider">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#sliderImages" aria-expanded="false"
                             aria-controls="trainer">
                             <i class="menu-icon typcn typcn-folder-open"></i>
                             <span class="">Slider Image Gallery</span>
                             <i class="menu-arrow"></i>
                         </a>
                        <div class="collapse" id="sliderImages">
                             <ul class="nav flex-column sub-menu">
                                <li class="nav-item ml-4 mt-2 pl-1">
                                <a class="nav-link" href="{{url('/admin/slider/images')}}">Slider Images</a>
                                </li>
                                <li class="nav-item mt-2 ml-4 pl-1">
                                <a class="nav-link" href="{{route('slider.add-image')}}">Add Image</a>
                                </li>
                             </ul>
                        </div>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/slider')}}">All Sliders</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{route('slider.add')}}">Add Slider</a>
                     </li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#adminPage" aria-expanded="false"
                 aria-controls="adminPage">
                 <i class="menu-icon typcn typcn-document"></i>
                 <span class="menu-title">Team</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="adminPage">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/team')}}">All Team</a>
                     </li>
                     @if(teamCount() == 0)
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/team/add')}}">Add Team</a>
                     </li>
                     @else
                     @endif
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#adminPublication" aria-expanded="false"
                 aria-controls="adminPublication">
                 <i class="menu-icon typcn typcn-folder-open"></i>
                 <span class="menu-title">Publication</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="adminPublication">
                 <ul class="nav flex-column sub-menu">
                     <!-- <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin/publication')}}">All Publications</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin/publication/add')}}">Add Publication</a>
                  </li> 
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin/publication/category')}}">Category</a>
                  </li> -->

                     <li class="nav-item">
                         <a class="nav-link" data-toggle="collapse" href="#taxmanPublication" aria-expanded="false"
                             aria-controls="taxmanPublication">
                             <i class="menu-icon typcn typcn-folder-open"></i>
                             <span class="">The Taxman Publication</span>
                             <i class="menu-arrow"></i>
                         </a>
                         <div class="collapse" id="taxmanPublication">
                             <ul class="nav flex-column sub-menu">
                                 <li class="nav-item ml-4 p-1">
                                     <a class="nav-link" href="{{route('add-package')}}">Add Package</a>
                                 </li>
                                 <li class="nav-item ml-4 p-1">
                                     <a class="nav-link" href="{{route('view-package')}}">View Package</a>
                                 </li>
                             </ul>
                         </div>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="#">NBR Publication</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="#">High Court Publication</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="#">Others Publication</a>
                     </li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#admintraining" aria-expanded="false"
                 aria-controls="admintraining">
                 <i class="menu-icon typcn typcn-document-text"></i>
                 <span class="menu-title">Training</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="admintraining">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/training')}}">All Training</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/training/add')}}">Add Training</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/training/category')}}">Category</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#trainer" aria-expanded="false"
                             aria-controls="trainer">
                             <i class="menu-icon typcn typcn-folder-open"></i>
                             <span class="">Trainer</span>
                             <i class="menu-arrow"></i>
                         </a>
                        <div class="collapse" id="trainer">
                             <ul class="nav flex-column sub-menu">
                                <li class="nav-item ml-4 mt-2 pl-1">
                                <a class="nav-link" href="{{url('/admin/training/all-trainer')}}">All Trainer</a>
                                </li>
                                <li class="nav-item ml-4 pl-1">
                                <a class="nav-link" href="{{url('/admin/training/add-trainer')}}">Add Trainer</a>
                                </li>
                             </ul>
                        </div>
                     </li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#adminskill" aria-expanded="false"
                 aria-controls="adminskill">
                 <i class="menu-icon typcn typcn-document-text"></i>
                 <span class="menu-title">Skill</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="adminskill">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/skills')}}">All Skills</a>
                     </li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#adminProfessionalDegree" aria-expanded="false"
                 aria-controls="adminProfessionalDegree">
                 <i class="menu-icon typcn typcn-document-text"></i>
                 <span class="menu-title">Professional Degree</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="adminProfessionalDegree">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/professional/degree')}}">All Professional Degree</a>
                     </li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#adminconsultancy" aria-expanded="false"
                 aria-controls="adminconsultancy">
                 <i class="menu-icon typcn typcn-document-text"></i>
                 <span class="menu-title">Consultancy</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="adminconsultancy">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/consultancy')}}">All Consultancy</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/consultancy/add')}}">Add Consultancy</a>
                     </li>

                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/consultancy/category')}}">Consultancy Category</a>
                     </li>

                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#adminemployerpanel" aria-expanded="false"
                 aria-controls="adminemployerpanel">
                 <i class="menu-icon typcn typcn-document-text"></i>
                 <span class="menu-title">Employer Panel</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="adminemployerpanel">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/employerpanel/cominfo')}}">Company List</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/employerpanel/contact')}}">Contact Details</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/employerpanel/billing')}}">Billing Address</a>
                     </li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#adminJob" aria-expanded="false" aria-controls="adminJob">
                 <i class="menu-icon typcn typcn-folder-open"></i>
                 <span class="menu-title">Job</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="adminJob">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/job')}}">Job List</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/job/add')}}">Post Job</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/job/category')}}">Category</a>
                     </li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#sidebar-layouts2" aria-expanded="false"
                 aria-controls="sidebar-layouts2">
                 <i class="menu-icon typcn typcn-location-outline"></i>
                 <span class="menu-title">Location</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="sidebar-layouts2">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/location/add')}}">Add Thana</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/location')}}">All Location</a>
                     </li>
                 </ul>
             </div>
         </li>

         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#adminCandidate" aria-expanded="false"
                 aria-controls="adminCandidate">
                 <i class="menu-icon typcn typcn-folder-open"></i>
                 <span class="menu-title">Candidate</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="adminCandidate">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/candidate/all')}}">All Candidates</a>
                     </li>
                     <!-- <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin/candidate')}}">Edit Candidate Resume</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin/candidate/add')}}">Add Candidate Resume</a>
                  </li> 

                  <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin/candidate/resume')}}">View Resume</a>
                  </li>  -->
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#education" aria-expanded="false"
                 aria-controls="education">
                 <i class="menu-icon typcn typcn-location-outline"></i>
                 <span class="menu-title">Education</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="education">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/education/add')}}">Add Education</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/admin/education')}}">All Educations</a>
                     </li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#adminFooter" aria-expanded="false"
                 aria-controls="adminFooter">
                 <i class="menu-icon typcn typcn-document-text"></i>
                 <span class="menu-title">Footer</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="adminFooter">
                 <ul class="nav flex-column sub-menu">
                 <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#letsknowus" aria-expanded="false"
                             aria-controls="trainer">
                             <i class="menu-icon typcn typcn-folder-open"></i>
                             <span class="">Let's Know Us</span>
                             <i class="menu-arrow"></i>
                         </a>
                        <div class="collapse" id="letsknowus">
                             <ul class="nav flex-column sub-menu">
                                <li class="nav-item ml-4 mt-2 pl-1">
                                    <a class="nav-link" href="{{url('/admin/footer/letsknowus')}}">All Options</a>
                                </li>
                                <li class="nav-item ml-4 pl-1">
                                    <a class="nav-link" href="{{url('/admin/footer/letsknowus/add')}}">Add Options</a>
                                </li>
                             </ul>
                        </div>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#jobseeker" aria-expanded="false"
                            aria-controls="jobseeker">
                            <i class="menu-icon typcn typcn-folder-open"></i>
                            <span class="">Job Seeker</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="jobseeker">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item ml-4 mt-2 pl-1">
                                    <a class="nav-link" href="{{url('/admin/footer/jobseeker')}}">All Options</a>
                                </li>
                                <li class="nav-item ml-4 pl-1">
                                    <a class="nav-link" href="{{url('/admin/footer/jobseeker/add')}}">Add Options</a>
                                </li>
                            </ul>
                        </div>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" data-toggle="collapse" href="#employers" aria-expanded="false"
                            aria-controls="employers">
                            <i class="menu-icon typcn typcn-folder-open"></i>
                            <span class="">Employers</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="employers">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item ml-4 mt-2 pl-1">
                                    <a class="nav-link" href="{{url('/admin/footer/employer')}}">All Options</a>
                                </li>
                                <li class="nav-item ml-4 pl-1">
                                    <a class="nav-link" href="{{url('/admin/footer/employer/add')}}">Add Options</a>
                                </li>
                            </ul>
                        </div>
                     </li>
                     <li class="nav-item mb-4">                         
                         <a class="nav-link" data-toggle="collapse" href="#socialmediaicons" aria-expanded="false"
                            aria-controls="socialmediaicons">
                            <i class="menu-icon typcn typcn-folder-open"></i>
                            <span class="">Social Media Icons</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="socialmediaicons">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item ml-4 mt-2 pl-1">
                                    <a class="nav-link" href="{{url('/admin/footer/social-media-icon')}}">All Icons</a>
                                </li>
                                <li class="nav-item ml-4 pl-1">
                                    <a class="nav-link" href="{{url('/admin/footer/social-media-icon/add')}}">Add Icon</a>
                                </li>
                            </ul>
                        </div>
                     </li>
                 </ul>
             </div>
         </li>
     </ul>
 </nav>
