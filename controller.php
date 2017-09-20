<?php
 	require("db.php");

 	/*check if the input is valid*/
 	if(!$_POST['username'])
 		echo "Username is required !";
 	else if(strlen($_POST['username'])<7)
 		echo "Username should be longer than 6 English characters !";
 	else if(!$_POST['password'])
 		echo  "Password is required !";
 	else if(strlen($_POST['password'])<8)
 		echo "Password should be longer than 7 English characters !";
 	else if(!$_POST['email'])
 		echo "Email is required !";
 	else if(!preg_match("/@/i", $_POST['email']) || !preg_match("/.com/i", $_POST['email']) || strlen( $_POST['email'])<7)
 		echo "Invalid email-type";

 	/*存進資料庫*/

?>