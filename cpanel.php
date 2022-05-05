<?php
include 'hconnect.php';
session_start();
$ah=$_SESSION['dd'];
$aw=$_SESSION['ww'];
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Parties Dasboard </title>
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
    
    .sidebar
    {
    width:250px;
    position:fixed;
    left:0;
    top:0;
    height:100%;
    background:#2dc3a6;
    }

    </style>
</head>

<body>
    <div class="sidebar close">
        <div class="logo-details">
            <img id="logo" src="./pic/wm.png" />
        </div>
        <ul class="nav-links">
            
            <li>
                <div class="iocn-link">
                    <a href="cviewprofile.php">
                        <i class='bx bx-group'></i>
                        <span class="link_name">Profile</span>
                    </a>
                </div>
            </li>
            <div class="iocn-link">
                    <a href="cochangepassword.php">
                    <i class="fa-solid fa-passport"></i>
                        <span class="link_name">Change Password</span>
                    </a>
                </div>

            <li>
                <div class="profile-details" style="width: 251px;">
                    
                    <div class="name-job" >
                        <div class="profile_name"  ><a href="logout.php" style="color:white;">Logout<i class='bx bx-log-out'></i></a></div>
                    </div>
                    
                </div>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="home-content">
                <i class='bx bx-menu'></i>
                <h1><?php echo $ah; ?></h1>
            </div>
            
        </nav>

        <div class="home-sub">
            <div class="overview-boxes ">
            <h3>Welcome to the Dashboard !</h3>
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
