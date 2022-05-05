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
    <link rel="stylesheet" href="./css/prostyle.css">

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
  width: clamp(520px, 30%, 430px);
  margin: 0 auto;
  margin-top:5%;
  margin-bottom:5%;
  width:50%;
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
<header id="header">
            <i class="fas fa-bars" id="nav-toggler"></i>

        </header>

        <div class="header">
        <a href="#default" class="logo"><img id="logo" src="./pic/wm.png" /></a>
        
        </div>
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
                        <label for="pickupinstructions"><b>City</b></label>
                        <label class="ldesign"><?php echo $d["cont"]; ?></label>
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
            </div>
            </form>
        </div>
  
</body>
</html>
<?php
}
?>