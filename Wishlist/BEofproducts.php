<?php include('server.php');
$id=$_SESSION['username'];
echo $id;
echo"<br>";

$db=mysqli_connect('localhost','root','','amk') or die("Connection refused");
if($_SERVER['REQUEST_METHOD']=='POST'){
	$items=$_POST['items'];
	foreach ($items as $item) {
		echo $id.$item;
		$qry="INSERT INTO 'projectofproduct'WHERE Userid = '$id' AND Productname = '$item' ";
		$res=mysqli_query($db,$qry);
	}
	if($res){
		echo"Products added successfully";
		header("location.index.php");
	}
	else{
		echo "SORRY!!!<br>";
		header("location.index.php");
	}
}
?>