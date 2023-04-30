<?php
SESSION_START();
session_unset();
SESSION_DESTROY();
setcookie("user_logged", "", time() - 3600);
header("Location: ../user_login.php");