<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<h2>Change Password</h2>

<form action="#" method="post">
  

  <div class="container">
    <label for="uname"><b>Enter the Email</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Current Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw"><b>Confirm Password</b></label>
    <input type="password" placeholder="Enter Password" name="cpsw" required>
        
   <input  type="submit"value="Change Password" name="btn">

  </div>

  
</form>
<?php
include 'hconnect.php';

if (isset($_POST['btn'])) {
    $uname=$_POST["uname"];
   
    $pass=$_POST["psw"];
    $cpass=$_POST["cpsw"];
    $query1 = mysqli_query($con, "SELECT * FROM `tbl_companyreg` WHERE `email`='$uname' and `pass`='$pass'");
if(mysqli_num_rows($query1) > 0)
{    $query = mysqli_query($con,"UPDATE `tbl_companyreg` SET `pass`='$cpass'WHERE `email`='$uname'");
    if($query)
    {
    echo '<script type="text/javascript"> alert("Updated Successffully!!");window.location.href= "clogin.php";</script>';
    }
    else
    {
        echo '<script type="text/javascript"> alert("try again!!")</script>';
        echo mysqli_errno($con);
    }

}else{
    echo '<script type="text/javascript"> alert("incorrect credentials!!")</script>';  
}}
?>
</body>
</html>
