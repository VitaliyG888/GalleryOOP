<?php
include $_SERVER['DOCUMENT_ROOT'] . '/helpers/printImages.php';
include $_SERVER['DOCUMENT_ROOT'] . '/helpers/config.php';
?>

	<body>
<header class="header">
	<div class="container">

		<?php
		include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
		?>

	</div>
</header>

<main>
	<section class="gallery">
		<div class="container container-gallery">
			<h1 class="gallery-title">Галерея изображений.</h1>

			<form class="download-form" method="post" enctype="multipart/form-data">
				<label class="download-label" for="images">Загрузка файлов:</label>
				<div class="input__wrapper">
					<input type="file" name="files[]" id="input__file" class="input input__file" accept="image/*" multiple>
					<label for="input__file" class="input__file-button">
                            <span class="input__file-icon-wrapper"><img class="input__file-icon"
																		src="/img/Download_alt_font_awesome.svg"
																		alt="Выбрать файл" width="25"></span>
						<span class="input__file-button-text">Выберите файл</span>
					</label>
				</div>
			</form>
			<button class="download-btn" name="upload">Загрузить</button>
			<div class="error-message"></div>

			<form class="gallery-list" method="POST" enctype="multipart/form-data">
				<div class="gallery-block">
					<?php
					$imageList = scandir($uploadPath, $sorting_order = SCANDIR_SORT_ASCENDING);
					printImages($imageList, $uploadPath);
					?>
				</div>
			</form>
			<button class="gallery-btn">Удалить выбранные картинки</button>
		</div>
	</section>
</main>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
