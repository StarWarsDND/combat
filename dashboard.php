<?php
//******************************Dashboard Page for the StarWars GUI ********************//
// WRITTEN BY: Jennifer Ayala
// RELEASE DATE: Pending / status updated 10/27/2019
// VERSION 1.2
// 
// PURPOSE: 		This file displays the member's profile - regular players, option to view 
//					previous campaigns and update profile information
//
// MAJOR VARIABLES: 
//		username - login username as registered in the user database table
//		password - password saved in the users table, associated to the username & user id
//		characterName - name of the game play character visible to all players in a campaign
//		role - admin, dm, or player
// *********************************************************************************************
	session_start();
    $_SESSION = array();
    session_destroy();	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Player Dashboard</title>
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" type="text/css" href="star-wars2.css" />
	</head>
	<body>
	<br>
		<h1> Player Dashboard! </h1>	
		<br>
		<br>
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
						echo "<h4> Successfully connected to the member's site!</h4>";
						
				
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
						
					}
				}
		?>
		<div class="container4">
			<?php					
				$DBConnect = mysqli_connect("157.245.125.164", "root", "ahs0kaTan0","StarWarsDND");
				$tableName = "users";
				if ($errors == 0) {
					$string = "SELECT * FROM users WHERE userid='" . $_SESSION['userid'] . "'";
					$qResult = @mysqli_query($DBConnect, $string);
					if ($errors == 0) {
						$Row = mysqli_fetch_assoc($qResult);
						$username = $Row['username'];
						$userid = $Row['userid'];
						echo "<p> Welcome back " . $username . "!</p>"; 		
						echo "<p> UserID:         {$Row['userid']}</p>";
						echo "<p> Username:       {$Row['username']}</p>";
						echo "<p> Password:       {$Row['password']}</p>";
						echo "<p> Character Name:      {$Row['characterName']}</p>";
						echo "<p> Role:          {$Row['role']}</p>";									
						//link directs to the edit page, passing the userid	
						echo "<h4><a href='edit_member.php?" . "userid=$userid'> Edit Profile </a></h4>\n";	
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
		</div>
		<hr>
		<a href="campaigns.php" class="link" > View Campaigns </a>
		<br>
		<a href="logout.php" class="link" >Log Out</a>
	</body>
</html>
<?php
	mysqli_close($DBConnect);
?>