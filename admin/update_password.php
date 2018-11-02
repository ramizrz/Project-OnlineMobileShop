<?php
	$OldPassword=$_POST['txtOldPassword'];
	$NewPassword=$_POST['txtNewPassword'];
	include('connection.php');

	$sql="update tbl_admin set admin_pswd='$NewPassword' where admin_pswd='$OldPassword'";
	
	echo $sql;
	mysql_query($sql,$con);
	echo "Password Change Successfully.";
	header("location: change_password.php?res=1&no=1");
?>