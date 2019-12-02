<?php
//***************************************** Campaigns Page for the StarWars GUI ****************************//
// WRITTEN BY: 		Jennifer Ayala
// RELEASE DATE: 	IN DEVELOPMENT/ status updated 11/18/2019
// VERSION:			1.3
// 
// PURPOSE: 		This file displays the campaign results for all players 
//					(was previously named "membersSW.php", redundant with dashboard
//
// MAJOR VARIABLES: 
//					-
//					-
//					-
//					-
//
// PENDING ACTION:  (1) Secure database access by referencing aa DBConnect file and remove all direct references
//					to DB connection information
//					(2) Add variables to view combat simulator history
// ***********************************************************************************************************//


	session_start();
    $_SESSION = array();
    session_destroy();
?>

<!DOCTYPE html>
<html>
	<head>
	<title>Campaign History</title>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<link rel="stylesheet" type="text/css" href="star-wars2.css" />
	</head>
	<body>
		<h2> Previous Campaigns </h2>
		<div class="container1">
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
						//echo "<p> Successfully connected to the member's site!</p>";
						
				
					if ($result === FALSE) {
						echo "<p>Unable to select the database. " .
							"Error code " . mysqli_errno($DBConnect) . 
							": " . mysqli_error($DBConnect) . "</p>\n";
						++$errors;
					}	
				}
				// 
				$DBConnect = mysqli_connect("157.245.125.164", "root", "ahs0kaTan0","StarWarsDND");
				if ($errors == 0) {
					$string = "SELECT characterName, game_date, damage FROM campaign_play JOIN campaign USING (campaignID) JOIN users USING (userid)";
					$qResult = @mysqli_query($DBConnect, $string);
					$Row = array();
						echo "<table width='80%'>\n";
						echo "<tr><th>GameDate</th><th>Player Character</th><th>Damage Taken</th></tr>\n";
						while(($Row = mysqli_fetch_assoc($qResult)) > 0) {	
							echo "<tr><td text align='center'>{$Row['game_date']}</td>";
							echo "<td>{$Row['characterName']}</td>";
							echo "<td> {$Row['damage']}</td></tr>";						
						};
						echo "</table>\n";	
				}
				
			?>
		</div>	
		<footer>
			<hr>
			<span> <> </span><span><a href="index.html" class="link"> HOME </a></span> 	
			<span> <> </span><span><a href="dashboard.php?<?php echo strip_tags(SID); ?>" class="link"> PROFILE </a></span>
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
		
		
		
		
		
		
		
		
		
	</body>
</html>