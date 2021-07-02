<!DOCTYPE html>
<html lang="en">

<head>

    <?php
        include_once 'connection/connection.php';
        include_once 'includes/head.php';

    ?>
    <?php
        if(isset($_POST['register'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $tel = $_POST['tel'];
            $email = $_POST['email'];
            $role = $_POST['role'];

            $record = "INSERT INTO user (fullname, email, password,role,tel)
                        VALUES (`$username`,`$email`,`$password`,`$role`,`$tel`)";
            if(mysqli_query($conn, $record)){
                echo 'successfully registered';
            }else{
                echo "ERROR: Could not able to execute $record. " . mysqli_error($conn);
            }
        }
    ?>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-sm-block"><img src="img/1.png" width="490" height="521" alt=""></div>

                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account</h1>
                            </div>
                            <form class="user" action="register.php" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputEmail"
                                        placeholder="Enter Username" name="username">
                                </div>
                                <div class="form-group">
                                        <input type="password" class="form-control"
                                            id="exampleInputPassword" placeholder="Enter Password" name="password">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="exampleInputEmail"
                                        placeholder="Enter Email" name="email">
                                </div>
                                <div class="form-group">
                                        <input type="text" class="form-control"
                                            id="exampleInputPassword" placeholder="Enter Phone Number" name="tel">
                                </div>
                                <div class="form-group">
                                    <select name="role" id="" class="form-control" required>
                                        <option value="" >Select Role</option>
                                        <option value="Admin">Admin</option>
                                        <option value="User">User</option>
                                    </select>
                                </div>
                                <button type="submit" name="register" class="btn btn-primary btn-user btn-block">Register</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
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