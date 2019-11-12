<?php

	session_start();			
		
?>

<!DOCTYPE html>
<html>
	<head>
		<title>DM Dashboard</title>
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" type="text/css" href="star-wars2.css" />
	</head>
	<body>
	<br>
		<h1> Dungeon Master Dashboard! </h1>	
		<br>
		<h2> Welcome Dungeon Master </>
		<br>
		<input type="submit" name="newCampaign" value="New Campaign" class="button" />
		<br>
		<br>
		<input type="submit" name="GameSimulator" value="Start Damage Simulator" class="button" />
		<hr>
		<a href="campaigns.php" class="link" > View Campaigns </a>
		<br>
		<a href="gLogin.php" class="link" >Return to Log In</a>
		<br>
		<a href="gLogout.php" class="link" >Log Out</a>
	</body>
</html>
<?php
	mysqli_close($DBConnect);
?>