<!DOCTYPE html>
<html>
<head>
      <title> phonebook </title>
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
             <h2>Register</h2>
        </div>
        
        
        	<div class="container text-center">  
   <form method="post" action="connection.php"  >
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="Username" id="Username" required>
         </div>                
          <div class="input-group">
                <label>Email</label>
                <input type="email" name="Email" id="Email" required>
        </div>
        <div class="input-group">
                <label>Password</label>
                <input type="password" name="Password" id="Password" required>
        </div>        
        <div class="input group">
            <button type="submit" name="submit" class="btn">Register</button>
          </div> 
       <p>
            Already a member? <a href="login.php">log in</a>
           </p>
        </form> 
    </body>
   </html>
     