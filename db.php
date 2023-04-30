<?php

    // $serverName = "localhost";
    // $userName = "root";
    // $password = "";
    // $db_Name = "hotel_inyofa";
    
     $serverName = "inyofa.com";
    $userName = "inyofaco_hotel";
    $password = "inyofa@hotel";
    $db_Name = "inyofaco_hotel";

    $con = mysqli_connect($serverName, $userName, $password, $db_Name);

    if(!$con){
        $msg = "Error Connecting the server <br/>";
        $msg .= "Error No: " . mysqli_connect_errno();
        $msg .= "Error: " . mysqli_connect_error();
        die($msg); 
    }

?>