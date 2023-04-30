<?php

SESSION_START();

include "../db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];
    //$password = md5($_POST['password']);


    $table_query = "SELECT * FROM hotel_admin WHERE hotel_admin_email = '$email' AND hotel_admin_password = '$password'";

    $table_result = mysqli_query($con, $table_query);
    $count = mysqli_num_rows($table_result);

    if ($count == 1) {

        $hotel_id;

        while ($row = mysqli_fetch_assoc($table_result)) {
            $hotel_id = $row['hotel_id'];
        }

        $last = 1200 + time();
        $_SESSION['email'] = $email;
        //$logged = $email;
        setcookie("logged", date("F jS - g:i a"), $last);
        header("location:index.php?hotel_id=$hotel_id");
    } else {

        echo "Incorrect Username or Password";
    }
}

$con->close();