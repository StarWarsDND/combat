<?php
//******************************Registration Page for the StarWars GUI ********************//
// WRITTEN BY: Jennifer Ayala
// RELEASE DATE: IN DEVELOPMENT / status updated 11/18/2019
// VERSION 1.2
// 
// PURPOSE: 		This file enables a new user to register with the site, page redirects to registeredSW.php
//					if successfully registered, carrying over the session_ID
// ********************************************************************************************* -->
	session_start();
    $_SESSION = array();
    session_destroy();
?>

<!DOCTYPE html>
<html>
	<head>
	<title>Register</title>
	<meta http-equiv="content-type" content="text/html" charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="star-wars2.css" />
	</head>
	<body>
		<br>
		<h1> Game Registration </h1>
		<br>

	<?php
	
		$RegistrationForm = FALSE;
		$username = "";
		$password = "";
		if (isset($_POST['Register'])){
			$FormErrorCount = 0;
			if (isset($_POST['username'])) {
				$username = stripslashes($_POST['username']);
				$username = trim($username);
				if (strlen($username) == 0) {
					echo "<h3> Please include a username </h3>\n";
					++$FormErrorCount;
				}
			}
			else {
				echo "<p> Form submittal error (No 'username' field)!</p>\n";
				++$FormErrorCount;
			}
			if (isset($_POST['password'])) {
				$password = $_POST['password'];
				if (strlen($password) == 0) {
					echo "<p> A password is required! </p>\n";
					++$FormErrorCount;
				}
			}
			else {
				echo "<p> Form submittal error (No 'password' field)!</p>\n";
				++$FormErrorCount;
			}
			if ($FormErrorCount == 0) {
				$RegistrationForm = FALSE;
				
				if ($DBConnect !== FALSE) {
				}
			}
			else 
				$RegistrationForm = TRUE;
		}
		else {
			$RegistrationForm = TRUE;
		}
	
	?>
		
			<form method="POST" action="registeredSW.php?<?php
					  echo SID; ?>">
				<p>Enter your username:
				 <input type="text" name="username" /></p>
				<p>Enter a password for your account:
					 <input type="password" name="password" /></p>
				<p>Confirm your password:
					 <input type="password" name="password2" /></p>
				<p>Enter your character name:
					<input type="text" name="charname" /></p>	
				<p> Game Role:
					<input type="text" name="role" /></p>
				<input type="reset" name="reset" 
					 value="Reset Registration Form" class="button"/>
				<input type="submit" name="register" value="Register" class="button" />
			</form>

		<br>
		
	</body>
</html>