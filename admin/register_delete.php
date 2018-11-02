<?php
	include("connection.php");
	$id=$_GET['id'];
	mysql_query("delete from tbl_register where cust_id = $id");
	
	header("location:register_detail.php");
?>