<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'./medweb_medical_service/config.php');
use \MedWeb\Bed;
$bed = new Bed();
$beds = $bed->list();

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
                <div id="modal_form_horizontal" class="modal fade" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Book Cabin</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <form action="add-bed-patient-process.php" method="post" class="form-horizontal">
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-3">Patient Name</label>
                                        <div class="col-sm-9">
                                            <input name="name" type="text" placeholder="Name" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-3">Age</label>
                                        <div class="col-sm-9">
                                            <input name="age" type="text" placeholder="Age" class="form-control"
                                                required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-3">Phone Number</label>
                                        <div class="col-sm-9">
                                            <input name="phone" type="text" placeholder="+088 XXX XX XXXXXX"
                                                data-mask="+99-99-9999-9999" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-3">Address</label>
                                        <div class="col-sm-9">
                                            <input name="add" type="text"
                                                placeholder="Ring street 12, building D, flat #67" class="form-control"
                                                required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-3">Time And Date</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="icon-calendar22"></i></span>
                                                </span>
                                                <input name="date" type="text" class="form-control daterange-basic"
                                                    value="01/01/2023 - 01/31/2023" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-3">Room Number</label>
                                        <div class="col-sm-9">
                                            <input name="room" type="text" placeholder="Room Number"
                                                class="form-control" required>
                                        </div>
                                    </div>


                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn bg-primary">Admit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /horizontal form modal -->


                <!-- Horizontal cards -->
                <div class="mb-3 pt-2">
                    <h6 class="mb-0 font-weight-semibold">
                        Cabins
                    </h6>

                </div>

                <div class="row">
                    <?php

			//dd($arr_beds);

			foreach($beds as $key=>$bedbook){
			if($bedbook->status_image == "green.png"){
                $disable = "disabled";
            }else{
                $disable = "";
            }
			?>

                    <div class="col-xl-3 col-md-6">
                        <div class="card card-body">
                            <div class="media">
                                <div class="mr-3">
                                    <a href="#">
                                        <img src="../global_assets/images/placeholders/<?=$bedbook->status_image?>"
                                            class="rounded-circle" width="42" height="42" alt="">
                                    </a>
                                </div>

                                <div class="media-body">
                                    <h6 class="mb-0"><?=$bedbook->cabin_no?></h6>
                                    <span class="text-muted"><?=$bedbook->type?></span>
                                </div>

                                <div class="ml-3 align-self-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item dropdown-toggle caret-0"
                                                data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <form action="bed_management_book.php" method="post">
                                                    <input type="hidden" name="room" value="<?=$bedbook->cabin_no?>">
                                                    <button class="dropdown-item" type="submit" name="book"
                                                        <?=$disable?>><i class="icon-calendar3"></i>Book Cabin</button>
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