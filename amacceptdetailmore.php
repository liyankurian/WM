<?php
include 'hconnect.php';
session_start();
$id=$_GET['aab'];
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
	<style>
	.home-sub .overview-boxes{
    display: flex;
    flex-wrap: wrap;
    padding: 0 20px;
    margin-bottom: 16px;
    flex-direction: column;
    }
	.modal-body input
    {
        width: 80%;
    }
    .mvp
    {   display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 2vw;
        padding:4vw;
        border-radius: 2%;
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
                <div class="iocn-link">
                    <a href="#">
                        <i class='bx bx-user' style='color:#ffffff'  ></i>
                        <span class="link_name">Users</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu link_name " >
				    <li><a   href="amacceptdetails.php">Approved Users</a></li>
                    <li><a   href="amrejectdetails.php">Rejected Users</a></li>
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

        <div class="home-sub">
            <div class="overview-boxes ">
			<div class="form bg-light mvp  mt-4" id="form" style="height:auto; width:auto;">
			<?php
                        $res = mysqli_query($con, "SELECT b.email,b.id,a.uid,a.status,a.apname, a.apno, a.address, a.dist, a.pin, a.mob, a.altmob FROM tbl_userdetails a INNER JOIN tbl_register b where b.id=a.uid and b.id='$id'");
                        
                        while ($row = mysqli_fetch_array($res)) { ?>
                    <table class="table table-bordered">
                        <thead>
                            <?php $_SESSION['zz']=$row['id'];?>
                            <tr>
                                <th colspan="2" style="text-align:center; ">User Details</th>
                            </tr>
                            <tr>
                                <th scope="col">Email</th>
                                <td><?php echo $row["email"]; ?></td>
                            </tr>
                            <tr>
                                <th scope="col">Apartment Name</th>
                                <td><?php echo $row["apname"]; ?></td>
                            </tr>
                            <tr>
                                <th scope="col">Apartment Number</th>
                                <td><?php echo $row["apno"]; ?></td>
                            </tr>
                            <tr>
                                <th scope="col">Address</th>
                                <td><?php echo $row["address"]; ?></td>
                            </tr>
                            <tr>
                                <th scope="col">Place</th>
                                <td><?php echo $row["dist"]; ?></td>
                            </tr>
                            <tr>
                                <th scope="col">Pincode</th>
                                <td><?php echo $row["pin"]; ?></td>
                            </tr> 
                            <tr>   
                                <th scope="col">Mobile</th>
                                <td><?php echo $row["mob"]; ?></td>
                            </tr> 
                            <tr>   
                                <th scope="col">Alternate Mobile</th>
                                <td><?php echo $row["altmob"]; ?></td>
                            </tr> 
                                <th rolspan="2" scope="col">Status</th>
                                <td><label class="btn btn-success">Accepted User</label></td>
                            </tr>
                        </thead>
                    <?php
                        }
                        ?>
                        
                <?php
                 $pick = mysqli_query($con, "SELECT * FROM `tbl_pickupdetails` WHERE `uid`='$id'");
                 if(mysqli_num_rows($pick)<1)
                 
                 {
                    ?> <tr><th colspan="2" class="rec">PickUp details not updated</th> </tr>
                    <?php
                   
                }
               
                else
                {
                while ($pickrow = mysqli_fetch_array($pick)) {
                     ?>
               
                 <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th colspan="2" style="text-align:center; height:1vh">User PickUp Details</th>
                            </tr>
                            <tr>
                                <th scope="col" style="height:4vh">PickUp Start Date</th>
                                <td><?php  echo $pickrow["pickupdate"]; ?></td>
                            </tr>
                            <tr>
                                <th scope="col" style="height:4vh">PickUp Time</th>
                                <td><?php echo $pickrow["pickuptime"]; ?></td>
                            </tr>
                            <tr>
                                <th scope="col" style="height:4vh">PickUp Days</th>
                                <td><?php echo $pickrow["pickupday"]; ?></td>
                            </tr>
                            <tr>
                                <th scope="col" style="height:4vh">Driver Assigned </th>
                                <td><?php echo $pickrow["assign"]; ?></td>
                            </tr>
                           
                                

                            
                       </thead>
                       <?php
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
<?php
}
?>