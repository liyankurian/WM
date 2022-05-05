<?php
include 'hconnect.php';
session_start();
if (isset($_SESSION['wmsession']) == session_id()) {
  header('location:adminpanel.php');
} else if (isset($_SESSION['wmUsersession']) == session_id()) {
  header('location:createprofile.php');
}
if (isset($_POST['reg'])) {
  $b = $_POST["mail"];

  $c = $_POST["pass"];



  if ($b == "admin@gmail.com") {
    $query5 = mysqli_query($con, "SELECT * FROM `tbl_register` WHERE `email`='$b' and `password`='$c' and `status`='1'");
    if (mysqli_num_rows($query5) > 0) {
      $dom = mysqli_fetch_assoc($query5);
      $_SESSION['wmsession'] = session_id();
      header('location:adminpanel.php');
    } else {
      echo '<script type="text/javascript"> alert("Invalid Username and Password!!")</script>';
    }
  }


  $query = mysqli_query($con, "SELECT * FROM `tbl_register` WHERE `email`='$b'");
  if (mysqli_num_rows($query) > 0) {
    while ($d = mysqli_fetch_array($query)) {

      $role = $d['role'];
      $cid=$d['id'];
      $uid=$d['uid'];
      $em = $d['email'];
      $stat=$d['status'];
    }

    $_SESSION['dd'] = $em;
    $_SESSION['aa'] = $role;
   

    if ($role == 'user') {
      $cd = md5($c);
      $query = mysqli_query($con, "SELECT * FROM `tbl_register` WHERE `email`='$b' and `password`='$cd'");


      if (mysqli_num_rows($query) > 0) {
        if($stat==1){
          $_SESSION['a']=$cid;
          $_SESSION['wmUsersession'] = session_id();
          header('location:createprofile.php');
        }else{
          $_SESSION['ai']=$id;
          $_SESSION['wmUsersession'] = session_id();
          header('location:userpanel.php');
        }

        
      } else {
        echo '<script type="text/javascript"> alert("Invalid Username and Password!!")</script>';
      }
    } elseif ($role == 'staff') {

      $query66 = mysqli_query($con, "SELECT * FROM `tbl_register` WHERE `email`='$b' and `password`='$c'");

      if (mysqli_num_rows($query66) > 0) {
        if($stat==0){
          
          header('location:firstpassword.php');
        }else{
          header('location:staff.php');
        }

        
      } 
      else {
        echo '<script type="text/javascript"> alert("Invalid Username and Password!!")</script>';
      }
    } elseif ($role == 'driver') {
      if($stat==0){
        header('location:firstpassword.php');
      }else{
        header('location:driverpanel.php');
      }

     
    }
  }else{
    //echo mysqli_errno($con);
    
    echo '<script type="text/javascript"> alert("Invalid Email ID!!")</script>';
  }

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- css -->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="./bootstrap-4.5.3-dist/css/bootstrap.css">
  <script type="text/javascript" src="./bootstrap-4.5.3-dist/js/bootstrap.js"></script>
  <!-- jquery -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Bootstrap-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <script type="text/javascript">

  </script>
</head>

<body>
  <div class="slanted">
    <div class="col1">
      <img id="logo" src="./pic/logo.png" />
    </div>
    <div class="col2"></div>

    <div class="slanted2">
      <div class="col3"><img id="vector" src="./pic/dd 1.png" /></div>

      <div class="col4">
        <div class="log">
          <form action="userlogin.php" method="POST" class="form-login" onsubmit="return validate();">
            <h2 style="margin-top:100px;">LOGIN FORM</h2>
            <input type="text" id="email" name="mail" placeholder="Enter your Email" required>
            <span></span>
            <input type="password" id="password" name="pass" placeholder="Enter Password" required>
            <span></span>
            <input type="submit" name="reg" value="LOGIN" onclick="myFunction();">
            <h6> Create an account? <b><a href="userreg.php">Register here </a></b></h6>
          </form>
        </div>
      </div>
    </div>
  </div>

  </div>
  </div>
</body>

</html>