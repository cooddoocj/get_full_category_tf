<?php

// get data
$urls = json_decode(file_get_contents("data/urls.txt"), true);
$total = count($urls);
$count = file_get_contents("data/count.txt");

if ($count == $total) {
	header("Refresh:2; url=list_get.php");
	echo "<p>chờ...</p>";
	exit;
}

header("Refresh: 0.2;");

$dem = $count+1;

// url
$link = $urls[$count];

include 'functions.php';

// get content & save
$single_curl = single_curl($link);

preg_match('#<title>(.*?)</title>#is', $single_curl, $title);

// luu noi dung
$d04 = sprintf( "%04d", $dem );
$filename = "Text/$d04.html";
file_put_contents($filename, $title[1]);

// tang them +1 vao file count.txt
$file = fopen("data/count.txt", "w");
fwrite($file, $dem);
fclose($file);

// show
echo "$dem/$total";
echo "<p>$title[1]</p>";
