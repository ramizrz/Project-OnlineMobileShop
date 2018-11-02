<?php
	include("connection.php");
	$id=$_GET['id'];
	mysql_query("delete from tbl_feedback where feed_id = $id");
	
	header("location:feedback_detail.php");
?>