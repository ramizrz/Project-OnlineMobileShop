<?php
    session_start();
	if(isset($_SESSION['id']))
	{
		header("location:HomePage.php");
    }
?>
<html>
<head>
	<title>Admin | Mobileshop</title>
		<meta charset="utf-8">
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		
</head>
<body>
	 
	 <div class="main">
		<div class="login-form">
			<h1>Member Login</h1>
				<form action="check.php" name="login" method="post">
						<input type="text" name="txtUsername" class="text" value="USERNAME" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'USERNAME';}" >
						<input type="password" name="txtPassword" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
						<div class="submit">
							<input type="submit" name="login" onclick="myFunction()" value="LOGIN" >
					<p><a href="#">Forgot Password ?</a></p>
				</form>
			</div>
		</div>
</body>
</html>