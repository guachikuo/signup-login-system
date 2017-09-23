<?php
	$servername = "localhost:3306";
	$mysql_username = "root";
	$mysql_password = "root";
	$dbname = "user";
	
	// create connection
	$conn = new mysqli($servername, $mysql_username, $mysql_password, $dbname);

	// check connection
	if(!$conn) {
		die("Connection failed: " . mysqli_connect_error());  
		exit();
	}
?>