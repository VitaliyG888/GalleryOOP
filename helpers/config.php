<?php
$uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/upload/';

$imagExtensions= [
    'jpeg',
    'jpg',
    'gif',
    'png',
    'svg',
    'webp'
];
$limitBytes = 1024 * 1024 * 2;

$errorMessages = [
    UPLOAD_ERR_INI_SIZE => 'Размер файла превысил значение upload_max_filesize в конфигурации PHP.',
    UPLOAD_ERR_FORM_SIZE => 'Размер загружаемого файла превысил значение MAX_FILE_SIZE в HTML-форме.',
    UPLOAD_ERR_PARTIAL => 'Загружаемый файл был получен только частично.',
    UPLOAD_ERR_NO_FILE => ' Файл не был загружен.',
    UPLOAD_ERR_NO_TMP_DIR => 'Отсутствует временная папка.',
    UPLOAD_ERR_CANT_WRITE => 'Не удалось записать файл на диск.',
    UPLOAD_ERR_EXTENSION => 'PHP-расширение остановило загрузку файла.',
];

$unknownMessage = 'При загрузке файла произошла неизвестная ошибка.';
