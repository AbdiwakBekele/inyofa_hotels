<?php
SESSION_START();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <title>List Your property</title>
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

    <div class="container">


        <div class="row">
            <div class="col-lg-7">
                <img src="images/travel.png" class="rounded" width="100%" height="450px" style="object-fit: cover;"
                    alt="travel">
            </div>

            <div class="col">
                <div class="m-4 mt-5">
                    <h4 class="text-primary"> <strong>Inyofa.com</strong> </h4>
                    <p>Reach the guests you want <br> Sign up for free and continue</p>
                    <div class="border rounded-4 p-5 shadow">
                        <h3> What would you like to list?</h3>
                        <div class="row">
                            <!-- Lodging -->
                            <a href="user_login.php" class="col-md" style="text-decoration: none;">
                                <div class=" border border-primary rounded-4 m-1 p-2  py-4" style="text-align: center;">

                                    <i class="fa fa-building text-primary" style="font-size: 40px;"
                                        aria-hidden="true"></i>
                                    <br>
                                    <br>
                                    <p>
                                        <strong>Lodging</strong>
                                    </p>
                                    <p style="font-size: 12px;">A hotel, motel or bed and breakfast</p>
                                </div>
                            </a>

                            <!-- Private Rental -->
                            <a href="user_login.php" class="col-md" style="text-decoration: none;">
                                <div class=" border border-primary rounded-4 m-1 p-2 py-4" style="text-align: center;">
                                    <i class="fa fa-home text-primary" style="font-size: 40px;" aria-hidden="true"></i>
                                    <br>
                                    <br>
                                    <p> <strong>Private Residence </strong> </p>
                                    <p style="font-size: 12px;">A private home, apartment, or vacation home</p>

                                </div>

                            </a>



                        </div>
                    </div>

                </div>

            </div>
        </div>

        <hr>
        <!-- Bring the right guests -->
        <div class="row" style="text-align: center;">

            <p class="h5"><strong> Bring the right guests within reach </strong> </p>
            <p style="font-size: 15px;"> Connect with millions of people whose purpose, taste and budget make your
                property the perfect place to stay </p>
            <br>
            <br>

            <!-- Acces Global -->
            <div class="col-md m-2 " style="text-align: center">
                <i class="fa fa-globe text-primary" style="font-size: 70px;" aria-hidden="true"></i>
                <p> <strong> Access a world of travelers </strong> </p>
                <p style="font-size: 15px;"> From long-range planners to last-minute bookers, bring travelers to
                    your door from around the world </p>
            </div>

            <!-- Attract -->
            <div class="col-md m-2 " style="text-align: center">
                <i class="fa fa-users text-primary" style="font-size: 70px;" aria-hidden="true"></i>
                <p> <strong> Attract you ideal guests </strong> </p>
                <p style="font-size: 15px;"> Book your ideal guests-travelers who delight in what you provide and
                    wnat to return again and again. </p>
            </div>

            <!-- Grow your business -->
            <div class="col-md m-2 " style="text-align: center">
                <i class="fa fa-briefcase text-primary" style="font-size: 70px;" aria-hidden="true"></i>
                <p> <strong> Grow your business </strong> </p>
                <p style="font-size: 15px;"> Make decisions based on real-time data, be more competitive & help
                    increase visibility and bookings.</p>
            </div>

        </div>

        <br>

    </div>

    <?php
        include('footer.php');
        ?>

</body>

</html>