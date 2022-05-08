<?php
include 'hconnect.php';
if (isset($_POST['save'])) {
    $a = $_POST["uname"];
    $b = $_POST["dob"];
    $c = $_POST["email"];
    $d = $_POST["ph"];
    $e = $_POST["alph"];
    $f = $_POST["add"];
    $g = $_FILES["pho"]["name"];
    $h = $_FILES["lpho"]["name"];
    $i = $_POST["jdob"];
    move_uploaded_file($_FILES["pho"]["tmp_name"], "staff pic/" . $_FILES["pho"]["name"]);
    move_uploaded_file($_FILES["lpho"]["tmp_name"], "staff pic/" . $_FILES["lpho"]["name"]);


    $query = mysqli_query($con, "INSERT INTO `tbl_driverdetails`(`name`, `dob`, `phone`, `alph`, `joindate`, `address`, `img`, `limg`) VALUES ('$a','$b','$d','$e','$i','$f','$g','$h')");
    if ($query) {
        $qu = mysqli_query($con, "SELECT * FROM `tbl_driverdetails` ORDER BY id DESC LIMIT 1 ");
        while ($d1 = mysqli_fetch_array($qu)) {
            $uid = $d1['id'];
        }
        $demo = mysqli_query($con, "INSERT INTO `tbl_register`(`uid`, `email`, `password`, `status`, `role`) VALUES ('$uid','$c','$b','0','driver')");
        if ($demo) {
            echo '<script type="text/javascript"> alert("Register Successffully!!")</script>';
        } else {
            echo mysqli_errno($con);
        }
    }
}

if(isset($_SESSION["wmsession"]) != session_id()){
    header("Location:adminpanel.php");
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


    <script type="text/javascript">
        //VALIDATION
        function validate() {
            if (document.getElementById('uname').value.length == 0 || document.getElementById('email').value.length == 0 ||
                document.getElementById('ph').value.length == 0) {
                alert("Complete the registration");
                return false;
            }
        }

        let span = document.getElementsByTagName('span');


        function myFun() {
            let na = document.getElementById('uname');

            var regex = /^([\.\_a-zA-Z]+)([a-zA-Z ]+){1,30}$/;
            if (regex.test(na.value)) {
                span["one"].innerText = "";
                span["one"].style.color = '#28fc7a';
                na.style.borderColor = '#28fc7a';
            } else {
                span["one"].innerText = "Enter a Valid Name";
                span["one"].style.color = 'red';
                na.style.borderColor = 'red';
            }
        }

        function myFun1() {
            let em = document.getElementById('email');

            var m = /^([a-z A-Z 0-9_\-\.])+\@([a-z A-Z 0-9_\-])+\.([a-z A-Z]{2,4}).$/;
            if (em.value.match(m)) {
                span["two"].innerText = "";
                span["two"].style.color = '#28fc7a';
            } else {
                span["two"].innerText = "Your Email is Invalid";
                span["two"].style.color = 'red';
            }
        }

        function myFun2() {
            let pa = document.getElementById('ph');
            var p = /^\d{10}$/;
            if (pa.value.match(p)) {
                span["three"].innerText = "";
                span["three"].style.color = '#28fc7a';
            } else {
                span["three"].innerText = "Enter Valid Phone";
                span["three"].style.color = 'red';
            }
        }

        function myFun3() {
            let ap = document.getElementById('alph');
            var px = /^\d{10}$/;
            if (ap.value.match(px)) {
                span["four"].innerText = "";
                span["four"].style.color = '#28fc7a';
            } else {
                span["four"].innerText = "Enter Valid Phone";
                span["four"].style.color = 'red';
            }
        }
    </script>
</head>

<body>
    <div class="sidebar close">
        <div class="logo-details">
            <img id="logo" src="./pic/logo.gif" />
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
                <div class="iocn-link">
                    <a href="#">
                        <i class='bx bx-group'></i>
                        <span class="link_name">Employee</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a href="addstaff.php">Add Staff</a></li>
                    <li><a href="addriver.php">Add Driver</a></li>
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
                <div class="profile-details">
                    <div class="profile-content">

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
                <span class="text">ADD DRIVER</span>
            </div>
            
        </nav>
        <form action="#" method="POST" class="staff" enctype="multipart/form-data" onsubmit="return validate();">
            <div class="home-sub ">
                <div class="form bg-light col-9 mt-5" id="form" style="margin-left:150px;">

                    <div class="d-flex justify-content-start mx-5 pt-5">

                        <h3>ADD Driver</h3>
                    </div>
                    <div class="d-flex justify-content-end p-o">

                        <button type="submit" name="save" style="width:100px;" class="btn btn-success  m-1 me-4">Save</button>
                       
                    </div>



                    <div class="form-sub ">

                        <div class="form-floating  m-3 w-25">

                            <input type="text" class="form-control" onkeyup="myFun()" name="uname" id="uname" placeholder="Only Alphabets">
                            <label for="floatingInput">Full Name</label>
                            <span id="one"></span>
                        </div>
                        <div class="form-floating  m-3 w-25 ">
                            <input type="date" class="form-control" name="dob" id="floatingInput" placeholder="Only Alphabets">
                            <label for="floatingInput">Date of Birth</label>
                        </div>
                        <div class="form-floating  m-3 w-25 ">
                            <input type="text" class="form-control" onkeyup="myFun1()" name="email" id="email" placeholder="name@example.com">
                            <label for="floatingInput">Email</label>
                            <span id="two"></span>
                        </div>
                        <div class="form-floating  m-3 w-25 ">
                            <input type="text" class="form-control" name="ph" onkeyup="myFun2()" id="ph" placeholder="name@example.com">
                            <label for="floatingInput">Phone</label>
                            <span id="three"></span>
                        </div>
                        <div class="form-floating  m-3 w-25 ">
                            <input type="text" class="form-control" name="alph" onkeyup="myFun3()" id="alph" placeholder="name@example.com">
                            <label for="floatingInput">Alternative Phone</label>
                            <span id="four"></span>
                        </div>
                        <div class="form-floating  m-3 w-25">
                            <input type="date" class="form-control" name="jdob" id="floatingInput"  min=<?=date('Y-m-d');?> max='2045-01-01' placeholder="name@example.com">
                            <label for="floatingInput">Join Date</label>
                        </div>
                        <div class="form-floating m-3 w-25">
                            <textarea class="form-control" name="add" placeholder="Address" id="floatingTextarea"></textarea>
                            <label for="floatingTextarea">Address</label>
                        </div>
                        <label class="form-control m-3 w-25 ">Upload Image
                            <div class="input-group">
                                <input type="file" class="form-control" name="pho" id="inputGroupFile04" size="200KB" accept="image/gif,image/jpg,image/JPG, image/jpeg, image/x-ms-bmp, image/x-png" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                            </div>
                        </label>
                        <label class="form-control m-3 w-25 ">Upload licence
                            <div class="input-group">
                                <input type="file" class="form-control" name="lpho" id="inputGroupFile04" size="200KB" accept="image/gif,image/jpg,image/JPG, image/jpeg, image/x-ms-bmp, image/x-png" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                
                            </div>
                        </label>
                    </div>

                </div>
            </div>
        </form>
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