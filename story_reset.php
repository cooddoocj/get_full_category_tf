<?php

// reset = 0
$file = fopen("data/count.txt", "w");
fwrite($file, 0);
fclose($file);

// xoa text
$files = glob("Text/*");
foreach ($files as $file) {
	if (is_file($file)) {
		unlink($file);
	}
}

header('Location: story_get.php');
exit;