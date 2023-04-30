<?php
SESSION_START();
session_unset();
SESSION_DESTROY();
setcookie("logged", "", time() - 3600);
header("Location: ../a_login.php");