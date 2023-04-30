<?php

include "../../db.php";
SESSION_START();

if (!isset($_COOKIE['user_logged'])) {
    header('location: ../../rental_login.php');
}

$user_email = $_SESSION['user_email'];
$user_id;

// Hotel Admin Info Fetching 
$sql_user = "SELECT * FROM user WHERE user_email = '$user_email'";
$q_result = mysqli_query($con, $sql_user);

while ($row = mysqli_fetch_assoc($q_result)) {
    $user_id = $row['user_id'];
}

// Propety Query
$sql_propety = "SELECT * FROM rental WHERE user_id = '$user_id'";
$rental_result = mysqli_query($con, $sql_propety);
$rental_count = mysqli_num_rows($rental_result);
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
        <link rel="stylesheet" type="text/css" href="../../icon/svg-with-js/css/fa-svg-with-js.css">
        <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
    </head>

    <body>
        <!------ Header --------->
        <header id="top-header" class="bg-primary">
            <div class="top-tol">
                <ul>
                    <div id="logo">
                        <a><img src="../../images/Logoo.png" alt="Inyofa.com" title="Inyofa.com"></a>
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
                        <li><a href="../user_dashboard.php"><i class="fas fa-list"></i> Dashboard</a>
                        </li>
                        <li><a href="rental_list.php" class="text-warning"><i class="fas fa-home"></i>
                                Your Rental</a>
                        </li>
                        <li><a href="../hotel_property/hotel_list.php"><i class="fas fa-building"></i> Your Hotel</a>
                        </li>
                        <li><a href="../hotel_admin/user_admin_list.php"><i class="fas fa-users"></i> Hotel Admins</a>
                        </li>
                        <li><a href="../update_profile.php"> <i class="fa fa-user" aria-hidden="true"></i> User
                                Profile</a>
                        </li>

                        <li><a href="../logout_user.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log out</a>
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

                <div class='alert alert-secondary m-5 w-25'>
                    <h5>Total Properties: <strong> <?php echo $rental_count; ?> </strong> </h5>
                </div>

                <!-- Content -->

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
                    <div class="alert alert-danger"> Not Approved </div>
                    <?php
                    }else{
                       ?>
                    <div class="alert alert-success">Approved </div>
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

                        <a href="edit_user_rental.php?rental_id=<?php echo $rental_id; ?>"
                            class="btn btn-success text-white"><i style="font-size: 20px"
                                class="fas fa-pen-alt px-2 text-white"></i> Edit</a>
                    </div>
                </div>

                <?php
            }

            ?>
            </div>
        </div>


        <script src="../../icon/svg-with-js/js/fontawesome-all.js"></script>
        <script src="../../js/bootstrap.bundle.min.js"></script>
        <script src="../../js/jquery.min.js"></script>
        <script src="../../js/app/main.js"></script>
    </body>

</html>