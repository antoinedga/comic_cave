<?php

	function OpenCon()
	{
		$dbhost = "localhost";
		$dbuser = "usr";
		$dbpass = "batpass";
		$db = "comic_cave";

		$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

		return $conn;

	}

	function CloseCon($conn)
	{
		mysqli_close($conn);
	}
?>