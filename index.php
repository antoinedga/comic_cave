<?php # main page of site
// just for testing on my end, do whatever you want Ant
include 'mysqli_connect.php';
$conn = OpenCon();
// session_start();
// $_SESSION['userName'] = 'usr';
// $s = session_id();
$page_title = 'Comic Cave';
// include ('components/header.html');

// echo($s);
	// include ('components/footer.html');
	CloseCon($conn);
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Comic Cave</title>
	<style type="text/css" media="screen">@import "includes/layout.css";</style>
</head>
<body>
<!-- <div id="Header">Comic Cave</div> -->
<div id="Content">
<!-- End of Header -->

	<h1>Comic Cave</h1>

<!-- End of Content -->

</div>
<div id="Menu">
	<h2>Site Admin</h2>
	<p>dasboard is where admins are sent and where admin tools will be, index is for website visitors</p>
	<a href="./site_admin/dashboard.php" title="dashboard">dashboard</a><br>


</div>
</body>
</html>