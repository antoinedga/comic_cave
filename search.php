<?php
	require ('mysqli_connect.php'); // Connect to the database.
	$conn = OpenCon();
?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Search results</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<?php
	$query = $_GET['query']; 

	$min_length = 3;
	// setting a min length for the query
	if(strlen($query) >= $min_length)
	{
		$query = htmlspecialchars($query); 
		// changes characters used in html to their equivalents, for example: < to &gt;
		
		$query = mysqli_real_escape_string($conn, $query);
		// makes sure nobody uses SQL injection
		
		$r = mysqli_query($conn, "SELECT * FROM comics
			WHERE (`comic_name` LIKE '%".$query."%') OR (`description` LIKE '%".$query."%')") or die(mysql_error());

		// got search results
		if(mysqli_num_rows($r) > 0)
		{
			while($results = mysqli_fetch_array($r))
			{
				echo "\t<tr>
				<td align=\"left\"><a href=\"view_comic.php?cid={$results['comic_id']}\">{$results['comic_name']}</a></td>
				<td align=\"left\">{$results['description']}</td>
				<td align=\"right\">\${$results['price']}</td>
				</tr><br/>\n";
			}
		}
		else
		{
			echo "No results";
		}
	}
	else
	{ 
		echo "Minimum length is ".$min_length;
	}
?>
</body>
</html>