<?php 
	include('connection.php');
	
	$prod_id = $_GET['prod_id'];
	$query = ("DELETE from orderdetails where prod_id='$prod_id'");
	$res = mysqli_query($con,$query);
	
	header("location:account.php");
	
	
?>