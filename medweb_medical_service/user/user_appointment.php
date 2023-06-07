<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'./medweb_medical_service/config.php');
//dd($_POST);
if(isset($_POST['submit'])){
	$doctor_json = file_get_contents($json."admin_doctor_list.json");
	$arr_doc = json_decode($doctor_json, "true");
	
}else{
	
}






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
							<h5 class="card-title">Appoinment Form</h5>
							<div class="header-elements">
								<div class="list-icons">
									<a class="list-icons-item" data-action="collapse"></a>
									<a class="list-icons-item" data-action="reload"></a>
									<a class="list-icons-item" data-action="remove"></a>
								</div>
							</div>
						</div>

						<div class="card-body">
							<form action="appointment-req-process.php" method="post">
								<fieldset>
									
									<div class="row">
<?php 
if(isset($arr_doc)){
	foreach($arr_doc as $key=>$doctor) {           
		if($doctor['id']== $_POST['id']){
			?>
												<div class="form-group col-lg-6">
										<label>Specialist:</label><br>
										<span style="font-size: 16px;" class="badge badge-light badge-striped badge-striped-left border-left-primary"><?=$doctor['specialist']?></span>
									</div>
									<div class="form-group col-lg-6">
										<label>Doctor Name:</label><br>
										<input name="doc" type="hidden" class="form-control" value="<?=$doctor['name']?>">
										<span style="font-size: 16px;" class="badge badge-light badge-striped badge-striped-left border-left-primary"><?=$doctor['name']?></span>
										
									</div>
			<?php
		}
}
}else{
	?>
										<div class="form-group col-lg-6">
										<label>Specialist:</label>
										<select name="div" data-placeholder="Select Specialist" class="form-control form-control-select2" data-fouc>
											<option value="Emergency physicians">Emergency physicians</option>
											<option value="Gynecologists">Gynecologists</option> 
											<option value="Neurologists">Neurologists</option> 
											<option value="Cardiologists">Cardiologists</option> 
											<option value="Anesthesiologists">Anesthesiologists</option> 
											<option value="Radiologists">Radiologists</option> 
											<option value="Psychiatrists">Psychiatrists</option>  
	
										</select>
									</div>

									
									<div class="form-group col-lg-6">
										<label>Doctor:</label>
										<select name="doc" data-placeholder="Select Doctor" class="form-control form-control-select2" data-fouc>
											<option value="Hanna Dorman">Hanna Dorman</option>
											<option value="Marth Tom">Marth Tom</option> 
											<option value="Benjamin Loretti">Benjamin Loretti</option> 
											<option value="Vanessa Aurelius">Vanessa Aurelius</option> 
										</select>
									</div>
	<?php
}
?>

								</div>

									<div class="row">
									<div class="form-group col-lg-6">
										<label>Enter your name:</label>
										<input name="name" type="text" class="form-control" placeholder="Name" required>
									</div>
									<div class="form-group col-lg-6">
										<label>Enter Phone Number:</label>
										<input name="phone" type="text" class="form-control" placeholder="Phone Number" required>
									</div>

                                    </div>

									<div class="form-group">
										<label class="d-block">Gender:</label>

										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input name="gender" value="Male" type="radio" class="form-input-styled" checked data-fouc>
												Male
											</label>
										</div>

										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<input name="gender" value="Female" type="radio" class="form-input-styled" data-fouc>
												Female
											</label>
										</div>
									</div>

									<div class="row">

									<div class="form-group  col-lg-6">
										<label>City:</label>
										<input name="city" type="text" class="form-control" placeholder="City" required>
									</div>

									<div class="form-group  col-lg-4">
										<label>Select your state:</label>
										<select name="state" data-placeholder="Select your state" class="form-control form-control-select2" data-fouc required>
											<option></option>
											<optgroup label="Dhaka">
												<option>Gazipur</option>
												<option>Tangail</option>
												<option>Manikganj</option>
												<option>Munshiganj</option>
												<option>Narsingdi</option>
												<option>Narayanganj</option>
												<option>Dhaka</option>
												<option>Gopalganj</option>
												<option>Kishoreganj</option>
												<option>Madaripur</option>
												<option>Rajbari</option>
												<option>Shariatpur</option>
											</optgroup>
											<optgroup label="Chattogram">
												<option value="CA">California</option>
												<option value="NV">Nevada</option>
												<option value="WA">Washington</option>
											</optgroup>
											<optgroup label="Rajshahi">
												<option value="AZ">Arizona</option>
												<option value="CO">Colorado</option>
												<option value="WY">Wyoming</option>
											</optgroup>
											<optgroup label="Barishal">
												<option value="AL">Alabama</option>
												<option value="AR">Arkansas</option>
												<option value="KY">Kentucky</option>
											</optgroup>
											<optgroup label="Mymensingh">
												<option value="CT">Connecticut</option>
												<option value="DE">Delaware</option>
												<option value="FL">Florida</option>
											</optgroup>
											<optgroup label="Khulna">
												<option value="CT">Connecticut</option>
												<option value="DE">Delaware</option>
												<option value="FL">Florida</option>
											</optgroup>
											<optgroup label="Rangpur">
												<option value="CT">Connecticut</option>
												<option value="DE">Delaware</option>
												<option value="FL">Florida</option>
											</optgroup>
										</select>
									</div>

									<div class="form-group col-lg-2">
										<label>Zip:</label>
										<input name="zip" type="text" class="form-control" placeholder="Zip" required>
									</div>

								</div>

									<div class="form-group">
										<label>Your message:</label>
										<textarea name="msg" rows="5" cols="5" class="form-control" placeholder="Enter your message here" required></textarea>
									</div>
								</fieldset>


								<div class="text-right">
									<button type="submit" class="btn btn-primary">Make Appointment<i class="icon-paperplane ml-2"></i></button>
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
