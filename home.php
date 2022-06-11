<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../logon/index.html');
	exit;
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Gym</title>
		<link href="../styles/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Gym Home</h1>
				<a href="../membership/membership.html"><i class="fas fa-table"></i>Manage Memberships</a>
				<a href=""><i class="fas fa-book"></i>Booking</a>
				<a href="../contactUs/contactUs.html"><i class="fas fa-address-book"></i>Contact Us</a>
				<a href="../home/profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="../logon/logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
				
				
			</div>
		</nav>
		<div class="content">
			<h2>Gym Home Page</h2>
			<p>Welcome back, <?=$_SESSION['name']?>!</p>
			<p>For bookings, please go to the bookings tab</p>
			<p> To contact us, please go to the contact us tab</p> 

			
		</div>
	</body>
</html>