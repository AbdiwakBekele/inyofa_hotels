<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="../images/Logo-Icons.png" />
    <link rel="stylesheet" type="text/css" href="../icon/svg-with-js/css/fa-svg-with-js.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Inyofa</title>

</head>

<body>

</body>

</html>

<?php
include "../db.php";
SESSION_START();

if (!isset($_COOKIE['logged'])) {

    header('location: ../ha_login.php');
}

if (isset($_REQUEST['reserve_id'])) {

    $reserve_id = intval($_REQUEST['reserve_id']);

    $sql_room = "SELECT * FROM reservation WHERE reserve_id = '$reserve_id'";
    $room_result = mysqli_query($con, $sql_room);
    $room_id = mysqli_fetch_assoc($room_result)['room_id'];

    $del_sql_room = "DELETE FROM reservation WHERE reserve_id = '$reserve_id'";

    $records_rooms = mysqli_query($con, $del_sql_room);

    if($records_rooms){

        $sql_reserve = "UPDATE room SET reserve_status = 'NO' WHERE room_id = '$room_id'";
        if(mysqli_query($con, $sql_reserve)){
            echo ("<div class='alert alert-danger'>Successfully Deleted a Room Information!</div>");
            echo ("<a class='btn btn-primary text-white w-25 mx-5' href='ha_manager_reservation.php'>Go Back</div>");
        }
       
    }

}