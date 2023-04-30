<?php

include "../../db.php";
SESSION_START();

if (!isset($_COOKIE['logged'])) {

    header('location: ../../a_login.php');
}

?>

<!DOCTYPE html>
<html lang="en-us" dir="ltr">

    <head>
        <meta http-equiv="Content-Type" content="text/html, charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Manage Hotel Admin</title>

        <meta name="description" content="inyofa.com | In your favor">
        <meta name="type" content="website">
        <meta name="keywords" content="inyofa.com , In your favor, inyofa, booking, hotels, rentals">
        <meta name="author" content="Omishtu-Joy AgTech Engineering, Abdiwak Bekele Aga, Melkam Technology">

        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="../../images/Logo-Icons.png" />
        <link rel="stylesheet" type="text/css" href="../../icon/svg-with-js/css/fa-svg-with-js.css">
        <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
    </head>

    <body>
        <!------ Header --------->
        <header id="top-header" class="bg-success">
            <div class="top-tol">
                <ul>
                    <div id="logo">
                        <a><img src="../../images/Logoo.png" alt="Inyofa.com" title="Inyofa.com"></a>
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
                                style="background-image: url(../images/avatar.jpg);"><br><br><br><br><br>
                                <center>
                                    <h2>Admin</h2>
                                </center>
                            </a>
                        </div>
                    </div><br><br>

                    <!---- Left Dashboard Controller ---->
                    <ul class="list-unstyled components mb-5">
                        <li><a href="../index.php"><i class="fas fa-list"></i> Dashboard</a></li>
                        <li><a href="../hotels/a_manage_hotels.php"><i class="fas fa-hotel"></i> Manage Hotels</a></li>
                        <li><a href="../rentals/a_manage_rentals.php"><i class="fas fa-house"></i> Manage Rentals</a>
                        </li>
                        <li><a href="../rental_reservation/manage_rental_reservation.php"><i
                                    class="fas fa-file-text"></i>
                                Rentals Reservation</a></li>
                        <li><a href="a_manage_hotel_admins.php" class="text-warning"><i class="fas fa-users"></i> Manage
                                Hotel
                                Admins</a>
                        </li>
                        <li><a href="../users/a_manage_users.php"><i class="fas fa-users"></i> Manage Users</a></li>
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
                                            <h4 class="card-title"><i class="fas fa-tachometer-alt"></i> <strong>Manage
                                                    Hotel Admin</strong></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>

                <!-------- Show Rental Detail ----------->
                <?php
            if (isset($_REQUEST['hotel_admin_id'])) {
                $hotel_admin_id = intval($_REQUEST['hotel_admin_id']);

                $array = array();
                $q = "SELECT * FROM hotel_admin WHERE hotel_admin_id = '$hotel_admin_id'";
                $q_result = mysqli_query($con, $q);

                while ($r = mysqli_fetch_assoc($q_result)) {
                    $array['hotel_admin_id'] = $r['hotel_admin_id'];
                    $array['hotel_id'] = $r['hotel_id'];
                    $array['hotel_admin_name'] = $r['hotel_admin_name'];
                    $array['hotel_admin_email'] = $r['hotel_admin_email'];
                    $array['hotel_admin_password'] = $r['hotel_admin_password'];
                }

                $assigned_hotel_id = $array['hotel_id'];
                $q_hotels = "SELECT * FROM hotels WHERE hotel_id = '$assigned_hotel_id'";
                $q_hotels_result = mysqli_query($con, $q_hotels);
                while ($result = mysqli_fetch_assoc($q_hotels_result)) {
                    $array['hotel_name'] = $result['hotel_name'];
                }

                ?>
                <br>

                <div style="text-align: center;" class="alert alert-primary">
                    <h5> <strong> <?php  echo $array['hotel_name']; ?> </strong> </h5>
                    <p style="text-align: start;"> <strong>Hotel Admin ID: </strong>
                        <?php  echo $array['hotel_admin_id']; ?>
                    </p>
                    <p style="text-align: start;"> <strong>Hotel Admin Name: </strong>
                        <?php  echo $array['hotel_admin_name']; ?> </p>
                    <p style="text-align: start;"> <strong>Hotel Admin Email: </strong>
                        <?php  echo $array['hotel_admin_email']; ?> </p>

                    <a style="text-decoration: none" class="btn btn-success text-white"
                        href="hotel_admin_edit_api.php?hotel_admin_id=<?php echo $array['hotel_admin_id']; ?>">
                        <i class="fas fa-pencil-alt px-2 text-white " style="font-size: 15px;"></i> Edit</a>

                </div>

                <?php

                
            }

            ?>



            </div>

            <script src="../../icon/svg-with-js/js/fontawesome-all.js"></script>
            <script src="../../js/bootstrap.bundle.min.js"></script>
            <script src="../../js/jquery.min.js"></script>
            <script src="../../js/app/main.js"></script>
    </body>

</html>