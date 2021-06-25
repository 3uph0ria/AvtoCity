<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/AvtoKolesa/include/action_header.php';

// Удаление товара
$Database->DeleteCategory($_POST['id']);

// Редирект обратно
$_SESSION['alert'] = 'Категория успешно удалена.';
header("Location: ". $_SERVER['HTTP_REFERER']);
