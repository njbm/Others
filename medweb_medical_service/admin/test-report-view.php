<?php
$path = $_SERVER['DOCUMENT_ROOT'].'/medweb_medical_service';
include_once($path.'/config.php');
use \MedWeb\TestReport;
use \MedWeb\utility\Validator;
use \MedWeb\utility\Utility;

$id = Utility::sanitize($_POST['id']);

if(!Validator::empty($id)){
	$report = new TestReport();
	$report = $report->show($id);	
}else{
	dd("No preview found!"); //using session
}

?>

<!DOCTYPE html>
<html lang="en">
<?php include_once($short.'head.php'); ?>

<body>

	<!-- Main navbar -->
	<?php include_once($short.'nav.php'); ?>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-light sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				<span class="font-weight-semibold">Navigation</span>
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- User menu -->
				<?php include_once($short.'profile.php'); ?>
				<!-- /user menu -->


				<!-- Main navigation -->
				<?php include_once($short.'sidebar-menu.php') ?>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">


			<!-- Content area -->
			<div class="content">
         
            <div class="card">
							<div class="card-img-actions mx-1 mt-1">
                            <iframe src="<?=$images2.'test-reports/'.$report->report_file?>" width="100%" height="800px"></iframe>
                            
							</div>

					    	<div class="card-body text-center">
					    		<h6 class="font-weight-semibold"><?=$report->patient_name?></h6>
                                <h4 class="font-weight-semibold"><?=$report->test_name?></h4>
					    		<span class="d-block text-muted"><?=$report->phone?></span>

								<ul class="list-inline list-inline-condensed mt-3 mb-0">
									
									<li class="list-inline-item">
										<form action="test-report-edit.php" method="post">
												<input type="hidden" name="id" value="<?=$report->id?>">
												<button class="btn btn-outline bg-info-800 btn-icon text-info-800 border-info-800 border-2 rounded-round legitRipple"
												 type="submit"><i class="icon-pencil"></i></button>
						                        </form>
									</li>
	
								
									<li class="list-inline-item">
									<form action="test-report-delete.php" method="post">
												<input type="hidden" name="id" value="<?=$report->id?>">
												<button class="btn btn-outline bg-danger-800 btn-icon text-danger-800 border-danger-800 border-2 rounded-round legitRipple"
												 type="submit" onclick="return confirm('Are You Sure?')"><i class="icon-trash"></i></button>
						                        </form>
									</li>

								</ul>
					    	</div>
				    	</div>
 


			</div>
			<!-- /content area -->


			<!-- Footer -->
			<div class="navbar navbar-expand-lg navbar-light">
				<div class="text-center d-lg-none w-100">
					<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
						<i class="icon-unfold mr-2"></i>
						Footer
					</button>
				</div>

				<div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						&copy; 2015 - 2018. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
					</span>

					<ul class="navbar-nav ml-lg-auto">
						<li class="nav-item"><a href="https://kopyov.ticksy.com/" class="navbar-nav-link" target="_blank"><i class="icon-lifebuoy mr-2"></i> Support</a></li>
						<li class="nav-item"><a href="http://demo.interface.club/limitless/docs/" class="navbar-nav-link" target="_blank"><i class="icon-file-text2 mr-2"></i> Docs</a></li>
						<li class="nav-item"><a href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov" class="navbar-nav-link font-weight-semibold"><span class="text-pink-400"><i class="icon-cart2 mr-2"></i> Purchase</span></a></li>
					</ul>
				</div>
			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>



