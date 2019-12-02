<?php
//******************************Registration Confirmation Page for the StarWars GUI *************************//
// WRITTEN BY: 		Jennifer Ayala
// RELEASE DATE: 	In Development / status updated 11/18/2019
// VERSION:			1.3
// 
// PURPOSE: 		This file is displayed after redirect from register_SW.php, once user is successfully
//					registered in the StarWarsDND database
//
// PENDING ACTION:  Secure database access by referencing aa DBConnect file and remove all direct references
//					to DB connection information
// ***********************************************************************************************************//

	session_start();	
		
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Registered</title>
		<meta http-equiv="content-type" content="text/html" charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="star-wars2.css" />
	</head>
	<body>
	<br>
		<h1> Thank you for registering! </h1>	
		<br>
		<br>
		<?php
			$errors = 0;
			$username = "";
			$charName = "";
			$role = "";
			$image = "";
			
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
				$DBConnect = mysqli_connect("157.245.125.164", "root", "ahs0kaTan0", "StarWarsDND");
				if ($DBConnect === FALSE) {
					echo "<p> Unable to connect to database server. Error code " . 
					mysqli_errno() . ": " . mysqli_error() . "</p>\n";
					++$errors;
				}
				else {
					$DBName = "StarWarsDND";
					$result = @mysqli_select_db($DBName, $DBConnect);
					if ($result === FALSE) {
						echo "<p> Unable to select database. Error code " .
						mysqli_errno($DBConnect) . ": " . mysqli_error($DBConnect) . "</p>\n";
						++$errors;
					}					
				}	
			}
			$TableName = "users";
			$DBConnect = mysqli_connect("157.245.125.164", "root", "ahs0kaTan0", "StarWarsDND");
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
				$password = stripslashes($_POST['password']);
				$charName = stripslashes($_POST['charname']);
				$role = stripslashes($_POST['role']);
				
				$SQLString = "INSERT INTO $TableName " .
						"(username, password, characterName, role) " .
						"VALUES('$username','$password', '$charName', '$role')";
					
				$QueryResult = mysqli_query( $DBConnect, $SQLString);
				if ($QueryResult === FALSE) {
					echo "<p> Unable to save registration, error code " .
						mysqli_errno($DBConnect) . ": " .
						mysqli_error($DBConnect) . "</p>\n";
					++$errors;	
				}	
				else {
					$userid = mysqli_insert_id($DBConnect);	
					echo "<p> Thank you for registering " . $username . "! ". "</p>"; 
					echo "<p> Your new userid is:  <strong> " . $userid . " </strong>.</p>\n";
				}
			}
		?>
		<footer>
			<hr>
			<span> <> </span><span><a href="index.html" class="link"> HOME </a></span> 		
			<span> <>  </span><span><a href="dashboard.php?<?php echo htmlspecialchars(SID); ?>" class="link"> MY PROFILE </a></span> 			 			
			<span> <> </span><span><a href="logout.php" class="link"> LOG OUT </a> 
			<span> <> </span>
		</footer>
	</body>
</html>
<?php
	//mysqli_close($DBConnect);
?>