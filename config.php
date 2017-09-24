<?php

	// Sessions are always turned on
	if(!isset($_SESSION)) {
		session_set_cookie_params(3600,'/');
		session_start();
	}

	// logout and clean session
	if(isset($_GET['logout'])){
		CleanSession();
		setcookie(session_name(),'',time()-3600,'/');
		header("Location: login.php"); exit;
	}

	function ForceLogin() {
		if(isset($_SESSION['user_name'])) {
			// The user is allowed here  
		} else {
			// The user is not allowed here. 
			header("Location: login.php"); exit;
		}
	}

	function ForceDashboard(){
		if(isset($_SESSION['user_name'])) {
			header("Location: dashboard.php"); exit;
		} else {
			// The user should log in
		}
	}

	function CleanSession(){
		// remove all session variables
		if(isset($_SESSION)){
			session_unset(); 
		}
	}

?>