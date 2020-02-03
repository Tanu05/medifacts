<?php 

include('database_connection.php');

session_start();

if(isset($_POST['add'])){
    //print_r($_POST[id]);
    if(isset($_SESSION['cart'])){
        print_r($_SESSION['cart']);
    }
    else {
        $item_array = array(
            'iid'=>$_POST['id']
        );

        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
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
        
        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/script.js"></script>
        <link href = "css/jquery-ui.css" rel = "stylesheet">
        
    </head>       
<body>
    <header>
        <a href="index.php" style="text-decoration: none;"><img src="image/logodesign.jpg" style="max-width: 40%; max-height: 40%;margin-top: 2%;">
        <h1 class="shimmer" style="margin-left:7%;">MEDIFACTS</h1>
        <h3 style="font-family: Comic Sans MS; font-weight: 250; font-size: 1em;text-align-last: left;margin-top: -10px; margin-left:11%;color:#1CB4E3;">We Know Your Pills</h3></a>
        <ul class="first_ul">
        	<li><a href="tel: 9834634031"><i class="fa fa-phone"></i></a></li>
        	<li><a href="#shoppingcart"><i class="fa fa-shopping-cart"></i></a></li>
        	<li><a href="signin.php"><i class="material-icons">person</i></a></li>
        </ul><br>
         	<ul class = "sec_ul">
        		<li><a class="active" href="index.php"><b>Home</b></a></li>
                <li><a href="#about"><b>About</b></a></li> 
                <div class="dropdown">   
                <li><a href="#department"><b>Departments</b></a></li>
                	<div class="dropdown-content">
					    <a href="ayurvedic.php"><b>Ayurvedic</b></a>
					    <a href="ayurvedic.php"><b>Homeopathic</b></a>
					    <a href="ayurvedic.php"><b>Naturopathic</b></a>
					    <a href="ayurvedic.php"><b>Allopathic</b></a>
					</div>
				</div>
				<div class="dropdown">
                <li><a href="#healthcare"><b>Health Care</b></a></li>
                	<div class="dropdown-content">
     					<a href="ayurvedic.php"><b>Personal Care</b></a>
                	    <a href="ayurvedic.php"><b>Baby & Mom Care</b></a>
              			<a href="ayurvedic.php"><b>Diabetic Care</b></a>
                		<a href="ayurvedic.php"><b>Weight Management</b></a>
                		<a href="ayurvedic.php"><b>Sexual Wellness</b></a>
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
            </ul><br>
            <div class="wrap">
              <div class="search">
                 <input type="text" class="searchTerm" placeholder="Search for Prescriptions, Medicine Info......">
                 <button type="submit" class="searchButton">
                   <i class="fa fa-search"></i>
                </button>
              </div>
           </div>
    </header>

    <div class="section_heading">
        <h2 style="box-sizing: border-box; background-color: white;">AYURVEDIC CORNER</h2>
    </div>

    <div class="container">
        <div class="row" style="float:right;height:100%;margin-right:3%;">
            <div class="column">
                <div class="card">
                    <div class="list-group" >
                        <h3>Price</h3>
                        <input type="hidden" id="hidden_minimum_price" value="0" />
                        <input type="hidden" id="hidden_maximum_price" value="65000" />
                        <p id="price_show">200 - 12000</p><br>
                        <div id="price_range"></div>
                    </div><br>
                    <div class="list-group">
                        <h3>Brand</h3>
                        <div style=" overflow-y: auto; overflow-x: hidden;">
                            <?php
                                $query = "SELECT DISTINCT(product_brand) FROM product WHERE product_status = '1' ORDER BY product_id DESC";
                                $statement = $connect->prepare($query);
                                $statement->execute();
                                $result = $statement->fetchAll();
                                foreach($result as $row)
                                {
                                    ?>
                                    <div class="list-group-item checkbox">
                                        <label><input type="checkbox" class="common_selector brand" value="<?php echo $row['product_brand']; ?>"  > 
                                        <?php echo $row['product_brand']; ?></label>
                                    </div>
                                    <?php
                                }
                            ?>
                    </div>
                    </div>
                    <div class="list-group">
                        <h3>Discount</h3>
                            <?php

                            $query = "
                            SELECT DISTINCT(product_disc) FROM product WHERE product_status = '1' ORDER BY product_disc DESC
                            ";
                            $statement = $connect->prepare($query);
                            $statement->execute();
                            $result = $statement->fetchAll();
                            foreach($result as $row)
                            {
                            ?>
                            <div class="list-group-item checkbox">
                                <label><input type="checkbox" class="common_selector disc" value="<?php echo $row['product_disc']; ?>" > <?php echo $row['product_disc']; ?></label>
                            </div>
                            <?php    
                            }

                            ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="column" >
                <div class="card">
                    <div class="row filter_data">
                    
                    </div>
                </div>
            </div>
        </div>
    </div>

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

    <script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var brand = get_filter('brand');
        var disc = get_filter('disc');
        var disc = get_filter('disc');
        $.ajax({
            url:"fetch_data.php",
            method:"POST",
            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, brand:brand, disc:disc, disc:disc},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

    $('#price_range').slider({
        range:true,
        min:200,
        max:12000,
        values:[200, 12000],
        step:500,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });

});
</script>
</body>
</html>