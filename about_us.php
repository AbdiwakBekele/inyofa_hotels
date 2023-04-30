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

        <div style="text-align: center;">
            <strong>
                <h2>About Us</h2>
            </strong>
            <hr>
            <div class="alert alert-primary"> Inyofa is made into your favorites </div>
        </div>

        <div class="container text-justify row m-4">

            <div class="col-md m-4">
                <img src="assets/img/logo_black.png" style="width: 60%" alt="image">
            </div>

            <div class="col-md">
                <p>
                    Inyofa is an online marketplace for booking hotels, guesthouses, resorts, tour guides
                    And we connect people who want to rent their homes to people who are looking for accommodation in
                    that
                    area.

                    We are proud to assist you with everything you need to plan your next trip, in Africa and All around
                    the world.

                    It's our pleasure to help you.
                    - In your favourite -
                </p>

            </div>


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