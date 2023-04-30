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

?>

<!DOCTYPE html>
<html lang="en-us" dir="ltr">

    <head>
        <meta http-equiv="Content-Type" content="text/html, charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hotel Admin | Dashboard</title>
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

                    <div class="dropdown myac">
                        <a id="a1" class="btn btn-outline-info dropdown-toggle" href="#" role="button" id="dpMLink"
                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                class="fas fa-user-circle"></i>&nbsp;<label>profile</label></a>

                        <ul class="dropdown-menu" aria-labelledby="dpMLink">
                            <li class="dropdown-item"><a href="update_profile.php"><i class="fas fa-user-cog"></i>
                                    Update
                                    Profile</a></li>
                            <li class="dropdown-item"><a href="a_signin.php"><i class="fas fa-sign-out-alt"></i>
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
                                    <h6 class="text-white"><?php echo $hotel_name ?> </h6>
                                </center>
                            </a>
                        </div>
                    </div>
                    <br>

                    <!---- Left Dashboard Controller ---->
                    <ul class="list-unstyled components mb-5">
                        <li><a href="index.php"><i class="fas fa-list"></i> Dashboard</a></li>
                        <li><a href="ha_manage_rt.php"><i class="fas fa-laptop-house"></i> Manage
                                Room Types</a></li>
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

                <br>
                <br>
                <h6 class="alert alert-primary " style="text-align: center;"> <strong> Add New Room Information
                    </strong> </h6>
                <form class="was-validated bg-light border shadow p-3" action="ha_add_new_room.php" method="POST"
                    enctype="multipart/form-data" name="form">
                    <?php

                    if (isset($_POST['Submit'])) {
                        $room_type = $_POST['room_type'];
                        $room_no = $_POST['room_no'];
                        $room_floor = $_POST['room_floor'];
                        $room_hotel_id = $_POST['hotel_id'];
                        $reserve_status = "NO";

                        $query = "INSERT INTO room (room_type_id, hotel_id, room_no, room_floor, reserve_status)
                                                    VALUES ('$room_type', '$room_hotel_id', '$room_no', '$room_floor', '$reserve_status')";

                        if (mysqli_query($con, $query)) {
                            $msg = "You have Successfully Add a new room";
                            echo ' <div class="alert alert-success" style="text-align: center"> <strong> '. $msg .'</strong></div> ';
                        } else {
                            $msg = "Error Registering Hotel";
                            echo ' <div class="alert alert-danger" style="text-align: center"> '. $msg .'</div> ';
                        }
                    }
                    ?>

                    <!-- Room Type name | Price | Max Guest-->
                    <div class="row mt-3">
                        <!-- Room Type Name -->
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="room_type" class="form-label">
                                <h6><b><i class="fas fa-file-text"></i> Room Type</b></h6>
                            </label>

                            <?php

                            echo "<select name='room_type' class='form-control' id='room_type' required> ";
                            echo "<option selected>Choose...</option>";

                            $array = array();
                            $q = "SELECT * FROM room_type where hotel_id = '$hotel_id'";
                            $q_room_result = mysqli_query($con, $q);

                            while ($r = mysqli_fetch_assoc($q_room_result)) {

                                echo "<option name='room_type' value = '{$r['room_type_id']}'";
                                echo ">{$r['room_type_name']}</option>";
                            }

                            echo "</select>";

                            ?>

                            <div class="valid-feedback">good</div>
                            <div class="invalid-feedback">fill-out</div>
                        </div>

                        <!-- Room No -->
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="room_no" class="form-label">
                                <h6><b><i class="fas fa-circle-info mx-2"></i>Room Number</b></h6>
                            </label>
                            <input type="number" class="form-control" name="room_no" for="room_no"
                                placeholder="Room Number" required>

                            <div class="valid-feedback">good</div>
                            <div class="invalid-feedback">fill-out</div>
                        </div>

                        <!-- Room Floor-->
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="room_floor" class="form-label">
                                <h6><b><i class="fas fa-users mx-2"></i>Room Floor</b></h6>
                            </label>
                            <input type="number" class="form-control" name="room_floor" for="room_floor"
                                placeholder="Room Floor" required>

                            <div class="valid-feedback">good</div>
                            <div class="invalid-feedback">fill-out</div>
                        </div>
                    </div>


                    <!-- Submit Button -->
                    <div class="row">
                        <div class="col-md mt-3 mb-3">
                            <input type="hidden" name="hotel_id" value="<?php echo $hotel_id ?>">
                            <button type="submit" name="Submit" class="btn btn-primary btn-large col-md-6 rounded"
                                value="Submit"> Add New Room Detail</button>
                        </div>
                    </div>

                </form>


            </div>
        </div>

        <script src="../icon/svg-with-js/js/fontawesome-all.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/app/main.js"></script>
    </body>

</html>