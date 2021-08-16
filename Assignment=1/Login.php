<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="reg.css">
</head>
<body>
	<form action="Login.php" method="post">
		<?php include('errors.php'); ?> 
		E-mail:<input type="text" id='hi' name="email"><br><br>
		Password:<input type="password" id='hii' name="password"><br><br>
		<input type="Submit" id="btn" name="login_user"></form>
		<div>
		For new registration:<a href="Registration.php">Click here</a>	
		</div>
</body>
</html>




