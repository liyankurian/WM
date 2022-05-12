<?php
include 'hconnect.php';
session_start();
if(isset($_SESSION['wmsession'])!= session_id()){
    header("location: ./userlogin.php");
    die();
}else{
    
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Admin Dasboard </title>
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
</head>

<body>
    <div class="sidebar close">
        <div class="logo-details">
            <img id="logo" src="./pic/logo.png" />
        </div>
        <ul class="nav-links">
            <li>
                <a href="adminpanel.php" >
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">Dashboard</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="adminpanel.php">Dashboard</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="#">
                        <i class='bx bx-group'></i>
                        <span class="link_name">Employee</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu link_name " >
                    <li><a   href="addstaff.php">Add Staff</a></li>
                    <li><a   href="addriver.php">Add Driver</a></li>
                    <li><a   href="staffdetails.php">Staff Details</a></li>
                    <li><a   href="driverdetails.php">Driver Details</a></li>
                </ul>
            </li>

            <li>
                <div class="iocn-link">
                <a href="staffleave.php">
                <i class='bx bxs-calendar' style='color:#ffffff'  ></i>
                    <span class="link_name">Staff Leave 
                    <?php
                    $qu = mysqli_query($con,"SELECT * FROM `tbl_leave` WHERE `status` = '0'");
                    if(mysqli_num_rows($qu)>0){
                    ?><span class="badge  rounded-pill bg-danger ">New</span></span>
                    <?php
                    }
                    ?>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                    <ul class="sub-menu link_name " >
                    <li><a   href="approvedstaffleave.php">Approved Leave</a></li>
                    <li><a   href="rejectedstaffleave.php">Rejected Leave</a></li>
                    </ul>
            </li>

            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <!--<img src="image/profile.jpg" alt="profileImg">-->
                    </div>
                    <div class="name-job">
                        <div class="profile_name" ><a href="logout.php" style="color:white;"><i class='bx bx-log-out'></i>Admin</a></div>
                    </div>
                    <img src="https://img.icons8.com/bubbles/100/000000/system-administrator-female.png" />
                </div>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="home-content">
                <i class='bx bx-menu'></i>
                <span class="text">Dashboard</span>
            </div>
            
        </nav>
        <div class="home-sub mt-5">
            <div class="details m-3">
                <h3>Leave Status</h3>
                <table class="table table-bordered">
                    <tr>
                    <th style="width:20px;">Index</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Reason</i></th>
                    <th colspan="2">Proceed</th>
                    </tr>
                    
                    <?php
                    $no=1;
                        $l1=mysqli_query($con,"SELECT * FROM `tbl_leave` ");
                        
                        while($l2=mysqli_fetch_array($l1)){
                            $uid=$l2['uid']; 
                        }
                        $l3=mysqli_query($con,"SELECT a.email,b.name,c.startdate,c.enddate,c.reason,c.status FROM tbl_register a INNER JOIN tbl_addstaff b INNER JOIN tbl_leave c WHERE a.uid=b.id and b.id=c.uid and b.id='$uid' and c.status='2' ");
                        if(mysqli_num_rows($l3)>0){
                        while($l4=mysqli_fetch_array($l3)){
                           
                            ?>
                            <tr>
                        <td style="width:20px;"><?php echo $no;?></td>
                        <td><?php echo $l4["name"]; ?></td>
                        <td><?php echo $l4["email"]; ?></td>
                        <td><?php echo $l4["startdate"]; ?></td>
                        <td><?php echo $l4["enddate"]; ?></td>
                        <td><?php echo $l4["reason"]; ?></td>
                        <td><input type="submit" name="approve" value="Rejected" class="bg-danger  text-white"></td>
                        
                    </tr>
                    <?php
                        $no++;
                        }
                    } else{
                        ?>
                    
                           <tr><th colspan="6" class="rec">No Leave</th> </tr>
                            <?php
                        }
                        ?>
                    
                        
                        
                </table>
                    
                    
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