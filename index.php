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
        <br>

        <div class="container px-md-5">
            <!-- Checkin form -->

            <form id="myform" class="form-inline" action="listing.php#sort_section" method="post">
                <!-- Location -->
                <p class="h3 text-dark"> <strong>Where to?</strong> </p>
                <div class="row">
                    <div class="col-md mt-2">
                        <input type="text" name="location"
                            class="form-control form-control-lg border border-dark icon_location"
                            placeholder="Going to..." required>
                    </div>

                    <!-- Checkin Date -->
                    <div class="col-md mt-2">
                        <input type="date" id="checkin"
                            class="form-control form-control-lg border border-dark icon_date" oninput="date_cal()"
                            min="1899-01-01" max="2030-13-13" value="2023-04-13">
                        </input>
                        <label for="checkin" class="px-2">Check-In</label>
                    </div>

                    <!-- Checkout Date -->
                    <div class="col-md mt-2">
                        <input type="date" id="checkout"
                            class="form-control form-control-lg border border-dark icon_date" min="1899-01-01"
                            max="2030-13-13" value="2023-04-13">
                        <label for="checkout" class="px-2">Check-Out</label>
                    </div>

                    <!-- Travellers -->
                    <div class="col-md mt-2 traveler-input">
                        <!-- <input type="text" class="form-control form-control-lg border border-dark icon_traveller"
                            placeholder="Travellers"> -->

                        <div id="traveler-btn"
                            class="traveler-btn icon_traveller form-control form-control-lg border border-dark "> <span
                                id="adult_tra">2</span>
                            Adults, <span id="child_tra">1</span> Children</div>
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

                                    <p id="add_room_btn" class="text-primary text-end "><strong> Add another rooom
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

                                    <p id="add_room_btn2" class="text-primary text-end "><strong> Add another rooom
                                        </strong></p>
                                    <p id="remove_room_btn2" class="text-primary text-end "><strong> Remove rooom
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

                                    <p id="add_room_btn3" class="text-primary text-end "><strong> Add another rooom
                                        </strong></p>
                                    <p id="remove_room_btn3" class="text-primary text-end "><strong> Remove rooom
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

                                    <p id="add_room_btn4" class="text-primary text-end "><strong> Add another rooom
                                        </strong></p>
                                    <p id="remove_room_btn4" class="text-primary text-end "><strong> Remove rooom
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

                    <!-- Search Button -->
                    <div class="col-md-1 mt-2">
                        <button style="border-radius: 25px;" type="submit" name="submit"
                            class="btn btn-primary btn- form-control form-control-lg">
                            <span class="las la-search"></span>
                        </button>
                    </div>

                </div>
            </form>

            <br>
        </div>


        <!-- Inyofa Makes Easy -->
        <div class="container px-md-5 mb-5 center">
            <h3 class="fw-bold text-center">inyofa.com makes it easy and rewarding. Always</h3>
            <div class="row mt-3">
                <!-- Reward Your Self -->
                <div class="col-md px-md-4">
                    <h6 class="text-center fw-bold">Reward yourself you way</h6>
                    <div class="row">
                        <div class="col ms-3">
                            <i class="fas fa-moon" style='font-size:30px;color: #3973ac'></i>
                        </div>
                        <div class="col-9">
                            <p class="text-start">Stay where you want, when you want, and get rewarded</p>
                            <a href="#"> Learn more about inyofa.com</a>
                        </div>
                    </div>
                </div>

                <!-- Unlock features -->
                <div class="col-md px-md-4">
                    <h6 class="text-center fw-bold">Unlock instant savings</h6>
                    <div class="row px-1">
                        <div class="col ms-3">
                            <i class="fas fa-bookmark" style='font-size:30px;color: #3973ac'></i>
                        </div>
                        <div class="col-10">
                            <p class="text-start">You could get an extra 10% off with member prices</p>
                            <a href="#">Sign up, it's free Sign in</a>
                        </div>
                    </div>
                </div>

                <!-- Free Cancellation -->
                <div class="col-md px-md-4">
                    <h6 class="text-center fw-bold">Free Cancellation</h6>
                    <div class="row">
                        <div class="col ms-3">
                            <i class="fas fa-calendar-alt" style='font-size:30px;color: #3973ac'></i>
                        </div>
                        <div class="col-10">
                            <p class="text-start">Flexible bookings on most hotels</p>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <hr class="container mt-5 ">

        <!-- Explore Ethiopia -->
        <div class="container mt-5 p-5">

            <h3 style="text-align: center;"> <strong>Explore Ethiopia</strong> </h3>

            <div class="row">
                <div class="card col-md m-3" style="width:270px">
                    <a href="listing.php">
                        <img class="card-img-top" src="images/ethiopia/axsum.jpg" alt="Card image" style="width:100%">
                    </a>

                    <div class="card-body">
                        <h5 class="card-title">King Ezana's Stela (Aksum)</h5>
                        <p class="card-text">The ancient kingdom of Aksum was located in present-day Ethiopia.</p>

                    </div>
                </div>

                <div class="card col-md m-3" style="width:270px">
                    <a href="listing.php">
                        <img class="card-img-top" src="images/ethiopia/gonder.jpg" alt=" Card image" style="width:100%">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Fasil Ghebbi</h5>
                        <p class="card-text"> fortress located in Gondar, Amhara Region, Ethiopia.</p>

                    </div>
                </div>

                <div class="card col-md-3 m-3" style="width:270px">
                    <a href="listing.php">
                        <img class="card-img-top" src="images/ethiopia/lalibela.jpg" alt="Card image"
                            style="width:100%">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Lalibela</h5>
                        <p class="card-text">A tourist site for its famous rock-cut monolithic churches.</p>

                    </div>
                </div>

                <div class="card col-md-3 m-3" style="width:270px">
                    <a href="listing.php">
                        <img class="card-img-top" src="images/ethiopia/waterfall.jpg" alt="Card image"
                            style="width:100%">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Blue Nile Falls</h5>
                        <p class="card-text">One of Ethiopia's best-known tourist attractions.</p>

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
                    <a href="listing.php">
                        <img class="card-img-top" src="images/addisababa.png" alt="Card image" style="width:100%">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Addis Ababa</h5>
                        <p>Addis Ababa, Ethiopia</p>
                    </div>
                </div>

                <div class="card col-md-3 m-3" style="width:280px">
                    <a href="listing.php">
                        <img class="card-img-top" src="images/hawasa.png" alt=" Card image" style="width:100%">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Hawasa</h5>
                        <p>Hawasa city, Ethiopia</p>

                    </div>
                </div>

                <div class="card col-md-3 m-3" style="width:280px">
                    <a href="listing.php">
                        <img class="card-img-top" src="images/newyork.png" alt="Card image" style="width:100%">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">New york</h5>
                        <p class="card-text">Newyork, USA </p>

                    </div>
                </div>

                <div class="card col-md-3 m-3" style="width:280px">
                    <a href="listing.php">
                        <img class="card-img-top" src="images/paris.png" alt="Card image" style="width:100%">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Paris</h5>
                        <p class="card-text">Paris, France</p>

                    </div>
                </div>
            </div>
        </div>
        <hr>

        <!-- Travel Around Africa -->
        <div class="container mt-5 p-5">
            <h3 style="text-align: center;"> <strong>Travel Around Africa</strong> </h3>
            <div class="row">
                <div class="card col-md-3 m-3" style="width:280px">
                    <a href="flight.php">
                        <img class="card-img-top" src="images/africa/capetown.jpg" alt="Card image" style="width:100%">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Cape Town</h5>
                        <p>Cape Town, South Africa</p>
                    </div>
                </div>

                <div class="card col-md-3 m-3" style="width:280px">
                    <a href="flight.php">
                        <img class="card-img-top" src="images/africa/stonetown.jpg" alt=" Card image"
                            style="width:100%">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Stone Town</h5>
                        <p>Stone Town, Tanzania</p>

                    </div>
                </div>

                <div class="card col-md-3 m-3" style="width:280px">
                    <a href="flight.php">
                        <img class="card-img-top" src="images/africa/marrakesh.jpg" alt="Card image" style="width:100%">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Marrakesh</h5>
                        <p class="card-text">Marrakesh, Morocco</p>

                    </div>
                </div>

                <div class="card col-md-3 m-3" style="width:280px">
                    <a href="flight.php">
                        <img class="card-img-top" src="images/africa/lamu.jpg" alt="Card image" style="width:100%">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">Lamu</h5>
                        <p class="card-text">Lamu, Kenya</p>

                    </div>
                </div>
            </div>
        </div>
        <hr>

        <!------ Rental Options ------>
        <section class="attraction-area pat-50 pab-50 px-5 px-md-5">
            <div class="container">
                <div class="section-title center-text">
                    <h3>Get Started by browsing property types</h3>
                    <div class="section-title-line"></div>
                </div>

                <div class="row mt-5">
                    <div class="col-12">
                        <div class="global-slick-init attraction-slider nav-style-one nav-color-two slider-inner-margin"
                            data-infinite="true" data-arrows="true" data-dots="false" data-slidesToShow="4"
                            data-swipeToSlide="true" data-autoplay="true" data-autoplaySpeed="2500"
                            data-prevArrow='<div class="prev-icon radius-parcent-50"><i class="las la-angle-left"></i></div>'
                            data-nextArrow='<div class="next-icon radius-parcent-50"><i class="las la-angle-right"></i></div>'
                            data-responsive='[{"breakpoint": 1400,"settings": {"slidesToShow": 4}},{"breakpoint": 1200,"settings": {"slidesToShow": 3}},{"breakpoint": 992,"settings": {"slidesToShow": 3}},{"breakpoint": 768,"settings": {"slidesToShow": 2}},{"breakpoint": 576, "settings": {"slidesToShow": 1} }]'>
                            <div class="attraction-item">
                                <div class="single-attraction-two radius-20">
                                    <div class="single-attraction-two-thumb">
                                        <a href="assets/img/attraction/appartment.jpg" class="gallery-popup">
                                            <img src="assets/img/attraction/appartment.jpg" alt="img">
                                        </a>
                                    </div>
                                    <div class="single-attraction-two-contents">
                                        <h4 class="single-attraction-two-contents-title">
                                            <a href="hotel_details.html"> Appartments </a>
                                        </h4>
                                        <p class="single-attraction-two-contents-para">Addis Ababa, Ethiopia</p>
                                    </div>
                                </div>
                            </div>
                            <div class="attraction-item">
                                <div class="single-attraction-two radius-20">
                                    <div class="single-attraction-two-thumb">
                                        <a href="assets/img/attraction/cottages.jpg" class="gallery-popup">
                                            <img src="assets/img/attraction/cottages.jpg" alt="img">
                                        </a>
                                    </div>
                                    <div class="single-attraction-two-contents">
                                        <h4 class="single-attraction-two-contents-title">
                                            <a href="hotel_details.html"> Cottages</a>
                                        </h4>
                                        <p class="single-attraction-two-contents-para"> Addis Ababa, Ethiopia </p>
                                    </div>
                                </div>
                            </div>
                            <div class="attraction-item">
                                <div class="single-attraction-two radius-20">
                                    <div class="single-attraction-two-thumb">
                                        <a href="assets/img/attraction/homestays.jpg" class="gallery-popup">
                                            <img src="assets/img/attraction/homestays.jpg" alt="img">
                                        </a>
                                    </div>
                                    <div class="single-attraction-two-contents">
                                        <h4 class="single-attraction-two-contents-title">
                                            <a href="hotel_details.html"> Homestays </a>
                                        </h4>
                                        <p class="single-attraction-two-contents-para"> Addis Ababa, Ethiopia</p>
                                    </div>
                                </div>
                            </div>
                            <div class="attraction-item">
                                <div class="single-attraction-two radius-20">
                                    <div class="single-attraction-two-thumb">
                                        <a href="assets/img/attraction/guest.jpg" class="gallery-popup">
                                            <img src="assets/img/attraction/guest.jpg" alt="img">
                                        </a>
                                    </div>
                                    <div class="single-attraction-two-contents">
                                        <h4 class="single-attraction-two-contents-title">
                                            <a href="hotel_details.html"> Guest Houses</a>
                                        </h4>
                                        <p class="single-attraction-two-contents-para"> Addis Ababa, Ethiopia.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="attraction-item">
                                <div class="single-attraction-two radius-20">
                                    <div class="single-attraction-two-thumb">
                                        <a href="assets/img/attraction/tiny.jpg" class="gallery-popup">
                                            <img src="assets/img/attraction/tiny.jpg" alt="img">
                                        </a>
                                    </div>
                                    <div class="single-attraction-two-contents">
                                        <h4 class="single-attraction-two-contents-title">
                                            <a href="hotel_details.html"> Tiny Houses</a>
                                        </h4>
                                        <p class="single-attraction-two-contents-para"> Addis Ababa, Ethiopia </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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

</html>