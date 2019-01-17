
<?php
    include('proccess.php'); // Includes Login Script
    
    if(isset($_SESSION['login_user'])){
    header("location: home.php"); // Redirecting To Profile Page
}
?> 

<!DOCTYPE html>
 <html>
 <head>
    <title> User registration system using PHP and MYsql</title>
    <link rel="stylesheet" type ="text/css" href="style.css">
    <style>
    body  {
        background-image: url("profileBG.jpg");
        background-size: cover;
   
}
</style>
    </head>
    <body>
         <div class="header">
             <h2>login</h2>
        </div>

	   <form method="post" action="">
	   <div class="input-group">
           <label>Username</label>
         <input type="text" name="Username" required>
        </div>
           
	 <div class="input-group">
	   <label>Password</label>
	   <input type="Password" name="Password" required>
	</div>
        <div class="input-group">
        <button type="submit" name="submit"    class="btn">login</button>
	</div>
        <p>
    not yet member? <a href="register.php">let me in</a>
         </p>

	</form>
         
</body>
</html>	