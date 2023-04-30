<?php

include "../db.php";
SESSION_START();

if (!isset($_COOKIE['user_logged'])) {
    header('location: ../user_login.php');
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
        <link rel="shortcut icon" type="image/x-icon" href="../images/Logo-Icons.png" />
        <link rel="stylesheet" type="text/css" href="../icon/svg-with-js/css/fa-svg-with-js.css">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
            rel="stylesheet" />
    </head>

    <body>
        <!------ Header --------->
        <header id="top-header" class="bg-primary">
            <div class="top-tol">
                <ul>
                    <div id="logo">
                        <a><img src="../images/Logoo.png" alt="Inyofa.com" title="Inyofa.com"></a>
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
                        <li><a href="user_dashboard.php" class="text-warning"><i class="fas fa-list"></i> Dashboard</a>
                        </li>
                        <li><a href="rental_property/rental_list.php"><i class="fas fa-home"></i> Your Rental</a>
                        </li>
                        <li><a href="hotel_property/hotel_list.php"><i class="fas fa-building"></i> Your Hotel</a>
                        </li>
                        <li><a href="hotel_admin/user_admin_list.php"><i class="fas fa-users"></i> Hotel Admins</a>
                        </li>
                        <li><a href="update_profile.php"> <i class="fa fa-user" aria-hidden="true"></i> User
                                Profile</a>
                        </li>

                        <li><a href="logout_user.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log out</a>
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

                <div class='alert alert-secondary m-5 w-25'>
                    <h5>Total Properties: <strong> <?php echo $rental_count; ?> </strong> </h5>
                </div>

                <!-- Content -->
                <div class=" col-8 m-4">
                    <div class="border rounded-4 p-4 shadow">
                        <h3> What would you like to add?</h3>
                        <div class="row">
                            <!-- Lodging -->
                            <a href="hotel_property/add_user_hotel.php" class="col-md" style="text-decoration: none;">
                                <div class=" border border-primary rounded-4 m-1 p-2  py-4" style="text-align: center;">

                                    <i class="fa fa-building text-primary" style="font-size: 40px;"
                                        aria-hidden="true"></i>
                                    <br>
                                    <br>
                                    <p class="text-dark">
                                        <strong>Lodging</strong>
                                    </p>
                                    <p class="text-dark" style="font-size: 12px;">A hotel, motel or bed and breakfast
                                    </p>
                                </div>
                            </a>

                            <!-- Private Rental -->
                            <a href="rental_property/add_user_rental.php" class="col-md" style="text-decoration: none;">
                                <div class=" border border-primary rounded-4 m-1 p-2 py-4" style="text-align: center;">
                                    <i class="fa fa-home text-primary" style="font-size: 40px;" aria-hidden="true"></i>
                                    <br>
                                    <br>
                                    <p class="text-dark"> <strong>Private Residence </strong> </p>
                                    <p class="text-dark" style="font-size: 12px;">A private home, apartment, or vacation
                                        home</p>

                                </div>

                            </a>
                        </div>
                    </div>
                </div>


            </div>
        </div>


        <script src="../icon/svg-with-js/js/fontawesome-all.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/app/main.js"></script>
    </body>

</html>