<?php
/**
 * Показывает картинки на странице с датой и размером
 * @param $files
 */
function printImages($files)
{
	if (count($files)) {
		foreach ($files as $file) {
			$title = pathinfo($file, PATHINFO_FILENAME);
			$fileName = pathinfo($file, PATHINFO_BASENAME);
			$date = date("d F Y", filectime($file));
			$size = filesize($file);

			require_once($_SERVER['DOCUMENT_ROOT'] . '/helpers/checkSizeFile.php');
			$sizeArr = sizefile\checkSizeFile($size);
			?>
			<div class="gallery-item">
				<a href="/upload/<?= $fileName ?>" title="<?= $title ?>" class="gallery-link">
					<img class="gallery-img" src="/upload/<?= $fileName ?>" alt="alt">
				</a>
				<label class="check-image">
					<span class="date-image"><?= $date ?></span>
					<span class="size-image"><?= $sizeArr['title'] . $sizeArr['symbol'] ?></span>
					<span class="name-image"><?= $title ?></span>
					<input class="check-del" type="checkbox" name="delete[]" value="<?= $fileName ?>" multiple/>
				</label>
			</div>
			<?php
		}
	} else { ?>
		<div class="no-photo">Нет фото</div>;
		<?php
	}
}
