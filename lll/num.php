
<?php 

$num="";
$nam="";
if($_SERVER['REQUEST_METHOD']=="POST"){
	$nam=test_input($_POST['name']);
	$num=test_input($_POST['mobile']);
}
function test_input($data){
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}
$con=mysqli_connect('localhost','root','','amk') or die("Connection refused");
if(empty($nam)||empty($num)){
	echo"<script> alert('Please enter the required details')</script>";
	
}
else{
	$a="INSERT INTO balaji(Name,Number)values('$nam','$num')";
	$z=mysqli_query($con,$a);
	if($z){
		echo "<script>alert('successfully added')</script>";

	}
	else{
		echo "something went wrong";
	}

}
require_once"index.php";
?>
