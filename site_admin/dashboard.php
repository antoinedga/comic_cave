<?php # dashboard for admins
session_start();
// Set the page title and include the HTML header:
$page_title = 'Welcome!';
// include('includes/header.html');
// Welcome the user (by name if they are logged in):

if (!isset($_SESSION['first_name'])) {

	$url = '../index.php';
	ob_end_clean();
	header("Location: $url");
	exit();
}

?>
<!-- add dashboard -->
