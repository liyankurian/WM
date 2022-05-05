<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    
</body>
</html>


<?php

include 'hconnect.php';
session_start();
$ah=$_SESSION['zz'];

$q=mysqli_query($con,"UPDATE `tbl_userdetails` SET `status`=1 WHERE `uid`='$ah'");
if($q){
    $_SESSION['msg']="Data Updated Succesfully";
    header("location:staff.php");
}else{
    echo mysqli_errno($con);
}

?>