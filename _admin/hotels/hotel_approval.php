<?php

include "../../db.php";
SESSION_START();

if (!isset($_COOKIE['logged'])) {

    header('location: ../../a_login.php');
}

if(isset($_POST['approve_submit'])){
    $hotel_id =  $_POST['hotel_id'];
    
    $sql = "UPDATE hotels SET isApproved ='1' WHERE hotel_id=$hotel_id";
    if (mysqli_query($con, $sql)) {
        header('location: a_manage_hotels.php');
    }else{
        echo "Error Approving";
    }

}

if(isset($_POST['disapprove_submit']) ){
    
    $hotel_id = $_POST['hotel_id'];
    $sql = "UPDATE hotels SET isApproved ='0' WHERE hotel_id=$hotel_id";
    if (mysqli_query($con, $sql)) {
        header('location: a_manage_hotels.php');
    }else{
        echo "Error Approving";
    }

}

?>