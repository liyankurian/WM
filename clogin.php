<?php
include 'hconnect.php';
session_start();
if (isset($_POST['reg'])) {
$b = $_POST["mail"];

$c = $_POST["pass"];

    $query5 = mysqli_query($con, "SELECT * FROM `tbl_companyreg` WHERE `email`='$b' and `pass`='$c'");
    if (mysqli_num_rows($query5) > 0) {
    
    while ($dom = mysqli_fetch_assoc($query5)) {
        $em = $dom['cname'];
        $am = $ed['email'];
    }
    $_SESSION['dd'] = $em;
    $_SESSION['ww'] = $am;

    header('location:cpanel.php');
    } else {
    echo '<script type="text/javascript"> alert("Invalid Username and Password!!")</script>';
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
          <form action="clogin.php" method="POST" class="form-login" onsubmit="return validate();">
            <h2 style="margin-top:100px;">LOGIN FORM</h2>
            <input type="text" id="email" name="mail" placeholder="Enter your Email" required>
            <span></span>
            <input type="password" id="password" name="pass" placeholder="Enter Password" required>
            <span></span>
            <input type="submit" name="reg" value="LOGIN">
            <h6> Create an account? <b><a href="reg_company.php">Register here </a></b></h6>
          </form>
        </div>
      </div>
    </div>
  </div>

  </div>
  </div>
</body>

</html>