<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
        <title>Delete Hotel Admin Info</title>
    </head>

    <body>

        <?php
include "../../db.php";
SESSION_START();

if (!isset($_COOKIE['logged'])) {

    header('location: ../../a_login.php');
}

if (isset($_REQUEST['hotel_admin_id'])) {
    $hotel_admin_id = intval($_REQUEST['hotel_admin_id']);

    $del_sql = "DELETE FROM hotel_admin WHERE hotel_admin_id = '$hotel_admin_id'";
    $records = mysqli_query($con, $del_sql);

    if($records){
        $msg = "Successfully Deleted a Hotels Admin!";
        echo ' <div class="alert alert-danger my-5" style="text-align: center"> <strong> '. $msg .'</strong></div> ';
    }

}


   ?>
        <div style="text-align: center;">
            <a href="a_manage_hotel_admins.php" class="btn btn-primary w-25 text-white "> Back to Menu </a>
        </div>

    </body>

</html>