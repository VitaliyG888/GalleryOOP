<form class="images-form" method="post"
	  enctype="multipart/form-data">
	<label class="download-label" for="images">Загрузка файлов:</label>
	<div class="input__wrapper">
		<input type="file" name="files[]" id="input__file" class="input input__file" accept="image/*" multiple required>
		<label for="input__file" class="input__file-button">
                            <span class="input__file-icon-wrapper"><img class="input__file-icon"
																		src="./img/Download_alt_font_awesome.svg"
																		alt="Выбрать файл" width="25"></span>
			<span class="input__file-button-text">Выберите файл</span>
		</label>
	</div>
</form>
