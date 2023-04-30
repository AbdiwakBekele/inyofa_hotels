<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
        <title>Delete Hotel Info</title>
    </head>

    <body>

        <?php
include "../../db.php";
SESSION_START();

if (!isset($_COOKIE['logged'])) {

    header('location: ../../a_login.php');
}

if (isset($_REQUEST['hotel_id'])) {
    $hotel_id = intval($_REQUEST['hotel_id']);

    $del_sql = "DELETE FROM hotels WHERE hotel_id = '$hotel_id'";
    $records = mysqli_query($con, $del_sql);

    if($records){

        $del_room_type = "DELETE FROM room_type WHERE hotel_id = '$hotel_id'";
        $del_room = "DELETE FROM room WHERE hotel_id = '$hotel_id'";
        $del_hotel_admin = "DELETE FROM hotel_admin WHERE hotel_id = '$hotel_id'";

        $result_rt = mysqli_query($con, $del_room_type);
        $result_room = mysqli_query($con, $del_room);
        $result_hotel_admin = mysqli_query($con, $del_hotel_admin);

        if($result_rt && $result_room && $result_hotel_admin){

            $msg = "Successfully Deleted a Hotels Information!";
            echo ' <div class="alert alert-danger my-5" style="text-align: center"> <strong> '. $msg .'</strong></div> ';
        }
    }

}


   ?>
        <div style="text-align: center;">
            <a href="a_manage_hotels.php" class="btn btn-primary w-25 text-white "> Back to Menu </a>
        </div>

    </body>

</html>