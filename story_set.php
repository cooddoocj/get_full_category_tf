<?php

include 'functions.php';

$link = $_GET['link'];
$single_curl = single_curl($link);

//tong
if(!preg_match('#<ul class="pagination pagination-sm">#is', $single_curl)){
	$last = 1;
}else{
	if(preg_match('#Trang ([0-9]{1,3})">Cuối#is', $single_curl)){
		preg_match('#Trang ([0-9]{1,3})">Cuối#is', $single_curl, $tong);
		$last = $tong[1];
	}else{
		preg_match('#(.*)>([0-9]{1,3})</a></li><li>#is', $single_curl, $tong);
		$last = $tong[2];
	}
}


// get multi pages
$urls = array();
for ($i=1; $i <= $last; $i++) { 
	$urls[] = $link . 'trang-' . $i . '/';
}

$multi_curl = multi_curl($urls);
preg_match_all('#<ul class="list-chapter">(.*?)</ul>#is', $multi_curl, $list_chapter);
preg_match_all('#<a href="(.*?)".*?>(.*?)</a>#is', print_r($list_chapter[1], true), $lists);

file_put_contents( "data/urls.txt", json_encode($lists[1]) );

echo count($lists[1]);
echo "<p>chờ...</p>";
header("Refresh:2; url=story_reset.php");