

<?php

include 'hconnect.php';
session_start();
$ah=$_SESSION['zz'];
if (isset($_POST['reason'])) {
    $b = $_POST["res"];
$q=mysqli_query($con,"UPDATE `tbl_userdetails` SET `status`= 2,`reason`='$b' WHERE `uid`='$ah'");
if($q){
    header("location:staff.php");
}else{
    echo mysqli_errno($con);
}
}
?>