<?php include_once("common/class.banglaDate.php");include_once("common/I18N/Arabic.php");

$bn=new BanglaDate(time());$bn->set_time(time(), 6);$date=$bn->get_date();
$dtDateBN=$date[1]."&nbsp;".$date[0]."&nbsp;".$date[2];
$ar=new I18N_Arabic('Date');
$dtDateAr=$ar->date('d F Y', time()+$dtTimeDifference);
?>
<header>
	<div class="DHeaderMenu" id="myHeader">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<nav class="navbar navbar-expand-lg navbar-light">
						<div class="Dlogo">
							<a href="<?php echo $sSiteURL; ?>"><img src="<?php echo $sLogoURL; ?>" class="img-fluid"></a>
						</div>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>

						<div class="collapse navbar-collapse " id="navbarSupportedContent">
							<ul class="navbar-nav ml-auto">
								<li class="nav-item"><a class="nav-link" href="#">বাংলাদেশ</a></li>
								<li class="nav-item"><a class="nav-link" href="#">আন্তর্জাতিক</a></li>
								<li class="nav-item"><a class="nav-link" href="#">অর্থনীতি</a></li>
								<li class="nav-item"><a class="nav-link" href="#">সারাদেশ</a></li>
								<li class="nav-item"><a class="nav-link" href="#">খেলাধুলা</a></li>
								<li class="nav-item"><a class="nav-link" href="#">বিনোদন</a></li>
								<li class="nav-item"><a class="nav-link" href="#">লাইফস্টাইল</a></li>
								<li class="nav-item"><a class="nav-link" href="#">সাতসতেরো</a></li>
								<li class="nav-item"><a class="nav-link" href="#">মতামত</a></li>
								<li class="nav-item dropdown">
									<div class="dropdown">
										<a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">বিবিধ</a>
										<div class="dropdown-menu" aria-labelledby="navbarDropdown">
											<a class="dropdown-item" href="#">শিক্ষা</a>
											<a class="dropdown-item" href="#">স্বাস্থ্য</a>
											<a class="dropdown-item" href="#">কৃষি</a>
											<a class="dropdown-item" href="#">পরিবেশ</a>
											<a class="dropdown-item" href="#">মিডিয়া</a>
											<a class="dropdown-item" href="#">মিডিয়া</a>
											<a class="dropdown-item" href="#">রাইজিংবিডি স্পেশাল</a>
											<a class="dropdown-item" href="#">ফটো ফিচার</a>
										</div>
									</div>
								</li>
								<li class="nav-item"><a class="nav-link" href="#">আর্কাইভস</a></li>
								<form class="form-inline">
									<div class="DConButton"><a class="btn btn-danger" href="#" target="blank">English</a></div>
								</form>
							</ul>
						</div>

					</nav>
				</div>
			</div>
        </div>
    </div>
	<div class="DTime">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> ঢাকা &nbsp;&nbsp;&nbsp;<i class="fa fa-calendar" aria-hidden="true"></i> <?php echo fEn2Bn($dtDateTime); ?> ||&nbsp; <?php echo $dtDateBN; ?> ||&nbsp; <?php echo fEn2Bn($dtDateAr); ?></p>
                </div>
                <div class="col-sm-6 text-right">
                    <div class="DSocialLink">
                        <ul>
                            <li><a href="<?php echo $sSiteURL; ?>rss/rss.xml" target="_blank"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--<div class="container">
        <div class="DBanner">
            <div class="row">
                <div class="col-sm-8 offset-2">
                    <img src="media/Advertisement/4653930738180425240.jpg" alt="" title="" class="img-responsive img100">
                </div>
            </div>
        </div>
    </div>-->

</header>