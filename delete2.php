<?php
include 'hconnect.php';
$a=$_GET["xyz"];
$status=$_GET['status'];
mysqli_query($con,"UPDATE `tbl_register` SET `status`='$status' WHERE `uid`=$a");
header("location:driverdetails.php");
?>