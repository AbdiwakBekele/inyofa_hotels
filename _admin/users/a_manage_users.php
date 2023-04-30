<?php

include "../../db.php";
SESSION_START();

if (!isset($_COOKIE['logged'])) {

    header('location: ../../a_login.php');
}

// Rental Query
$q_user = "SELECT * FROM user";
$q_user_result = mysqli_query($con, $q_user);
$user_count = mysqli_num_rows($q_user_result);

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
                                            <h4 class="card-title"><i class="fas fa-tachometer-alt"></i> <strong>Manage
                                                    Users</strong></h4>
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

                <!---- add buttons & Search ----->
                <section class="mt-5 border bg-light">
                    <div class="container">
                        <div class="row g-4">

                            <div class="col-md">
                                <a class="btn btn-outline-success text-dark m-4" href="a_add_user.php" role="button"
                                    style="text-decoration: none;"><i class="fas fa-plus"></i> Add New User</a>
                            </div>

                            <div class="col-md">
                                <form class="d-flex mt-4">
                                    <input class="form-control me-2" type="search" placeholder="Search...  "
                                        aria-label="Search">
                                    <button class="btn btn-info" type="submit"
                                        style="margin-left: -11px;">Search</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </section>

                <!-------- Rentals Table ----------->
                <section class="mt-2 bg-light">
                    <div class="">
                        <div class="row">
                            <div class="col-md">

                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr class="h5">
                                            <th colspan="9" class="bg-dark text-white">
                                                <center>Users Table</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <thead>
                                        <tr class="h6 bg-primary text-white">
                                            <th class="text-center" scope="col">ID</th>
                                            <th class="text-center" scope="col">User Full Name</th>
                                            <th class="text-center" scope="col">Email</th>
                                            <th class="text-center" scope="col">Date of Birth</th>
                                            <th class="text-center" scope="col">Phone No</th>
                                            <th class="text-center" scope="col">Address</th>
                                            <th class="text-center bg-secondary" scope="col">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <?php
                                        $q = "SELECT * FROM user";
                                        $q_result = mysqli_query($con, $q);
                                        while ($row = mysqli_fetch_assoc($q_result)) {
                                            printf(
                                                "<tr> <td>%d</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td>",
                                                $row['user_id'],
                                                htmlspecialchars($row['user_fullname']),
                                                htmlspecialchars($row['user_email']),
                                                htmlspecialchars($row['user_birth_date']),
                                                htmlspecialchars($row['user_phone']),
                                                htmlspecialchars($row['user_address'])
                                            );
                                        ?>
                                            <td class="text-center h3">
                                                <a href="user_view_api.php?user_id=<?php echo $row['user_id'] ?>"><i
                                                        class="fas fa-address-card px-2"></i></a>
                                                <a href="user_edit_api.php?user_id=<?php echo $row['user_id'] ?>"><i
                                                        class="fas fa-pencil-alt px-2"></i></a>
                                                <a href="user_delete_api.php?user_id=<?php echo $row['user_id'] ?>"><i
                                                        class="fas fa-trash-alt px-2 text-danger"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                ?>

                                    </tbody>
                                </table>

                                <div class="mt-5 pagination">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-end">
                                            <li class="page-item"><a class="page-link text-primary"
                                                    href="index.php">Previous</a></li>
                                            <li class="page-item active"><a class="page-link text-white" href="#">1</a>
                                            </li>
                                            <li class="page-item"><a class="page-link text-primary" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link text-primary" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link text-primary" href="">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <script src="../../icon/svg-with-js/js/fontawesome-all.js"></script>
            <script src="../../js/bootstrap.bundle.min.js"></script>
            <script src="../../js/jquery.min.js"></script>
            <script src="../../js/app/main.js"></script>
    </body>

</html>