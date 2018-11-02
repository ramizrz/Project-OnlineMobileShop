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
    <title>About-US| Mobile Shop</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">

    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
	<script src="http://maps.googleapis.com/maps/api/js">
</script>

<script>
var myCenter=new google.maps.LatLng(19.053544,72.92391);

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:5,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter,
  });

marker.setMap(map);

var infowindow = new google.maps.InfoWindow({
  content:"My Mobile Shop!"
  });

infowindow.open(map,marker);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
  
  
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
								<li class="dropdown"><a href="#"><b>Search By Brands</b><i class="fa fa-angle-down"></i></a>
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
	
	<div id="googleMap"  style="width:500px;height:380px;" class="container">
    		
    </div><!--/#contact-page-->
	
	
	
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
					<p class="pull-left">ONLINEMOBILESHOP™<br>
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