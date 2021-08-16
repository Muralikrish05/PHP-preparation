<?php 
  
session_start();
   
$fname = "";
$lname="";
$email    = "";
$errors = array(); 
$_SESSION['success'] = "";
   
$db = mysqli_connect('localhost', 'root', '', 'amk');
   
if (isset($_POST['reg_user'])) {
   
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    
   
    
    if (empty($fname)) { array_push($errors, "Firstname is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password)) { array_push($errors, "Password is required"); }
    if (empty($lname)){ array_push($errors,"Lastname is required");}
   
    
    
   
    
    if (count($errors) == 0) {
          
        
        $password = md5($password);
          
        
        $query = "INSERT INTO registration (firstname,lastname,email, password) 
                  VALUES('$fname','$lname', '$email', '$password')"; 
          
        mysqli_query($db, $query);
   
        $_SESSION['username'] = $email;
          
        // Welcome message
        $_SESSION['success'] = "You have logged in";
          
        // Page on which the user will be 
        // redirected after logging in
        header('location: index.php'); 
    }
}
   

if (isset($_POST['login_user'])) {
      
    
    $username = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
   
    // Error message if the input field is left blank
    if (empty($username)) {array_push($errors, "Email is required");}
    if (empty($password)) {array_push($errors, "Password is required");}
   
    // Checking for the errors
    if (count($errors) == 0) {
          
        // Password matching
        $password = md5($password);
          
        $query = "SELECT * FROM registration WHERE email='$username' AND password='$password' ";
        //$x=mysqli_query("SELECT firstname FROM registration WHERE email='$username' AND password='$password'" );
        $results = mysqli_query($db, $query);
        echo mysqli_num_rows($results);
   
        if (mysqli_num_rows($results) == 1) {
              
            // Storing username in session variable
            $_SESSION['username'] = $username;
            //echo"IAM WORKING";
              
            // Welcome message
            $_SESSION['success'] = "<b>You have logged in!</b><br><br><br>";
              
            // Page on which the user is sent
            // to after logging in
            header('location: index.php');
        }
        else {
              
            // If the username and password doesn't match
            array_push($errors, "Username or password incorrect"); 
        }
    }
}
 
?>