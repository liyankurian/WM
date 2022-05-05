<?php
session_start();
unset($_SESSION['wmsession']);
session_destroy();
header("Location:userlogin.php");
?>