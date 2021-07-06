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

                <?php
                    @$id = $_GET['id'];
                    $records = mysqli_query($conn,"SELECT * FROM `asset` WHERE `id` = '$id'") OR die(mysqli_error($conn));
                    while($record=mysqli_fetch_assoc($records)){
                        //$user_id = $record['id'];
                        $asset_name = $record['asset_name'];
                        $asset_SN = $record['asset_SN'];
                        $asset_description = $record['asset_description'];
                        $asset_owner = $record['asset_owner'];
                        $date = $record['date'];
                        $status = $record['status'];
                    }

                    if(isset($_POST['update'])){
                        $user_id = $_POST['get_id'];
                        $owner = $_POST['owner']; 
                        $status = $_POST['status'];	
                        $record = mysqli_query($conn,"UPDATE `asset` SET `asset_owner`='$owner',`status`='$status' WHERE `id`='$user_id'");
                        if($record){
                            echo '<script type="text/javascript">';
                            echo ' alert("Asset Details Updated Successfully")';
                            header('Location: all-asset.php');
                            echo '</script>';
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
                            <h1><i class="fas fa-store"></i> Update Assets</h1>
                        </div>
                        <div class="card-body">
                        <form action="update.php" method="post">
                                <div class="row">
                                    <div class="col">
                                        <label for=""><strong>Asset Name</strong></label>
                                        <input type="text"  class="form-control" placeholder="<?php echo @$asset_name; ?>" aria-label="Asset Name" readonly>
                                    </div>
                                    <div class="col mb-5">
                                        <label for=""><strong>Asset Serial Number</strong></label>
                                        <input type="text" class="form-control" placeholder="<?php echo @$asset_SN; ?>" aria-label="Asset Serial Number" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 mb-5">
                                        <label for=""><strong>Asset Description</strong></label>
                                        <input type="text"  class="form-control" placeholder="<?php echo @$asset_description; ?>" aria-label="Asset Name" readonly>   
                                    </div>

                                    <?php
                                        $username = $_SESSION['username']; 
                                        $role = $_SESSION['role'];
                                        if($role == 'Admin'){
                                            echo '
                                            <div class="col mb-5">
                                                <label for="">
                                                    <strong>Asset Owner:</strong>';?>  <?php echo @$asset_owner; ?>
                                                <?php echo '</label>';?>
                                                <?php echo '<select class="form-control" name="owner" id="">
                                                    <option value="'?><?php echo $asset_owner; ?><?php echo '">'?> <?php echo @$asset_owner; ?> <?php echo '</option>'; ?>
                                                    <?php
                                                        $records = mysqli_query($conn,"SELECT `fullname` FROM `user` WHERE `role` = 'User'") OR die(mysqli_error($conn));
                                                        while($record=mysqli_fetch_assoc($records)){
                                                            echo "<option value='".$record['fullname']."'>" .$record['fullname']. "</option>";
                                                        }
                                                    ?>
                                        <?php
                                            echo '</select>
                                                  </div>
                                            ';
                                        }else if($role == 'User'){
                                            echo '
                                            <div class="col mb-5">
                                                <label for="">
                                                    <strong>Asset Owner:</strong>';?>  <?php echo @$asset_owner; ?>
                                                <?php echo '</label>';?>
                                                <?php echo ' <input type="hidden" name="owner" class="form-control" value="';?><?php echo @$asset_owner;?><?php echo'" aria-label="Asset Serial Number">';?>
                                                
                                        <?php
                                            echo '</select>
                                                  </div>
                                            ';
                                        }
                                        ?>
                                    
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for=""><strong>Asset Created Date:</strong>  <?php echo @$date; ?></label>
                                        <input type="text"  class="form-control" placeholder="<?php echo @$date; ?>" aria-label="Asset Name" readonly>   
                                    </div>
                                    <div class="col mb-5">
                                        <label for=""><strong>Asset Status:</strong>  <?php echo @$status; ?></label>
                                        <select class="form-control" name="status" id="">
                                            <option value="Purchased">Purchased</option>
                                            <option value="Operational">Operational</option>
                                            <option value="In Store">In Store</option>
                                            <option value="Not Operational">Not Operational</option>
                                            <option value="Retired">Retired</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" style="margin-left:900px;">
                                        <input type="hidden" name="get_id" value="<?php echo $id; ?>">
                                    <button type="submit" name="update" class="btn btn-primary mr-2">Update</button>
                                    <!-- <a href="up.php?id=<?php echo $id; ?>" class="btn btn-primary">Update</a> -->
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