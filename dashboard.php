<?php
//***************************************** Dashboard Page for the StarWars GUI ****************************//
// WRITTEN BY: 		Jennifer Ayala
// RELEASE DATE: 	IN DEVELOPMENT/ status updated 11/28/2019
// VERSION:			1.4
// 
// PURPOSE: 		This file displays the member's profile - regular players, option to view 
//					previous campaigns and update profile information
//
// MAJOR VARIABLES: 
//					username - login username as registered in the user database table
//					password - password saved in the users table, associated to the username & user id
//					characterName - name of the game play character visible to all players in a campaign
//					role - admin, dm, or player
//
// PENDING ACTION:  Secure database access by referencing aa DBConnect file and remove all direct references
//					to DB connection information
// ***********************************************************************************************************//

	session_start();
    $_SESSION = array();
    session_destroy();	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Player Dashboard</title>
		<meta http-equiv="content-type" content="text/html" charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="star-wars2.css" />
	</head>
	<body>
	<br>
		<h1> Player Dashboard </h1>	
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
						//echo "<h4> Successfully connected to the member's site!</h4>";
						
				
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
			<h2>Player Info </h2>
			<?php					
				$DBConnect = mysqli_connect("157.245.125.164", "root", "ahs0kaTan0","StarWarsDND");
				$tableName = "users";
				if ($errors == 0) {
					$string = "SELECT * FROM profile JOIN users USING(userid) WHERE userid='" . $_SESSION['userid'] . "'";
					$qResult = @mysqli_query($DBConnect, $string);
					if ($errors == 0) {
						$Row = mysqli_fetch_assoc($qResult);
						$username = $Row['username'];
						$userid = $Row['userid'];
						echo "<p> Welcome back " . $username . "!</p>"; 
						echo "<table width='80%'>\n";
							echo "<tr>";
								echo "<th>UserID</th>";
								echo "<td>{$Row['userid']}</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<th>Username</th>";
								echo "<td>{$Row['username']} </td>";
							echo "</tr>";							
							echo "<tr>";
								echo "<th>Password</th>";
								echo "<td>{$Row['password']} </td>";
							echo "</tr>";						
							echo "<tr>";
								echo "<th>Character Name</th>";
								echo "<td>{$Row['characterName']} </td>";
							echo "</tr>";
							
							echo "<tr>";
								echo "<th>Role</th>";
								echo "<td>{$Row['role']}</td>";
							echo "</tr>";							
							echo "<tr>";
								echo "<th>Skills</th>";
								echo "<td> {$Row['skills']} </td>";
							echo "</tr>";
						echo "</table>";
						echo "<h4> Character Ability & Skill Value </h4>";
						echo "<table width='80%'>\n";
							echo "<tr>";
								echo "<th> Ability Score </th>";
								echo "<td> {$Row['abilityScore']}</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<th>Modifer </th>";
								echo "<td>{$Row['modifier']} </td>";
							echo "</tr>";
							
							echo "<tr>";
								echo "<th> Proficiency </th>";
								echo "<td>{$Row['profienciency']} </td>";
							echo "</tr>";
							
							echo "<tr>";
								echo "<th> Difficulty Level </th>";
								echo "<td>{$Row['difficulty']} </td>";
							echo "</tr>";
							
							echo "<tr>";
								echo "<th>Score Variant </th>";
								echo "<td>{$Row['variant']} </td>";
							echo "</tr>";
							echo "<tr>";
								echo "<th> Combined Score Qualifier</th>";
								echo "<td>{$Row['qScore']}</td>";
							echo "</tr>";
					
						echo "</table>";
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
		<div class="container6">
			<h2> Campaign Stats</h2>
			<?php
				$DBConnect = mysqli_connect("157.245.125.164", "root", "ahs0kaTan0","StarWarsDND");
				$tableName1 = "users";
				$tableName2 = "campaign_play";
				if ($errors == 0) {
					$string = "SELECT * FROM campaign_play WHERE userid='" . $_SESSION['userid'] . "'";
					$qResult = @mysqli_query($DBConnect, $string);
					$Row = array();
					echo "<table width='80%'>\n";
					echo "<tr><th>Campaign ID </th><th>Starting Health Points</th><th>Damage Taken</th><th>Ending Health Points</th></tr>\n";
					while(($Row = mysqli_fetch_assoc($qResult)) > 0) {
						$userid = $Row['userid'];	
						echo "<tr><td text align='center'>{$Row['campaignID']}</td>";
						echo "<td>{$Row['sHealthPoints']}</td>";
						echo "<td> {$Row['damage']}</td>";
						echo "<td> {$Row['eHealthPoints']}</td></tr>";						
					};
					echo "</table>\n";		
				}		
			?>
		</div>		
		<footer>
			<hr>
			<span> <> </span><span><a href="index.html" class="link"> HOME </a></span> 	
			<span> <> </span><span><a href="edit_member.php?<?php echo strip_tags(SID); ?>" class="link"> EDIT PROFILE </a></span>	
			<span> <> </span><span><a href="campaigns.php?<?php echo strip_tags(SID); ?>" class="link" > VIEW CAMPAIGNS </a></span>
			<span> <> </span><span><a href="logout.php" class="link"> LOG OUT </a> 
			<span> <> </span>
		</footer>
	</body>
</html>
<?php
	mysqli_close($DBConnect);
?>