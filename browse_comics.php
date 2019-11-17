<?php # displays the available comics

// Set the page title and include the HTML header:
$page_title = 'Browse Comics';
// include ('components/header.html');

require ('../mysqli_connect.php');
 
// Default query for this page:
$q = "SELECT artists.artist_id, CONCAT_WS(' ', first_name, last_name) AS artist, writers.writer_id, CONCAT_WS(' ', first_name, last_name) AS writer, publishers.publisher_id, CONCAT_WS(' ', publisher) AS publisher, comic_name, price, description, comic_id FROM artists, writers, publishers, comics WHERE artists.artist_id = comics.artist_id AND writers.writer_id = comics.writer_id AND publishers.publisher_id = comics.publisher_id ORDER BY comics.comic_name ASC, publishers.publisher ASC";

// this searches by artist passed in URL
// TODO: update so can search by writer, publisher, and comic name
if (isset($_GET['aid']) && filter_var($_GET['aid'], FILTER_VALIDATE_INT, array('min_range' => 1))  ) 
{
	// Overwrite the query:
	$q = "SELECT artists.artist_id, CONCAT_WS(' ', first_name, last_name) AS artist, comic_name, price, description, comic_id FROM artists, comics WHERE artists.artist_id=comics.artist_id AND comics.artist_id={$_GET['aid']} ORDER BY comics.comic_name";
}

// Create the table head:
echo '<table border="0" width="90%" cellspacing="3" cellpadding="3" align="center">
	<tr>
		<td align="left" width="20%"><b>Comic Name</b></td>
		<td align="left" width="40%"><b>Description</b></td>
		<td align="right" width="20%"><b>Price</b></td>

		<td align="left" width="20%"><b>Artist</b></td>
		<td align="left" width="20%"><b>Writer</b></td>
		<td align="left" width="20%"><b>Publisher</b></td>
	</tr>';

// Display all the comics, linked to URLs:
$r = mysqli_query ($dbc, $q);
while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC)) 
{
	// Display each record:
	echo "\t<tr>
		<td align=\"left\"><a href=\"view_comic.php?pid={$row['comic_id']}\">{$row['comic_name']}</a></td>
		<td align=\"left\">{$row['description']}</td>
		<td align=\"right\">\${$row['price']}</td>

		<td align=\"left\"><a href=\"browse_comics.php?aid={$row['artist_id']}\">{$row['artist']}</a></td>
		<td align=\"left\"><a href=\"browse_comics.php?aid={$row['writer_id']}\">{$row['writer']}</a></td>
		<td align=\"left\"><a href=\"browse_comics.php?aid={$row['publisher_id']}\">{$row['publisher']}</a></td>
	</tr>\n";

}

echo '</table>';
mysqli_close($dbc);
// include ('components/footer.html');
?>