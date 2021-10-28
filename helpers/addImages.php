<?php

include $_SERVER['DOCUMENT_ROOT'] . '/helpers/config.php';
include $_SERVER['DOCUMENT_ROOT'] . '/helpers/checkSizeFile.php';
include $_SERVER['DOCUMENT_ROOT'] . '/helpers/uploadFiles.php';
include $_SERVER['DOCUMENT_ROOT'] . '/helpers/getPictures.php';

if (isset($_FILES['files']['tmp_name'])) {
	header('Content-type: application/json');
	$num = (array_filter($_FILES['files']['tmp_name']));
	$amtFiles = (count($num, COUNT_RECURSIVE));

	$error = uploadfiles\checkAndUploadFiles($amtFiles);

	if (!empty($error)) {
		$a['error'] = $error;
	}

	$array = [];
	$files = getpicture\getPictures($uploadPath);
	foreach ($files as $file) {
		$array[] = pathinfo($file, PATHINFO_BASENAME);
	}
	$lengArr = count($array);
	for ($i = 0; $i < $lengArr; $i++) {
		$arr[$i][] = $array[$i];
		$arr[$i][] = date("d F Y", filectime($uploadPath . '/' . $array[$i]));
		$size = filesize($uploadPath . '/' . $array[$i]);
		$sizeArr = sizefile\checkSizeFile($size);
		$arr[$i][] = $sizeArr;
	}
	$a['array'] = $arr;

	$json = json_encode($a);
	echo $json;
}

