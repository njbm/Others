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

							<!-- Card deck -->
							<div class="mb-3 pt-2">
								<h6 class="mb-0 font-weight-semibold">
									All Medical Test Lists
								</h6>
								<span class="text-muted d-block">Please Contact customer care to <span class="text-primary">resolve any kind of confusion.</span></span>
							</div>

							<!-- Ex -->

						<div class="row">

<?php
$test_json = file_get_contents($json.'admin-medical-test.json');
$arr_test = json_decode($test_json, "true");
//dd($arr_test);

foreach($arr_test as $key=>$med_test) {

?>

   <div class="col-xl-3 col-md-6">


 <div class="card">
		   <div class="card-img-actions mx-1 mt-1">
		   <img class="card-img img-fluid" src="<?=$images2.'test-images/'.$med_test['image']?>" style="height: 300px;" alt="">
		  </div>

	<div class="card-body text-center">
			<h5 class="font-weight-semibold"><?=$med_test['title']?></h5>
			<h6 class=" text-primary">Cost: <?=$med_test['cost']?></h6>
			<p class="text-muted">Attendence Time: <?=$med_test['time']?></p>
			<p class="text-muted">Place: <?=$med_test['place']?></p>
			<form action="tests_appointment.php" method="post"> 
				<input type="hidden" name="id" value="<?=$med_test['id']?>">
				<button class="btn bg-primary-400 legitRipple"><i class="icon-calendar2 mr-2"></i>Make Appointment</a></button>
			</form>
	</div>

</div>

</div>

<?php } ?>	
</div>

<!--Ex-->
			
							
						
			



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
