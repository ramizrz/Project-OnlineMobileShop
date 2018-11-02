<?php
	include('connection.php');
	session_start();
	$id=$_SESSION['id'];
	if(!isset($_SESSION['id']))
	{
		header("location:HomePage.php");
		exit();
	}
	$q="select * from tbl_register";
	$r=mysql_query("$q");
	$count=mysql_num_rows($r);
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Mobilehop</title>
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
								<li><a href="#"><i class="fa fa-phone"></i> +91 99 88 776655</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@Mobileshop.com</a></li>
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
							<a href="HomePage.php"><img src="images/home/535.jpg" height="150" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-user"></i> Account</a></li>
								<li><a href="change_password.php"><i class="fa fa-key"></i> Change Password</a></li>
								<li><a href="logout.php"><i class="fa fa-unlock"></i> Logout</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" class="active"><b>Home</b></a></li>
								<li class="dropdown"><a href="#"><b>Master</b><i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="cp_detail.php">Company</a></li>
										<li><a href="product_detail.php">Product</a></li>
										<li><a href="logout.php">Logout</a></li> 
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#"><b>Client</b><i class="fa fa-angle-down"></i></a>
									<ul role="menu" class="sub-menu">
										<li><a href="register_detail.php">Register Details</a></li>
										<li><a href="feedback_detail.php">Feedback</a></li>
									</ul>
								</li>
								<li class="dropdown"><a href="#"><b>Order</b><i class="fa fa-angle-down"></i></a>
									<ul role="menu" class="sub-menu">
										<li><a href="order_detail.php">Oreder Details</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section>
	
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2><b>Register Details</b></h2>
						
						<table border="1" width="100%">
							<tr>
								<th>Customer ID</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>User Name</th>
								<th>Email Address</th>
								<th>Gender</th>
								<th>Country</th>
								<th>State</th>
								<th>City</th>
								<th>Zip Code</th>
								<th>Password</th>
								<th>Mobile No</th>
								<th>Perform</th>
							</tr>
							<?php
								while($row=mysql_fetch_array($r))
								{
							?>
							<tr>
								<td><?php echo $row['cust_id'];?></td>
								<td><?php echo $row['first_name'];?></td>
								<td><?php echo $row['last_name'];?></td>
								<td><?php echo $row['user_name'];?></td>
								<td><?php echo $row['email_add'];?></td>
								<td><?php echo $row['gender'];?></td>
								<td><?php echo $row['country'];?></td>
								<td><?php echo $row['state'];?></td>
								<td><?php echo $row['city'];?></td>
								<td><?php echo $row['zip_code'];?></td>
								<td><?php echo $row['password'];?></td>
								<td><?php echo $row['phone_no'];?></td>
								
								
								<td><a href="register_delete.php?id=<?php echo $row[0];?>">Delete </a></td>
			
							</tr>
						
							<?php
								}
							?>
							</table>
							<table>
							<tr>
								<td style="color:blue">Total Register:-<?php echo $count ?> </td>
							</tr>
							</table>
						<br><br><br><br><br><br>
					</div><!--/login form-->
				</div>
			</div>
		
	</section>
	
	
	
  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>