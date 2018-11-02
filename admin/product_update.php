<?php
	include('connection.php');
	session_start();

	if(!isset($_SESSION['id']))
	{
		header("location:HomePage.php");
		exit();
	}
		$id=$_GET['id'];
		$upd=mysql_query("select * from tbl_product where prod_id=$id");
		$rows=mysql_fetch_array($upd);
	
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
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2><b>Product Update</b></h2>
						<a href="product_detail.php">ALL RECORDS</a></br></br>
						
						<?Php

							if(isset($_POST['btnUpdate']))
							{	
								$ComId=$_POST['txtCompName'];
								$ProdName=$_POST['txtProdName'];
								$ProdDesc=$_POST['txtProdDesc'];
								$ProdPrice=$_POST['txtProdPrice'];
								$ProdQunt=$_POST['txtProdQunt'];
								$ProdImgs=$_POST['ProdImg'];
								$ProdImgs2=$_POST['ProdImg2'];
								$ProdImgs3=$_POST['ProdImg3'];
								$ProdImgs4=$_POST['ProdImg4'];
								
								if(empty($ComId)||empty($ProdName)||empty($ProdDesc)||empty($ProdPrice)||empty($ProdQunt)||empty($ProdImgs)
								||empty($ProdImgs2)||empty($ProdImgs3)||empty($ProdImgs4))
								{
									echo "Enter the All Field.";
								}
								else
								{
									$sql="update tbl_product set com_id='$ComId',  prod_name= '$ProdName' ,description='$ProdDesc',price='$ProdPrice',quantity='$ProdQunt',image='$ProdImgs',image2='$ProdImgs2',image3='$ProdImgs3',image4='$ProdImgs4' where prod_id=$id";
									//echo $sql;
									//return;
									mysql_query($sql);
								
									//header("location:product_detail.php");
								}
							}
						?>
						
						<form action="#" method="post">
							<select name="txtCompName">
							<option value="-1">---Select Company---</option>

							<?php
								$query="select com_id,company from tbl_company";
								$res=mysql_query($query);
								while($rows=mysql_fetch_array($res))
								{
									echo "<option value=".$rows['com_id'].">".$rows['company']."</option>";
								}
			
			
							?>
		
							</select>
							
							<input type="text" placeholder="Product Name" name="txtProdName" id="ProdName" value="<?php echo $rows['prod_name']; ?>" />
							
							<input type="text" placeholder="Product Description" rows="7" name="txtProdDesc" id="ProdDesc" value="<?php $rows['description']; ?>"/>
							
							<input type="text" placeholder="Price" name="txtProdPrice" id="ProdPrice" value="<?php $rows['price']; ?>" />
							
							<input type="text" placeholder="Quantity" name="txtProdQunt" id="ProdQunt" value="<?php $rows['quantity']; ?>" />
							
							<input type="hidden" name="MAX_FILE_SIZE" value="2000000"/>
							<label>Main Image</label>
							<input type="file" placeholder="Image" name="ProdImg" id="ProdImg" size="35" value="<?php $rows['image']; ?>" class="btn btn-default"/>
							<label>Image2</label>
							<input type="file" placeholder="Image" name="ProdImg2" id="ProdImgs2" size="35" class="btn btn-default"/>
							<label>Image3</label>
							<input type="file" placeholder="Image" name="ProdImg3" id="ProdImgs3" size="35" class="btn btn-default"/>
							<label>Image4</label>
							<input type="file" placeholder="Image" name="ProdImg4" id="ProdImgs4" size="35" class="btn btn-default"/>
							<button type="submit" name="btnUpdate" class="btn btn-default">Update</button>
							<br><br><br><br><br><br>
							
						</form>
						
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