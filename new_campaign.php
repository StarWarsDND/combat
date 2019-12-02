<?php
//******************************Create a New Campaign for the StarWars GUI ********************//
// WRITTEN BY: 		Jennifer Ayala
// RELEASE DATE: 	IN DEVELOPMENT / status updated 12/02/2019
// VERSION:			1.2
// 
// PURPOSE: 		This file enables a dm to create a new campaign, redirects to the simulator
//					
// ********************************************************************************************* -->
	session_start();
    $_SESSION = array();
    session_destroy();
?>


<!DOCTYPE html>
<html>
	<head>
	<title>New Campaign</title>
	<meta http-equiv="content-type" content="text/html" charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="star-wars2.css" />
	</head>
	<body>
		<br>
		<h1> Create a new campaign </h1>
		<form method="POST" action="simulator.php?<?php
					  echo SID; ?>">
				<p>Enter date:
				 <input type="text" name="game_date" /></p>
				<input type="submit" name="create_campaign" value="Create Campaign" class="button" />
			</form>
	</body>
</html>	



