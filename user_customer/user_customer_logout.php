<?php
SESSION_START();
session_unset();
SESSION_DESTROY();
setcookie("customer_logged", "", time() - 3600);
header("Location: ../index.php");