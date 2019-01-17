<?php
  // connect to the data base
     $username ="";
     $email ="";
     $errors = array();

    $db = mysqli_connect('localhost','root','','mengjoy');
 
    if (isset ($_POST['register'])) {
        $username = mysqli_real_escape_string($_POST['username']);
        $email = mysqli_real_escape_string($_POST['email']);
        $password_1 = mysqli_real_escape_string($_POST['password_1']);
        $password_2 = mysqli_real_escape_string($_POST['password_2']);
        
       
        if (empty($username)) {
            array_push($errors, "Username is required"); 
            
        }
        if (empty($email)) {
            array_push($errors, "Email is required"); 
        }
        if (empty($password_1)) {
            array_push($errors, "Password is required"); 
        }
       if ($password_1 != $password_2){
           array_push($errors, "the two password do not much");
        }
            if (count($errors) ==0) {
            $password = md5($password_1); 
            $sql = "INSERT INTO users (username,email,password)
                     VALUES ('$username','$email','$password')";
                
                
             mysqli_query($db, $sql);
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "welcome you are now logged in";
             header('location: index.php');
                
            }else{
                array_push ($errors, "wrong username/ password combination");
        }
    
        }
?>