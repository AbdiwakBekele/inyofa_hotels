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

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/line-awesome.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/flatpicker.css">
    <link rel="stylesheet" href="assets/css/intlTelInput.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />


    <style>
    .icon_location {
        padding: 12px;
        padding-left: 35px;
        background: url("icon/location_sm.png") no-repeat 2%;
        background-size: 20px;
        font-size: 15px;
    }

    .icon_location {
        padding: 12px;
        padding-left: 35px;
        background: url("icon/location_sm.png") no-repeat 2%;
        background-size: 20px;
        font-size: 15px;
    }

    .traveler-input {
        /* display: flex;
            align-items: center; */
        position: relative;
    }

    .traveler-btn {
        cursor: pointer;
        text-align: left;
        transition: all 0.3s;
    }


    .traveler-popup {
        position: absolute;
        top: 100%;
        left: 0;
        display: none;
        z-index: 9999;
        width: 300px;
        background-color: #fff;
        border: 1px solid #ddd;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.2);
        border-radius: 4px;
    }

    .popup-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    .popup-title {
        font-size: 16px;
        font-weight: bold;
    }

    .popup-close {
        font-size: 20px;
        font-weight: bold;
        color: #ddd;
        cursor: pointer;
        border: none;
        background-color: transparent;
    }

    .popup-close:hover {
        color: #0071c2;
    }

    .popup-body {
        padding: 10px;
    }

    .popup-group {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .popup-label {
        font-size: 14px;
        font-weight: bold;
        margin-right: 10px;
    }

    .popup-controls {
        display: flex;
        align-items: center;
    }

    .popup-input {
        width: 50px;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px;
        text-align: center;
        font-size: 14px;
        margin: 0 10px;
    }

    #remove_room_btn,
    #remove_room_btn2,
    #remove_room_btn3,
    #remove_room_btn4,
    #remove_room_btn5,
    #pop_body2,
    #pop_body3,
    #pop_body4,
    #pop_body5 {
        display: none;
    }
    </style>
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
    <br>


    <div class="row mt-3">

        <div class="col">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link " href="flight.php">Round Trip</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="flight_oneway.php">One-Way</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="flight_multicity.php">Multicity</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="flight_stopover.php">Stopover</a>
                </li>
            </ul>

            <!-- Location -->
            <div class="row m-2">

                <div class="col-md mt-2">
                    <p class="h5 text-dark"> <strong>From</strong> </p>
                    <input type="text" name="location"
                        class="form-control form-control-lg border border-dark icon_location" placeholder="From">
                </div>
                <div class="col-md mt-2">
                    <p class="h5 text-dark"> <strong>To</strong> </p>
                    <input type="text" name="location"
                        class="form-control form-control-lg border border-dark icon_location" placeholder="To">
                </div>

                <div class="col-md mt-2">
                    <p class="h6 text-dark"> <strong>Departure Date</strong> </p>
                    <input type="date" name="departu_date" class="form-control form-control-lg border border-dark "
                        placeholder="Departure Date">
                </div>

            </div>

            <!-- Location -->
            <div class="row m-2">

                <div class="col-md mt-2">
                    <p class="h5 text-dark"> <strong>From</strong> </p>
                    <input type="text" name="location"
                        class="form-control form-control-lg border border-dark icon_location" placeholder="From">
                </div>
                <div class="col-md mt-2">
                    <p class="h5 text-dark"> <strong>To</strong> </p>
                    <input type="text" name="location"
                        class="form-control form-control-lg border border-dark icon_location" placeholder="To">
                </div>

                <div class="col-md mt-2">
                    <p class="h6 text-dark"> <strong>Departure Date</strong> </p>
                    <input type="date" name="departu_date" class="form-control form-control-lg border border-dark "
                        placeholder="Departure Date">
                </div>

            </div>
            <!-- Location -->
            <div class="row m-2">

                <div class="col-md mt-2">
                    <p class="h5 text-dark"> <strong>From</strong> </p>
                    <input type="text" name="location"
                        class="form-control form-control-lg border border-dark icon_location" placeholder="From">
                </div>
                <div class="col-md mt-2">
                    <p class="h5 text-dark"> <strong>To</strong> </p>
                    <input type="text" name="location"
                        class="form-control form-control-lg border border-dark icon_location" placeholder="To">
                </div>

                <div class="col-md mt-2">
                    <p class="h6 text-dark"> <strong>Departure Date</strong> </p>
                    <input type="date" name="departu_date" class="form-control form-control-lg border border-dark "
                        placeholder="Departure Date">
                </div>

            </div>

            <div class="mx-3">
                <span class="text-success"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Add another
                    flight</span>
            </div>


            <!-- Date -->
            <div class="row m-2">
                <!-- Travellers -->
                <div class="col-md traveler-input" style="margin-top: 35px;">
                    <div id="traveler-btn"
                        class="traveler-btn icon_traveller form-control form-control-lg border border-dark ">
                        <span id="adult_tra">0</span>
                        Adults, <span id="child_tra">0</span> Children
                    </div>
                    <!-- Traveler Popup -->
                    <div class="traveler-popup">

                        <div class="popup-header">
                            <button type="button" class="popup-close text-danger ">&times;</button>
                        </div>
                        <!--------------------- Pop 1 ------------------->
                        <div id="pop_body1" class="popup-body">
                            <p style="font-size: 12px;"> <strong>Room 1</strong> </p>
                            <div class="row">
                                <div class="col">
                                    Adults
                                </div>
                                <div class="col">
                                    <div class="popup-controls">
                                        <button type="button" id="adult-minus"
                                            class=" btn btn-light rounded-circle mx-3  ">&minus;</button>
                                        <span id="adults-input">0</span>
                                        <button type="button" id="adult-plus"
                                            class=" btn btn-light rounded-circle mx-3 ">&#43;</button>
                                    </div>
                                </div>

                            </div>

                            <div class="row my-3">
                                <div class="col">
                                    Children
                                </div>
                                <div class="col">
                                    <div class="popup-controls">
                                        <button type="button" id="child-minus"
                                            class=" btn btn-light rounded-circle mx-3  ">&minus;</button>
                                        <span id="children-input">0</span>
                                        <button type="button" id="child-plus"
                                            class=" btn btn-light rounded-circle mx-3  ">&#43;</button>
                                    </div>


                                </div>
                                <div id="child_age" class="row my-2">

                                </div>

                                <p id="add_room_btn" class="text-primary text-end "><strong> Add another
                                        rooom
                                    </strong></p>
                                <p id="remove_room_btn" class="text-primary text-end "><strong> Remove rooom
                                    </strong></p>

                            </div>

                        </div>

                        <!-- Pop 2 -->
                        <div id="pop_body2" class="popup-body">
                            <p style="font-size: 12px;"> <strong>Room 2</strong> </p>
                            <div class="row">
                                <div class="col">
                                    Adults
                                </div>
                                <div class="col">
                                    <div class="popup-controls">
                                        <button type="button" id="adult-minus2"
                                            class=" btn btn-light rounded-circle mx-3  ">&minus;</button>
                                        <span id="adults-input2">0</span>
                                        <button type="button" id="adult-plus2"
                                            class=" btn btn-light rounded-circle mx-3 ">&#43;</button>
                                    </div>
                                </div>

                            </div>

                            <div class="row my-3">
                                <div class="col">
                                    Children
                                </div>
                                <div class="col">
                                    <div class="popup-controls">
                                        <button type="button" id="child-minus2"
                                            class=" btn btn-light rounded-circle mx-3  ">&minus;</button>
                                        <span id="children-input2">0</span>
                                        <button type="button" id="child-plus2"
                                            class=" btn btn-light rounded-circle mx-3  ">&#43;</button>
                                    </div>


                                </div>
                                <div id="child_age2" class="row my-2">

                                </div>

                                <p id="add_room_btn2" class="text-primary text-end "><strong> Add another
                                        rooom
                                    </strong></p>
                                <p id="remove_room_btn2" class="text-primary text-end "><strong> Remove
                                        rooom
                                    </strong></p>

                            </div>

                        </div>


                        <!-- Pop 3 -->
                        <div id="pop_body3" class="popup-body">
                            <p style="font-size: 12px;"> <strong>Room 3</strong> </p>
                            <div class="row">
                                <div class="col">
                                    Adults
                                </div>
                                <div class="col">
                                    <div class="popup-controls">
                                        <button type="button" id="adult-minus3"
                                            class=" btn btn-light rounded-circle mx-3  ">&minus;</button>
                                        <span id="adults-input3">0</span>
                                        <button type="button" id="adult-plus3"
                                            class=" btn btn-light rounded-circle mx-3 ">&#43;</button>
                                    </div>
                                </div>

                            </div>

                            <div class="row my-3">
                                <div class="col">
                                    Children
                                </div>
                                <div class="col">
                                    <div class="popup-controls">
                                        <button type="button" id="child-minus3"
                                            class=" btn btn-light rounded-circle mx-3  ">&minus;</button>
                                        <span id="children-input3">0</span>
                                        <button type="button" id="child-plus3"
                                            class=" btn btn-light rounded-circle mx-3  ">&#43;</button>
                                    </div>


                                </div>
                                <div id="child_age3" class="row my-2">

                                </div>

                                <p id="add_room_btn3" class="text-primary text-end "><strong> Add another
                                        rooom
                                    </strong></p>
                                <p id="remove_room_btn3" class="text-primary text-end "><strong> Remove
                                        rooom
                                    </strong></p>

                            </div>
                        </div>

                        <!-- Pop 4 -->
                        <div id="pop_body4" class="popup-body">
                            <p style="font-size: 12px;"> <strong>Room 4</strong> </p>
                            <div class="row">
                                <div class="col">
                                    Adults
                                </div>
                                <div class="col">
                                    <div class="popup-controls">
                                        <button type="button" id="adult-minus4"
                                            class=" btn btn-light rounded-circle mx-3  ">&minus;</button>
                                        <span id="adults-input4">0</span>
                                        <button type="button" id="adult-plus4"
                                            class=" btn btn-light rounded-circle mx-3 ">&#43;</button>
                                    </div>
                                </div>

                            </div>

                            <div class="row my-3">
                                <div class="col">
                                    Children
                                </div>
                                <div class="col">
                                    <div class="popup-controls">
                                        <button type="button" id="child-minus4"
                                            class=" btn btn-light rounded-circle mx-3  ">&minus;</button>
                                        <span id="children-input4">0</span>
                                        <button type="button" id="child-plus4"
                                            class=" btn btn-light rounded-circle mx-3  ">&#43;</button>
                                    </div>


                                </div>
                                <div id="child_age4" class="row my-2">

                                </div>

                                <p id="add_room_btn4" class="text-primary text-end "><strong> Add another
                                        rooom
                                    </strong></p>
                                <p id="remove_room_btn4" class="text-primary text-end "><strong> Remove
                                        rooom
                                    </strong></p>

                            </div>
                        </div>

                        <!-- Pop 5 -->
                        <div id="pop_body5" class="popup-body">
                            <p style="font-size: 12px;"> <strong>Room 5</strong> </p>
                            <div class="row">
                                <div class="col">
                                    Adults
                                </div>
                                <div class="col">
                                    <div class="popup-controls">
                                        <button type="button" id="adult-minus5"
                                            class=" btn btn-light rounded-circle mx-3  ">&minus;</button>
                                        <span id="adults-input5">0</span>
                                        <button type="button" id="adult-plus5"
                                            class=" btn btn-light rounded-circle mx-3 ">&#43;</button>
                                    </div>
                                </div>

                            </div>

                            <div class="row my-3">
                                <div class="col">
                                    Children
                                </div>
                                <div class="col">
                                    <div class="popup-controls">
                                        <button type="button" id="child-minus5"
                                            class=" btn btn-light rounded-circle mx-3  ">&minus;</button>
                                        <span id="children-input5">0</span>
                                        <button type="button" id="child-plus5"
                                            class=" btn btn-light rounded-circle mx-3  ">&#43;</button>
                                    </div>


                                </div>
                                <div id="child_age5" class="row my-2">

                                </div>

                            </div>
                        </div>


                        <div class="popup-footer">
                            <button type="button" id="apply_btn"
                                class="btn btn-primary rounded-pill w-75 m-3">Apply</button>
                        </div>
                    </div>

                </div>

            </div>

            <button style="float:right" class="btn btn-primary btn-lg m-3"> Search </button>


        </div>



    </div>





    <!-- Travel Around Africa -->
    <div class="container mt-5 p-5">
        <h3 style="text-align: center;"> <strong>Travel Around Africa</strong> </h3>
        <div class="row">
            <div class="card col-md-3 m-3" style="width:280px">
                <img class="card-img-top" src="images/africa/capetown.jpg" alt="Card image" style="width:100%">
                <div class="card-body">
                    <h5 class="card-title">Cape Town</h5>
                    <p>Cape Town, South Africa</p>
                </div>
            </div>

            <div class="card col-md-3 m-3" style="width:280px">
                <img class="card-img-top" src="images/africa/stonetown.jpg" alt=" Card image" style="width:100%">
                <div class="card-body">
                    <h5 class="card-title">Stone Town</h5>
                    <p>Stone Town, Tanzania</p>

                </div>
            </div>

            <div class="card col-md-3 m-3" style="width:280px">
                <img class="card-img-top" src="images/africa/marrakesh.jpg" alt="Card image" style="width:100%">
                <div class="card-body">
                    <h5 class="card-title">Marrakesh</h5>
                    <p class="card-text">Marrakesh, Morocco</p>

                </div>
            </div>

            <div class="card col-md-3 m-3" style="width:280px">
                <img class="card-img-top" src="images/africa/lamu.jpg" alt="Card image" style="width:100%">
                <div class="card-body">
                    <h5 class="card-title">Lamu</h5>
                    <p class="card-text">Lamu, Kenya</p>

                </div>
            </div>
        </div>
    </div>
    <hr>



    <!-- Top Destinations -->
    <div class="container mt-5 p-5">

        <h3 style="text-align: center;"> <strong>Top Destinations</strong> </h3>
        <div class="row">
            <div class="card col-md-3 m-3" style="width:280px">
                <img class="card-img-top" src="images/addisababa.png" alt="Card image" style="width:100%">
                <div class="card-body">
                    <h5 class="card-title">Addis Ababa</h5>
                    <p>Addis Ababa, Ethiopia</p>
                </div>
            </div>

            <div class="card col-md-3 m-3" style="width:280px">
                <img class="card-img-top" src="images/hawasa.png" alt=" Card image" style="width:100%">
                <div class="card-body">
                    <h5 class="card-title">Hawasa</h5>
                    <p>Hawasa city, Ethiopia</p>

                </div>
            </div>

            <div class="card col-md-3 m-3" style="width:280px">
                <img class="card-img-top" src="images/newyork.png" alt="Card image" style="width:100%">
                <div class="card-body">
                    <h5 class="card-title">New york</h5>
                    <p class="card-text">Newyork, USA </p>

                </div>
            </div>

            <div class="card col-md-3 m-3" style="width:280px">
                <img class="card-img-top" src="images/paris.png" alt="Card image" style="width:100%">
                <div class="card-body">
                    <h5 class="card-title">Paris</h5>
                    <p class="card-text">Paris, France</p>

                </div>
            </div>
        </div>
    </div>
    <hr>

    <!-- Explore Ethiopia -->
    <div class="container mt-5 p-5">

        <h3 style="text-align: center;"> <strong>Explore Ethiopia</strong> </h3>

        <div class="row">
            <div class="card col-md-3 m-3" style="width:270px">
                <img class="card-img-top" src="images/ethiopia/axsum.jpg" alt="Card image" style="width:100%">
                <div class="card-body">
                    <h5 class="card-title">King Ezana's Stela (Aksum)</h5>
                    <p class="card-text">The ancient kingdom of Aksum was located in present-day Ethiopia.</p>

                </div>
            </div>

            <div class="card col-md-3 m-3" style="width:270px">
                <img class="card-img-top" src="images/ethiopia/gonder.jpg" alt=" Card image" style="width:100%">
                <div class="card-body">
                    <h5 class="card-title">Fasil Ghebbi</h5>
                    <p class="card-text"> fortress located in Gondar, Amhara Region, Ethiopia.</p>

                </div>
            </div>

            <div class="card col-md-3 m-3" style="width:270px">
                <img class="card-img-top" src="images/ethiopia/lalibela.jpg" alt="Card image" style="width:100%">
                <div class="card-body">
                    <h5 class="card-title">Lalibela</h5>
                    <p class="card-text">A tourist site for its famous rock-cut monolithic churches.</p>

                </div>
            </div>

            <div class="card col-md-3 m-3" style="width:270px">
                <img class="card-img-top" src="images/ethiopia/waterfall.jpg" alt="Card image" style="width:100%">
                <div class="card-body">
                    <h5 class="card-title">Blue Nile Falls</h5>
                    <p class="card-text">One of Ethiopia's best-known tourist attractions.</p>

                </div>
            </div>
        </div>
    </div>
    <hr>



    <?php
        include('footer.php');
        ?>


    <script>
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();

    if (dd < 10) {
        dd = '0' + dd;
    }

    if (mm < 10) {
        mm = '0' + mm;
    }

    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("checkin").setAttribute("min", today);

    function date_cal() {
        var result = document.getElementById('checkin').value;

        document.getElementById("checkout").setAttribute("min", result);
    }
    </script>


    <script>
    const travelerBtn = document.querySelector(".traveler-btn");
    const travelerPopup = document.querySelector(".traveler-popup");
    const popupClose = document.querySelector(".popup-close");
    const applyBtn = document.querySelector('#apply_btn');

    //////////******************************//////////////////////////////
    travelerBtn.addEventListener("click", function() {


        var width = window.innerWidth ||
            document.documentElement.clientWidth ||
            document.body.clientWidth;

        if (width < 500) {

            travelerPopup.setAttribute("class", "modal");
            travelerPopup.style.backgroundColor = 'white';
            travelerPopup.style.display = "block";

        } else {
            travelerPopup.style.display = "block";
        }

    });

    popupClose.addEventListener("click", function() {
        travelerPopup.style.display = "none";
    });


    //////////********* Group 1 Events  ******//////////////////////////////

    // Group 1
    const adultPlus = document.querySelector("#adult-plus");
    const adultMinus = document.querySelector("#adult-minus");
    const childPlus = document.querySelector("#child-plus");
    const childMinus = document.querySelector("#child-minus");
    const addRoom = document.querySelector('#add_room_btn');
    const removeRoom = document.querySelector('#remove_room_btn');

    let adultNum = 0;
    let childNum = 0;
    let roomNum = 0;

    adultPlus.addEventListener("click", function() {
        adultNum++;
        document.getElementById('adults-input').innerHTML = adultNum;
    });

    adultMinus.addEventListener("click", function() {
        if (adultNum > 0) {
            adultNum--;
            document.getElementById('adults-input').innerHTML = adultNum;
        }
    });

    childPlus.addEventListener("click", function() {
        childNum++;
        document.getElementById('children-input').innerHTML = childNum;
        document.getElementById('child_age').innerHTML = " ";
        for (var i = 1; i <= childNum; i++) {
            var prev_comp = document.getElementById('child_age').innerHTML;
            document.getElementById('child_age').innerHTML = prev_comp +
                '<div class="col-6" ><label style="font-size: 12px;" > Child ' + i +
                ' age </label> <span class="text-danger" >*</span> <select class="form-control mx-1"  > <option> Under 1 </option><option> 1 </option><option> 2 </option><option> 3 </option><option> 4 </option><option> 5 </option><option> 6 </option><option> 7 </option><option> 8 </option><option> 9 </option><option> 10 </option><option> 11 </option><option> 12 </option><option> 13 </option> <option> 14 </option><option> 15 </option><option> 16 </option><option> 17 </option></select></div>';
        }

    });

    childMinus.addEventListener("click", function() {
        if (childNum > 0) {
            childNum--;
            document.getElementById('children-input').innerHTML = childNum;

            document.getElementById('child_age').innerHTML = " ";
            for (var i = 1; i <= childNum; i++) {
                var prev_comp = document.getElementById('child_age').innerHTML;
                document.getElementById('child_age').innerHTML = prev_comp +
                    '<div class="col-6" ><label style="font-size: 12px;" > Child ' + i +
                    ' age </label> <span class="text-danger" >*</span> <select class="form-control mx-1"  > <option> Under 1 </option><option> 1 </option><option> 2 </option><option> 3 </option><option> 4 </option><option> 5 </option><option> 6 </option><option> 7 </option><option> 8 </option><option> 9 </option><option> 10 </option><option> 11 </option><option> 12 </option><option> 13 </option> <option> 14 </option><option> 15 </option><option> 16 </option><option> 17 </option></select></div>';
            }
        }
    });

    addRoom.addEventListener('click', function() {
        document.getElementById('pop_body2').style.display = 'block';
        document.getElementById('add_room_btn').style.display = 'none';
        document.getElementById('remove_room_btn').style.display = 'block';

    });

    removeRoom.addEventListener('click', function() {
        document.getElementById('pop_body1').style.display = 'none';
        document.getElementById('remove_room_btn').style.display = 'none';
        document.getElementById('add_room_btn').style.display = 'block';


    });


    //////////********* Group 2 Events  ******//////////////////////////////

    // Group 2
    const adultPlus2 = document.querySelector("#adult-plus2");
    const adultMinus2 = document.querySelector("#adult-minus2");
    const childPlus2 = document.querySelector("#child-plus2");
    const childMinus2 = document.querySelector("#child-minus2");
    const addRoom2 = document.querySelector('#add_room_btn2');
    const removeRoom2 = document.querySelector('#remove_room_btn2');

    let adultNum2 = 0;
    let childNum2 = 0;
    let roomNum2 = 0;

    adultPlus2.addEventListener("click", function() {
        adultNum2++;
        document.getElementById('adults-input2').innerHTML = adultNum2;
    });

    adultMinus2.addEventListener("click", function() {
        if (adultNum2 > 0) {
            adultNum2--;
            document.getElementById('adults-input2').innerHTML = adultNum2;
        }
    });

    childPlus2.addEventListener("click", function() {
        childNum2++;
        document.getElementById('children-input2').innerHTML = childNum2;
        document.getElementById('child_age2').innerHTML = " ";
        for (var i = 1; i <= childNum2; i++) {
            var prev_comp2 = document.getElementById('child_age2').innerHTML;
            document.getElementById('child_age2').innerHTML = prev_comp2 +
                '<div class="col-6" ><label style="font-size: 12px;" > Child ' + i +
                ' age </label> <span class="text-danger" >*</span> <select class="form-control mx-1"  > <option> Under 1 </option><option> 1 </option><option> 2 </option><option> 3 </option><option> 4 </option><option> 5 </option><option> 6 </option><option> 7 </option><option> 8 </option><option> 9 </option><option> 10 </option><option> 11 </option><option> 12 </option><option> 13 </option> <option> 14 </option><option> 15 </option><option> 16 </option><option> 17 </option></select></div>';
        }

    });

    childMinus2.addEventListener("click", function() {
        if (childNum2 > 0) {
            childNum2--;
            document.getElementById('children-input2').innerHTML = childNum2;

            document.getElementById('child_age2').innerHTML = " ";
            for (var i = 1; i <= childNum2; i++) {
                var prev_comp2 = document.getElementById('child_age2').innerHTML;
                document.getElementById('child_age2').innerHTML = prev_comp2 +
                    '<div class="col-6" ><label style="font-size: 12px;" > Child ' + i +
                    ' age </label> <span class="text-danger" >*</span> <select class="form-control mx-1"  > <option> Under 1 </option><option> 1 </option><option> 2 </option><option> 3 </option><option> 4 </option><option> 5 </option><option> 6 </option><option> 7 </option><option> 8 </option><option> 9 </option><option> 10 </option><option> 11 </option><option> 12 </option><option> 13 </option> <option> 14 </option><option> 15 </option><option> 16 </option><option> 17 </option></select></div>';
            }
        }
    });

    addRoom2.addEventListener('click', function() {
        document.getElementById('pop_body3').style.display = 'block';
        document.getElementById('add_room_btn2').style.display = 'none';
        document.getElementById('remove_room_btn2').style.display = 'block';

    });

    removeRoom2.addEventListener('click', function() {
        document.getElementById('pop_body2').style.display = 'none';
        document.getElementById('remove_room_btn2').style.display = 'none';
        document.getElementById('add_room_btn2').style.display = 'block';


    });


    //////////********* Group 3 Events  ******//////////////////////////////

    // Group 3
    const adultPlus3 = document.querySelector("#adult-plus3");
    const adultMinus3 = document.querySelector("#adult-minus3");
    const childPlus3 = document.querySelector("#child-plus3");
    const childMinus3 = document.querySelector("#child-minus3");
    const addRoom3 = document.querySelector('#add_room_btn3');
    const removeRoom3 = document.querySelector('#remove_room_btn3');

    let adultNum3 = 0;
    let childNum3 = 0;
    let roomNum3 = 0;

    adultPlus3.addEventListener("click", function() {
        adultNum3++;
        document.getElementById('adults-input3').innerHTML = adultNum3;
    });

    adultMinus3.addEventListener("click", function() {
        if (adultNum3 > 0) {
            adultNum3--;
            document.getElementById('adults-input3').innerHTML = adultNum3;
        }
    });

    childPlus3.addEventListener("click", function() {
        childNum3++;
        document.getElementById('children-input3').innerHTML = childNum3;
        document.getElementById('child_age3').innerHTML = " ";
        for (var i = 1; i <= childNum3; i++) {
            var prev_comp3 = document.getElementById('child_age3').innerHTML;
            document.getElementById('child_age3').innerHTML = prev_comp3 +
                '<div class="col-6" ><label style="font-size: 12px;" > Child ' + i +
                ' age </label> <span class="text-danger" >*</span> <select class="form-control mx-1"  > <option> Under 1 </option><option> 1 </option><option> 2 </option><option> 3 </option><option> 4 </option><option> 5 </option><option> 6 </option><option> 7 </option><option> 8 </option><option> 9 </option><option> 10 </option><option> 11 </option><option> 12 </option><option> 13 </option> <option> 14 </option><option> 15 </option><option> 16 </option><option> 17 </option></select></div>';
        }

    });

    childMinus3.addEventListener("click", function() {
        if (childNum3 > 0) {
            childNum3--;
            document.getElementById('children-input3').innerHTML = childNum3;

            document.getElementById('child_age3').innerHTML = " ";
            for (var i = 1; i <= childNum3; i++) {
                var prev_comp3 = document.getElementById('child_age3').innerHTML;
                document.getElementById('child_age3').innerHTML = prev_comp3 +
                    '<div class="col-6" ><label style="font-size: 12px;" > Child ' + i +
                    ' age </label> <span class="text-danger" >*</span> <select class="form-control mx-1"  > <option> Under 1 </option><option> 1 </option><option> 2 </option><option> 3 </option><option> 4 </option><option> 5 </option><option> 6 </option><option> 7 </option><option> 8 </option><option> 9 </option><option> 10 </option><option> 11 </option><option> 12 </option><option> 13 </option> <option> 14 </option><option> 15 </option><option> 16 </option><option> 17 </option></select></div>';
            }
        }
    });

    addRoom3.addEventListener('click', function() {
        document.getElementById('pop_body4').style.display = 'block';
        document.getElementById('add_room_btn3').style.display = 'none';
        document.getElementById('remove_room_btn3').style.display = 'block';

    });

    removeRoom3.addEventListener('click', function() {
        document.getElementById('pop_body3').style.display = 'none';
        document.getElementById('remove_room_btn3').style.display = 'none';
        document.getElementById('add_room_btn3').style.display = 'block';


    });


    //////////********* Group 1 Events  ******//////////////////////////////

    // Group 1
    const adultPlus4 = document.querySelector("#adult-plus4");
    const adultMinus4 = document.querySelector("#adult-minus4");
    const childPlus4 = document.querySelector("#child-plus4");
    const childMinus4 = document.querySelector("#child-minus4");
    const addRoom4 = document.querySelector('#add_room_btn4');
    const removeRoom4 = document.querySelector('#remove_room_btn4');

    let adultNum4 = 0;
    let childNum4 = 0;
    let roomNum4 = 0;

    adultPlus4.addEventListener("click", function() {
        adultNum4++;
        document.getElementById('adults-input4').innerHTML = adultNum4;
    });

    adultMinus4.addEventListener("click", function() {
        if (adultNum4 > 0) {
            adultNum4--;
            document.getElementById('adults-input4').innerHTML = adultNum4;
        }
    });

    childPlus4.addEventListener("click", function() {
        childNum4++;
        document.getElementById('children-input4').innerHTML = childNum4;
        document.getElementById('child_age4').innerHTML = " ";
        for (var i = 1; i <= childNum4; i++) {
            var prev_comp4 = document.getElementById('child_age4').innerHTML;
            document.getElementById('child_age4').innerHTML = prev_comp4 +
                '<div class="col-6" ><label style="font-size: 12px;" > Child ' + i +
                ' age </label> <span class="text-danger" >*</span> <select class="form-control mx-1"  > <option> Under 1 </option><option> 1 </option><option> 2 </option><option> 3 </option><option> 4 </option><option> 5 </option><option> 6 </option><option> 7 </option><option> 8 </option><option> 9 </option><option> 10 </option><option> 11 </option><option> 12 </option><option> 13 </option> <option> 14 </option><option> 15 </option><option> 16 </option><option> 17 </option></select></div>';
        }

    });

    childMinus4.addEventListener("click", function() {
        if (childNum4 > 0) {
            childNum4--;
            document.getElementById('children-input4').innerHTML = childNum4;

            document.getElementById('child_age4').innerHTML = " ";
            for (var i = 1; i <= childNum4; i++) {
                var prev_comp4 = document.getElementById('child_age4').innerHTML;
                document.getElementById('child_age4').innerHTML = prev_comp4 +
                    '<div class="col-6" ><label style="font-size: 12px;" > Child ' + i +
                    ' age </label> <span class="text-danger" >*</span> <select class="form-control mx-1"  > <option> Under 1 </option><option> 1 </option><option> 2 </option><option> 3 </option><option> 4 </option><option> 5 </option><option> 6 </option><option> 7 </option><option> 8 </option><option> 9 </option><option> 10 </option><option> 11 </option><option> 12 </option><option> 13 </option> <option> 14 </option><option> 15 </option><option> 16 </option><option> 17 </option></select></div>';
            }
        }
    });

    addRoom4.addEventListener('click', function() {
        document.getElementById('pop_body5').style.display = 'block';
        document.getElementById('add_room_btn4').style.display = 'none';
        document.getElementById('remove_room_btn4').style.display = 'block';

    });

    removeRoom4.addEventListener('click', function() {
        document.getElementById('pop_body4').style.display = 'none';
        document.getElementById('remove_room_btn4').style.display = 'none';
        document.getElementById('add_room_btn4').style.display = 'block';


    });


    //////////********* Group 5 Events  ******//////////////////////////////

    // Group 1
    const adultPlus5 = document.querySelector("#adult-plus5");
    const adultMinus5 = document.querySelector("#adult-minus5");
    const childPlus5 = document.querySelector("#child-plus5");
    const childMinus5 = document.querySelector("#child-minus5");
    const addRoom5 = document.querySelector('#add_room_btn5');
    const removeRoom5 = document.querySelector('#remove_room_btn5');

    let adultNum5 = 0;
    let childNum5 = 0;
    let roomNum5 = 0;

    adultPlus5.addEventListener("click", function() {
        adultNum5++;
        document.getElementById('adults-input5').innerHTML = adultNum5;
    });

    adultMinus5.addEventListener("click", function() {
        if (adultNum5 > 0) {
            adultNum5--;
            document.getElementById('adults-input5').innerHTML = adultNum5;
        }
    });

    childPlus5.addEventListener("click", function() {
        childNum5++;
        document.getElementById('children-input5').innerHTML = childNum5;
        document.getElementById('child_age5').innerHTML = " ";
        for (var i = 1; i <= childNum5; i++) {
            var prev_comp5 = document.getElementById('child_age5').innerHTML;
            document.getElementById('child_age5').innerHTML = prev_comp5 +
                '<div class="col-6" ><label style="font-size: 12px;" > Child ' + i +
                ' age </label> <span class="text-danger" >*</span> <select class="form-control mx-1"  > <option> Under 1 </option><option> 1 </option><option> 2 </option><option> 3 </option><option> 4 </option><option> 5 </option><option> 6 </option><option> 7 </option><option> 8 </option><option> 9 </option><option> 10 </option><option> 11 </option><option> 12 </option><option> 13 </option> <option> 14 </option><option> 15 </option><option> 16 </option><option> 17 </option></select></div>';
        }

    });

    childMinus5.addEventListener("click", function() {
        if (childNum5 > 0) {
            childNum5--;
            document.getElementById('children-input5').innerHTML = childNum5;

            document.getElementById('child_age5').innerHTML = " ";
            for (var i = 1; i <= childNum5; i++) {
                var prev_comp5 = document.getElementById('child_age5').innerHTML;
                document.getElementById('child_age5').innerHTML = prev_comp5 +
                    '<div class="col-6" ><label style="font-size: 12px;" > Child ' + i +
                    ' age </label> <span class="text-danger" >*</span> <select class="form-control mx-1"  > <option> Under 1 </option><option> 1 </option><option> 2 </option><option> 3 </option><option> 4 </option><option> 5 </option><option> 6 </option><option> 7 </option><option> 8 </option><option> 9 </option><option> 10 </option><option> 11 </option><option> 12 </option><option> 13 </option> <option> 14 </option><option> 15 </option><option> 16 </option><option> 17 </option></select></div>';
            }
        }
    });

    removeRoom.addEventListener('click', function() {
        document.getElementById('pop_body5').style.display = 'none';
        document.getElementById('remove_room_btn5').style.display = 'none';
        document.getElementById('add_room_btn5').style.display = 'block';


    });



    /////////////////////////////

    applyBtn.addEventListener("click", function() {
        var totalAdult = adultNum + adultNum2 + adultNum3 + adultNum4 + adultNum5;
        var totalChild = childNum + childNum2 + childNum3 + childNum4 + childNum5;

        document.getElementById('adult_tra').innerHTML = totalAdult;
        document.getElementById('child_tra').innerHTML = totalChild;
        travelerPopup.style.display = "none";

    });
    </script>



    <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js">
    </script>
    <script src="icon/svg-with-js/js/fontawesome-all.js"></script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
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
<!-- Mirrored from bytesed.com/tf/beyond-hotel/beyond_hotel/listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Nov 2022 12:15:02 GMT -->

</html>