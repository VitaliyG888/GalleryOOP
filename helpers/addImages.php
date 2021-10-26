<?php

include $_SERVER['DOCUMENT_ROOT'] . '/helpers/config.php';
include $_SERVER['DOCUMENT_ROOT'] . '/helpers/sizeFile.php';
include $_SERVER['DOCUMENT_ROOT'] . '/helpers/uploadFiles.php';

if (isset($_FILES['files']['tmp_name'])) {
	header('Content-type: application/json');
	$num = (array_filter($_FILES['files']['tmp_name']));
	$amtFiles = (count($num, COUNT_RECURSIVE));

//	if ($amtFiles <= 5) {
//		foreach ($_FILES['files'] as $key => $value) {
//			foreach ($value as $k => $v) {
//				$_FILES['files'][$k][$key] = $v;
//			}
//			unset($_FILES['files'][$key]);
//		}
//		foreach ($_FILES['files'] as $k => $v) {
//			$fileName = $_FILES['files'][$k]['name'];
//			$fileTmpName = $_FILES['files'][$k]['tmp_name'];
//			$errorCode = $_FILES['files'][$k]['error'];
//			$fileName =preg_replace('/[^a-zA-Z0-9.\-_]/', '_', $fileName);
//
//			if (!($errorCode === UPLOAD_ERR_OK && is_uploaded_file($fileTmpName))) {
//				$outputMessage = $errorMessages[$errorCode] ?? $unknownMessage;
//				$err = 'При загрузке файла ' . $fileName . ' произошла ошибка.' . $outputMessage;
//				$error[] = $err;
//				continue;
//			}
//
//			if (
//				$fileName == '.'
//				|| $fileName == '..'
//				|| is_dir($uploadPath . '/' . $fileName)
//				|| !in_array(pathinfo($fileName, PATHINFO_EXTENSION), $imagExtensions )) {
//				$err = 'Файл ' . $fileName . ' не является изображением.';
//				$error[] = $err;
//				continue;
//			}
//
//			if (filesize($fileTmpName) > $limitBytes) {
//				$err = 'Размер файла' . $fileName . 'превышает 2 МБ.';
//				$error[] = $err;
//				continue;
//			}
//
//			if (!move_uploaded_file($fileTmpName, $uploadPath . $fileName)) {
//				$err = 'При записи файла' . $fileName . ' на диск произошла ошибка.';
//				$error[] = $err;
//			}
//		}
//	} else {
//		$err = 'Можно загружать не больше пяти файлов.';
//		$error[] = $err;
//	}

	uploadfiles\checkAndUploadFiles($amtFiles);

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

