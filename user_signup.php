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

        <link rel="shortcut icon" type="image/x-icon" href="images/Logo-Icons.png" />
        <link href="icon/svg-with-js/css/fa-svg-with-js.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet" type="text/css">
    </head>

    <body>

        <!-- Navigation -->
        <header class="header-style-01">
            <!-- Navigation -->
            <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #336699;">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php">
                        <img src="assets/img/logo_white.png" alt="Logo" width="120px">
                    </a>

                    <div class="navbar-toggler text-center" style="border: none;" type="button"
                        data-bs-toggle="collapse" data-bs-target="#">

                        <span class="fa fa-user-circle text-white ms-5" data-bs-toggle="modal"
                            data-bs-target="#myModal">
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

                                        <form action="user_login.php">
                                            <button class="btn btn-primary rounded-pill w-100 text-center m-2"
                                                type="submit"><strong>Sign in</strong></button>
                                        </form>


                                        <a class="text-primary text-center m-2" href="user_signup.php"
                                            style="font-size: 15px">
                                            <strong>Sign up, it's
                                                free</strong> </a>
                                        <hr>

                                        <div class="text-start">
                                            <a class="text-dark text-center m-2" href="list_your_property.php"
                                                style="font-size: 15px; text-decoration: none;">
                                                <strong>List your property </strong>
                                            </a>
                                        </div>
                                        <hr>

                                        <div class="text-start">
                                            <a class="text-dark text-center m-2" href="about_us.php"
                                                style="font-size: 15px; text-decoration: none;">
                                                <strong> About Us </strong>
                                            </a>
                                        </div>

                                        <hr>

                                        <div class="text-start">
                                            <a class="text-dark text-center m-2" href="term_and_policy.php"
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

                        <a href="index.php" class="text-white mx-2 p-2 border border-white rounded-pill"
                            style="font-size: 15px; text-decoration: none;"><span
                                class="fa fa-home text-white mx-2"></span>Home </a>

                        <a href="rental.php" class="text-white mx-2 p-2 "
                            style="font-size: 15px; text-decoration: none; "><span
                                class="fa fa-building text-white mx-2"></span>Rental </a>

                        <a href="flight.php" class="text-white mx-2 p-2  "
                            style="font-size: 15px; text-decoration: none; "><span
                                class="fa fa-plane text-white mx-2"></span>Flight </a>

                    </div>

                    <div class="collapse navbar-collapse justify-content-center" id="mynavbar">
                        <!-- List of Nav -->
                        <ul class="navbar-nav me-5">
                            <li class="nav-item me-5">
                                <a class="nav-link text-white" href="index.php"> <i class="fa fa-home mx-1"
                                        aria-hidden="true"></i>
                                    Home</a>
                            </li>
                            <li class="nav-item me-5">
                                <a class="nav-link text-white" href="rental.php"> <i class="fa fa-building mx-1"
                                        aria-hidden="true"></i> Rental</a>
                            </li>

                            <li class="nav-item me-5">
                                <a class="nav-link text-white" href="flight.php"> <i class="fa fa-plane mx-1"
                                        aria-hidden="true"></i>
                                    Flight</a>
                            </li>
                            <li class="nav-item me-5">
                                <a class="nav-link text-white " href="about_us.php"> <i class="fa fa-info-circle mx-1"
                                        aria-hidden="true"></i> About Us</a>
                            </li>
                            <li class="nav-item me-5">
                                <a class="nav-link text-white" href="list_your_property.php"> <i
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
                    <form class="was-validated bg-light border shadow p-3" action="user_signup.php" method="POST"
                        enctype="multipart/form-data" name="form">

                        <!-- Database Insertion PHP Code -->
                        <?php
                        require('db.php');

                    if (isset($_POST['Submit'])) {
                        $user_fullname = $_POST['user_fullname'];
                        $user_email = $_POST['user_email'];
                        $user_birth_date = $_POST['user_birth_date'];
                        $user_phone = $_POST['user_phone'];
                        $user_address = $_POST['user_address'];
                        $user_password =  $_POST['user_password'];
                        $confirm_user_password =  $_POST['confirm_user_password'];

                        if ($user_password == $confirm_user_password) {
                            $query = "INSERT INTO user (user_fullname, user_email, user_birth_date, user_phone, user_address, user_password)
                                                    VALUES ('$user_fullname', '$user_email', '$user_birth_date', '$user_phone', '$user_address', '$user_password')";

                            if (mysqli_query($con, $query)) {
                                $msg = "<div class='alert alert-success'> Successfully Registered! </div> <a class='btn btn-primary' href='user_login.php'>Login</a> ";
                                echo $msg;
                            } else {
                                $msg = "<div class='alert alert-danger'> Error Registering User </div> ";
                                echo $msg;
                            }
                        } else {
                            $msg = "<div class='alert alert-danger'> Password don't Match </div> ";
                            echo $msg;
                        }
                    }
                    ?>

                        <!-- User Full Name Input -->
                        <div class="row mt-3">
                            <div class="form-group col-md-12">
                                <label for="user_fullname" class="form-label">
                                    <h6><b><i class="fas fa-user"></i> User Full Name</b></h6>
                                </label>
                                <input type="text" class="form-control" name="user_fullname" id="user_fullname"
                                    placeholder="Enter Full Name" required>

                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>
                        </div>


                        <div class="row mt-3">
                            <!-- Date of birth -->
                            <div class="form-group mt-2 col-md-6 col-sm-12">
                                <label for="user_birth_date">
                                    <h6><b><i class="fas fa-calendar-alt"></i> Date of Birth</b></h6>
                                </label>
                                <input type="date" class="form-control" name="user_birth_date" id="user_birth_date"
                                    placeholder="Enter Date of Birth" required>
                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>

                            <!-- User Phone -->
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="user_phone" class="form-label">
                                    <h6><b><i class="fas fa-phone"></i> User Phone</b></h6>
                                </label>
                                <input type="number" class="form-control" name="user_phone" id="user_phone"
                                    placeholder="Enter upload the user's phone " required>

                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <!-- User Address -->
                            <div class="form-group mt-2 col-md-6 col-sm-12">
                                <label for="user_address">
                                    <h6><b><i class="fas fa-map-marker-alt"></i> User Address</b></h6>
                                </label>
                                <input type="text" class="form-control" name="user_address" id="user_address"
                                    placeholder="Enter user address" required>
                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>

                            <!-- User Email -->
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="user_email" class="form-label">
                                    <h6><b><i class="fas fa-envelope"></i> User Email</b></h6>
                                </label>
                                <input type="email" class="form-control" name="user_email" for="user_email"
                                    placeholder="Enter user email Address" required>

                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <!-- User Password -->
                            <div class="form-group mt-2 col-md-6 col-sm-12">
                                <label for="user_password">
                                    <h6><b><i class="fas fa-key"></i> User Password</b></h6>
                                </label>
                                <input type="password" class="form-control" name="user_password" id="user_password"
                                    placeholder="Enter user password" required>
                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>

                            <!-- Confirm User Password -->
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="confirm_user_password" class="form-label">
                                    <h6><b><i class="fas fa-key"></i> Confirm User Password</b></h6>
                                </label>
                                <input type="password" class="form-control" name="confirm_user_password"
                                    for="confirm_user_password" placeholder="Enter confirm user password" required>

                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md mt-3 mb-3">
                                <button type="submit" name="Submit" class="btn btn-primary btn-large col-md-12"
                                    value="Submit">Register</button>
                            </div>
                        </div>

                    </form>



                </div>
            </div>
            <hr>

        </div>

        <script src="icon/svg-with-js/js/fontawesome-all.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/main.js"></script>
    </body>

</html