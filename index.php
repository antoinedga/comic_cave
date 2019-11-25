<?php # main page of site
// just for testing on my end, do whatever you want Ant
include 'mysqli_connect.php';
$conn = OpenCon();
echo "connected successfully";

$page_title = 'Comic Cave';
include ('components/header.html');
?>

<p>Welcome to our site....</p>
<p>please use the links above...blah, blah, blah.</p>

<?php 
	include ('components/footer.html');
	CloseCon($conn);
?>