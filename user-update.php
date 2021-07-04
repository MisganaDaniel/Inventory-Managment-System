<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
        include_once 'connection/connection.php';
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
                <!-- End of Topbar -->
                <?php
                    @$id = $_GET['id'];
                    $records = mysqli_query($conn,"SELECT * FROM `user` WHERE `id` = '$id'") OR die(mysqli_error($conn));
                    while($record=mysqli_fetch_assoc($records)){
                        $fullname = $record['fullname'];
                        $email = $record['email'];
                        $role = $record['role'];
                        $tel = $record['tel'];
                        $status = $record['status'];
                    }

                    if(isset($_POST['update'])){ 
                        $status = $_POST['status'];	
                        $record = mysqli_query($conn,"UPDATE `user` 
                                                      SET `status`='$status'
                                                      ");
                        if($record){
                            echo '<script type="text/javascript">';
                            echo ' alert("User Details Updated Successful")';
                                header('Location: all-asset.php');
                            echo '</script>';
                        }else{
                            echo "Error: " . $record . " " . mysqli_error($conn);
                        }
                    }
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        
                    </div>
                    <div class="card shadow mt-5">
                        <div class="card-header">
                            <h1><i class="fas fa-user"></i> Update User</h1>
                        </div>
                        <div class="card-body">
                            <form action="user-update.php" method="post">
                                <div class="row">
                                    <div class="col">
                                        <label for="">User Name</label>
                                        <input type="text" class="form-control" placeholder="<?php echo @$fullname; ?>" readonly>
                                    </div>
                                    <div class="col mb-5">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" placeholder="<?php echo @$email; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-5">
                                        <label for="">Phone</label>
                                        <input type="text" class="form-control" placeholder="<?php echo @$tel; ?>" readonly>
                                    </div>
                                    <div class="col">
                                        <label for="">Role</label>
                                        <input type="text" class="form-control" placeholder="<?php echo @$role; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for=""><strong>Status: </strong><?php echo $status; ?></label>
                                        <select name="status" class="form-control">
                                            <option value="">Change Status</option>
                                            <option value="Block">Block</option>
                                            <option value="Active">Active</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" style="margin-left:900px;">
                                    <button type="submit" name="update" class="btn btn-primary mr-2">Update</button>
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