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
			while(($file = readdir($d)) != false) {
				if ($file == '.' or $file == '..') {
					continue;
				}
				$imagesList[] = $uploadPath . $file;
			}
		}
		return $imagesList;
	}
}
