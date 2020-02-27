<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "car_test_drive";
	
	$conn = new mysqli($host, $user, $pass, $db);
	if($conn->connect_error){
		echo "Failed:" . $conn->connect_error;
	}
?>
