<?php
    require('edit1.php');
    $id = $_REQUEST['id'];
    $query="select * from data where id ='$id' limit 1";
    $result= mysqli_query($con,$query) or die (mysqli_error());
    
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
	 <style>
    body  {
        background-image: url("img4.jpg");
        background-size: cover;
   
}
</style>

</head>
<body>
		<div class="container">
     <header class="jumbotron my-4">
        <h1 class="display-3">Phonebook</h1>
        <p class="lead">With My Contacts you will always have a secure backup of your contact list -<br> priceless if you lose or switch your phone!</p>
      </header>
	 </div>
	<div class ="container">
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="home.php" role="tab" aria-controls="home" aria-selected="true"><font face="forte"><h2>Home</h2></font></a>
  </li>
  <li class="nav-item">
    <a class="nav-link " id="profile-tab" data-toggle="tab" href="add.php" role="tab" aria-controls="profile" aria-selected="true"><font face="forte"><h2>Add Contacts</h2></font></a>
  </li>
  <li class="nav-item">
    <a class="nav-link " id="contact-tab" data-toggle="tab" href="view.php" role="tab" aria-controls="contact" aria-selected="true"><font face="forte"><h2>	View Contacts</h2></font></a>
  </li>
   <li>
     <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	</form>
  </li> 
</ul>  
    </div>
<br>

<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">.</div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">.</div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">.</div>
</div>
<center>
<div class="container">
	  <?php while($row = mysqli_fetch_array($result)):?>
		<?php $_SESSION['update']= $row['id']; ?>	
        <form method="post" action="edit.php?id=<?php echo $row['id'];?>">
				               <td><b>Name:</b><br/><input type="text" value=<?php echo $row['name'];?> name="name" ></td><br/>
					<td><b>Number:</b><br/><input type="text" value=<?php echo $row['number'];?> name="number" required></td><br/>

	
<br>
<div class="container">
 <button class="btn btn-info" href="" type="submit">Update</button>
<a href="view.php"><button type="submit"class="btn btn-info" >Back</button></a>

</div>
</form>
   <?php endwhile;?>  
</div>
</center>

</body>

</html>