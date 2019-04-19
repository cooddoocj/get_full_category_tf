<?php

$link = json_decode(file_get_contents("data/list_urls.txt"), true)[0];

header("Refresh:2; url=story_set.php?link=" . $link);
echo "<p>chờ...</p>";
echo $link;

$file = fopen("data/list_count.txt", "w");
fwrite($file, 1);
fclose($file);
