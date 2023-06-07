<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'./medweb_medical_service/config.php');

use \MedWeb\Faq;

$faq = new Faq();
$faqs = $faq->list();

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
        <div class="content">


        <div class="text-center mb-3 py-2">
					<h4 class="font-weight-semibold mb-1">All questions are answered</h4>
				</div>
				<!-- /questions title -->
	

				<!-- Inner container -->
				<div class="d-flex align-items-start flex-column flex-md-row">

					<!-- Left content -->
					<div class="w-100 overflow-auto order-2 order-md-1">
					<?php
		foreach($faqs as $key=>$faq)
		{

?>

						<!-- Questions list -->
						<div class="card-group-control card-group-control-right">
							<div class="card mb-2">
								<div class="card-header">
									<h6 class="card-title">
										<a class="text-default collapsed" data-toggle="collapse" href="#<?=$faq->id?>">
											<i class="icon-help mr-2 text-slate"></i> <?=$faq->question?>
										</a>
									</h6>
								</div>

								<div id="<?=$faq->id?>" class="collapse">
									<div class="card-body">
										<?=$faq->answer?>
									</div>

									<div class="card-footer bg-transparent d-sm-flex align-items-sm-center border-top-0 pt-0">
										<span class="text-muted">Latest update: <?=$faq->date?></span>
									</div>
								</div>
							</div>
		                </div>
<?php }
?>								
						<!-- /questions list -->
					</div>
					<!-- /left content -->

		<!-- Right sidebar component -->
					<div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-right border-0 shadow-0 wmin-sm-300 order-1 order-md-2 sidebar-expand-md">

						<!-- Sidebar content -->
						<div class="sidebar-content">



							<!-- Navigation -->
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
								<div class="card-header bg-transparent header-elements-inline">
									<span class="card-title font-weight-semibold">Ask Your question</span>
									<div class="header-elements">
										<div class="list-icons">
					                		<a href="#" class="list-icons-item"><i class="icon-question3"></i></a>
				                		</div>
			                		</div>
								</div>

								<div class="card-body">
									<form action="faq-sent.php" method='post'>
									<div class="form-group">
										<label>Enter your name:</label>
										<input name="name" type="text" class="form-control" placeholder="Name" required>
									</div>
									<div class="form-group">
										<label>Enter Your Email:</label>
										<input name="email" type="email" class="form-control" placeholder="Email" required>
									</div>
									<div class="form-group">
										<label>Enter your Question:</label>
										<input name="qus" type="text" class="form-control" placeholder="Question" required>
									</div>
								
									<button type="submit" class="btn bg-teal btn-block">Ask question <i class="icon-comment ml-2"></i></button>
									</form>
									
								</div>

							
							</div>
							<!-- /navigation -->



						</div>
						<!-- /sidebar content -->

					</div>
					<!-- /right sidebar component -->

		</div>
					


		
        </div>

		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>
