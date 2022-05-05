<?php
include 'hconnect.php';
session_start();
if (isset($_POST['btn'])) {
  $npass=$_POST['nepass'];
  $ah=$_SESSION['dd'];
  $ss=$_SESSION['aa'];


 $query = mysqli_query($con,"UPDATE `tbl_register` SET `password`='$npass',`status`='1' WHERE `email`='$ah'");
    if($query)
    {
      if($ss=="staff"){
        echo '<script type="text/javascript"> alert("Updated Successffully!!");window.location.href= "staff.php";</script>';
      }
      elseif($ss=="driver")
      {
        echo '<script type="text/javascript"> alert("Updated Successffully!!");window.location.href= "driverpanel.php";</script>';
      }
    else
    {
        echo '<script type="text/javascript"> alert("try again!!")</script>';
        echo mysqli_errno($con);
    }
 

    }    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="./bootstrap-4.5.3-dist/css/bootstrap.css">
  
  <script type="text/javascript">
  

    let span = document.getElementsByTagName('span');

    function myFun2() {
      let pa = document.getElementById('nepass');
      let cpa = document.getElementById('chpass');
      if (pa.value == cpa.value)
      {
        span[0].innerText = "";
        span[0].style.color = '#28fc7a';
      } else {
        span[0].innerText = "Password Doesn't Match";
        span[0].style.color = 'red';
      }
    }

  </script>
  <style>
    body
    {
      background-color:#46C0DE ;
      font-family: Arial, Helvetica, sans-serif;
    }
    

    /* Full-width input fields */
    input[type=text], input[type=password] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    /* Set a style for all buttons */
    .btn {
      background-color: #04AA6D;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
    }
    h3{
      text-align: center;
      font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }

    .btn:hover {
      opacity: 0.8;
    }
    .container {
      padding: 16px;
    }

    .imgcontainer {
      text-align: center;
      margin: 24px 0 12px 0;
      
      position: relative;
    }
    img.avatar {
  width: 40%;
  border-radius: 50%;
}


    .modal {
      position: relative; /* Stay in place */
      z-index: 1; /* Sit on top */
      top: 0;
      margin-left:auto ;
      margin-right: auto;
      width: 50%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      padding-top: 60px;
    }

/* Modal Content/Box */
    .modal-content {
      background-color: #fefefe;
      margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
      border: 1px solid #888;
      width: 80%; /* Could be more or less, depending on screen size */
    }
  </style>
  
</head>
<body>

<div id="id01" class="modal">
  <form class="modal-content animate"  method="post">
  <div class="imgcontainer">
<img src="./pic/logo.png" alt="Avatar" class="avatar">
</div>
<h3>Change Password</h3>
  <div class="container">
      <label for="uname"><b>New Password</b></label>
      <input type="password" placeholder="Enter New Password" id="npass" name="nepass" required>
      
      <label for="psw"><b>Confirm Password</b></label>
      
      <input type="password" placeholder="Enter Password" onkeydown="myFun2()" id="cpass" name="chpass" required>
      <span> </span>
      <input  type="submit" value="Change Password" class="btn" name="btn">
    </div>
    
  </form>
  </div>

</body>

</html>








