<?php
/**
 * @param $files
 * @param $uploadPath
 */
function printImages($files, $uploadPath)
{
	$files = array_filter($files, function ($file) {
		return !in_array($file, ['.', '..']);
	});

	if (count($files)) {
		foreach ($files as $file) {
			$title = explode('.', $file);
			$title = array_shift($title);
			$title = htmlspecialchars($title);
			$date = date("d F Y", filectime($uploadPath . '/' . $file));
			$size = filesize($uploadPath . '/' . $file);
			require_once($_SERVER['DOCUMENT_ROOT'] . '/helpers/sizeFile.php');
			$sizeArr = $sizeFiles = sizefile\checkSizeFile($size);
			?>
			<div class="gallery-item">
				<a href="/upload/<?= $file ?>" title="<?= $title ?>" class="gallery-link">
					<img class="gallery-img" src="/upload/<?= $file ?>" alt="alt">
				</a>
				<label class="check-image">
					<span class="date-image"><?= $date ?></span>
					<span class="size-image"><?= $sizeArr['title'] . $sizeArr['symbol'] ?></span>
					<span class="name-image"><?= $title ?></span>
					<input class="check-del" type="checkbox" name="delete[]" value="<?= $file ?>" multiple/>
				</label>
			</div>
			<?php
		}
	} else { ?>
		<div class="no-photo">Нет фото</div>;
		<?php
	}
}
