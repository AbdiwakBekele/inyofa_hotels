<?php
SESSION_START();
?>

<!DOCTYPE html>
<html lang="en">

<?php 
     require('db.php');
    $city = "";
    $sort = "";
    $max_price = "";
    $rental_subcity = "";

     $q_rentals = "SELECT * FROM rental WHERE isApproved = '1' ";

     if(isset($_POST['city'])){
        $city = $_POST['city'];
        $q_rentals = "SELECT * FROM rental WHERE isApproved = '1' AND rental_city LIKE '%$city%'";
     }

    // Sorting
     if(isset($_POST['sort'])){
        $sort = $_POST['sort'];
        $city = $_POST['city'];
        $q_rentals = "SELECT * FROM rental WHERE isApproved = '1' AND rental_city LIKE '%$city%' ORDER BY $sort ";
    }

    // Price
    if(isset($_POST['price_per_month'] )){
        $rental_price = intval($_POST['price_per_month']);
        $city = $_POST['city'];

    

        $min_price;
        $max_price;
        if($rental_price == 1000){
            $min_price = 0;
            $max_price = 1000;
        }
        else if($rental_price == 2000){
            $min_price = 1000;
            $max_price = 2000;
        }
        else if($rental_price == 3000){
            $min_price = 2000;
            $max_price = 3000;
        }
        else if($rental_price == 4000){
            $min_price = 3000;
            $max_price = 4000;
        }
        else if($rental_price == 4001){
            $min_price = 4000;
            $max_price = 100001;
        }else{
            $min_price = 0;
            $max_price = 100000;
        }
        
        $q_rentals = "SELECT * FROM rental
         WHERE isApproved = '1' AND rental_city LIKE '%$city%' 
         AND rental_price > $min_price 
         AND rental_price <= $max_price ";
    }

    // Area | Subcity
    if( isset($_POST['area']) ){
        
        $rental_subcity = $_POST['area'];
        $city = $_POST['city'];
        $q_rentals = "SELECT * FROM rental
         WHERE isApproved = '1' AND rental_city LIKE '%$city%' 
         AND rental_subcity LIKE '%$rental_subcity%' ";
    }

     
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> INYOFA | In Your Favor</title>
    <link rel="icon" href="favicon.png" sizes="16x16" type="icon/png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/line-awesome.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/flatpicker.css">
    <link rel="stylesheet" href="assets/css/intlTelInput.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <style>
    .icon_location {
        padding: 12px;
        padding-left: 35px;
        background: url("icon/location_sm.png") no-repeat 2%;
        background-size: 20px;
        font-size: 15px;
    }

    .icon_date {
        padding: 12px;
        padding-left: 35px;
        background: url("icon/calendar_sm.png") no-repeat 2%;
        background-size: 20px;
        font-size: 15px;
    }

    .icon_traveller {
        padding: 12px;
        padding-left: 35px;
        background: url("icon/people_sm.png") no-repeat 2%;
        background-size: 20px;
        font-size: 15px;
    }

    .traveler-input {
        /* display: flex;
            align-items: center; */
        position: relative;
    }

    .traveler-btn {
        cursor: pointer;
        text-align: left;
        transition: all 0.3s;
    }


    .traveler-popup {
        position: absolute;
        top: 100%;
        left: 0;
        display: none;
        z-index: 9999;
        width: 300px;
        background-color: #fff;
        border: 1px solid #ddd;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.2);
        border-radius: 4px;
    }

    .popup-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    .popup-title {
        font-size: 16px;
        font-weight: bold;
    }

    .popup-close {
        font-size: 20px;
        font-weight: bold;
        color: #ddd;
        cursor: pointer;
        border: none;
        background-color: transparent;
    }

    .popup-close:hover {
        color: #0071c2;
    }

    .popup-body {
        padding: 10px;
    }

    .popup-group {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .popup-label {
        font-size: 14px;
        font-weight: bold;
        margin-right: 10px;
    }

    .popup-controls {
        display: flex;
        align-items: center;
    }

    .popup-input {
        width: 50px;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px;
        text-align: center;
        font-size: 14px;
        margin: 0 10px;
    }

    #remove_room_btn,
    #remove_room_btn2,
    #remove_room_btn3,
    #remove_room_btn4,
    #remove_room_btn5,
    #pop_body2,
    #pop_body3,
    #pop_body4,
    #pop_body5 {
        display: none;
    }
    </style>
</head>

