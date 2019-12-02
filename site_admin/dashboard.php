<?php # dashboard for admins
session_start();
// Set the page title and include the HTML header:
$page_title = 'Welcome!';
// include('includes/header.html');
// Welcome the user (by name if they are logged in):
echo '<h1>Welcome';
if (isset($_SESSION['first_name'])) {
	echo ", {$_SESSION['first_name']}";
}

if (!isset($_SESSION['first_name'])) {

	$url = '../index.php'; 
	ob_end_clean(); 
	header("Location: $url");
	exit(); 
}

echo '!</h1>';
?>
<p>Spam spam spam spam spam spam
spam spam spam spam spam spam
spam spam spam spam spam spam
spam spam spam spam spam spam.</p>
<p>Spam spam spam spam spam spam
spam spam spam spam spam spam
spam spam spam spam spam spam
spam spam spam spam spam spam.</p>

<!-- <?php include('includes/footer.html'); ?> -->