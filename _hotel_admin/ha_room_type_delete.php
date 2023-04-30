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

if (isset($_REQUEST['room_type_id'])) {

    $room_type_id = intval($_REQUEST['room_type_id']);

    $del_sql = "DELETE FROM room_type WHERE room_type_id = '$room_type_id'";
    $del_sql_room = "DELETE FROM room WHERE room_type_id = '$room_type_id'";

    $records = mysqli_query($con, $del_sql);
    $records_rooms = mysqli_query($con, $del_sql_room);

    echo ("<div class='alert alert-danger'>Successfully Deleted a Hotels Information!</div>");
    echo ("<a class='btn btn-primary text-white w-25 mx-5' href='ha_manage_rt.php'>Go Back</div>");

}
