<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./css/style3.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel = "icon" href = "../../images/about_us.svg"type = "image/x-icon">
    <title>index</title>
      <style>
          @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap");
body{
    margin: 0%;
    padding: 0%;
    background-color: rgb(255, 255, 255);
   
}
h3{
    padding-bottom: 1vw;
    font-family: poppins;
}
p{
    line-height: 1.7rem;
    text-align: justify;
}
/* Style the header */
header {
  
  background-color: whitesmoke;
  text-align: center;
  margin:0px;
  font-size: 35px;
  color: black;
}
          .btns{
              background-color: #46c0de;
          }
          .btnsf{
              background-color: black;
              color: white;
              
          }
.head_container{
  
background-color: #46c0de;
  display: grid;
  grid-column: 1fr 1fr 1fr;
  margin: 0%;
}
.logo {
  
  width: 100px;
  height: 60px;
  left:0px;
}
.logo img{
    
    width: 15vw;
    height: 10vh;
}
.page_links ul {
  top: 1.7vw;
  list-style-type: none;
  position: absolute;
 display: flex;
 left: 62vw;
font-size: 016px;
}
.page_links li{
  text-decoration: none;
  padding-left: 1.5vw;
}
.page_links a{
  color: white;
  text-decoration: none;
}
.hero{
    width: 100%;
    height: 100%;
    margin-left: 0%;
    margin-bottom: 5vw;
    margin-left: 0%;
}
          
          .hero img{
              right: 9vw;
          }
.herocon{
    width: 35%;
    height: 60%;
    left: 50vw;
    color: white;
    position: absolute;
    background-color:#46c0de;
    margin-left: 0%;
    padding: 5vw;
    margin:1vw 8vw 10vw 3vw;
    
}
.about,.fair_calculater,.app_download,.contact{
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-gap: 3vw;
    font-family: poppins;
    margin:1vw 3vw 1vw 3vw ;
    padding: 3vw 5vw 5vw 5vw;
    background-color: rgb(255, 255, 255);
}
.fair_calculater img,.about img,.app_download img{
    width: 35vw;
    height: 23vw;
}
.faircalccon input{
margin-bottom: 2vw;
width: 29vw;
}
.faircalccon p{
    width: 29vw;
    
}

      </style>
  </head>
  <body>

  <header>
       <div class="head_container " style="height: 72px; ">
        <div class="logo" style="padding-top: 5px;">
          <a href=""><img id="logo" src="./pic/logo.png" /></a>
        </div>
        <div class="page_links ">
          <ul >
            <li><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="userreg.php">Signup</a></li>
            <li ><a href="userlogin.php">Login</a></li>
            <li ><a href="clogin.php">Company</a></li>
          </ul>
         
        </div> 
      </div>
      </header>
  <div class="about" >
      <div class="about_img">
              <img src="./box.svg" alt="about_img">
            </div>
            <div class="about_txt herocon">
              <h4>Register Now For bin</h4>
              
                <a href="userreg.php"><button type="button" class="btn btnsf btn-lg btn-block mt-5">Request Now</button></a>
            </div>
            
          </div>
 

          <div class="about" id="about">
            <div class="about_txt">
              <h3>About</h3>
              <p>WM is a market platform where waste collected from all 
                Apartments. We are really concerned with the environmental and social aspects. Our platform features a comprehensive 
                recycling database that gives the user the ability to easily assemble a recycling to-do list; and it's all just one button click away. 
            </p></div>
            <div class="about_img">
              <img src="./undraw_collecting_re_lp6p.svg" alt="about_img">
            </div>
          </div>


          <div class="services"></div>


          <div class="app_download">
            <div class="app_img">
              <img src="./app.svg" alt="app_download">
            </div>
            <div class="app_img">
              <h3>Download App Now</h3>
              <b><p class="app_scon">Download our mobile app </p></b>
                <p class="app_con"> App is now available for Android and iOS! 
                  </p>
                  <button type="button" class="btn btns btn-lg btn-block mt-5">Download Now</button>
            </div>
          </div>
          <div class="contact" id="contact">
            
            <div class="contact_input">
              <form>
                <h3>Contact Us</h3>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Mobile Number</label>  
                  <input type="tel" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Your Message</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button type="button" class="btn btns btn-lg btn-block">Submit</button>
              </form>
            </div>
            <div class="contact_img">
              <img src="./signal.svg" alt="">
            </div>
          </div>
      
         
 

    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>