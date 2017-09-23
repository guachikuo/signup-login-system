<?php
	require "config.php"; 
	ForceLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
   	<meta name=viewport content="width=device-width, initial-scale=1">
   	<link rel="stylesheet" type="text/css" href="css/dashboard.css">
	<title>DashBoard</title>
</head>
<body>
	<div class="container">
		<h3 class="head_text">Dashboard</h1>
	</div>
	<div class="container">
		<h3 class="welcome">Welcome ! You are signed in as user : <?php echo $_SESSION['user_name']; ?></h3>
	</div>
	<div class="container">
		<a class="logout" onclick="self.location.href='login.php?logout=1'">Log out</a>
	</div>
</body>
</html>