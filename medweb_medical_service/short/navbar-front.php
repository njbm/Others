<?php

//include_once($_SERVER['DOCUMENT_ROOT'].'./medweb_medical_service/config.php');
require_once('config.php');
$menu = file_get_contents($json."navFront.json");
$arrMenu = json_decode($menu, "true");

//dd($arrMenu);

?>

<nav class="navbar navbar-expand-lg navbar-light bg-transparent fixed-top">
		<div class="container">
			<a class="navbar-brand" href="#"><span class="text-danger">Med</span>Web</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
				data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-auto font-weight-bold">
					
					<?php foreach($arrMenu as $key=>$item) { ?>
					<li class="nav-item">
						<a class="nav-link" href="<?=$item['link']?>"><?=$item['title']?></a>
					</li>

					<?php } ?>
		
                    <!-- <li class="nav-item dropdown">
						<a class="nav-link " href="#service" role="button" data-bs-toggle="dropdown"
							aria-expanded="false">
							Services
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Medical Test</a></li>
							<li><a class="dropdown-item" href="#">Test Report</a></li>
							<li><a class="dropdown-item" href="#">Ambulence</a></li>
						</ul>
					</li> -->								
				</ul>
				<div class="d-flex ms-auto">
					<a class="btn btn-outline-danger" href="login_modals.html">Login/Resigter</a>
				</div>
			</div>
		</div>
	</nav>