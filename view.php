<?php
    if(isset($_POST['btn_search']))
	{
    $search = $_POST['search'];
		// search in all table columns
		// using concat mysql function
		$query = "SELECT * FROM `data` WHERE CONCAT(`id`, `name`, `contacts`) LIKE '%".$search."%'";
		$search_result = filterTable($query);
    
	}
	else {
		$query = "SELECT * FROM `data`";
		$search_result = filterTable($query);
	}

	// function to connect and execute the query
	function filterTable($query)
	{
		$connect = mysqli_connect("localhost", "root", "", "registration");
		$filter_Result = mysqli_query($connect, $query);
		return $filter_Result;
	}
?>
<DOCTYPE! html>
    <html>
<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
<script src="bootstrap/js/popper.min.js"></script>
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
     <form class="form-inline" action="view.php" method="post">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="btn_search">Search</button>
	</form>
  </li>  
</ul>
    </div>
<br>

<table class="table">
  <thead>
    <tr>
	  <th>ID</th>
      <th>Name</th>
      <th>Number</th>
	  <th>Action</th>
    </tr>
  </thead>
  <?php while($row = mysqli_fetch_array($search_result)):?>
  <tbody>
    <tr>
		<td><?php echo $row['id'];?></td>
		<td><?php echo $row['name'];?></td>
		<td><?php echo $row['number'];?></td>
	  
	 <td>
	
         <a href="update.php?id=<?php echo $row["id"]; ?>"><button type="submit"class="btn btn-info"  onclick="return confirm('Are you sure?');" >Edit</button></a>
<a href="delete.php?id=<?php echo $row["id"]; ?>"><button type="submit"class="btn btn-info"  onclick="return confirm('Are you sure?');" >Delete</button></a>
</td>
	 
    </tr>
	
  </tbody>
  <?php endwhile;?>
</table>

</body>

</html>