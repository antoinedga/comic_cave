<?php 
$page_title = 'Browse Comics';

require ('mysqli_connect.php'); // Connect to the database.
$conn = OpenCon();
echo "Connected Successfully";
// Default query for this page:
// $q = "SELECT * FROM comics";
	$q = "SELECT
	-- artists.artist_id, CONCAT_WS(' ', first_name, last_name) AS artist, 
	-- writers.writer_id, CONCAT_WS(' ', first_name, last_name) AS writer, 
	publishers.publisher_id, CONCAT_WS(' ', publisher_name) AS publisher, 
	comic_name, price, description, comic_id
	FROM 	publishers, comics 
	WHERE
	publishers.publisher_id = comics.publisher_id
	ORDER BY
	publishers.publisher_name ASC, comics.comic_name ASC";
// $a = "SELECT artists.artist_id, CONCAT_WS(' ', first_name, last_name) AS artist";
// $w = "SELECT writers.writer_id, CONCAT_WS(' ', first_name, last_name) AS writer";
// Are we looking at a particular artist?
if (isset($_GET['aid']) && filter_var($_GET['aid'], FILTER_VALIDATE_INT, array('min_range' => 1))  ) {
// Overwrite the query:
$q = "SELECT artists.artist_id, CONCAT_WS(' ', first_name, last_name) AS artist, comic_name, price, description, comic_id FROM artists, comics WHERE artists.artist_id=comics.artist_id AND comics.artist_id={$_GET['aid']} ORDER BY comics.comic_name";
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
	// $a = mysqli_query($conn, "SELECT artists.artist_id, CONCAT_WS(' ', first_name, last_name) AS artist 
	// 	FROM artists, comics
	// 	WHERE artists.artist_id = comics.artist_id");
	// $w = "SELECT writers.writer_id, CONCAT_WS(' ', first_name, last_name) AS writer
	// 	FROM writers, comics
	// 	WHERE writers.writer_id = comics.writer_id";
	// echo [$a];
	// Display each record:
	echo "\t<tr>
	<td align=\"left\"><a href=\"view_comic.php?pid={$row['comic_id']}\">{$row['comic_name']}</a></td>

	<td align=\"left\"><a href=\"browse_comics.php?aid={$row['publisher_id']}\">{$row['publisher']}</a></td>
	<td align=\"left\">{$row['description']}</td>
	<td align=\"right\">\${$row['price']}</td>
	</tr>\n";
}

// <td align="left" width="15%"><strong>Artist</strong></td>
// <td align="left" width="15%"><strong>Writer</strong></td>

// <td align=\"left\"><a href=\"browse_comics.php?aid={$row['artist_id']}\">{$row['artist']}</a></td>
// <td align=\"left\"><a href=\"browse_comics.php?aid={$row['writer_id']}\">{$row['writer']}</a></td>
echo '</table>';
mysqli_close($conn);
?>
