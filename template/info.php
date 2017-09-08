<?php
	// Basic php info to be on every page
	// Will want to connect to database and set session
	
	// Get credentials from config file
	require_once('config/config.php');
	$mysqli = new mysqli($host, $user, $pass, $database);

	// Check for successful connection
	if ($mysqli->connect_error) {
		die("Connect error (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
	}
	
	// Initialize prepared statement variable
	$ps = $mysqli->stmt_init();
	
	// Start the session for every page
	session_start();

	function login() {
		if (isset($_SESSION['username']))
			return true;
		else
			return false;
	}
?>
