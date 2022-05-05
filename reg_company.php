<?php
include 'hconnect.php';

if (isset($_POST['probtn'])) {
    $cname=$_POST["cname"];
    $cidno=$_POST["cidno"];
    $regno=$_POST["regno"];
    $addr=$_POST["addr"];
    $distr=$_POST["distr"];
    $city=$_POST["city"];
    $pin=$_POST["pin"];
    $cont=$_POST["cont"];
    $email=$_POST["email"];
    $pass=$_POST["pass"];
    
    $query = mysqli_query($con,"INSERT INTO `tbl_companyreg`(`cname`, `cidno`, `regno`, `addr`, `distr`, `city`, `pin`, `cont`, `email`, `pass`, `status`) VALUES ('$cname','$cidno','$regno','$addr','$distr','$city','$pin','$cont','$email','$pass','1')");
    if($query)
    {
    echo '<script type="text/javascript"> alert("Register Successffully!!");window.location.href= "clogin.php";</script>';
    }
    else
    {
        echo '<script type="text/javascript"> alert("Register Not Successffully!!")</script>';
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
    <title>Create Profile</title>
    <link rel="stylesheet" href="./css/prostyle.css">

<style>
* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.header {
  overflow: hidden;
  background-color:#2dc3a6;
 
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

input[type=text],[type=password],[type=input],select,.cntr {
    display: block;
  width: 100%;
  height:56px;
  padding: 0.75rem;
  border: 1px solid #2dc3a6;
  border-radius: 0.25rem;
}
.orderform {
  width: clamp(520px, 30%, 430px);
  margin: 0 auto;
  margin-top:5%;
  margin-bottom:5%;
  width:50%;
  border: 2px solid #2dc3a6;
  border-radius: 0.35rem;
  padding: 1.5rem;
}
.btn {
    width: 580px;
  height:56px;
  padding: 0.75rem;
  display: block;
  text-decoration: none;
  background-color: #2dc3a6;
  color: #f3f3f3;
  text-align: center;
  border-radius: 0.25rem;
  cursor: pointer;
  transition: 0.3s;
  
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
        
           let cv = document.getElementById('cname');
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
           
            let dv = document.getElementById('cidno');
         var d = /^([a-zA-Z0-9\s,'-]){21}$/;
           
            
            if (dv.value.match(d)) {
                span["two"].innerText = "";
                span["two"].style.color = '#28fc7a';
            } else {
                span["two"].innerText = "Invalid Number";
                span["two"].style.color = 'red';
            }
        }
        
            function myFun2() {
            let pa = document.getElementById('regno');
            var p = /^[1-9][0-9]{5}$/;
            if (pa.value.match(p)) {
                span["three"].innerText = "";
                span["three"].style.color = '#28fc7a';
            } else {
                span["three"].innerText = "Invalid Pincode";
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
        let em = document.getElementById('email');

        var m = /^([a-z A-Z 0-9_\-\.])+\@([a-z A-Z 0-9_\-])+\.([a-z A-Z]{1,2}).$/;
        if (em.value.match(m)) {
            span["seven"].innerText = "";
            span["seven"].style.color = '#28fc7a';
        } else {
            span["seven"].innerText = "Your Email is Invalid";
            span["seven"].style.color = 'red';
        }
    }

    function myFun7() {
      let pa = document.getElementById('password');
      let cpa = document.getElementById('cpassword');
      if (pa.value == cpa.value)

      {
        span["eight"].innerText = "";
        span["eight"].style.color = '#28fc7a';
      } else {
        span["eight"].innerText = "Password Doesn't Match";
        span["eight"].style.color = 'red';
      }
    }

        
    </script>
</head>
<body>
<header id="header">
            <i class="fas fa-bars" id="nav-toggler"></i>

        </header>

        <div class="header">
        <a href="#default" class="logo"><img id="logo" src="./pic/wm.png" /></a>
        
        </div>
        <div id="orderrequest">
        
            <form action="" class="orderform" method="POST">
                <h1 class="text-center">REGISTER</h1>

            
                <div class="form-step form-step-active">

                    <div class="input-group" >
                        <label for="cname"><b>Company Names</b></label>
                        <span id="one"></span>
                        <input type="text" name="cname" id="cname"   onkeyup="myFun()" placeholder="Enter your Company Names" required />
                    </div>
                    <div class="input-group">
                        <label for="cidno"><b>Corporate Identification Number</b></label>
                        <span id="two"></span>
                        <input type="text" name="cidno" id="cidno"  onkeyup="myFun1()" placeholder="Enter your Corporate Identification Number" required />
                    </div>
                    <div class="input-group">
                        <label for="regno"><b>Registration number</b></label>
                        <span id="three"></span>
                        <input type="text" name="regno" id="regno"  onkeyup="myFun2()" placeholder="Registration number" required />
                    </div>
                    <div class="input-group">
                        <label for="address"><b>Address</b></label>
                        <span id="three"></span>
                        <input type="text" name="addr" id="address"  placeholder="Enter your  Address" required />
                    </div>
                    
                    <div class="input-group">
                        <label for="pickupinstructions"><b>District</b></label>
                        <select name="distr" id="distr" style="width:100%;" required onchange="myFunction2()">
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
                        <input type="text" name="city" id="city" onkeyup="myFun3()" placeholder="Enter your city" required />
                    </div>
                    <div class="input-group">
                        <label for="pickupinstructions"><b>Pincode</b></label>
                        <span id="five"></span>
                        <input type="text" name="pin" id="pin"  onkeyup="myFun4()" placeholder="Enter your Pincode" required />
                    </div>
                <!-- phone details-->
                    <div class="input-group">
                        <label for="pickupcontact"><b>Contact</b></label>
                        <span id="six"></span>
                        <input type="text" name="cont" id="phn" onkeyup="myFun5()" placeholder="Enter your contact number" required />
                    </div>
                    <div class="input-group">
                        <label for="pickupinstructions"><b>Email</b></label>
                        <span id="seven"></span>
                        <input type="text" id="email" name="email" onkeyup="myFun6()" placeholder="Enter your Email" required>
                    </div>
                    <div class="input-group">
                        <label for="pickupinstructions"><b>Create Password</b></label>
                        <input type="password" id="password" name="pass" placeholder="Create Password" required>
                    </div>
                    <div class="input-group">
                        <label for="pickupinstructions"><b>Confirm Password</b></label>
                        <span id="eight"></span>
                        <input type="password" id="cpassword" name="cpass" onkeyup="myFun7()" placeholder="Confirm Password" required>
                    </div>
                    
                    <div class="btns-group">
                    <input type="submit" class="btn" name="probtn" value="Submit">
                    </div>
                </div>
            </div>
            </form>
        </div>

        
</body>
</html>
