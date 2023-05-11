<?php

include "../db.php";
SESSION_START();

if (!isset($_COOKIE['logged'])) {
    header('location: ../ha_login.php');
}

$hotel_admin_email = $_SESSION['email'];
$hotel_admin_id;
$hotel_id;

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

$hotel_name;
$contact_address;
$hotel_size;
$hotel_rating;
$hotel_country;
$hotel_city;
$hotel_subcity;
$hotel_img1;
$hotel_img2;
$hotel_img3;
$about_the_area;
$about_the_property;
$clean_and_safety;
$arrival_and_leaving;
$restriction_related;
$special_checkin;
$required_documents;
$children_and_pet;
$internet_and_parking;
$fees_and_policies;
$transfer_and_others;
$hotel_map;

while ($row = mysqli_fetch_assoc($result_hotel)) {
    $hotel_name = $row['hotel_name'];
    $contact_address = $row['contact_address'];
    $hotel_size = $row['hotel_size'];
    $hotel_rating = $row['hotel_rating'];
    $hotel_country = $row['hotel_country'];
    $hotel_city = $row['hotel_city'];
    $hotel_subcity = $row['hotel_subcity'];
    $hotel_img1 = $row['hotel_img1'];
    $hotel_img2 = $row['hotel_img2'];
    $hotel_img3 = $row['hotel_img3'];
    $about_the_area = $row['about_the_area'];
    $about_the_property = $row['about_the_property'];
    $hotel_amenities = $row['hotel_amenities'];
    $clean_and_safety = $row['clean_and_safety'];
    $arrival_and_leaving = $row['arrival_and_leaving'];
    $restriction_related = $row['restriction_related'];
    $special_checkin = $row['special_checkin'];
    $required_documents = $row['required_documents'];
    $children_and_pet = $row['children_and_pet'];
    $internet_and_parking = $row['internet_and_parking'];
    $fees_and_policies = $row['fees_and_policies'];
    $transfer_and_others = $row['transfer_and_others'];
    $hotel_map = $row['hotel_map'];
}

$array = explode(",", $hotel_amenities);

