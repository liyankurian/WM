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
                    <span class="link_name">Request</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Request</a></li>
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
                <a href="#">
                    <i class='bx bxs-user-detail' undefined></i>
                    <span class="link_name">Leave</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Leave</a></li>
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
            
            <div class="form bg-light  mt-5" id="form" style="height:auto; width:auto;">
            <?php
                        $res = mysqli_query($con, "SELECT b.email,b.id,a.uid,a.status,a.apname, a.apno, a.address, a.dist, a.city, a.pin, a.mob, a.altmob, a.reason FROM tbl_userdetails a INNER JOIN tbl_register b where b.id=a.uid and b.id='$id'");
                        
                        while ($row = mysqli_fetch_array($res)) { ?>
                    <table class="table table-bordered">
                        <thead>
                            <?php $_SESSION['zz']=$row['id'];?>
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
                                <th scope="col">District</th>
                                <td><?php echo $row["dist"]; ?></td>
                            </tr>
                            <tr>
                                <th scope="col">City</th>
                                <td><?php echo $row["city"]; ?></td>
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
                            <tr>
                                <th rolspan="2" scope="col">Status</th>
                                <td><button class="btn btn-danger" type="submit">Reject User</button></td>
                            </tr>
                            <tr>
                                <th rolspan="2" scope="col">Reason for rejection</th>
                                <td><?php echo $row["reason"]; ?></td>
                            </tr>
                        </thead>
                    <?php
                        }
                        ?>           
            </div>
        </div>
                <!-- reject POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="remodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="reject.php" method="POST">

                        <div class="modal-body">
                            <h4> Do you want to reject this Data ?</h4>
                            <input type="text" placeholder="Write the reason for  rejection">
                        </div>
                        <div class="modal-footer">
                        <a href="#"> <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button></a>
                            <button type="submit" name="deletedata" class="btn btn-primary"> Yes !! Accept it. </button>
                        </div>
                    </form>

                </div>
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


        

        $(document).ready(function () {

        $('.rejbtn').on('click', function () {

        $('#remodal').modal('show');

        });
});
    </script>
</body>

</html>