<?php include 'partials/session.php'; ?>
<?php include 'partials/main.php'; ?>

<head>

    <?php includeFileWithVariables('partials/title-meta.php', array('title' => 'Dashboard')); ?>

    <?php include 'partials/head-css.php'; ?>

</head>

<?php include 'partials/body.php';
?>

<div id="layout-wrapper">

    <?php include 'partials/menu.php';
    ?>

    <!-- Start right Content here -->

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <div>
                                <!-- <h4 class="fs-16 fw-semibold mb-1 mb-md-2">Morning, <span class="text-primary">Jonas!</span></h4>
                                <p class="text-muted mb-0">Here's what's happening with your store today.</p> -->
                            </div>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Clivax</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                        <?php include 'list-all-creators.php'; ?>


                    </div>
                </div>
                <!--    end row -->
            </div>
            <!-- end container-fluid -->
        </div>
        <!-- End Page-content -->

        <?php include 'partials/footer.php'; ?>

    </div>
    <!-- end main content-->
</div>
<!-- end layout-wrapper -->

<!-- <?php //include 'partials/right-sidebar.php'; 
        ?> -->

<?php include 'partials/vendor-scripts.php'; ?>


<!-- apexcharts -->
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>

<script src="assets/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>
</body>

</html>