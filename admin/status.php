<?php
	include('connection.php');
	session_start();
	
$ordersid = $_POST['ordersid'];
$status= $_POST['status'];


$query = "update adddeatails set order_status='$status' where ordersid='$ordersid';";
$res1 = mysql_query("$query");
echo $query;




 ?>
 