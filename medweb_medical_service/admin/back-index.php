<?php //include_once($_SERVER['DOCUMENT_ROOT'].'/config.php') ?>

<?php $path = $_SERVER['DOCUMENT_ROOT'].'/medweb_medical_service'; 
      include_once($path.'/config.php');
?>


<!DOCTYPE html>
<html lang="en">


<?php //include_once("../partials/head.php"); ?>

<?php include_once($short.'head.php') ?>

<body>
    <!-- Main navbar -->
    <?php include_once($short.'nav.php') ?>


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


                <!-- Sidebar Menu navigation -->

                <?php include_once($short.'sidebar-menu.php') ?>

                <!-- /main navigation -->

            </div>
            <!-- /sidebar content -->

        </div>
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content">


            <!-- Simple statistics -->
            <div class="mb-3">
                <h6 class="mb-0 font-weight-semibold">
                    Simple stats
                </h6>
                <span class="text-muted d-block">Boxes with icons</span>
            </div>


            <div class="row">
                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body bg-blue-400 has-bg-image">
                        <div class="media">
                            <div class="media-body">
                                <h3 class="mb-0">54,390</h3>
                                <span class="text-uppercase font-size-xs">total admitted</span>
                            </div>

                            <div class="ml-3 align-self-center">
                                <i class="icon-enter3 icon-3x opacity-75"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body bg-danger-400 has-bg-image">
                        <div class="media">
                            <div class="media-body">
                                <h3 class="mb-0">389,438</h3>
                                <span class="text-uppercase font-size-xs">total ambulance request</span>
                            </div>

                            <div class="ml-3 align-self-center">
                                <i class="icon-truck icon-3x opacity-75"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body bg-success-400 has-bg-image">
                        <div class="media">
                            <div class="mr-3 align-self-center">
                                <i class="icon-files-empty icon-3x opacity-75"></i>
                            </div>

                            <div class="media-body text-right">
                                <h3 class="mb-0">652,549</h3>
                                <span class="text-uppercase font-size-xs">total medical report</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body bg-indigo-400 has-bg-image">
                        <div class="media">
                            <div class="mr-3 align-self-center">
                                <i class="icon-calendar3 icon-3x opacity-75"></i>
                            </div>

                            <div class="media-body text-right">
                                <h3 class="mb-0">245,382</h3>
                                <span class="text-uppercase font-size-xs">total appointment</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body">
                        <div class="media">
                            <div class="mr-3 align-self-center">
                                <i class="icon-drawer2 icon-3x text-blue-400"></i>
                            </div>

                            <div class="media-body text-right">
                                <h3 class="font-weight-semibold mb-0">652,549</h3>
                                <span class="text-uppercase font-size-sm text-muted">total Cabin remain</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body">
                        <div class="media">
                            <div class="mr-3 align-self-center">
                                <i class="icon-truck icon-3x text-danger-400"></i>
                            </div>

                            <div class="media-body text-right">
                                <h3 class="font-weight-semibold mb-0">245,382</h3>
                                <span class="text-uppercase font-size-sm text-muted">ambulance request pending</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body">
                        <div class="media">
                            <div class="media-body">
                                <h3 class="font-weight-semibold mb-0">54,390</h3>
                                <span class="text-uppercase font-size-sm text-muted">total report complete</span>
                            </div>

                            <div class="ml-3 align-self-center">
                                <i class="icon-files-empty icon-3x text-success-400"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body">
                        <div class="media">
                            <div class="media-body">
                                <h3 class="font-weight-semibold mb-0">389,438</h3>
                                <span class="text-uppercase font-size-sm text-muted">total appointment pending</span>
                            </div>

                            <div class="ml-3 align-self-center">
                                <i class="icon-calendar3 icon-3x text-indigo-400"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /simple statistics -->


            <!-- Basic columns -->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Basic columns</h5>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="chart-container">
                        <div class="chart has-fixed-height" id="columns_basic"></div>
                    </div>
                </div>
            </div>
            <!-- /basic columns -->



        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</body>

</html>