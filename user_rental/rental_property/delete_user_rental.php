<?php

include "../../db.php";
SESSION_START();

if (!isset($_COOKIE['user_logged'])) {
    header('location: ../../rental_login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
        <title>Delete Rental</title>
    </head>

    <body>

        <?php 
        if (isset($_REQUEST['rental_id'])) {
            $rental_id = intval($_REQUEST['rental_id']);
            
            $del_sql = "DELETE FROM rental WHERE rental_id = '$rental_id'";
            $records = mysqli_query($con, $del_sql);
            
            if($records){
            $del_res = "DELETE FROM rental_reservation WHERE rental_id = '$rental_id'";
            $records_res = mysqli_query($con, $del_res);

                if($records_res){
                    $msg = "<div class='alert alert-success'> You have Successfully Deleted Rental</div>";
                    echo $msg;
                }else{
                    $msg = "<div class='alert alert-danger'> Error Deleting Rental </div>";
                    echo $msg;
                }

            }else{
            $msg = "<div class='alert alert-danger'> Error Deleting Rental </div>";
            echo $msg;
        }
            
        }
    
    ?>
        <a href="rental_list.php" style="text-decoration: none" class="btn btn-primary text-white mx-5 w-25"> Go
            Back </a>

    </body>

</html>