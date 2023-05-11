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
    <!-- PHP Code -->
    <?php 
            include "db.php";

            if (isset($_REQUEST['room_type_id'])) {
                $room_type_id = intval($_REQUEST['room_type_id']);

                $q_rt = "SELECT * FROM room_type where room_type_id = '$room_type_id' ";
                $q_rt_result= mysqli_query($con, $q_rt);

                while($rt = mysqli_fetch_assoc($q_rt_result)){
                    $hotel_id = $rt['hotel_id'];
                    $room_type_id = $rt['room_type_id'];
                    $room_type_name = $rt['room_type_name'];
                    $room_type_max_guest = $rt['room_type_max_guest'];
                    $room_beds = $rt['room_beds'];
                    $room_type_price = $rt['room_type_price'];
                    $room_type_size = $rt['room_type_size'];
                    $room_amenities = explode(',', $rt['room_amenities']);
                    $room_type_description = $rt['room_type_description'];
                    $room_img = $rt['room_img'];
                }

                $q_hotels = "SELECT * FROM hotels where hotel_id = '$hotel_id' ";
                $q_hotel_result = mysqli_query($con, $q_hotels);
                while ($row = mysqli_fetch_assoc($q_hotel_result)) {
                    $hotel_name = $row['hotel_name'];
                    $contact_address = $row['contact_address'];
                    $hotel_size = $row['hotel_size'];
                    $hotel_rating = $row['hotel_rating'];
                    $hotel_country = $row['hotel_country'];
                    $hotel_city = $row['hotel_city'];
                    $hotel_subcity = $row['hotel_subcity'];
                    $hotel_img1 = $row['hotel_img1'];
                    $hotel_img2 = $row['hotel_img2'];
                    $hotel_img3 = $row['hotel_img3'];
                    $about_the_area = $row['about_the_area'];
                    $about_the_property = $row['about_the_property'];
                    $hotel_amenities = explode(',', $row['hotel_amenities']);
                    $clean_and_safety = $row['clean_and_safety'];
                    $arrival_and_leaving = $row['arrival_and_leaving'];
                    $restriction_related = $row['restriction_related'];
                    $special_checkin = $row['special_checkin'];
                    $required_documents = $row['required_documents'];
                    $children_and_pet = $row['children_and_pet'];
                    $internet_and_parking = $row['internet_and_parking'];
                    $fees_and_policies = $row['fees_and_policies'];
                    $transfer_and_others = $row['transfer_and_others'];
                }
            }
        ?>

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
        <h2 class="m-3"> <strong> <?php echo $hotel_name?> </strong> </h2>
        <!-- form -->
        <form action="confirmation.php" method="post">
            <div class="row">
                <!-- Form Inputs -->
                <div class="col-lg-8">
                    <div class="p-3 my-2 bg-white">
                        <p class="me-5" style=" display: inline; text-align: left; color: purple;"> <strong>
                                Inyofa.com
                            </strong>
                        </p>
                        <p class="ms-5" style="display: inline; align-items : right; color: cornflowerblue;">
                            <a href="rental_signup.php"> <strong> Sign in > </strong> </a>
                        </p>
                    </div>

                    <!-- Step 1: Details -->
                    <div class="bg-white p-3 mt-2">

                        <i class="fa fa-user mx-3" style="font-size: 25px" aria-hidden="true"></i>
                        <h4 style="display: inline;"> <strong> Step 1: Your details </strong> </h4>
                        <hr>

                        <p> <span class="text-danger">*</span> required fields </p>

                        <!-- First name -->
                        <div class="col-8 ">
                            <label for="firstname" class="form-label m-0"> <strong>Firstname</strong><span
                                    class="text-danger">*</span> </label>
                            <p class="text-muted"> Please give us the name of one of the people staying in this
                                room.</p>
                            <input type="text" class="form-control" id="firstname" placeholder="Enter firstname"
                                name="firstname" required>
                        </div>

                        <!-- Last name -->
                        <div class="col-8 mt-2">
                            <label for="lastname" class="form-label m-0"> <strong>Lastname</strong><span
                                    class="text-danger">*</span> </label>
                            <input type="text" class="form-control" id="lastname" placeholder="Enter lastname"
                                name="lastname" required>
                        </div>


                        <!-- Email -->
                        <div class="col-8 mt-2">
                            <label for="email" class="form-label m-0"> <strong>Email</strong><span
                                    class="text-danger">*</span> </label>
                            <p class="text-muted">Your confirmation email goes here.</p>
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email"
                                required>
                        </div>

                        <!-- phone -->
                        <div class="col-8 mt-2">
                            <label for="phone" class="form-label m-0"> <strong>Mobile number</strong><span
                                    class="text-danger">*</span> </label>
                            <p class="text-muted">We’ll only contact you in an emergency</p>
                            <input type="phone" class="form-control" id="phone" placeholder="Enter phone no"
                                name="phone" required>
                        </div>

                        <!-- Room No -->
                        <div class="col-4 mt-2">
                            <label for="room" class="form-label m-0"> <strong>Room No</strong><span
                                    class="text-danger">*</span> </label>
                            <p class="text-muted">Please select your room no</p>

                            <?php

                                    echo "<select name='room' class='form-control' id='room' required> ";

                                    $array = array();
                                    $q = "SELECT * FROM room where room_type_id = '$room_type_id' and reserve_status = 'NO' ";
                                    $q_room_result = mysqli_query($con, $q);

                                    while ($r = mysqli_fetch_assoc($q_room_result)) {

                                        echo "<option name='room' value = '{$r['room_id']}'";
                                        echo ">{$r['room_no']}</option>";
                                    }

                                    echo "</select>";

                                ?>
                        </div>

                        <div class="row">
                            <p class="text-muted"> <strong>Confirm your stay</strong> <span class="text-danger">*</span>
                            </p>
                            <div class="col">
                                <label for="checkin"> Check-in </label>
                                <input class="form-control" type="date" id="checkin" name="checkin" required>

                            </div>

                            <div class="col">
                                <label for="checkout"> Check-out </label>
                                <input class="form-control" type="date" id="checkout" name="checkout" required>
                            </div>
                        </div>
                        <input type="hidden" name="hotel_id" value="<?php echo $hotel_id; ?>">
                        <button class="btn btn-primary m-3" name="Submit" type="submit">Book without
                            Payment</button>
                    </div>

                    <!-- Step 2: Rooms -->
                    <div class="bg-white pt-3 mt-2">

                        <i class="fa fa-bed mx-3" style="font-size: 25px" aria-hidden="true"></i>
                        <h4 style="display: inline;"> <strong> Step 2: Rooms detail </strong> </h4>
                        <hr>

                        <p class="mx-3 h5"> <strong> <?php echo $room_type_name ?></strong>
                        </p>

                        <div class="bg-light rounded p-3">

                            <div class="m-2" style="display: inline;">
                                <i class="fa fa-check text-success" aria-hidden="true"></i>
                                <p style="display: inline;"> <strong> Your room:
                                    </strong> </p>
                            </div>

                            <div class="m-2" style="display: inline;">
                                <i class="fa fa-users text-success" aria-hidden="true"></i>
                                <p style="display: inline;" class="text-success"> <strong>
                                        <?php echo $room_type_max_guest.' Guests';?> </strong> </p>
                            </div>

                            <div class="m-2" style="display: inline;">
                                <i class="fa fa-pencil-square-o text-success" aria-hidden="true"></i>
                                <p style="display: inline;" class="text-success"> <strong>
                                        <?php echo $room_type_size.' sq m.';?> </strong> </p>
                            </div>

                            <div class="m-2" style="display: inline;">
                                <i class="fa fa-bed text-success" aria-hidden="true"></i>
                                <p style="display: inline;" class="text-success"> <strong>
                                        <?php  echo $room_beds.' bed' ?></strong> </p>
                            </div>
                        </div>



                    </div>
                </div>

                <!-- Image and Others -->
                <div class="col-lg-4">
                    <div class="p-3 my-2 bg-white">

                        <!-- Carousel Image -->
                        <div id="demo" class=" carousel slide " data-bs-ride="carousel">

                            <!-- Indicators/dots -->
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#demo" data-bs-slide-to="0"
                                    class="active"></button>
                                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                            </div>

                            <!-- The slideshow/carousel -->
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="hotels_image/<?php echo $room_img ?>" alt="<?php echo $hotel_name ?>"
                                        class="d-block" style="width:100%">
                                </div>
                                <div class="carousel-item">
                                    <img src="hotels_image/<?php echo $room_img ?>" alt="<?php echo $hotel_name ?>"
                                        class="d-block" style="width:100%">
                                </div>
                                <div class=" carousel-item">
                                    <img src="hotels_image/<?php echo $room_img ?>" alt="<?php echo $hotel_name ?>"
                                        class="d-block" style="width:100%">
                                </div>
                            </div>

                            <!-- Left and right controls/icons -->
                            <button class=" carousel-control-prev" type="button" data-bs-target="#demo"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"> </span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#demo"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>

                        </div>

                        <div class="py-3">
                            <h5 class="m-0"><?php echo $hotel_name ?></h5>
                            <p class="m-0"> <?php echo $hotel_subcity.', '.$hotel_city ?> </p>



                            <p> <strong> <?php echo $room_type_name.', '.$room_type_max_guest ?></strong> </p>

                            <hr class="mt-1">

                            <div class="row">
                                <div class="col">
                                    <p style="text-align: left;"> Room</p>
                                    <p style="text-align: left;"> Taxes</p>
                                </div>
                                <div class="col">
                                    <p style="text-align: right;"> <?php echo $room_type_price ?></p>
                                    <p style="text-align: right;"> $0.0</p>
                                </div>
                            </div>

                            <div class="bg-light p-3">
                                <div class="row">
                                    <div class="col">
                                        <p class="text-align: left"> <strong>Total price </strong> </p>
                                    </div>
                                    <div class="col">
                                        <h5 style="text-align: right;"> <strong> <?php echo $room_type_price ?>
                                            </strong> </h5>
                                        <p style="text-align: right;"> Including taxes</p>
                                    </div>
                                </div>
                            </div>

                            <div class="p-3">
                                <div class="row">
                                    <p class="text-align: left"> <strong>Payment schedule</strong> </p>
                                    <div class="col">
                                        <p class="text-align: left"> Due now</p>
                                        <p class="text-align: left">Due at Property </p>
                                    </div>
                                    <div class="col">
                                        <p style="text-align: right;"> <strong>$0</strong> </p>
                                        <p style="text-align: right;"> <strong><?php echo $room_type_price ?>
                                            </strong> </p>
                                    </div>
                                </div>
                            </div>



                        </div>


                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <!-- Step 3: Reservation Card Detail -->
                    <div class="bg-white p-3 mt-2">
                        <i class="fa fa-user mx-3" style="font-size: 25px" aria-hidden="true"></i>
                        <h4 style="display: inline;"> <strong> Step 3: Reservation Card Detail (Optional) </strong>
                        </h4>
                        <hr>
                        <!-- Payment -->
                        <div class="row">
                            <div class="col-md-5 mx-3">
                                <!-- First name -->
                                <div>
                                    <label for="firstname_credit" class="form-label m-0">
                                        <strong>Firstname</strong> </label>
                                    <input type="text" class="form-control" id="firstname_credit"
                                        placeholder="Enter firstname" name="firstname_credit">
                                </div>

                                <!-- Last name -->
                                <div class="mt-3">
                                    <label for="lastname_credit" class="form-label m-0">
                                        <strong>Lastname</strong></label>
                                    <input type="text" class="form-control" id="lastname_credit"
                                        placeholder="Enter lastname" name="lastname_credit">
                                </div>

                                <!-- Card number -->
                                <div class=" mt-3">
                                    <label for="cardnumber" class="form-label m-0"> <strong>Card
                                            Number</strong></label>
                                    <input type="number" class="form-control" id="cardnumber"
                                        placeholder="0000 0000 0000 0000" name="cardnumber">
                                </div>

                                <!-- Expiry Date -->
                                <div class="col-6 mt-3">
                                    <label for="expiry" class="form-label m-0"> <strong>Expiry Date</strong>
                                    </label>

                                    <div class="row">
                                        <div class="col">
                                            <input type="number" class="form-control" id="expiryMonth" placeholder="MM"
                                                name="expiryMonth">
                                        </div>
                                        /
                                        <div class="col">
                                            <input type="number" class="form-control" id="expiryYear" placeholder="YY"
                                                name="expiryYear">
                                        </div>
                                    </div>

                                </div>

                                <!-- Security Code-->
                                <div class="col-6 mt-3">
                                    <label for="securityCode" class="form-label m-0"> <strong>Security
                                            Code</strong> </label>

                                    <input type="number" class="form-control" id="securityCode" placeholder="000"
                                        name="securityCode">

                                </div>
                            </div>

                            <div class="col-md-6 mx-2">
                                <p class="alert alert-success"> This guarantees your booking, you don’t pay now.
                                </p>
                                <p> <strong> The hotel accepts the following payment methods </strong> </p>
                                <i class="fa fa-cc-visa text-primary m-2" style="font-size: 30px"
                                    aria-hidden="true"></i>
                                <i class="fa fa-cc-mastercard text-primary m-2" style="font-size: 30px"
                                    aria-hidden="true"></i>

                                <!-- You can count on us -->
                                <div class="p-3 border border-secondary rounded">
                                    <h5>You can count on us</h5>
                                    <i class="fa fa-check text-success m-2" style="font-size: 30px" aria-hidden="true">
                                    </i> <span> We use secure transmission </span> <br>

                                    <i class="fa fa-check text-success m-2" style="font-size: 30px" aria-hidden="true">
                                    </i><span> We protect your personal information</span>
                                </div>


                            </div>
                        </div>

                        <p class="alert alert-success m-3"> Your card won’t be charged - it’s only needed to
                            guarantee your booking </p>
                        <hr>
                        <i class="fa fa-file-text-o mx-2" style="font-size: 30px;" aria-hidden="true"></i>
                        <h5 style="display: inline;"> <strong>Billing address</strong> </h5>

                        <!-- Select Country -->
                        <div class="col-4 p-3">
                            <!-- Select Country -->
                            <label for="country">Country <span class="text-danger">*</span> </label>
                            <select name="country" class="form-control" id="country" required>
                                <option value="0" label="Billing Address Country... " selected="selected">Billing
                                    Address Country...
                                </option>
                                <optgroup id="country-optgroup-Africa" label="Africa">
                                    <option value="DZ" label="Algeria">Algeria</option>
                                    <option value="AO" label="Angola">Angola</option>
                                    <option value="BJ" label="Benin">Benin</option>
                                    <option value="BW" label="Botswana">Botswana</option>
                                    <option value="BF" label="Burkina Faso">Burkina Faso</option>
                                    <option value="BI" label="Burundi">Burundi</option>
                                    <option value="CM" label="Cameroon">Cameroon</option>
                                    <option value="CV" label="Cape Verde">Cape Verde</option>
                                    <option value="CF" label="Central African Republic">Central African Republic
                                    </option>
                                    <option value="TD" label="Chad">Chad</option>
                                    <option value="KM" label="Comoros">Comoros</option>
                                    <option value="CG" label="Congo - Brazzaville">Congo - Brazzaville</option>
                                    <option value="CD" label="Congo - Kinshasa">Congo - Kinshasa</option>
                                    <option value="CI" label="Côte d’Ivoire">Côte d’Ivoire</option>
                                    <option value="DJ" label="Djibouti">Djibouti</option>
                                    <option value="EG" label="Egypt">Egypt</option>
                                    <option value="GQ" label="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="ER" label="Eritrea">Eritrea</option>
                                    <option value="ET" label="Ethiopia">Ethiopia</option>
                                    <option value="GA" label="Gabon">Gabon</option>
                                    <option value="GM" label="Gambia">Gambia</option>
                                    <option value="GH" label="Ghana">Ghana</option>
                                    <option value="GN" label="Guinea">Guinea</option>
                                    <option value="GW" label="Guinea-Bissau">Guinea-Bissau</option>
                                    <option value="KE" label="Kenya">Kenya</option>
                                    <option value="LS" label="Lesotho">Lesotho</option>
                                    <option value="LR" label="Liberia">Liberia</option>
                                    <option value="LY" label="Libya">Libya</option>
                                    <option value="MG" label="Madagascar">Madagascar</option>
                                    <option value="MW" label="Malawi">Malawi</option>
                                    <option value="ML" label="Mali">Mali</option>
                                    <option value="MR" label="Mauritania">Mauritania</option>
                                    <option value="MU" label="Mauritius">Mauritius</option>
                                    <option value="YT" label="Mayotte">Mayotte</option>
                                    <option value="MA" label="Morocco">Morocco</option>
                                    <option value="MZ" label="Mozambique">Mozambique</option>
                                    <option value="NA" label="Namibia">Namibia</option>
                                    <option value="NE" label="Niger">Niger</option>
                                    <option value="NG" label="Nigeria">Nigeria</option>
                                    <option value="RW" label="Rwanda">Rwanda</option>
                                    <option value="RE" label="Réunion">Réunion</option>
                                    <option value="SH" label="Saint Helena">Saint Helena</option>
                                    <option value="SN" label="Senegal">Senegal</option>
                                    <option value="SC" label="Seychelles">Seychelles</option>
                                    <option value="SL" label="Sierra Leone">Sierra Leone</option>
                                    <option value="SO" label="Somalia">Somalia</option>
                                    <option value="ZA" label="South Africa">South Africa</option>
                                    <option value="SD" label="Sudan">Sudan</option>
                                    <option value="SZ" label="Swaziland">Swaziland</option>
                                    <option value="ST" label="São Tomé and Príncipe">São Tomé and Príncipe</option>
                                    <option value="TZ" label="Tanzania">Tanzania</option>
                                    <option value="TG" label="Togo">Togo</option>
                                    <option value="TN" label="Tunisia">Tunisia</option>
                                    <option value="UG" label="Uganda">Uganda</option>
                                    <option value="EH" label="Western Sahara">Western Sahara</option>
                                    <option value="ZM" label="Zambia">Zambia</option>
                                    <option value="ZW" label="Zimbabwe">Zimbabwe</option>
                                </optgroup>
                                <optgroup id="country-optgroup-Americas" label="Americas">
                                    <option value="AI" label="Anguilla">Anguilla</option>
                                    <option value="AG" label="Antigua and Barbuda">Antigua and Barbuda</option>
                                    <option value="AR" label="Argentina">Argentina</option>
                                    <option value="AW" label="Aruba">Aruba</option>
                                    <option value="BS" label="Bahamas">Bahamas</option>
                                    <option value="BB" label="Barbados">Barbados</option>
                                    <option value="BZ" label="Belize">Belize</option>
                                    <option value="BM" label="Bermuda">Bermuda</option>
                                    <option value="BO" label="Bolivia">Bolivia</option>
                                    <option value="BR" label="Brazil">Brazil</option>
                                    <option value="VG" label="British Virgin Islands">British Virgin Islands
                                    </option>
                                    <option value="CA" label="Canada">Canada</option>
                                    <option value="KY" label="Cayman Islands">Cayman Islands</option>
                                    <option value="CL" label="Chile">Chile</option>
                                    <option value="CO" label="Colombia">Colombia</option>
                                    <option value="CR" label="Costa Rica">Costa Rica</option>
                                    <option value="CU" label="Cuba">Cuba</option>
                                    <option value="DM" label="Dominica">Dominica</option>
                                    <option value="DO" label="Dominican Republic">Dominican Republic</option>
                                    <option value="EC" label="Ecuador">Ecuador</option>
                                    <option value="SV" label="El Salvador">El Salvador</option>
                                    <option value="FK" label="Falkland Islands">Falkland Islands</option>
                                    <option value="GF" label="French Guiana">French Guiana</option>
                                    <option value="GL" label="Greenland">Greenland</option>
                                    <option value="GD" label="Grenada">Grenada</option>
                                    <option value="GP" label="Guadeloupe">Guadeloupe</option>
                                    <option value="GT" label="Guatemala">Guatemala</option>
                                    <option value="GY" label="Guyana">Guyana</option>
                                    <option value="HT" label="Haiti">Haiti</option>
                                    <option value="HN" label="Honduras">Honduras</option>
                                    <option value="JM" label="Jamaica">Jamaica</option>
                                    <option value="MQ" label="Martinique">Martinique</option>
                                    <option value="MX" label="Mexico">Mexico</option>
                                    <option value="MS" label="Montserrat">Montserrat</option>
                                    <option value="AN" label="Netherlands Antilles">Netherlands Antilles</option>
                                    <option value="NI" label="Nicaragua">Nicaragua</option>
                                    <option value="PA" label="Panama">Panama</option>
                                    <option value="PY" label="Paraguay">Paraguay</option>
                                    <option value="PE" label="Peru">Peru</option>
                                    <option value="PR" label="Puerto Rico">Puerto Rico</option>
                                    <option value="BL" label="Saint Barthélemy">Saint Barthélemy</option>
                                    <option value="KN" label="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                    <option value="LC" label="Saint Lucia">Saint Lucia</option>
                                    <option value="MF" label="Saint Martin">Saint Martin</option>
                                    <option value="PM" label="Saint Pierre and Miquelon">Saint Pierre and Miquelon
                                    </option>
                                    <option value="VC" label="Saint Vincent and the Grenadines">Saint Vincent and
                                        the
                                        Grenadines</option>
                                    <option value="SR" label="Suriname">Suriname</option>
                                    <option value="TT" label="Trinidad and Tobago">Trinidad and Tobago</option>
                                    <option value="TC" label="Turks and Caicos Islands">Turks and Caicos Islands
                                    </option>
                                    <option value="VI" label="U.S. Virgin Islands">U.S. Virgin Islands</option>
                                    <option value="US" label="United States">United States</option>
                                    <option value="UY" label="Uruguay">Uruguay</option>
                                    <option value="VE" label="Venezuela">Venezuela</option>
                                </optgroup>
                                <optgroup id="country-optgroup-Asia" label="Asia">
                                    <option value="AF" label="Afghanistan">Afghanistan</option>
                                    <option value="AM" label="Armenia">Armenia</option>
                                    <option value="AZ" label="Azerbaijan">Azerbaijan</option>
                                    <option value="BH" label="Bahrain">Bahrain</option>
                                    <option value="BD" label="Bangladesh">Bangladesh</option>
                                    <option value="BT" label="Bhutan">Bhutan</option>
                                    <option value="BN" label="Brunei">Brunei</option>
                                    <option value="KH" label="Cambodia">Cambodia</option>
                                    <option value="CN" label="China">China</option>
                                    <option value="GE" label="Georgia">Georgia</option>
                                    <option value="HK" label="Hong Kong SAR China">Hong Kong SAR China</option>
                                    <option value="IN" label="India">India</option>
                                    <option value="ID" label="Indonesia">Indonesia</option>
                                    <option value="IR" label="Iran">Iran</option>
                                    <option value="IQ" label="Iraq">Iraq</option>
                                    <option value="IL" label="Israel">Israel</option>
                                    <option value="JP" label="Japan">Japan</option>
                                    <option value="JO" label="Jordan">Jordan</option>
                                    <option value="KZ" label="Kazakhstan">Kazakhstan</option>
                                    <option value="KW" label="Kuwait">Kuwait</option>
                                    <option value="KG" label="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="LA" label="Laos">Laos</option>
                                    <option value="LB" label="Lebanon">Lebanon</option>
                                    <option value="MO" label="Macau SAR China">Macau SAR China</option>
                                    <option value="MY" label="Malaysia">Malaysia</option>
                                    <option value="MV" label="Maldives">Maldives</option>
                                    <option value="MN" label="Mongolia">Mongolia</option>
                                    <option value="MM" label="Myanmar [Burma]">Myanmar [Burma]</option>
                                    <option value="NP" label="Nepal">Nepal</option>
                                    <option value="NT" label="Neutral Zone">Neutral Zone</option>
                                    <option value="KP" label="North Korea">North Korea</option>
                                    <option value="OM" label="Oman">Oman</option>
                                    <option value="PK" label="Pakistan">Pakistan</option>
                                    <option value="PS" label="Palestinian Territories">Palestinian Territories
                                    </option>
                                    <option value="YD" label="People's Democratic Republic of Yemen">People's
                                        Democratic
                                        Republic of Yemen</option>
                                    <option value="PH" label="Philippines">Philippines</option>
                                    <option value="QA" label="Qatar">Qatar</option>
                                    <option value="SA" label="Saudi Arabia">Saudi Arabia</option>
                                    <option value="SG" label="Singapore">Singapore</option>
                                    <option value="KR" label="South Korea">South Korea</option>
                                    <option value="LK" label="Sri Lanka">Sri Lanka</option>
                                    <option value="SY" label="Syria">Syria</option>
                                    <option value="TW" label="Taiwan">Taiwan</option>
                                    <option value="TJ" label="Tajikistan">Tajikistan</option>
                                    <option value="TH" label="Thailand">Thailand</option>
                                    <option value="TL" label="Timor-Leste">Timor-Leste</option>
                                    <option value="TR" label="Turkey">Turkey</option>
                                    <option value="TM" label="Turkmenistan">Turkmenistan</option>
                                    <option value="AE" label="United Arab Emirates">United Arab Emirates</option>
                                    <option value="UZ" label="Uzbekistan">Uzbekistan</option>
                                    <option value="VN" label="Vietnam">Vietnam</option>
                                    <option value="YE" label="Yemen">Yemen</option>
                                </optgroup>
                                <optgroup id="country-optgroup-Europe" label="Europe">
                                    <option value="AL" label="Albania">Albania</option>
                                    <option value="AD" label="Andorra">Andorra</option>
                                    <option value="AT" label="Austria">Austria</option>
                                    <option value="BY" label="Belarus">Belarus</option>
                                    <option value="BE" label="Belgium">Belgium</option>
                                    <option value="BA" label="Bosnia and Herzegovina">Bosnia and Herzegovina
                                    </option>
                                    <option value="BG" label="Bulgaria">Bulgaria</option>
                                    <option value="HR" label="Croatia">Croatia</option>
                                    <option value="CY" label="Cyprus">Cyprus</option>
                                    <option value="CZ" label="Czech Republic">Czech Republic</option>
                                    <option value="DK" label="Denmark">Denmark</option>
                                    <option value="DD" label="East Germany">East Germany</option>
                                    <option value="EE" label="Estonia">Estonia</option>
                                    <option value="FO" label="Faroe Islands">Faroe Islands</option>
                                    <option value="FI" label="Finland">Finland</option>
                                    <option value="FR" label="France">France</option>
                                    <option value="DE" label="Germany">Germany</option>
                                    <option value="GI" label="Gibraltar">Gibraltar</option>
                                    <option value="GR" label="Greece">Greece</option>
                                    <option value="GG" label="Guernsey">Guernsey</option>
                                    <option value="HU" label="Hungary">Hungary</option>
                                    <option value="IS" label="Iceland">Iceland</option>
                                    <option value="IE" label="Ireland">Ireland</option>
                                    <option value="IM" label="Isle of Man">Isle of Man</option>
                                    <option value="IT" label="Italy">Italy</option>
                                    <option value="JE" label="Jersey">Jersey</option>
                                    <option value="LV" label="Latvia">Latvia</option>
                                    <option value="LI" label="Liechtenstein">Liechtenstein</option>
                                    <option value="LT" label="Lithuania">Lithuania</option>
                                    <option value="LU" label="Luxembourg">Luxembourg</option>
                                    <option value="MK" label="Macedonia">Macedonia</option>
                                    <option value="MT" label="Malta">Malta</option>
                                    <option value="FX" label="Metropolitan France">Metropolitan France</option>
                                    <option value="MD" label="Moldova">Moldova</option>
                                    <option value="MC" label="Monaco">Monaco</option>
                                    <option value="ME" label="Montenegro">Montenegro</option>
                                    <option value="NL" label="Netherlands">Netherlands</option>
                                    <option value="NO" label="Norway">Norway</option>
                                    <option value="PL" label="Poland">Poland</option>
                                    <option value="PT" label="Portugal">Portugal</option>
                                    <option value="RO" label="Romania">Romania</option>
                                    <option value="RU" label="Russia">Russia</option>
                                    <option value="SM" label="San Marino">San Marino</option>
                                    <option value="RS" label="Serbia">Serbia</option>
                                    <option value="CS" label="Serbia and Montenegro">Serbia and Montenegro</option>
                                    <option value="SK" label="Slovakia">Slovakia</option>
                                    <option value="SI" label="Slovenia">Slovenia</option>
                                    <option value="ES" label="Spain">Spain</option>
                                    <option value="SJ" label="Svalbard and Jan Mayen">Svalbard and Jan Mayen
                                    </option>
                                    <option value="SE" label="Sweden">Sweden</option>
                                    <option value="CH" label="Switzerland">Switzerland</option>
                                    <option value="UA" label="Ukraine">Ukraine</option>
                                    <option value="SU" label="Union of Soviet Socialist Republics">Union of Soviet
                                        Socialist Republics</option>
                                    <option value="GB" label="United Kingdom">United Kingdom</option>
                                    <option value="VA" label="Vatican City">Vatican City</option>
                                    <option value="AX" label="Åland Islands">Åland Islands</option>
                                </optgroup>
                                <optgroup id="country-optgroup-Oceania" label="Oceania">
                                    <option value="AS" label="American Samoa">American Samoa</option>
                                    <option value="AQ" label="Antarctica">Antarctica</option>
                                    <option value="AU" label="Australia">Australia</option>
                                    <option value="BV" label="Bouvet Island">Bouvet Island</option>
                                    <option value="IO" label="British Indian Ocean Territory">British Indian Ocean
                                        Territory</option>
                                    <option value="CX" label="Christmas Island">Christmas Island</option>
                                    <option value="CC" label="Cocos [Keeling] Islands">Cocos [Keeling] Islands
                                    </option>
                                    <option value="CK" label="Cook Islands">Cook Islands</option>
                                    <option value="FJ" label="Fiji">Fiji</option>
                                    <option value="PF" label="French Polynesia">French Polynesia</option>
                                    <option value="TF" label="French Southern Territories">French Southern
                                        Territories
                                    </option>
                                    <option value="GU" label="Guam">Guam</option>
                                    <option value="HM" label="Heard Island and McDonald Islands">Heard Island and
                                        McDonald Islands</option>
                                    <option value="KI" label="Kiribati">Kiribati</option>
                                    <option value="MH" label="Marshall Islands">Marshall Islands</option>
                                    <option value="FM" label="Micronesia">Micronesia</option>
                                    <option value="NR" label="Nauru">Nauru</option>
                                    <option value="NC" label="New Caledonia">New Caledonia</option>
                                    <option value="NZ" label="New Zealand">New Zealand</option>
                                    <option value="NU" label="Niue">Niue</option>
                                    <option value="NF" label="Norfolk Island">Norfolk Island</option>
                                    <option value="MP" label="Northern Mariana Islands">Northern Mariana Islands
                                    </option>
                                    <option value="PW" label="Palau">Palau</option>
                                    <option value="PG" label="Papua New Guinea">Papua New Guinea</option>
                                    <option value="PN" label="Pitcairn Islands">Pitcairn Islands</option>
                                    <option value="WS" label="Samoa">Samoa</option>
                                    <option value="SB" label="Solomon Islands">Solomon Islands</option>
                                    <option value="GS" label="South Georgia and the South Sandwich Islands">South
                                        Georgia and the South Sandwich Islands</option>
                                    <option value="TK" label="Tokelau">Tokelau</option>
                                    <option value="TO" label="Tonga">Tonga</option>
                                    <option value="TV" label="Tuvalu">Tuvalu</option>
                                    <option value="UM" label="U.S. Minor Outlying Islands">U.S. Minor Outlying
                                        Islands
                                    </option>
                                    <option value="VU" label="Vanuatu">Vanuatu</option>
                                    <option value="WF" label="Wallis and Futuna">Wallis and Futuna</option>
                                </optgroup>
                            </select>
                            <br>

                            <label for="postalcode">Postal Code (Optional)</label>
                            <input class="form-control" type="text" name="postalcode" id="postalcode">
                        </div>
                    </div>

                    <!-- Complete Booking -->
                    <div class="bg-white p-3 mt-2">
                        <div class="row">

                            <hr class="m-3">

                            <div>
                                <p> <strong>Nearly there! This is the final step. </strong> </p>
                                <i class="fa fa-check-circle text-success" aria-hidden="true"></i> <span> <strong>
                                        Fully refundable if plans change </strong> </span>
                                <br>

                                <i class="fa fa-check-circle text-success" aria-hidden="true"></i> <span> <strong>
                                        You’ll pay nothing today </strong> </span>

                                <p> <strong> Terms of Booking</strong> </p>
                                <p>By clicking "Complete booking", you agree you have read and accept our <a
                                        href="term_and_policy.php">Terms
                                        and Conditions </a>, <a href="term_and_policy.php"> Privacy Policy</a> and
                                    <a href="#">
                                        Government
                                        Travel Advice </a> .
                                </p>
                            </div>
                        </div>


                        <button class="btn btn-primary text-white" name="Submit" type="submit"> <i
                                class="fa fa-lock mx-3" aria-hidden="true"></i> <strong class=" h5"> Complete
                                Booking</strong>
                        </button>
                    </div>


                </div>

            </div>

        </form>

    </div>


    <?php
        include('footer.php');
        ?>


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

</html>