// Amenities
empty($array[0]) ? $hot_tube = 'NaN' : $hot_tube = $array[0];
empty($array[1]) ? $free_shuttle = 'NaN' : $free_shuttle = $array[1];
empty($array[2]) ? $spa = 'NaN' : $spa = $array[2];
empty($array[3]) ? $seaview = 'NaN' : $seaview = $array[3];
empty($array[4]) ? $petfriendly = 'NaN' : $petfriendly = $array[4];
empty($array[5]) ? $kitchen = 'NaN' : $kitchen = $array[5];
empty($array[6]) ? $free_wifi = 'NaN' : $free_wifi = $array[6];
empty($array[7]) ? $washer_and_dryer = 'NaN' : $washer_and_dryer = $array[7];
empty($array[8]) ? $parking = 'NaN' : $parking = $array[8];
empty($array[9]) ? $pool = 'NaN' : $pool = $array[9];
empty($array[10]) ? $water_park = 'NaN' : $water_park = $array[10];
empty($array[11]) ? $air_conditioned = 'NaN' : $air_conditioned = $array[11];
empty($array[12]) ? $electric_charge = 'NaN' : $electric_charge = $array[12];
empty($array[13]) ? $outdoor_space = 'NaN' : $outdoor_space = $array[13];
empty($array[14]) ? $restaurant = 'NaN' : $restaurant = $array[14];
empty($array[15]) ? $cots = 'NaN' : $cots = $array[15];
empty($array[16]) ? $gym = 'NaN' : $gym = $array[16];
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
                    <li><a href="ha_manage_rt.php"><i class="fas fa-laptop-house"></i> Manage Room Types</a></li>
                    <li><a href="ha_manage_room.php"><i class="fas fa-door-open"></i> Manage Rooms</a></li>
                    <li><a href="ha_manager_reservation.php"><i class="fas fa-bookmark"></i> Manage Reservations</a>
                    </li>
                    <li><a href="ha_manage_hotel_info.php" class="text-warning"><i class="fas fa-info-circle"></i>
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
            <h6 class="alert alert-primary"> <strong> Hotel ID: <?php echo $hotel_id; ?> </strong> </h6>
            <form class="was-validated bg-light border shadow p-3" action="ha_manage_hotel_info.php" method="POST"
                enctype="multipart/form-data" name="form">

                <?php
                    include '../db.php';
                    if (isset($_POST['Submit'])) {
                        $hotel_id = $_POST['hotel_id'];
                        $hotel_name = $_POST['hotel_name'];
                        $contact_address = $_POST['contact_address'];
                        $hotel_size = $_POST['hotel_size'];
                        $hotel_rating = $_POST['hotel_rating'];
                        $hotel_country = $_POST['hotel_country'];
                        $hotel_city = $_POST['hotel_city'];
                        $hotel_subcity = $_POST['hotel_subcity'];
                        $about_the_area = $_POST['about_the_area'];
                        $about_the_property = $_POST['about_the_property'];
                        $clean_and_safety = $_POST['clean_and_safety'];
                        $arrival_and_leaving = $_POST['arrival_and_leaving'];
                        $restriction_related = $_POST['restriction_related'];
                        $special_checkin = $_POST['special_checkin'];
                        $required_documents = $_POST['required_documents'];
                        $children_and_pet = $_POST['children_and_pet'];
                        $internet_and_parking = $_POST['internet_and_parking'];
                        $fees_and_policies = $_POST['fees_and_policies'];
                        $transfer_and_others = $_POST['transfer_and_others'];
                        $hotel_map = $_POST['hotel_map'];

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
                        $hotel_amenities = $hot_tube . "," . $free_shuttle . "," . $spa . "," . $seaview . "," . $petfriendly . "," . $kitchen . "," . $free_wifi . "," . $washer_and_dryer . "," . $parking . "," . $pool . "," . $water_park . "," . $air_conditioned . "," . $electric_charge . "," . $outdoor_space . "," . $restaurant . "," . $cots . "," . $gym;

                        //************** Hotel Image 1 *************/
                        $temp_hotel_img1 = $_FILES['hotel_img1']['name'];
                        $target_dir = "../hotels_image/";
                        $target_file = $target_dir . basename($_FILES["hotel_img1"]["name"]);

                        // Select file type
                        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                        // Valid file extensions
                        $extensions_arr = array("jpg", "jpeg");

                        ///**************/ Hotel Image 2  ****************//
                        $temp_hotel_img2 = $_FILES['hotel_img2']['name'];
                        $target_dir = "../hotels_image/";
                        $target_file2 = $target_dir . basename($_FILES["hotel_img2"]["name"]);

                        // Select file type
                        $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
                        // Valid file extensions
                        $extensions_arr2 = array("jpg", "jpeg");

                        ///************/ Hotel Image 3 ***********///
                        $temp_hotel_img3 = $_FILES['hotel_img3']['name'];
                        $target_dir = "../hotels_image/";
                        $target_file3 = $target_dir . basename($_FILES["hotel_img3"]["name"]);

                        // Select file type
                        $imageFileType3 = strtolower(pathinfo($target_file3, PATHINFO_EXTENSION));
                        // Valid file extensions
                        $extensions_arr3 = array("jpg", "jpeg");

                        //Check extension
                        if (in_array($imageFileType, $extensions_arr) && in_array($imageFileType2, $extensions_arr2) && in_array($imageFileType3, $extensions_arr3)) {

                            //*************** Upload file1 *************/
                            move_uploaded_file($_FILES['hotel_img1']['tmp_name'], $target_dir . $temp_hotel_img1);
                            $hotel_img1 = $hotel_name . '_' . 1 . '.jpg';
                            rename($target_dir . $temp_hotel_img1, $target_dir . $hotel_img1);

                            //*************** Upload file2 *************/
                            move_uploaded_file($_FILES['hotel_img2']['tmp_name'], $target_dir . $temp_hotel_img2);
                            $hotel_img2 = $hotel_name . '_' . 2 . '.jpg';
                            rename($target_dir . $temp_hotel_img2, $target_dir . $hotel_img2);

                            //*************** Upload file3 *************/
                            move_uploaded_file($_FILES['hotel_img3']['tmp_name'], $target_dir . $temp_hotel_img3);
                            $hotel_img3 = $hotel_name . '_' . 3 . '.jpg';
                            rename($target_dir . $temp_hotel_img3, $target_dir . $hotel_img3);



                            $query = "UPDATE hotels SET hotel_name = '$hotel_name', contact_address = '$contact_address', hotel_size = '$hotel_size', hotel_rating = '$hotel_rating', hotel_country = '$hotel_country', hotel_city = '$hotel_city', hotel_subcity = '$hotel_subcity', hotel_img1 = '$hotel_img1', hotel_img2 = '$hotel_img2', hotel_img3 = '$hotel_img3', about_the_area = '$about_the_area', about_the_property = '$about_the_property', hotel_amenities = '$hotel_amenities', clean_and_safety = '$clean_and_safety', arrival_and_leaving = '$arrival_and_leaving', restriction_related = '$restriction_related', special_checkin = '$special_checkin', required_documents = '$required_documents', children_and_pet ='$children_and_pet', internet_and_parking ='$internet_and_parking', fees_and_policies ='$fees_and_policies', transfer_and_others='$transfer_and_others', hotel_map = '$hotel_map' WHERE hotel_id = '$hotel_id' ";

                            if (mysqli_query($con, $query)) {
                                $msg = "You have Successfully updated hotel info";
                                echo ' <div class="alert alert-success" style="text-align: center"> <strong> ' . $msg . '</strong></div> ';
                            } else {
                                $msg = "Error Updating Hotel data";
                                echo ' <div class="alert alert-danger" style="text-align: center"> ' . $msg . '</div> ';
                            }
                        } else {
                            // File selection is not correct
                            $msg = "File selection isn't correct, ";
                            echo ' <div class="alert alert-danger" style="text-align: center"> ' . $msg . '</div> ';
                        }
                    }

                    ?>

                <!-- Hotel Name and Contact Address-->
                <div class="row mt-3">
                    <!-- Hotel Name -->
                    <div class="form-group mt-2 col-md-3 col-sm-12">
                        <label for="hotel_name">
                            <h6><b><i class="fa fa-h-square" aria-hidden="true"></i> Hotel Name</b></h6>
                        </label>
                        <input type="text" class="form-control" name="hotel_name" id="hotel_name"
                            placeholder="Enter Hotel Name" value="<?php echo $hotel_name; ?>" required>
                        <div class="valid-feedback">good</div>
                        <div class="invalid-feedback">fill-out</div>
                    </div>

                    <!-- Hotel Contant Address -->
                    <div class="form-group col-md-3 col-sm-12">
                        <label for="contact_address" class="form-label">
                            <h6><b><i class="fas fa-phone"></i> Contact Address</b></h6>
                        </label>
                        <input type="phone" class="form-control" name="contact_address" for="contact_address"
                            placeholder="Hotel Contact Address" value="<?php echo $contact_address; ?>" required>

                        <div class="valid-feedback">good</div>
                        <div class="invalid-feedback">fill-out</div>
                    </div>

                    <!-- Hotel Size -->
                    <div class="form-group col-md-3 col-sm-12">
                        <label for="hotel_size" class="form-label">
                            <h6><b><i class="fas fa-info"></i> Hotel Size (sq)</b></h6>
                        </label>
                        <input type="number" class="form-control" name="hotel_size" for="hotel_size"
                            placeholder="Hotel Size" value="<?php echo $hotel_size; ?>" required>

                        <div class="valid-feedback">good</div>
                        <div class="invalid-feedback">fill-out</div>
                    </div>

                    <!-- Hotel Type -->
                    <div class="form-group col-md-3 col-sm-12">
                        <label for="hotel_rating" class="form-label">
                            <h6><b><i class="fas fa-info"></i> Hotel Type(Rating)</b></h6>
                        </label>
                        <select name="hotel_rating" class='form-control' id="hotel_rating">
                            <Option name="hotel_rating" value="1"
                                <?php ($selected=($hotel_rating =="1" )  ? 'selected' : null); echo $selected; ?>>1
                                star</Option>
                            <Option name="hotel_rating" value="2"
                                <?php ($selected=($hotel_rating =="2" )  ? 'selected' : null); echo $selected; ?>>2
                                star</Option>
                            <Option name="hotel_rating" value="3"
                                <?php ($selected=($hotel_rating =="3" )  ? 'selected' : null); echo $selected; ?>>3
                                star</Option>
                            <Option name="hotel_rating" value="4"
                                <?php ($selected=($hotel_rating =="4" )  ? 'selected' : null); echo $selected; ?>>4
                                star</Option>
                            <Option name="hotel_rating" value="5"
                                <?php ($selected=($hotel_rating =="5" )  ? 'selected' : null); echo $selected; ?>>5
                                star</Option>
                        </select>

                        <div class="valid-feedback">good</div>
                        <div class="invalid-feedback">fill-out</div>
                    </div>
                </div>

                <!-- Hotel Address -->
                <div class="row mt-3">
                    <!-- Country -->
                    <h6> <i class="fa fa-map-marker"></i> <strong> Location </strong> </h6>
                    <br>
                    <div class="form-group mt-2 col-md">

                        <label for="hotel_country">
                            <h6><b> Country</b></h6>
                        </label>
                        <select name="hotel_country" class="form-control" id="hotel_country" required>
                            <option value="0" selected="selected">Select Country...
                            </option>
                            <optgroup id="country-optgroup-Africa" label="Africa">
                                <option value="DZ" label="Algeria">Algeria</option>
                                <option value="AO" label="Angola">Angola</option>
                                <option value="BJ" label="Benin">Benin</option>
                                <option value="BW" label="Botswana">Botswana</option>
                                <option value="BF" label="Burkina Faso">Burkina Faso</option>
                                <option value="BI" label="Burundi">Burundi</option>
                                <option value="CM" label="Cameroon">Cameroon</option>
                                <option value="CV" label="Cape Verde">Cape Verde</option>
                                <option value="CF" label="Central African Republic">Central African Republic
                                </option>
                                <option value="TD" label="Chad">Chad</option>
                                <option value="KM" label="Comoros">Comoros</option>
                                <option value="CG" label="Congo - Brazzaville">Congo - Brazzaville</option>
                                <option value="CD" label="Congo - Kinshasa">Congo - Kinshasa</option>
                                <option value="CI" label="Côte d’Ivoire">Côte d’Ivoire</option>
                                <option value="DJ" label="Djibouti">Djibouti</option>
                                <option value="EG" label="Egypt">Egypt</option>
                                <option value="GQ" label="Equatorial Guinea">Equatorial Guinea</option>
                                <option value="ER" label="Eritrea">Eritrea</option>
                                <option value="ET" label="Ethiopia">Ethiopia</option>
                                <option value="GA" label="Gabon">Gabon</option>
                                <option value="GM" label="Gambia">Gambia</option>
                                <option value="GH" label="Ghana">Ghana</option>
                                <option value="GN" label="Guinea">Guinea</option>
                                <option value="GW" label="Guinea-Bissau">Guinea-Bissau</option>
                                <option value="KE" label="Kenya">Kenya</option>
                                <option value="LS" label="Lesotho">Lesotho</option>
                                <option value="LR" label="Liberia">Liberia</option>
                                <option value="LY" label="Libya">Libya</option>
                                <option value="MG" label="Madagascar">Madagascar</option>
                                <option value="MW" label="Malawi">Malawi</option>
                                <option value="ML" label="Mali">Mali</option>
                                <option value="MR" label="Mauritania">Mauritania</option>
                                <option value="MU" label="Mauritius">Mauritius</option>
                                <option value="YT" label="Mayotte">Mayotte</option>
                                <option value="MA" label="Morocco">Morocco</option>
                                <option value="MZ" label="Mozambique">Mozambique</option>
                                <option value="NA" label="Namibia">Namibia</option>
                                <option value="NE" label="Niger">Niger</option>
                                <option value="NG" label="Nigeria">Nigeria</option>
                                <option value="RW" label="Rwanda">Rwanda</option>
                                <option value="RE" label="Réunion">Réunion</option>
                                <option value="SH" label="Saint Helena">Saint Helena</option>
                                <option value="SN" label="Senegal">Senegal</option>
                                <option value="SC" label="Seychelles">Seychelles</option>
                                <option value="SL" label="Sierra Leone">Sierra Leone</option>
                                <option value="SO" label="Somalia">Somalia</option>
                                <option value="ZA" label="South Africa">South Africa</option>
                                <option value="SD" label="Sudan">Sudan</option>
                                <option value="SZ" label="Swaziland">Swaziland</option>
                                <option value="ST" label="São Tomé and Príncipe">São Tomé and Príncipe</option>
                                <option value="TZ" label="Tanzania">Tanzania</option>
                                <option value="TG" label="Togo">Togo</option>
                                <option value="TN" label="Tunisia">Tunisia</option>
                                <option value="UG" label="Uganda">Uganda</option>
                                <option value="EH" label="Western Sahara">Western Sahara</option>
                                <option value="ZM" label="Zambia">Zambia</option>
                                <option value="ZW" label="Zimbabwe">Zimbabwe</option>
                            </optgroup>
                            <optgroup id="country-optgroup-Americas" label="Americas">
                                <option value="AI" label="Anguilla">Anguilla</option>
                                <option value="AG" label="Antigua and Barbuda">Antigua and Barbuda</option>
                                <option value="AR" label="Argentina">Argentina</option>
                                <option value="AW" label="Aruba">Aruba</option>
                                <option value="BS" label="Bahamas">Bahamas</option>
                                <option value="BB" label="Barbados">Barbados</option>
                                <option value="BZ" label="Belize">Belize</option>
                                <option value="BM" label="Bermuda">Bermuda</option>
                                <option value="BO" label="Bolivia">Bolivia</option>
                                <option value="BR" label="Brazil">Brazil</option>
                                <option value="VG" label="British Virgin Islands">British Virgin Islands
                                </option>
                                <option value="CA" label="Canada">Canada</option>
                                <option value="KY" label="Cayman Islands">Cayman Islands</option>
                                <option value="CL" label="Chile">Chile</option>
                                <option value="CO" label="Colombia">Colombia</option>
                                <option value="CR" label="Costa Rica">Costa Rica</option>
                                <option value="CU" label="Cuba">Cuba</option>
                                <option value="DM" label="Dominica">Dominica</option>
                                <option value="DO" label="Dominican Republic">Dominican Republic</option>
                                <option value="EC" label="Ecuador">Ecuador</option>
                                <option value="SV" label="El Salvador">El Salvador</option>
                                <option value="FK" label="Falkland Islands">Falkland Islands</option>
                                <option value="GF" label="French Guiana">French Guiana</option>
                                <option value="GL" label="Greenland">Greenland</option>
                                <option value="GD" label="Grenada">Grenada</option>
                                <option value="GP" label="Guadeloupe">Guadeloupe</option>
                                <option value="GT" label="Guatemala">Guatemala</option>
                                <option value="GY" label="Guyana">Guyana</option>
                                <option value="HT" label="Haiti">Haiti</option>
                                <option value="HN" label="Honduras">Honduras</option>
                                <option value="JM" label="Jamaica">Jamaica</option>
                                <option value="MQ" label="Martinique">Martinique</option>
                                <option value="MX" label="Mexico">Mexico</option>
                                <option value="MS" label="Montserrat">Montserrat</option>
                                <option value="AN" label="Netherlands Antilles">Netherlands Antilles</option>
                                <option value="NI" label="Nicaragua">Nicaragua</option>
                                <option value="PA" label="Panama">Panama</option>
                                <option value="PY" label="Paraguay">Paraguay</option>
                                <option value="PE" label="Peru">Peru</option>
                                <option value="PR" label="Puerto Rico">Puerto Rico</option>
                                <option value="BL" label="Saint Barthélemy">Saint Barthélemy</option>
                                <option value="KN" label="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                <option value="LC" label="Saint Lucia">Saint Lucia</option>
                                <option value="MF" label="Saint Martin">Saint Martin</option>
                                <option value="PM" label="Saint Pierre and Miquelon">Saint Pierre and Miquelon
                                </option>
                                <option value="VC" label="Saint Vincent and the Grenadines">Saint Vincent and
                                    the
                                    Grenadines</option>
                                <option value="SR" label="Suriname">Suriname</option>
                                <option value="TT" label="Trinidad and Tobago">Trinidad and Tobago</option>
                                <option value="TC" label="Turks and Caicos Islands">Turks and Caicos Islands
                                </option>
                                <option value="VI" label="U.S. Virgin Islands">U.S. Virgin Islands</option>
                                <option value="US" label="United States">United States</option>
                                <option value="UY" label="Uruguay">Uruguay</option>
                                <option value="VE" label="Venezuela">Venezuela</option>
                            </optgroup>
                            <optgroup id="country-optgroup-Asia" label="Asia">
                                <option value="AF" label="Afghanistan">Afghanistan</option>
                                <option value="AM" label="Armenia">Armenia</option>
                                <option value="AZ" label="Azerbaijan">Azerbaijan</option>
                                <option value="BH" label="Bahrain">Bahrain</option>
                                <option value="BD" label="Bangladesh">Bangladesh</option>
                                <option value="BT" label="Bhutan">Bhutan</option>
                                <option value="BN" label="Brunei">Brunei</option>
                                <option value="KH" label="Cambodia">Cambodia</option>
                                <option value="CN" label="China">China</option>
                                <option value="GE" label="Georgia">Georgia</option>
                                <option value="HK" label="Hong Kong SAR China">Hong Kong SAR China</option>
                                <option value="IN" label="India">India</option>
                                <option value="ID" label="Indonesia">Indonesia</option>
                                <option value="IR" label="Iran">Iran</option>
                                <option value="IQ" label="Iraq">Iraq</option>
                                <option value="IL" label="Israel">Israel</option>
                                <option value="JP" label="Japan">Japan</option>
                                <option value="JO" label="Jordan">Jordan</option>
                                <option value="KZ" label="Kazakhstan">Kazakhstan</option>
                                <option value="KW" label="Kuwait">Kuwait</option>
                                <option value="KG" label="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="LA" label="Laos">Laos</option>
                                <option value="LB" label="Lebanon">Lebanon</option>
                                <option value="MO" label="Macau SAR China">Macau SAR China</option>
                                <option value="MY" label="Malaysia">Malaysia</option>
                                <option value="MV" label="Maldives">Maldives</option>
                                <option value="MN" label="Mongolia">Mongolia</option>
                                <option value="MM" label="Myanmar [Burma]">Myanmar [Burma]</option>
                                <option value="NP" label="Nepal">Nepal</option>
                                <option value="NT" label="Neutral Zone">Neutral Zone</option>
                                <option value="KP" label="North Korea">North Korea</option>
                                <option value="OM" label="Oman">Oman</option>
                                <option value="PK" label="Pakistan">Pakistan</option>
                                <option value="PS" label="Palestinian Territories">Palestinian Territories
                                </option>
                                <option value="YD" label="People's Democratic Republic of Yemen">People's
                                    Democratic
                                    Republic of Yemen</option>
                                <option value="PH" label="Philippines">Philippines</option>
                                <option value="QA" label="Qatar">Qatar</option>
                                <option value="SA" label="Saudi Arabia">Saudi Arabia</option>
                                <option value="SG" label="Singapore">Singapore</option>
                                <option value="KR" label="South Korea">South Korea</option>
                                <option value="LK" label="Sri Lanka">Sri Lanka</option>
                                <option value="SY" label="Syria">Syria</option>
                                <option value="TW" label="Taiwan">Taiwan</option>
                                <option value="TJ" label="Tajikistan">Tajikistan</option>
                                <option value="TH" label="Thailand">Thailand</option>
                                <option value="TL" label="Timor-Leste">Timor-Leste</option>
                                <option value="TR" label="Turkey">Turkey</option>
                                <option value="TM" label="Turkmenistan">Turkmenistan</option>
                                <option value="AE" label="United Arab Emirates">United Arab Emirates</option>
                                <option value="UZ" label="Uzbekistan">Uzbekistan</option>
                                <option value="VN" label="Vietnam">Vietnam</option>
                                <option value="YE" label="Yemen">Yemen</option>
                            </optgroup>
                            <optgroup id="country-optgroup-Europe" label="Europe">
                                <option value="AL" label="Albania">Albania</option>
                                <option value="AD" label="Andorra">Andorra</option>
                                <option value="AT" label="Austria">Austria</option>
                                <option value="BY" label="Belarus">Belarus</option>
                                <option value="BE" label="Belgium">Belgium</option>
                                <option value="BA" label="Bosnia and Herzegovina">Bosnia and Herzegovina
                                </option>
                                <option value="BG" label="Bulgaria">Bulgaria</option>
                                <option value="HR" label="Croatia">Croatia</option>
                                <option value="CY" label="Cyprus">Cyprus</option>
                                <option value="CZ" label="Czech Republic">Czech Republic</option>
                                <option value="DK" label="Denmark">Denmark</option>
                                <option value="DD" label="East Germany">East Germany</option>
                                <option value="EE" label="Estonia">Estonia</option>
                                <option value="FO" label="Faroe Islands">Faroe Islands</option>
                                <option value="FI" label="Finland">Finland</option>
                                <option value="FR" label="France">France</option>
                                <option value="DE" label="Germany">Germany</option>
                                <option value="GI" label="Gibraltar">Gibraltar</option>
                                <option value="GR" label="Greece">Greece</option>
                                <option value="GG" label="Guernsey">Guernsey</option>
                                <option value="HU" label="Hungary">Hungary</option>
                                <option value="IS" label="Iceland">Iceland</option>
                                <option value="IE" label="Ireland">Ireland</option>
                                <option value="IM" label="Isle of Man">Isle of Man</option>
                                <option value="IT" label="Italy">Italy</option>
                                <option value="JE" label="Jersey">Jersey</option>
                                <option value="LV" label="Latvia">Latvia</option>
                                <option value="LI" label="Liechtenstein">Liechtenstein</option>
                                <option value="LT" label="Lithuania">Lithuania</option>
                                <option value="LU" label="Luxembourg">Luxembourg</option>
                                <option value="MK" label="Macedonia">Macedonia</option>
                                <option value="MT" label="Malta">Malta</option>
                                <option value="FX" label="Metropolitan France">Metropolitan France</option>
                                <option value="MD" label="Moldova">Moldova</option>
                                <option value="MC" label="Monaco">Monaco</option>
                                <option value="ME" label="Montenegro">Montenegro</option>
                                <option value="NL" label="Netherlands">Netherlands</option>
                                <option value="NO" label="Norway">Norway</option>
                                <option value="PL" label="Poland">Poland</option>
                                <option value="PT" label="Portugal">Portugal</option>
                                <option value="RO" label="Romania">Romania</option>
                                <option value="RU" label="Russia">Russia</option>
                                <option value="SM" label="San Marino">San Marino</option>
                                <option value="RS" label="Serbia">Serbia</option>
                                <option value="CS" label="Serbia and Montenegro">Serbia and Montenegro</option>
                                <option value="SK" label="Slovakia">Slovakia</option>
                                <option value="SI" label="Slovenia">Slovenia</option>
                                <option value="ES" label="Spain">Spain</option>
                                <option value="SJ" label="Svalbard and Jan Mayen">Svalbard and Jan Mayen
                                </option>
                                <option value="SE" label="Sweden">Sweden</option>
                                <option value="CH" label="Switzerland">Switzerland</option>
                                <option value="UA" label="Ukraine">Ukraine</option>
                                <option value="SU" label="Union of Soviet Socialist Republics">Union of Soviet
                                    Socialist Republics</option>
                                <option value="GB" label="United Kingdom">United Kingdom</option>
                                <option value="VA" label="Vatican City">Vatican City</option>
                                <option value="AX" label="Åland Islands">Åland Islands</option>
                            </optgroup>
                            <optgroup id="country-optgroup-Oceania" label="Oceania">
                                <option value="AS" label="American Samoa">American Samoa</option>
                                <option value="AQ" label="Antarctica">Antarctica</option>
                                <option value="AU" label="Australia">Australia</option>
                                <option value="BV" label="Bouvet Island">Bouvet Island</option>
                                <option value="IO" label="British Indian Ocean Territory">British Indian Ocean
                                    Territory</option>
                                <option value="CX" label="Christmas Island">Christmas Island</option>
                                <option value="CC" label="Cocos [Keeling] Islands">Cocos [Keeling] Islands
                                </option>
                                <option value="CK" label="Cook Islands">Cook Islands</option>
                                <option value="FJ" label="Fiji">Fiji</option>
                                <option value="PF" label="French Polynesia">French Polynesia</option>
                                <option value="TF" label="French Southern Territories">French Southern
                                    Territories
                                </option>
                                <option value="GU" label="Guam">Guam</option>
                                <option value="HM" label="Heard Island and McDonald Islands">Heard Island and
                                    McDonald Islands</option>
                                <option value="KI" label="Kiribati">Kiribati</option>
                                <option value="MH" label="Marshall Islands">Marshall Islands</option>
                                <option value="FM" label="Micronesia">Micronesia</option>
                                <option value="NR" label="Nauru">Nauru</option>
                                <option value="NC" label="New Caledonia">New Caledonia</option>
                                <option value="NZ" label="New Zealand">New Zealand</option>
                                <option value="NU" label="Niue">Niue</option>
                                <option value="NF" label="Norfolk Island">Norfolk Island</option>
                                <option value="MP" label="Northern Mariana Islands">Northern Mariana Islands
                                </option>
                                <option value="PW" label="Palau">Palau</option>
                                <option value="PG" label="Papua New Guinea">Papua New Guinea</option>
                                <option value="PN" label="Pitcairn Islands">Pitcairn Islands</option>
                                <option value="WS" label="Samoa">Samoa</option>
                                <option value="SB" label="Solomon Islands">Solomon Islands</option>
                                <option value="GS" label="South Georgia and the South Sandwich Islands">South
                                    Georgia and the South Sandwich Islands</option>
                                <option value="TK" label="Tokelau">Tokelau</option>
                                <option value="TO" label="Tonga">Tonga</option>
                                <option value="TV" label="Tuvalu">Tuvalu</option>
                                <option value="UM" label="U.S. Minor Outlying Islands">U.S. Minor Outlying
                                    Islands
                                </option>
                                <option value="VU" label="Vanuatu">Vanuatu</option>
                                <option value="WF" label="Wallis and Futuna">Wallis and Futuna</option>
                            </optgroup>
                        </select>
                        <div class="valid-feedback">good</div>
                        <div class="invalid-feedback">fill-out</div>
                    </div>

                    <!-- City-->
                    <div class="form-group col-md">
                        <label for="hotel_city" class="form-label">
                            <h6><b>City</b></h6>
                        </label>
                        <input type="text" class="form-control" name="hotel_city" for="hotel_city"
                            placeholder="Hotel City" value="<?php echo $hotel_city; ?>" required>

                        <div class="valid-feedback">good</div>
                        <div class="invalid-feedback">fill-out</div>
                    </div>

                    <!-- Subcity -->
                    <div class="form-group col-md">
                        <label for="hotel_subcity" class="form-label">
                            <h6><b>Subcity</b></h6>
                        </label>
                        <input type="text" class="form-control" name="hotel_subcity" for="hotel_subcity"
                            placeholder="Hotel Subcity" value="<?php echo $hotel_subcity; ?>" required>

                        <div class="valid-feedback">good</div>
                        <div class="invalid-feedback">fill-out</div>
                    </div>

                    <!-- Map -->
                    <div class="form-group col-md">
                        <label for="hotel_map" class="form-label">
                            <h6><b>Map</b></h6>
                        </label>
                        <input type="url" class="form-control" name="hotel_map" for="hotel_map" placeholder="Hotel Map"
                            value="<?php echo $hotel_map; ?>" required>

                        <div class="valid-feedback">good</div>
                        <div class="invalid-feedback">fill-out</div>
                    </div>


                </div>

                <!-- Hotel Picture -->
                <div class="row mt-3">
                    <!-- Hotel Picture -->
                    <h6> <i class="fa fa-camera-retro"></i> <strong> Upload Hotel Picture </strong> </h6>
                    <p>Recommended Size (1000px * 500px)</p>
                    <br>

                    <!-- Upload Picture 1-->
                    <div class="form-group col-md-4 col-sm-12">
                        <input type="file" class="form-control" name="hotel_img1" for="hotel_img1"
                            value="<?php $hotel_img1?>" placeholder="Upload hotel image">

                        <div class="valid-feedback">good</div>
                        <div class="invalid-feedback">fill-out</div>
                    </div>

                    <!-- Upload Picture 2-->
                    <div class="form-group col-md-4 col-sm-12">
                        <input type="file" class="form-control" name="hotel_img2" for="hotel_img2"
                            placeholder="Upload hotel image">

                        <div class="valid-feedback">good</div>
                        <div class="invalid-feedback">fill-out</div>
                    </div>

                    <!-- Upload Picture 3-->
                    <div class="form-group col-md-4 col-sm-12">
                        <input type="file" class="form-control" name="hotel_img3" for="hotel_img3"
                            placeholder="Upload hotel image">

                        <div class="valid-feedback">good</div>
                        <div class="invalid-feedback">fill-out</div>
                    </div>
                </div>

                <!-- About the Area -->
                <div class="row mt-3">
                    <label for="about_the_area">
                        <h6><i class="fa fa-info-circle" aria-hidden="true"></i> <strong> About
                                the Area</strong></h6>
                    </label>
                    <textarea class="form-control mx-2" rows="5" id="about_the_area" name="about_the_area"
                        required> <?php echo $about_the_area; ?> </textarea>
                    <div class="valid-feedback">good</div>
                    <div class="invalid-feedback">fill-out</div>
                </div>

                <!-- About the Property -->
                <div class="row mt-3">
                    <label for="about_the_property">
                        <h6><i class="fa fa-info-circle" aria-hidden="true"></i> <strong> About
                                the Property</strong></h6>
                    </label>
                    <textarea class="form-control mx-2" rows="5" id="about_the_property" name="about_the_property"
                        required>  <?php echo $about_the_property; ?> </textarea>
                    <div class="valid-feedback">good</div>
                    <div class="invalid-feedback">fill-out</div>
                </div>
                <br>

                <!-- Hotel Amenities -->
                <h6> <strong>Hotel Amenities </strong> </h6>
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
                            <input class="form-check-input border-primary" type="checkbox" id="seaview" name="seaview"
                                value="seaview" <?php ($status=($seaview !="NaN" ) ? 'checked' :
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
                            <input class="form-check-input border-primary" type="checkbox" id="kitchen" name="kitchen"
                                value="kitchen" <?php ($status=($kitchen !="NaN" ) ? 'checked' :
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
                            <input class="form-check-input border-primary" type="checkbox" id="parking" name="parking"
                                value="parking" <?php ($status=($parking !="NaN" ) ? 'checked' :
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
                <br>

                <!-- Rules and Regulations -->
                <h6> <strong>Rules & Regulations </strong> </h6>
                <div class="px-5 border border-black shadow">
                    <!-- Cleaning & Safety practices -->
                    <div class="row mt-3">
                        <label for="clean_and_safety">
                            <h6><i class="fa fa-shield" aria-hidden="true"></i> <strong> Cleaning & Safety
                                    practices</strong></h6>
                        </label>
                        <textarea class="form-control mx-2" rows="5" id="clean_and_safety" name="clean_and_safety"
                            required>  <?php echo $clean_and_safety; ?> </textarea>
                        <div class="valid-feedback">good</div>
                        <div class="invalid-feedback">fill-out</div>
                    </div>

                    <!-- Arrival & Leaving -->
                    <div class="row mt-3">
                        <label for="arrival_and_leaving">
                            <h6><i class="fa fa-calendar" aria-hidden="true"></i> <strong> Arrival & Leaving
                                </strong>
                            </h6>
                        </label>
                        <textarea class="form-control mx-2" rows="5" id="arrival_and_leaving" name="arrival_and_leaving"
                            required>  <?php echo $arrival_and_leaving; ?> </textarea>
                        <div class="valid-feedback">good</div>
                        <div class="invalid-feedback">fill-out</div>
                    </div>

                    <!-- Restriction Related to Stay -->
                    <div class="row mt-3">
                        <label for="restriction_related">
                            <h6><i class="fa fa-user-times" aria-hidden="true"></i> <strong> Restriction Related to
                                    Stay
                                </strong>
                            </h6>
                        </label>
                        <textarea class="form-control mx-2" rows="5" id="restriction_related" name="restriction_related"
                            required>  <?php echo $restriction_related; ?> </textarea>
                        <div class="valid-feedback">good</div>
                        <div class="invalid-feedback">fill-out</div>
                    </div>

                    <!-- Special Check in Instruction -->
                    <div class="row mt-3">
                        <label for="special_checkin">
                            <h6><i class="fa fa-certificate" aria-hidden="true"></i> <strong> Special Check in
                                    Instruction
                                </strong>
                            </h6>
                        </label>
                        <textarea class="form-control mx-2" rows="5" id="special_checkin" name="special_checkin"
                            required>  <?php echo $special_checkin; ?> </textarea>
                        <div class="valid-feedback">good</div>
                        <div class="invalid-feedback">fill-out</div>
                    </div>

                    <!-- Required Documents at checkin -->
                    <div class="row mt-3">
                        <label for="required_documents">
                            <h6><i class="fa fa-id-card" aria-hidden="true"></i> <strong> Required Documents at
                                    check in
                                </strong>
                            </h6>
                        </label>
                        <textarea class="form-control mx-2" rows="5" id="required_documents" name="required_documents"
                            required>  <?php echo $required_documents; ?>  </textarea>
                        <div class="valid-feedback">good</div>
                        <div class="invalid-feedback">fill-out</div>
                    </div>

                    <!-- Children and Pet -->
                    <div class="row mt-3">
                        <label for="children_and_pet">
                            <h6><i class="fa fa-child" aria-hidden="true"></i> <strong> Children & Pet</strong>
                            </h6>
                        </label>
                        <textarea class="form-control mx-2" rows="5" id="children_and_pet" name="children_and_pet"
                            required>  <?php echo $children_and_pet; ?> </textarea>
                        <div class="valid-feedback">good</div>
                        <div class="invalid-feedback">fill-out</div>
                    </div>

                    <!-- Internet and Parking -->
                    <div class="row mt-3">
                        <label for="internet_and_parking">
                            <h6><i class="fa fa-wifi" aria-hidden="true"></i> <strong> Internet & Parking</strong>
                            </h6>
                        </label>
                        <textarea class="form-control mx-2" rows="5" id="internet_and_parking"
                            name="internet_and_parking" required>  <?php echo $internet_and_parking; ?> </textarea>
                        <div class="valid-feedback">good</div>
                        <div class="invalid-feedback">fill-out</div>
                    </div>

                    <!-- Fees & Policies -->
                    <div class="row mt-3">
                        <label for="fees_and_policies">
                            <h6><i class="fa fa-credit-card" aria-hidden="true"></i> <strong> Fees &
                                    Policies</strong>
                            </h6>
                        </label>
                        <textarea class="form-control mx-2" rows="5" id="fees_and_policies" name="fees_and_policies"
                            required>  <?php echo $fees_and_policies; ?> </textarea>
                        <div class="valid-feedback">good</div>
                        <div class="invalid-feedback">fill-out</div>
                    </div>

                    <!-- Transfer and Other Info -->
                    <div class="row mt-3">
                        <label for="transfer_and_others">
                            <h6><i class="fa fa-exchange" aria-hidden="true"></i> <strong> Transfer & Other
                                    Info</strong>
                            </h6>
                        </label>
                        <textarea class="form-control mx-2" rows="5" id="transfer_and_others" name="transfer_and_others"
                            required>  <?php echo $transfer_and_others; ?> </textarea>
                        <div class="valid-feedback">good</div>
                        <div class="invalid-feedback">fill-out</div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="row">
                    <input type="hidden" name="hotel_id" value="<?php echo $hotel_id ?>">
                    <div class="col-md mt-3 mb-3">
                        <button type="submit" name="Submit" class="btn btn-primary btn-large col-md-6 rounded"
                            value="Submit">Update Hotel Info</button>
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