<?php

	session_start();
    $_SESSION = array();
    session_destroy();
?>

<!DOCTYPE html>
<html>
	<head>
	<title>Member's Page</title>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" type="text/css" href="star-wars.css" />
	</head>
	<body>
		<h1> Welcome! </h1>
				<h2> Member Profile</h2>
		<?php			
			//Pending: remove the $DBConnect & refer to $DBConnect file for additional security				
			$DBConnect = mysqli_connect("157.245.125.164", "root", "ahs0kaTan0");		
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
					echo "<p> Successfully connected to the member's site!</p>";
					
			
				if ($result === FALSE) {
					echo "<p>Unable to select the database. " .
						"Error code " . mysqli_errno($DBConnect) . 
						": " . mysqli_error($DBConnect) . "</p>\n";
					++$errors;
				}	
			}
			$tableName = "users";
			//Pending: remove & update with file name
			$DBConnect = mysqli_connect("157.245.125.164", "root", "ahs0kaTan0","StarWarsDND");
			$username = $_POST['username'];	
			$password = $_POST['password'];
			if ($errors == 0) {
				$string = "SELECT userid, username FROM users " .
					"WHERE username='" . stripslashes($_POST['username']). 
					"' AND password='" . stripslashes($_POST['password']). "'";
				$queryResult = @mysqli_query($DBConnect, $string);
				if (mysqli_num_rows($queryResult)== 0) {
					echo "<p>The username/password combination entered is not valid.</p>\n";
					++$errors;
				}
				 else {
					  $Row = mysqli_fetch_assoc($queryResult);
					  $_SESSION['userid'] = $Row['userid'];
					  echo "<p> Welcome back " . $username . "!</p>";    
				}
			}
			$DBConnect = mysqli_connect("157.245.125.164", "root", "ahs0kaTan0","StarWarsDND");
			$tableName = "users";
			if ($errors == 0) {
				$string = "SELECT * FROM users WHERE userid='" . $_SESSION['userid'] . "'";
				$qResult = @mysqli_query($DBConnect, $string);
				if ($errors == 0) {
					$Row = mysqli_fetch_assoc($qResult);
					$username = $Row['username'];
					echo "<p> Welcome back " . $username . "!</p>"; 
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
		<a href="dashboard.php" class="link" >View Profile</a>
		<a href="campaigns.php" class="link" >View Campaigns</a>
		<a href="logout.php" class="link" >Log Out</a>
	</body>
</html>