@extends('master')

@section('content') 

<main>
        <div class="founder-ms-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <aside>
                            <div class="ab-us-title-nab">
                                <p>About Us</p>
                            </div>
                            <div class="nav-wrapper">
                                <a href="/founder_message">
                                    Founder Message
                                </a>
                                <a href="/history">
                                    History
                                </a>
                                <a href="/mission_vision">
                                    Mission-Vission
                                </a>
                                <a href="/objectives">
                                    Objectives
                                </a>
                                <a href="/award_achievements">
                                    Award & Achievements
                                </a>
                            </div>
                        </aside>
                    </div>
                    <div class="col-lg-9">
                        <div class="ab-us-content mt-20">
                            <div class="founder-title-text">
                                <h5 class="text-center">Objectives</h5>
                            </div>
                            <div class="founder-text">
                                <p><p>{!! $page->content !!}</p></p>
                                <!-- <p>My name is Richard N. Rickey and I am the founder and C.E.O. of Orenda Education, the
                                    not-for-profit sponsoring entity for the Orenda Charter School District.
                                </p>
                                <p>For almost 20 years I was employed in the healthcare field as a hospital C.E.O. and
                                    most recently as a multi-facility executive overseeing hospitals and clinics in
                                    multiple states. Prior to my healthcare career I was in the education field
                                    developing and delivering public health curriculum and programs to several school
                                    districts in Oklahoma. I come from a family of educators and have also been a
                                    volunteer in the classroom and coach youth sports. In the mid 1990’s I began to
                                    research public charter schools, and while a hospital C.E.O., I formed Orenda
                                    Education in 1995.
                                </p>
                                <p>Here in Central Texas we have some good, but very large public schools. We all know
                                    that one school size does not fit all students. Some of our children do not feel a
                                    sense of belonging in a large school. There may be too many students at the school
                                    and in classrooms who are not serious about their studies. For many boys, in
                                    particular, while a large school may offer a great sports program, the culture of
                                    the school may not be conducive to cultivating an atmosphere that produces our
                                    ideal, which is "Citizen, Scholar, Athlete." Some students are not reaching their
                                    academic and human potential in these settings. Private school choices in the area
                                    are limited and, for some families, unaffordable.
                                 </p>
                                <p>In 1995 I incorporated Orenda Education and began the process that led to opening new
                                    public charter schools that would offer a different and innovative learning
                                    environment to meet this need. The idea behind our Orenda Charter Schools was to
                                    offer another public school choice for those students who want a smaller school
                                    experience that may be a better fit for their academic, social, physical and moral
                                    development."
                                </p> -->
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-3">
                      <div class="foundar-image">
                      <img src="media/imgAll/Founder-img.jpg" alt="Taxman">
                      </div>
                      <div class="founder-name mt-15">
                      <h5>Blogs by Mr. Zakir Hasan</h5>
                      </div>
                    </div> -->
                </div>
            </div>
        </div>
    </main>

@endsection