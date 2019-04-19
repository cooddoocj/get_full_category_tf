<?php

include 'functions.php';

if (isset($_POST['link'])) {
	$link = $_POST['link'];

	$urls = array();
	for ($i=1; $i <= 2; $i++) { 
		$urls[] = $link . 'trang-' . $i . '/';
	}

	//$single_curl = single_curl($link);

	$multi_curl = multi_curl($urls);

	preg_match_all('#<h3 class="truyen-title" itemprop="name"><a href="(.*?)" title=".*?" itemprop="url">.*?</a></h3>#is', $multi_curl, $show);
	file_put_contents("data/list_urls.txt", json_encode($show[1]));

	header("Refresh:2; url=list_start.php");
	echo "<p>chờ...</p>";
}

?>
<form method="post">
	<input type="text" name="link" onfocus="this.value=''" value="https://truyenfull.vn/the-loai/viet-nam/" style="width: 100%">
	<input type="submit" value="SET LIST">
</form>