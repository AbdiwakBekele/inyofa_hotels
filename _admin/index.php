<?php

include "../db.php";
SESSION_START();

if (!isset($_COOKIE['logged'])) {

    header('location: ../a_login.php');
}

// Hotel Query
$q_hotels = "SELECT * FROM hotels";
$q_hotels_result = mysqli_query($con, $q_hotels);
$hotels_count = mysqli_num_rows($q_hotels_result);

// Hotel Admin Query
$q_hotel_admin = "SELECT * FROM hotel_admin";
$q_hotel_admin_result = mysqli_query($con, $q_hotel_admin);
$hotel_admin_count = mysqli_num_rows($q_hotel_admin_result);

// Rental Query
$q_rental = "SELECT * FROM rental";
$q_rental_result = mysqli_query($con, $q_rental);
$rental_count = mysqli_num_rows($q_rental_result);

// User Query
$q_user = "SELECT * FROM user";
$q_user_result = mysqli_query($con, $q_user);
$user_count = mysqli_num_rows($q_user_result);

?>

<!DOCTYPE html>
<html lang="en-us" dir="ltr">

    <head>
        <meta http-equiv="Content-Type" content="text/html, charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin | Dashboard</title>
        <meta name="description" content="inyofa.com | In your favor">
        <meta name="type" content="website">
        <meta name="keywords" content="inyofa.com , In your favor, inyofa, booking, hotels, rentals">
        <meta name="author" content="Omishtu-Joy AgTech Engineering, Abdiwak Bekele Aga, Melkam Technology">

        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="../images/Logo-Icons.png" />
        <link rel="stylesheet" type="text/css" href="../icon/svg-with-js/css/fa-svg-with-js.css">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>

    <body>
        <!------ Header --------->
        <header id="top-header" class="bg-success">
            <div class="top-tol">
                <ul>
                    <div id="logo">
                        <a><img src="../images/Logoo.png" alt="Inyofa.com" title="Inyofa.com"></a>
                        <!-- <label id="l1">e-learning</label> -->
                    </div>

                    <div class="dropdown myac">
                        <a id="a1" class="btn btn-outline-info dropdown-toggle" href="#" role="button" id="dpMLink"
                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                class="fas fa-user-circle"></i>&nbsp;<label>profile</label></a>

                        <ul class="dropdown-menu" aria-labelledby="dpMLink">
                            <li class="dropdown-item"><a href="update_profile.php"><i class="fas fa-user-cog"></i>
                                    Update
                                    Profile</a></li>
                            <li class="dropdown-item"><a href="a_logout_ctrl.php"><i class="fas fa-sign-out-alt"></i>
                                    Logout</a>
                            </li>
                        </ul>
                    </div>

                </ul>
            </div>
        </header>


        <div class="wrapper d-flex align-items-stretch">

            <!------ Left Drawer --------->
            <nav id="sidebar">
                <div class="p-4 pt-5">
                    <div class="row">
                        <div class="col">
                            <a href="update_profile.php" class="img logo rounded-circle mb-5"
                                style="background-image: url(images/avatar.jpg);"><br><br><br><br><br>
                                <center>
                                    <h2>Admin</h2>
                                </center>
                            </a>
                        </div>
                    </div><br><br>

                    <!---- Left Dashboard Controller ---->
                    <ul class="list-unstyled components mb-5">
                        <li><a href="index.php" class="text-warning"><i class="fas fa-list"></i> Dashboard</a></li>
                        <li><a href="hotels/a_manage_hotels.php"><i class="fas fa-hotel"></i> Manage Hotels</a></li>
                        <li><a href="rentals/a_manage_rentals.php"><i class="fas fa-house"></i> Manage Rentals</a></li>
                        <li><a href="rental_reservation/manage_rental_reservation.php"><i class="fas fa-file-text"></i>
                                Rentals Reservation</a></li>
                        <li><a href="hotel_admins/a_manage_hotel_admins.php"><i class="fas fa-users"></i> Manage Hotel
                                Admins</a>
                        </li>
                        <li><a href="users/a_manage_users.php"><i class="fas fa-users"></i> Manage Users</a></li>
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
                                            <h4 class="card-title"><i class="fas fa-tachometer-alt"></i>
                                                <strong>Dashboard</strong>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </nav>


                <!-- === cards === -->
                <section class="mt-5">
                    <div class="row g-4">

                        <!---------- Hotels Card --------->
                        <a href="hotels/a_manage_hotels.php" class="col-md-3" style="text-decoration: none;">
                            <div class="card bg-warning text-dark">
                                <div class="card-body">
                                    <h4><i class="fas fa-hotel"></i> Hotels</h4>
                                    <hr>
                                    <h5>
                                        <b><?php echo $hotels_count; ?></b>
                                    </h5>
                                </div>
                            </div>
                        </a>

                        <!---------- Rentals Card --------->
                        <div class="col-md-3">
                            <a href="rentals/a_manage_rentals.php" class="col-md-3" style="text-decoration: none;">
                                <div class="card bg-secondary text-white">
                                    <div class="card-body">
                                        <h4><i class="fas fa-house"></i> Rentals</h4>
                                        <hr>
                                        <h5>
                                            <b><?php echo $rental_count; ?></b>
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </div>


                        <!---------- Hotel Admins Card --------->
                        <a href="hotel_admins/a_manage_hotel_admins.php" class="col-md-3" style="text-decoration: none;">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <h4><i class="fas fa-chalkboard-teacher"></i> Hotel Admins</h4>
                                    <hr>
                                    <h5>
                                        <b><?php echo $hotel_admin_count; ?></b>
                                    </h5>
                                </div>
                            </div>

                        </a>

                        <!---------- Users Card --------->
                        <a href="users/a_manage_users.php" class="col-md-3" style="text-decoration: none;">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <h4><i class="fas fa-user"></i> Users</h4>
                                    <hr>
                                    <h5>
                                        <b><?php echo $user_count; ?></b>
                                    </h5>
                                </div>
                            </div>

                        </a>

                    </div>
                </section>


                <!--  === add buttons === -->
                <section class="mt-3 border bg-light">
                    <div class="container">
                        <div class="row g-4">

                            <div class="col-md col-lg-3">
                                <a class="btn btn-outline-success text-dark m-4" href="a_add_rental.php" role="button"
                                    style="text-decoration: none;"><i class="fas fa-plus"></i> Add Rentals</a>
                            </div>

                            <div class="col-md col-lg-3">
                                <a class="btn btn-outline-success text-dark m-4" href="a_add_hotel.php" role="button"
                                    style="text-decoration: none;"><i class="fas fa-plus"></i> Add Hotels</a>
                            </div>

                            <div class="col-md col-lg-3">
                                <a class="btn btn-outline-success text-dark m-4" href="a_add_hotel_admin.php"
                                    role="button" style="text-decoration: none;"><i class="fas fa-plus"></i> Add Hotel
                                    Admins</a>
                            </div>

                            <div class="col-md col-lg-3">
                                <a class="btn btn-outline-success text-dark m-4" href="a_add_user.php" role="button"
                                    style="text-decoration: none;"><i class="fas fa-plus"></i> Add Users</a>
                            </div>

                        </div>
                    </div>
                </section>
            </div>
        </div>


        <script src="../icon/svg-with-js/js/fontawesome-all.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/app/main.js"></script>
    </body>

</html>