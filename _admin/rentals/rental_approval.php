<?php

include "../../db.php";
SESSION_START();

if (!isset($_COOKIE['logged'])) {

    header('location: ../../a_login.php');
}

if(isset($_POST['approve_submit'])){
    $rental_id =  $_POST['rental_id'];
    $sql = "UPDATE rental SET isApproved ='1' WHERE rental_id=$rental_id";
    if (mysqli_query($con, $sql)) {
        header('location: a_manage_rentals.php');
    }else{
        echo "Error Approving";
    }

}

if(isset($_POST['disapprove_submit']) ){
    
    $rental_id = $_POST['rental_id'];
    $sql = "UPDATE rental SET isApproved ='0' WHERE rental_id=$rental_id";
    if (mysqli_query($con, $sql)) {
        header('location: a_manage_rentals.php');
    }else{
        echo "Error Approving";
    }

}

?>