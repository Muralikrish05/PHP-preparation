<?php
session_start();
if(!isset($_SESSION['username'])){
	$_SESSION["msg"]="You have to login first";
	header('location:Login.php');
}
if(isset($_GET['logout'])){
	session_destroy();
	unset($_SESSION["username"]);
	header('location: Login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>USER DETAILS</title>
	<link rel="stylesheet" type="text/css" href="reg.css">  
                    
</head>
<body>
	<h2>USER DETAILS</h2>
		<h3>
			<?php
			if(isset($_SESSION['success'])) {
	         	echo $_SESSION['success']; 
	         	unset($_SESSION['success']);
	         }
			?>
		</h3>	
	<?php if (isset($_SESSION['username'])):?>
				<?php echo"HELLO ".$_SESSION['username'].".<br>"; ?>
				<?php echo"WELCOME BACK TO YOUR PURCHASE<br><br>"; ?>
				<?php  include("products.php");//check whether we use header('location:products.php') what will happens ?>


	
	 
	 	
	 <?php endif ?>
	 
</body>
</html>


