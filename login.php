<?php
	require "config.php"; 
	ForceDashboard();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
   	<meta name=viewport content="width=device-width, initial-scale=1">
   	<link rel="stylesheet" type="text/css" href="css/login.css">
   	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   	<script src="js/script.js" type="text/javascript"></script>
	<title>Sign UP / Log In System</title>
</head>
<body>
	<div class="container">
		<h3 class="head_text">Sign UP / Log In System</h1>
	</div>
	<div class="container">
		<div class="row">
			<div class="block">
				<form class="login_block">
					<div class="header">
						<h3>Log in</h3>
					</div>
					<div class="error" style="display: none;">
						<h3></h3>
					</div>
					<div class="username">
						<h3>Username</h3>
						<input id="username" type="text" size="32" placeholder="username" name="username"/>
						<h4>should be within 7 - 20 English characters </h4>
					</div>
					<div class="password">
						<h3>Password</h3>
						<input id="password" type="password" size="32" placeholder="password" name="password"/>
						<h4>should be within 8 - 21 English characters </h4>
					</div>
					<div class="email" style="display: none;">
						<h3>E-mail</h3>
						<input id="email" type="email" size="32" placeholder="test@test.com" name="e-mail"/>
					</div>
					<div class="button">
						<a onclick="toggle()">Sign up?</a>
						<button class="submit" type="button">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>