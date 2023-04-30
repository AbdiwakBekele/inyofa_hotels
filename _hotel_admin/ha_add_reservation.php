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
$q_reservation = "SELECT * FROM reservation WHERE hotel_id = '$hotel_id'";
$q_reservation_result = mysqli_query($con, $q_reservation);
$reservation_count = mysqli_num_rows($q_reservation_result);

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
                        <li><a href="ha_manage_room.php"><i class="fas fa-door-open"></i> Manage
                                Rooms</a></li>
                        <li><a href="ha_manager_reservation.php" class="text-warning"><i class="fas fa-bookmark"></i>
                                Manage Reservations</a>
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

                <!---- add buttons & Search ----->
                <section class="mt-5 border bg-light">
                    <div class="container">
                        <form class="was-validated bg-light border shadow p-3" action="ha_add_reservation.php"
                            method="POST" enctype="multipart/form-data" name="form">

                            <?php
                        if (isset($_POST['Submit'])) {
                            $firstname = $_POST['firstname'];
                            $lastname = $_POST['lastname'];
                            $email = $_POST['email'];
                            $phone =  $_POST['phone'];
                            $room =  $_POST['room'];
                            $checkin =  $_POST['checkin'];
                            $checkout =  $_POST['checkout'];
                            $hotel_id =  $_POST['hotel_id'];

                            $query = "INSERT INTO reservation (room_id, hotel_id, firstname, lastname, email, phone_no, check_in, check_out)
                                                    VALUE ('$room', '$hotel_id', '$firstname', '$lastname', '$email', '$phone', '$checkin', '$checkout' ) ";

                            if (mysqli_query($con, $query)) {

                                $sql_reserve = "UPDATE room SET reserve_status = 'YES' WHERE room_id = '$room'";
                                if (mysqli_query($con, $sql_reserve)) {
                                    $msg = "You have successfully book a reservation!";
                                    echo '<div class="alert alert-success">' . $msg . '</div> ';
                                }
                            } else {
                                $msg = "Error Reserving a Book";
                                echo '<div class="alert alert-danger">' . $msg . '</div> ';
                                echo mysqli_error($con);
                            }
                        }

                        ?>

                            <!-- Row 1 -->
                            <div class="row mt-3">
                                <!-- First Name -->
                                <div class="form-group mt-2 col-md-4 col-sm-12">
                                    <label for="firstname">
                                        <h6><b><i class="fa fa-file-text" aria-hidden="true"></i> First Name</b>
                                        </h6>
                                    </label>
                                    <input type="text" class="form-control" name="firstname" id="firstname"
                                        placeholder="Enter lirstname" required>
                                    <div class="valid-feedback">good</div>
                                    <div class="invalid-feedback">fill-out</div>
                                </div>

                                <!-- Last Name -->
                                <div class="form-group col-md-4 col-sm-12">
                                    <label for="lastname" class="form-label">
                                        <h6><b><i class="fas fa-credit-card mx-2"></i>Last Name</b></h6>
                                    </label>
                                    <input type="text" class="form-control" name="lastname" for="lastname"
                                        placeholder="Enter lastname" required>

                                    <div class="valid-feedback">good</div>
                                    <div class="invalid-feedback">fill-out</div>
                                </div>

                                <!-- Email -->
                                <div class="form-group col-md-4 col-sm-12">
                                    <label for="email" class="form-label">
                                        <h6><b><i class="fas fa-credit-card mx-2"></i>Email</b></h6>
                                    </label>
                                    <input type="email" class="form-control" name="email" for="email"
                                        placeholder="Enter email" required>

                                    <div class="valid-feedback">good</div>
                                    <div class="invalid-feedback">fill-out</div>
                                </div>

                            </div>

                            <!-- Row 2 -->
                            <div class="row mt-3">
                                <!-- Phone no -->
                                <div class="form-group mt-2 col-md-4 col-sm-12">
                                    <label for="phone">
                                        <h6><b><i class="fa fa-file-text" aria-hidden="true"></i> Phone No</b>
                                        </h6>
                                    </label>
                                    <input type="tel" class="form-control" name="phone" id="phone"
                                        placeholder="Enter phone number" required>
                                    <div class="valid-feedback">good</div>
                                    <div class="invalid-feedback">fill-out</div>
                                </div>

                                <!-- Room No -->
                                <div class="col-4 mt-2">
                                    <label for="room" class="form-label m-0"> <strong>Select Room no</strong></label>

                                    <?php

                                $q = "SELECT * FROM room where hotel_id = '$hotel_id' and reserve_status = 'NO' ";
                                $q_room_result = mysqli_query($con, $q);
                                $available = (mysqli_num_rows($q_room_result) > 0) ? "" : 'disabled';


                                echo "<select name='room' class='form-control' id='room' required $available > ";


                                while ($r = mysqli_fetch_assoc($q_room_result)) {

                                    echo "<option name='room' value = '{$r['room_id']}'";
                                    echo ">{$r['room_no']}</option>";
                                }

                                echo "</select>";

                                ?>
                                </div>
                            </div>

                            <!-- Row 3 -->
                            <div class="row mt-3">
                                <!-- Checkin -->
                                <div class="form-group col-md-4 col-sm-12">
                                    <label for="checkin" class="form-label">
                                        <h6><b><i class="fas fa-credit-card mx-2"></i>Check-in Date</b></h6>
                                    </label>
                                    <input type="date" class="form-control" name="checkin" for="checkin"
                                        placeholder="Enter Checkin Date" required>

                                    <div class="valid-feedback">good</div>
                                    <div class="invalid-feedback">fill-out</div>
                                </div>

                                <!-- Checkout -->
                                <div class="form-group col-md-4 col-sm-12">
                                    <label for="checkout" class="form-label">
                                        <h6><b><i class="fas fa-credit-card mx-2"></i>Check-out Date</b></h6>
                                    </label>
                                    <input type="date" class="form-control" name="checkout" for="checkout"
                                        placeholder="Enter Checkou Date" required>

                                    <div class="valid-feedback">good</div>
                                    <div class="invalid-feedback">fill-out</div>
                                </div>

                            </div>

                            <!-- Submit Button -->
                            <div class="row">
                                <input type="hidden" name="hotel_id" value="<?php echo $hotel_id ?>">
                                <div class="col-md mt-3 mb-3">
                                    <button type="submit" name="Submit"
                                        class="btn btn-primary btn-large col-md-6 rounded" value="Submit">Reserve
                                    </button>
                                </div>
                            </div>

                        </form>

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