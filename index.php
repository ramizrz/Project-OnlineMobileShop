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
    <title>Home | Mobile Shop</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
   
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
	<script src="js/quenty.js"></script>
	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>

	
       
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
								<li><a href="about-us.php"><b>About us</b></a>
                                </li> 
								<li class="dropdown"><a href=""><b>Search By Brands</b><i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
									<table>
										<tr>
											<?php
									
												$result=mysqli_query($con,"SELECT com_id,company from tbl_company");													
												while($row=mysqli_fetch_array($result))
												{
													$_SESSION['com_id'] = $row['com_id'];
													echo "<li>";
													echo "<a href='company.php?company=".$row['com_id']."'><span class='pull-right'></span>".$row['company'],"</a>";
													echo "</li>";
												}	
											?>
										</tr>
									</table>
									</ul>
                                </li>
								<li><a href="contact-us.php"><b>Contact Us</b></a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
						<form method="GET" class="searchform" action="search.php">
						<fieldset>
							<input type="text" name="search" id="search" placeholder="Search"/>
							<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
						</fieldset>
						</form>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
							<li data-target="#slider-carousel" data-slide-to="3"></li>
							<li data-target="#slider-carousel" data-slide-to="4"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><b><span><big>A</big></span>PPLE</b></h1>
									<h3>IPHONE 7</h3>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<br><br>
									<img src="images/home/slide1.jpg" class="slide img-responsive" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><b><span><big>A</big></span>SUS</b></h1>
									<h3>ASUS MOBILE PHONE </h3>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<br><br>
									<img src="images/home/slide2.jpg" class="slide img-responsive" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><b><span><big>L</big></span>LENOVO</b></h1>
									<h3>K 900 MODEL</h3>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<br><br>
									<img src="images/home/slide3.jpg" class="slide img-responsive" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">SAMSUNG</b></h1>
									<h3>SAMSUNG MOBILE PHONE</h3>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<br><br>
									<img src="images/home/slide4.png" class="slide img-responsive" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><b><span><big>N</big></span>OKIA</b></h1>
									<h3>MICROSOFT BUILD</h3>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<br><br><br>
									<img src="images/home/slide5.jpg" class="slide img-responsive" alt="" />
								</div>
							</div>
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/slider--> 
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									
									<?php
									$data="";
									$query="SELECT com_id,company from tbl_company";
									$result=mysqli_query($con,$query);	
									while($row=mysqli_fetch_array($result))
									{

										if($_SESSION['com_id'] == $row['com_id'])
										{echo "<li>";
										echo "<a href='company.php?company=".$row['com_id']."'><span class='pull-right'></span>".$row['company'],"</a>";
										echo "</li>";
									}}	
									?>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="range" min="5000" max="70000" step="5000" value="10000" id="min_price" name="min_price" />  
								 <span id="price_range"></span>  
							</div>  
						</div><!--/price-range-->
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items home_feature"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						<div id="product_loading">
						<?php
					
							$sql="SELECT * from tbl_product";

							$result=mysqli_query($con,$sql);
														
							while($row=mysqli_fetch_array($result))
							{							
								$ProdId=$row['prod_id'];
								$ComId=$row['com_id'];
								
						?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											
											<?php// simage($row['image']) ?>
											<img class="home_img" src="admin/mobileimage/<?php echo $row['image']; ?>" height="300px" width="197px" /><br><br>
											<h2 class="price">Rs.<?php echo $row['price'] ?></h2><br>
											<h2 class="pro_name"><?php echo $row['prod_name'] ?></h2>
											<a href="cart.php?prod_id=<?php echo $row['prod_id'] ?>"  class=" btn btn-default add-to-cart"><i class='fa fa-shopping-cart'></i>Add to cart</a>
											<a href="proddetail.php?prod_id=<?php echo $row['prod_id'] ?>"  class=" btn btn-default view1">View Details</a>	
										</div>
										
								</div>
							</div>
						</div>
						<?php
							}
						?>
						
					</div>
					
				</div>
			</div>
		</div>
	</section>
	
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
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
<script>  
 $(document).ready(function(){  
      $('#min_price').change(function(){  
           var price = $(this).val();  
           $("#price_range").text("Product under Price Rs." + price);  
           $.ajax({  
                url:"load_product.php",  
                method:"POST",  
                data:{price:price},  
                success:function(data){  
                     $("#product_loading").fadeIn(500).html(data);  
                }  
           });  
      });  
 });  
 </script>  
</body>
</html>