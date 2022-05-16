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
<html lang="en">
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
<style>
* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.header {
  overflow: hidden;
  background-color:#2dc3a6;
 
}
.header a img{
    height:120px;
    width:120px;
    padding:10px;
}
.header p
{
    float:right;
    padding: 14px 28px;
    font-size: 16px;
    cursor: pointer;
  
}
.header p:hover
{
    background-color:grey;
}

label.ldesign {
  display: block;
  width: 100%;
  height:56px;
  padding: 0.75rem;
  border: 1px solid #2dc3a6;
  border-radius: 0.25rem;
}
.orderform {
  margin: 20% -28% 20% 42% ;
  border: 2px solid #2dc3a6;
  border-radius: 0.35rem;
  padding: 1.5rem;
}
.btn {
    width: 580px;
  height:56px;
  padding: 0.75rem;
  display: block;
  text-decoration: none;
  background-color: #2dc3a6;
  color: #f3f3f3;
  text-align: center;
  border-radius: 0.25rem;
  cursor: pointer;
  transition: 0.3s;
  
}

.sidebar
    {
    width:250px;
    position:fixed;
    left:0;
    top:0;
    height:100%;
    background:#2dc3a6;
    }
@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
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

        <div class="home-sub">
            <div class="overview-boxes ">
            <div id="orderrequest">
        
            <form action="" class="orderform" method="POST">
                <h1 class="text-center">View Profile</h1>

            
                <div class="form-step form-step-active">

                    <div class="input-group" >
                        <label for="cname"><b>Company Names</b></label>
                        <label class="ldesign"><?php echo $d["cname"]; ?></label>
                    </div>
                    <div class="input-group">
                        <label for="cidno"><b>Corporate Identification Number</b></label>
                        <label class="ldesign"><?php echo $d["cidno"]; ?></label>
                    </div>
                    <div class="input-group">
                        <label for="regno"><b>Registration number</b></label>
                        <label class="ldesign"><?php echo $d["regno"]; ?></label>
                    </div>
                    <div class="input-group">
                        <label for="address"><b>Address</b></label>
                        <label class="ldesign"><?php echo $d["addr"]; ?></label>
                    </div>
                    
                    <div class="input-group">
                        <label for="pickupinstructions"><b>District</b></label>
                        <label class="ldesign"><?php echo $d["distr"]; ?></label>
                    </div>
                    
                    <div class="input-group">
                        <label for="pickupinstructions"><b>Pincode</b></label>
                        <label class="ldesign"><?php echo $d["pin"]; ?></label>
                    </div>
                <!-- phone details-->
                    <div class="input-group">
                        <label for="pickupcontact"><b>Contact</b></label>
                        <label class="ldesign"><?php echo $d["cont"]; ?></label>
                    </div>
                    <div class="input-group">
                        <label for="pickupinstructions"><b>Email</b></label>
                        <label class="ldesign"><?php echo $d["email"]; ?></label>
                    </div>
                    
                </div>
                </form>
            </div>
            </div>
        </div>

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