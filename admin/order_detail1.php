
<script>

function update_status(id)
{
	var id = id;
	var ordersid= $('#hdns_'+id).val();
	var status = $('#status_'+id).val();

	$.ajax({
		type:"POST",
		url:"status.php",
		data:{"ordersid":ordersid,"status":status},
		dataType:"text",
		success:function(data){
			alert(data);
		}
	});
	
}


</script>


<?php
	include('connection.php');
	session_start();
	$id=$_SESSION['id'];
	if(!isset($_SESSION['id']))
	{
		header("location:HomePage.php");
		exit();
	}
	$ordersid = $_REQUEST['ordersid'];
	$q="select * from adddeatails where ordersid = '$ordersid'";
	$r=mysql_query("$q");
	//echo $q;
	
	$q2 = "select * from orderdetails where ordersid = '$ordersid'";
	$r2 = mysql_query("$q2");
	//echo $q2;
	
	$cust_id=$_REQUEST['cust_id'];
	$q3 = "select * from tbl_order where id = '$ordersid' AND cust_id='$cust_id'";
	$r3 = mysql_query("$q3");
	//echo $q3;

	
	$q4 = "select * from tbl_register where cust_id='$cust_id'";
	$r4 =mysql_query("$q4");
	
	

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
					<div class="login-form" id="order"><!--login form-->
						<h2><b>Order Details</b></h2>
						<a href="order_detail.php" class="btn btn-default check_out" >BACK</a><br><br>
						<form action="" method="post">
						<table align="left"  width="800px">
							<tr style="background-color:#158C82;color:white">
								<th>User details</th>
								<th>Bill Address</th>
								<th>Shipping Address</th>
							</tr>
							<?php
								while($row4=mysql_fetch_array($r4)){
									$row3=mysql_fetch_array($r3);
									$row=mysql_fetch_array($r);
								?>	
								<tr>
									<td><label>Order On:-</label><?php echo $row3
									['date']?></td>
									<td><label>Address:-</label><?php echo $row['address']?></td>
									<td><label>Address:-</label><?php echo $row['paddress']?></td>
								</tr>
								<tr>
									<td><label>Name:-</label><?php echo $row4['first_name'] ." ". $row4["last_name"] ?></td>
									<td><label>Phone No:-</label><?php echo $row['phoneno']?></td>
									<td><label>Phone No:-</label><?php echo $row['pphoneno']?></td>
								</tr>
								<tr>
									<td><label>Email id:-</label><?php echo $row4['email_add']?></td>
									<td><label>Country:-</label><?php echo $row['country']?></td>
									<td><label>Country:-</label><?php echo $row['pcountry']?></td>
								</tr>
								<tr>
									<td><label>Phone No:-</label><?php echo $row4['phone_no'] ?></td>
									<td><label>State:-</label><?php echo $row['state']?></td>
									<td><label>State:-</label><?php echo $row['pstate']?></td>
								</tr>
								<tr>
									<td><label>Gender:-</label><?php echo $row4[
									'gender'] ?></td>
									<td><label>City:-</label><?php echo $row['city']?></td>
									<td><label>City:-</label><?php echo $row['pcity']?></td>
								</tr>
								<?php
								}
								?>
						</table>
						<table width="800px">
						<tr >
								<th style="background-color:#158C82;color:white">Product-Deatails</th>
						</tr>
						</table>
						<table align="left" width="800px">
							
							<tr>
								<th>Product-id</th>
								<th>price</th>
								<th>Quantity</th>
								<th>Status</th>
							</tr>
							<?php
								
								
								while($row2=mysql_fetch_array($r2)){
									
									$q5 = "select * from tbl_status where prod_id='".$row2['prod_id']."' AND cust_id='$cust_id'";
									$r5 = mysql_query("$q5");
									//echo $q5;
									$row5 = mysql_fetch_array($r5);
								?>
								<tr>
									
									<td>
									<input type="hidden" id="hdns_<?php echo $row2['prod_id']?>" name="hdns_<?php echo $row2['prod_id']?>" value="<?php echo $row2['ordersid']?>" />
									<input type="hidden" name="prod_id_<?php echo $row2['prod_id'] ?>" id="prod_id_<?php echo $row2['prod_id'] ?>" value="<?php echo $row2['prod_id'] ?>"><?php echo $row2['prod_id'] ?></td>
									<td><?php echo $row2['price'] ?></td>
									<td><?php echo $row2['quantity'] ?></td>
									<td><select name="status_<?php echo $row2['prod_id'] ?>" id="status_<?php echo $row2['prod_id'] ?>" value="<?php if(isset($_POST['status'])) { echo $_POST['status'];} ?>" >
										<option name="NEW" value="NEW">NEW</option>
										<option name="APPROVAL" value="APPROVAL">APPROVAL</option>
										<option name="PROGRESS" value="PROGRESS">PROGRESS</option>
										<option name="SHIPPED" value="SHIPPED">SHIPPED</option>
										<option name="DELIVARY" value="DELIVARY">DELIVARY</option>
										<option name="COMPLETED" value="COMPLETED">COMPLETED</option>
									  </select> </td>
									 <td>
										<input type="button" onclick="update_status(<?php echo $row2['prod_id'];?>);" value="Submit" class="btn btn-default check_out" name="submit" id="submit" style="width:60px" />
									 </td>
									
								</tr>
								
								
								<?php
								}
								?>
								
						</table>
						</form>
						
						<br><br><br><br><br><br>
					</div><!--/login form-->
					<form>
							<input type="button" name="print"  value="Print" class="btn btn-default check_out" onClick="printContent('order')">
					</form>
				</div>
			</div>
		
	</section>
	
<script> 
function printContent(order){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(order).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}

</script>
	
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>