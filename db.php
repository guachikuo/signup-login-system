<?php
	$link = mysqli_connect("localhost:3306", "root", "ejiru8fu6", "user");

	if(mysqli_connect_errno()) {
		print_r(mysqli_connect_error());  
		echo "could not connect to database!";
		exit();
	}
?>