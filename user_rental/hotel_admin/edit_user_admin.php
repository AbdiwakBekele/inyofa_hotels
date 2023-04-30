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
                        <li><a href="../hotel_property/hotel_list.php"><i class="fas fa-building"></i>
                                Your Hotel</a>
                        </li>
                        <li><a href="user_admin_list.php" class="text-warning"><i class="fas fa-users"></i>
                                Hotel Admins</a>
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

                    <!------ New Hotel Admin Form ------->

                    <form class="was-validated bg-light border shadow p-3" action="add_user_admin.php" method="POST"
                        enctype="multipart/form-data" name="form">

                        <!-- Database Insertion PHP Code -->
                        <?php

                    if (isset($_POST['Submit'])) {
                        $hotel_admin_name = $_POST['hotel_admin_name'];
                        $hotel_id = $_POST['hotel_id'];
                        $hotel_admin_email = $_POST['hotel_admin_email'];
                        $hotel_admin_password =  $_POST['hotel_admin_password'];
                        $confirm_hotel_admin_password =  $_POST['confirm_hotel_admin_password'];

                        if ($hotel_admin_password == $confirm_hotel_admin_password) {
                            $query = "INSERT INTO hotel_admin (hotel_admin_name, hotel_id, hotel_admin_email, hotel_admin_password)
                                                    VALUES ('$hotel_admin_name', '$hotel_id', '$hotel_admin_email', '$hotel_admin_password')";

                            if (mysqli_query($con, $query)) {
                                $msg = "You have Successfully Registered a new hotel Admin!";
                                echo '<div class="alert alert-success" >' . $msg . '</div>';
                            } else {
                                $msg = "Error Registering hotel admin";
                                echo '<div class="alert alert-danger" >' . $msg . '</div>';
                            }
                        } else {
                            $msg = "Password don't Match";
                            echo $msg;
                        }
                    }

                    ?>

                        <!-- Hotel Admin Full Name Input -->
                        <div class="row mt-3">
                            <div class="form-group col-md-12">
                                <label for="hotel_admin_name" class="form-label">
                                    <h6><b><i class="fas fa-user"></i> Hotel Admin Full Name</b></h6>
                                </label>
                                <input type="text" class="form-control" name="hotel_admin_name" id="hotel_admin_name"
                                    placeholder="Enter Hotel Admin Full Name" required>

                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <!-- Hotel Admin Email -->
                            <div class="form-group mt-2 col-md-6 col-sm-12">
                                <label for="hotel_admin_email">
                                    <h6><b><i class="fas fa-envelope"></i> Hotel Admin Email</b></h6>
                                </label>
                                <input type="text" class="form-control" name="hotel_admin_email" id="hotel_admin_email"
                                    placeholder="Enter hotel admin email" required>
                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>

                            <!-- Admin Assigned Hotel-->

                            <div class="form-group col-md-6 col-sm-12">
                                <label for="hotel_id" class="form-label">
                                    <h6><b><i class="fas fa-info-circle"></i> Assigned Hotel</b></h6>
                                </label>

                                <?php

                            echo "<select name='hotel_id' class='form-control' id='hotel_id' required> ";
                            echo "<option value='' selected>Choose...</option>";

                            $sql_hotels = "SELECT * FROM hotels WHERE user_id = '$user_id'";
                            $user_hotels = mysqli_query($con, $sql_hotels);

                            while ($r = mysqli_fetch_assoc($user_hotels)) {

                                echo "<option value = '{$r['hotel_id']}'";
                                echo ">{$r['hotel_name']}</option>";
                            }

                            echo "</select>";

                            ?>

                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <!-- Hotel Admin Password -->
                            <div class="form-group mt-2 col-md-6 col-sm-12">
                                <label for="hotel_admin_password">
                                    <h6><b><i class="fas fa-key"></i> Hotel Admin Password</b></h6>
                                </label>
                                <input type="password" class="form-control" name="hotel_admin_password"
                                    id="hotel_admin_password" placeholder="Enter hotel admin password" required>
                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>

                            <!-- Confirm Hotel Admin Password -->
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="confirm_hotel_admin_password" class="form-label">
                                    <h6><b><i class="fas fa-key"></i> Confirm Hotel Admin Password</b></h6>
                                </label>
                                <input type="password" class="form-control" name="confirm_hotel_admin_password"
                                    for="confirm_hotel_admin_password"
                                    placeholder="Enter confirm confirm_hotel_admin_password password" required>

                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md mt-3 mb-3">
                                <button type="submit" name="Submit" class="btn btn-primary btn-large col-md-12"
                                    value="Submit">Add New Hotel Admin</button>
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