<?php
		include('connection.php');
		session_start();
		require 'item.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart| Mobile Shop</title>
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
	
	
	</header><!--/header-->
	
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
			<?php 
			
			if(isset($_GET['prod_id']) && !isset($_POST['update']))
			{
				$result=mysqli_query($con,'SELECT * from tbl_product where prod_id ='.$_GET['prod_id']);
				$tbl_product=mysqli_fetch_object($result);
				$item = new Item();
				$item ->prod_id=$tbl_product->prod_id;
				$item ->image=$tbl_product->image;
				$item ->prod_name=$tbl_product->prod_name;
				$item ->price=$tbl_product->price;
				$item ->quantity=1;
				//check product is existing in cart
				$index = -1;
				$cart = unserialize(serialize($_SESSION['cart']));
				for($i=0;$i<count($cart);$i++)
					if($cart[$i]->prod_id==$_GET['prod_id'])
					{
						$index = $i;
						break;
					}
				if($index == -1)
					$_SESSION['cart'][] = $item;
				else
				{
					$cart[$index]->quantity++;
					$_SESSION['cart'] = $cart;
				}
				
			}
			//delete product in cart
			if(isset($_GET['index']) && !isset($_POST['update']))
			{
				$cart = unserialize(serialize($_SESSION['cart']));
				unset($cart[$_GET['index']]);
				$cart = array_values($cart);
				$_SESSION['cart']=$cart;
			}
			//updating quantity in cart
			if(isset($_POST['update']))
			{
				$arrQuantity = $_POST['quantity'];
				//check validate quantity
				$valid = 1;
				for($i=0;$i<count($arrQuantity);$i++)
					if(!is_numeric($arrQuantity[$i]) || $arrQuantity[$i] <1 )
					{
						$valid = 0;
						break;
					}
					if($valid == 1)
					{
						$cart = unserialize(serialize($_SESSION['cart']));
						for($i=0;$i<count($cart);$i++)
						{
							$cart[$i]->quantity=$arrQuantity[$i];
						}
						$_SESSION['cart']=$cart;
					}
				else
			
				$error = 'Quantity is invalid';
			
			}
			?>
			<?php echo isset($error) ? $error:''; ?>
				<form method="post">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td>ID </td>
							<td class="image">Item</td>
							<td>Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity </td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<?php
					$cart = unserialize(serialize($_SESSION['cart']));
					$s = 0;
					$index = 0;
					for($i=0;$i<count($cart);$i++)
					{
						$s +=$cart[$i]->price * $cart[$i]->quantity;
						$index = $i;
						?>
						<tr>
							<td><?php echo $cart[$i]->prod_id; ?></td>
							<td><img src="admin/mobileimage/<?php echo $cart[$i]->image; ?>" alt="" title="" width="70" height="100" border="0" class="cart_thumb" /></td>
							<td><?php echo $cart[$i]->prod_name; ?></td>
							<td>Rs.<?php echo $cart[$i]->price; ?></td>
							<td><input type="text" value="<?php echo $cart[$i]->quantity; ?>"style="width:30px" name="quantity[]"/></td>
							<td class="cart_total_price">Rs.<?php echo $cart[$i]->price * $cart[$i]->quantity; ?></td>
							<td class="cart_delete"><a class="cart_quantity_delete" href="cart.php?index=<?php echo $index; ?>" ><i class="fa fa-times"></i></a>
					</td>               
						</tr>
					<?php	
						$index++;
					}
					?>
					
					<tr>
						<td colspan="4" align="right" style="color:blue"><b>NOTE:-</b>If You Can Change Quantity After Press Update..</td>
						<td><input type="image" src="images/home/green-update-button-md.png" width="40" height="30" ><input type="hidden" name="update"></td>
					</tr>
					<tr>
						<td colspan="5" align="right" class="cart_total_price">Total:-</td>
						<td class="cart_total_price">Rs.<?php echo $s; ?></td>
					</tr>
					<tr>
						<td>
							<a href="index.php" class="btn btn-default check_out">Continue Shopping</a>
						</td>
						<?php
				
										if ($_SESSION['id'] == "")
										{
											echo "<td colspan='5' align='right'><a href='login.php' class='btn btn-default check_out'>Checkout</a></td>";
										}
										else
										{
											echo "<td colspan='5' align='right'><a href='checkout.php' class='btn btn-default check_out'>Checkout</a></td>";
										}
						?>
					</tr>
						
				</table>
				</form>
			
			</div>
		</div>
	</section> <!--/#cart_items-->
	
	
	
	
	

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>