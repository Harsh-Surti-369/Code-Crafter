<?php

	$servername = "localhost";
	$username = "root";
	$password = "";

	$database = "practice";

	// Create a connection
	$conn = mysqli_connect($servername,
		$username, $password, $database);

// check if db is connected roperly or not
	if($conn) {}
	else {
		die("Technical issues please try after some time!");
	}
?>
