@extends('master')
@section('content') 
<div class="page-content bg-white" id="candidate_profile" >
		<!-- contact area -->
        <div class="content-block">
			<!-- Browse Jobs -->
			<div class="section-full bg-white browse-job p-t50 p-b20">
				<div class="container">
					<div class="row">
                        <!-- include sidebar -->
                        <div class="col-xl-3 col-lg-4 col-md-4 mb-5">
						    @include('userdashboard.include.user-sidebar')
                        </div>
						<div class="col-xl-9 col-lg-8 col-md-8 m-b30">
							 @yield('user-content') 
						</div>
					</div>
				</div>
			</div>
            <!-- Browse Jobs END -->
		</div>
    </div>
@endsection