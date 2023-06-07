<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'./medweb_medical_service/config.php');
use MedWeb\BedAllot;
$bedAllot = new BedAllot();
$bed = $bedAllot->find($_POST['id']);

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
				<?php include_once($short.'profile.php') ?>
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
				            <!-- Horizontal form modal -->


							<div class="card">
							
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Edit Bed Information</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

					<div class="card-body">

						<form action="bed-edit-process.php" method="post">
							<fieldset>	
							<div class="form-group row">
									<input name="id" type="hidden" placeholder="Name" value="<?=$bed->id?>" required>
									<input name="status" type="hidden" value="<?=$bed->status?>" required>
							        <input name="color" type="hidden" value="<?=$bed->status_color?>" required>
										<label class="col-form-label col-sm-3">Patient Name</label>
										<div class="col-sm-9">
											<input name="name" type="text" placeholder="Name" class="form-control" value="<?=$bed->patient_name?>" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-sm-3">Age</label>
										<div class="col-sm-9">
											<input name="age" type="text" placeholder="Age" class="form-control" value="<?=$bed->age?>" required>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-sm-3">Phone Number</label>
										<div class="col-sm-9">
											<input name="phone" type="text" placeholder="+088 XXX XX XXXXXX" data-mask="+99-99-9999-9999" class="form-control" value="<?=$bed->phone?>" required>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-sm-3">Address</label>
										<div class="col-sm-9">
											<input name="add" type="text" placeholder="Ring street 12, building D, flat #67" class="form-control" value="<?=$bed->address?>" required>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-sm-3">Time And Date</label>
										<div class="col-sm-9">
											<div class="input-group">
												<span class="input-group-prepend">
													<span class="input-group-text"><i class="icon-calendar22"></i></span>
												</span>
												<input name="date" type="text" class="form-control daterange-basic" value="01/01/2023 - 01/31/2023" value="<?=$bed->date?>" required> 
											</div>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-sm-3">Room Number</label>
										<div class="col-sm-9">
											<input name="room" type="text" placeholder="Room Number" class="form-control" value="<?=$bed->room?>" required>
										</div>
									</div>

							
							</fieldset>


							<div class="text-center mt-2">
								<button type="submit" class="btn btn-primary">Save<i class="icon-paperplane ml-2"></i></button>
							</div>
						</form>
						

						
					</div>
				</div>
					

			
				
				<!-- /horizontal form -->


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