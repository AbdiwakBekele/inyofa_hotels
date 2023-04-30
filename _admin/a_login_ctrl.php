<?php

SESSION_START();

include "../db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $email = $_POST['email'];
  $password = $_POST['password'];
  //$password = md5($_POST['password']);


  $table_query = "SELECT * FROM admin WHERE admin_email = '$email' AND admin_password = '$password'";

  $table_result = mysqli_query($con, $table_query);
  $row = mysqli_fetch_array($table_result, MYSQLI_ASSOC);
  $count = mysqli_num_rows($table_result);


  if ($count == 1) {
    $last = 1200 + time();
    $_SESSION['email'] = $email;
    //$logged = $email;
    setcookie("logged", date("F jS - g:i a"), $last);
    header('location:index.php');
  } else {

    echo "Incorrect Username or Password";
  }
}

$con->close();