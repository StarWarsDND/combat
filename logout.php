<?php
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
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<link rel="stylesheet" type="text/css" href="star-wars2.css" />
	</head>
	<body>
		<header>
			<h1> Star Wars DND </h1>
			<p></p>
			<h2> Combat Stimulator </h2>
		</header>
		<br>
		<br>
		<h3> Successfully Logged out! </h3>
		<a href="gLogin.php" class="link" >Log Back In</a>
		<br>	

		<footer>
			<hr>
			<span> <> </span>
		</footer>
	</body>
</html>
<?php
	//mysqli_close($DBConnect);	
?>