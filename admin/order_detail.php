<?php
	include('connection.php');
	session_start();
	$id=$_SESSION['id'];
	if(!isset($_SESSION['id']))
	{
		header("location:HomePage.php");
		exit();
	}
	$q="select * from adddeatails";
	$r=mysql_query("$q");
	
	$qq = "select * from tbl_order";
	$r1=mysql_query("$qq");
	
	
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
										<li><a href="order_detail.php">Order Details</a></li>
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
						<h2><b>Order Management</b></h2>
						
						
						<table border="1"  width="100%">
							<tr>
								<th style="background-color:#158C82">Arrival Order By Register Name</th> 
								<th style="background-color:#158C82">Order Status</th> 
							</tr>
							
							<?php
								$qry_orders = "SELECT ordersid,cust_id,fname,lname,order_status FROM adddeatails A,tbl_order B WHERE order_status !='COMPLETED' AND A.ordersid= B.id";
								$res_orders = mysql_query($qry_orders);
								$count =mysql_num_rows($res_orders);
								
								$new="select * from adddeatails where Order_status='NEW'";
								$new1 = mysql_query($new);
								$count1 = mysql_num_rows($new1);
								
								$APPROVAL ="select * from adddeatails where Order_status='APPROVAL'";
								$APPROVAL1 = mysql_query($APPROVAL);
								$count2 = mysql_num_rows($APPROVAL1);
								
								$PROGRESS ="select * from adddeatails where Order_status='PROGRESS'";
								$PROGRESS1 = mysql_query($PROGRESS);
								$count3 = mysql_num_rows($PROGRESS1);
								
								$SHIPPED ="select * from adddeatails where Order_status='SHIPPED'";
								$SHIPPED1 = mysql_query($SHIPPED);
								$count4 = mysql_num_rows($SHIPPED1);
								
								$DELIVARY ="select * from adddeatails where Order_status='DELIVARY'";
								$DELIVARY1 = mysql_query($DELIVARY);
								$count5 = mysql_num_rows($DELIVARY1);
								
								$COMPLETED ="select * from adddeatails where Order_status='COMPLETED'";
								$COMPLETED1 = mysql_query($COMPLETED);
								$count6 = mysql_num_rows($COMPLETED1);
								
								if (mysql_num_rows($res_orders) > 0)
								{
									while ($row = mysql_fetch_array($res_orders))
									{
										echo "<tr>
											<td>
												<a href='order_detail1.php?ordersid=$row[ordersid]&cust_id=$row[cust_id]'>$row[fname] $row[lname]<a>
											</td>
											<td>
												$row[order_status]
											</td>
											
										</tr>";
									}
								}
								
							
							?>
							<?php
							/*
								while($row=mysql_fetch_array($r)){
									$row1=mysql_fetch_array($r1);
									//$_SESSION['ordersid'] = $data['ordersid'];
									//$_SESSION['cust_id'] = $data['cust_id'];
								?>	
								<tr>
									<td><a href="order_detail1.php?ordersid=<?php echo $row['ordersid'] ?>&&cust_id=<?php echo $row1['cust_id']?>"><?php echo $row['fname'] ." ". $row['lname'] ?><a></td>
								</tr>
								<?php
									}
									*/
								?>
						</table>
						
						<br><br><br><br><br><br>
					</div><!--/login form-->
					
				</div>
				<div class="col-sm-7">
				<table border="1">
					<tr>
						<th style="background-color:#158C82">Order</th>
						<th style="background-color:#158C82">Total</th>
					</tr>
					<tr>
						<td>NEW ORDER:-</td><td><?php echo $count1;?></td>
					</tr>
					<tr>
						<td>APPROVAL ORDER:-</td><td><?php echo $count2;?></td>
					</tr>
					<tr>
						<td>PROGRESS ORDER:-</td><td><?php echo $count3;?></td>
					</tr>
					<tr>
						<td>SHIPPED ORDER:-</td><td><?php echo $count4;?></td>
					</tr>
					<tr>
						<td>DELIVARY ORDER:-</td><td><?php echo $count5;?></td>
					</tr>
					<tr>
						<td>COMPLETED ORDER:-</td><td><?php echo $count6;?></td>
					</tr>
					<tr style="background-color:khaki;color:blue">
						<td>TOTAL ORDER:-</td><td><?php echo $count;?></td>
					</tr>
					</table>
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