<?php
$path = $_SERVER['DOCUMENT_ROOT'].'/medweb_medical_service';
include_once($path.'/config.php');

use \MedWeb\Service;

$service = new Service();
$services = $service->list();

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

				<!-- Basic datatable -->
				<div class="card">
				<?php
					//if(array_key_exists('message', $_GET) && !empty($_GET['message'])):
					// if(array_key_exists('message', $_SESSION) && !empty($_SESSION['message'])):
						$message = flush_session('message');
						if($message):
					?>
				<div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
				<button type="button" class="close" data-dismiss="alert"><span>×</span></button><?=$message?></div>
				<?php
					endif
					?>
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Service Card List</h5>
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
                                <th>Serial No.</th>
								<th>Service Name</th>
								<th>Headline</th>
								<th>Content</th>
								<th>Icon</th>
                              
								<th class="text-center">Actions</th>
							</tr>
						</thead>

						<tbody>
                        
                        <?php

                         foreach($services as $key=>$service_card){ ?>
							<tr>
                           
								<td><?=++$key?></td>
								<td><?=$service_card->name?></td>
								<td><?=$service_card->heading?></td>
								<td><?=$service_card->paragraph?></td>
                                <td><?=$service_card->icon?></td>
								

								<td class="text-center">
									<div class="list-icons">
										<div class="dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right">
												<!-- <a href="admin-slider-view.php?id=<?=$slide['id']?>"class="dropdown-item"><i class="icon-eye"></i>View</a> -->
                                                <a href="#" class="dropdown-item"><i class="icon-lock4"></i>Activate</a>
												

												<form action="service-edit.php" method="post">
												<input type="hidden" name="id" value="<?=$service_card->id?>">
												<button class="dropdown-item" type="submit"><i class="icon-pencil"></i> Edit</button>
						                        </form>

												<form action="service-delete.php" method="post">
												<input type="hidden" name="id" value="<?=$service_card->id?>">
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
