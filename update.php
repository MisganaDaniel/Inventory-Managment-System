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
                            <h1>Update Assets</h1>
                        </div>
                        <div class="card-body">
                        <form action="">
                                <div class="row">
                                    <div class="col">
                                        <label for="">Asset Name</label>
                                        <input type="text" class="form-control" placeholder="Asset Name" aria-label="Asset Name">
                                    </div>
                                    <div class="col mb-5">
                                        <label for="">Asset Serial Number</label>
                                        <input type="text" class="form-control" placeholder="Asset Serial Number" aria-label="Asset Serial Number">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-5">
                                        <label for="">Asset Description</label>
                                        <textarea class="form-control" name="" rows="4" cols="50"></textarea>
                                    </div>
                                    <div class="col mb-5">
                                        <label for="">Asset Owner</label>
                                        <input type="text" class="form-control" placeholder="Asset Owner" aria-label="Asset Owner">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="">Asset Created Date</label>
                                        <input type="date" class="form-control">
                                    </div>
                                    <div class="col mb-5">
                                        <label for="">Asset Status</label>
                                        <select class="form-control" name="" id="">
                                            <option value="">Purchased</option>
                                            <option value="">Operational</option>
                                            <option value="">In Store</option>
                                            <option value="">Not Operational</option>
                                            <option value="">Retired</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" style="margin-left:900px;">
                                    <button type="submit" class="btn btn-primary mr-2">Update</button>
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