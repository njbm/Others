<?php
$path = $_SERVER['DOCUMENT_ROOT'].'/medweb_medical_service';
include_once($path.'/config.php');


use \MedWeb\Patient;
  use \MedWeb\utility\Validator;
  use \MedWeb\utility\Utility;

  $id = Utility::sanitize($_POST['id']);

   if(!Validator::empty($id)){
	 $patient = new Patient();
	 $patient = $patient->edit($id);
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

			<!-- add new patient -->

            <div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Add New Patient</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

					<div class="card-body">

						<form action="patient-edit-process.php" method="post">
							<fieldset>
							<input type="hidden" name="status" value="<?=$patient->status?>">
							<input type="hidden" name="color" value="<?=$patient->status_color?>">
								
                            <input name="id" type="hidden" placeholder="Name" value="<?=$patient->id?>">

							    
								<div class="form-group">
									<label>Patient Name:</label>
									<input name="name" type="text" class="form-control" placeholder="Name" value="<?=$patient->patient_name?>" required>
								</div>

								<div class="form-group">
									<label>Age:</label>
									<input name="age" type="text" class="form-control" placeholder="Ambulence No." value="<?=$patient->age?>" required>
								</div>

								<div class="form-group">
									<label>Address:</label>
									<input name="add" type="text" class="form-control" placeholder="Address" value="<?=$patient->address?>" required>
								</div>

								<div class="form-group">
									<label>Phone number:</label>
									<input name="phone" type="text" class="form-control" placeholder="Phone Number" value="<?=$patient->phone?>" required>
								</div>

								<div class="form-group">
									<label>Time and Date:</label>
									<input name="date" type="text" class="form-control" placeholder="Time and Date" value="<?=$patient->date?>" required>
								</div>

                                <div class="form-group">
									<label>Room Number:</label>
									<input name="room" type="text" class="form-control" placeholder="Room Number" value="<?=$patient->room?>" required>
								</div>

                                <div class="form-group">
									<label>Bill Amount:</label>
									<input name="bill" type="text" class="form-control" placeholder="Bill Amount" value="<?=$patient->bill?>" required>
								</div>

							
							</fieldset>


							<div class="text-center mt-2">
								<button type="submit" class="btn btn-primary">Save<i class="icon-paperplane ml-2"></i></button>
							</div>
						</form>
						

						
					</div>
				</div>
            
            

            <!-- add new patient end -->


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
