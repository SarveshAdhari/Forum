<?php

	// Connecting to database
	$server = "localhost";
	$username = "root";
	$password = "";
	$database = "forum23";

	$conn = mysqli_connect($server,$username,$password,$database);
	if(!$conn){
		die("Could not connect to the database. Please try again later.");
	}

?>