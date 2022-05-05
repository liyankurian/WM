<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Driver Panel </title>
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
            <li>
                <a href="dassigneduser.php" class="active">
                    <i class='bx bx-user-pin' style='color:#ffffff'  ></i>
                    <span class="link_name">Assigned Users</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="dassigneduser.php">Assigned Users</a></li>
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
                    <img src="https://img.icons8.com/bubbles/100/000000/system-administrator-female.png" />
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
        </nav>
        <div class="row1 mt-5">
            <h4>PickUp Request</h4>
            <table>
                <tr>
                    <td>Customer Name</td>
                    <td><label>data from database</label></td>
                </tr>
                <tr>
                    <td>Customer Address</td>
                    <td><label>data from database</label></td>
                </tr>
                <tr>
                    <td>Customer Pincode</td>
                    <td><label>data from database</label></td>
                </tr>
                <tr>
                    <td>Customer Phone Number</td>
                    <td><label>data from database</label></td>
                </tr>
                <tr>
                    <td>Customer Alternate Phone Number</td>
                    <td><label>data from database</label></td>
                </tr>
                <tr>
                    <td>PickUp Starting date</td>
                    <td><label>data from database</label></td>
                </tr>
                <tr>
                    <td>PickUp dates</td>
                    <td><label>data from database</label></td>
                </tr>
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