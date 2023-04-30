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
        <title>Manage-Rentals</title>

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
                        <a><img src="../../images/Logoo.png" alt="Inyofa.com"></a>
                    </div>

                    <div class="dropdown myac">
                        <a id="a1" class="btn btn-outline-info dropdown-toggle" href="#" role="button" id="dpMLink"
                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                class="fas fa-user-circle"></i>&nbsp;<label>profile</label></a>

                        <ul class="dropdown-menu" aria-labelledby="dpMLink">
                            <li class="dropdown-item"><a href="update_profile.php"><i class="fas fa-user-cog"></i>
                                    Update
                                    Profile</a></li>
                            <li class="dropdown-item"><a href="a_signin.php"><i class="fas fa-sign-out-alt"></i>
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
                        <li><a href="a_manage_rentals.php" class="text-warning"><i class="fas fa-house"></i> Manage
                                Rentals</a></li>
                        <li><a href="../rental_reservation/manage_rental_reservation.php"><i
                                    class="fas fa-file-text"></i>
                                Rentals Reservation</a></li>
                        <li><a href="../hotel_admins/a_manage_hotel_admins.php"><i class="fas fa-users"></i> Manage
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
                                                    Rentals</strong></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </nav>

                <!-------- Show Rental Detail ----------->
                <?php
            if (isset($_REQUEST['rental_id'])) {
                $rental_id = intval($_REQUEST['rental_id']);

                $q = "SELECT * FROM rental WHERE rental_id = '$rental_id'";
                $q_result = mysqli_query($con, $q);

                while ($r = mysqli_fetch_assoc($q_result)) {
                    $rental_id = $r['rental_id'];
                    $rental_type = $r['rental_type'];
                    $rental_city= $r['rental_city'];
                    $rental_subcity = $r['rental_subcity'];
                    $rental_price = $r['rental_price'];
                    $rental_area = $r['rental_area'];
                    $rental_kitchen_no= $r['rental_kitchen_no'];
                    $rental_bed_no = $r['rental_bed_no'];
                    $rental_bath_no = $r['rental_bath_no'];
                    $rental_contact = $r['rental_contact'];
                    $rental_detail = $r['rental_detail'];
                    $isApproved = $r['isApproved'];
                }

                ?>


                <div class="alert alert-primary m-3 shadow">
                    <?php 
                        if($isApproved == "0"){
                            ?>
                    <div class="alert alert-danger">
                        <p> Not Approved </p>
                        <form action="rental_approval.php" method="post">
                            <input type="hidden" name="rental_id" value="<?php echo $rental_id  ?>">
                            <input class="btn btn-success" name="approve_submit" type="submit" value="Approve">
                        </form>
                    </div>


                    <?php
                        }else{
                            ?>
                    <div class="alert alert-success">
                        <p> Approved </p>
                        <form action="rental_approval.php" method="post">
                            <input type="hidden" name="rental_id" value="<?php echo $rental_id  ?>">
                            <input class="btn btn-success" name="disapprove_submit" type="submit" value="Disapprove">
                        </form>
                    </div>

                    <?php
                        }
                    ?>
                    <!-- Rental Id -->
                    <div class="row">
                        <div class="col-3">
                            <strong> Rental Id: </strong>
                        </div>

                        <div class="col-3">
                            <strong>
                                <?php echo $rental_id; ?>
                            </strong>
                        </div>
                    </div>
                    <hr class="mx-2">

                    <!-- Rental Type -->
                    <div class="row">
                        <div class="col-3">
                            <strong> Rental Type: </strong>
                        </div>

                        <div class="col-3">
                            <strong>
                                <?php echo $rental_type; ?>
                            </strong>
                        </div>
                    </div>
                    <hr class="mx-2">

                    <!-- Rental City -->
                    <div class="row">
                        <div class="col-3">
                            <strong> Rental City: </strong>
                        </div>

                        <div class="col-3">
                            <strong>
                                <?php echo $rental_city; ?>
                            </strong>
                        </div>
                    </div>
                    <hr class="mx-2">

                    <!-- Rental Subcity -->
                    <div class="row">
                        <div class="col-3">
                            <strong> Rental Subcity: </strong>
                        </div>

                        <div class="col-3">
                            <strong>
                                <?php echo $rental_subcity; ?>
                            </strong>
                        </div>
                    </div>
                    <hr class="mx-2">


                    <!-- Rental price -->
                    <div class="row">
                        <div class="col-3">
                            <strong> Rental Price: </strong>
                        </div>

                        <div class="col-3">
                            <strong>
                                <?php echo $rental_price; ?>
                            </strong>
                        </div>
                    </div>
                    <hr class="mx-2">


                    <!-- Rental area -->
                    <div class="row">
                        <div class="col-3">
                            <strong> Rental Area: </strong>
                        </div>

                        <div class="col-3">
                            <strong>
                                <?php echo $rental_area; ?>
                            </strong>
                        </div>
                    </div>
                    <hr class="mx-2">


                    <!-- Rental Kitchen -->
                    <div class="row">
                        <div class="col-3">
                            <strong> No of Kitchen: </strong>
                        </div>

                        <div class="col-3">
                            <strong>
                                <?php echo $rental_kitchen_no; ?>
                            </strong>
                        </div>
                    </div>
                    <hr class="mx-2">

                    <!-- Rental Bed room -->
                    <div class="row">
                        <div class="col-3">
                            <strong> No of Beds: </strong>
                        </div>

                        <div class="col-3">
                            <strong>
                                <?php echo $rental_bed_no; ?>
                            </strong>
                        </div>
                    </div>
                    <hr class="mx-2">

                    <!-- Rental Bath room -->
                    <div class="row">
                        <div class="col-3">
                            <strong> No of Baths: </strong>
                        </div>

                        <div class="col-3">
                            <strong>
                                <?php echo $rental_bath_no; ?>
                            </strong>
                        </div>
                    </div>
                    <hr class="mx-2">

                    <!-- Rental Contact Address -->
                    <div class="row">
                        <div class="col-3">
                            <strong> Contact Address: </strong>
                        </div>

                        <div class="col-3">
                            <strong>
                                <?php echo $rental_contact; ?>
                            </strong>
                        </div>
                    </div>
                    <hr class="mx-2">

                    <!-- Rental Detail -->
                    <div class="row">
                        <div class="col-3">
                            <strong> Rental Detail Info: </strong>
                        </div>

                        <div class="col-3">
                            <strong>
                                <?php echo $rental_detail; ?>
                            </strong>
                        </div>
                    </div>
                    <hr class="mx-2">

                    <div style="text-align: center;">

                        <a href="rental_edit_api.php?rental_id=<?php echo $rental_id; ?>"
                            class="btn btn-success text-white"><i style="font-size: 20px"
                                class="fas fa-pen-alt px-2 text-white"></i> Edit</a>

                    </div>
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