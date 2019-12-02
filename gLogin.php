<?php
//******************************Login Page for the StarWars GUI ********************//
// WRITTEN BY: 		Jennifer Ayala
// RELEASE DATE: 	In Development / status updated 11/18/2019
// VERSION:			1.2
// 
// PURPOSE: 		This file allows users to enter username & password to access the 
//					members site. Depending on user role, page then redirects to a member
//					dashboard, if passes username validation against the MySQL database table
// 			 		for users.  Invalid requests will redirect to an error page.
//
// MAJOR VARIABLES: 
//					username - login username as registered in the user database table
//					password - password saved in the users table, associated to the username & user id
//					form - post method to obtain user input
//					sessions - secure connection to the site
//
//PENDING ACTION:	Add animation
// *********************************************************************************************

	session_start();
    $_SESSION = array();
    session_destroy();

?>

<!DOCTYPE html>
<html>
	<head>
	<title>User Login</title>
	<meta http-equiv="content-type" content="text/html" charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="star-wars2.css" />
	</head>
	<body>
	<br>
	<h1>Welcome!</h1>
		<h3>Returning User Login</h3>
		<form method="POST" action="dashboard.php?<?php
				  echo SID; ?>">
			<p>Enter your username: 
				 <input type="text" name="username" /></p>
			<p>Enter your password:
				 <input type="password" name="password" /></p>
			<input type="reset" name="reset" 
				 value="Reset Login Form" class="button"/>
			<input type="submit" name="login" value="Log In" class="button" />
		</form>
		<hr/>
		<h3>Don't have an account? Now open for FREE Registration!</h3>
		<p><a href="register_SW.php"> Register </a></p>
		<audio controls autoplay>
			<source src="Main_Title.mp3" type="audio/mpeg">
		</audio>
	</body>

</html>