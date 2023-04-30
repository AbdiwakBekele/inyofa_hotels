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

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
            rel="stylesheet" />

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
            <!-- Fetching Hotel Information PHP Code -->
            <?php
            include "db.php";
            
            // Amenities Filter
            function assignIconAmenities($amenities){
                $iconAmenities = '';

                if($amenities == "hot_tube"){
                    $iconAmenities = "fa fa-bath";

                }else if($amenities == "free_shuttle"){
                    $iconAmenities = "fa fa-bus";

                }else if($amenities == "spa"){
                    $iconAmenities = "fa fa-map-pin";

                }else if($amenities == "seaview"){
                    $iconAmenities = "fa fa-tint";

                }else if($amenities == "petfriendly"){
                    $iconAmenities = "fa fa-paw";

                }else if($amenities == "kitchen"){
                    $iconAmenities = "fa fa-fire";

                }else if($amenities == "free_wifi"){
                    $iconAmenities = "fa fa-wifi";

                }else if($amenities == "washer_and_dryer"){
                    $iconAmenities = "fa fa-share-square";

                }else if($amenities == "parking"){
                    $iconAmenities = "fa fa-car";

                }else if($amenities == "pool"){
                    $iconAmenities = "fa fa-check";

                }else if($amenities == "water_park"){
                    $iconAmenities = "fa fa-stumbleupon";

                }else if($amenities == "air_conditioned"){
                    $iconAmenities = "fa fa-contao";

                }else if($amenities == "electric_charge"){
                    $iconAmenities = "fa fa-plug";

                }else if($amenities == "outdoor_space"){
                    $iconAmenities = "fa fa-sign-out";

                }else if($amenities == "restaurant"){
                    $iconAmenities = "fa fa-cutlery";

                }else if($amenities == "cots"){
                    $iconAmenities = "fa fa-list-alt";

                }else if($amenities == "gym"){
                    $iconAmenities = "fa fa-cog";

                }else{
                    $iconAmenities = 'fa fa-check-square';
                }
                return $iconAmenities;
            }
            
            if (isset($_REQUEST['hotel_id'])) {
                $hotel_id = intval($_REQUEST['hotel_id']);

                $q_hotels = "SELECT * FROM hotels where hotel_id = '$hotel_id' ";
                $q_result = mysqli_query($con, $q_hotels);

                while ($row = mysqli_fetch_assoc($q_result)) {
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
                    $hotel_map = $row['hotel_map'];
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
                <div class="carousel-inner" style="height: 300px;">
                    <div class="carousel-item active">
                        <img src="hotels_image/<?php echo $hotel_img1; ?>" alt="<?php echo $hotel_name; ?>"
                            class="d-block" style="width:100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="carousel-item">
                        <img src="hotels_image/<?php echo $hotel_img2; ?>" alt="<?php echo $hotel_name; ?>"
                            class="d-block" style="width:100%;">
                    </div>
                    <div class=" carousel-item">
                        <img src="hotels_image/<?php echo $hotel_img3; ?>" alt="<?php echo $hotel_name; ?>"
                            class="d-block" style="width:100%;">
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
            <nav class="navbar navbar-expand bg-white navbar-light sticky-top justify-content-center">
                <div class="container-fluid">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-black" href="#overview"> <strong>Overview</strong> </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="#rooms"><strong>Rooms</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="#location"><strong>Location</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="#amenities"><strong>Amenities</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="#policies"><strong>Policies</strong></a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Hotel Information -->
            <div id="overview" class="row mb-2 bg-white px-5 mt-1">
                <!-- Hotel Descriptoin -->
                <div class="col-lg-8">
                    <br>
                    <h3> <strong> <?php echo $hotel_name; ?></strong></h3>
                    <p style="margin-top: -7px; font-size: 15px"><?php echo $hotel_rating; ?> star properties</p>
                    <p style="margin-top: -17px; font-size: 15px"> <?php echo $hotel_city.', '. $hotel_subcity ?> </p>

                    <h4 style="font-size: 15px; color: black">
                        <strong><?php echo $hotel_rating.' / 5' ?> <i class="fa fa-star text-warning"
                                aria-hidden="true"></i></strong> Very Good
                    </h4>

                    <h5 class="my-3"> <strong> Popular Amenities </strong></h5>
                    <div class="row">
                        <div class="col">
                            <i class="fa fa-car my-2" aria-hidden="true">
                                <p class=" mx-2" style="display: inline"> Free parking </p>
                            </i>
                            <br>
                            <i class="fa fa-wifi my-3" aria-hidden="true">
                                <p class=" mx-2" style="display: inline"> Free Wifi </p>
                            </i>
                            <br>
                            <i class="fa fa-bus my-2" aria-hidden="true">
                                <p class=" mx-2" style="display: inline"> Airport transfer </p>
                            </i>
                        </div>

                        <div class="col">
                            <i class="fa fa-cutlery my-2" aria-hidden="true">
                                <p class=" mx-2" style="display: inline"> Restourant </p>
                            </i>
                            <br>
                            <i class="fa fa-glass my-3" aria-hidden="true">
                                <p class=" mx-2" style="display: inline"> Bar </p>
                            </i>
                            <br>
                            <i class="fa fa-shopping-cart my-2" aria-hidden="true">
                                <p class=" mx-2" style="display: inline"> Shopping </p>
                            </i>
                        </div>
                    </div>
                </div>
                <!-- Hotel Map -->
                <div class="col-lg-4 my-2">
                    <br>
                    <iframe src="<?php echo $hotel_map?>" width="100%" height="200" style="border:0;" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <!-- Rooms -->
            <div class="row">
                <?php
            
                $q_room_type = "SELECT * FROM room_type where hotel_id = '$hotel_id' ";
                $q_rt_result = mysqli_query($con, $q_room_type);

                while ($rt = mysqli_fetch_assoc($q_rt_result)) {
                    $room_type_id = $rt['room_type_id'];
                    $room_type_name = $rt['room_type_name'];
                    $room_type_max_guest = $rt['room_type_max_guest'];
                    $room_beds = $rt['room_beds'];
                    // $room_beds = "";
                    $room_type_price = $rt['room_type_price'];
                    $room_type_size = $rt['room_type_size'];
                    // $room_type_size = "";
                    $room_amenities = explode(',', $rt['room_amenities']);
                    $room_type_description = $rt['room_type_description'];
                    $room_img = $rt['room_img'];
                ?>
                <!-- Room 1 -->
                <div class="col-md-4 mt-2">
                    <!-- Image -->
                    <div id="<?php echo "_".$room_type_id;?>" class=" carousel slide " data-bs-ride="carousel">
                        <!-- The slideshow/carousel -->
                        <div class="carousel-inner" style="height:150px;">
                            <div class="carousel-item active">
                                <img src="hotels_image/<?php echo $hotel_img1; ?>" alt="<?php echo $hotel_name; ?>"
                                    class="d-block" style="width:100%">
                            </div>
                            <div class="carousel-item">
                                <img src="hotels_image/<?php echo $hotel_img2; ?>" alt="<?php echo $hotel_name; ?>"
                                    class="d-block" style="width:100%">
                            </div>
                            <div class=" carousel-item">
                                <img src="hotels_image/<?php echo $hotel_img3; ?>" alt="<?php echo $hotel_name; ?>"
                                    class="d-block" style="width:100%">
                            </div>
                        </div>

                        <!-- Left and right controls/icons -->
                        <button class=" carousel-control-prev" type="button"
                            data-bs-target="#<?php echo "_".$room_type_id;?>" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"> </span>
                        </button>
                        <button class="carousel-control-next" type="button"
                            data-bs-target="#<?php echo "_".$room_type_id;?>" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>

                    <!-- Room Detail -->
                    <div class="bg-white p-2">
                        <h5 class="my-1"> <strong> <?php echo $room_type_name ?></strong> </h5>
                        <div class="m-2">
                            <i class="fa fa-pencil-square-o mx-1" aria-hidden="true"></i>
                            <p style="display: inline"> <?php echo $room_type_size.' sq. m';  ?></p>
                        </div>

                        <div class="m-2">
                            <i class="fa fa-bed mx-1" aria-hidden="true"></i>
                            <p style="display: inline"> <?php echo $room_beds.' beds';  ?></p>
                        </div>

                        <div class="m-2">
                            <i class="fa fa-users mx-1" aria-hidden="true"></i>
                            <p style="display: inline"> <?php echo $room_type_max_guest.' maximum guest ';  ?></p>
                        </div>

                        <!-- Room Amenities -->
                        <div class="collapse" id="<?php echo "collapse_".$room_type_id;?>">
                            <?php

                            for($i = 0; $i<count($room_amenities); $i++ ){
                                if($room_amenities[$i] != "NaN" ){
                                    $icon = assignIconAmenities($room_amenities[$i]);

                                    ?>
                            <div class="m-2">
                                <i class="<?php echo $icon; ?> mx-1" aria-hidden="true"></i>
                                <p style="display: inline"> <?php echo $room_amenities[$i];  ?></p>
                            </div>

                            <?php
                                }
                            }
                            ?>
                        </div>

                        <!-- Collapse Amenities -->
                        <a href="<?php echo "#collapse_".$room_type_id;?>" data-bs-toggle="collapse"
                            class="text-primary">
                            <h6>more amenities ></h6>
                        </a>

                        <hr>
                        <h6 class="my-1"> <strong> Cancellation policy</strong> </h6>
                        <p><strong> <a href="#policies"> More details on all policy options </a> </strong></p>

                        <!-- Refundable Option -->
                        <div class="row">
                            <div class="col">
                                <input type="radio" id="val1" name="refund" value="non-refundable">
                                <label for="val1">Non-refundable</label>
                                <br>

                                <input type="radio" class="mt-2" id="val2" name="refund" value="refundable">
                                <label for="val2">Fully refundable</label><br>

                            </div>

                            <div class="col">
                                <p for="val1" style="text-align: right; "> <strong> +$0.0 </strong> </p>
                                <p for="val2" style="text-align: right; margin-top: -10px"> <strong> +$5.0 </strong>
                                </p>
                            </div>
                        </div>

                        <br>
                        <br>

                        <h4> <strong> <?php echo '$'.$room_type_price;  ?> </strong> </h4>
                        <div class="row">
                            <div class="col">
                                <strong> Price details</strong>
                                <p> <?php echo '$'.$room_type_price;  ?> total</p>
                                <p style="margin-top: -20px;"> included taxes & fees</p>

                            </div>
                            <div class="col mt-3">
                                <?php  
                                    $sql_room = "SELECT * FROM room WHERE room_type_id = '$room_type_id' and reserve_status = 'NO' ";
                                    $sql_result = mysqli_query($con, $sql_room);
                                    $room_count = mysqli_num_rows($sql_result);

                                    $btn_state = ($room_count > 0) ? "" : "disabled";
                                    
                                ?>

                                <p class="text-danger mx-3" style="text-align: right;">We have
                                    <?php echo $room_count; ?> left</p>
                                <a href="book.php?room_type_id=<?php echo $room_type_id; ?>"
                                    class="btn btn-primary form-control form-control-lg rounded-pill <?php echo $btn_state ?>  ">
                                    <strong> Reserve </strong>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

                <?php
            }
            ?>

            </div>

            <!-- About this Area -->
            <div id="location" class="row mt-3 bg-white p-3">
                <div class="col-md-4">
                    <h3> <strong> About this area </strong> </h3>
                </div>

                <div class="col-md-8">
                    <iframe src="<?php echo $hotel_map?>" width="100%" height="450" style="border:0;" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <hr>
                    <div class="row">

                        <div class="col">
                            <i class="fa fa-map-marker mx-3" style="font-size: 25px;" aria-hidden="true"></i>
                            <h4 style="display: inline;"> <strong> What's nearby </strong> </h4>
                            <p class="mx-5"><?php echo $about_the_area;  ?></p>
                            <br>
                        </div>

                    </div>

                </div>

            </div>

            <!-- About this property -->
            <div class="row mt-3 bg-white p-3">

                <div class="row">
                    <div class="col-md-4">
                        <h3> <strong> About this Property </strong> </h3>
                    </div>

                    <div class="col-md-8">
                        <h4> <?php echo $hotel_name; ?> </h4>
                        <p> <?php echo $about_the_property; ?> </p>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-md-4">
                        <h3> <strong> Cleaning and Safety Practices </strong> </h3>
                    </div>

                    <div class="col-md-8">
                        <!-- Enhanced Cleanliness -->
                        <i class="fa fa-magic mx-2" aria-hidden="true"></i>
                        <h4 style="display: inline"> <strong> Enhanced Cleanliness measures </strong> </h4>
                        <div class="mx-5">
                            <p><?php echo $clean_and_safety; ?></p>
                        </div>
                        <br>
                    </div>

                </div>
            </div>

            <!-- At a glance -->
            <div class="row mt-3 bg-white p-3">

                <!-- At a glace -->
                <div class="col-md-4">
                    <h3> <strong> At a glance </strong> </h3>
                </div>

                <!-- Col 2 -->
                <div class="col-md-4">
                    <!-- Hotel size -->
                    <i class="fa fa-check mx-2" aria-hidden="true"></i>
                    <h4 style="display: inline"> <strong>Hotel size</strong> </h4>
                    <div class="mx-5">
                        <p> <?php echo $hotel_size; ?></p>
                    </div>

                    <!-- Arriving/ Leaving -->
                    <i class="fa fa-check mx-2" aria-hidden="true"></i>
                    <h4 style="display: inline"> <strong>Arriving/Leaving</strong> </h4>
                    <div class="mx-5">
                        <p> <?php echo $arrival_and_leaving; ?> </p>
                    </div>


                    <!-- Restrictions related to your trip -->
                    <i class="fa fa-check mx-2" aria-hidden="true"></i>
                    <h4 style="display: inline"> <strong>Restrictions related to your trip</strong> </h4>
                    <p class="mx-5"> <?php echo $restriction_related; ?></p>

                    <!-- Special check-in instructions -->
                    <i class="fa fa-check mx-2" aria-hidden="true"></i>
                    <h4 style="display: inline"> <strong>Special check-in instructions</strong> </h4>
                    <div class="mx-5">
                        <p> <?php echo $special_checkin; ?> </p>
                    </div>
                </div>

                <!-- Col 3 -->
                <div class="col-md-4">
                    <!--Required at check-in -->
                    <i class="fa fa-check mx-2" aria-hidden="true"></i>
                    <h4 style="display: inline"> <strong>Required at check-in</strong> </h4>
                    <div class="mx-5">
                        <p> <?php echo $required_documents; ?> </p>
                    </div>

                    <!-- Children -->
                    <i class="fa fa-check mx-2" aria-hidden="true"></i>
                    <h4 style="display: inline"> <strong>Children</strong> </h4>
                    <div class="mx-5">
                        <p> <?php echo $children_and_pet; ?> </p>
                    </div>

                    <!-- Pets -->
                    <i class="fa fa-check mx-2" aria-hidden="true"></i>
                    <h4 style="display: inline"> <strong>Pets</strong> </h4>
                    <div class="mx-5">
                        <p> <?php echo $children_and_pet; ?> </p>
                    </div>

                    <!-- Internet -->
                    <i class="fa fa-wifi mx-2" aria-hidden="true"></i>
                    <h4 style="display: inline"> <strong>Internet</strong> </h4>
                    <div class="mx-5">
                        <p> <?php echo $internet_and_parking; ?> </p>
                    </div>

                    <!-- Transfers -->
                    <i class="fa fa-check mx-2" aria-hidden="true"></i>
                    <h4 style="display: inline"> <strong>Transfers</strong> </h4>
                    <div class="mx-5">
                        <p> <?php echo $transfer_and_others; ?> </p>
                    </div>
                </div>

            </div>

            <!-- Property Amenities -->
            <div id="amenities" class="row mt-3 bg-white p-3">

                <!-- Property Amenities -->
                <div class="col-md-4">
                    <h3> <strong> Property amenities </strong> </h3>
                </div>

                <div class="col-md-6">
                    <div class="row">




                        <?php

                        for ($i = 0; $i < count($hotel_amenities); $i++) {
                            if ($hotel_amenities[$i] != "NaN") {
                                $icon = assignIconAmenities($hotel_amenities[$i]);

                                ?>

                        <div class="col-6 my-3">
                            <i class="<?php echo $icon; ?> mx-2" aria-hidden="true"></i>
                            <h5 style="display: inline;"> <?php echo ucfirst($hotel_amenities[$i]) ; ?> </h5>
                        </div>
                        <?php

                            }
                        }
                        
                        ?>
                    </div>


                </div>

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
                        <p> <?php echo $fees_and_policies ?> </p>
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
        <!-- <script src="icon/svg-with-js/js/fontawesome-all.js"></script> -->
        <!-- <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script> -->
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