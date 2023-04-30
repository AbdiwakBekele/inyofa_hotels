<?php

include "../db.php";
SESSION_START();

if (!isset($_COOKIE['user_logged'])) {
    header('location: ../user_login.php');
}

$user_email = $_SESSION['user_email'];
$user_id;
$user_fullname;
$user_name;
$user_email;
$user_birth_date;
$user_phone;
$user_address;
$user_password;

// Hotel Admin Info Fetching 
$sql_user = "SELECT * FROM user WHERE user_email = '$user_email'";
$q_result = mysqli_query($con, $sql_user);

while ($row = mysqli_fetch_assoc($q_result)) {
    $user_id = $row['user_id'];
    $user_fullname = $row['user_fullname'];
    $user_name = $row['user_name'];
    $user_email = $row['user_email'];
    $user_birth_date = $row['user_birth_date'];
    $user_phone = $row['user_phone'];
    $user_address = $row['user_address'];
    $user_password = $row['user_password'];
}
?>

<!DOCTYPE html>
<html lang="en-us" dir="ltr">

    <head>
        <meta http-equiv="Content-Type" content="text/html, charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>User | Dashboard</title>
        <meta name="description" content="inyofa.com | In your favor">
        <meta name="type" content="website">
        <meta name="keywords" content="inyofa.com , In your favor, inyofa, booking, hotels, rentals">
        <meta name="author" content="Omishtu-Joy AgTech Engineering, Abdiwak Bekele Aga, Melkam Technology">

        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="../images/Logo-Icons.png" />
        <link rel="stylesheet" type="text/css" href="../icon/svg-with-js/css/fa-svg-with-js.css">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
            rel="stylesheet" />
    </head>

    <body>
        <!------ Header --------->
        <header id="top-header" class="bg-primary">
            <div class="top-tol">
                <ul>
                    <div id="logo">
                        <a><img src="../images/Logoo.png" alt="Inyofa.com" title="Inyofa.com"></a>
                        <!-- <label id="l1">e-learning</label> -->
                    </div>
                </ul>
            </div>
        </header>


        <div class="wrapper d-flex align-items-stretch">
            <!------ Left Drawer --------->
            <nav id="sidebar">
                <div class="p-4 pt-5">
                    <br>
                    <!---- Left Dashboard Controller ---->
                    <ul class="list-unstyled components mb-5">
                        <li><a href="user_dashboard.php"><i class="fas fa-list"></i> Dashboard</a>
                        </li>
                        <li><a href="rental_property/rental_list.php"><i class="fas fa-home"></i> Your Rental</a>
                        </li>
                        <li><a href="hotel_property/hotel_list.php"><i class="fas fa-building"></i> Your Hotel</a>
                        </li>
                        <li><a href="hotel_admin/user_admin_list.php"><i class="fas fa-users"></i> Hotel Admins</a>
                        </li>
                        <li><a href="update_profile.php" class="text-warning"><i class="fas fa-users"></i> User
                                Profile</a>
                        </li>
                        <li><a href="logout_user.php"><i class="fas fa-users"></i> Log out</a>
                        </li>
                    </ul>

                    <div class="footer">
                        INYOFA | In Your Favor &copy;<script>
                        document.write(new Date().getFullYear());
                        </script> All rights reserved | Designed By Omishtu-Joy
                    </div>

                </div>
            </nav>

            <!-- Page Content  -->
            <div id="content" class="p-4 p-md-5">

                <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
                    <div class="container">
                        <button type="button" id="sidebarCollapse" class="btn btn-primary">
                            <i class="fas fa-bars"></i>
                            <span class="sr-only">Toggle Menu</span>
                        </button>

                        <div class="container">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-md-6 text-center">
                                    <div class="card bg-light col-md mt-1" style="border-style: none;">
                                        <div class="card-body">
                                            <h5 class="card-title"><i class="fas fa-tachometer-alt"></i>
                                                <strong> Properties</strong>
                                                </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>

                <?php 
                    
                ?>

                <!-- Content -->
                <div class="col-md-8 offset-md-2">
                    <form class="was-validated bg-light border shadow p-3" action="update_profile.php" method="POST"
                        enctype="multipart/form-data" name="form">

                        <!-- Database Insertion PHP Code -->
                        <?php
                        require('../db.php');

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
                                    placeholder="Enter Full Name" value="<?php echo $user_fullname ?>" required>

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
                                    placeholder="Enter Date of Birth" value="<?php echo $user_birth_date ?>" required>
                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>

                            <!-- User Phone -->
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="user_phone" class="form-label">
                                    <h6><b><i class="fas fa-phone"></i> User Phone</b></h6>
                                </label>
                                <input type="number" class="form-control" name="user_phone" id="user_phone"
                                    placeholder="Enter upload the user's phone  " value="<?php echo $user_phone ?>"
                                    required>

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
                                    placeholder="Enter user address" value="<?php echo $user_address ?>" required>
                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>

                            <!-- User Email -->
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="user_email" class="form-label">
                                    <h6><b><i class="fas fa-envelope"></i> User Email</b></h6>
                                </label>
                                <input type="email" class="form-control" name="user_email" for="user_email"
                                    placeholder="Enter user email Address" value="<?php echo $user_email ?>" required>

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
                                    placeholder="Enter user password" value="<?php echo $user_password ?>" required>
                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>

                            <!-- Confirm User Password -->
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="confirm_user_password" class="form-label">
                                    <h6><b><i class="fas fa-key"></i> Confirm User Password</b></h6>
                                </label>
                                <input type="password" class="form-control" name="confirm_user_password"
                                    for="confirm_user_password" placeholder="Enter confirm user password"
                                    value="<?php echo $user_password ?>" required>

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


            <script src="../icon/svg-with-js/js/fontawesome-all.js"></script>
            <script src="../js/bootstrap.bundle.min.js"></script>
            <script src="../js/jquery.min.js"></script>
            <script src="../js/app/main.js"></script>
    </body>

</html>