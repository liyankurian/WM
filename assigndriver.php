<?php

include 'hconnect.php';
$email = $_POST['driver'];
$id = $_POST['id'];

$as=mysqli_query($con,"UPDATE `tbl_pickupdetails` SET `assign`='$email',`status`='1' WHERE `uid`='$id'");
if($as){
    header("location:staff.php");
}else{
    echo mysqli_errno($con);
}
?>