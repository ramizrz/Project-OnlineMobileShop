<?php 
	include('connection.php');
	
	$prod_id = $_GET['prod_id'];
	$ordersid = $_GET['ordersid'];
	$query = "delete from orderdetails  where prod_id='$prod_id' AND ordersid='$ordersid'";
	$res = mysql_query($query);
	
	header("location:account.php");
	
	
?>