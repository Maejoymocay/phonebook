<?php
include_once("edit1.php");
	$id = $_REQUEST['id'];	
	$name = $_POST['name'];
	$number = $_POST['number'];
	$query="UPDATE `data` SET `name`=?,`number`=? WHERE id=?";
    $stmt=$con->prepare($query);
    $stmt->bind_param("sss", $name, $number,$id);
    $stmt->execute();
	
		
		header("Location: view.php");

?>