<body>
    <!-- Navigation -->
    <header class="header-style-01">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #336699;">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="assets/img/logo_white.png" alt="Logo" width="120px">
                </a>

                <div class="navbar-toggler text-center" style="border: none;" type="button" data-bs-toggle="collapse"
                    data-bs-target="#">

                    <span class="fa fa-user-circle text-white ms-5" data-bs-toggle="modal" data-bs-target="#myModal">
                    </span>
                    <!-- Modal -->
                    <div class="modal my-5" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">

                                    <?php 
                            require('db.php');
                            if (isset($_SESSION['user_email'])){
                            
                                // retrieve user's name from database using email
                                $email = $_SESSION['user_email'];
                                $query = "SELECT user_fullname FROM user_customer WHERE user_email = '$email'";
                                $result = mysqli_query($con, $query);
                                $row = mysqli_fetch_assoc($result);
                            
                                if ($row) {
                                    // user found, display their name
                                    $name = $row['user_fullname'];
                                    ?>
                                    <a class="nav-link text-primary" style="font-size: 17px"
                                        href="user_customer/user_customer_logout.php">
                                        <i class="fa fa-user mx-1" aria-hidden="true"></i> <?php echo $name ?> |
                                        Logout</a>

                                    <?php
                                    } else {
                                        ?>
                                    <form action="user_customer/user_customer_login.php">
                                        <button class="btn btn-primary rounded-pill w-100 text-center m-2"
                                            type="submit"><strong>Sign in</strong></button>
                                    </form>

                                    <a class="text-primary text-center m-2"
                                        href="user_customer/user_customer_logout.php" style="font-size: 15px">
                                        <strong>Sign up, it's
                                            free</strong> </a>

                                    <?php
                                    }
                                } else {
                                    // user is not logged in
                                    ?>

                                    <form action="user_customer/user_customer_login.php">
                                        <button class="btn btn-primary rounded-pill w-100 text-center m-2"
                                            type="submit"><strong>Sign in</strong></button>
                                    </form>

                                    <a class="text-primary text-center m-2"
                                        href="user_customer/user_customer_logout.php" style="font-size: 15px">
                                        <strong>Sign up, it's
                                            free</strong> </a>
                                    <?php
                                }
                            ?>
                                    <hr>

                                    <div class="text-start">
                                        <a class="text-dark text-center m-2" href="list_your_property.php"
                                            style="font-size: 15px; text-decoration: none;">
                                            <strong>List your property </strong>
                                        </a>
                                    </div>
                                    <hr>

                                    <div class="text-start">
                                        <a class="text-dark text-center m-2" href="about_us.php"
                                            style="font-size: 15px; text-decoration: none;">
                                            <strong> About Us </strong>
                                        </a>
                                    </div>

                                    <hr>

                                    <div class="text-start">
                                        <a class="text-dark text-center m-2" href="term_and_policy.php"
                                            style="font-size: 15px; text-decoration: none;">
                                            <strong>Term and Policy </strong>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Second line -->
                <div class="navbar-toggler text-center mx-2 my-2" style="border: none;" type="button">

                    <a href="index.php" class="text-white mx-2 p-2 border border-white rounded-pill"
                        style="font-size: 15px; text-decoration: none;"><span
                            class="fa fa-home text-white mx-2"></span>Home </a>

                    <a href="rental.php" class="text-white mx-2 p-2 "
                        style="font-size: 15px; text-decoration: none; "><span
                            class="fa fa-building text-white mx-2"></span>Rental </a>

                    <a href="flight.php" class="text-white mx-2 p-2  "
                        style="font-size: 15px; text-decoration: none; "><span
                            class="fa fa-plane text-white mx-2"></span>Flight </a>

                </div>

                <div class="collapse navbar-collapse justify-content-center" id="mynavbar">
                    <!-- List of Nav -->
                    <ul class="navbar-nav me-5">
                        <!-- Home -->
                        <li class="nav-item me-5">
                            <a class="nav-link text-white" href="index.php"> <i class="fa fa-home mx-1"
                                    aria-hidden="true"></i>
                                Home</a>
                        </li>
                        <!-- Rental -->
                        <li class="nav-item me-5">
                            <a class="nav-link text-white" href="rental.php"> <i class="fa fa-building mx-1"
                                    aria-hidden="true"></i> Rental</a>
                        </li>
                        <!-- Flight -->
                        <li class="nav-item me-5">
                            <a class="nav-link text-white" href="flight.php"> <i class="fa fa-plane mx-1"
                                    aria-hidden="true"></i>
                                Flight</a>
                        </li>
                        <!-- About us -->
                        <li class="nav-item me-5">
                            <a class="nav-link text-white " href="about_us.php"> <i class="fa fa-info-circle mx-1"
                                    aria-hidden="true"></i> About Us</a>
                        </li>
                        <!-- List Your Properties -->
                        <li class="nav-item me-5">
                            <a class="nav-link text-white" href="list_your_property.php"> <i class="fa fa-list-alt mx-1"
                                    aria-hidden="true"></i> List your property</a>
                        </li>
                        <!-- Login | Register -->
                        <li class="nav-item me-5">
                            <?php 
                            require('db.php');
                            if (isset($_SESSION['user_email'])){
                            
                                // retrieve user's name from database using email
                                $email = $_SESSION['user_email'];
                                $query = "SELECT user_fullname FROM user_customer WHERE user_email = '$email'";
                                $result = mysqli_query($con, $query);
                                $row = mysqli_fetch_assoc($result);
                            
                                if ($row) {
                                    // user found, display their name
                                    $name = $row['user_fullname'];
                                    ?>
                            <a class="nav-link text-white" href="user_customer/user_customer_logout.php">
                                <i class="fa fa-user mx-1" aria-hidden="true"></i> <?php echo $name ?> | Logout</a>

                            <?php
                                } else {
                            ?>

                            <a class="nav-link text-white" href="user_customer/user_customer_login.php">
                                <i class="fa fa-user mx-1" aria-hidden="true"></i> Login | Register</a>

                            <?php
                                    }
                                } else {
                            ?>

                            <a class="nav-link text-white" href="user_customer/user_customer_login.php">
                                <i class="fa fa-user mx-1" aria-hidden="true"></i> Login | Register</a>
                            <?php
                                }
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-4">
        <div class="row">
            <!-- Where to -->
            <form action="rental.php" method="post">
                <!-- Location -->
                <p class="h3 text-dark"> <strong>Where to?</strong> </p>

                <div class="row">
                    <!-- Location -->
                    <div class="col-md mt-2">
                        <input type="text" name="city"
                            class="form-control form-control-lg border border-dark icon_location"
                            placeholder="Going to..." required>
                    </div>

                    <!-- Checkin Date -->
                    <div class="col-md mt-2">
                        <input type="date" id="checkin"
                            class="form-control form-control-lg border border-dark icon_date" oninput="date_cal()"
                            min="1899-01-01" max="2030-13-13" required>
                        </input>
                        <label for="checkin" class="px-2">Check-In</label>
                    </div>

                    <!-- Checkout Date -->
                    <div class="col-md mt-2">
                        <input type="date" id="checkout"
                            class="form-control form-control-lg border border-dark icon_date" min="1899-01-01"
                            max="2030-13-13" required>
                        <label for="checkout" class="px-2">Check-Out</label>
                    </div>

                    <!-- Travellers -->
                    <div class="col-md mt-2 traveler-input">
                        <!-- <input type="text" class="form-control form-control-lg border border-dark icon_traveller"
                            placeholder="Travellers"> -->

                        <div id="traveler-btn"
                            class="traveler-btn icon_traveller form-control form-control-lg border border-dark ">
                            <span id="adult_tra">0</span>
                            Adults, <span id="child_tra">0</span> Children
                        </div>
                        <!-- Traveler Popup -->
                        <div class="traveler-popup">

                            <div class="popup-header">
                                <button type="button" class="popup-close text-danger ">&times;</button>
                            </div>
                            <!--------------------- Pop 1 ------------------->
                            <div id="pop_body1" class="popup-body">
                                <p style="font-size: 12px;"> <strong>Room 1</strong> </p>
                                <div class="row">
                                    <div class="col">
                                        Adults
                                    </div>
                                    <div class="col">
                                        <div class="popup-controls">
                                            <button type="button" id="adult-minus"
                                                class=" btn btn-light rounded-circle mx-3  ">&minus;</button>
                                            <span id="adults-input">0</span>
                                            <button type="button" id="adult-plus"
                                                class=" btn btn-light rounded-circle mx-3 ">&#43;</button>
                                        </div>
                                    </div>

                                </div>

                                <div class="row my-3">
                                    <div class="col">
                                        Children
                                    </div>
                                    <div class="col">
                                        <div class="popup-controls">
                                            <button type="button" id="child-minus"
                                                class=" btn btn-light rounded-circle mx-3  ">&minus;</button>
                                            <span id="children-input">0</span>
                                            <button type="button" id="child-plus"
                                                class=" btn btn-light rounded-circle mx-3  ">&#43;</button>
                                        </div>


                                    </div>
                                    <div id="child_age" class="row my-2">

                                    </div>

                                    <p id="add_room_btn" class="text-primary text-end "><strong> Add another rooom
                                        </strong></p>
                                    <p id="remove_room_btn" class="text-primary text-end "><strong> Remove rooom
                                        </strong></p>

                                </div>

                            </div>

                            <!-- Pop 2 -->
                            <div id="pop_body2" class="popup-body">
                                <p style="font-size: 12px;"> <strong>Room 2</strong> </p>
                                <div class="row">
                                    <div class="col">
                                        Adults
                                    </div>
                                    <div class="col">
                                        <div class="popup-controls">
                                            <button type="button" id="adult-minus2"
                                                class=" btn btn-light rounded-circle mx-3  ">&minus;</button>
                                            <span id="adults-input2">0</span>
                                            <button type="button" id="adult-plus2"
                                                class=" btn btn-light rounded-circle mx-3 ">&#43;</button>
                                        </div>
                                    </div>

                                </div>

                                <div class="row my-3">
                                    <div class="col">
                                        Children
                                    </div>
                                    <div class="col">
                                        <div class="popup-controls">
                                            <button type="button" id="child-minus2"
                                                class=" btn btn-light rounded-circle mx-3  ">&minus;</button>
                                            <span id="children-input2">0</span>
                                            <button type="button" id="child-plus2"
                                                class=" btn btn-light rounded-circle mx-3  ">&#43;</button>
                                        </div>


                                    </div>
                                    <div id="child_age2" class="row my-2">

                                    </div>

                                    <p id="add_room_btn2" class="text-primary text-end "><strong> Add another rooom
                                        </strong></p>
                                    <p id="remove_room_btn2" class="text-primary text-end "><strong> Remove rooom
                                        </strong></p>

                                </div>

                            </div>


                            <!-- Pop 3 -->
                            <div id="pop_body3" class="popup-body">
                                <p style="font-size: 12px;"> <strong>Room 3</strong> </p>
                                <div class="row">
                                    <div class="col">
                                        Adults
                                    </div>
                                    <div class="col">
                                        <div class="popup-controls">
                                            <button type="button" id="adult-minus3"
                                                class=" btn btn-light rounded-circle mx-3  ">&minus;</button>
                                            <span id="adults-input3">0</span>
                                            <button type="button" id="adult-plus3"
                                                class=" btn btn-light rounded-circle mx-3 ">&#43;</button>
                                        </div>
                                    </div>

                                </div>

                                <div class="row my-3">
                                    <div class="col">
                                        Children
                                    </div>
                                    <div class="col">
                                        <div class="popup-controls">
                                            <button type="button" id="child-minus3"
                                                class=" btn btn-light rounded-circle mx-3  ">&minus;</button>
                                            <span id="children-input3">0</span>
                                            <button type="button" id="child-plus3"
                                                class=" btn btn-light rounded-circle mx-3  ">&#43;</button>
                                        </div>


                                    </div>
                                    <div id="child_age3" class="row my-2">

                                    </div>

                                    <p id="add_room_btn3" class="text-primary text-end "><strong> Add another rooom
                                        </strong></p>
                                    <p id="remove_room_btn3" class="text-primary text-end "><strong> Remove rooom
                                        </strong></p>

                                </div>
                            </div>

                            <!-- Pop 4 -->
                            <div id="pop_body4" class="popup-body">
                                <p style="font-size: 12px;"> <strong>Room 4</strong> </p>
                                <div class="row">
                                    <div class="col">
                                        Adults
                                    </div>
                                    <div class="col">
                                        <div class="popup-controls">
                                            <button type="button" id="adult-minus4"
                                                class=" btn btn-light rounded-circle mx-3  ">&minus;</button>
                                            <span id="adults-input4">0</span>
                                            <button type="button" id="adult-plus4"
                                                class=" btn btn-light rounded-circle mx-3 ">&#43;</button>
                                        </div>
                                    </div>

                                </div>

                                <div class="row my-3">
                                    <div class="col">
                                        Children
                                    </div>
                                    <div class="col">
                                        <div class="popup-controls">
                                            <button type="button" id="child-minus4"
                                                class=" btn btn-light rounded-circle mx-3  ">&minus;</button>
                                            <span id="children-input4">0</span>
                                            <button type="button" id="child-plus4"
                                                class=" btn btn-light rounded-circle mx-3  ">&#43;</button>
                                        </div>


                                    </div>
                                    <div id="child_age4" class="row my-2">

                                    </div>

                                    <p id="add_room_btn4" class="text-primary text-end "><strong> Add another rooom
                                        </strong></p>
                                    <p id="remove_room_btn4" class="text-primary text-end "><strong> Remove rooom
                                        </strong></p>

                                </div>
                            </div>

                            <!-- Pop 5 -->
                            <div id="pop_body5" class="popup-body">
                                <p style="font-size: 12px;"> <strong>Room 5</strong> </p>
                                <div class="row">
                                    <div class="col">
                                        Adults
                                    </div>
                                    <div class="col">
                                        <div class="popup-controls">
                                            <button type="button" id="adult-minus5"
                                                class=" btn btn-light rounded-circle mx-3  ">&minus;</button>
                                            <span id="adults-input5">0</span>
                                            <button type="button" id="adult-plus5"
                                                class=" btn btn-light rounded-circle mx-3 ">&#43;</button>
                                        </div>
                                    </div>

                                </div>

                                <div class="row my-3">
                                    <div class="col">
                                        Children
                                    </div>
                                    <div class="col">
                                        <div class="popup-controls">
                                            <button type="button" id="child-minus5"
                                                class=" btn btn-light rounded-circle mx-3  ">&minus;</button>
                                            <span id="children-input5">0</span>
                                            <button type="button" id="child-plus5"
                                                class=" btn btn-light rounded-circle mx-3  ">&#43;</button>
                                        </div>


                                    </div>
                                    <div id="child_age5" class="row my-2">

                                    </div>

                                </div>
                            </div>


                            <div class="popup-footer">
                                <button type="button" id="apply_btn"
                                    class="btn btn-primary rounded-pill w-75 m-3">Apply</button>
                            </div>
                        </div>

                    </div>
                    <!-- Search Button -->
                    <div class="col-md-1 mt-2">
                        <button type="submit" class="btn btn-primary form-control form-control-lg">
                            <span class="las la-search"></span>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Sort -->
            <div class="col-md-4 mt-3">
                <form action="rental.php" method="post">
                    <label for="sort">
                        <p class="h5 text-dark"> Sort By... </p>
                    </label>

                    <select id="sort" style="font-size: 15px; color: black"
                        class="form-control form-control-lg border border-dark text-black p-2" name="sort"
                        onchange="this.form.submit()">
                        <option value="rental_type"> Choose... </option>
                        <option value="rental_type"
                            <?php $selected = ($sort == 'rental_type') ? 'selected' : ''; echo $selected ?>>
                            Type </option>
                        <option value="rental_city"
                            <?php $selected = ($sort == 'rental_city') ? 'selected' : ''; echo $selected ?>>
                            City </option>

                        <option value="rental_price"
                            <?php $selected = ($sort == 'rental_price') ? 'selected' : ''; echo $selected ?>>
                            Price </option>
                        <option value="rental_bed_no"
                            <?php $selected = ($sort == 'rental_bed_no') ? 'selected' : ''; echo $selected ?>>
                            No of Bed Rooms </option>
                        <option value="rental_bath_no"
                            <?php $selected = ($sort == 'rental_bath_no') ? 'selected' : ''; echo $selected ?>>
                            No of Bath Rooms </option>
                        <option value="rental_kitchen_no"
                            <?php $selected = ($sort == 'rental_kitchen_no') ? 'selected' : ''; echo $selected ?>>
                            No of Kitchen Rooms </option>
                    </select>
                    <input type="hidden" name="city" value="<?php echo $city; ?>">
                </form>
            </div>
        </div>



        <br>
    </div>

    <div class="responsive-overlay"></div>
    <section class="hotel-list-area section-bg-3 pat-10 pab-100">
        <div class="container">

            <hr>
            <h4 style="text-align: center;"> <strong> Select Properties </strong> </h4>

            <div class="shop-contents-wrapper mt-5">
                <div class="shop-icon">
                    <div class="shop-icon-sidebar bg-white " style="--bs-bg-opacity: .0; width:150px;">
                        <button class="btn btn-light border border-primary rounded-pill p-2"><i
                                class="fa fa-list mx-2 text-primary" aria-hidden="true"></i> Sort $ Filter
                        </button>
                    </div>
                </div>

                <!-- Hotel Filter Services -->
                <div class="shop-sidebar-content">
                    <div class="shop-close-content">
                        <div class="shop-close-content-icon">
                            <i class="las la-times"></i>
                        </div>

                        <!-- Filters -->
                        <h4> <strong> Filter by</strong></h4>

                        <!-- Price per month -->
                        <form action="rental.php" method="post">
                            <input type="hidden" name="city" value="<?php echo $city; ?>">
                            <div class="m-4">
                                <h5 class="my-3"> <strong>Price per Month </strong> </h5>
                                <!-- Any -->
                                <div class="form-check">
                                    <input class="form-check-input border-primary " type="radio" id="any"
                                        name="price_per_month" value="0" onchange="this.form.submit()"
                                        <?php $checked = ($max_price == 100000) ? 'checked' : ''; echo $checked; ?>>
                                    <label class="form-check-label h6 text-black " for="any"> Any</strong> </label>
                                </div>
                                <!-- Less than 1000 -->
                                <div class="form-check">
                                    <input class="form-check-input border-primary " type="radio" id="less_than_1000"
                                        name="price_per_month" value="1000" onchange="this.form.submit()"
                                        <?php $checked = ($max_price == 1000) ? 'checked' : ''; echo $checked; ?>>
                                    <label class="form-check-label h6 text-black " for="less_than_1000"> Less than
                                        $1000</strong> </label>
                                </div>
                                <!-- 1000 - 2000 -->
                                <div class="form-check">
                                    <input class="form-check-input border-primary " type="radio" id="less_than_2000"
                                        name="price_per_month" value="2000" onchange="this.form.submit()"
                                        <?php $checked = ($max_price == 2000) ? 'checked' : ''; echo $checked; ?>>
                                    <label class="form-check-label h6 text-black " for="less_than_2000"> $1000 to
                                        $2000
                                        </strong> </label>
                                </div>
                                <!-- 2000 - 3000 -->
                                <div class="form-check">
                                    <input class="form-check-input border-primary " type="radio" id="less_than_3000"
                                        name="price_per_month" value="3000" onchange="this.form.submit()"
                                        <?php $checked = ($max_price == 3000) ? 'checked' : ''; echo $checked; ?>>
                                    <label class="form-check-label h6 text-black " for="less_than_3000"> $2000 to
                                        $3000
                                        </strong> </label>
                                </div>
                                <!-- 3000 - 4000 -->
                                <div class="form-check">
                                    <input class="form-check-input border-primary " type="radio" id="less_than_4000"
                                        name="price_per_month" value="4000" onchange="this.form.submit()"
                                        <?php $checked = ($max_price == 4000) ? 'checked' : ''; echo $checked; ?>>
                                    <label class="form-check-label h6 text-black " for="less_than_4000"> $3000 to
                                        $4000
                                        </strong> </label>
                                </div>
                                <!-- Greater than 4000 -->
                                <div class="form-check">
                                    <input class="form-check-input border-primary " type="radio" id="greater_than_4000"
                                        name="price_per_month" value="4001" onchange="this.form.submit()"
                                        <?php $checked = ($max_price == 100001) ? 'checked' : ''; echo $checked; ?>>
                                    <label class="form-check-label h6 text-black " for="greater_than_4000"> Greater
                                        than $4000 </strong> </label>
                                </div>
                            </div>
                        </form>

                        <!-- Area  -->
                        <div class="m-4">
                            <h5 class="my-3"> <strong>Area </strong> </h5>
                            <form action="rental.php" method="post">
                                <!-- Bole -->
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="bole" name="area" value="bole"
                                        onchange="this.form.submit()"
                                        <?php $checked = ($rental_subcity == 'bole') ? "checked" : ""; echo $checked; ?>>
                                    <label class="form-check-label h6 text-black " for="bole">Bole</label>
                                </div>
                                <!-- Lideta -->
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="lideta" name="area" value="lideta"
                                        onchange="this.form.submit()"
                                        <?php $checked = ($rental_subcity == 'lideta') ? "checked" : ""; echo $checked; ?>>
                                    <label class="form-check-label h6 text-black " for="lideta">Lideta</label>
                                </div>

                                <div class="collapse" id="area_collapse">
                                    <!-- Kirkos -->
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="kirkos" name="area"
                                            value="kirkos" onchange="this.form.submit()"
                                            <?php $checked = ($rental_subcity == 'kirkos') ? "checked" : ""; echo $checked; ?>>
                                        <label class="form-check-label h6 text-black " for="kirkos">Kirkos</label>
                                    </div>
                                    <!-- Yeka -->
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="yeka" name="area" value="yeka"
                                            onchange="this.form.submit()"
                                            <?php $checked = ($rental_subcity == 'yeka') ? "checked" : ""; echo $checked; ?>>
                                        <label class="form-check-label h6 text-black " for="yeka">Yeka</label>
                                    </div>
                                    <!-- Nifas Silk Lafto -->
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="nifas" name="area"
                                            value="nifas" onchange="this.form.submit()"
                                            <?php $checked = ($rental_subcity == 'nifas') ? "checked" : ""; echo $checked; ?>>
                                        <label class="form-check-label h6 text-black " for="nifas">Nifas
                                            Silk-Lafto</label>
                                    </div>
                                    <!-- Bishoftu -->
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="bishoftu" name="area"
                                            value="bishoftu" onchange="this.form.submit()"
                                            <?php $checked = ($rental_subcity == 'bishoftu') ? "checked" : ""; echo $checked; ?>>
                                        <label class="form-check-label h6 text-black " for="bishoftu">Bishoftu</label>
                                    </div>
                                    <!-- Lege T'afo -->
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="lege" name="area" value="lege"
                                            onchange="this.form.submit()"
                                            <?php $checked = ($rental_subcity == 'lege') ? "checked" : ""; echo $checked; ?>>
                                        <label class="form-check-label h6 text-black " for="lege">Lege T'afo</label>
                                    </div>
                                    <!-- Piassa -->
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="piassa" name="area"
                                            value="piassa" onchange="this.form.submit()"
                                            <?php $checked = ($rental_subcity == 'piassa') ? "checked" : ""; echo $checked; ?>>
                                        <label class="form-check-label h6 text-black " for="piassa">Piassa</label>
                                    </div>
                                    <!-- Arada -->
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="arada" name="area"
                                            value="arada" onchange="this.form.submit()"
                                            <?php $checked = ($rental_subcity == 'arada') ? "checked" : ""; echo $checked; ?>>
                                        <label class="form-check-label h6 text-black " for="arada">Arada</label>
                                    </div>
                                    <!-- Kolfe -->
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="kolfe" name="area"
                                            value="kolfe" onchange="this.form.submit()"
                                            <?php $checked = ($rental_subcity == 'kolfe') ? "checked" : ""; echo $checked; ?>>
                                        <label class="form-check-label h6 text-black " for="kolfe">Kolfe</label>
                                    </div>
                                </div>

                                <input type="hidden" name="city" value="<?php echo $city ?>">

                                <a href="#area_collapse" data-bs-toggle="collapse" class="text-primary"> more...
                                </a>
                            </form>
                        </div>

                    </div>
                </div>

                <!-- Grid Show Hotels -->
                <div class="shop-grid-contents">
                    <div class="col-12">

                        <?php
                           
                            $q_result = mysqli_query($con, $q_rentals);

                            $result_count =  mysqli_num_rows($q_result);
                            if($result_count == 0){

                                $count_msg = ' <div class="alert alert-danger py-3 " style="text-align: center"  > Sorry We are not able to find your search property. Try Others! <br> Thank you!  </div> ';
                                echo $count_msg;
                                
                            }else{

                            while ($row = mysqli_fetch_assoc($q_result)) {
                                $rental_id = $row['rental_id'];
                                $rental_type = $row['rental_type'];
                                $rental_city = $row['rental_city'];
                                $rental_subcity = $row['rental_subcity'];
                                $rental_image1 = $row['rental_image1'];
                                $rental_image2 = $row['rental_image2'];
                                $rental_image3 = $row['rental_image3'];
                                $rental_price = $row['rental_price'];
                                $rental_area = $row['rental_area'];
                                $rental_kitchen_no = $row['rental_kitchen_no'];
                                $rental_bed_no = $row['rental_bed_no'];
                                $rental_bath_no = $row['rental_bath_no'];
                                $rental_contact = $row['rental_contact'];
                                $rental_detail = $row['rental_detail'];

                                ?>

                        <!-- Rental -->
                        <div class="row my-2 bg-white">
                            <!-- Image -->
                            <div class="col-4">
                                <!--Image Carousel -->
                                <a href="rental_detail.php?rental_id=<?php echo $rental_id; ?>">
                                    <div id="<?php echo '_' . $rental_id; ?>" class="carousel slide"
                                        data-bs-ride="carousel">

                                        <!-- Indicators/dots -->
                                        <div class="carousel-indicators">
                                            <button type="button" data-bs-target="<?php echo '_' . $rental_id; ?>"
                                                data-bs-slide-to="0" class="active"></button>
                                            <button type="button" data-bs-target="<?php echo '_' . $rental_id; ?>"
                                                data-bs-slide-to="1"></button>
                                            <button type="button" data-bs-target="<?php echo '_' . $rental_id; ?>"
                                                data-bs-slide-to="2"></button>
                                        </div>

                                        <!-- The slideshow/carousel -->
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="<?php echo "rental_image/".$rental_image1 ?>" alt="rent_image"
                                                    style="object-fit: cover;" class="d-block w-100" height="300px">

                                            </div>
                                            <div class="carousel-item ">
                                                <img src="<?php echo "rental_image/".$rental_image2 ?>" alt="rent_image"
                                                    style="object-fit: cover;" class="d-block w-100" height="300px">
                                            </div>
                                            <div class="carousel-item ">
                                                <img src="<?php echo "rental_image/".$rental_image3 ?>" alt="rent_image"
                                                    style="object-fit: cover;" class="d-block w-100" height="300px">
                                            </div>
                                        </div>

                                        <!-- Left and right controls/icons -->
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="<?php echo '#_' . $rental_id; ?>" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon"></span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="<?php echo '#_' . $rental_id; ?>" data-bs-slide="next">
                                            <span class="carousel-control-next-icon"></span>
                                        </button>
                                    </div>
                                </a>
                            </div>

                            <!-- content -->
                            <div class="col-8 mt-2">
                                <a href="rental_detail.php?rental_id=<?php echo $rental_id; ?>">
                                    <h5> <strong> <?php echo $rental_type; ?> </strong></h5>
                                    <div class="my-1">
                                        <i class="fa fa-map-marker mx-2"> </i>
                                        <p style="display: inline"><?php echo $rental_city.', '.$rental_subcity; ?>
                                        </p>
                                    </div>
                                    <hr>

                                    <div class="m-3" style="display: inline">
                                        <br>
                                        <i class="fa fa-bed mx-1" style="font-size: 17px; color: black"
                                            aria-hidden="true"></i>
                                        <h6 style="display: inline; font-size: 15px">
                                            <?php echo $rental_bed_no.' Bed Rooms'; ?></h6>
                                        <br>
                                        <i class="fa fa-bath mx-1" style="font-size: 17px; color: black"
                                            aria-hidden="true"></i>
                                        <h6 style="display: inline; font-size: 15px">
                                            <?php echo $rental_bath_no . ' Bathroom'; ?> </h6>

                                        <br>
                                        <i class="fa fa-cutlery mx-1" style="font-size: 17px; color: black"
                                            aria-hidden="true"></i>
                                        <h6 style="display: inline; font-size: 15px">
                                            <?php echo $rental_kitchen_no . ' Kitchen'; ?> </h6>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-6 mt-4">
                                            <p style="font-size: 15px; color: black"> Very Good </p>
                                        </div>

                                        <div class="col-4">
                                            <div class="row" style="text-align: right">
                                                <h3> <strong><?php echo '$'.$rental_price; ?></strong></h3>
                                                <p> Per Month </p>
                                                <p style="font-size: 13px; margin-top: -10px">includes taxes and
                                                    fees</p>
                                            </div>

                                        </div>
                                    </div>


                                </a>

                            </div>
                        </div>

                        <?php
                                }
                            }
                            ?>


                    </div>

                </div>

            </div>

        </div>
    </section>

    <?php
        require('footer.php');
        ?>

    <script>
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();

    if (dd < 10) {
        dd = '0' + dd;
    }

    if (mm < 10) {
        mm = '0' + mm;
    }

    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("checkin").setAttribute("min", today);

    function date_cal() {
        var result = document.getElementById('checkin').value;

        document.getElementById("checkout").setAttribute("min", result);
    }
    </script>


    <script>
    const travelerBtn = document.querySelector(".traveler-btn");
    const travelerPopup = document.querySelector(".traveler-popup");
    const popupClose = document.querySelector(".popup-close");
    const applyBtn = document.querySelector('#apply_btn');

    //////////******************************//////////////////////////////
    travelerBtn.addEventListener("click", function() {


        var width = window.innerWidth ||
            document.documentElement.clientWidth ||
            document.body.clientWidth;

        if (width < 500) {

            travelerPopup.setAttribute("class", "modal");
            travelerPopup.style.backgroundColor = 'white';
            travelerPopup.style.display = "block";

        } else {
            travelerPopup.style.display = "block";
        }

    });

    popupClose.addEventListener("click", function() {
        travelerPopup.style.display = "none";
    });


    //////////********* Group 1 Events  ******//////////////////////////////

    // Group 1
    const adultPlus = document.querySelector("#adult-plus");
    const adultMinus = document.querySelector("#adult-minus");
    const childPlus = document.querySelector("#child-plus");
    const childMinus = document.querySelector("#child-minus");
    const addRoom = document.querySelector('#add_room_btn');
    const removeRoom = document.querySelector('#remove_room_btn');

    let adultNum = 0;
    let childNum = 0;
    let roomNum = 0;

    adultPlus.addEventListener("click", function() {
        adultNum++;
        document.getElementById('adults-input').innerHTML = adultNum;
    });

    adultMinus.addEventListener("click", function() {
        if (adultNum > 0) {
            adultNum--;
            document.getElementById('adults-input').innerHTML = adultNum;
        }
    });

    childPlus.addEventListener("click", function() {
        childNum++;
        document.getElementById('children-input').innerHTML = childNum;
        document.getElementById('child_age').innerHTML = " ";
        for (var i = 1; i <= childNum; i++) {
            var prev_comp = document.getElementById('child_age').innerHTML;
            document.getElementById('child_age').innerHTML = prev_comp +
                '<div class="col-6" ><label style="font-size: 12px;" > Child ' + i +
                ' age </label> <span class="text-danger" >*</span> <select class="form-control mx-1"  > <option> Under 1 </option><option> 1 </option><option> 2 </option><option> 3 </option><option> 4 </option><option> 5 </option><option> 6 </option><option> 7 </option><option> 8 </option><option> 9 </option><option> 10 </option><option> 11 </option><option> 12 </option><option> 13 </option> <option> 14 </option><option> 15 </option><option> 16 </option><option> 17 </option></select></div>';
        }

    });

    childMinus.addEventListener("click", function() {
        if (childNum > 0) {
            childNum--;
            document.getElementById('children-input').innerHTML = childNum;

            document.getElementById('child_age').innerHTML = " ";
            for (var i = 1; i <= childNum; i++) {
                var prev_comp = document.getElementById('child_age').innerHTML;
                document.getElementById('child_age').innerHTML = prev_comp +
                    '<div class="col-6" ><label style="font-size: 12px;" > Child ' + i +
                    ' age </label> <span class="text-danger" >*</span> <select class="form-control mx-1"  > <option> Under 1 </option><option> 1 </option><option> 2 </option><option> 3 </option><option> 4 </option><option> 5 </option><option> 6 </option><option> 7 </option><option> 8 </option><option> 9 </option><option> 10 </option><option> 11 </option><option> 12 </option><option> 13 </option> <option> 14 </option><option> 15 </option><option> 16 </option><option> 17 </option></select></div>';
            }
        }
    });

    addRoom.addEventListener('click', function() {
        document.getElementById('pop_body2').style.display = 'block';
        document.getElementById('add_room_btn').style.display = 'none';
        document.getElementById('remove_room_btn').style.display = 'block';

    });

    removeRoom.addEventListener('click', function() {
        document.getElementById('pop_body1').style.display = 'none';
        document.getElementById('remove_room_btn').style.display = 'none';
        document.getElementById('add_room_btn').style.display = 'block';


    });


    //////////********* Group 2 Events  ******//////////////////////////////

    // Group 2
    const adultPlus2 = document.querySelector("#adult-plus2");
    const adultMinus2 = document.querySelector("#adult-minus2");
    const childPlus2 = document.querySelector("#child-plus2");
    const childMinus2 = document.querySelector("#child-minus2");
    const addRoom2 = document.querySelector('#add_room_btn2');
    const removeRoom2 = document.querySelector('#remove_room_btn2');

    let adultNum2 = 0;
    let childNum2 = 0;
    let roomNum2 = 0;

    adultPlus2.addEventListener("click", function() {
        adultNum2++;
        document.getElementById('adults-input2').innerHTML = adultNum2;
    });

    adultMinus2.addEventListener("click", function() {
        if (adultNum2 > 0) {
            adultNum2--;
            document.getElementById('adults-input2').innerHTML = adultNum2;
        }
    });

    childPlus2.addEventListener("click", function() {
        childNum2++;
        document.getElementById('children-input2').innerHTML = childNum2;
        document.getElementById('child_age2').innerHTML = " ";
        for (var i = 1; i <= childNum2; i++) {
            var prev_comp2 = document.getElementById('child_age2').innerHTML;
            document.getElementById('child_age2').innerHTML = prev_comp2 +
                '<div class="col-6" ><label style="font-size: 12px;" > Child ' + i +
                ' age </label> <span class="text-danger" >*</span> <select class="form-control mx-1"  > <option> Under 1 </option><option> 1 </option><option> 2 </option><option> 3 </option><option> 4 </option><option> 5 </option><option> 6 </option><option> 7 </option><option> 8 </option><option> 9 </option><option> 10 </option><option> 11 </option><option> 12 </option><option> 13 </option> <option> 14 </option><option> 15 </option><option> 16 </option><option> 17 </option></select></div>';
        }

    });

    childMinus2.addEventListener("click", function() {
        if (childNum2 > 0) {
            childNum2--;
            document.getElementById('children-input2').innerHTML = childNum2;

            document.getElementById('child_age2').innerHTML = " ";
            for (var i = 1; i <= childNum2; i++) {
                var prev_comp2 = document.getElementById('child_age2').innerHTML;
                document.getElementById('child_age2').innerHTML = prev_comp2 +
                    '<div class="col-6" ><label style="font-size: 12px;" > Child ' + i +
                    ' age </label> <span class="text-danger" >*</span> <select class="form-control mx-1"  > <option> Under 1 </option><option> 1 </option><option> 2 </option><option> 3 </option><option> 4 </option><option> 5 </option><option> 6 </option><option> 7 </option><option> 8 </option><option> 9 </option><option> 10 </option><option> 11 </option><option> 12 </option><option> 13 </option> <option> 14 </option><option> 15 </option><option> 16 </option><option> 17 </option></select></div>';
            }
        }
    });

    addRoom2.addEventListener('click', function() {
        document.getElementById('pop_body3').style.display = 'block';
        document.getElementById('add_room_btn2').style.display = 'none';
        document.getElementById('remove_room_btn2').style.display = 'block';

    });

    removeRoom2.addEventListener('click', function() {
        document.getElementById('pop_body2').style.display = 'none';
        document.getElementById('remove_room_btn2').style.display = 'none';
        document.getElementById('add_room_btn2').style.display = 'block';


    });


    //////////********* Group 3 Events  ******//////////////////////////////

    // Group 3
    const adultPlus3 = document.querySelector("#adult-plus3");
    const adultMinus3 = document.querySelector("#adult-minus3");
    const childPlus3 = document.querySelector("#child-plus3");
    const childMinus3 = document.querySelector("#child-minus3");
    const addRoom3 = document.querySelector('#add_room_btn3');
    const removeRoom3 = document.querySelector('#remove_room_btn3');

    let adultNum3 = 0;
    let childNum3 = 0;
    let roomNum3 = 0;

    adultPlus3.addEventListener("click", function() {
        adultNum3++;
        document.getElementById('adults-input3').innerHTML = adultNum3;
    });

    adultMinus3.addEventListener("click", function() {
        if (adultNum3 > 0) {
            adultNum3--;
            document.getElementById('adults-input3').innerHTML = adultNum3;
        }
    });

    childPlus3.addEventListener("click", function() {
        childNum3++;
        document.getElementById('children-input3').innerHTML = childNum3;
        document.getElementById('child_age3').innerHTML = " ";
        for (var i = 1; i <= childNum3; i++) {
            var prev_comp3 = document.getElementById('child_age3').innerHTML;
            document.getElementById('child_age3').innerHTML = prev_comp3 +
                '<div class="col-6" ><label style="font-size: 12px;" > Child ' + i +
                ' age </label> <span class="text-danger" >*</span> <select class="form-control mx-1"  > <option> Under 1 </option><option> 1 </option><option> 2 </option><option> 3 </option><option> 4 </option><option> 5 </option><option> 6 </option><option> 7 </option><option> 8 </option><option> 9 </option><option> 10 </option><option> 11 </option><option> 12 </option><option> 13 </option> <option> 14 </option><option> 15 </option><option> 16 </option><option> 17 </option></select></div>';
        }

    });

    childMinus3.addEventListener("click", function() {
        if (childNum3 > 0) {
            childNum3--;
            document.getElementById('children-input3').innerHTML = childNum3;

            document.getElementById('child_age3').innerHTML = " ";
            for (var i = 1; i <= childNum3; i++) {
                var prev_comp3 = document.getElementById('child_age3').innerHTML;
                document.getElementById('child_age3').innerHTML = prev_comp3 +
                    '<div class="col-6" ><label style="font-size: 12px;" > Child ' + i +
                    ' age </label> <span class="text-danger" >*</span> <select class="form-control mx-1"  > <option> Under 1 </option><option> 1 </option><option> 2 </option><option> 3 </option><option> 4 </option><option> 5 </option><option> 6 </option><option> 7 </option><option> 8 </option><option> 9 </option><option> 10 </option><option> 11 </option><option> 12 </option><option> 13 </option> <option> 14 </option><option> 15 </option><option> 16 </option><option> 17 </option></select></div>';
            }
        }
    });

    addRoom3.addEventListener('click', function() {
        document.getElementById('pop_body4').style.display = 'block';
        document.getElementById('add_room_btn3').style.display = 'none';
        document.getElementById('remove_room_btn3').style.display = 'block';

    });

    removeRoom3.addEventListener('click', function() {
        document.getElementById('pop_body3').style.display = 'none';
        document.getElementById('remove_room_btn3').style.display = 'none';
        document.getElementById('add_room_btn3').style.display = 'block';


    });


    //////////********* Group 1 Events  ******//////////////////////////////

    // Group 1
    const adultPlus4 = document.querySelector("#adult-plus4");
    const adultMinus4 = document.querySelector("#adult-minus4");
    const childPlus4 = document.querySelector("#child-plus4");
    const childMinus4 = document.querySelector("#child-minus4");
    const addRoom4 = document.querySelector('#add_room_btn4');
    const removeRoom4 = document.querySelector('#remove_room_btn4');

    let adultNum4 = 0;
    let childNum4 = 0;
    let roomNum4 = 0;

    adultPlus4.addEventListener("click", function() {
        adultNum4++;
        document.getElementById('adults-input4').innerHTML = adultNum4;
    });

    adultMinus4.addEventListener("click", function() {
        if (adultNum4 > 0) {
            adultNum4--;
            document.getElementById('adults-input4').innerHTML = adultNum4;
        }
    });

    childPlus4.addEventListener("click", function() {
        childNum4++;
        document.getElementById('children-input4').innerHTML = childNum4;
        document.getElementById('child_age4').innerHTML = " ";
        for (var i = 1; i <= childNum4; i++) {
            var prev_comp4 = document.getElementById('child_age4').innerHTML;
            document.getElementById('child_age4').innerHTML = prev_comp4 +
                '<div class="col-6" ><label style="font-size: 12px;" > Child ' + i +
                ' age </label> <span class="text-danger" >*</span> <select class="form-control mx-1"  > <option> Under 1 </option><option> 1 </option><option> 2 </option><option> 3 </option><option> 4 </option><option> 5 </option><option> 6 </option><option> 7 </option><option> 8 </option><option> 9 </option><option> 10 </option><option> 11 </option><option> 12 </option><option> 13 </option> <option> 14 </option><option> 15 </option><option> 16 </option><option> 17 </option></select></div>';
        }

    });

    childMinus4.addEventListener("click", function() {
        if (childNum4 > 0) {
            childNum4--;
            document.getElementById('children-input4').innerHTML = childNum4;

            document.getElementById('child_age4').innerHTML = " ";
            for (var i = 1; i <= childNum4; i++) {
                var prev_comp4 = document.getElementById('child_age4').innerHTML;
                document.getElementById('child_age4').innerHTML = prev_comp4 +
                    '<div class="col-6" ><label style="font-size: 12px;" > Child ' + i +
                    ' age </label> <span class="text-danger" >*</span> <select class="form-control mx-1"  > <option> Under 1 </option><option> 1 </option><option> 2 </option><option> 3 </option><option> 4 </option><option> 5 </option><option> 6 </option><option> 7 </option><option> 8 </option><option> 9 </option><option> 10 </option><option> 11 </option><option> 12 </option><option> 13 </option> <option> 14 </option><option> 15 </option><option> 16 </option><option> 17 </option></select></div>';
            }
        }
    });

    addRoom4.addEventListener('click', function() {
        document.getElementById('pop_body5').style.display = 'block';
        document.getElementById('add_room_btn4').style.display = 'none';
        document.getElementById('remove_room_btn4').style.display = 'block';

    });

    removeRoom4.addEventListener('click', function() {
        document.getElementById('pop_body4').style.display = 'none';
        document.getElementById('remove_room_btn4').style.display = 'none';
        document.getElementById('add_room_btn4').style.display = 'block';


    });


    //////////********* Group 5 Events  ******//////////////////////////////

    // Group 1
    const adultPlus5 = document.querySelector("#adult-plus5");
    const adultMinus5 = document.querySelector("#adult-minus5");
    const childPlus5 = document.querySelector("#child-plus5");
    const childMinus5 = document.querySelector("#child-minus5");
    const addRoom5 = document.querySelector('#add_room_btn5');
    const removeRoom5 = document.querySelector('#remove_room_btn5');

    let adultNum5 = 0;
    let childNum5 = 0;
    let roomNum5 = 0;

    adultPlus5.addEventListener("click", function() {
        adultNum5++;
        document.getElementById('adults-input5').innerHTML = adultNum5;
    });

    adultMinus5.addEventListener("click", function() {
        if (adultNum5 > 0) {
            adultNum5--;
            document.getElementById('adults-input5').innerHTML = adultNum5;
        }
    });

    childPlus5.addEventListener("click", function() {
        childNum5++;
        document.getElementById('children-input5').innerHTML = childNum5;
        document.getElementById('child_age5').innerHTML = " ";
        for (var i = 1; i <= childNum5; i++) {
            var prev_comp5 = document.getElementById('child_age5').innerHTML;
            document.getElementById('child_age5').innerHTML = prev_comp5 +
                '<div class="col-6" ><label style="font-size: 12px;" > Child ' + i +
                ' age </label> <span class="text-danger" >*</span> <select class="form-control mx-1"  > <option> Under 1 </option><option> 1 </option><option> 2 </option><option> 3 </option><option> 4 </option><option> 5 </option><option> 6 </option><option> 7 </option><option> 8 </option><option> 9 </option><option> 10 </option><option> 11 </option><option> 12 </option><option> 13 </option> <option> 14 </option><option> 15 </option><option> 16 </option><option> 17 </option></select></div>';
        }

    });

    childMinus5.addEventListener("click", function() {
        if (childNum5 > 0) {
            childNum5--;
            document.getElementById('children-input5').innerHTML = childNum5;

            document.getElementById('child_age5').innerHTML = " ";
            for (var i = 1; i <= childNum5; i++) {
                var prev_comp5 = document.getElementById('child_age5').innerHTML;
                document.getElementById('child_age5').innerHTML = prev_comp5 +
                    '<div class="col-6" ><label style="font-size: 12px;" > Child ' + i +
                    ' age </label> <span class="text-danger" >*</span> <select class="form-control mx-1"  > <option> Under 1 </option><option> 1 </option><option> 2 </option><option> 3 </option><option> 4 </option><option> 5 </option><option> 6 </option><option> 7 </option><option> 8 </option><option> 9 </option><option> 10 </option><option> 11 </option><option> 12 </option><option> 13 </option> <option> 14 </option><option> 15 </option><option> 16 </option><option> 17 </option></select></div>';
            }
        }
    });

    removeRoom.addEventListener('click', function() {
        document.getElementById('pop_body5').style.display = 'none';
        document.getElementById('remove_room_btn5').style.display = 'none';
        document.getElementById('add_room_btn5').style.display = 'block';


    });



    /////////////////////////////

    applyBtn.addEventListener("click", function() {
        var totalAdult = adultNum + adultNum2 + adultNum3 + adultNum4 + adultNum5;
        var totalChild = childNum + childNum2 + childNum3 + childNum4 + childNum5;

        document.getElementById('adult_tra').innerHTML = totalAdult;
        document.getElementById('child_tra').innerHTML = totalChild;
        travelerPopup.style.display = "none";

    });
    </script>

    <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js">
    </script>
    <script src="icon/svg-with-js/js/fontawesome-all.js"></script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/jquery-migrate.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.js"></script>
    <script src="assets/js/jquery.nice-select.js"></script>
    <script src="assets/js/flatpicker.js"></script>
    <script src="assets/js/nouislider-8.5.1.min.js"></script>
    <script src="assets/js/intlTelInput.js"></script>
    <script src="assets/js/main.js"></script>
</body>


</html>