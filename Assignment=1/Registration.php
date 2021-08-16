<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<title>User Registration</title>
<link rel="Stylesheet" href="reg.css"></head>
<body>
<form action="Registration.php" method="post">
	<?php include('errors.php'); ?>
First Name : <input type="text"name="fname"><br><br>
Last Name  : <input type="text"name="lname"><br><br>
Mail-id    : <input type="text"name="email"><br><br>
Password   : <input type="password"name="password"><br><br>
<input type="Submit" id="btn" name="reg_user"><br><br><br>
</form>
Already a member?<a href='Login.php'>Click to LOGIN</a>
</body>
</html>

