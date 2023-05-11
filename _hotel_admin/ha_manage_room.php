<?php

include "../db.php";
SESSION_START();

if (!isset($_COOKIE['logged'])) {

    header('location: ../ha_login.php');
}

$hotel_admin_email = $_SESSION['email'];
$hotel_admin_id;
$hotel_id;
$hotel_name;

// Hotel Admin Info Fetching 
$sql_hotel_admin = "SELECT * FROM hotel_admin WHERE hotel_admin_email = '$hotel_admin_email' ";
$result_hotel_admin = mysqli_query($con, $sql_hotel_admin);


while ($row = mysqli_fetch_assoc($result_hotel_admin)) {
    $hotel_admin_id = $row['hotel_admin_id'];
    $hotel_id = $row['hotel_id'];
}

//Hotel Info Fetching
$sql_hotel = "SELECT * FROM hotels WHERE hotel_id =  '$hotel_id'";
$result_hotel = mysqli_query($con, $sql_hotel);


while ($row = mysqli_fetch_assoc($result_hotel)) {
    $hotel_name = $row['hotel_name'];
}

// Room Query
$q_room = "SELECT * FROM room";
$q_room_result = mysqli_query($con, $q_room);
$room_count = mysqli_num_rows($q_room_result);


?>

<!DOCTYPE html>
<html lang="en-us" dir="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html, charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Hotel Admins</title>

    <meta name="description" content="inyofa.com | In your favor">
    <meta name="type" content="website">
    <meta name="keywords" content="inyofa.com , In your favor, inyofa, booking, hotels, rentals">
    <meta name="author" content="Omishtu-Joy AgTech Engineering, Abdiwak Bekele Aga, Melkam Technology">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="../images/Logo-Icons.png" />
    <link rel="stylesheet" type="text/css" href="../icon/svg-with-js/css/fa-svg-with-js.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>

    <!------ Header --------->
    <header id="top-header" class="bg-success">
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
                <div class="row">
                    <div class="col">
                        <a href="#" class="img logo rounded-circle mb-5"
                            style="background-image: url(images/avatar.jpg);"><br><br><br><br><br>
                            <center>
                                <h6 class="text-white"><?php echo $hotel_name ?> </h6>
                            </center>
                        </a>
                    </div>
                </div>
                <br>

                <!---- Left Dashboard Controller ---->
                <ul class="list-unstyled components mb-5">
                    <li><a href="index.php"><i class="fas fa-list"></i> Dashboard</a></li>
                    <li><a href="ha_manage_rt.php"><i class="fas fa-laptop-house"></i> Manage Room
                            Types</a></li>
                    <li><a href="ha_manage_room.php" class="text-warning"><i class="fas fa-door-open"></i> Manage
                            Rooms</a></li>
                    <li><a href="ha_manager_reservation.php"><i class="fas fa-bookmark"></i> Manage Reservations</a>
                    </li>
                    <li><a href="ha_manage_hotel_info.php"><i class="fas fa-info-circle"></i>
                            Hotel Information</a>
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
                                            <strong> <?php echo strtoupper($hotel_name); ?> </strong>
                                            </h6>
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
                                    <h4><i class="fas fa-laptop-house"></i> Rooms</h4>
                                    <hr>
                                    <h5>
                                        <b><?php echo $room_count; ?></b>
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
                            <a class="btn btn-outline-success text-dark m-4" href="ha_add_new_room.php" role="button"
                                style="text-decoration: none;"><i class="fas fa-plus"></i> Add New
                                Room</a>
                        </div>

                        <div class="col-md">
                            <form class="d-flex mt-4">
                                <input class="form-control me-2" type="search" placeholder="Search..."
                                    aria-label="Search">
                                <button class="btn btn-info" type="submit" style="margin-left: -11px;">Search</button>
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
                                            <center>Room Table</center>
                                        </th>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr class="h6 bg-primary text-white">
                                        <th class="text-center" scope="col">No</th>
                                        <th class="text-center" scope="col">Room Type</th>
                                        <th class="text-center" scope="col">Room No</th>
                                        <th class="text-center" scope="col">Room Floor</th>
                                        <th class="text-center" scope="col">Reserve Status</th>
                                        <th class="text-center bg-secondary" scope="col">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <?php
                                        $assigned;
                                        $q = "SELECT * FROM room where hotel_id = '$hotel_id'";
                                        $q_result = mysqli_query($con, $q);
                                        $index = 0;
                                        while ($row = mysqli_fetch_assoc($q_result)) {
                                            $room_id = $row['room_id'];
                                            $room_type_id = $row['room_type_id'];
                                            $q_room_type = "SELECT * FROM room_type where room_type_id = '$room_type_id'";
                                            $q_roomType_result = mysqli_query($con, $q_room_type);
                                            $row_roomType = mysqli_fetch_assoc($q_roomType_result);

                                            printf(
                                                "<tr> <td>%d</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td>",
                                                ++$index,
                                                htmlspecialchars($row_roomType['room_type_name']),
                                                htmlspecialchars($row['room_no']),
                                                htmlspecialchars($row['room_floor']),
                                                htmlspecialchars($row['reserve_status']),
                                            );
                                        ?>
                                        <td class="text-center h3">
                                            <a href="ha_room_view.php?room_id=<?php echo $room_id ?>"><i
                                                    class="fas fa-address-card px-2 text-primary"
                                                    style="font-size: 17px;"></i></a>
                                            <a href="ha_room_delete.php?room_id=<?php echo $room_id ?>"><i
                                                    class="fas fa-trash-alt px-2 text-danger"
                                                    style="font-size: 17px;"></i></a>
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

        <script src="../icon/svg-with-js/js/fontawesome-all.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/jquery.min.js"></script>
        <!-- 
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script> -->

        <script src="../js/app/main.js"></script>
</body>

</html>