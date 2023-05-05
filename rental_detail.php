<?php
SESSION_START();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> INYOFA | In Your Favor</title>
    <link rel="icon" href="favicon.png" sizes="16x16" type="icon/png">
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/line-awesome.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/flatpicker.css">
    <link rel="stylesheet" href="assets/css/intlTelInput.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <style>
    .icon_location {
        padding: 12px;
        padding-left: 35px;
        background: url("icon/location_sm.png") no-repeat 2%;
        background-size: 20px;
        font-size: 15px;
    }

    .icon_date {
        padding: 12px;
        padding-left: 35px;
        background: url("icon/calendar_sm.png") no-repeat 2%;
        background-size: 20px;
        font-size: 15px;
    }

    .icon_traveller {
        padding: 12px;
        padding-left: 35px;
        background: url("icon/people_sm.png") no-repeat 2%;
        background-size: 20px;
        font-size: 15px;
    }
    </style>
</head>


<body style="background-color: #f2f2f2;">

    <!-- Navigation -->
    <header class="header-style-01">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #336699;">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="assets/img/logo_white.png" alt="Logo" width="120px">
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

                                    <?php 
                            require('db.php');
                            if (isset($_SESSION['user_email'])){
                            
                                // retrieve user's name from database using email
                                $email = $_SESSION['user_email'];
                                $query = "SELECT user_fullname FROM user_customer WHERE user_email = '$email'";
                                $result = mysqli_query($con, $query);
                                $row = mysqli_fetch_assoc($result);
                            
                                if ($row) {
                                    // user found, display their name
                                    $name = $row['user_fullname'];
                                    ?>
                                    <a class="nav-link text-primary" style="font-size: 17px"
                                        href="user_customer/user_customer_logout.php">
                                        <i class="fa fa-user mx-1" aria-hidden="true"></i> <?php echo $name ?> |
                                        Logout</a>

                                    <?php
                                    } else {
                                        ?>
                                    <form action="user_customer/user_customer_login.php">
                                        <button class="btn btn-primary rounded-pill w-100 text-center m-2"
                                            type="submit"><strong>Sign in</strong></button>
                                    </form>

                                    <a class="text-primary text-center m-2"
                                        href="user_customer/user_customer_logout.php" style="font-size: 15px">
                                        <strong>Sign up, it's
                                            free</strong> </a>

                                    <?php
                                    }
                                } else {
                                    // user is not logged in
                                    ?>

                                    <form action="user_customer/user_customer_login.php">
                                        <button class="btn btn-primary rounded-pill w-100 text-center m-2"
                                            type="submit"><strong>Sign in</strong></button>
                                    </form>

                                    <a class="text-primary text-center m-2"
                                        href="user_customer/user_customer_logout.php" style="font-size: 15px">
                                        <strong>Sign up, it's
                                            free</strong> </a>
                                    <?php
                                }
                            ?>
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
                        <!-- Home -->
                        <li class="nav-item me-5">
                            <a class="nav-link text-white" href="index.php"> <i class="fa fa-home mx-1"
                                    aria-hidden="true"></i>
                                Home</a>
                        </li>
                        <!-- Rental -->
                        <li class="nav-item me-5">
                            <a class="nav-link text-white" href="rental.php"> <i class="fa fa-building mx-1"
                                    aria-hidden="true"></i> Rental</a>
                        </li>
                        <!-- Flight -->
                        <li class="nav-item me-5">
                            <a class="nav-link text-white" href="flight.php"> <i class="fa fa-plane mx-1"
                                    aria-hidden="true"></i>
                                Flight</a>
                        </li>
                        <!-- About us -->
                        <li class="nav-item me-5">
                            <a class="nav-link text-white " href="about_us.php"> <i class="fa fa-info-circle mx-1"
                                    aria-hidden="true"></i> About Us</a>
                        </li>
                        <!-- List Your Properties -->
                        <li class="nav-item me-5">
                            <a class="nav-link text-white" href="list_your_property.php"> <i class="fa fa-list-alt mx-1"
                                    aria-hidden="true"></i> List your property</a>
                        </li>
                        <!-- Login | Register -->
                        <li class="nav-item me-5">
                            <?php 
                            require('db.php');
                            if (isset($_SESSION['user_email'])){
                            
                                // retrieve user's name from database using email
                                $email = $_SESSION['user_email'];
                                $query = "SELECT user_fullname FROM user_customer WHERE user_email = '$email'";
                                $result = mysqli_query($con, $query);
                                $row = mysqli_fetch_assoc($result);
                            
                                if ($row) {
                                    // user found, display their name
                                    $name = $row['user_fullname'];
                                    ?>
                            <a class="nav-link text-white" href="user_customer/user_customer_logout.php">
                                <i class="fa fa-user mx-1" aria-hidden="true"></i> <?php echo $name ?> | Logout</a>

                            <?php
                                } else {
                            ?>

                            <a class="nav-link text-white" href="user_customer/user_customer_login.php">
                                <i class="fa fa-user mx-1" aria-hidden="true"></i> Login | Register</a>

                            <?php
                                    }
                                } else {
                            ?>

                            <a class="nav-link text-white" href="user_customer/user_customer_login.php">
                                <i class="fa fa-user mx-1" aria-hidden="true"></i> Login | Register</a>
                            <?php
                                }
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <!-- Fetching Rental Information PHP Code -->
        <?php
            require("db.php");
            
            if (isset($_REQUEST['rental_id'])) {
                $rental_id = intval($_REQUEST['rental_id']);

                $q_rentals = "SELECT * FROM rental where rental_id = '$rental_id' ";
                $q_result = mysqli_query($con, $q_rentals);

                while ($row = mysqli_fetch_assoc($q_result)) {
                    $rental_id = $row['rental_id'];
                    $rental_type = $row['rental_type'];
                    $rental_city = $row['rental_city'];
                    $rental_subcity = $row['rental_subcity'];
                    $rental_image1 = $row['rental_image1'];
                    $rental_image2 = $row['rental_image2'];
                    $rental_image3 = $row['rental_image3'];
                    $rental_price = $row['rental_price'];
                    $rental_area = $row['rental_area'];
                    $rental_kitchen_no = $row['rental_kitchen_no'];
                    $rental_bed_no = $row['rental_bed_no'];
                    $rental_bath_no = $row['rental_bath_no'];
                    $rental_contact = $row['rental_contact'];
                    $rental_detail = $row['rental_detail'];
                }
                ?>

        <!--Top Carousel Image -->
        <div id="demo" class=" carousel slide " data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            </div>

            <!-- The slideshow/carousel -->
            <div class="carousel-inner" style="height: 400px;">
                <div class="carousel-item active">
                    <img src="rental_image/<?php echo $rental_image1; ?>" alt="Rental Image" class="d-block"
                        style="width:100%; height: 100%; object-fit: cover;">
                </div>
                <div class="carousel-item">
                    <img src="rental_image/<?php echo $rental_image2; ?>" alt="Rental Image" class="d-block"
                        style="width:100%;">
                </div>
                <div class=" carousel-item">
                    <img src="rental_image/<?php echo $rental_image3; ?>" alt="Rental Image" class="d-block"
                        style="width:100%;">
                </div>
            </div>

            <!-- Left and right controls/icons -->
            <button class=" carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"> </span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>

        </div>

        <!-- Sticky Navigation Bar -->
        <nav class="navbar navbar-expand-sm bg-white navbar-light sticky-top justify-content-center">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-black" href="#overview"> <strong>Overview</strong> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black" href="#location"><strong>Policies</strong></a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Rental Information -->
        <div id="overview" class="row bg-white px-5 m-1">
            <!-- Rental Descriptoin -->
            <div class="col-lg-8">
                <br>
                <h3> <strong> <?php echo $rental_type; ?></strong></h3>
                <p style="font-size: 15px"> <?php echo $rental_city.', '. $rental_subcity ?>
                </p>

                <h5> <strong> Features </strong></h5>
                <div class="row">
                    <div class=" col-4 mx-3">
                        <i class="fa fa-bed my-2" style="font-size: 17px; color: black" aria-hidden="true"></i>
                        <h6 class="mx-2" style="display: inline; font-size: 15px">
                            <?php echo $rental_bed_no.' Bed Rooms'; ?></h6>
                        <br>
                        <i class="fa fa-bath my-2" style="font-size: 17px; color: black" aria-hidden="true"></i>
                        <h6 class="mx-2" style="display: inline; font-size: 15px">
                            <?php echo $rental_bath_no . ' Bathroom'; ?> </h6>

                        <br>
                        <i class="fa fa-cutlery my-2" style="font-size: 17px; color: black" aria-hidden="true"></i>
                        <h6 class="mx-2" style="display: inline; font-size: 15px">
                            <?php echo $rental_kitchen_no . ' Kitchen'; ?> </h6>
                    </div>
                </div>

                <a class="btn btn-primary w-50 my-4" href="rental_book.php?rental_id=<?php echo $rental_id; ?>">
                    Get this property </a>


            </div>
            <!-- Hotel Map -->
            <div class="col-lg-4">
                <br>
                <img class="img-fluid" src="images/map.JPG" alt="">
            </div>

        </div>


        <!-- About this property -->
        <div class="row mt-3 bg-white p-3">

            <div class="row">
                <div class="col-md-4">
                    <h3> <strong> About this Property </strong> </h3>
                </div>

                <div class="col-md-8">
                    <h4> <?php echo $rental_type; ?> </h4>
                    <p> <?php echo $rental_detail; ?> </p>
                </div>
            </div>
            <hr>
        </div>

        <!-- Fees & policies -->
        <div id="policies" class="row mt-3 bg-white p-3">

            <!-- Fees & policies -->
            <div class="col-md-4">
                <h3> <strong>Fees & policies </strong> </h3>
            </div>

            <!-- Col 2 -->
            <div class="col-md">
                <div class="mx-5">
                    <p> Fees and Policies Details here</p>
                </div>
            </div>
        </div>


        <?php 
            }
        ?>


    </div>

    <?php
        include('footer.php');
        ?>


    <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js">
    </script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/jquery-migrate.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.js"></script>
    <script src="assets/js/jquery.nice-select.js"></script>
    <script src="assets/js/flatpicker.js"></script>
    <script src="assets/js/nouislider-8.5.1.min.js"></script>
    <script src="assets/js/intlTelInput.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>