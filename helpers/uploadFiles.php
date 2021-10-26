<?php
namespace uploadfiles;

function checkAndUploadFiles($amtFiles)
{
	include $_SERVER['DOCUMENT_ROOT'] . '/helpers/config.php';
	$error = [];
	if ($amtFiles <= 5) {
		foreach ($_FILES['files'] as $key => $value) {
			foreach ($value as $k => $v) {
				$_FILES['files'][$k][$key] = $v;
			}
			unset($_FILES['files'][$key]);
		}
		foreach ($_FILES['files'] as $k => $v) {
			$fileName = $_FILES['files'][$k]['name'];
			$fileTmpName = $_FILES['files'][$k]['tmp_name'];
			$errorCode = $_FILES['files'][$k]['error'];

			if (!($errorCode === UPLOAD_ERR_OK && is_uploaded_file($fileTmpName))) {
				$outputMessage = $errorMessages[$errorCode] ?? $unknownMessage;
				$err = 'При загрузке файла ' . $fileName . ' произошла ошибка.' . $outputMessage;
				$error[] = $err;
				continue;
			}

			if (
				$fileName == '.'
				|| $fileName == '..'
				|| is_dir($uploadPath . '/' . $fileName)
				|| !in_array(pathinfo($fileName, PATHINFO_EXTENSION), $imagExtensions )) {
				$err = 'Файл ' . $fileName . ' не является изображением.';
				$error[] = $err;
				continue;
			}

			if (filesize($fileTmpName) > $limitBytes) {
				$err = 'Размер файла' . $fileName . 'превышает 2 МБ.';
				$error[] = $err;
				continue;
			}

			$fileName =preg_replace('/[^a-zA-Z0-9.\-_]/', '_', $fileName);
			if (!move_uploaded_file($fileTmpName, $uploadPath . $fileName)) {
				$err = 'При записи файла' . $fileName . ' на диск произошла ошибка.';
				$error[] = $err;
			}
		}
	} else {
		$err = 'Можно загружать не больше пяти файлов.';
		$error[] = $err;
	}
	return $error;
}