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
    .row1 {
        margin-left: 30px;
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
                <a href="#" class="active">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">Dashboard</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Dashboard</a></li>
                </ul>
            </li>
            <!-- <li>
                <a href="dassigneduser.php" class="active">
                    <i class='bx bx-user-pin' style='color:#ffffff'  ></i>
                    <span class="link_name">Assigned Users</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="dassigneduser.php">Assigned Users</a></li>
                </ul>
            </li> -->

            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <!--<img src="image/profile.jpg" alt="profileImg">-->
                    </div>
                    <div class="name-job">
                        <div class="profile_name"><a href="logout.php" style="color:white;"><i
                                    class='bx bx-log-out'></i>Driver</a></div>
                    </div>
                    <img src="./staff pic/<?php echo $spic; ?>" height="100px" width="100px"/>
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
        <div class="row1  ">
            <?php
            $sql = "SELECT * FROM tbl_pickupdetails WHERE assign='$ah' AND status='1'";
            $result = mysqli_query($con, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0) {
                
            ?>
        <div class="form bg-light   m-4" id="form" style="height:auto; width:auto;">
                    <table class="table table-bordered">
                    <tr>
                    <th colspan="11" style="text-align:center; ">Assigned User</th>
                    </tr>
                    <tr>
                    <th>Apartment Name</th>
                    <th>Apartment Id</th>
                    <th>Apartment Address</th>
                    <th>District</th>
                    <th>City</th>
                    <th>Pincode</th>
                    <th scope="col">More</th>
                    </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $aid = $row['uid'];
                $qr1=mysqli_query($con,"SELECT b.uid, b.apname, b.apno, b.address, b.dist, b.city, b.pin, b.mob, b.altmob ,a.pickupdate, a.pickuptime, a.pickupday,a.assign FROM tbl_pickupdetails a  inner join tbl_userdetails b WHERE b.uid='$aid'");
                if(mysqli_num_rows($qr1)>0)
                {
                if($r=mysqli_fetch_array($qr1)){
                                    
                ?>

                <tr>
                    <td><?php echo $r['apname'];?></td>
                    <td><?php echo $r['apno'];?></td>
                    <td><?php echo $r['address'];?></td>
                    <td><?php echo $r['dist'];?></td>
                    <td><?php echo $r['city'];?></td>
                    <td><?php echo $r['pin'];?></td>
                    <td><a href="duserdetails.php?aab=<?php echo $r["uid"]; ?>"> <input class="bg-primary text-white"  type="submit" value="More Details" ></a></td>
                </tr>
                <?php  
                } }else{
                    echo "<script>alert('ddd')</script>";
                    }
                }
            }else{
                echo "Not Assigned to Anyone Yet";
            }
            ?>
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