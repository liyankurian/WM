<?php
include 'hconnect.php';
session_start();
$ah=$_SESSION['dd'];
$rid = mysqli_query($con, "SELECT * FROM `tbl_register` WHERE `email`='$ah'");
while ($tid = mysqli_fetch_array($rid)) {
    $id = $tid['uid'];
    $_SESSION['storeid']=$id;
    
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
    <script>
        let b1=document.querySelector('bdtn');
        let b2=document.querySelector('edtn');
    </script>
    <style>
    .home-sub .overview-boxes{
    display: flex;
    flex-wrap: wrap;
    padding: 0 20px;
    margin-bottom: 16px;
    flex-direction: column;
    }
    .rec{
    text-align: center;
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
            <!--
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
            </li>-->
            
           

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
        
        <div class="home-sub">
        
            <div class="overview-boxes ">
            <div class="container">
        <!-- search -->
        <div class="row">
            <div class="col-md-12 mt-4">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="acceptsearch.php" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
</div>
            </div>
            
            <div class="form bg-light  mt-4" id="form" style="height:auto; width:auto;">
                    <table class="table table-bordered">
                        <thead>
                        <tr><th colspan="7" class="rec">Accepted Data</th></tr>
                            <tr>
                                <th scope="col">Index</th>
                                <th scope="col">Email</th>
                                <th scope="col">Apartment Name</th>
                                <th scope="col">Apartment Number</th>
                                <th scope="col">Address</th>
                                <th scope="col">More</th>
                                
                            </tr>
                        </thead>
                        </tr>
                        </thead>
                        <?php
                        $no=1;
                        $res = mysqli_query($con, "SELECT b.email,b.id,a.uid,a.status,a.apname, a.apno, a.address FROM tbl_userdetails a INNER JOIN tbl_register b where b.id=a.uid and a.status='1' ");
                        if(mysqli_num_rows($res)<1)
                        {
                            ?> <tr><th colspan="6" class="rec">No Records</th> </tr>
                            <?php
                        }
                        
                        else
                        {
                        
                        while ($row = mysqli_fetch_array($res)) { ?>
                        <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $row["email"]; ?></td>
                                <td><?php echo $row["apname"]; ?></td>
                                <td><?php echo $row["apno"]; ?></td>
                                <td><?php echo $row["address"]; ?></td>  
                                <td><a href="acceptdetailsmore.php?aab=<?php echo $row["id"]; ?>"> <input class="bg-primary text-white"  type="submit" value="More Details" ></a></td>
                               
                                
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
</body>

</html>