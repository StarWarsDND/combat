<?php
//******************************Log Out Confirmation Page for the StarWars GUI ****************************************//
// WRITTEN BY: 		Jennifer Ayala
// RELEASE DATE: 	In Development / status updated 11/16/2019
// VERSION:			1.2
// 
// PURPOSE: 		This file is displayed after redirect from the log out link on any page, once user is successfully
//					logged out of the site - session is cleared to prevent back-button access to previous pages
// *********************************************************************************************************************//

session_start();
	function logout()
	{
		//need all 3 to stop the session, clear the data & erase session data:
		session_unset(); //clears the session
		session_regenerate_id(true); //destroys the data & erasing the session data from server
		session_destroy(); //stops the session from running
		session_start(); //start a new session
	} 
	if(isset($_GET['logout'])) {
			logout();
			header("Location:/logout.php");
			die();
	}

?>

<!DOCTYPE html>

<html >
	<head>
		<title>Member Log Out</title>
		<meta http-equiv="content-type" content="text/html" charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="star-wars.css" />
	</head>
	<body>
		<header>
			<h1> Star Wars DND </h1>
		</header>
		<div class="transbox">
			<br>
			<h3> Successfully Logged out! </h3>
		</div>
		<footer>
			<hr>
			<span> <> </span><span><a href="index.html" class="link"> HOME </a></span> 					
			<span> <> </span><span><a href="gLogin.php" class="link"> LOG BACK IN </a></span> 
			<span> <> </span>
			<br><br>
			<audio controls autoplay>
				<source src="Main_Title.mp3" type="audio/mpeg">
			</audio>
		</footer>
		
	</body>
</html>
<?php
	//mysqli_close($DBConnect);	
?>