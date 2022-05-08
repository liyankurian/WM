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
        top: 50%;
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
                <a href="applystaffleave.php">
                <i class='bx bxs-calendar' style='color:#ffffff'  ></i>
                    <span class="link_name">Apply Leave</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="applystaffleave.php">Apply Leave</a></li>
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


        
        <div class="home-sub mt-5">
            <div class="details">
                <h3>Leave Status</h3>
                <table class="table table-bordered">
                    <tr>
                    <th>Index</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Reason</th>
                    <th>Status</th>
                    <th>Delete</i></th>
                    </tr>
                    
                    <?php
                    $no=1;
                        $lea=mysqli_query($con,"SELECT * FROM `tbl_leave` WHERE `uid`='$uid'");
                        if(mysqli_num_rows($lea)<1)
                        {
                            ?> <tr><th colspan="6" class="rec">No Records</th> </tr>
                            <?php
                        }
                        
                        else
                        {
                            while ($leave = mysqli_fetch_array($lea)) { ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $leave["startdate"]; ?></td>
                        <td><?php echo $leave["enddate"]; ?></td>
                        <td><?php echo $leave["reason"]; ?></td>
                        <?php
                        if($leave["status"]==0)
                        {?>
                        <td><span class="p-1" style="background:orange; color:white;">Pending</span></td>
                        <?php
                        }
                        elseif($leave["status"]==1)
                        {?>
                        <td><span class="p-1" style="background:green; color:white;">Approved</span></td>
                        <?php
                        }
                        else
                        {?>
                        <td><span class="p-1" style="background:red; color:white;">Rejected</span></td>
                        <?php
                        }
                        ?>
                        <td><a href="leavedelete.php ?lid=<?php echo $leave["id"]; ?>" id="delete" name="delete"><i class='bx bx-trash' style='color:#c10606'  ></i></a></td>
                        
                        
                    </tr>
                    <?php
                        $no++;
                        }
                    }
                        ?> 
                    
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

<script type="text/javascript">
         $(function () {
             $('#datetimepicker1').datetimepicker();
         });
      </script>
    
</body>

</html>