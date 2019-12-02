<?php
	//******************************Edit Member Page for the StarWars GUI ********************//
// WRITTEN BY: 		Jennifer Ayala
// RELEASE DATE: 	In Development / status updated 11/18/2019
// VERSION:			1.1
// 
// PURPOSE: 		This file allows users to edit password & character name 
//
// MAJOR VARIABLES: 
//					username - login username as registered in the user database table
//					password - password saved in the users table, associated to the username & user id
//					form - post method to obtain user input
//					sessions - secure connection to the site
//
//PENDING ACTION:	Add animation & sound
// *********************************************************************************************
		
	session_start();
    $_SESSION = array();
    session_destroy();
	
?>

<!DOCTYPE html>
<html>
	<head>
	<title>Edit Member's Page</title>
	<meta http-equiv="content-type" content="text/html" charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="star-wars2.css" />
	</head>
	<body>
		<header>
			<h1> DND Combat Simulator </h1>
			<h2> Edit Membership Profile </h2>
		</header>
		<?php
			
			$DBConnect = mysqli_connect("157.245.125.164", "root", "ahs0kaTan0");		
			$tableName = "users";
			$errors = 0;
			if ($DBConnect === FALSE) {
			 echo "<p>Unable to connect to the database server. " .
				"Error code " . mysqli_errno() . ": " .
				mysqli_error() . "</p>\n";
				++$errors;
			} 
			else {
				$DBName = "StarWarsDND";
				$result = @mysqli_select_db($DBName, $DBConnect);
					echo "<p> Successfully connected to  " . $DBName . "!</p>";		
				if ($result === FALSE) {
					echo "<p>Unable to select the database. " .
						"Error code " . mysqli_errno($DBConnect) . 
						": " . mysqli_error($DBConnect) . "</p>\n";
					++$errors;
				}			
			}
			$DBConnect = mysqli_connect("157.245.125.164", "root", "ahs0kaTan0","StarWarsDND");	
			$tableName = "users";
			if (isset($_REQUEST['userid']))
				$userid = $_REQUEST['userid'];
			else
				$userid = -1;
			if ($errors == 0) {
				
				$string = "SELECT * FROM users WHERE " . "userid='$userid'";
				$qResult = @mysqli_query($DBConnect, $string);
				if ($errors == 0) {
					$Row = mysqli_fetch_assoc($qResult);
					$username = $Row['username'];
					echo "<h3> Edit profile for: " . $username . " </h3>"; 
				}
				if ($qResult === FALSE) {
					echo "<p>Unable to execute the query. " . 
					"Error code " . mysqli_errno($DBConnect) . ": " .
					mysqli_error($DBConnect) . "</p>\n";
					++$errors;
				}
				 else {
					if (mysqli_num_rows($qResult) == 0) {
						   echo "<p>Invalid  User!</p>";
						   ++$errors;
					}
				}		
			}
					
				
		?>
		<form method="POST" action="updated.php?<?php
          echo SID; ?>">
			<span>Enter a password for your account:
				<input type="password" size="20" name="password" />
			</span>
			<span>Confirm your password:
				<input type="password" size="20" name="password2" />
			</span>
			<p></p>
			<span>Character Name: 
				<input type="text" size="25" name="charName" />
			</span>
			
			<p></p>		
			<input type="reset" name="reset" 
				 value="Reset Form" class="button"/>
			<input type="submit" name="submit" value="Update" class="button" />				
		</form>
		<br>
		<footer>
			<hr>
			<span> <> </span><span><a href="index.html"> HOME </a></span> 		
			<span> <>  </span><span><a href="dashboard.php?<?php echo htmlspecialchars(SID); ?>"> MY PROFILE </a></span> 			> 			
			<span> <> </span><span><a href="logout.php"> LOG OUT </a> 
			<span> <> </span>
		</footer>
	</body>
</html>