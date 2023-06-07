
<?php
$path = $_SERVER['DOCUMENT_ROOT'].'/medweb_medical_service';
include_once($path.'/config.php');

use \MedWeb\MedicalTestAppointReq;
$testApp = new MedicalTestAppointReq();

$tests = $testApp->list();

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
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Add New Medical Test Appoinment</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

					<div class="card-body">

						<form action="add-test-appoint-process.php" method="post">
							<fieldset>
								
								

								<div class="form-group">
									<label>Patient Name:</label>
									<input name="name" type="text" class="form-control" placeholder="Name" required>
								</div>

								<div class="form-group">
									<label>Test Name:</label>
									<input name="test" type="text" class="form-control" placeholder="Test Name" required>
								</div>

								<div class="form-group">
									<label>Gender:</label>
									<input name="gender" type="text" class="form-control" placeholder="Gender" required>
								</div>

                                <div class="form-group">
									<label>Address:</label>
									<input name="add" type="text" class="form-control" placeholder="Address" required>
								</div>

								<div class="form-group">
									<label>Phone number:</label>
									<input name="phone" type="text" class="form-control" placeholder="Phone Number" required>
								</div>

                                <div class="form-group">
									<label>Time and Date:</label>
									<input name="date" type="text" class="form-control" placeholder="EX: Monday, May 22, 2023 at 4PM" required>
								</div>

							
							</fieldset>


							<div class="text-center mt-2">
								<button type="submit" class="btn btn-primary">Save<i class="icon-paperplane ml-2"></i></button>
							</div>
						</form>
						

						
					</div>
				</div>
                <!--end-->

	        <!-- Basic datatable -->
	        <div class="card">
			<?php

						$message = flush_session('message');
						if($message):
					?>
				<div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
				<button type="button" class="close" data-dismiss="alert"><span>×</span></button><?=$message?></div>
				<?php
					endif
					?>
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Medical Test Appointemnt Request</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

					

					<table class="table datatable-basic">
						<thead>
							<tr>
								<th>Patient Name</th>
								<th>Test Name</th>
								<th>Gender</th>
								<th>Address</th>
								<th>Phone</th>
								<th>Message</th>
                                <th>Status</th>
								
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach($tests as $key=>$appoint){ ?>
							<tr>
								<td><?=$appoint->patient_name?></td>
								<td><?=$appoint->test_name?></td>
								<td><?=$appoint->gender?></td>
								<td><?=$appoint->address?></td>
								<td><?=$appoint->phone?></td>
								<td><?=$appoint->message?></td>	
                                <td><span class="badge <?=$appoint->status_color?>"><?=$appoint->status?></span></td>	
             
								<td class="text-center">
									<div class="list-icons">
										<div class="dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right">
												
												<?php if($appoint->status_color=='badge-secondary' && $appoint->status=='Pending'){ ?>
													<form action="medical-test-update-status.php" method="post">
												<input type="hidden" name="id" value="<?=$appoint->id?>">
                                                <input type="hidden" name="name" value="<?=$appoint->patient_name?>">
                                                <input type="hidden" name="test" value="<?=$appoint->test_name?>">
                                                <input type="hidden" name="gender" value="<?=$appoint->gender?>">
                                                <input type="hidden" name="add" value="<?=$appoint->address?>">
                                                <input type="hidden" name="phone" value="<?=$appoint->phone?>">
                                                <input type="hidden" name="message" value="<?=$appoint->message?>">
                                                <input type="hidden" name="status" value="<?=$appoint->status?>">
                                                <input type="hidden" name="color" value="<?=$appoint->status_color?>">

												<button class="dropdown-item" type="submit"><i class="icon-database-refresh"></i> Update Status</button>
						                        </form>
												<?php } ?>
											

												<form action="medical-test-appoint-req-delete.php" method="post">
												<input type="hidden" name="id" value="<?=$appoint->id?>">
												<button class="dropdown-item" type="submit" onclick="return confirm('Are you sure?')"><i class="icon-cross"></i> Delete</button>
						                        </form>
											</div>
										</div>
									</div>
								</td>
							</tr>
							<?php } ?>
			
						</tbody>
					</table>
				</div>
				<!-- /basic datatable -->

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
