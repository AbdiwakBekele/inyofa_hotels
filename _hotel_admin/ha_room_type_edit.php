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
                                    <h6 class="text-white">
                                        <?php echo $hotel_name ?>
                                    </h6>
                                </center>
                            </a>
                        </div>
                    </div>
                    <br>

                    <!---- Left Dashboard Controller ---->
                    <ul class="list-unstyled components mb-5">
                        <li><a href="index.php"><i class="fas fa-list"></i> Dashboard</a></li>
                        <li><a href="ha_manage_rt.php" class="text-warning"><i class="fas fa-laptop-house"></i> Manage
                                Room
                                Types</a></li>
                        <li><a href="ha_manage_room.php"><i class="fas fa-door-open"></i> Manage Rooms</a></li>
                        <li><a href="ha_manager_reservation.php"><i class="fas fa-bookmark"></i> Manage Reservations</a>
                        </li>
                        <li><a href="ha_manage_hotel_info.php"><i class="fas fa-info-circle"></i>
                                Hotel Information</a>
                        </li>
                    </ul>

                    <div class="footer">
                        INYOFA | In Your Favor &copy;
                        <script>
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
                <h6 class="alert alert-primary " style="text-align: center;"> <strong> Edit Room Type
                        Information</strong> </h6>
                <form class="was-validated bg-light border shadow p-3" action="ha_room_type_edit.php" method="POST"
                    enctype="multipart/form-data" name="form">
                    <?php
                    include '../db.php';
                    $upload = false;
                    if (isset($_POST['Submit'])) {
                        $room_type_id = $_POST['room_type_id'];
                        $room_type_name = $_POST['room_type_name'];
                        $room_type_price = $_POST['price'];
                        $max_guest = $_POST['max_guest'];
                        $room_type_description = $_POST['about_the_room'];

                        // Amenities
                        $hot_tube;
                        $free_shuttle;
                        $spa;
                        $seaview;
                        $petfriendly;
                        $kitchen;
                        $free_wifi;
                        $washer_and_dryer;
                        $parking;
                        $pool;
                        $water_park;
                        $air_conditioned;
                        $electric_charge;
                        $outdoor_space;
                        $restaurant;
                        $cots;
                        $gym;


                        // Hot tub
                        if (empty($_POST['hot_tube'])) {
                            $hot_tube = "NaN";
                        } else {
                            $hot_tube = $_POST['hot_tube'];
                        }

                        // Free shuttel
                        if (empty($_POST['free_shuttle'])) {
                            $free_shuttle = "NaN";
                        } else {
                            $free_shuttle = $_POST['free_shuttle'];
                        }

                        //  spa
                        if (empty($_POST['spa'])) {
                            $spa = "NaN";
                        } else {
                            $spa = $_POST['spa'];
                        }

                        // SeaView
                        if (empty($_POST['seaview'])) {
                            $seaview = "NaN";
                        } else {
                            $seaview = $_POST['seaview'];
                        }

                        // pet Friendly
                        if (empty($_POST['petfriendly'])) {
                            $petfriendly = "NaN";
                        } else {
                            $petfriendly = $_POST['petfriendly'];
                        }

                        // kitchen
                        if (empty($_POST['kitchen'])) {
                            $kitchen = "NaN";
                        } else {
                            $kitchen = $_POST['kitchen'];
                        }

                        // free wifi
                        if (empty($_POST['free_wifi'])) {
                            $free_wifi = "NaN";
                        } else {
                            $free_wifi = $_POST['free_wifi'];
                        }

                        // washer and Dryer
                        if (empty($_POST['washer_and_dryer'])) {
                            $washer_and_dryer = "NaN";
                        } else {
                            $washer_and_dryer = $_POST['washer_and_dryer'];
                        }


                        // parking
                        if (empty($_POST['parking'])) {
                            $parking = "NaN";
                        } else {
                            $parking = $_POST['parking'];
                        }


                        // Pool
                        if (empty($_POST['pool'])) {
                            $pool = "NaN";
                        } else {
                            $pool = $_POST['pool'];
                        }


                        // Water Park
                        if (empty($_POST['water_park'])) {
                            $water_park = "NaN";
                        } else {
                            $water_park = $_POST['water_park'];
                        }

                        // Air condition
                        if (empty($_POST['air_conditioned'])) {
                            $air_conditioned = "NaN";
                        } else {
                            $air_conditioned = $_POST['air_conditioned'];
                        }


                        // Electric Charge
                        if (empty($_POST['electric_charge'])) {
                            $electric_charge = "NaN";
                        } else {
                            $electric_charge = $_POST['electric_charge'];
                        }

                        // Outdoor
                        if (empty($_POST['outdoor_space'])) {
                            $outdoor_space = "NaN";
                        } else {
                            $outdoor_space = $_POST['outdoor_space'];
                        }

                        // restaurant
                        if (empty($_POST['restaurant'])) {
                            $restaurant = "NaN";
                        } else {
                            $restaurant = $_POST['restaurant'];
                        }

                        // cots
                        if (empty($_POST['cots'])) {
                            $cots = "NaN";
                        } else {
                            $cots = $_POST['cots'];
                        }


                        // Gym
                        if (empty($_POST['gym'])) {
                            $gym = "NaN";
                        } else {
                            $gym = $_POST['gym'];
                        }

                        // All Room Amenities
                        $room_amenities = $hot_tube . "," . $free_shuttle . "," . $spa . "," . $seaview . "," . $petfriendly . "," . $kitchen . "," . $free_wifi . "," . $washer_and_dryer . "," . $parking . "," . $pool . "," . $water_park . "," . $air_conditioned . "," . $electric_charge . "," . $outdoor_space . "," . $restaurant . "," . $cots . "," . $gym;

                        // Upload Room Image
                        if (empty($_FILES['room_img']['name'])) {
                            $query = "UPDATE room_type SET room_type_name = '$room_type_name', room_type_price = '$room_type_price', room_type_max_guest = '$max_guest', room_amenities = '$room_amenities', room_type_description = '$room_type_description' WHERE room_type_id = '$room_type_id' ";

                            if (mysqli_query($con, $query)) {
                                $msg = "You have Successfully updated a new room type";
                                echo ' <div class="alert alert-success" style="text-align: center"> <strong> ' . $msg . '</strong></div> ';
                            } else {
                                $msg = "Error updating hotel room";
                                echo ' <div class="alert alert-danger" style="text-align: center"> ' . $msg . '</div> ';
                            }

                        } else {
                            $temp_room_img = $_FILES['room_img']['name'];
                            $target_dir = "../hotels_image/";
                            $target_file = $target_dir . basename($_FILES["room_img"]["name"]);

                            // Select file type
                            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                            // Valid file extensions
                            $extensions_arr = array("jpg", "jpeg");
                            // Check extension
                            if (in_array($imageFileType, $extensions_arr)) {
                                // Upload file
                                move_uploaded_file($_FILES['room_img']['tmp_name'], $target_dir . $temp_room_img);
                                $room_img = $hotel_name . '_' . $room_type_name . '.jpg';
                                rename($target_dir . $temp_room_img, $target_dir . $room_img);

                                $query = "UPDATE room_type SET room_type_name = '$room_type_name', room_type_price = '$room_type_price', room_type_max_guest = '$max_guest', room_amenities = '$room_amenities', room_type_description = '$room_type_description', room_img='$room_img' WHERE room_type_id = '$room_type_id' ";

                                if (mysqli_query($con, $query)) {
                                    $msg = "You have Successfully Add a new room type";
                                    echo ' <div class="alert alert-success" style="text-align: center"> <strong> ' . $msg . '</strong></div> ';
                                } else {
                                    $msg = "Error Registering Hotel";
                                    echo ' <div class="alert alert-danger" style="text-align: center"> ' . $msg . '</div> ';
                                }
                            } else {
                                // File selection is not correct
                                $msg = "File selection isn't correct, ";
                                echo ' <div class="alert alert-danger" style="text-align: center"> ' . $msg . '</div> ';
                            }

                        }

                    }

                    /////////  Request for Editing Hotel Details  /////////////
                    if (isset($_REQUEST['room_type_id'])) {
                        $room_type_id = intval($_REQUEST['room_type_id']);

                        $q = "SELECT * FROM room_type WHERE room_type_id = '$room_type_id'";
                        $q_result = mysqli_query($con, $q);

                        while ($r = mysqli_fetch_assoc($q_result)) {
                            $room_type_id = $r['room_type_id'];
                            $room_type_name = $r['room_type_name'];
                            $room_type_max_guest = $r['room_type_max_guest'];
                            $room_type_price = $r['room_type_price'];
                            $room_amenities = $r['room_amenities'];
                            $room_type_description = $r['room_type_description'];
                            $room_img = $r['room_img'];

                            $array = explode(",", $room_amenities);

                            // Amenities
                            $hot_tube = $array[0];
                            $free_shuttle = $array[1];
                            ;
                            $spa = $array[2];
                            $seaview = $array[3];
                            $petfriendly = $array[4];
                            $kitchen = $array[5];
                            $free_wifi = $array[6];
                            $washer_and_dryer = $array[7];
                            $parking = $array[8];
                            $pool = $array[9];
                            $water_park = $array[10];
                            $air_conditioned = $array[11];
                            $electric_charge = $array[12];
                            $outdoor_space = $array[13];
                            $restaurant = $array[14];
                            $cots = $array[15];
                            $gym = $array[16];

                            ?>

                    <!-- Room Type name | Price | Max Guest-->
                    <div class="row mt-3">
                        <!-- Room Type Name -->
                        <div class="form-group mt-2 col-md-4 col-sm-12">
                            <label for="room_type_name">
                                <h6><b><i class="fa fa-file-text" aria-hidden="true"></i> Room Type Name</b></h6>
                            </label>
                            <input type="text" class="form-control" name="room_type_name" id="room_type_name"
                                placeholder="Enter Room Type Name" value="<?php echo $room_type_name; ?>" required>
                            <div class="valid-feedback">good</div>
                            <div class="invalid-feedback">fill-out</div>
                        </div>

                        <!-- Room Type Price -->
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="price" class="form-label">
                                <h6><b><i class="fas fa-credit-card mx-2"></i>Room Type Price</b></h6>
                            </label>
                            <input type="number" class="form-control" name="price" for="price"
                                placeholder="Room Type Price" value="<?php echo $room_type_price; ?>" required>

                            <div class="valid-feedback">good</div>
                            <div class="invalid-feedback">fill-out</div>
                        </div>

                        <!-- Max Guest-->
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="max_guest" class="form-label">
                                <h6><b><i class="fas fa-users mx-2"></i>Room Maximum Guest</b></h6>
                            </label>
                            <input type="number" class="form-control" name="max_guest" for="max_guest"
                                placeholder="Maximum Guest" value="<?php echo $room_type_max_guest; ?>" required>

                            <div class="valid-feedback">good</div>
                            <div class="invalid-feedback">fill-out</div>
                        </div>

                        <!-- Upload Room Picture-->
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="room_img" class="form-label">
                                <h6><b><i class="fas fa-users mx-2"></i>Room Image</b></h6>
                            </label>
                            <input type="file" class="form-control" name="room_img" for="room_img"
                                placeholder="Upload room image">

                            <div class="valid-feedback">good</div>
                            <div class="invalid-feedback">fill-out</div>
                        </div>
                    </div>

                    <!-- Room Amenities -->
                    <h6> <strong>Room Amenities </strong> </h6>
                    <div class=" row m-2 p-5 border border-black shadow">

                        <!-- Column 1 -->
                        <div class="col">
                            <!-- Hot Tub -->
                            <div class="form-check">
                                <input class="form-check-input " type="checkbox" id="hot_tube" name="hot_tube"
                                    value="hot_tube" <?php ($status=($hot_tube !="NaN" ) ? 'checked' : null); echo
                                            $status; ?>>
                                <label class="form-check-label h6 text-black" for="hot_tube"> Hot tub </strong>
                                </label>
                            </div>

                            <!-- Free airpot shuttle -->
                            <div class="form-check">
                                <input class="form-check-input border-primary" type="checkbox" id="free_shuttle"
                                    name="free_shuttle" value="free_shuttle" <?php ($status=($free_shuttle !="NaN" )
                                            ? 'checked' : null); echo $status; ?>>
                                <label class="form-check-label h6 text-black" for="free_shuttle"> Free airport shuttle
                                    </strong>
                                </label>
                            </div>

                            <!-- Spa -->
                            <div class="form-check">
                                <input class="form-check-input border-primary" type="checkbox" id="spa" name="spa"
                                    value="spa" <?php ($status=($spa !="NaN" ) ? 'checked' : null); echo $status; ?>>
                                <label class="form-check-label h6 text-black" for="spa"> Spa </strong> </label>
                            </div>
                            <!-- Sea view -->
                            <div class="form-check">
                                <input class="form-check-input border-primary" type="checkbox" id="seaview"
                                    name="seaview" value="seaview" <?php ($status=($seaview !="NaN" ) ? 'checked' :
                                            null); echo $status; ?>>
                                <label class="form-check-label h6 text-black" for="seaview"> Sea view </strong> </label>
                            </div>
                            <!-- Pet-Friendly -->
                            <div class="form-check">
                                <input class="form-check-input border-primary" type="checkbox" id="petfriendly"
                                    name="petfriendly" value="petfriendly" <?php ($status=($petfriendly !="NaN" )
                                            ? 'checked' : null); echo $status; ?>>
                                <label class="form-check-label h6 text-black" for="petfriendly"> Pet-friendly </strong>
                                </label>
                            </div>
                        </div>

                        <!-- Column 2 -->
                        <div class="col">
                            <!-- kitchen -->
                            <div class="form-check">
                                <input class="form-check-input border-primary" type="checkbox" id="kitchen"
                                    name="kitchen" value="kitchen" <?php ($status=($kitchen !="NaN" ) ? 'checked' :
                                            null); echo $status; ?>>
                                <label class="form-check-label h6 text-black" for="kitchen"> Kitchen </strong> </label>
                            </div>
                            <!-- free wifi -->
                            <div class="form-check">
                                <input class="form-check-input border-primary" type="checkbox" id="free_wifi"
                                    name="free_wifi" value="free_wifi" <?php ($status=($free_wifi !="NaN" ) ? 'checked' :
                                            null); echo $status; ?>>
                                <label class="form-check-label h6 text-black" for="free_wifi"> Free Wifi </strong>
                                </label>
                            </div>
                            <!-- washer & dryer -->
                            <div class="form-check">
                                <input class="form-check-input border-primary" type="checkbox" id="washer_and_dryer"
                                    name="washer_and_dryer" value="washer_and_dryer" <?php ($status=($washer_and_dryer
                                            !="NaN" ) ? 'checked' : null); echo $status; ?>>
                                <label class="form-check-label h6 text-black" for="washer_and_dryer"> Washer and Dryer
                                    </strong>
                                </label>
                            </div>
                            <!-- Parking -->
                            <div class="form-check">
                                <input class="form-check-input border-primary" type="checkbox" id="parking"
                                    name="parking" value="parking" <?php ($status=($parking !="NaN" ) ? 'checked' :
                                            null); echo $status; ?>>
                                <label class="form-check-label h6 text-black" for="parking"> Parking </strong> </label>
                            </div>
                        </div>

                        <!-- Column 3 -->
                        <div class="col">
                            <!-- pool -->
                            <div class="form-check">
                                <input class="form-check-input border-primary" type="checkbox" id="pool" name="pool"
                                    value="pool" <?php ($status=($pool !="NaN" ) ? 'checked' : null); echo $status; ?>>
                                <label class="form-check-label h6 text-black" for="pool"> Pool </strong> </label>
                            </div>
                            <!-- water park -->
                            <div class="form-check">
                                <input class="form-check-input border-primary" type="checkbox" id="water_park"
                                    name="water_park" value="water_park" <?php ($status=($water_park !="NaN" )
                                            ? 'checked' : null); echo $status; ?>>
                                <label class="form-check-label h6 text-black" for="water_park"> Water Park </strong>
                                </label>
                            </div>
                            <!-- Air Conditioned -->
                            <div class="form-check">
                                <input class="form-check-input border-primary" type="checkbox" id="air_conditioned"
                                    name="air_conditioned" value="air_conditioned" <?php ($status=($air_conditioned
                                            !="NaN" ) ? 'checked' : null); echo $status; ?>>
                                <label class="form-check-label h6 text-black" for="air_conditioned"> Air Conditioned
                                    </strong>
                                </label>
                            </div>
                            <!-- Electric charger -->
                            <div class="form-check">
                                <input class="form-check-input border-primary" type="checkbox" id="electric_charge"
                                    name="electric_charge" value="electric_charge" <?php ($status=($electric_charge
                                            !="NaN" ) ? 'checked' : null); echo $status; ?>>
                                <label class="form-check-label h6 text-black" for="electric_charge"> Electric car
                                    charging station
                                    </strong> </label>
                            </div>
                        </div>

                        <!-- Column 4 -->
                        <div class="col">
                            <!-- outdoor space -->
                            <div class="form-check">
                                <input class="form-check-input border-primary" type="checkbox" id="outdoor_space"
                                    name="outdoor_space" value="outdoor_space" <?php ($status=($outdoor_space !="NaN" )
                                            ? 'checked' : null); echo $status; ?>>
                                <label class="form-check-label h6 text-black" for="outdoor_space"> Outdoor space
                                    </strong> </label>
                            </div>
                            <!-- Restaurant -->
                            <div class="form-check">
                                <!-- restaurant -->
                                <input class="form-check-input border-primary" type="checkbox" id="restaurant"
                                    name="restaurant" value="restaurant" <?php ($status=($restaurant !="NaN" )
                                            ? 'checked' : null); echo $status; ?>>
                                <label class="form-check-label h6 text-black" for="restaurant"> Restaurant </strong>
                                </label>
                            </div>
                            <!-- cots -->
                            <div class="form-check">
                                <input class="form-check-input border-primary" type="checkbox" id="cots" name="cots"
                                    value="cots" <?php ($status=($cots !="NaN" ) ? 'checked' : null); echo $status; ?>>
                                <label class="form-check-label h6 text-black" for="cots"> Cots </strong> </label>
                            </div>
                            <!-- Gym -->
                            <div class="form-check">
                                <input class="form-check-input border-primary" type="checkbox" id="gym" name="gym"
                                    value="gym" <?php ($status=($gym !="NaN" ) ? 'checked' : null); echo $status; ?>>
                                <label class="form-check-label h6 text-black" for="gym"> Gym </strong> </label>
                            </div>

                        </div>

                    </div>

                    <!-- About the Area -->
                    <div class="row mt-3">
                        <label for="about_the_room">
                            <h6><i class=" fa fa-info-circle" aria-hidden="true"></i> <strong> About
                                    the Room</strong></h6>
                        </label>
                        <textarea class="form-control mx-2" rows="5" id="about_the_room" name="about_the_room"
                            required> <?php echo $room_type_description; ?> </textarea>
                        <div class="valid-feedback">good</div>
                        <div class="invalid-feedback">fill-out</div>
                    </div>


                    <!-- Submit Button -->
                    <div class="row">
                        <input type="hidden" name="room_type_id" value="<?php echo $room_type_id ?>">
                        <div class="col-md mt-3 mb-3">
                            <button type="submit" name="Submit" class="btn btn-primary btn-large col-md-6 rounded"
                                value="Submit"> Add New Room Type</button>
                        </div>
                    </div>

                    <?php

                        }
                    }

                    ?>

                </form>


            </div>
        </div>

        <script src="../icon/svg-with-js/js/fontawesome-all.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/app/main.js"></script>
    </body>

</html>