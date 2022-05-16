<?php
include 'hconnect.php';
session_start();
$ah=$_SESSION['dd'];
$id=$_GET['aab'];
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    
   
   
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
                <div class="profile-details">
                    <div class="profile-content">
                        <!--<img src="image/profile.jpg" alt="profileImg">-->
                    </div>
                    <div class="name-job">
                        <div class="profile_name" ><a href="userlogin.php" style="color:white;"><i class='bx bx-log-out'></i>STAFF</a></div>
                    </div>
                    <img src="https://img.icons8.com/bubbles/100/000000/system-administrator-female.png" />
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
            <h5  class="mt-3 "><?php echo $ah; ?></h5>
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
                            <form action="assigndriver.php" method="post">
                            <tr>
                                <td colspan="2" style="height:4vh; text-align:center" >
                                <select name="driver"  style="height:6vh;" id="driver">
                                <option disabled selected>Assign to driver</option>
                                <?php
                                $dr = mysqli_query($con,"SELECT * FROM `tbl_register` where `role`='driver' ");
                                while ($dri = mysqli_fetch_array($dr)){
                                ?>
                                    <option value="<?php echo $dri['email'];?>"><?php echo $dri['email'];?></option>
                                <?php
                                }
                                ?>
                                 </select>
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                                <button type="submit" class="btn btn-primary" name="asgn">Assign</button>
                                </form>
                                <?php
                                if(isset($_POST['asgn']))
                                {
                                    //echo "<script>alert('Pickup details added successfully')</script>";
                                    $as = mysqli_query($con, "UPDATE `tbl_pickupdetails` SET `status`='1' where `uid`='$id'");
                                    if($as){
                                        echo '<script type="text/javascript">';
                                                echo 'setTimeout(function () { swal("Assigned successfully","success");';
                                                    echo '}, 1000);</script>';
                                        ?>
                                        <?php
                                        }
                                    else
                                            {
                                                echo '<script type="text/javascript">';
                                                echo 'setTimeout(function () { swal("Not Assigned successfully","error");';
                                                    echo '}, 1000);</script>';
                                            }
                                }
                                ?>

                            </tr>
                       </thead>
                       <?php
               }
            }
                ?> 
                 
            </div>
        </div>
    </div>
    
    </section>
       
        </form>
        </div>
    

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