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

                        <a href="index.php" class="text-white mx-2 p-2 "
                            style="font-size: 15px; text-decoration: none;"><span
                                class="fa fa-home text-white mx-2"></span>Home </a>

                        <a href="rental.php" class="text-white mx-2 p-2"
                            style="font-size: 15px; text-decoration: none; "><span
                                class="fa fa-building text-white mx-2"></span>Rental </a>

                        <a href="flight.php" class="text-white mx-2 p-2  border border-white rounded-pill "
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
                        <a class="nav-link " href="flight_multicity.php">Multicity</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="flight_stopover.php">Stopover</a>
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

                <div class="mx-3">
                    <span class="text-success"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Stopover
                    </span>
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