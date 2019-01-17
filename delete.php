<?php
	require('del.php');
	$id = $_REQUEST['id'];
	$query = "DELETE FROM `data` WHERE id='$id'";
	$result = mysqli_query($con,$query) or die (mysqli_error());
	header("location: view.php");
?>