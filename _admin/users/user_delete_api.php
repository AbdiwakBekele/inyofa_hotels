<?php
include "../../db.php";
SESSION_START();

if (!isset($_COOKIE['logged'])) {

    header('location: ../../a_login.php');
}

if (isset($_REQUEST['user_id'])) {
    $user_id = intval($_REQUEST['user_id']);

    $del_sql = "DELETE FROM user WHERE user_id = '$user_id'";
    if (mysqli_query($con, $del_sql)) {
        echo ("Successfully Deleted a User Information!");
    } else {
        echo ("Successfully Deleted a User Information!");
    }




    // $db->query("DELETE FROM student WHERE ID = $id");
}

   // header("Location: a_manage_teachers.php");