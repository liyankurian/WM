<?php
include 'hconnect.php';
session_start();
$a=$_SESSION['dd'];
$ah=$_SESSION['na'];
$rid = mysqli_query($con, "SELECT * FROM `tbl_register` WHERE `email`='$a'");
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

    
    
    
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
    .custom-select-sm {
    height: calc(1.5em + 0.5rem + 2px);
    padding-top: 0.25rem;
    padding-bottom: 0.25rem;
    padding-left: 0.5rem;
    font-size: .875rem;
}
.custom-select{
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    vertical-align: middle;
}
body {
  margin: 2rem;
}
/* 
th {
  background-color: white;
}
tr:nth-child(odd) {
  background-color: grey;
}
th, td {
  padding: 0.5rem;
}
td:hover {
  background-color: lightsalmon;
} */

.paginate_button {
  border-radius: 0 !important;
}

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

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
        <div class="form bg-light m-4" id="form" style="height:auto; width:auto;">
                <table class="table table-bordered  table-class " id= "datatableid" >
                </tr>
                <thead>
                <tr>
                        <th>S.no</th>
                        <th>Collection Date/time</th>
                        <th>Apartment Name</th>
                        <th>Place</th>
                        <th>Collection Status</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no=1;
                $csql = mysqli_query($con,"SELECT * FROM tbl_pickupdetails WHERE  assign='$ah' ");
                while ($crow = mysqli_fetch_array($csql)){ 
                    $cuid=$crow['uid'];
                }  
                $cdata = mysqli_query($con, "SELECT a.date ,a.dassign, a.status,a.uid,b.apname,b.dist FROM tbl_collection a INNER JOIN tbl_userdetails b where a.uid=b.uid and a.dassign='$ah'  ");
                 
                while ($co = mysqli_fetch_array($cdata)){ 
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $co['date']; ?></td>
                            <td><?php echo $co['apname']; ?></td>
                            <td><?php echo $co['dist']; ?></td>
                            <td><?php echo $co['status']; ?></td>
                        </tr>
                        <?php
                    }
                
                ?></tbody>
                </table>

        </div>
    </section>
   
    <script>
    $(document).ready(function () {
        $('#datatableid').DataTable();
    });
</script>

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

    <script>


    </script>
</body>

</html>