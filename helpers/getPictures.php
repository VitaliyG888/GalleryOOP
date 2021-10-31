<?php
namespace getpicture {

	/**
	 * Дастает список картинок из дериктории.
	 * @param $uploadPath
	 * @return array
	 */
	function getPictures($uploadPath): array
	{
		$imagesList = [];
		if(file_exists($uploadPath)) {
			$d = opendir($uploadPath);
			while($fileName = readdir($d)) {
				if ($fileName === '.' || $fileName === '..' || is_dir($uploadPath . '/' .$fileName)) {
					continue;
				}
				$imagesList[] = $uploadPath . $fileName;
			}
			closedir($d);
		}
		return $imagesList;
	}
}
