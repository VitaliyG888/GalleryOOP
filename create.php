<div class="container">
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
    ?>
</div>

<section class="gallery">
    <div class="container container-download">
        <h1 class="gallery-title">Загрузка изображений.</h1>
		<?php
		include $_SERVER['DOCUMENT_ROOT'] . '/templates/formDownload.php';
		?>
		<button class="images-btn" name="upload">Загрузить</button>
        <div class="error-message"></div>
    </div>
</section>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
