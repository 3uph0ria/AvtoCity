<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/AvtoKolesa/include/action_header.php';

// Добавляем товар в БД
$Database->AddCategory($_POST['name']);

// Редирект обратно
$_SESSION['alert'] = 'Категория успешно добавлена.';
header("Location: ". $_SERVER['HTTP_REFERER']);

?>
