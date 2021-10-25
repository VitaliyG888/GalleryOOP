<?php
namespace sizefile;

/**
 * @param $size
 * @return mixed
 */
function checkSizeFile($size) {
	if ($size > 10240 && $size < 1048576) {
		$sizeTitle = round(($size / 1024), 3);
		$sizeSymbol = 'Kb';
	} elseif ($size >= 1048576) {
		$sizeTitle = round(($size / 1048576), 3);
		$sizeSymbol = 'Mb';
	} else {
		$sizeTitle = $size;
		$sizeSymbol = 'b';
	}
	return [ 'title' => $sizeTitle, 'symbol' => $sizeSymbol];
}
