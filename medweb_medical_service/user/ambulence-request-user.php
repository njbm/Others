<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'./medweb_medical_service/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<?php include_once($short.'head.php') ?>

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



			<!-- Fieldset legend -->
			<div class="row">
				<div class="col-md-12">

					<!-- Basic legend -->
					<div class="card">
						<div class="card-header header-elements-inline">
							<h5 class="card-title">Request for Ambulance</h5>
							<div class="header-elements">
								<div class="list-icons">
									<a class="list-icons-item" data-action="collapse"></a>
									<a class="list-icons-item" data-action="reload"></a>
									<a class="list-icons-item" data-action="remove"></a>
								</div>
							</div>
						</div>

						<div class="card-body">
							<form action="ambulence-req-process.php" method="post">
								<fieldset>
									
									

									<div class="form-group">
										<label>Enter Your Name:</label>
										<input name="name" type="text" class="form-control" placeholder="Name" required>
									</div>

                                    <div class="form-group">
										<label>Enter Your Address:</label>
										<input name="add" type="text" class="form-control" placeholder="Address" required>
									</div>

                                    <div class="form-group">
										<label>Enter Your Phone number:</label>
										<input name="phone" type="text" class="form-control" placeholder="Phone Number" required>
									</div>



									<div class="form-group">
										<label>Your Message:</label>
										<textarea name="msg" rows="5" cols="5" class="form-control" placeholder="Enter your message here" required></textarea>
									</div>
								</fieldset>


								<div class="text-right">
									<button type="submit" class="btn btn-primary">Send<i class="icon-paperplane ml-2"></i></button>
								</div>
							</form>
						</div>
					</div>
					<!-- /basic legend -->

				</div>


			</div>
			<!-- /fieldset legend -->


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
