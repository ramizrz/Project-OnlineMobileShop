<?php
		include('connection.php');
		session_start();
		require 'item.php';
	
//save new order
$custid=$_SESSION['id'];
mysqli_query($con,'INSERT into tbl_order(name,date,cust_id)values("New order","'.date("Y/m/d h:i:s").'",'.$custid.')');
$ordersid = mysqli_INSERT_id($con);
	

//save order details for new order
	
	$fname = $_POST['txtFName'];
	$lname = $_POST['txtLName'];
	$address = $_POST['txtAdd'];
	$zipcode = $_POST['txtZip'];
	$country = $_POST['txtCountry'];
	$state= $_POST['txtState'];
	$city = $_POST['txtCity'];
	$phoneno = $_POST['txtPhno'];
	$pfname = $_POST['PtxtFName'];
	$plname = $_POST['PtxtLName'];
	$paddress = $_POST['PtxtAdd'];
	$pzipcode = $_POST['PtxtZip'];
	$pcountry = $_POST['PtxtCountry'];
	$pstate= $_POST['PtxtState'];
	$pcity = $_POST['PtxtCity'];
	$pphoneno = $_POST['PtxtPhno'];	
	
	$query = "INSERT into adddeatails(ordersid,fname,lname,address,zipcode,country,state,city,phoneno,pfname,plname,paddress,pzipcode,pcountry,pstate,pcity,pphoneno,order_status) values ('$ordersid','$fname','$lname','$address','$zipcode','$country','$state','$city','$phoneno','$pfname','$plname','$paddress','$pzipcode','$pcountry','$pstate','$pcity','$pphoneno','NEW')";
	$res1=mysqli_query($con,$query);

	
	$cart = unserialize(serialize($_SESSION['cart']));
	for($i=0;$i<count($cart);$i++){
		mysqli_query($con,'INSERT into orderdetails(prod_id,ordersid,price,quantity) values ('.$cart[$i]->prod_id.','.$ordersid.','.$cart[$i]->price.','.$cart[$i]->quantity.')');
	}	

//Clear all product in cart
unset($_SESSION['cart']);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Order| Mobile Shop</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">

    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
	<script type="text/javascript" src="js/copyform.js"></script>
 
   <link rel="shortcut icon" href="images/cell-icon-27.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/cell-icon-27.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/cell-icon-27.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/cell-icon-27.png">
    <link rel="apple-touch-icon-precomposed" href="images/cell-icon-27.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +91 99 88 776655</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@mobileshop.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li>
								<?php
				
										if ($_SESSION['id'] == "")
										{
											echo "<a href='login.php'><i class='fa fa-user'></i>Account</a>";
										}
										else
										{
											echo "<a href='account.php'><i class='fa fa-user'></i>Account</a>";
										}
									?>
								</li>
								<li>
								<?php
				
										if ($_SESSION['id'] == "")
										{
											echo "<a href='login.php'><i class='fa fa-crosshairs'></i>Checkout</a>";
										}
										else
										{
											echo "<a href='checkout.php'><i class='fa fa-crosshairs'></i>Checkout</a>";
										}
									?>
								</li>
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart
								</a></li>
								<li>
								<?php
				
										if ($_SESSION['id'] == "")
										{
											echo "<a href='login.php'><i class='fa fa-lock'></i>Login/SignUp</a>";
										}
										else
										{
											echo "<a href='logout.php'><i class='fa fa-unlock'></i> Logout</a>";
										}
									?>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/MobileShopping-logo.png" height="80" width="300" alt="" /></a>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
	
	</header><!--/header--><br><br><br><br>
<table border="1" align="center" width="716">
	<tr>
    	<td>
        	<center><h4><font color="#0066FF">Your Order is submitted successfully.You will receive Order confirmation within short period of time.</font></h4></center>
        </td>
    </tr>
	<tr>
		<center><h4>Your Order Number Is.<?php echo "$ordersid";?><font color="#0066FF"></font></h4></center>
	</tr>
</table>
<br><br><br>	
	<footer id="footer"><!--Footer-->
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Mobileshop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Online Help</a></li>
								<li><a href="#">Mobile News</a></li>
								<li><a href="#">Mobile Reviews</a></li>
								<li><a href="#">0% Finance</a></li>
								<li><a href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Contact Us Information</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Telephone/Email us</a></li>
								<li><a href="#">Login/Register</a></li>
								<li><a href="#">Press</a></li>
								<li><a href="#">Report a bug</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Returns and Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">30 day returns policy</a></li>
								<li><a href="#">Delivery policy</a></li>
								<li><a href="#">Shipping locations</a></li>
								<li><a href="#">Click & Collect</a></li>
								<li><a href="#">Bulk purchases</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Other Information</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Bracelet adjustments</a></li>
								<li><a href="#">Competition</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Mobileshop</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">ONLINEMOBILESHOP™ <br>
					ONLINEMOBILEShop.com is the INDIA's No. 1 visited watch website.</p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
		
	

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>