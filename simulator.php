<?php

//***************************************** Simulator Page for the StarWars GUI ****************************//
// WRITTEN BY: 		Jennifer Ayala
// RELEASE DATE: 	IN DEVELOPMENT/ status updated 11/26/2019
// VERSION:			1.1
// 
// PURPOSE: 		This file enables the DM role to launch a campaign for combat simulation
//
// MAJOR VARIABLES: 
//					-
//					-
//					-
//					
//
// PENDING ACTION:  -
//					-
// ***********************************************************************************************************//

	session_start();
    $_SESSION = array();
    session_destroy();	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Combat Simulator</title>
		<meta http-equiv="content-type" content="text/html" charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="star-wars2.css" />
	</head>
	<body>
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
		
		?>	

		<div class="container4">
			<h4> Combat Simulator </h4>
			<?php
				$output = exec("../test.cpp");
				echo "<p>" . $output . "</p>";
			?>
		</div>
	</body>
</html>