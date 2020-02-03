<?php
    $mysqli = new mysqli('localhost','root','','ayurvedic');
    if (isset($_POST["login"])) {
        $username=$_POST["username"];
        $password=$_POST["password"];
        if($username!="" && $password!=""){
            $result = $mysqli->query("SELECT username,password FROM login WHERE username='$username' AND password='$password'");
            $c=$result->num_rows;
            if($c > 0){
        
                header('location: ayurvedic.php');
            }
            else{
                echo "Please sign up first";	
            }
        }
    }
?>

<html>
    <head>
        <title>MEDIFACTS</title>
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="js/script.js"></script>
        <style>
            .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 30%;
            top: 40%;
            width: 40%; /* Full width */
            height: 40%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: #b1c3d3; /* Fallback color */
            background-color: rgba(155,155,201); /* Black w/ opacity */
            }

            /* Modal Content */
            .modal-content {
            background-color: #1e1e1e;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            }

            /* The Close Button */
            .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            }

            .close:hover,
            .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
            }
        </style>
    </head>       
<body style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),url(image/login.jpg); background-repeat: no-repeat;background-position: center; background-size: cover;">
    <header>
        <a href="index.php" style="text-decoration: none;"><img src="image/logodesign.jpg" style="max-width: 40%; max-height: 40%;margin-top: 40px;margin-left: 10px;">
        <h1 class="shimmer">MEDIFACTS</h1>
        <h3 style="font-family: Comic Sans MS; font-weight: 250; font-size: 1em;text-align-last: left;margin-top: -10px;  padding: 0 140px 0 80px;color:#1CB4E3;">We Know Your Pills</h3></a>
        <ul class="first_ul">
        	<li><a href="tel: 9834634031"><i class="fa fa-phone"></i></a></li>
        	<li><a href="#shoppingcart"><i class="fa fa-shopping-cart"></i></a></li>
        	<li><a href="signin.php"><i class="material-icons">person</i></a></li>
        </ul>
         	<ul class = "sec_ul">
        		<li><a class="active" href="index.php"><b>Home</b></a></li>
                <li><a href="#about"><b>About</b></a></li> 
                <div class="dropdown">   
                <li><a href="#department"><b>Departments</b></a></li>
                	<div class="dropdown-content">
					    <a href="#"><b>Ayurvedic</b></a>
					    <a href="#"><b>Homeopathic</b></a>
					    <a href="#"><b>Naturopathic</b></a>
					    <a href="#"><b>Allopathic</b></a>
					</div>
				</div>
				<div class="dropdown">
                <li><a href="#healthcare"><b>Health Care</b></a></li>
                	<div class="dropdown-content">
     					<a href="#"><b>Personal Care</b></a>
                	    <a href="#"><b>Baby & Mom Care</b></a>
              			<a href="#"><b>Diabetic Care</b></a>
                		<a href="#"><b>Weight Management</b></a>
                		<a href="#"><b>Sexual Wellness</b></a>
                	</div>
                </div>
                <div class="dropdown">
                <li><a href="devices"><b>Medical Devices</b></a></li>
                	<div class="dropdown-content">
	                	<a><b>Diabetes Monitors</b></a>
	      				<a><b>Blood Pressure Monitors</b></a>          		
	         			<a><b>Hemoglobin Test Monitors</b></a>
	           			<a><b>Disposal Products</b></a>
	                    <a><b>Thermometers</b></a>
	     				<a><b>Doctor's Corners</b></a>
	        			<a><b>Suction Machine</b></a>
	        		</div>
                </div>
                <li><a href="#blogs"><b>Blogs</b></a></li>
            </ul>
            <div class="wrap">
              <div class="search">
                 <input type="text" class="searchTerm" placeholder="Search for Prescriptions, Medicine Info......">
                 <button type="submit" class="searchButton">
                   <i class="fa fa-search"></i>
                </button>
              </div>
           </div>
    </header>

    <div class="login-box">
        <div class="leftbox">
            <div class="alert alert-error"><? $_SESSION['message'] ?></div>
            <h1 style="text-align:center;color:#1ab188;margin-bottom:5%">Log IN</h1>
            <h2 style="text-align:center;color:#1ab188;margin-bottom:5%;">WELCOME BACK !!!</h2>
            <form action="login.php" method="POST" style="text-align:center;">
                <input type="text" class="box" name="username" placeholder="UserName" pattern="[a-zA-Z][a-zA-Z0-9-_\.]{3,20}" title="UserName must be 8-20 characters" required style="padding: 4px;  margin-bottom: 5%;  font-size: 15px;"><br>
                <input type="password" name="password" class="box" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required style="padding: 4px;  margin-bottom: 5%;  font-size: 15px;"><br>
                <p id="myBtn" class="forgot" style="font-size:18px; font-style:bold; color:white; margin-bottom:8%;">Forgot Password?</p>
                <input type="submit"name="login"class="submit-btn" value="Log In">
            </form>
        </div>
        <p style="background-color: #999;font-size:20px;text-align:center;"><a href="signin.php">Already a user ??</a></p>
    </div>
    <!-- <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <label style="color:white;">Email Address</label><br>
            <input type="email" id="user" name="email" class="input-box" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
        </div>
    </div> -->

    <footer class="footer-distributed">
 
        <div class="footer-left">
            <div style="box-sizing: border-box;background-color: white;width: 300px; height: 80px; padding: 10px;"><a href="index.html" style="text-decoration: none;">
                <img src="image/logodesign.jpg" style="max-width: 35px; max-height: 40px;top:10%; left:10%;">
                <h1 class="shimmer">MEDIFACTS</h1>
                <h3 style="font-family: Comic Sans MS; font-weight: 250; font-size: 1em;text-align-last: left;  padding: 0 0px 0 80px;color:#1CB4E3;">We Know Your Pills</h3>
            </a></div>
                <p class="footer-links">
                    <a href="#">Home</a>
                    |
                    <a href="#">Blog</a>
                    |
                    <a href="#">About</a>
                    |
                    <a href="#">Contact</a>
                </p>
 
                <p class="footer-company-name">© 2019 Medifacts Pvt. Ltd.</p>
            </div>
 
            <div class="footer-center">
                <div>
                    <i class="fa fa-map-marker"></i>
                      <p><span>A-Block, Thakur Educational Campus, Shyamnarayan Thakur Marg, Thakur Village, Kandivali East, Mumbai, Maharashtra 400101</p>
                </div>
 
                <div>
                    <i class="fa fa-phone"></i>
                    <p>022 6730 8106</p>
                </div>
                <div>
                    <i class="fa fa-envelope"></i>
                    <p><a href="nehajhagigly@gmail.com">support@medifacts.com</a></p>
                </div>
            </div>
            <div class="footer-right">
                <p class="footer-company-about">
                    <span>About the company</span>
                    We offer facts about medicines and offer medicines in demand to doorstep.</p>
                <div class="social-icons">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                </div>
            </div>
        </footer>

</body>
</html>