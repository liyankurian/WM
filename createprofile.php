<?php
include 'hconnect.php';
session_start();

if(isset($_SESSION['wmUsersession'])!= session_id()){
    header("location: ./userlogin.php");
    die();
}else{
    
$ad=$_SESSION['dd'];
if (isset($_POST['probtn'])) {
    $uid=$_SESSION['a'];
    $apname=$_POST["aparname"];
    $apno=$_POST["apno"];
    $add=$_POST["address"];
    $dis=$_POST["adis"];
    $city=$_POST["ct"];
    $pi=$_POST["pin"];
    $phno=$_POST["phn"];
    $alphn=$_POST["phn2"];


$query = mysqli_query($con,"INSERT INTO `tbl_userdetails`(`uid`,`apname`, `apno`, `address`, `dist`, `city`, `pin`, `mob`, `altmob`,`status`) VALUES ('$uid','$apname','$apno','$add','$dis','$city','$pi','$phno','$alphn','0')");

if($query)
    {
    $q = mysqli_query($con,"UPDATE `tbl_register` SET `status`='2' WHERE `email`='$ad'");
    echo '<script type="text/javascript"> alert("Requested Successffully!!");window.location.href= "userpanel.php";</script>';
    }
    else
    {
        echo '<script type="text/javascript"> alert("Requested Not Successffully!!")</script>';
        echo mysqli_errno($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Profile and Requesting Bin</title>
    <link rel="stylesheet" href="./css/prostyle.css">

<style>
* {box-sizing: border-box;}

body { 
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
}

.header {
    overflow: hidden;
    background-color: #46C0DE;
}
.header a img{
    height:120px;
    width:120px;
    padding:10px;
}
.header p
{
    float:right;
    padding: 14px 28px;
    font-size: 16px;
    cursor: pointer;
}
.header p:hover
{
    background-color:grey;
}
@media screen and (max-width: 500px) {
    .header a {
    float: none;
    display: block;
    text-align: left;
    }

    .header-right {
    float: none;
    }
}
</style>


<script type="text/javascript">
        //VALIDATION
        

        let span = document.getElementsByTagName('span');


        function myFun() {
        
           let cv = document.getElementById('aparname');
           var h = /^([a-zA-Z0-9\s,'-]){1,20}$/;
           if (cv.value.match(h)) {
               span["one"].innerText = "";
               span["one"].style.color = '#28fc7a';
           } else {
               span["one"].innerText = "Invalid Name";
               span["one"].style.color = 'red';
           }
         }

        function myFun1() {
           
            let dv = document.getElementById('apno');
            var d = /^([a-zA-Z0-9\s,'-]){1,10}$/;
            if (dv.value.match(d)) {
                span["two"].innerText = "";
                span["two"].style.color = '#28fc7a';
            } else {
                span["two"].innerText = "Invalid Number";
                span["two"].style.color = 'red';
            }
        }
        
            function myFun2() {
            let sa = document.getElementById('address');
            var x = /^([a-zA-Z0-9\s,'-]){1,40}$/;
            if (sa.value.match(x)) {
                span["three"].innerText = "";
                span["three"].style.color = '#28fc7a';
            } else {
                span["three"].innerText = "Invalid Address";
                span["three"].style.color = 'red';
            }
        }

        function myFun3() {
            let pa = document.getElementById('city');
            var p = /^([\.\_a-zA-Z]+)([a-zA-Z ]+){1,20}$/;
            if (pa.value.match(p)) {
                span["four"].innerText = "";
                span["four"].style.color = '#28fc7a';
            } else {
                span["four"].innerText = "Invalid city";
                span["four"].style.color = 'red';
            }
        }
        function myFun4() {
            let pa = document.getElementById('pin');
            var p = /^[1-9][0-9]{5}$/;
            if (pa.value.match(p)) {
                span["five"].innerText = "";
                span["five"].style.color = '#28fc7a';
            } else {
                span["five"].innerText = "Invalid Pincode";
                span["five"].style.color = 'red';
            }
        }
        function myFun5() {
            let pa = document.getElementById('phn');
            var p = /^\d{10}$/;
            if (pa.value.match(p)) {
                span["six"].innerText = "";
                span["six"].style.color = '#28fc7a';
            } else {
                span["six"].innerText = "Invalid phone";
                span["six"].style.color = 'red';
            }
        }
        function myFun6() {
            let pa = document.getElementById('phn2');
            var p = /^\d{10}$/;
            if (pa.value.match(p)) {
                span["seven"].innerText = "";
                span["seven"].style.color = '#28fc7a';
            } else {
                span["seven"].innerText = "Invalid phone";
                span["seven"].style.color = 'red';
            }
        }
        
    </script>
</head>
<body>
<header id="header">
            <i class="fas fa-bars" id="nav-toggler"></i>

        </header>

        <div class="header">
        <a href="#default" class="logo"><img id="logo" src="./pic/logo.png" /></a>
        <P><a href="logout.php">LOGOUT</a></P>
        </div>
        <div id="orderrequest">
        
            <form action="" class="orderform" method="POST">
                <h1 class="text-center">Complete Profile</h1>

                <!-- Progress bar -->
                <div class="progressbar">
                    <div class="progress" id="progress"></div>
                    <div class="progress-step progress-step-active" data-title="Address"></div>
                    <div class="progress-step" data-title="Phone No"></div>
                </div>

                <!-- Pickup form -->
                <div class="form-step form-step-active">

                    <div class="input-group">
                        <label for="apname"><b>Apartment Names</b></label>
                        <span id="one"></span>
                        <input type="text" name="aparname" id="aparname"   onkeyup="myFun()" placeholder="Enter your Apartment Name" required />
                    </div>
                    <div class="input-group">
                        <label for="apno"><b>Apartment Number</b></label>
                        <span id="two"></span>
                        <input type="text" name="apno" id="apno"  onkeyup="myFun1()" placeholder="Enter your Apartment Number" required />
                    </div>
                    <div class="input-group">
                        <label for="address"><b>Address</b></label>
                        <span id="three"></span>
                        <input type="text" name="address" id="address" onkeyup="myFun2()" placeholder="Enter your Apartment Address" required />
                    </div>
                    
                    <div class="input-group">
                        <label for="pickupinstructions"><b>District</b></label>
                        <select name="adis" id="adis" style="width:100%;" required onchange="myFunction2()">
                            <option disabled selected>--SELECT A DISTRICT--</option>
                            </option>
                            <option value=" Alappuzha"> Alappuzha</option>
                            <option value="Ernakulam">Ernakulam</option>

                            <option value="Idukki">Idukki</option>
                            <option value="Kannur">Kannur</option>

                            <option value="Kasaragod">Kasaragod</option>
                            <option value="Kollam">Kollam</option>

                            <option value="Kottayam">Kottayam</option>
                            <option value="Kozhikode">Kozhikode</option>

                            <option value="Malappuram">Malappuram</option>
                            <option value="Palakkad">Palakkad</option>

                            <option value="Pathanamthitta">Pathanamthitta</option>
                            <option value="Thiruvananthapuram">Thiruvananthapuram</option>

                            <option value="Thrissur">Thrissur</option>
                            <option value="Wayanad">Wayanad</option>
                        </select>
                        <span></span>
                    </div>
                    <div class="input-group">
                        <label for="pickupinstructions"><b>City</b></label>
                        <span id="four"></span>
                        <input type="text" name="ct" id="city" onkeyup="myFun3()" placeholder="Enter your city" required />
                    </div>
                    <div class="input-group">
                        <label for="pickupinstructions"><b>Pincode</b></label>
                        <span id="five"></span>
                        <input type="text" name="pin" id="pin"  onkeyup="myFun4()" placeholder="Enter your Pincode" required />
                    </div>
                    <div class="">
                        <a href="#" class="btn btn-next width-50 ml-auto">Next</a>
                    </div>
                </div>

                <!-- phone details-->
                <div class="form-step">
                    <div class="input-group">
                        <label for="pickupcontact"><b>Mobile</b></label>
                        <span id="six"></span>
                        <input type="text" name="phn" id="phn" onkeyup="myFun5()" placeholder="Enter your phone number" required />
                    </div>
                    <div class="input-group">
                        <label for="pickupcontact"><b>Alternate Mobile</b></label>
                        <span id="seven"></span>
                        <input type="text" name="phn2" id="phn2"  onkeyup="myFun6()" placeholder="Enter your alternate phone number" required />
                    </div>

                   
                    <div class="btns-group">
                        <a href="#" class="btn btn-prev">Previous</a>
                        <input type="submit" class="btn" name="probtn" value="Submit">

                    </div>
                </div>

            </form>
        </div>

        <!--SCRIPT BEGINS-->
        <script>
            //navbar collapse
            const nav_links = document.querySelectorAll(".nav__item-link");
            const sub_links = document.querySelectorAll(".sub_link");

            function collapse_nav(head, toggler, sidenav) {
                const header = document.getElementById(head);
                const nav_toggler = document.getElementById(toggler);
                const nav = document.getElementById(sidenav);

                nav_toggler.addEventListener("click", function() {
                    this.classList.toggle("fa-times");
                    nav.classList.toggle("collapse");
                    header.classList.toggle("collapse-header");
                });
            }
            collapse_nav("header", "nav-toggler", "nav");
            nav_links.forEach((link) => {
                link.addEventListener("click", function() {
                    nav_links.forEach((l) => {
                        if (l.classList.contains("active")) {
                            l.classList.remove("active");
                        }
                    });

                    this.classList.toggle("active");
                    const sub_menu = this.nextElementSibling;
                    if (sub_menu) {
                        sub_menu.classList.toggle("d-none");
                    }
                });
            });

            sub_links.forEach((link) => {
                link.addEventListener("click", () => {
                    sub_links.forEach((l) => l.classList.remove("active-sub-link"));
                    link.classList.toggle("active-sub-link");
                });
            });

            //progress bar
            const prevBtns = document.querySelectorAll(".btn-prev");
            const nextBtns = document.querySelectorAll(".btn-next");
            const progress = document.getElementById("progress");
            const formSteps = document.querySelectorAll(".form-step");
            const progressSteps = document.querySelectorAll(".progress-step");
            let formStepsNum = 0;
            nextBtns.forEach((btn) => {
                btn.addEventListener("click", () => {
                    formStepsNum++;
                    updateFormSteps();
                    updateProgressbar();
                });
            });
            prevBtns.forEach((btn) => {
                btn.addEventListener("click", () => {
                    formStepsNum--;
                    updateFormSteps();
                    updateProgressbar();
                });
            });

            function updateFormSteps() {
                formSteps.forEach((formStep) => {
                    formStep.classList.contains("form-step-active") &&
                        formStep.classList.remove("form-step-active");
                });
                formSteps[formStepsNum].classList.add("form-step-active");
            }

            function updateProgressbar() {
                progressSteps.forEach((progressStep, idx) => {
                    if (idx < formStepsNum + 1) {
                        progressStep.classList.add("progress-step-active");
                    } else {
                        progressStep.classList.remove("progress-step-active");
                    }
                });
                const progressActive = document.querySelectorAll(".progress-step-active");
                progress.style.width =
                    ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
            }
        </script>
    </body>
 
</body>
</html>
<?php
}
?>