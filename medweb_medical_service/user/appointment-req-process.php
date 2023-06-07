<?php

require_once("../config.php");

use \MedWeb\utility\Utility;
use \MedWeb\Appointment;

$city = Utility::sanitize($_POST['city']); 
$state = Utility::sanitize($_POST['state']); 
$zip = Utility::sanitize($_POST['zip']); 
$status = "Pending";
$color = "badge-secondary";
$address = $city."-".$zip.", ".$state;

$appoint = new Appointment();

$appoint->id = uniqid();
$appoint->patient_name =  Utility::sanitize($_POST['name']);      
$appoint->doctor_name =  Utility::sanitize($_POST['doc']);
$appoint->gender =  Utility::sanitize($_POST['gender']);
$appoint->address = $address;
$appoint->phone =  Utility::sanitize($_POST['phone']);
$appoint->message =  Utility::sanitize($_POST['msg']);
$appoint->status =  $status;
$appoint->status_color =  $color;


$result = $appoint->storeReq($appoint);

if($result)
{

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once($short.'head.php'); ?>
    <title>Successful</title>
</head>
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
							<div class="card-body text-center">
							<i class="icon-check2 icon-2x text-success-400 border-success-400 border-3 rounded-round p-3 mb-3 mt-1"></i>
								<h5 class="card-title">Successful</h5>
								<p class="mb-3">Appointment request has been sent Successfully.</p>
								<a href="user_appointment.php" class="btn bg-success-400">GO BACK</a>
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

<?php }

?>