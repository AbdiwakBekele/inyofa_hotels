<?php
    require('../db.php');

    if (isset($_POST['Submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $table_query = "SELECT * FROM user_customer WHERE user_email = '$email' AND user_password = '$password'";

        $table_result = mysqli_query($con, $table_query);
        $row = mysqli_fetch_array($table_result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($table_result);

        if ($count == 1) {
            SESSION_START();
            $last = 1200 + time();
            $_SESSION['user_email'] = $email;
            //$logged = $email;
            setcookie("customer_logged", date("F jS - g:i a"), $last);
            header('location:../index.php');
        } else {
            echo "<div class='alert alert-danger'> Incorrect Username or Password </div> ";
        }

    }
?>

<!DOCTYPE html>
<html lang="en-us" dir="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html, charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Register</title>

    <meta name="description" content="INYOFA.">
    <meta name="type" content="website">
    <meta name="keywords" content="INYOFA">
    <meta name="author" content="Omishtu-Joy AgTech Engineering">

    <link rel="shortcut icon" type="../image/x-icon" href="../images/Logo-Icons.png" />
    <link href="../icon/svg-with-js/css/fa-svg-with-js.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- Navigation -->
    <header class="header-style-01">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #336699;">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="../assets/img/logo_white.png" alt="Logo" width="120px">
                </a>

                <div class="navbar-toggler text-center" style="border: none;" type="button" data-bs-toggle="collapse"
                    data-bs-target="#">

                    <span class="fa fa-user-circle text-white ms-5" data-bs-toggle="modal" data-bs-target="#myModal">
                    </span>
                    <!-- Modal -->
                    <div class="modal my-5" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">

                                    <form action="user_customer_login.php">
                                        <button class="btn btn-primary rounded-pill w-100 text-center m-2"
                                            type="submit"><strong>Sign in</strong></button>
                                    </form>

                                    <a class="text-primary text-center m-2" href="user_customer_signin"
                                        style="font-size: 15px">
                                        <strong>Sign up, it's
                                            free</strong> </a>
                                    <hr>

                                    <div class="text-start">
                                        <a class="text-dark text-center m-2" href="../list_your_property.php"
                                            style="font-size: 15px; text-decoration: none;">
                                            <strong>List your property </strong>
                                        </a>
                                    </div>
                                    <hr>

                                    <div class="text-start">
                                        <a class="text-dark text-center m-2" href="../about_us.php"
                                            style="font-size: 15px; text-decoration: none;">
                                            <strong> About Us </strong>
                                        </a>
                                    </div>

                                    <hr>

                                    <div class="text-start">
                                        <a class="text-dark text-center m-2" href="../term_and_policy.php"
                                            style="font-size: 15px; text-decoration: none;">
                                            <strong>Term and Policy </strong>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Second line -->
                <div class="navbar-toggler text-center mx-2 my-2" style="border: none;" type="button">

                    <a href="../index.php" class="text-white mx-2 p-2 border border-white rounded-pill"
                        style="font-size: 15px; text-decoration: none;"><span
                            class="fa fa-home text-white mx-2"></span>Home </a>

                    <a href="../rental.php" class="text-white mx-2 p-2 "
                        style="font-size: 15px; text-decoration: none; "><span
                            class="fa fa-building text-white mx-2"></span>Rental </a>

                    <a href="../flight.php" class="text-white mx-2 p-2  "
                        style="font-size: 15px; text-decoration: none; "><span
                            class="fa fa-plane text-white mx-2"></span>Flight </a>

                </div>

                <div class="collapse navbar-collapse justify-content-center" id="mynavbar">
                    <!-- List of Nav -->
                    <ul class="navbar-nav me-5">
                        <li class="nav-item me-5">
                            <a class="nav-link text-white" href="../index.php"> <i class="fa fa-home mx-1"
                                    aria-hidden="true"></i>
                                Home</a>
                        </li>
                        <li class="nav-item me-5">
                            <a class="nav-link text-white" href="../rental.php"> <i class="fa fa-building mx-1"
                                    aria-hidden="true"></i> Rental</a>
                        </li>

                        <li class="nav-item me-5">
                            <a class="nav-link text-white" href="../flight.php"> <i class="fa fa-plane mx-1"
                                    aria-hidden="true"></i>
                                Flight</a>
                        </li>
                        <li class="nav-item me-5">
                            <a class="nav-link text-white " href="../about_us.php"> <i class="fa fa-info-circle mx-1"
                                    aria-hidden="true"></i> About Us</a>
                        </li>
                        <li class="nav-item me-5">
                            <a class="nav-link text-white" href="../list_your_property.php"> <i
                                    class="fa fa-list-alt mx-1" aria-hidden="true"></i> List your property</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <hr>
        <div class="row">
            <div class="col-md-6 offset-md-3">

                <form class="was-validated border p-4 mb-4 bg-light border shadow the_logo_form"
                    action="user_customer_login.php" method="post" name="form" onsubmit="return validated()">

                    <!-- Email Field -->
                    <div class="mt-3 mb-3">
                        <label for="email" class="form-lable"><i class="fas fa-envelope"></i> Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email"
                            required="required">
                        <div class="valid-feedback">Good</div>
                        <div class="invalid-feedback">fill-out</div>
                    </div>

                    <!-- Password Field -->
                    <div class="mb-3">
                        <label for="pswd" class="form-label"><i class="fas fa-lock"></i> Password</label>
                        <input type="password" class="form-control" name="password" id="pswd"
                            placeholder="Enter Your Password" required="required">
                        <div class="valid-feedback">good</div>
                        <div class="invalid-feedback">fill-out</div>
                    </div>

                    <div class="form-check mb-3">
                        <label for="checkbox" class="form-check-label">Remember Me</label>
                        <input type="checkbox" id="checkbox" name="remember" class="form-check-input">
                    </div>

                    <button type="submit" name="Submit" class="btn-lg btn-secondary mb-3 col-sm-12">Login</button>

                    <div class="row">
                        <div class="col-md">
                            <p class="mt-3 text-center text-secondary"><strong>No Account?
                                    <a href="user_customer_signin.php">Sign up
                                        Here</a></strong></p>
                        </div>
                    </div>

                </form>



            </div>
        </div>
        <hr>

    </div>

    <script src="../icon/svg-with-js/js/fontawesome-all.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html