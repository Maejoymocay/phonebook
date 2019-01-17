<?php
	session_start();
	$name = $_POST['name'];
	$number = $_POST['number'];
	$username = $_SESSION['login_user'];
	echo "<script>alert('Someone already register this number') </script>";
 	if(!empty($name) && !empty($number)) {
		$host = "localhost";
		$dbUsername = "root";
		$dbPassword = "";
		$dbname = "registration";
		echo "<script>alert('Someone already register this number') </script>";
		// create connection
		$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
		if (mysqli_connect_error()) {
			echo "<script>alert('Someone already register this number') </script>";
			header("location: view.php");
			die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
			
		}else {
			$INSERT = "INSERT INTO `data`( `username`, `name`, `number`) VALUES(?, ?,?)";
		
				
				$stmt = $conn->prepare($INSERT);
				$stmt->bind_param("sss", $username,$name, $number);
				$stmt->execute();
				$_SESSION['message'] = "You are now logged in";
				$_SESSION['number'] = $number;
				header("location: view.php");
			
			
			$conn->close();
		}
	}else {
		echo "All field are required";
		die();
		header("location: view.php");
	}

?>