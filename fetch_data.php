<?php

//fetch_data.php

include('database_connection.php');

if(isset($_POST["action"]))
{
	$query = "
		SELECT * FROM product WHERE product_status = '1'
	";
	if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
	{
		$query .= "
		 AND product_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
		";
	}
	if(isset($_POST["brand"]))
	{
		$brand_filter = implode("','", $_POST["brand"]);
		$query .= "
		 AND product_brand IN('".$brand_filter."')
		";
	}
	if(isset($_POST["disc"]))
	{
		$disc_filter = implode("','", $_POST["disc"]);
		$query .= "
		 AND product_disc IN('".$disc_filter."')
		";
	}

	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '';
	if($total_row > 0)
	{
		foreach($result as $row)
		{
			// $output .= '
			// <div class="column" style="background-color:#bdefee;border-radius:16px;display:flex;margin-bottom:2%;float: left;margin-left:2%;width: 18%;padding: 0 6px;height: 30%;text-align:center;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
			// <img src="image/'. $row['product_image'] .'" alt="" class="img-responsive" style="width:45%;height:70%;">
			// 	<div>
			// 		<p align="center" style="color: #000;">'. $row['product_name'] .'</p>
			// 		<h4 style="text-align:center;" class="text-danger" >'. $row['product_price'] .'</h4>
			// 		Brand : '. $row['product_brand'] .' <br />
			// 		Discount : '. $row['product_disc'] .'<br />
			// 		<button name="add" style="color: #000;background-color: #ede482;border-radius:6px;font-size:20px">Add to Cart <i class="fa fa-shopping-cart"></i></button>
			// 		<input type="hidden" name="id" value="$id">
			// 	</div>
			// </div>
			// ';
			// $output .='
			// <div class="column" style="display:flex;float: left;margin-left:2%;width: 18%;padding: 0 6px;height: 50%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);"">
			// 	<div class="product" style="position:absolute;height:40%;box-shadow:0 20px 40px rgba(0,0,0,0.2);border-radius:5px;">
			// 		<div class="imgbox" style="height:50%;box-sizing:border-box;">
			// 			<img src="image/'. $row['product_image'] .'" alt="" class="img-responsive" style="width:80%;margin: 10px auto 0;">
			// 		</div>
			// 		<div class="specifice" style="position: absolute;width:100%;bottom: 0;padding: 10px;box-sizing:border-box;">
			// 			<h2 style="margin:0;padding:0;font-size:20px;width:100%;">'. $row['product_name'] .'
			// 			<span style="font-size: 15px;font-weight:normal;">Brand : '. $row['product_brand'] .' </span></h2>
			// 			<div class="price" style="position: absolute;right:25px;font-weight:bold;font-size:1em;top: 65%;">'. $row['product_price'] .'</div>
			// 			<label style="font-weight:bold;font-size: 1em;">Discount : '. $row['product_disc'] .'<br /></label>
			// 			<button style="display:block;cursor: pointer;transition:.02s;color: #fff;background-color: #337ab7;border-radius:5px;font-size:24px">Add to Cart <i class="fa fa-shopping-cart"></i></button>
			// 		</div>
			// 	</div>
			// </div>
			// ';
			$output.='
			<div class="product-card">
				<div class="badge">Hot</div>
				<div class="product-tumb">
					<img src="image/'. $row['product_image'] .'" alt="" class="img-responsive" >
				</div>
				<div class="product-details">
					<span class="product-catagory">'. $row['product_name'] .'</span>
					<p>Brand : '. $row['product_brand'] .'</p>
					<div class="product-bottom-details">
						<div class="product-price"><small>'. $row['product_price'] .'</small>'. $row['product_disc'] .' off</div>
						<div class="product-links">
							<a href=""><i class="fa fa-heart"></i></a>
							<a href=""><i class="fa fa-shopping-cart"></i></a>
						</div>
					</div>
				</div>
			</div>	
			';
		}
	}
	else
	{
		$output = '<h3>No Data Found</h3>';
	}
	echo $output;
}

?>
<html>
	<head>
		<style>
			.product-card {
    width: 18%;
	height:50%;
    position: relative;
    box-shadow: 0 2px 7px #dfdfdf;
    margin-left:2%;
	margin-bottom:2%;
	float:left;
    background: #fafafa;
}

.badge {
    position: absolute;
    left: 0;
    top: 20px;
    text-transform: uppercase;
    font-size: 13px;
    font-weight: 700;
    background: red;
    color: #fff;
    padding: 3px 10px;
}

.product-tumb {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 30%;
    padding: 10%;
    background: #f0f0f0;
}

.product-tumb img {
    max-width: 100%;
    max-height: 100%;
}

.product-details {
    padding: 2%;
}

.product-catagory {
    display: block;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    color: #ccc;
    margin-bottom: 18px;
}

.product-details h4 a {
    font-weight: 500;
    display: block;
    margin-bottom: 18px;
    text-transform: uppercase;
    color: #363636;
    text-decoration: none;
    transition: 0.3s;
}

.product-details h4 a:hover {
    color: #fbb72c;
}

.product-details p {
    font-size: 15px;
    line-height: 22px;
    margin-bottom: 18px;
    color: #999;
}

.product-bottom-details {
    overflow: hidden;
    border-top: 1px solid #eee;
    padding-top: 20px;
}

.product-bottom-details div {
    float: left;
    width: 50%;
}

.product-price {
    font-size: 18px;
    color: #fbb72c;
    font-weight: 600;
}

.product-price small {
    font-size: 80%;
    font-weight: 400;
    text-decoration: line-through;
    display: inline-block;
    margin-right: 5px;
}

.product-links {
    text-align: right;
}

.product-links a {
    display: inline-block;
    margin-left: 5px;
    color: #e1e1e1;
    transition: 0.3s;
    font-size: 17px;
}

.product-links a:hover {
    color: #fbb72c;
}
		</style>
	</head>
<body>
</body>
</html>