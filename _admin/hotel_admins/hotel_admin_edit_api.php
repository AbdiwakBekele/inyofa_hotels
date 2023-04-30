<?php

include "../../db.php";
SESSION_START();

if (!isset($_COOKIE['logged'])) {

    header('location: ../../a_login.php');
}

// Hotel Admin Query
$q_hotel_admin = "SELECT * FROM hotel_admin";
$q_hotel_admin_result = mysqli_query($con, $q_hotel_admin);
$hotel_admin_count = mysqli_num_rows($q_hotel_admin_result);
$hotel_admin_id;

$q_hotels = "SELECT * FROM hotels";
$q_hotels_result = mysqli_query($con, $q_hotels);

?>

<!DOCTYPE html>
<html lang="en-us" dir="ltr">

    <head>
        <meta http-equiv="Content-Type" content="text/html, charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Manage Hotel Admin</title>

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
        <header id="top-header" class="bg-success">
            <div class="top-tol">
                <ul>
                    <div id="logo">
                        <a><img src="../../images/Logoo.png" alt="Inyofa.com" title="Inyofa.com"></a>
                    </div>

                    <div class="dropdown myac">
                        <a id="a1" class="btn btn-outline-info dropdown-toggle" href="#" role="button" id="dpMLink"
                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                class="fas fa-user-circle"></i>&nbsp;<label>profile</label></a>

                        <ul class="dropdown-menu" aria-labelledby="dpMLink">
                            <li class="dropdown-item"><a href="update_profile.php"><i class="fas fa-user-cog"></i>
                                    Update
                                    Profile</a></li>
                            <li class="dropdown-item"><a href="a_logout_ctrl.php"><i class="fas fa-sign-out-alt"></i>
                                    Logout</a>
                            </li>
                        </ul>
                    </div>

                </ul>
            </div>
        </header>

        <div class="wrapper d-flex align-items-stretch">
            <!------ Left Drawer --------->
            <nav id="sidebar">
                <div class="p-4 pt-5">
                    <div class="row">
                        <div class="col">
                            <a href="update_profile.php" class="img logo rounded-circle mb-5"
                                style="background-image: url(images/avatar.jpg);"><br><br><br><br><br>
                                <center>
                                    <h2>Admin</h2>
                                </center>
                            </a>
                        </div>
                    </div><br><br>

                    <!---- Left Dashboard Controller ---->
                    <ul class="list-unstyled components mb-5">
                        <li><a href="../index.php"><i class="fas fa-list"></i> Dashboard</a></li>
                        <li><a href="../hotels/a_manage_hotels.php"><i class="fas fa-hotel"></i> Manage Hotels</a></li>
                        <li><a href="../rentals/a_manage_rentals.php"><i class="fas fa-house"></i> Manage Rentals</a>
                        </li>
                        <li><a href="../rental_reservation/manage_rental_reservation.php"><i
                                    class="fas fa-file-text"></i>
                                Rentals Reservation</a></li>
                        <li><a href="a_manage_hotel_admins.php" class="text-warning"><i class="fas fa-users"></i> Manage
                                Hotel
                                Admins</a>
                        </li>
                        <li><a href="../users/a_manage_users.php"><i class="fas fa-users"></i> Manage Users</a></li>
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
                                            <h4 class="card-title"><i class="fas fa-tachometer-alt"></i> <strong>Edit
                                                    Hotel Admin</strong></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </nav>

                <!----- cards ----->
                <section class="mt-5">
                    <div class="row g-4">
                        <!----catagory widget---->
                        <div class="col-md-12">
                            <a href="#" class="col-md-3" style="text-decoration: none;">
                                <div class="card bg-warning text-dark">
                                    <div class="card-body">
                                        <h4><i class="fas fa-user"></i> Hotel Admins</h4>
                                        <hr>
                                        <h5>
                                            <b><?php echo $hotel_admin_count; ?></b>
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                </section>



                <div class="col-sm-12 col-md-8 offset-md-2">

                    <!------ Hotel Admin Form ------->

                    <form class="was-validated bg-light border shadow p-3" action="hotel_admin_edit_api.php"
                        method="POST" enctype="multipart/form-data" name="form">

                        <!-- Database Insertion PHP Code -->
                        <?php
                    if (isset($_POST['Submit'])) {
                        $hotel_admin_id = $_POST['hotel_admin_id'];
                        $hotel_admin_name = $_POST['hotel_admin_name'];
                        $hotel_admin_email = $_POST['hotel_admin_email'];
                        $hotel_id = $_POST['hotel_id'];
                        $hotel_admin_password = $_POST['hotel_admin_password'];
                        $confirm_hotel_admin_password = $_POST['confirm_hotel_admin_password'];

                        if ($hotel_admin_password == $confirm_hotel_admin_password) {
                            $query = "UPDATE hotel_admin SET hotel_admin_name = '$hotel_admin_name', hotel_admin_email = '$hotel_admin_email', hotel_id = '$hotel_id', hotel_admin_password = '$hotel_admin_password' WHERE hotel_admin_id = '$hotel_admin_id' ";

                            if (mysqli_query($con, $query)) {
                                $msg = "You have Successfully Updated a hotel admin information!";
                                echo $msg;
                            } else {
                                $msg = "Error Updating hotel admin Information";
                                echo $msg;
                                echo mysqli_error($con);
                            }
                        } else {
                            $msg = "Password don't match";
                            echo $msg;
                        }
                    }

                    /////////  Request for Editing Hotel Admin Details  /////////////
                    if (isset($_REQUEST['hotel_admin_id'])) {
                        $hotel_admin_id = intval($_REQUEST['hotel_admin_id']);

                        $array = array();
                        $q = "SELECT * FROM hotel_admin WHERE hotel_admin_id = '$hotel_admin_id'";
                        $q_result = mysqli_query($con, $q);

                        while ($r = mysqli_fetch_assoc($q_result)) {
                            $array['hotel_admin_id'] = $r['hotel_admin_id'];
                            $array['hotel_admin_name'] = $r['hotel_admin_name'];
                            $array['hotel_admin_email'] = $r['hotel_admin_email'];
                            $array['hotel_id'] = $r['hotel_id'];
                            $array['hotel_admin_password'] = $r['hotel_admin_password'];
                        }
                    ?>

                        <!-- Hotel Admin Full Name Input -->
                        <div class="row mt-3">
                            <div class="form-group col-md-12">
                                <label for="hotel_admin_name" class="form-label">
                                    <h6><b><i class="fas fa-user"></i> Hotel Admin Full Name</b></h6>
                                </label>
                                <input type="text" class="form-control" name="hotel_admin_name" id="hotel_admin_name"
                                    placeholder="Enter Hotel Admin Full Name"
                                    value="<?php echo $array['hotel_admin_name']; ?>" required>

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
                                    placeholder="Enter hotel admin email"
                                    value="<?php echo $array['hotel_admin_email']; ?>" required>
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
                                echo "<option >Choose...</option>";

                                while ($r = mysqli_fetch_assoc($q_hotels_result)) {
                                    $selected;
                                    if ($array['hotel_id'] == $r['hotel_id']) {
                                        $selected = "selected";
                                    } else {
                                        $selected = " ";
                                    }

                                    echo "<option $selected value = '{$r['hotel_id']}'";
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
                                    id="hotel_admin_password" placeholder="Enter hotel admin password"
                                    value="<?php echo $array['hotel_admin_password']; ?>" required>
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
                                    placeholder="Enter confirm confirm_hotel_admin_password password"
                                    value="<?php echo $array['hotel_admin_password']; ?>" required>

                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md mt-3 mb-3">
                                <Input type="hidden" name="hotel_admin_id" value="<?php echo $hotel_admin_id; ?>">
                                <button type="submit" name="Submit" class="btn btn-primary btn-large col-md-12"
                                    value="Submit">Edit Hotel Admin Data</button>
                            </div>
                        </div>

                        <?php
                    }
                    $con->close();
                    ?>

                    </form>
                </div>


            </div>
            <script src="../../icon/svg-with-js/js/fontawesome-all.js"></script>
            <script src="../../js/bootstrap.bundle.min.js"></script>
            <script src="../../js/jquery.min.js"></script>
            <script src="../../js/app/main.js"></script>
    </body>

</html>