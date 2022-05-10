<style>
.b-rad{
    border-radius:50%;
    height:40px;
    width:40px;
}
.dropdown-menu {
    width: 260px;
}
.dropdown-menu :hover {
    background-color: #fff;
}
.DSearchType2 p {
    font-weight: unset;
    font-size: unset;
    color: black;
}
.navbar-nav > li > a {
    padding:18px 6px!important;
    margin-top: 7px!important;
}
.DSearchType2 .loginbtn {
    background-color: #E0BF3C;
    border: none;
    border-radius: 0;
    font-size: 14px;
    padding: 5px 10px 7px;
    margin-left: 5px;
    line-height: 15px;
    color: #333;
}
.DSearchType2 .signupbtn {
    background-color: #c82333;
    border: none;
    border-radius: 0;
    font-size: 14px;
    padding: 5px 10px 7px;
    margin-right: 10px;
    line-height: 15px;
}
.nav-item:last-child .dropdown-menu {
    right: 50;
    left:-40px;
}
.dropdown-menu.cons {
    width: 313px!important;
}
</style>
<header class="header-area">
    <div class="DHeader" id="myHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="navbar-header">
                            <a class="navbar-brand Dlogo" href="/"><img src="{{asset('web/media/common/logo.png')}}" class="img-fluid img100"></a>
                            <a href="#" class="woodmart-logo woodmart-sticky-logo" rel="home"><img src="{{asset('web/media/common/logo.png')}}" alt="" class="img-responsive img100" style="width: 230px;padding:5px 0;"></a>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                            <ul class="navbar-nav mt-2 mt-lg-0 ml-auto">
                                <li class="nav-item"><a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a></li>
                                <li class="nav-item"><a class="nav-link" href="/about-us">About us <span class="sr-only">(current)</span></a></li>
                                <!-- about us -->
                                <!-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About us<i class="fa fa-chevron-down fa-xs"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="/founder_message">Founder Message</a>
                                        <a class="dropdown-item" href="/history">History</a>
                                        <a class="dropdown-item" href="/mission_vision">Mission-Vision</a>
                                        <a class="dropdown-item" href="/objectives">Objectives</a>
                                        <a class="dropdown-item" href="/award_achievements">Award &amp; Achievements</a>
                                    </div>
                                </li> -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown disable" aria-haspopup="true" aria-expanded="false">Job<i class="fa fa-chevron-down fa-xs"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="/joblist">Job List</a>
                                        <div class="DSearchType2 dropdown-item">
                                            <div class="row">
                                                <div class="col-sm-4 pr-0">
                                                    <p class="">Job Seeker</p>
                                                </div>
                                                <div class="col-sm-8">
                                                    <a href="/login"><button type="button" class="btn btn-danger loginbtn">Login</button></a>
                                                    <a href="/register"><button type="button" class="btn btn-danger signupbtn">Sign Up</button></a>
                                                </div>
                                            </div>
                                            <div class="DSearchType2 mt-2">
                                                <div class="row">
                                                    <div class="col-sm-4 pr-0">
                                                        <p>Employer</p>
                                                    </div>
                                                    <div class="col-sm-8 ">
                                                        <a href="/login"><button type="button" class="btn btn-danger loginbtn">Login</button></a>
                                                        <a href="/employer/register"><button type="button" class="btn btn-danger signupbtn">Sign Up</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="/news">News</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown disable" aria-haspopup="true" aria-expanded="false">Publication<i class="fa fa-chevron-down fa-xs"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="/#publication">Taxman Publication</a>
                                        <a class="dropdown-item" href="">NBR Publication</a>
                                        <a class="dropdown-item" href="">High Court Publication</a>
                                        <a class="dropdown-item" href="">Others Publication</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="/training" id="navbarDropdownMenuLink" data-toggle="dropdown disable" aria-haspopup="true" aria-expanded="false">Training<i class="fa fa-chevron-down fa-xs"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <?php $traincat = App\Models\TrainingCat::where('status',1)->get(); ?>
                                        @foreach($traincat as $train)
                                            <a class="dropdown-item" href="/trainingcat/{{$train->id}}/{{$train->slug}}">{{$train->title}}</a>
                                        @endforeach
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="/consultancy" id="navbarDropdownMenuLink" data-toggle="dropdown disable" aria-haspopup="true" aria-expanded="false">Consultancy<i class="fa fa-chevron-down fa-xs"></i></a>
                                    <div class="dropdown-menu cons" aria-labelledby="navbarDropdownMenuLink">
                                    <?php $consultcat = App\Models\ConsultCat::all();  ?>
                                    @foreach($consultcat as $con)
                                        <a class="dropdown-item" href="/consultancycat/{{$con->id}}/{{$con->slug}}">{{$con->title}}</a>
                                    @endforeach
                                    </div>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="/recruitment-specialist">Recruitment Specialist </a></li>
                                <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle @if(Auth::user()) profile-img @endif" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown disable" aria-haspopup="true" aria-expanded="false">
                                        @if(Auth::user())
                                            @if(Auth::user()->user_role == 0)
                                                <?php
                                                $user_id = Auth::user()->id;
                                                $company = App\Models\CompanyDetailInfo::where('user_id', $user_id)->first();
                                                if(!empty($company->logo)){
                                                    $logo =$company->logo;
                                                }
                                                ?>
                                                @if(!empty($logo))
                                                    <img src="{{asset('uploads/cominfo/'.$logo)}}" alt="{{Auth::user()->name}}" title="{{Auth::user()->name}}" class="b-rad">
                                                @else
                                                    <img src="{{asset('uploads/cominfo/company_logo.png')}}" alt="{{Auth::user()->name}}" class="b-rad"  title="{{Auth::user()->name}}">
                                                @endif
                                            @else
                                                @if(!empty(Auth::user()->photo))
                                                    <img src="{{asset('uploads/users/'.Auth::user()->photo)}}" alt="{{Auth::user()->name}}" class="b-rad" title="{{Auth::user()->name}}" >
                                                @else
                                                    <img src="{{asset('uploads/users/users.png')}}" alt="{{Auth::user()->name}}" class="b-rad" title="{{Auth::user()->name}}" >
                                                @endif
                                            @endif
                                        @else
                                        <i class="fa fa-user"></i>
                                        @endif
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    @if(Auth::user())
                                        <?php $role = Auth::user()->user_role;?>
                                        @if($role == 0)
                                            <a class="dropdown-item" href="{{url('/company/dashboard')}}">Profile</a>
                                        @elseif($role == 1)
                                            <a class="dropdown-item" href="{{url('/dashboard')}}">Dashboard</a>
                                        @elseif($role == 2)
                                            <a class="dropdown-item" href="{{url('/user/dashboard')}}">Profile</a>
                                        @else
                                        @endif
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary"></i>Sign Out</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    @else
                                        <a class="dropdown-item" href="{{url('/login')}}">Login</a>
                                        <a class="dropdown-item" href="{{url('/register')}}">User Register</a>
                                        <a class="dropdown-item" href="{{url('/employer/register')}}">Employer Register</a>
                                    @endif
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>