<div class="container">
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
    ?>
</div>

<section class="gallery">
    <div class="container container-gallery">
        <h1 class="gallery-title">Загрузка изображений.</h1>
        <form class="images-form" method="post"
              enctype="multipart/form-data">
            <label class="download-label" for="images">Загрузка файлов:</label>
            <div class="input__wrapper">
                <input type="file" name="files[]" id="input__file" class="input input__file" multiple required>
                <label for="input__file" class="input__file-button">
                            <span class="input__file-icon-wrapper"><img class="input__file-icon"
                                                                        src="./img/Download_alt_font_awesome.svg"
                                                                        alt="Выбрать файл" width="25"></span>
                    <span class="input__file-button-text">Выберите файл</span>
                </label>
            </div>
        </form>
        <button class="images-btn" name="upload">Загрузить</button>
        <div class="error-message"></div>
    </div>
</section>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
