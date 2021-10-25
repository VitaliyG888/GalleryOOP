<?php
include $_SERVER['DOCUMENT_ROOT'] . '/helpers/config.php';

if (isset($_POST['delete'])) {
	foreach ($_POST['delete'] as $image) {
		$filePath = $uploadPath . $image;
		if (str_starts_with(realpath($filePath), realpath($uploadPath))) {
			unlink($uploadPath . $image);
		}
	}
}

