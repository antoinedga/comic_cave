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
	<h2>Site Admin, Ant's links!</h2>
	<a href="./site_admin/login.php" title="login to the site">login</a><br>
	<a href="./site_admin/add_artist.php" title="add artist">add artist</a><br>
	<a href="./site_admin/add_publisher.php" title="add publisher">add publisher</a><br>
	<a href="./site_admin/add_writer.php" title="add writer">add writer</a><br>
	<a href="./site_admin/add_comic.php" title="add comic">add comic</a><br>
	<p>dasboard is where admins are sent and where admin tools will be, index is for website visitors</p>
	<a href="./site_admin/dashboard.php" title="dashboard">dashboard</a><br>
	<p> register wont be on the website, this is just for our purposes since passwords are hashed</p>
	<a href="./site_admin/register.php" title="register">register</a><br>

	<h2>App Stuff, Jen & Josh!</h2>
	<a href="./browse_comics.php" title="browse comics">browse comics</a><br>
	<p> click on comic title in browse to view individual comic! you can also click on the publisher to see comics only by that publisher. Or you pass an id in on this link</p>
	<a href="./view_comics.php?cid=" title="view comic">view comic</a><br>
	<a href="./view_cart.php" title="view cart">view cart</a><br>

	<form action="search.php" method="GET">
		<input type="text" name="query" />
		<input type="submit" value="Search" />
	</form>

</div>
</body>
</html>