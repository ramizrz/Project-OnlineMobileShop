<?php
	include("connection.php");
	$id=$_GET['id'];
	mysql_query("delete from tbl_company where com_id = $id");
	
	header("location:comp_detail.php");
?>