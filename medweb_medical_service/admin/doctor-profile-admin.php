<?php
$path = $_SERVER['DOCUMENT_ROOT'].'/medweb_medical_service';
include_once($path.'/config.php');

// $doctor_json = file_get_contents($json."admin_doctor_list.json");
// $arr_doc = json_decode($doctor_json, "true");

use \MedWeb\Doctor;

$doctors = new Doctor();
$doctors = $doctors->all();
// dd($doctors);
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
                <?php
					//if(array_key_exists('message', $_GET) && !empty($_GET['message'])):
					// if(array_key_exists('message', $_SESSION) && !empty($_SESSION['message'])):
						$message = flush_session('message');
						if($message):
					?>
                <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"><span>×</span></button><?=$message?>
                </div>
                <?php
					endif
					?>


                <!-- Horizontal cards -->
                <div class="mb-3 pt-2">
                    <h6 class="mb-0 font-weight-semibold">
                        Doctors
                    </h6>

                </div>

                <div class="row">
                    <?php //dd($arr_doc); 
			   foreach($doctors as $key=>$doctor) { ?>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-body">
                            <div class="media">
                                <div class="mr-3">
                                    <a href="#">
                                        <img src="../images/doctor-images/<?=$doctor->image?>" class="rounded-circle"
                                            width="42" height="42" alt="">
                                    </a>
                                </div>

                                <div class="media-body">
                                    <h6 class="mb-0"><?=$doctor->name?></h6>
                                    <span class="text-muted"><?=$doctor->specialist?></span>
                                </div>

                                <div class="ml-3 align-self-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item dropdown-toggle caret-0"
                                                data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">


                                                <form action="admin-doctor-view.php" method="post">
                                                    <input type="hidden" name="id" value="<?=$doctor->id?>">
                                                    <button class="dropdown-item" type="submit"><i
                                                            class="icon-eye"></i>View Details</button>
                                                </form>


                                                <form action="doctor-profile-edit.php" method="post">
                                                    <input type="hidden" name="id" value="<?=$doctor->id?>">
                                                    <input type="hidden" name="picture" value="<?=$doctor->image?>">
                                                    <button class="dropdown-item" type="submit"><i
                                                            class="icon-pencil"></i>Edit Details</button>
                                                </form>

                                                <form action="doctor-profile-delete.php" method="post">
                                                    <input type="hidden" name="id" value="<?=$doctor->id?>">
                                                    <input type="hidden" name="picture" value="<?=$doctor->image?>">
                                                    <button class="dropdown-item" type="submit"
                                                        onclick="return confirm('Are You Sure?')"><i
                                                            class="icon-cross"></i>Delete</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php } ?>
                </div>
                <!-- /horizontal cards -->

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