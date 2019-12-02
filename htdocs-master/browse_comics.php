<?php 
$page_title = 'Browse Comics';

require ('mysqli_connect.php'); // Connect to the database.
$conn = OpenCon();
echo "Connected Successfully";
// Default query for this page:
	$q = "SELECT
	publishers.publisher_id, CONCAT_WS(' ', publisher_name) AS publisher, 
	comic_name, price, description, comic_id
	FROM 	publishers, comics 
	WHERE
	publishers.publisher_id = comics.publisher_id AND comics.released=1
	ORDER BY
	publishers.publisher_name ASC, 
	comics.comic_name ASC";

// Are we looking at a particular publisher?
if (isset($_GET['pid']) && filter_var($_GET['pid'], FILTER_VALIDATE_INT, array('min_range' => 1))  ) {
// Overwrite the query:
$q = "SELECT publishers.publisher_id, CONCAT_WS(' ', publisher_name) AS publisher, comic_name, price, description, comic_id FROM publishers, comics WHERE publishers.publisher_id=comics.publisher_id AND comics.publisher_id={$_GET['pid']} ORDER BY comics.comic_name";
}

// Create the table head:
echo '<table border="0" width="90%" cellspacing="3" cellpadding="3" align="center">
<tr>
<td align="left" width="15%"><strong>Comic Name</strong></td>

<td align="left" width="15%"><strong>Publisher</strong></td>
<td align="left" width="30%"><strong>Description</strong></td>
<td align="right" width="10%"><strong>Price</strong></td>
</tr>';

// Display all the prints, linked to URLs:
$r = mysqli_query ($conn, $q);
if (mysqli_num_rows($r) <= 0)
{
	printf("no rows??\n");
}
while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC)) 
{
		// Display each record:
	echo "\t<tr>
	<td align=\"left\"><a href=\"view_comic.php?cid={$row['comic_id']}\">{$row['comic_name']}</a></td>

	<td align=\"left\"><a href=\"browse_comics.php?pid={$row['publisher_id']}\">{$row['publisher']}</a></td>
	<td align=\"left\">{$row['description']}</td>
	<td align=\"right\">\${$row['price']}</td>
	</tr>\n";
}

echo '</table>';
mysqli_close($conn);
?>
