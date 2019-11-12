<?php

	session_start();			
		
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Registered</title>
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" type="text/css" href="star-wars.css" />
	</head>
	<body>
	<br>
		<h1> Thank you for regisitering! </h1>	
		<br>
		<br>
		<?php
			$errors = 0;
			$username = "";
			if (empty($_POST['username'])){
				++$errors;
				echo "<p> Please enter a username .</p>";
			}
			else {
				$username = stripslashes($_POST['username']);
			}
			if (empty($_POST['password'])){
				++$errors;
				echo "<p> Please enter a password </p>";
				$password = "";
			}
			else 
				$password = stripslashes($_POST['password']);
			
			if (empty($_POST['password2'])){
				++$errors;
				echo "<p> Please confirm password </p>";
				$password2 = " ";
			}
			else 
				$password2 = stripslashes($_POST['password2']);
				
			if ((!(empty($password))) && (!(empty($password2)))){
				if($password <> $password2) {
					++$errors;
					echo "<p> Passwords do not match </p>";
					$password = "";
					$password2 = "";
				}	
			}
			
			$DBConnect = FALSE;
			if ($errors == 0) {
				$DBConnect = mysqli_connect("162.241.253.15", "jahmedac_jwalker", "R*J:3r?Q{x", "jahmedac_jwalker32");
				if ($DBConnect === FALSE) {
					echo "<p> Unable to connect to database server. Error code " . 
					mysqli_errno() . ": " . mysqli_error() . "</p>\n";
					++$errors;
				}
				else {
					$DBName = "jahmedac_jwalker32";
					$result = @mysqli_select_db($DBName, $DBConnect);
					if ($result === FALSE) {
						echo "<p> Unable to select database. Error code " .
						mysqli_errno($DBConnect) . ": " . mysqli_error($DBConnect) . "</p>\n";
						++$errors;
					}					
				}	
			}
			$TableName = "starWars_users";
			$DBConnect = @mysqli_connect("162.241.253.15", "jahmedac_jwalker", "R*J:3r?Q{x", "jahmedac_jwalker32");
			if ($errors == 0) {
				$SQLString = "SELECT count(*) FROM $TableName WHERE username='$username'";
				$QueryResult = mysqli_query( $DBConnect, $SQLString);
				if ($QueryResult !== FALSE){
					$Row = mysqli_fetch_row($QueryResult);
					if ($Row[0]>0){
						echo "<p> The username (" .htmlentities($username) . ") is already registered </p>\n";
						++$errors;
					}	
				}	
			}	
			
			if ($errors > 0) {
				echo "<p> Please use the browser's back button to return to form to correct errors </p>\n";
			}	
			if ($errors == 0) {
				$username = stripslashes($_POST['username']);
				$SQLString = "INSERT INTO $TableName " .
						"(username, password) " .
						"VALUES('$username','$password')";
					
				$QueryResult = mysqli_query( $DBConnect, $SQLString);
				if ($QueryResult === FALSE) {
					echo "<p> Unable to save registration, error code " .
						mysqli_errno($DBConnect) . ": " .
						mysqli_error($DBConnect) . "</p>\n";
					++$errors;	
				}	
				else {
					$st-userid = mysqli_insert_id($DBConnect);	
					echo "<p> Thank you for registering " . $username . "! "; 
					echo " Your new userid is:  <strong> " . $st-userid . " </strong>.</p>\n";
				}
			}
		?>
		<hr>
		<a href="membersSW.php" class="link" > Member's Page </a>
		<br>
		<a href="gLogin.php" class="link" >Return to Log In</a>
		<br>
		<a href="gLogout.php" class="link" >Log Out</a>
	</body>
</html>
<?php
	mysqli_close($DBConnect);
?>