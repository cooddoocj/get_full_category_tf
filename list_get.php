<?php

/*trạm trung chuyển*/
// get data
$urls = json_decode(file_get_contents("data/list_urls.txt"), true);
$total = count($urls);
$count = file_get_contents("data/list_count.txt");

if ($count == $total) {
	echo "ok";
	exit;
}

$dem = $count+1;
// url
$link = $urls[$count];
header("Refresh:2; url=story_set.php?link=" . $link);
echo "<p>chờ...</p>";
echo "<p>$link</p>";

// tang them +1 vao file count.txt
$file = fopen("data/list_count.txt", "w");
fwrite($file, $dem);
fclose($file);