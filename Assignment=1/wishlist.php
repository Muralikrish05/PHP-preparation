<?php include("server.php");
$id=$_SESSION['username'];
$db=mysqli_connect('localhost','root','','amk') or die("Connection refused");
$qry="SELECT * FROM projectofproduct WHERE Userid='$id'";
echo"<b>USER=$id</b><br><br><br>";
$res=mysqli_query($db,$qry);
if (mysqli_num_rows($res)>0){
	while ($row=$res->fetch_assoc()) {
		echo "<br> ".$row["Productname"]."<br><br>";
		# code...
	}
}
else{

	echo "0 results";
}


?>
<!DOCTYPE html>
<html>
<body>
	<a href='products.php'>BACK</a>
</body>
</html>