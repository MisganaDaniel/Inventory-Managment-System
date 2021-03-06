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
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        
                    </div>
                    <div class="card shadow mt-5">
                        <div class="card-header">
                            <h1><i class="fas fa-store"></i> All Assets</h1>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead style="text-align:center;">
                                    <tr>
                                        <td>Seq. No.</td>
                                        <td>Asset Name</td>
                                        <td>Asset Serial Number</td>
                                        <td>Asset Owner</td>
                                        <td>Created Date</td>
                                        <td>Asset Status</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <?php
                                    $username = $_SESSION['username']; 
                                    $role = $_SESSION['role'];
                                    if($role == 'Admin'){
                                        $records = mysqli_query($conn,"SELECT * FROM `asset`") OR die(mysqli_error($conn));
                                    }else if($role == 'User'){
                                        $records = mysqli_query($conn,"SELECT * FROM `asset` WHERE `asset_owner` = '$username'") OR die(mysqli_error($conn));
                                    }
                                    //$records = mysqli_query($conn,"SELECT * FROM `asset`") OR die(mysqli_error($conn));
                                    $i = 1;
                                    while($record=mysqli_fetch_assoc($records)){
                                        $id = $record['id'];
                                ?>
                                <tbody style="text-align:center;">
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $record['asset_name']; ?></td>
                                        <td><?php echo $record['asset_SN']; ?></td>
                                        <td><?php echo $record['asset_owner']; ?></td>
                                        <td><?php echo $record['date']; ?></td>
                                        <td><?php echo $record['status']; ?></td>
                                        <td>
                                            <?php
                                               if($role == 'Admin'){
                                                   echo '<a href="view-asset.php?id=';?><?php echo $id; ?> <?php echo ' "><i class="fas fa-eye"></i></a> | 
                                                    <a href="update.php?id=';?><?php echo $id; ?> <?php echo ' "><i class="fas fa-edit"></i></a> | 
                                                    <a href="delete.php?id=';?><?php echo $id; ?> <?php echo ' "><i class="fas fa-trash-alt"></i></a> ';?>
                                               <?php 
                                               }else if($role == "User"){
                                                    echo '<a href="view-asset.php?id=';?><?php echo $id; ?> <?php echo ' "><i class="fas fa-eye"></i></a>';
                                               }?>
                                           
                                        </td>
                                    </tr>
                                <?php
                                    $i++;
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                        
                    <!---Asset assignment -->

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Assign Asset</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <label for="">Select user</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Mr. X</option>
                                    <option value="">Mr. Y</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary">Assign</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!---Asset assignment -->
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
                        <span aria-hidden="true">??</span>
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