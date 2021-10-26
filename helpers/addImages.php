<?php

include $_SERVER['DOCUMENT_ROOT'] . '/helpers/config.php';
include $_SERVER['DOCUMENT_ROOT'] . '/helpers/sizeFile.php';
include $_SERVER['DOCUMENT_ROOT'] . '/helpers/uploadFiles.php';

if (isset($_FILES['files']['tmp_name'])) {
	header('Content-type: application/json');
	$num = (array_filter($_FILES['files']['tmp_name']));
	$amtFiles = (count($num, COUNT_RECURSIVE));

	$error = uploadfiles\checkAndUploadFiles($amtFiles);

	if (!empty($error)) {
		$a['error'] = $error;
	}

	$imagesList = scandir($uploadPath, $sorting_order = SCANDIR_SORT_ASCENDING);

	$array = array_filter($imagesList, function ($file) {
		return !in_array($file, ['.', '..']);
	});

	$array = (array_values($array));
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

