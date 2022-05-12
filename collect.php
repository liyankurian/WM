<?php
include 'hconnect.php';
$id=$_GET['usid'];

$as=mysqli_query($con,"UPDATE `tbl_pickupdetails` SET `status`='2' WHERE `uid`='$id'");
$co=mysqli_query($con,"INSERT INTO `tbl_collection`(`uid`, `status`) VALUES ('$id','collected')");
if($as && $co)
{
    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal("Assigned successfully","success");';
        echo '}, 1000);</script>';
        
    
}
else{
    echo mysqli_errno($con);
}


?>
