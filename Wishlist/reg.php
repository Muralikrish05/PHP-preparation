<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="reg1.css">
</head>
<body>

<?php
$fname = $lname = $email = $password=$_SESSION['success'] = "";
$errors = array(); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$fname=test_input($_POST["fname"]);
	$lname=test_input($_POST["lname"]);
	$email=test_input($_POST["email"]);
	$password=test_input($_POST["password"]);
	# code...
}
function test_input($data){
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}
$db= mysqli_connect('localhost','root','','amk') or die ("Database not connected");
if (isset($_POST['reg_user'])){
	/*$fname = mysqli_real_escape_string($db, $_POST['fname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);*/
	if(empty($fname)){
		array_push($errors,"First name is required");
	}
	if(empty($email)){
		array_push($errors,"Email is required");
	}
	if(empty($password)){
		array_push($errors,"Password is required");
	}
	if ((count($errors)==0){
		$password=md5($password);
		$sql="INSERT INTO registration (firstname, lastname, email, password) VALUES('".$fname."','".$lname."','".$email."','".$password."')";
		mysqli_query($db,$sql);
		$_SESSION['username']=$email;
		$_SESSION['success']="You have logged in";
		header('location: index.php');
	}
}
if(isset($_POST['login_user'])){
	$email=mysqli_real_escape_string($db,$_POST['email']);
	$password=mysqli_real_escape_string($db,$_POST['password']);
	if(empty($email)){
		array_push($errors,"Email is re required");
	}
	if(empty($password)){
		array_push($errors,"Password is reqiured");
	}
	if(count($errors)==0){
		$password=md5($password);
		$query="SELECT * FROM users WHERE username=
                '$username' AND password='$password'";
        $results=mysqli($db,$query);
        if (mysqli_num_rows($results)==1){
        	$_SESSION['username']=$email;
        	$_SESSION['success']="You have logged in "
        	header('location:index.php');
        }
        else{
        	array_push($errors,"username or password incorrect")
        }
	}

}






	
?>
</body>
</html>