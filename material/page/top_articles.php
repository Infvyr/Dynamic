<?php
$query = " SELECT * FROM `articles` ORDER BY calendar DESC ";
$res = mysqli_query($link, $query);
if (!$res) {
exit(mysqli_error());
}

	echo "<ul class='collection z-depth-1'>";
	echo "<li class='collection-item center-align indigo darken-4 white-text' id='recent_add'>recent adăugate</li>";
	$row = array();
	for ($i=0; $i < mysqli_num_rows($res); $i++) {
	$row = mysqli_fetch_array($res, MYSQL_ASSOC);
	printf("
	<li class='collection-item hvr-bounce-to-right' id='latime'>
		<a href='/material/page/article.php?id_text=%s' class='indigo-text'>%s</a>
	</li>
	", $row['id'], $row['title']
	);
	}
	?>