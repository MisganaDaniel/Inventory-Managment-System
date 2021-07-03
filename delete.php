<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
        include_once 'includes/head.php';
    ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
            include_once 'includes/sidebar.php';
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                    include_once 'includes/nav.php';
                ?>

                <?php
                    @$id = $_GET['id'];
                    $records = mysqli_query($conn,"SELECT * FROM `asset` WHERE `id` = '$id'") OR die(mysqli_error($conn));
                    while($record=mysqli_fetch_assoc($records)){
                        $asset_name = $record['asset_name'];
                        $asset_SN = $record['asset_SN'];
                        $asset_description = $record['asset_description'];
                        $asset_owner = $record['asset_owner'];
                        $date = $record['date'];
                        $status = $record['status'];
                    }

                    if(isset($_POST['delete'])){
                        $owner = $_POST['owner']; 
                        $status = $_POST['status'];	
                        $record = mysqli_query($conn,"DELETE FROM `asset` WHERE `id`= '$id'");
                        if($record){
                            mysqli_close($db); // Close connection
                            header("location: all-asset.php"); // redirects to all records page
                            exit;
                        }else{
                            echo "Error: " . $record . " " . mysqli_error($conn);
                        }
                    }
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        
                    </div>
                    <div class="card shadow mt-5">
                        <div class="card-header">
                            <h3>Delete <?php echo @$asset_name; ?> Given to  '<?php echo @$asset_owner; ?>'</h3>
                        </div>
                        <div class="card-body">
                        <form action="update.php" method="post">
                                <div class="row">
                                    <div class="col">
                                        <label for=""><strong>Asset Name: </strong><?php echo @$asset_name; ?></label>
                                    </div>
                                    <div class="col mb-5">
                                        <label for=""><strong>Asset Serial Number: </strong><?php echo @$asset_SN; ?></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-5">
                                        <label for=""><strong>Asset Description: </strong><?php echo @$asset_description; ?></label>
                                    </div>
                                    <div class="col mb-5">
                                        <label for=""><strong>Asset Owner:</strong>  <?php echo @$asset_owner; ?></label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for=""><strong>Asset Created Date:</strong>  <?php echo @$date; ?></label>
                                    </div>
                                    <div class="col mb-5">
                                        <label for=""><strong>Asset Status:</strong>  <?php echo @$status; ?></label>
                                    </div>
                                </div>
                                <div class="row" style="margin-left:900px;">
                                    <button type="submit" name="delete" class="btn btn-danger mr-2">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                        

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <?php
                    include_once 'includes/footer.php';
                ?>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>