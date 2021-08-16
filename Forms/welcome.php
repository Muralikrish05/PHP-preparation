<?php
// define variables and set to empty values
$name = $email = $numbe = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $numbe = test_input($_POST["number"]);
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
/*echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $number;
echo "<br>";*/
$db= mysqli_connect('localhost','root','','amk') or die("connection refused");
$sql = "INSERT INTO demo1 (name, email, number) VALUES ('".$name."', '".$email."', '".$numbe."')";
if(mysqli_query($db, $sql)){
    echo "Records added successfully.";
    } else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
?>