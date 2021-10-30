<?php
include $_SERVER['DOCUMENT_ROOT'] . '/helpers/printImages.php';
include $_SERVER['DOCUMENT_ROOT'] . '/helpers/config.php';
include $_SERVER['DOCUMENT_ROOT'] . '/helpers/getPictures.php';
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
			<?php
			include $_SERVER['DOCUMENT_ROOT'] . '/templates/formDownload.php';
			?>
			<button class="download-btn" type="submit" form="data">Загрузить</button>
			<div class="error-message"></div>

			<form class="gallery-list" method="POST" enctype="multipart/form-data">
				<div class="gallery-block">
					<?php
					$files = getpicture\getPictures($uploadPath);
					printImages($files);
					?>
				</div>
				<button class="gallery-btn" type="submit">Удалить выбранные картинки</button>
			</form>
		</div>
	</section>
</main>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
