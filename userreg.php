<?php
include 'hconnect.php';
if (isset($_POST['reg'])) {
  $b = $_POST["mail"];
  $c = md5($_POST["pass"]);

  $query = "SELECT * FROM  `tbl_register` WHERE email='$b' ";
  $query_run = mysqli_query($con, $query);

  if (mysqli_num_rows($query_run) < 1) {
    $query = mysqli_query($con, "INSERT INTO `tbl_register`(`email`, `password`,`role`,`status`) VALUES ('$b','$c','user','1')");
    if ($query) {
      echo '<script type="text/javascript"> alert("Register Successffully!!")</script>';
      header('location:userlogin.php');
    } else {
      echo mysqli_errno($con);
    }
  } else {
    echo '<script type="text/javascript"> alert("USER EXISTING!!")</script>';
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

  <!--Bootstrap-->
  <link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">

  <!--Bootstrap js-->
  <script src="/css/bootstrap/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <!--font-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script type="text/javascript">
    //VALIDATION
    function validate() {
      if (document.getElementById('username').value.length == 0 || document.getElementById('email').value.length == 0 ||
        document.getElementById('password').value.length == 0 || document.getElementById('cpassword').value.length == 0) {
        alert("Complete the registration");
        return false;
      }
    }

    let span = document.getElementsByTagName('span');


    /*function myFun() {
      let na = document.getElementById('username');

      var regex = /^([\.\_a-zA-Z]+)([a-zA-Z ]+){1,30}$/;
      if (regex.test(na.value)) {
        span[0].innerText = "";
        span[0].style.color = '#28fc7a';
        na.style.borderColor = '#28fc7a';
      } else {
        span[0].innerText = "Enter a Valid Name";
        span[0].style.color = 'red';
        na.style.borderColor = 'red';
      }
    }*/

    function myFun1() {
      let em = document.getElementById('email');

      var m = /^([a-z A-Z 0-9_\-\.])+\@([a-z A-Z 0-9_\-])+\.([a-z A-Z]{1,2}).$/;
      if (em.value.match(m)) {
        span[0].innerText = "";
        span[0].style.color = '#28fc7a';
      } else {
        span[0].innerText = "Your Email is Invalid";
        span[0].style.color = 'red';
      }
    }

    function myFun2() {
      let pa = document.getElementById('password');
      let cpa = document.getElementById('cpassword');
      if (pa.value == cpa.value)

      {
        span[1].innerText = "";
        span[1].style.color = '#28fc7a';
      } else {
        span[1].innerText = "Password Doesn't Match";
        span[1].style.color = 'red';
      }
    }


    /*var regex = /^([\.\_a-zA-Z]+)([a-zA-Z ]+){1,30}$/;
    if(document.getElementById("username").value.match(regex))
    {}
    else
    {
		alert("Enter Valid username");
    }
    var m=/^([a-z A-Z 0-9_\-\.])+\@([a-z A-Z 0-9_\-])+\.([a-z A-Z]{2,4}).$/;
	if(document.getElementById("email").value.match(m))
	{}
	else
	{
		alert("Invalid email id");
        }
    if(document.getElementById("password").value==document.getElementById("cpassword").value)
		{}
		else
		{
		alert("password mismatch");
        document.getElementById("pass").focus();
        return  false;		
		}*/
  </script>
</head>

<body>

  <div class="slanted">

    <div class="col1"><img id="logo" src="./pic/logo.png" /></div>
    <div class="col2"></div>

    <div class="slanted2">
      <div class="col3"><img id="vector" src="./pic/dd 1.png" /></div>
      <div class="col4">
        <div class="log">
          <form action="userreg.php" method="POST" class="form-login" onsubmit="return validate();">
            <h2>REGISTER FORM</h2>
            <!-- <div class="form-row">
              <span></span>
              <input type="text" id="username"  name="un" onkeyup="myFun()" placeholder="Enter Name"><br>
              </div>-->
            <div class="form-row">
              <span></span>
              <input type="text" id="email" name="mail" onkeyup="myFun1()" placeholder="Enter your Email" required>
            </div>

            <input type="password" id="password" name="pass" placeholder="Create Password" required><br>
            <div class="form-row">
              <span></span>
              <input type="password" id="cpassword" name="cpass" onkeyup="myFun2()" placeholder="Confirm Password" required>
            </div>
            <input type="submit" name="reg" value="REGISTER NOW" id="submit">
            <h6> Have already an account? <b><a href="userlogin.php">Login here </a></b></h6>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>