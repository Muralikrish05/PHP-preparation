<?php 
  
session_start();
$bb='';   
$fname = "";
$lname="";
$id="";
$num="";
$pass="";
$email    = "";
$errors = array(); 
$_SESSION['success'] = "";
   
$db = mysqli_connect('localhost', 'root', '', 'amk');
   
if (isset($_POST['reg_user'])) {
   
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $num=mysqli_real_escape_string($db, $_POST['number']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $pass=mysqli_real_escape_string($db, $_POST['password2']);
    $id = substr($fname,0,3)."@".substr($num,-3).rand(10,99);

   
    
    if (empty($fname)) { array_push($errors, "Firstname is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password)) { array_push($errors, "Password is required"); }
    if (empty($lname)){ array_push($errors,"Lastname is required");}
    if (empty($num)){array_push($errors,"Number is required");}
    if (empty($pass)){array_push($errors,"Conform password is required");}
    if(strlen($num)>10){array_push($errors,"Number must be 10 digits");}
    if(strlen($num)<10){array_push($errors,"Number must be 10 digits");}
    //if(str_contains($email,'@')){array_push($errors,"enter proper email address");}
   
    
    
   
    
    if (count($errors) == 0) {
          
        if ($password==$pass){
            $password = md5($password);
              
            
            $query = "INSERT INTO registration (UserId,firstname,lastname,Number,email, password) 
                      VALUES('$id','$fname','$lname','$num', '$email', '$password')"; 
              
            mysqli_query($db, $query);
            //echo"YOUR IS IS $id";
       
            $_SESSION['username'] = $id;
              
            // Welcome message
            $_SESSION['success'] = "You have logged in";
              
            // Page on which the user will be 
            // redirected after logging in
            header('location: index.php'); 
        }
        else{
           echo" <script>alert('Password does not match')</script>";
           require_once("Registration.php");
        }
    }
}
   

if (isset($_POST['login_user'])) {
      
    
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
   
    // Error message if the input field is left blank
    if (empty($id)) {array_push($errors, "Email is required");}
    if (empty($password)) {array_push($errors, "Password is required");}
   
    // Checking for the errors
    if (count($errors) == 0) {
          
        // Password matching
        $password = md5($password);
          
        $query = "SELECT * FROM registration WHERE UserID ='$id' AND password ='$password' ";
        //$x=mysqli_query("SELECT firstname FROM registration WHERE email='$username' AND password='$password'" );
        $results = mysqli_query($db, $query);
        //echo mysqli_num_rows($results);
        //echo $id;
        //echo $password;
   
        if (mysqli_num_rows($results) == 1) {
              
            // Storing username in session variable
            $_SESSION['username'] = $id;
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
if (isset($_POST['Laptop'])){  

    $bb= $_SESSION['username'];
    $srq="SELECT * FROM `wishlist` WHERE Userid='$bb' AND Productname='Laptop'";
    $res =mysqli_query($db,$srq);
    if($res){
        $abc=mysqli_num_rows($res);
        //echo"hellooooo";
        if ($abc==1){
           
            //echo"Iam WORKING";
            $sr="SELECT * FROM wishlist WHERE Userid='$bb' AND Productname='Laptop' AND Status='ACTIVE'";
            $resultt=mysqli_query($db,$sr);
            $xh=mysqli_num_rows($resultt);
            if ($xh==1){
                
                $mm=" UPDATE `wishlist` SET`Status`='INACTIVE'WHERE Userid='$bb' AND Productname='Laptop' ";
                $XX=mysqli_query($db,$mm);
                if($XX){
                    echo'<script>alert("Removed Successfully")</script>';
                    require_once("products.php");
                }
            }

            else{
                $mm=" UPDATE `wishlist` SET`Status`='ACTIVE'WHERE Userid='$bb' AND Productname='Laptop' ";
                $lp=mysqli_query($db,$mm);
                if($lp){
                    echo'<script>alert("Added Successfully")</script>';
                    require_once("products.php"); 
                }

            }
            

        }
        else{
            $qry="INSERT INTO `wishlist`( `Userid`, `Productname`,`Status`) VALUES ('$bb','Laptop','ACTIVE')";
            $cc=mysqli_query($db,$qry); 
            if($cc){
                echo'<script>alert("Added Successfully")</script>';
                require_once("products.php"); 
            }
        }
    }
    else{
        echo"Something wrong";
    }
}
if (isset($_POST['Mobile'])){  

    $bb= $_SESSION['username'];
    $srq="SELECT * FROM `wishlist` WHERE Userid='$bb' AND Productname='Mobile'";
    $res =mysqli_query($db,$srq);
    if($res){
        $abc=mysqli_num_rows($res);
        //echo"hellooooo";
        if ($abc==1){
           
            //echo"Iam WORKING";
            $sr="SELECT * FROM wishlist WHERE Userid='$bb' AND Productname='Mobile' AND Status='ACTIVE'";
            $resultt=mysqli_query($db,$sr);
            $xh=mysqli_num_rows($resultt);
            if ($xh==1){
                
                $mm=" UPDATE `wishlist` SET`Status`='INACTIVE'WHERE Userid='$bb' AND Productname='Mobile' ";
                $XX=mysqli_query($db,$mm);
                if($XX){
                    echo'<script>alert("Removed Successfully")</script>';
                    require_once("products.php");
                }
            }

            else{
                $mm=" UPDATE `wishlist` SET`Status`='ACTIVE'WHERE Userid='$bb' AND Productname='Mobile' ";
                $lp=mysqli_query($db,$mm);
                if($lp){
                    echo'<script>alert("Added Successfully")</script>';
                    require_once("products.php"); 
                }

            }
            

        }
        else{
            $qry="INSERT INTO `wishlist`( `Userid`, `Productname`,`Status`) VALUES ('$bb','Mobile','ACTIVE')";
            $cc=mysqli_query($db,$qry); 
            if($cc){
                echo'<script>alert("Added Successfully")</script>';
                require_once("products.php"); 
            }
        }
    }
    else{
        echo"Something wrong";
    }
}
if (isset($_POST['Bluetooth'])){  

    $bb= $_SESSION['username'];
    $srq="SELECT * FROM `wishlist` WHERE Userid='$bb' AND Productname='Bluetooth'";
    $res =mysqli_query($db,$srq);
    if($res){
        $abc=mysqli_num_rows($res);
        //echo"hellooooo";
        if ($abc==1){
           
            //echo"Iam WORKING";
            $sr="SELECT * FROM wishlist WHERE Userid='$bb' AND Productname='Bluetooth' AND Status='ACTIVE'";
            $resultt=mysqli_query($db,$sr);
            $xh=mysqli_num_rows($resultt);
            if ($xh==1){
                
                $mm=" UPDATE `wishlist` SET`Status`='INACTIVE'WHERE Userid='$bb' AND Productname='Bluetooth' ";
                $XX=mysqli_query($db,$mm);
                if($XX){
                    echo'<script>alert("Removed Successfully")</script>';
                    require_once("products.php");
                }
            }

            else{
                $mm=" UPDATE `wishlist` SET`Status`='ACTIVE'WHERE Userid='$bb' AND Productname='Bluetooth' ";
                $lp=mysqli_query($db,$mm);
                if($lp){
                    echo'<script>alert("Added Successfully")</script>';
                    require_once("products.php"); 
                }

            }
            

        }
        else{
            $qry="INSERT INTO `wishlist`( `Userid`, `Productname`,`Status`) VALUES ('$bb','Bluetooth','ACTIVE')";
            $cc=mysqli_query($db,$qry); 
            if($cc){
                echo'<script>alert("Added Successfully")</script>';
                require_once("products.php"); 
            }
        }
    }
    else{
        echo"Something wrong";
    }
}
if (isset($_POST['Headset'])){  

    $bb= $_SESSION['username'];
    $srq="SELECT * FROM `wishlist` WHERE Userid='$bb' AND Productname='Headset'";
    $res =mysqli_query($db,$srq);
    if($res){
        $abc=mysqli_num_rows($res);
        //echo"hellooooo";
        if ($abc==1){
           
            //echo"Iam WORKING";
            $sr="SELECT * FROM wishlist WHERE Userid='$bb' AND Productname='Headset' AND Status='ACTIVE'";
            $resultt=mysqli_query($db,$sr);
            $xh=mysqli_num_rows($resultt);
            if ($xh==1){
                
                $mm=" UPDATE `wishlist` SET`Status`='INACTIVE'WHERE Userid='$bb' AND Productname='Headset' ";
                $XX=mysqli_query($db,$mm);
                if($XX){
                    echo'<script>alert("Removed Successfully")</script>';
                    require_once("products.php");
                }
            }

            else{
                $mm=" UPDATE `wishlist` SET`Status`='ACTIVE'WHERE Userid='$bb' AND Productname='Headset' ";
                $lp=mysqli_query($db,$mm);
                if($lp){
                    echo'<script>alert("Added Successfully")</script>';
                    require_once("products.php"); 
                }

            }
            

        }
        else{
            $qry="INSERT INTO `wishlist`( `Userid`, `Productname`,`Status`) VALUES ('$bb','Headset','ACTIVE')";
            $cc=mysqli_query($db,$qry); 
            if($cc){
                echo'<script>alert("Added Successfully")</script>';
                require_once("products.php"); 
            }
        }
    }
    else{
        echo"Something wrong";
    }
}
if (isset($_POST['Adaptor'])){  

    $bb= $_SESSION['username'];
    $srq="SELECT * FROM `wishlist` WHERE Userid='$bb' AND Productname='Adaptor'";
    $res =mysqli_query($db,$srq);
    if($res){
        $abc=mysqli_num_rows($res);
        //echo"hellooooo";
        if ($abc==1){
           
            //echo"Iam WORKING";
            $sr="SELECT * FROM wishlist WHERE Userid='$bb' AND Productname='Adaptor' AND Status='ACTIVE'";
            $resultt=mysqli_query($db,$sr);
            $xh=mysqli_num_rows($resultt);
            if ($xh==1){
                
                $mm=" UPDATE `wishlist` SET`Status`='INACTIVE'WHERE Userid='$bb' AND Productname='Adaptor' ";
                $XX=mysqli_query($db,$mm);
                if($XX){
                    echo'<script>alert("Removed Successfully")</script>';
                    require_once("products.php");
                }
            }

            else{
                $mm=" UPDATE `wishlist` SET`Status`='ACTIVE'WHERE Userid='$bb' AND Productname='Adaptor' ";
                $lp=mysqli_query($db,$mm);
                if($lp){
                    echo'<script>alert("Added Successfully")</script>';
                    require_once("products.php"); 
                }

            }
            

        }
        else{
            $qry="INSERT INTO `wishlist`( `Userid`, `Productname`,`Status`) VALUES ('$bb','Adaptor','ACTIVE')";
            $cc=mysqli_query($db,$qry); 
            if($cc){
                echo'<script>alert("Added Successfully")</script>';
                require_once("products.php"); 
            }
        }
    }
    else{
        echo"Something wrong";
    }
}
if (isset($_POST['Charger'])){  

    $bb= $_SESSION['username'];
    $srq="SELECT * FROM `wishlist` WHERE Userid='$bb' AND Productname='Charger'";
    $res =mysqli_query($db,$srq);
    if($res){
        $abc=mysqli_num_rows($res);
        //echo"hellooooo";
        if ($abc==1){
           
            //echo"Iam WORKING";
            $sr="SELECT * FROM wishlist WHERE Userid='$bb' AND Productname='Charger' AND Status='ACTIVE'";
            $resultt=mysqli_query($db,$sr);
            $xh=mysqli_num_rows($resultt);
            if ($xh==1){
                
                $mm=" UPDATE `wishlist` SET`Status`='INACTIVE'WHERE Userid='$bb' AND Productname='Charger' ";
                $XX=mysqli_query($db,$mm);
                if($XX){
                    echo'<script>alert("Removed Successfully")</script>';
                    require_once("products.php");
                }
            }

            else{
                $mm=" UPDATE `wishlist` SET`Status`='ACTIVE'WHERE Userid='$bb' AND Productname='Charger' ";
                $lp=mysqli_query($db,$mm);
                if($lp){
                    echo'<script>alert("Added Successfully")</script>';
                    require_once("products.php"); 
                }

            }
            

        }
        else{
            $qry="INSERT INTO `wishlist`( `Userid`, `Productname`,`Status`) VALUES ('$bb','Charger','ACTIVE')";
            $cc=mysqli_query($db,$qry); 
            if($cc){
                echo'<script>alert("Added Successfully")</script>';
                require_once("products.php"); 
            }
        }
    }
    else{
        echo"Something wrong";
    }
}
if (isset($_POST['Desktop'])){  

    $bb= $_SESSION['username'];
    $srq="SELECT * FROM `wishlist` WHERE Userid='$bb' AND Productname='Desktop'";
    $res =mysqli_query($db,$srq);
    if($res){
        $abc=mysqli_num_rows($res);
        //echo"hellooooo";
        if ($abc==1){
           
            //echo"Iam WORKING";
            $sr="SELECT * FROM wishlist WHERE Userid='$bb' AND Productname='Desktop' AND Status='ACTIVE'";
            $resultt=mysqli_query($db,$sr);
            $xh=mysqli_num_rows($resultt);
            if ($xh==1){
                
                $mm=" UPDATE `wishlist` SET`Status`='INACTIVE'WHERE Userid='$bb' AND Productname='Desktop' ";
                $XX=mysqli_query($db,$mm);
                if($XX){
                    echo'<script>alert("Removed Successfully")</script>';
                    require_once("products.php");
                }
            }

            else{
                $mm=" UPDATE `wishlist` SET`Status`='ACTIVE'WHERE Userid='$bb' AND Productname='Desktop' ";
                $lp=mysqli_query($db,$mm);
                if($lp){
                    echo'<script>alert("Added Successfully")</script>';
                    require_once("products.php"); 
                }

            }
            

        }
        else{
            $qry="INSERT INTO `wishlist`( `Userid`, `Productname`,`Status`) VALUES ('$bb','Desktop','ACTIVE')";
            $cc=mysqli_query($db,$qry); 
            if($cc){
                echo'<script>alert("Added Successfully")</script>';
                require_once("products.php"); 
            }
        }
    }
    else{
        echo"Something wrong";
    }
}
if (isset($_POST['Radio'])){  

    $bb= $_SESSION['username'];
    $srq="SELECT * FROM `wishlist` WHERE Userid='$bb' AND Productname='Radio'";
    $res =mysqli_query($db,$srq);
    if($res){
        $abc=mysqli_num_rows($res);
        //echo"hellooooo";
        if ($abc==1){
           
            //echo"Iam WORKING";
            $sr="SELECT * FROM wishlist WHERE Userid='$bb' AND Productname='Radio' AND Status='ACTIVE'";
            $resultt=mysqli_query($db,$sr);
            $xh=mysqli_num_rows($resultt);
            if ($xh==1){
                
                $mm=" UPDATE `wishlist` SET`Status`='INACTIVE'WHERE Userid='$bb' AND Productname='Radio' ";
                $XX=mysqli_query($db,$mm);
                if($XX){
                    echo'<script>alert("Removed Successfully")</script>';
                    require_once("products.php");
                }
            }

            else{
                $mm=" UPDATE `wishlist` SET`Status`='ACTIVE'WHERE Userid='$bb' AND Productname='Radio' ";
                $lp=mysqli_query($db,$mm);
                if($lp){
                    echo'<script>alert("Added Successfully")</script>';
                    require_once("products.php"); 
                }

            }
            

        }
        else{
            $qry="INSERT INTO `wishlist`( `Userid`, `Productname`,`Status`) VALUES ('$bb','Radio','ACTIVE')";
            $cc=mysqli_query($db,$qry); 
            if($cc){
                echo'<script>alert("Added Successfully")</script>';
                require_once("products.php"); 
            }
        }
    }
    else{
        echo"Something wrong";
    }
}
if (isset($_POST['Monitor'])){  

    $bb= $_SESSION['username'];
    $srq="SELECT * FROM `wishlist` WHERE Userid='$bb' AND Productname='Monitor'";
    $res =mysqli_query($db,$srq);
    if($res){
        $abc=mysqli_num_rows($res);
        //echo"hellooooo";
        if ($abc==1){
           
            //echo"Iam WORKING";
            $sr="SELECT * FROM wishlist WHERE Userid='$bb' AND Productname='Monitor' AND Status='ACTIVE'";
            $resultt=mysqli_query($db,$sr);
            $xh=mysqli_num_rows($resultt);
            if ($xh==1){
                
                $mm=" UPDATE `wishlist` SET`Status`='INACTIVE'WHERE Userid='$bb' AND Productname='Monitor' ";
                $XX=mysqli_query($db,$mm);
                if($XX){
                    echo'<script>alert("Removed Successfully")</script>';
                    require_once("products.php");
                }
            }

            else{
                $mm=" UPDATE `wishlist` SET`Status`='ACTIVE'WHERE Userid='$bb' AND Productname='Monitor' ";
                $lp=mysqli_query($db,$mm);
                if($lp){
                    echo'<script>alert("Added Successfully")</script>';
                    require_once("products.php"); 
                }

            }
            

        }
        else{
            $qry="INSERT INTO `wishlist`( `Userid`, `Productname`,`Status`) VALUES ('$bb','Monitor','ACTIVE')";
            $cc=mysqli_query($db,$qry); 
            if($cc){
                echo'<script>alert("Added Successfully")</script>';
                require_once("products.php"); 
            }
        }
    }
    else{
        echo"Something wrong";
    }
}
if (isset($_POST['Mouse'])){  

    $bb= $_SESSION['username'];
    $srq="SELECT * FROM `wishlist` WHERE Userid='$bb' AND Productname='Mouse'";
    $res =mysqli_query($db,$srq);
    if($res){
        $abc=mysqli_num_rows($res);
        //echo"hellooooo";
        if ($abc==1){
           
            //echo"Iam WORKING";
            $sr="SELECT * FROM wishlist WHERE Userid='$bb' AND Productname='Mouse' AND Status='ACTIVE'";
            $resultt=mysqli_query($db,$sr);
            $xh=mysqli_num_rows($resultt);
            if ($xh==1){
                
                $mm=" UPDATE `wishlist` SET`Status`='INACTIVE'WHERE Userid='$bb' AND Productname='Mouse' ";
                $XX=mysqli_query($db,$mm);
                if($XX){
                    echo'<script>alert("Removed Successfully")</script>';
                    require_once("products.php");
                }
            }

            else{
                $mm=" UPDATE `wishlist` SET`Status`='ACTIVE'WHERE Userid='$bb' AND Productname='Mouse' ";
                $lp=mysqli_query($db,$mm);
                if($lp){
                    echo'<script>alert("Added Successfully")</script>';
                    require_once("products.php"); 
                }

            }
            

        }
        else{
            $qry="INSERT INTO `wishlist`( `Userid`, `Productname`,`Status`) VALUES ('$bb','Mouse','ACTIVE')";
            $cc=mysqli_query($db,$qry); 
            if($cc){
                echo'<script>alert("Added Successfully")</script>';
                require_once("products.php"); 
            }
        }
    }
    else{
        echo"Something wrong";
    }
}



    

 
?>