<?php
$db= mysqli_connect('localhost','root','','amk') or die("connection refused");
echo "connected successfully";
echo"<br>";
$sql = "INSERT INTO demo (name, email,number) VALUES
            ('John',  'johnrambo@mail.com','3693693693'),
            ('Clark', 'clarkkent@mail.com','1231231231'),
            ('John', 'johncarter@mail.com','1591591599'),
            ('Harry', 'harrypotter@mail.com','1235689653')";
if(mysqli_query($db, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}