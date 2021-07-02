<!DOCTYPE html>
<html lang="en">

<head>

    <?php
        include_once 'includes/head.php';
    ?>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                            <div class="col-lg-6 d-none d-lg-block"><img src="img/1.png" width="490" height="450" alt=""></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome</h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="email" class="form-control"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Username" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control"
                                                id="exampleInputPassword" placeholder="Enter Password" required>
                                        </div>
                                        <div class="form-group">
                                           <select name="" id="" class="form-control" required>
                                               <option value="1" >Select Role</option>
                                               <option value="">Admin</option>
                                               <option value="">User</option>
                                           </select>
                                        </div>
                                        <a href="index.php" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </a>
                                       
                                    </form>
                                    <hr>
                                    
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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

</body>

</html>