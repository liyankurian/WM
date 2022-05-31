<?php
include 'hconnect.php';
session_start();
$ah=$_SESSION['dd'];
$rid = mysqli_query($con, "SELECT * FROM `tbl_register` WHERE `email`='$ah'");
while ($tid = mysqli_fetch_array($rid)) {
    $id = $tid['uid'];
    
}
$pi=mysqli_query($con,"SELECT * FROM `tbl_driverdetails` WHERE `id`='$id'");
$userData=mysqli_fetch_assoc($pi);
$spic=$userData['img'];
$_SESSION['na']=$userData['name'];
$a=$_SESSION['na'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> User Panel </title>
    <link rel="stylesheet" href="./css/style3.css">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- icons -->
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">
    <!--Bootstrap js-->
    <script src="/css/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <style>
    .blinking {
        animation: blinkingText 1.2s infinite;
    }

    @keyframes blinkingText {
        0% {
            color: #fff;
        }

        49% {
            color: #fff;
        }

        60% {
            color: transparent;
        }

        99% {
            color: transparent;
        }

        100% {
            color: #fff;
        }
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
                <a href="driverpanel.php" class="active">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">Dashboard</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="driverpanel.php">Dashboard</a></li>
                </ul>
            </li>
            <li>
                <a href="dassigneduser.php" class="active">
                    <i class='bx bx-user-pin' style='color:#ffffff'></i>
                    <span class="link_name">Assigned Users</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="dassigneduser.php">Assigned Users</a></li>
                </ul>
            </li>

            <li>
                <a href="dcollection.php" class="active">
                <i class='bx bx-collection' style='color:#ffffff'  ></i>
                    <span class="link_name">Collection Details</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="dcollection.php">Collection Details</a></li>
                </ul>
            </li>

            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <!--<img src="image/profile.jpg" alt="profileImg">-->
                    </div>
                    <div class="name-job">
                        <div class="profile_name"><a href="logout.php" style="color:white;"><i
                                    class='bx bx-log-out'></i>Driver</a></div>
                    </div>
                    <img src="./staff pic/<?php echo $spic; ?>" height="100px" width="100px" />
                </div>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="home-content">
                <i class='bx bx-menu'></i>
                <span class="text">Driver Dashboard</span>
            </div>
            <h4><?php echo $ah; ?></h4>
        </nav>
        <div class="row1 ">
            <?php
            date_default_timezone_set('Asia/Kolkata');
            $curdate=date("Y-m-d");
            $sql = mysqli_query($con,"SELECT * FROM tbl_pickupdetails WHERE  pickupdate='$curdate' AND  assign='$a' AND `status`='1' and `updated_date`<>'$curdate'");
            $resultCheck = mysqli_num_rows($sql);
            $curd=date('Y-m-d');
            $s = mysqli_query($con,"SELECT * FROM tbl_pickupdetails WHERE  pickupdate<='$curdate' AND  assign='$a' AND `status`='2' and `updated_date`<>'$curd'");
            $resultCheck1=mysqli_num_rows($s);
            ?>
            <div class="form bg-light m-4" id="form" style="height:auto; width:auto;">
                <table class="table table-bordered ">
                    <tr>
                        <th colspan="11" style="text-align:center; ">Today PickUp</th>
                    </tr>
                    <tr>
                        <th>Apartment Name</th>
                        <th>Apartment Address</th>
                        <th>Place</th>
                        <th>Pincode</th>
                        <th>Phone No</th>
                        <th>Alternative No</th>
                        <th scope="col">More</th>
                        <TH colspan="2">Collection Status</TH>
                    </tr>
                    <?php
                
                
                
              

                    
                    if ($resultCheck > 0 || $resultCheck1 > 0 ) {
                        
                    while ($row = mysqli_fetch_array($s)){ 
                    $aid = $row['uid'];
                    $qr1=mysqli_query($con,"SELECT * FROM `tbl_userdetails` WHERE `uid`=$aid");
                    if($r=mysqli_fetch_array($qr1)){
                        ?>
                    <tr>
                        <td><?php echo $r['apname'];?><br></td>

                        <td><?php echo $r['address'];?></td>
                        <td><?php echo $r['dist'];?></td>
                        <td><?php echo $r['pin'];?></td>
                        <td><?php echo $r['mob'];?></td>
                        <td><?php echo $r['altmob'];?></td>
                        <td><a href="duserdetails.php?aab=<?php echo $r["uid"]; ?>"> <input
                                    class="bg-primary text-white" type="submit" value="More Details"></a></td>
                        <?php
                        date_default_timezone_set('Asia/Kolkata');

                        $curdate=date('Y-m-d H:i:s');
                        $curd=date('Y-m-d');
                                $a=$r["uid"];  
                         $qq = mysqli_query($con,"SELECT * FROM `tbl_collection` WHERE `uid`='$a' AND  `date`='$curdate' ");
                        
                        if(mysqli_num_rows($qq)==0){

                            
                            ?>
                        
                        
                        <td><a href="collect.php ?usid=<?php echo $a; ?>"><button
                                    class="btn btn-danger">Collect</button></a></td>
                        <?php
                        }?>

                    </tr>
                    <?php  
                    }
                }
                while ($row = mysqli_fetch_array($sql)){
                    $aid = $row['uid'];
                    $qr1=mysqli_query($con,"SELECT * FROM `tbl_userdetails` WHERE `uid`=$aid");
                    if($r=mysqli_fetch_array($qr1)){
                        ?>
                    <tr>
                        <td><?php echo $r['apname'];?><span class=" blinking badge rounded-pill bg-danger ">New User</span></td>
                        <td><?php echo $r['address'];?></td>
                        <td><?php echo $r['dist'];?></td>
                        <td><?php echo $r['pin'];?></td>
                        <td><?php echo $r['mob'];?></td>
                        <td><?php echo $r['altmob'];?></td>
                        <td><a href="duserdetails.php?aab=<?php echo $r["uid"]; ?>"> <input
                                    class="bg-primary text-white" type="submit" value="More Details"></a></td>
                        <?php
                        $qq = mysqli_query($con,"SELECT `uid` `status` `date` FROM `tbl_collect` WHERE `uid`='$aid' AND  `date`='$curdate'");
                         if($qq==0){
                        ?>
                        <td><a href="collect.php ?usid=<?php echo $r["uid"]; ?>"><button
                                    class="btn btn-danger">Collect</button></a></td>
                        <?php
                        }?>
                    </tr>
                    <?php  
                    }
                }
                
                }else{?>
                    <td>No Duty</td>
                    <?php }?>

                </table>
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