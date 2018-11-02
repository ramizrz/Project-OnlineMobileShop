<?php
	include('connection.php');
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login| Mobile Shop</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +91 8850171134</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> ask2ramiz@gmail.com</a></li>
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
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/MobileShopping-logo.png" height="80" width="300" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-user"></i> Account</a></li>
								<li>
								
								</li>
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	</header><!--/header-->
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2><b>Login to Your Account</b></h2>
						<?php
								if(isset($_POST['btnsubmit1']))
								{
									$Email = addslashes($_REQUEST['txtEmail']);
									$password = addslashes($_REQUEST['txtPassword']);
									
									$query = "SELECT * from tbl_register where email_add='$Email' and password='$password'";
									if($c =	 mysqli_query($con,$query))
									{
										if(mysqli_num_rows($c)>0)
										{
											$res =  mysqli_fetch_array($c);
											if($res['email_add']==$Email && $res['password']==$password)
											{
												$_SESSION['email_add']=$Email;
												$_SESSION['id']=$res['cust_id'];
												header("Location:index.php");
											}
											else
											{
													$msg = "Login fail";
													echo $msg;
											}
										}
										else
										{
											$msg = "Login fail";
											echo $msg;
										}
									}
									else
									{
										$msg="Login fail error";
									}
								}
								?>
						<form action="" method="post" id="login" name="login">
							
							<input type="email" name="txtEmail" placeholder="Email Address" />
							<input type="password" name="txtPassword" placeholder="Password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" name="btnsubmit1" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1"">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
				<div class="signup-form"><!--sign up form-->
						<h2><b>New User Signup!</b></h2>
						<?php 
							
							if(isset($_POST['btnSubmit']))
							{
								
								$FName=$_POST['txtFName'];
								$LName=$_POST['txtLName'];
								$UName=$_POST['txtUName'];
								$Email=$_POST['txtEmail'];
								$Gender=$_POST['selGender'];
								$Country=$_POST['txtCountry'];
								$State=$_POST['txtState'];
								$City=$_POST['txtCity'];
								$ZipCode=$_POST['txtZipCode'];
								$Password=$_POST['txtPassword'];
								$ConfirmPassword=$_POST['txtConfirmPassword'];
								$PhoneNo=$_POST['txtPhoneNo'];
								if(empty($FName)||empty($LName)||empty($UName)||empty($Email)||empty($Gender)||empty($Country)||empty($State)||empty($City)||empty($ZipCode)||empty($Password)||empty($ConfirmPassword)||empty($PhoneNo))
								{
									echo "Enter the All Fields.";
								}
								else
								{
									mysqli_query("INSERT into tbl_register (first_name,last_name,user_name,email_add,gender,country,state,city,zip_code,password,confirm_password,phone_no) values ('$FName','$LName','$UName','$Email','$Gender','$Country','$State','$City','$ZipCode','$Password','$ConfirmPassword','$PhoneNo')");
									header("location:register_detail.php");
									echo "Register Successfully";
								}
							}
						?>
						<form action=""  method="post" id="reg" name="reg">
						<input type="text" placeholder="First Name" name="txtFName" id="FName" value="<?php if (isset($FName)) echo $FName; ?>"/>
							<input type="text" placeholder="Last Name" name="txtLName" id="LName" value="<?php if (isset($LName)) echo $LName; ?>"/>
							<tr><td><input type="text" placeholder="User Name" name="txtUName" id="UName" value="<?php if (isset($UName)) echo $UName; ?>"/></td></tr>
							<tr><td><input type="email" placeholder="Email Address" name="txtEmail" id="Email" value="<?php if (isset($Email)) echo $Email; ?>"/></td><tr>
							<td><select name="selGender" id="Gender" value="<?php if (isset($Gender)) echo $Gender; ?>">
								<option value="-1">Gender</option>
								<option>Male</option>
								<option>Female</option>
							</select>
							</td>
							<tr>
							<td><input type="text" name="txtCountry" placeholder="Country" id="Country" value="<?php if (isset($Country)) echo $Country; ?>"></td>
								<td><input type="text" name="txtState" id="State" placeholder="State" value="<?php if (isset($State)) echo $State; ?>"></td>
								<td><input type="text" name="txtCity" id="City" placeholder="City"value="<?php if (isset($City)) echo $City; ?>"></td></tr>
							<tr>
							<td><input type="text" placeholder="Zip / Postal Code" name="txtZipCode" id="ZipCode" value="<?php if (isset($ZipCode)) echo $ZipCode; ?>"/></td></tr>
							<tr><td><input type="password" placeholder="Password" name="txtPassword" id="Password" value="<?php if (isset($Password)) echo $Password; ?>"/></td></tr>
							<tr><td><input type="password" placeholder="Confirm Password" name="txtConfirmPassword" id="ConfirmPassword" value="<?php if (isset($ConfirmPassword)) echo $ConfirmPassword; ?>"/></td></tr>
							
							<tr><td><input type="text" placeholder="PhoneNo" name="txtPhoneNo" id="PhoneNo" maxlength="10" value="<?php if (isset($PhoneNo)) echo $PhoneNo; ?>"/></td></tr>
							<tr><td><button type="submit" name="btnSubmit" class="btn btn-default">Signup</button></td></tr>
						
						</form>
					</div><!--/sign up form-->
				</div>
				
			</div>
		</div>
	</section><!--/form-->
	
	
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
					<p class="pull-left">ONLINEMOBLIESHOP™<br>
					ONLINEMOBILEShop.com is the INDIA's No. 1 visited watch website.</p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>