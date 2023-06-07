<?php

$path = $_SERVER['DOCUMENT_ROOT'].'/medweb_medical_service'.'/';

include_once($path.'config.php');

// $doctor_json = file_get_contents($json."admin_doctor_list.json");
// $arr_doc = json_decode($doctor_json, "true");
use \MedWeb\Doctor;
use \MedWeb\utility\Validator;
use \MedWeb\utility\Utility;

$id = Utility::sanitize($_POST['id']);

if(!Validator::empty($id)){
	$doctors = new Doctor();
	$docpro = $doctors->show($id);	
}else{
	dd("No preview found!"); //using session
}
//dd($arr_doc);

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
                    <div class="card-body bg-blue text-center card-img-top"
                        style="background-image: url(../global_assets/images/backgrounds/panel_bg.png); background-size: contain;">
                        <div class="card-img-actions d-inline-block mb-3">
                            <img class="img-fluid rounded-circle" src="../images/doctor-images/<?=$docpro->image?>"
                                width="170" height="170" alt="">
                            <div class="card-img-actions-overlay card-img rounded-circle">
                                <a href="#"
                                    class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round legitRipple">
                                    <i class="icon-plus3"></i>
                                </a>
                                <a href="user_pages_profile.html"
                                    class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2 legitRipple">
                                    <i class="icon-link"></i>
                                </a>
                            </div>
                        </div>

                        <h6 class="font-weight-semibold mb-0"><?=$docpro->name?></h6>
                        <span class="d-block opacity-75"><?=$docpro->specialist?></span>

                        <ul class="list-inline list-inline-condensed mt-3 mb-0">
                            <li class="list-inline-item">
                                <a href="#"
                                    class="btn btn-outline bg-white btn-icon text-white border-white border-2 rounded-round legitRipple">
                                    <i class="icon-pencil"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#"
                                    class="btn btn-outline bg-white btn-icon text-white border-white border-2 rounded-round legitRipple">
                                    <i class="icon-trash"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body border-top-0">
                        <div class="d-sm-flex flex-sm-wrap mb-3">
                            <div class="font-weight-semibold">Full name:</div>
                            <div class="ml-sm-auto mt-2 mt-sm-0"><?=$docpro->name?></div>
                        </div>

                        <div class="d-sm-flex flex-sm-wrap mb-3">
                            <div class="font-weight-semibold">Experiences Summary:</div>
                            <div class="ml-sm-auto mt-2 mt-sm-0"><?=$docpro->Experiences_Summary?></div>
                        </div>

                        <div class="d-sm-flex flex-sm-wrap mb-3">
                            <div class="font-weight-semibold">Corporate Email:</div>
                            <div class="ml-sm-auto mt-2 mt-sm-0"><?=$docpro->email?></div>
                        </div>

                        <div class="d-sm-flex flex-sm-wrap">
                            <div class="font-weight-semibold">Practice Days:</div>
                            <div class="ml-sm-auto mt-2 mt-sm-0"><?=$docpro->Practice_Days?></div>
                        </div>

                    </div>
                </div>



            </div>
            <!-- /content area -->


            <!-- Footer -->
            <div class="navbar navbar-expand-lg navbar-light">
                <div class="text-center d-lg-none w-100">
                    <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse"
                        data-target="#navbar-footer">
                        <i class="icon-unfold mr-2"></i>
                        Footer
                    </button>
                </div>

                <div class="navbar-collapse collapse" id="navbar-footer">
                    <span class="navbar-text">
                        &copy; 2015 - 2018. <a href="#">Limitless Web App Kit</a> by <a
                            href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
                    </span>

                    <ul class="navbar-nav ml-lg-auto">
                        <li class="nav-item"><a href="https://kopyov.ticksy.com/" class="navbar-nav-link"
                                target="_blank"><i class="icon-lifebuoy mr-2"></i> Support</a></li>
                        <li class="nav-item"><a href="http://demo.interface.club/limitless/docs/"
                                class="navbar-nav-link" target="_blank"><i class="icon-file-text2 mr-2"></i> Docs</a>
                        </li>
                        <li class="nav-item"><a
                                href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov"
                                class="navbar-nav-link font-weight-semibold"><span class="text-pink-400"><i
                                        class="icon-cart2 mr-2"></i> Purchase</span></a></li>
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