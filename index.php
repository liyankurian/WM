<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>

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
        .header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  line-height: 25px;
  border-radius: 4px;
}
.header a:hover {
  background-color: #ddd;
  color: black;
}

/* Style the active/current link*/
.header a.active {
  background-color: dodgerblue;
  color: white;
}

/* Float the link section to the right */
.header-right {
  float: right;
}

/* Add media queries for responsiveness - when the screen is 500px wide or less, stack the links on top of each other */
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
</head>
<body>
   
    <div class="header">
    <a href="#default" class="logo"><img id="logo" src="./pic/logo.png" /></a>
  <div class="header-right">
    <a class="active" href="#home">Home</a>
    <a href="#contact">Contact</a>
    <a href="#about">About</a>
  </div>
</div>
    
</body>
</html>