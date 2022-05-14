<?php
include 'hconnect.php';
session_start();
$id=$_GET['usid'];
$ah=$_SESSION['dd'];
$curd=date('Y-m-d H:i:s');

$as=mysqli_query($con,"UPDATE `tbl_pickupdetails` SET `status`='2',`updated_date`='$curd' WHERE `uid`='$id'");
$co=mysqli_query($con,"INSERT INTO `tbl_collection`(`uid`, `status`, `date`, `dassign`) VALUES ('$id','collected','$curd','$ah')");
if($as && $co)
{
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal("Assigned successfully","success");';
        echo '}, 1000);</script>';
        header("location:driverpanel.php");
    
}
else{
    echo mysqli_errno($con);
}


?>
