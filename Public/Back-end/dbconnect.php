<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "code-craft";

	// Create a connection
	$conn = mysqli_connect($servername,
		$username, $password, $database);

// check if db is connected roperly or not
if ($conn) {
    // Connection successful
} else {
    die("Database connection failed: ");
}

?>
