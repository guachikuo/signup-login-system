<?php
 	require("db.php");

 	if($_SERVER['REQUEST_METHOD']=='POST'){
 		// Always return JSON format
 		header('Content-Type: application/json');

 		// Sign up
 		if($_POST['isSignup']==1){
	 		$username = $_POST['username'];
	 		$password = $_POST['password'];
	 		$email = strtolower($_POST['email']);
	 		$return=[];
	 		$isError = 0;

	 		//check if username or email has been already in the database
	 		$username_sql = "SELECT * FROM userdata WHERE username='$username'";
	 		$email_sql = "SELECT * FROM userdata WHERE email='$email'";
	 		$username_result = $conn->query($username_sql);
	 		$email_result = $conn->query($email_sql);
	 		
	 		// duplicate username
	 		if($username_result->num_rows>0){
	 			$return['error_msg'] = "Username has been used !";
	 			$return['active'] = 1;
	 			echo json_encode($return,JSON_PRETTY_PRINT);
	 			exit;
	 		}

	 		// duplicate email
	 		if($email_result->num_rows>0){
	 			$return['error_msg'] = "Email has been used !";
	 			$return['active'] = 1;
	 			echo json_encode($return,JSON_PRETTY_PRINT);
	 			exit;
	 		}

	 		//沒有重複 存資料
	 		$sql = "INSERT INTO userdata (username, password, email) VALUES ('$username', '$password', '$email')";
			if ($conn->query($sql) === TRUE) {
				$return['error_msg'] ="Create account successfully !";
	 			$return['active'] = 1;
	 			$return['method'] = "signup";
				$return['redirect'] = 'login.php';
			} else {
				$return['error_msg'] ="Error ! Try again later !";
	 			$return['active'] = 1;
			}

	 		echo json_encode($return,JSON_PRETTY_PRINT);

	 		$conn->close();
	 		exit();
	 	}

	 	// Log in
	 	else{
	 		$username = $_POST['username'];
	 		$password = $_POST['password'];
	 		$return=[];
	 		$isError = 0;

	 		//check if username or email has been already in the database
	 		$username_sql = "SELECT * FROM userdata WHERE username='$username'";
	 		$username_result = $conn->query($username_sql);
	 		$username_row=mysqli_fetch_assoc($username_result);
	 		// has account
	 		if($username_result->num_rows>0){
	 			
	 			//check if the password is correct
	 			if($password!=$username_row['password']){
	 				$return['error_msg'] = "Wrong password !";
	 				$return['active'] = 1;
	 				echo json_encode($return,JSON_PRETTY_PRINT);
	 				exit;
	 			}
	 			else{
	 				$return['error_msg'] = "";
	 				$return['active'] = 0;
	 				$return['method'] = "login";
	 				$return['redirect'] = "../index.html";
	 				echo json_encode($return,JSON_PRETTY_PRINT);
	 				exit;
	 			}
	 		}
	 		//cannot find the identical username
	 		else{
	 			$return['error_msg'] = "You don't have an account !";
	 			$return['active'] = 1;
	 			echo json_encode($return,JSON_PRETTY_PRINT);
	 			exit;
	 		}
	 	}
 	}
 	else
 		// Die. Kill the script.
		exit('Invalid URL');
?>