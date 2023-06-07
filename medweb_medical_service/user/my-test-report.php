<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'./medweb_medical_service/config.php');
?>

<?php include_once($short.'head.php') ?>
<!DOCTYPE html>
<html lang="en">


<body>

	
<!-- Main navbar -->
<?php include_once($short.'nav.php') ?>
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
			<?php include_once($short.'profile-user.php') ?>
			<!-- /user menu -->


			<!-- Main navigation -->
		    <?php include_once($short.'sidebar-menu-user.php') ?>
			<!-- /main navigation -->

		</div>
		<!-- /sidebar content -->
		
	</div>
	<!-- /main sidebar -->


	<!-- Main content -->
	<div class="content-wrapper">


		<!-- Content area -->
		<div class="content">

        <h5 class="mb-3">My Test Report</h5>

        <div class="card card-body">
							<div class="media">
								<div class="media-body">
									<h6 class="media-title text-success font-weight-semibold">You have a test report!</h6>
									<p class="text-dark">You have tested on testName. This is your test report visit report </p>
                                    <p>Report Date: date</p>
								</div>

								<div class="ml-3 align-self-center">
									<i class="icon-files-empty icon-2x text-success-300"></i>
								</div>
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
