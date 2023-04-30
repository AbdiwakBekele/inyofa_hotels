<!DOCTYPE html>
<html lang="en">

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
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
            rel="stylesheet" />
    </head>

    <body>

        <div class="container">

            <?php

            include "db.php";

            if (isset($_POST['Submit'])) {
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $room = $_POST['room'];
                $hotel_id = $_POST['hotel_id'];
                $check_in = $_POST['checkin'];
                $check_out = $_POST['checkout'];


                $sql = "INSERT INTO reservation  (room_id, hotel_id, firstname, lastname, email, phone_no, check_in, check_out) 
                            VALUES ('$room', '$hotel_id', '$firstname', '$lastname', '$email', '$phone', '$check_in', '$check_out' ) ";


                if (mysqli_query($con, $sql)) {
                    $sql_reserve = "UPDATE room SET reserve_status = 'YES' WHERE room_id = '$room'";
                    if(mysqli_query($con, $sql_reserve)){
                        $msg = "You have Successfully Reserved a room";
                        echo ' <div class="alert alert-success my-5" style="text-align: center"> <strong> '. $msg .'</strong></div> ';
                    }


                    
                } else {
                    $msg = "Error Reserving a room";
                    echo ' <div class="alert alert-danger" style="text-align: center"> '. $msg .'</div> ';
                }

            }

        
    ?>

        </div>

    </body>

</html>