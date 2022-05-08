<?php
include 'hconnect.php';
session_start();
$ah=$_SESSION['dd'];
$uid=$_SESSION['storeid'];
$rid = mysqli_query($con, "SELECT * FROM `tbl_register` WHERE `email`='$ah'");
while ($tid = mysqli_fetch_array($rid)) {
    $id = $tid['uid'];
    
}
$pi=mysqli_query($con,"SELECT * FROM `tbl_addstaff` WHERE `id`='$id'");
$userData=mysqli_fetch_assoc($pi);
$spic=$userData['img'];

if (isset($_POST['submit'])) {
    
    $dob1=$_POST['dob1'];
    $dob2=$_POST['dob2'];
    $rsn=$_POST['rsn'];
    $query = mysqli_query($con,"INSERT INTO `tbl_leave`( `uid`, `startdate`, `enddate`, `reason`) VALUES ('$uid','$dob1','$dob2','$rsn')");
    if($query){
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("WOW!","Message!","success");';
        echo '}, 1000);</script>';
       
    }
    else
    {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Pickup details not added successfully","error");';
            echo '}, 1000);</script>';
        
    }

}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> staff Dasboard </title>
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
    <script src="jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        let b1=document.querySelector('bdtn');
        let b2=document.querySelector('edtn');
    </script>
    <style>
        h3{
            text-align: center;
        }
    .home-sub{ 
    padding: 0 20px;
    margin-top: 20px;
    margin-left: 20px;
    
    }
   
    .details {
        position: absolute;
        top: 30%;
        left: 30%;
        margin: -25px 0 0 -25px;
        padding: 12px 20px;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        display: block;

    }

    </style>
</head>

<body>
    <div class="sidebar close">
        <div class="logo-details">
            <img id="logo" src="./pic/logo.png" />
        </div>
        <ul class="nav-links">
            <li>
                <a href="staff.php" class="active">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">Request</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="staff.php">Request</a></li>
                </ul>
            </li>


            <li>
                <a href="acceptdetails.php">
                <i class="las la-user-check"></i>
                    <span class="link_name">Accept Users</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="acceptdetails.php">Accept Users</a></li>
                </ul>
            </li>

            <li>
                <a href="rejectdetails.php">
                    <i class="las la-user-times"></i>
                    <span class="link_name">Rejected Users</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="rejectdetails.php">Rejected Users</a></li>
                </ul>
            </li>

            <li>
                <a href="staffleave.php">
                <i class='bx bxs-calendar' style='color:#ffffff'  ></i>
                    <span class="link_name">Apply Leave</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="staffleave.php">Apply Leave</a></li>
                </ul>
            </li>

            <li>
                <a href="viewstaffleavestatus.php">
                <i class='bx bx-calendar-minus' style='color:#ffffff'  ></i>
                    <span class="link_name">Leave Status</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="viewstaffleavestatus.php">Leave Status</a></li>
                </ul>
            </li>
            </ul>
            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <!--<img src="image/profile.jpg" alt="profileImg">-->
                    </div>
                    <div class="name-job">
                        <div class="profile_name" ><a href="userlogin.php" style="color:white;"><i class='bx bx-log-out'></i>STAFF</a></div>
                      
                    </div>
                    <img src="./staff pic/<?php echo $spic; ?>" height="100px" width="100px"/>
                </div>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav >
            <div class="home-content">
                <i class='bx bx-menu'></i>
                <span class="text">Dashboard</span>
            </div>
            <h5  class="mt-3"><?php echo $ah; ?></h5>
        </nav>
        
        <div class="details">
        <form  action="#" method="post">
            <H3>Apply Leave</H3>
            <table class="table table-bordered">
                <tr>
                    <th>Start Date:</th>
                    <td><input type="date" name="dob1" id="floatingInput"  ></td>
                </tr>
                <tr>
                    <th>End Date:</th>
                    <td> <input type="date" name="dob2" id="floatingInput" ></td>
                </tr>
                <tr>
                    <th>Reason</th>
                    <td><input type="text" name="rsn" placeholder="Enter the Reason"></td>
                </tr>
                <tr>
                   <td colspan="2"><input style='margin:0 100px 0 100px;' type="submit"  name="submit" value="Apply " class="btn btn-primary"></td> 
                </tr>
            </table>
</form>

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

<script type="text/javascript">
         $(function () {
             $('#datetimepicker1').datetimepicker();
         });
      </script>
    
</body>

</html>