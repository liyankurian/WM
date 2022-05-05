<?php
include 'hconnect.php';
session_start();
if(isset($_SESSION["wmsession"]) != session_id()){
    header("Location:index.php");
    die();
}
else{
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
                <a href="adminpanel.php" class="active">
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
                <ul class="sub-menu  subitem">
                    <li><a href="addstaff.php ">Add Staff</a></li>
                    <li><a href="addriver.php">Add Driver</a></li>
                    <li><a href="staffdetails.php">Staff Details</a></li>
                    <li><a href="driverdetails.php">Driver Details</a></li>
                </ul>
            </li>

            

            

            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <!--<img src="image/profile.jpg" alt="profileImg">-->
                    </div>
                    <div class="name-job">
                        <div class="profile_name"><a href="userlogin.php" style="color:white;"><i class='bx bx-log-out'></i>Admin</a></div>
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
                <span class="text">Staff Details</span>
            </div>
            
        </nav>

        <div class="home-sub" style="height:auto; ">
            <div class="overview-boxes " >
                <div class="form bg-light  mt-5" id="form" style="height:auto; width:auto;">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Index</th>
                                <th scope="col">Fullname</th>
                                <th scope="col">Email</th>
                                <th scope="col">Date of birth</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Alternative Phone</th>
                                <th scope="col">Joining Date</th>
                                <th scope="col">Address</th>
                                <th scope="col">Qualification</th>
                                <th scope="col">Image</th>
                            </tr>
                        </thead>
                        </tr>
                        </thead>
                        <?php
                        $no=1;
                        $res = mysqli_query($con, "SELECT a.id,a.name, a.dob, a.phone, a.alph, a.joindate, a.address, a.educ, a.img, b.status,b.email FROM tbl_addstaff a INNER JOIN tbl_register b where a.id=b.uid");

                        while ($row = mysqli_fetch_array($res)) { ?>

                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $row["name"]; ?></td>
                                <td><?php echo $row["email"]; ?></td>
                                <td><?php echo $row["dob"]; ?></td>
                                <td><?php echo $row["phone"]; ?></td>
                                <td><?php echo $row["alph"]; ?></td>
                                <td><?php echo $row["joindate"]; ?></td>
                                <td><?php echo $row["address"]; ?></td>
                                <td><?php echo $row["educ"]; ?></td>
                                <td><img src="staff pic/<?php echo $row["img"]; ?>" height="100px" width="100px"/></td>

                                <td><?php if($row['status']==0)
                                {
                                     echo '<p><a id="dbtn" href="delete.php?xyz='.$row['id'].'&status=1">Enable</a></p>';
                                    }
                    else{ echo '<p><a id="ebtn" href="delete.php?xyz='.$row['id'].'&&status=0">Disable</a></p>';}?></TD>
                            </tr>
                        <?php
                        $no++;
                        }
                        ?>
                    </table>
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
    </script>
</body>

</html>
<?php
}
?>