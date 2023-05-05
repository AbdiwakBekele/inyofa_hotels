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

    <div style="text-align: center;">
        <strong>
            <h2>Term and Policy</h2>
        </strong>
        <hr>
        <div class="alert alert-primary"> Inyofa is made into your favorites </div>
    </div>

    <div class="container text-justify">
        <p> If you’re planning to go on vacation anytime soon, you’d be a fool not to check
            out Inyofa for a place to stay. Will be one of the biggest startup success stories in Africa, Inyofa
            will change the vacation rental game by allowing homeowners (or vacation, tourism in Africa ) to
            rent their hotels, room, their house, their apartment, or even their boat, to guests at a
            surprisingly low cost. </p>

        <br>
        <p>
            The inyofa.com website is created to assist customers in researching, finding and determining the
            availability of travel-related goods and services and to make legitimate reservations or otherwise
            transact business with suppliers, and for no other purposes.
        </p>
        <br>
        <h5 class="text-center">USE OF INYOFA.COM WEBSITE</h5>

        <p>This website is offered to you and is conditioned on your acceptance without modification of the
            conditions, terms and notices contained in these terms and conditions as they exist at the time of your
            relevant use of the website including when any travel reservation is made (as applicable). All use of
            your account by you and use by us of the information related to your account are subject to these terms
            and conditions. In addition, these terms and conditions (and any supplier rules and restrictions
            referenced below and/or made available to you before you complete any booking) apply to the offering and
            providing of services via this website. Your use of this website constitutes your agreement to all such
            conditions, terms and notices contained in these terms and conditions and it is your responsibility to
            familiarize yourself with these terms and conditions and any supplier rules and restrictions. If you do
            not agree with these terms and conditions, then you are not authorized to use this website. Inyofa.com
            may extend the benefit of the arrangements in these terms and conditions to affiliates which offer an
            online travel service.</p>

        <p>Inyofa.com reserves the right to change the terms, conditions, and notices contained in or referred to in
            these terms and conditions and under which this website/these services are offered at any time and
            suppliers may change supplier rules and restrictions referred to in these terms and conditions at any
            time, and you agree to accept and be bound by those terms that are in effect at the time of your
            relevant use of this website and its facilities including when any travel reservation is made by you (as
            applicable). These terms and conditions may not be changed by any unauthorized person, including
            employees of Inyofa.com.</p>
        <br>

        <p>
            We recommend you save or print a copy of these terms and conditions when making a booking/reservation,
            for reference.

            You warrant that you are at least 18 years of age (or the age of majority in your country) and possess
            the legal authority to enter into this agreement and to use this website in accordance with all terms,
            conditions and notices herein.

            You agree to be financially responsible for all of your use of this website (as well as for use of your
            account by others, including, without limitation, minors living with you), including that you shall be
            completely responsible for all charges, fees, duties, taxes and assessments arising out of your use of
            this website. You agree to supervise all usage of this website by minors under your name or account. You
            also warrant that all information supplied by you or members of your household in using this website is
            true and accurate.

        </p>


        <ul>
            <li>
                use this website or its contents for any commercial purpose, such as (but not limited to) making
                reservations for travel services or other products for the purposes of resale;
            </li>

            <li>
                access, monitor or copy any content or information of this website using any robot, spider, scraper
                or other automated means or any manual process for any purpose without express written permission of
                Inyofa.com;
            </li>

            <li>
                violate the restrictions in any robot exclusion headers on this website or bypass or circumvent
                other measures employed to prevent or limit access to this website;
            </li>
            <li>
                take any action that imposes, or may impose, in the discretion of Inyofa.com, an unreasonable or
                disproportionately large load on the Inyofa.com infrastructure;
            </li>

            <li>
                deep-link to any portion of this website (including, without limitation, the purchase path for any
                travel services) for any purpose without express written permission of Inyofa.com; or
            </li>

            <li>
                use this website for any purpose that is unlawful or prohibited by these terms and conditions.
            </li>
        </ul>

        <p>
            You agree that the travel services reservations facilities of this website shall be used only to make
            legitimate reservations or purchases for you or for another person for whom you are legally authorized
            to act. Without limitation, any speculative, false, or fraudulent reservation or any reservation in
            anticipation of demand is prohibited. You understand that overuse, suspicious activity, signs of fraud,
            or abuse of the travel services reservation facilities of this website may result in Inyofa.com
            cancelling any bookings associated with your name, email address, or account, and closing any associated
            Inyofa.com accounts. Inyofa.com may also cancel any bookings associated with your name, email address,
            or account, and close any associated Inyofa.com accounts if you have made multiple reservations on this
            website and Inyofa.com considers (acting reasonably) that any such reservation is for the purposes of
            reselling. If such reservations cancelled are non-refundable bookings, Inyofa.com reserves the right not
            to refund you for the cancelled reservations.
        </p>

        <p>
            If you have conducted any fraudulent activity, Inyofa.com reserves the right to take any necessary legal
            action and you may be liable for monetary losses to Inyofa.com, including litigation costs and damages.
        </p>

        <p>
            To contest the cancellation of a booking, or freezing or closure of an account, please contact customer
            service at the telephone and further details set out in the ‘contact us’ portal under ‘Support and FAQs’
            on the website.
        </p>

        <h5 class="text-center">ORDERS, PAYMENTS AND FEES </h5>

        <p class="text-justify">As mentioned above, hosts have complete control over who they allow to book their
            space. Hosts arerequired to confirm or deny a booking request from a guest within 24 hours. Furthermore,
            hosts are
            responsible for setting their per-night rates, cleaning fees, and security deposits (if they choose to
            require either of the later).</p>

        <p>Once a booking is confirmed, the guest pays whatever the total fee is, which may include taxes and
            cleaning fees. Inyofa.com then charges hosts 2 percent of the per-night rate for every booking, and
            collects between 6 and 10 percent of the total fare from the guest. (It is this pricing structure that
            allows Inyofa to let hosts list their spaces without paying a monthly or annual fee.)
        </p>

        <p>
            and if you’re a host, know that Inyofa will require you to file tax documents, so don’t think you can
            escape paying our happiness his due share of what you make from renting your space on Inyofa.
        </p>

        <h5 class="text-center"> CANCELLATIONS </h5>
        <p>
            Hosts have the ability to set their own cancellation policies, so make sure to know what that is if you
            think you may have to cancel a booking after it’s been confirmed. If, as a guest, you cancel a booking
            before it’s been confirmed, you’ll be charged nothing though a hold will be put on your credit card by
            Inyofa in the meantime.
        </p>

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