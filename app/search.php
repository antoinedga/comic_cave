<?php
	require ('../mysqli_connect.php'); // Connect to the database.
	$conn = OpenCon();
	require_once('../db.php');
	$query = $_GET['query']; 
	$query = htmlspecialchars($query); 

	$query = mysqli_real_escape_string($conn, $query);
	// makes sure nobody uses SQL injection
	
	$r = mysqli_query($conn, "SELECT * FROM comics
		WHERE (`comic_name` LIKE '%".$query."%')") or die(mysql_error());

	$rows = array();
	while ($res = mysqli_fetch_assoc($r))
	{
		$rows[] = $res;
	}
	echo json_encode($rows);
?>