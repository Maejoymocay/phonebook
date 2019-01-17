<?php
	session_start();
	$Username = $_POST["Username"];
    $Email = $_POST['Email'];
    $Password =  $_POST['Password'];
	
	if(!empty($Username) && !empty($Email) && !empty($Password)) {
		$host = "localhost";
		$dbUsername = "root";
		$dbPassword = "";
		$dbname = "registration";
		
		// create connection
		$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
		if (mysqli_connect_error()) {
			die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
		}else {
			$SELECT = "SELECT Username From login Where Username = ? Limit 1";
			$INSERT = "INSERT Into login (Username, Email, Password) values(?, ?, ?)";
			
			//prepare statement
			$stmt = $conn->prepare($SELECT);
			$stmt->bind_param("s", $Username);
			$stmt->execute();
			$stmt->bind_result($Username);
			$stmt->store_result();
			$rnum = $stmt->num_rows;
			
			if ($rnum==0) {
				$stmt->close();
				
				$stmt = $conn->prepare($INSERT);
				$stmt->bind_param("sss", $Username, $Email, $Password);
				$stmt->execute();
				$_SESSION['message'] = "You are now logged in";
				$_SESSION['Username'] = $Username;
				header("location: login.php");
			}
        else {
				echo "<script>alert('Someone already register this username') </script>";
				
			}
			$stmt->close();
			$conn->close();
		}
    }else {
		echo "All field are required";
		die();
	}

?>