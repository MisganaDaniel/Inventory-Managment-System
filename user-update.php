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
                    $role1 = $_SESSION['role'];
                    if($role1 == "Admin"){
                        if(isset($_POST['update'])){ 
                            $user_id = $_POST['get_id'];
                            $status = $_POST['status'];	
                            $role = $_POST['role'];
                            $record = mysqli_query($conn,"UPDATE `user` 
                                                          SET `status`='$status',
                                                              `role` = '$role'
                                                          WHERE `id`='$user_id'");
                            if($record){
                                echo '<script type="text/javascript">';
                                echo ' alert("User Details Updated Successful")';
                                    header('Location: all-user.php');
                                echo '</script>';
                            }else{
                                echo "Error: " . $record . " " . mysqli_error($conn);
                            }
                        }
                    }else if($role1 == "User"){
                        if(isset($_POST['update'])){ 
                            $user_id = $_POST['get_id'];
                            $username = $_POST['username'];
                            $email = $_POST['email'];
                            $phone = $_POST['phone'];
                            $record = mysqli_query($conn,"UPDATE `user` 
                                                          SET `fullname` = '$username',
                                                              `email` = '$email',
                                                              `tel` = '$phone'
                                                          WHERE `id`='$user_id'");
                            if($record){
                                echo '<script type="text/javascript">';
                                echo ' alert("User Details Updated Successful")';
                                    header('Location: all-user.php');
                                echo '</script>';
                            }else{
                                echo "Error: " . $record . " " . mysqli_error($conn);
                            }
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
                        <?php
                            $role1 = $_SESSION['role'];
                            if($role1 == "Admin"){
                                echo '
                                    <form action="user-update.php" method="post">
                                        <div class="row">
                                            <div class="col">
                                                <label for="">User Name</label>
                                                <input type="text" class="form-control" placeholder="';?>  <?php echo @$fullname; ?> <?php echo '" readonly>
                                            </div>
                                            <div class="col mb-5">
                                                <label for="">Email</label>
                                                <input type="text" class="form-control" placeholder="';?> <?php echo @$email; ?> <?php echo '" readonly>
                                            </div>
                                        </div>';?>
                                        <?php echo ' <div class="row">
                                            <div class="col mb-5">
                                                <label for="">Phone</label>
                                                <input type="text" class="form-control" placeholder="';?> <?php echo @$tel; ?> <?php echo ' " readonly>
                                            </div>
                                            <div class="col">
                                                <label for=""><strong>Role: </strong>'; ?> <?php echo @$role; ?> <?php echo ' </label>
                                                <select name="role" class="form-control">
                                                    <option value="">Change Role</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="User">User</option>
                                                </select>
                                            </div>
                                        </div>'; ?>
                                        <?php echo ' <div class="row">
                                            <div class="col-sm-6">
                                                <label for=""><strong>Status: </strong>'; ?> <?php echo @$status; ?> <?php echo ' </label>
                                                <select name="status" class="form-control">
                                                    <option value="">Change Status</option>
                                                    <option value="Blocked">Blocked</option>
                                                    <option value="Active">Active</option>
                                                </select>
                                            </div>
                                        </div> ';?>
                                        <?php echo ' <div class="row" style="margin-left:900px;">
                                            <input type="hidden" name="get_id" value="';?>  <?php echo $id; ?> <?php echo ' ">
                                            <button type="submit" name="update" class="btn btn-primary mr-2">Update</button>
                                        </div>
                                    </form>';?>
                            <?php
                                }else if($role1 == "User"){
                                    echo '
                                        <form action="user-update.php" method="post">
                                            <div class="row">
                                                <div class="col">
                                                    <label for="">User Name</label>
                                                    <input type="text" name="username" class="form-control" value="';?><?php echo @$fullname; ?><?php echo'" required> 
                                                </div>
                                                <div class="col mb-5">
                                                    <label for="">Email</label>
                                                    <input type="text" name="email" class="form-control" value="';?><?php echo @$email; ?><?php echo'" required> 
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-5">
                                                    <label for="">Phone</label>
                                                    <input type="text" name="phone" class="form-control" value="';?><?php echo @$tel; ?><?php echo '" required>
                                                </div>
                                                <div class="col">
                                                    <label for=""><strong>Role: </strong>'; ?> <?php echo @$role; ?> <?php echo ' </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for=""><strong>Status: </strong>'; ?> <?php echo @$status; ?> <?php echo ' </label>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-left:900px;">
                                                <input type="hidden" name="get_id" value="';?>  <?php echo $id; ?> <?php echo ' ">
                                                <button type="submit" name="update" class="btn btn-primary mr-2">Update</button>
                                            </div>
                                        </form>
                                         ';
                                }
                            ?>
                            
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