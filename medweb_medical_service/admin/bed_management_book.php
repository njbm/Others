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


                        <form action="bed_management_book_process.php" method="post" class="form-horizontal">
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3">Patient Name</label>
                                    <div class="col-sm-9">
                                        <input name="name" type="text" placeholder="Name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3">Age</label>
                                    <div class="col-sm-9">
                                        <input name="age" type="text" placeholder="Age" class="form-control" required>
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
                                        <input name="add" type="text" placeholder="Ring street 12, building D, flat #67"
                                            class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3">Time And Date</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-calendar22"></i></span>
                                            </span>
                                            <input name="date" type="text" class="form-control daterange-basic"
                                                value="01/01/2023 - 01/31/2023" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3">Room Number</label>
                                    <div class="col-sm-9">
                                        <input name="room" type="text" value="<?=$_POST["room"]?>"
                                            placeholder="Room Number" class="form-control" required>
                                    </div>
                                </div>


                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn bg-primary">Admit</button>
                            </div>
                        </form>

                    </div>
                </div>
                <!-- add new patient end -->
            </div>

            <!-- /content area -->
            <!-- /CHANGED -->


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