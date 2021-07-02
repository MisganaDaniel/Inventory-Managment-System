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
                            <h1>All User</h1>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <td>Seq. No.</td>
                                        <td>User Name</td>
                                        <td>User Email</td>
                                        <td>User Phone</td>
                                        <td>Created Date</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody style="text-align:center;">
                                    <tr>
                                        <td>01</td>
                                        <td>Mr. X</td>
                                        <td>Mr.X@example.com</td>
                                        <td>123456789</td>
                                        <td>02/07/2021</td>
                                        <td><a href="view-user.php"><i class="fas fa-eye"></i></a> | <a href="user-update.php"><i class="fas fa-edit"></i></a> | <a href="#"><i class="fas fa-trash-alt"></i></a> | <a href="#"><i class="fas fa-ban"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td>02</td>
                                        <td>Mr. Y</td>
                                        <td>Mr.Y@example.com</td>
                                        <td>987654321</td>
                                        <td>02/07/2021</td>
                                        <td><a href="view-user.php"><i class="fas fa-eye"></i></a> | <a href="user-update.php"><i class="fas fa-edit"></i></a> | <a href="#"><i class="fas fa-trash-alt"></i></a> | <a href="#"><i class="fas fa-ban"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
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