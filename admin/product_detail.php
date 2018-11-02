<?php
	include('connection.php');
	session_start();
	$id=$_SESSION['id'];
	if(!isset($_SESSION['id']))
	{
		header("location:HomePage.php");
		exit();
	}
	$q="select * from tbl_product";
	$r=mysql_query("$q");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Product | Mobilehop</title>
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
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2><b>Product Details</b></h2>
						<a href="product.php"> ADD PRODUCT </a></br></br>
						
						<table border="1">
							<tr>
								<th>Product ID</th>
								<th>Company Name</th>
								<th>Product Name</th>
								<th>Product Description</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Main Image</th>
								<th>Image2</th>
								<th>Image3</th>
								<th>Image4</th>
								<th colspan=2>Perform</th>
							</tr>
							<?php
								while($row=mysql_fetch_array($r))
								{
								$img=$row['image'];
								$img2=$row['image2'];
								$img3=$row['image3'];
								$img4=$row['image4'];
								//echo $img;
								
							?>
							<tr>
								<td><?php echo $row['prod_id'];?></td>
								
								<?php
								$ComId=$row['com_id'];
								$qq="select company from tbl_company where com_id=$ComId";
								$catres=mysql_query($qq);
								$catrow=mysql_fetch_array($catres);
								?>
								<td><?php echo $catrow['company'];?></td>
								<td><?php echo $row['prod_name'];?></td>
								<td><?php echo $row['description'];?></td>
								<td><?php echo $row['price'];?></td>
								<td><?php echo $row['quantity'];?></td>
								<td><?php	
									//function simage($id)
									{
										$file_folder = 'mobileimage/';
										$ProdImg=$file_folder.$img;
										if(file_exists($ProdImg))
										{
											$fpath=$ProdImg;
										}
										else
										{
											$fpath="mobileimage/no_preview.jpg";
										}
										//echo $fpath;
										//return;
										
										echo "<img src='$fpath' height='100' width='100'>";
									}
								?>
								</td>
								<td><?php	
									//function simage($id)
									{
										$file_folder = 'mobileimage/';
										$ProdImg2=$file_folder.$img2;
										if(file_exists($ProdImg2))
										{
											$fpath=$ProdImg2;
										}
										else
										{
											$fpath="mobileimage/no_preview.jpg";
										}
										//echo $fpath;
										//return;
										
										echo "<img src='$fpath' height='100' width='100'>";
									}
								?>
								</td>
								<td><?php	
									//function simage($id)
									{
										$file_folder = 'mobileimage/';
										$ProdImg3=$file_folder.$img3;
										if(file_exists($ProdImg3))
										{
											$fpath=$ProdImg3;
										}
										else
										{
											$fpath="mobileimage/no_preview.jpg";
										}
										//echo $fpath;
										//return;
										
										echo "<img src='$fpath' height='100' width='100'>";
									}
								?>
								</td>
								<td><?php	
									//function simage($id)
									{
										$file_folder = 'mobileimage/';
										$ProdImg4=$file_folder.$img4;
										if(file_exists($ProdImg4))
										{
											$fpath=$ProdImg4;
										}
										else
										{
											$fpath="mobileimage/no_preview.jpg";
										}
										//echo $fpath;
										//return;
										
										echo "<img src='$fpath' height='100' width='100'>";
									}
								?>
								</td>
								<td><a href="product_update.php?id=<?php echo $row[0];?>"> Update  </a></td>
								<td><a href="product_delete.php?id=<?php echo $row[0];?>">Delete </a></td>
			
							</tr>
							<?php
								}
							?>
						</table>
						<br><br><br><br><br><br>
					</div><!--/login form-->
				</div>
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