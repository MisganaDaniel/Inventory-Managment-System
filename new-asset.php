<?php
    include_once 'connection/connection.php';
?>
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
                    if(isset($_POST['create'])){
                        $name = $_POST['name'];
                        $SN = $_POST['SN'];
                        $description = $_POST['description'];
                        $owner = $_POST['owner'];
                        $date = $_POST['date'];
                        $status = $_POST['status'];

                        $record = mysqli_query($conn,"INSERT INTO `asset` (`asset_name`,`asset_SN`,`asset_description`,`asset_owner`,`date`,`status`) VALUES ('$name','$SN','$description','$owner','$date','$status')");
                        if($record){
                            echo '<script type="text/javascript">';
                            echo ' alert("New Asset registration Successful")';
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
                    <div class="card shadow">
                        <div class="card-header">
                            <h1><i class="fas fa-store"></i> Create Asset</h1> 
                        </div>
                        <div class="card-body">
                            <form action="new-asset.php" method="post">
                                <div class="row">
                                    <div class="col">
                                        <label for="">Asset Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Asset Name" aria-label="Asset Name">
                                    </div>
                                    <div class="col mb-5">
                                        <label for="">Asset Serial Number</label>
                                        <input type="text" name="SN" class="form-control" placeholder="Asset Serial Number" aria-label="Asset Serial Number">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-5">
                                        <label for="">Asset Description</label>
                                        <textarea class="form-control" name="description" rows="4" cols="50"></textarea>
                                    </div>
                                    <div class="col mb-5">
                                        <label for="">Asset Owner</label>
                                        <select class="form-control" name="owner" id="">
                                            <option value="">Select Owner</option>
                                            <?php
                                                $records = mysqli_query($conn,"SELECT `fullname` FROM `user` WHERE `role` = 'User'") OR die(mysqli_error($conn));
                                                while($record=mysqli_fetch_assoc($records)){
                                                    echo "<option value='".$record['fullname']."'>" .$record['fullname']. "</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="">Asset Created Date</label>
                                        <input type="date" name="date" class="form-control">
                                    </div>
                                    <div class="col mb-5">
                                        <label for="">Asset Status</label>
                                        <select class="form-control" name="status" id="">
                                            <option value="Purchased">Purchased</option>
                                            <option value="">Operational</option>
                                            <option value="Operational">In Store</option>
                                            <option value="Not Operational">Not Operational</option>
                                            <option value="Retired">Retired</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" style="margin-left:850px;">
                                    <button type="submit" name="create" class="btn btn-primary mr-2">Create</button>
                                    <button type="reset" class="btn btn-danger">Clear</button>
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