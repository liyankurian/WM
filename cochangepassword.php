<?php
include 'hconnect.php';
session_start();
$ah=$_SESSION['dd'];
$aw=$_SESSION['ww'];

$query="SELECT * FROM `tbl_companyreg` WHERE `cname`='$ah'";
$data=mysqli_query($con,$query);
while ($d=mysqli_fetch_array($data)) {
    

?>
<!DOCTYPE html>
<html>
<head>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Profile</title>
    <link rel="stylesheet" href="./css/style3.css">
<!-- Boxiocns CDN Link -->
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- icons -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">
    <!--Bootstrap js-->
    <script src="/css/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
<div class="sidebar close">
        <div class="logo-details">
            <img id="logo" src="./pic/wm.png" />
        </div>
        <ul class="nav-links">
        <li>
                <a href="cviewprofile.php">
                <i class='bx bx-group'></i>
                    <span class="link_name">Profile</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="cviewprofile.php">Profile</a></li>
                </ul>
            </li>
            
            <li>
                <a href="cochangepassword.php">
                <i class='bx bx-lock-open-alt' style='color:#ffffff'  ></i>
                    <span class="link_name">Change Password</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="cochangepassword.php">Change Password</a></li>
                </ul>
            </li>

            <li>
                <div class="profile-details" style="width: 251px;">
                    
                    <div class="name-job" >
                        <div class="profile_name"  ><a href="logout.php" style="color:white;">Logout<i class='bx bx-log-out'></i></a></div>
                    </div>
                    
                </div>
            </li>
        </ul>
    </div>

<section class="home-section">
        <nav>
            <div class="home-content">
                <i class='bx bx-menu'></i>
                <h1><?php echo $aw; ?></h1>
            </div>
            
        </nav>

<form action="#" method="post">
  
<h2>Change Password</h2>
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
</section>
<script>
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
                arrowParent.classList.toggle("showMenu");
            });
        }
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });
    </script>
</body>
</html>
<?php
}
?>