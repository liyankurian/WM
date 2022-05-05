<?php
session_start();
unset($_SESSION['wmUsersession']);
session_destroy();
header("Location:userlogin.php");
?>