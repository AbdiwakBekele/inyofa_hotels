<?php

include "../../db.php";
SESSION_START();

if (!isset($_COOKIE['logged'])) {

    header('location: ../../a_login.php');
}

// Users Query
$q_user = "SELECT * FROM user";
$q_user_result = mysqli_query($con, $q_user);
$user_count = mysqli_num_rows($q_user_result);
$user_id;

?>

<!DOCTYPE html>
<html lang="en-us" dir="ltr">

    <head>
        <meta http-equiv="Content-Type" content="text/html, charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Manage-Users</title>

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
                        <!-- <label id="l1">e-learning</label> -->
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
                                style="background-image: url(../images/avatar.jpg);"><br><br><br><br><br>
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
                        <li><a href="../hotel_admins/a_manage_hotel_admins.php"><i class="fas fa-users"></i> Manage
                                Hotel
                                Admins</a>
                        </li>
                        <li><a href="a_manage_users.php" class="text-warning"><i class="fas fa-users"></i> Manage
                                Users</a></li>
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
                                                    User</strong></h4>
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
                                        <h4><i class="fas fa-user"></i> Users</h4>
                                        <hr>
                                        <h5>
                                            <b><?php echo $user_count; ?></b>
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                </section>



                <div class="col-sm-12 col-md-8 offset-md-2">

                    <!------ New User Form ------->

                    <form class="was-validated bg-light border shadow p-3" action="user_edit_api.php" method="POST"
                        enctype="multipart/form-data" name="form">

                        <!-- Database Insertion PHP Code -->
                        <?php
                    if (isset($_POST['Submit'])) {
                        $user_id = $_POST['user_id'];
                        $user_fullname = $_POST['user_fullname'];
                        $user_email = $_POST['user_email'];
                        $user_birth_date = $_POST['user_birth_date'];
                        $user_phone = $_POST['user_phone'];
                        $user_address = $_POST['user_address'];
                        $user_password =  $_POST['user_password'];
                        $confirm_user_password =  $_POST['confirm_user_password'];

                        if ($user_password == $confirm_user_password) {
                            $query = "UPDATE user SET user_fullname = '$user_fullname', user_email = '$user_email', user_birth_date = '$user_birth_date', user_phone = '$user_phone', user_address = '$$user_address', user_password = '$$user_password' WHERE user_id = '$user_id' ";

                            if (mysqli_query($con, $query)) {
                                $msg = "You have Successfully Updated a user information!";
                                echo $msg;
                            } else {
                                $msg = "Error Updating user Information";
                                echo $msg;
                                echo mysqli_error($con);
                            }
                        } else {
                            $msg = "Password don't match";
                            echo $msg;
                        }
                    }

                    /////////  Request for Editing User Details  /////////////
                    if (isset($_REQUEST['user_id'])) {
                        $user_id = intval($_REQUEST['user_id']);

                        $array = array();
                        $q = "SELECT * FROM user WHERE user_id = '$user_id'";
                        $q_result = mysqli_query($con, $q);

                        while ($r = mysqli_fetch_assoc($q_result)) {
                            $array['user_id'] = $r['user_id'];
                            $array['user_fullname'] = $r['user_fullname'];
                            $array['user_email'] = $r['user_email'];
                            $array['user_birth_date'] = $r['user_birth_date'];
                            $array['user_phone'] = $r['user_phone'];
                            $array['user_address'] = $r['user_address'];
                            $array['user_password'] = $r['user_password'];
                        }

                    ?>

                        <!-- User Full Name Input -->
                        <div class="row mt-3">
                            <div class="form-group col-md-12">
                                <label for="user_fullname" class="form-label">
                                    <h6><b><i class="fas fa-house"></i> User Full Name</b></h6>
                                </label>
                                <input type="text" class="form-control" name="user_fullname" id="user_fullname"
                                    placeholder="Enter User Full Name" value=" <?php echo $array['user_fullname']; ?>"
                                    required>

                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>
                        </div>


                        <div class="row mt-3">
                            <!-- Date of Birth -->
                            <div class="form-group mt-2 col-md-6 col-sm-12">
                                <label for="user_birth_date">
                                    <h6><b><i class="fas fa-calendar-alt"></i> Date of Birth</b></h6>
                                </label>
                                <input type="date" class="form-control" name="user_birth_date" id="user_birth_date"
                                    placeholder="Enter Date of Birth" value=" <?php echo $array['user_birth_date']; ?>"
                                    required>
                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>

                            <!-- User Phone -->
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="user_phone" class="form-label">
                                    <h6><b><i class="fas fa-phone"></i> User Phone</b></h6>
                                </label>
                                <input type="phone" class="form-control" name="user_phone" for="user_phone"
                                    placeholder="Enter user's phone number" value=<?php echo $array['user_phone']; ?>
                                    required>

                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <!-- User Address -->
                            <div class="form-group mt-2 col-md-6 col-sm-12">
                                <label for="user_address">
                                    <h6><b><i class="fas fa-map-marker-alt"></i> User Address</b></h6>
                                </label>
                                <input type="text" class="form-control" name="user_address" id="user_address"
                                    placeholder="Enter User Address" value=<?php echo $array['user_address']; ?>
                                    required>
                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>


                            <!-- User Email -->
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="user_email" class="form-label">
                                    <h6><b><i class="fas fa-envelope"></i> Email</b></h6>
                                </label>
                                <input type="phone" class="form-control" name="user_email" for="user_email"
                                    placeholder="User Email" value=" <?php echo $array['user_email']; ?>" required>

                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>
                        </div>



                        <div class="row mt-3">
                            <!-- User Password -->
                            <div class="form-group mt-2 col-md-6 col-sm-12">
                                <label for="user_password">
                                    <h6><b><i class="fas fa-key"></i> User Password</b></h6>
                                </label>
                                <input type="password" class="form-control" name="user_password" id="user_password"
                                    placeholder="Enter user password" value=" <?php echo $array['user_password']; ?>"
                                    required>
                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>

                            <!-- Confirm User Password -->
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="confirm_user_password" class="form-label">
                                    <h6><b><i class="fas fa-key"></i> Confirm User Password</b></h6>
                                </label>
                                <input type="password" class="form-control" name="confirm_user_password"
                                    for="confirm_user_password" placeholder="Enter confirm user password"
                                    value=" <?php echo $array['user_password']; ?>" required>

                                <div class="valid-feedback">good</div>
                                <div class="invalid-feedback">fill-out</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md mt-3 mb-3">
                                <Input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                <button type="submit" name="Submit" class="btn btn-primary btn-large col-md-12"
                                    value="Submit">Edit User Data</button>
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