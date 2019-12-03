<?php 	# logout
session_start();
$page_title = 'Logout';

// If no first_name session variable exists, redirect the user:
if (!isset($_SESSION['first_name'])) {

	$url = '../index.php'; 
	ob_end_clean(); 
	header("Location: $url");
	exit(); 
	
} else { // Log out the user.
	$url = '../index.php'; 
	$_SESSION = array(); // Destroy the variables.
	session_destroy(); // Destroy the session itself.
	setcookie (session_name(), '', time()-3600); // Destroy the cookie.
	header("Location: $url");
	exit(); 
}

// Print a customized message:
?>