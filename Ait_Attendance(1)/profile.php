<?php

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title> Login Staff</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css\font-awesome.min.css">
</head>
<body>
<h1 style="text-align:center">STAFF ATTENDANCE SYSTEM</h1>
	<div class="container">
	<img src="profile.png"/>
		<form action="logincheck.php" method="POST">
		    <div class="form-input">
				<input type="text" name="email" placeholder="Enter Your Email Id"/>	
			</div>
			<div class="form-input">
				<input type="password" name="pass" placeholder="Enter the Password"/>
			</div>
			<input type="submit" name="submit" value="SUBMIT" class="btn-login"/>
		</form>
	</div>
</body>
</html>