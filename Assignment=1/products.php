
<!DOCTYPE html>
<html>
<head>
	<title>BUY PRODUCTS HERE</title>
	<link rel="stylesheet" type="text/css" href="reg.css">
</head>
<body>
	<h2>BUY PRODUCTS HERE</h2>
	<form action="server.php" method="post">
		1) Laptop <input type='checkbox' name='items[]'   value='Laptop'><br><br>
		2) Mobile <input type='checkbox' name='items[]'   value='Mobile'><br><br>
		3) Bluetooth <input type='checkbox' name='items[]'   value='Bluetooth'><br><br>
		4) Headset <input type='checkbox' name='items[]'   value='Headset'><br><br>
		5) Adaptor <input type='checkbox' name='items[]'   value='Adaptor'><br><br>
		6) Charger <input type='checkbox' name='items[]'   value='Charger'><br><br>
		7) Desktop <input type='checkbox' name='items[]'   value='Desktop'><br><br>
		8) Radio <input type='checkbox' name='items[]'   value='Radio'><br><br>
		9) Monitor <input type='checkbox' name='items[]'   value='Monitor'><br><br>
		10) Mouse <input type='checkbox' name='items[]'   value='Mouse'><br><br>
		<input type='submit' name='btn' value='ADD to CART'>
	</form>
	<a href="index.php?logout='1'">Click here to Logout</a>
	<a href="wishlist.php">WISHLIST</a>
</body>
</html>
