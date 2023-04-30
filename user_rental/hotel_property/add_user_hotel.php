<?php

include "../../db.php";
SESSION_START();

if (!isset($_COOKIE['user_logged'])) {
    header('location: ../../user_login.php');
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
        <link rel="shortcut icon" type="image/x-icon" href="../../images/Logo-Icons.png" />
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
                        <li><a href="../rental_property/rental_list.php"><i class="fas fa-home"></i>
                                Your Rental</a>
                        </li>
                        <li><a href="hotel_list.php" class="text-warning"><i class="fas fa-building"></i>
                                Your Hotel</a>
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

                <!-- Content -->
                <div class="col-sm-12 col-md-8 offset-md-2">

                    <!-- Hotel_ Registration -->
                    <form class="was-validated bg-light border shadow p-3" action="add_user_hotel.php" method="POST"
                        enctype="multipart/form-data" name="form">

                        <!-- Database Insertion PHP Code -->
                        <?php
                        if (isset($_POST['Submit'])) {
                            $hotel_name = $_POST['hotel_name'];
                            $hotel_rating = $_POST['hotel_rating'];
                            $contact_address = $_POST['contact_address'];
                            $user_id = $_POST['user_id'];

                            $query = "INSERT INTO hotels (hotel_name, hotel_rating, contact_address, user_id)
                                                    VALUES ('$hotel_name', '$hotel_rating', '$contact_address', '$user_id')";

                            if (mysqli_query($con, $query)) {
                                $msg = "You have Successfully Registered a new Hotel!";
                                echo ' <div class="alert alert-success">' . $msg . '</div> ';
                            } else {
                                $msg = "Error Registering Hotel";
                                echo ' <div class="alert alert-danger"> ' . $msg . '</div> ';
                            }
                        }
                        ?>

                        <!-- Hotel Name Input -->
                        <div class="row mt-3">
                            <div class="form-group col-md-12">
                                <label for="hotel_name" class="form-label">
                                    <h6><b><i class="fas fa-hotel"></i> Hotel Name</b></h6>
                                </label>
                                <input type="text" class="form-control" name="hotel_name" id="hotel_name"
                                    placeholder="Enter Hotel Name" required>

                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <!-- Hotel Type -->
                            <div class="form-group mt-2 col-md-6 col-sm-12">
                                <label for="hotel_rating">
                                    <h6><b><i class="fas fa-envelope"></i> Hotel Type</b></h6>
                                </label>

                                <select class="form-control" name="hotel_rating" id="hotel_rating">

                                    <option value="1"> 1 Star </option>
                                    <option value="2"> 2 Star </option>
                                    <option value="3"> 3 Star </option>
                                    <option value="4"> 4 Star </option>
                                    <option value="5"> 5 Star </option>

                                </select>

                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>

                            <!-- Hotel Contant Address -->
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="contact_address" class="form-label">
                                    <h6><b><i class="fas fa-phone"></i> Contact Address</b></h6>
                                </label>
                                <input type="phone" class="form-control" name="contact_address" for="contact_address"
                                    placeholder="Hotel Contact Address" required>

                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md mt-3 mb-3">
                                <input type="hidden" name="user_id" value="<?php echo $user_id?>">
                                <button type="submit" name="Submit" class="btn btn-primary btn-large col-md-12"
                                    value="Submit">Add New Hotel</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <script src="../../icon/svg-with-js/js/fontawesome-all.js"></script>
        <script src="../../js/bootstrap.bundle.min.js"></script>
        <script src="../../js/jquery.min.js"></script>
        <script src="../../js/app/main.js"></script>
    </body>

</html>